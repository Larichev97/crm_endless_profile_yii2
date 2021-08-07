<?php
namespace app\services\filter_builder;


class QrSearchBuilder implements SearchFilterBuilderInterface
{
    private $search_filter;
    private $params;
    private $client_qrs;
    private $client_id;

    public function __construct($params = null, $client_qrs = false, $client_id = null)
    {
        $this->params = $params;
        $this->client_qrs = $client_qrs;
        $this->client_id = $client_id;
        $this->search_filter = new QrSearchFilter();
    }

    public function searchFilterGridCondition()
    {
        if (!empty($this->params['QrSearch']['id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'id', $this->params['QrSearch']['id']]);
        }
        elseif (!empty($this->params['QrSearch']['client_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'client_id', $this->params['QrSearch']['client_id']]);
        }
        elseif (!empty($this->params['QrSearch']['country_born_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'country_born_id', $this->params['QrSearch']['country_born_id']]);
        }
        elseif (!empty($this->params['QrSearch']['city_born_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'city_born_id', $this->params['QrSearch']['city_born_id']]);
        }
        elseif (!empty($this->params['QrSearch']['profile_status_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'profile_status_id', $this->params['QrSearch']['profile_status_id']]);
        }

        if ($this->client_qrs) {   // Только qr's клиента (для таблицы в профиле Клиента)
            $this->search_filter->getQuery()->andWhere(['client_id' => $this->client_id]);
        }

        return $this;
    }

    public function searchFilterConditionAddDate()      // Дата создания (с - по)
    {
        if (!empty($this->params['QrSearch']['date_add_start'])) {
            $this->search_filter->getQuery()->andFilterWhere(['>=', 'DATE(date_add)', $this->params['QrSearch']['date_add_start']]);
        }

        if (!empty($this->params['QrSearch']['date_add_end'])) {
            $this->search_filter->getQuery()->andFilterWhere(['<=', 'DATE(date_add)', $this->params['QrSearch']['date_add_end']]);
        }

        return $this;
    }

    public function searchFilterOrderBy()
    {
        $this->search_filter->getQuery()->orderBy('date_add DESC');

        return $this;
    }

    public function searchFilterResult()
    {
        return $this->search_filter->getDataProvider();
    }
}