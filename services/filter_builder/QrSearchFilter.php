<?php
namespace app\services\filter_builder;

use app\models\Qr;
//use app\models\QrSearch;
use app\models\TestQrSearch;
use yii\data\ActiveDataProvider;

class QrSearchFilter extends SearchFilter
{
    public function __construct()
    {
        //$this->query = Qr::find();
        $this->query = TestQrSearch::find();
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getDataProvider()
    {
        $this->dataProvider = new ActiveDataProvider([
            'query' => $this->getQuery(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->dataProvider;
    }
}