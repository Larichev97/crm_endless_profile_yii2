<?php


use app\models\Qr;
use yii\data\ActiveDataProvider;

class QrSearchBuilder implements SearchFilterBuilderInterface
{
    private $search_filter;
    private $options;   // get request data

    public function __construct(array $options)
    {
        $this->options = $options;
        $this->search_filter = new QrSearchFilter();
    }

    public function searchFilterFind()
    {
        return $this->search_filter->query = Qr::find();
    }

    public function searchFilterDataProvider()
    {
        return $this->search_filter->dataProvider = new ActiveDataProvider([
                    'query' => $this->searchFilterFind(),
                    'pagination' => [
                        'pageSize' => 20,
                    ],
                ])
        ;
    }

    public function searchFilterConditionAddDate()      // Дата создания (с - по)
    {
        if (!empty($this->options['date_add_start'])) {
            $this->searchFilterFind()->andFilterWhere(['>=', 'DATE(date_add)', $this->options['date_add_start']]);
        }

        if (!empty($this->options['date_add_end'])) {
            $this->searchFilterFind()->andFilterWhere(['<=', 'DATE(date_add)', $this->options['date_add_end']]);
        }
    }

    public function searchFilterResult()
    {
//        return $this->search_filter;
        return $this->searchFilterDataProvider();
    }
}