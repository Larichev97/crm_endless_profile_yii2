<?php

namespace app\controllers;


use app\models\QrSearch;
use app\models\ClientSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Client;
use Carbon\Carbon;
use yii\web\NotFoundHttpException;


class ClientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create','update','delete', 'view',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModelClientSearch = new ClientSearch();
        $request_data = Yii::$app->request->get();
        $clientSearchProvider = $searchModelClientSearch->filter($request_data);

        return $this->render('/client/index', [
            'searchModelClientSearch' => $searchModelClientSearch,
            'clientSearchProvider' => $clientSearchProvider,
        ]);
    }

    public function actionView($id)
    {
        $modelClient = $this->findModel($id);

        $searchModelQr = new QrSearch();
        $request_data = Yii::$app->request->get();
        $qrSearchProvider = $searchModelQr->qrFilter($request_data, true, $id);

        return $this->render('/client/view', [
            'modelClient' => $modelClient,
            'searchModelQr' => $searchModelQr,
            'qrSearchProvider' => $qrSearchProvider,
        ]);
    }

    public function actionCreate()
    {
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');
        $post = \Yii::$app->request->post();

        $model = new Client();


        $model->date_add = $dateNow;
        $model->status_id = 1; // "Новый"
        $model->country_id = 1; // "Украина"

        if ($post && $model->load($post)) {
            $model->save();
            return $this->redirect('/client/index');
        }

        return $this->render('/client/create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        $post = Yii::$app->request->post();

        $model = $this->findModel($id);

        if ($model->load($post)) {
            $model->date_update = $dateNow;

            $model->save();

            return $this->redirect(['/client/view', 'id' => $model->id]);
        }

        return $this->render('/client/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Client model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/client/index']);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @throws NotFoundHttpException if the model cannot be found
     *
     * @return Client the loaded model
     */
    protected function findModel($id)
    {
        if (null !== ($model = Client::findOne($id))) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
