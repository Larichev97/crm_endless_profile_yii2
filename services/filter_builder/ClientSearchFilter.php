<?php
namespace app\services\filter_builder;

use app\models\Client;
use yii\data\ActiveDataProvider;

class ClientSearchFilter extends SearchFilter
{
    public function __construct()
    {
        $this->query = Client::find();
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