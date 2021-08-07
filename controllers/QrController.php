<?php

namespace app\controllers;

use app\models\UploadFiles;
use Carbon\Carbon;
use Yii;
use app\models\Qr;
use app\models\QrSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * QrController implements the CRUD actions for Qr model.
 */
class QrController extends Controller
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
                        'actions' => ['index','create','update','delete', 'view', 'profile', 'upload-qr',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Qr models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelQrSearch = new QrSearch();
        $request_data = Yii::$app->request->get();
        $qrSearchProvider = $searchModelQrSearch->qrFilter($request_data, false);

        return $this->render('index', [
            'searchModelQrSearch' => $searchModelQrSearch,
            'qrSearchProvider' => $qrSearchProvider,
        ]);
    }

    /**
     * Displays a single Qr model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Qr model for guest.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionProfile($id)
    {
        return $this->render('profile', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Qr model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        $post = \Yii::$app->request->post();

        $model = new Qr();

        $model->date_add = $dateNow;
        $model->profile_status_id = 1; // "Default QR-profile"

        if ($post && $model->load($post)) {
            $uploadModel = new UploadFiles();
            $uploadModel->getUploadVoiceMessage($model, 'voice_message');

            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Qr model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $dateNow = Carbon::now()->format('Y-m-d H:i:s');

        $post = Yii::$app->request->post();

        $model = $this->findModel($id);

        if ($post && $model->load($post)) {
            $model->date_update = $dateNow;
            // TEST UPDATE UPLOAD IMAGE --------------------------
            if (null != $model->voice_message) {
                $uploadModel = new UploadFiles();
                $uploadModel->getUploadVoiceMessage($model, 'voice_message', $model->voice_message);
            }
            //----------------------------------------------------

            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Qr model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Uploads Qr-code image.
     * If uploaded is successful, the browser will be redirected to the 'qr/upload-qr' page.
     * @return mixed
     */
    public function actionUploadQr($id)
    {
        $post = \Yii::$app->request->post();

        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->load($post);

            $model->qr_link = UploadedFile::getInstance($model, 'qr_link');

            //$model->qr_link->saveAs("images/qr-codes/{$model->qr_link->baseName}.{$model->qr_link->extension}");
            $model->qr_link->saveAs("images/qr-codes/qr-code-profile-" . $id . ".{$model->qr_link->extension}");
            $file_name = 'qr-code-profile-' . $id . '.' . $model->qr_link->extension;
            $model->qr_link = $file_name;

            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('upload-qr', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Qr model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Qr the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Qr::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
