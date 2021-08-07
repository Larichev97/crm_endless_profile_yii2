<?php
namespace app\services\filter_builder;


class ClientSearchBuilder implements SearchFilterBuilderInterface
{
    private $search_filter;
    private $params;

    public function __construct($params = null)
    {
        $this->params = $params;
        $this->search_filter = new ClientSearchFilter();
    }

    public function searchFilterGridCondition()
    {
        if (!empty($this->params['ClientSearch']['id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'id', $this->params['ClientSearch']['id']]);
        }
        elseif (!empty($this->params['ClientSearch']['status_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'status_id', $this->params['ClientSearch']['status_id']]);
        }
        elseif (!empty($this->params['ClientSearch']['country_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'country_id', $this->params['ClientSearch']['country_id']]);
        }
        elseif (!empty($this->params['ClientSearch']['city_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'city_id', $this->params['ClientSearch']['city_id']]);
        }

        return $this;
    }

    public function searchFilterConditionAddDate()      // Дата создания (с - по)
    {
        if (!empty($this->params['ClientSearch']['date_add_start'])) {
            $this->search_filter->getQuery()->andFilterWhere(['>=', 'DATE(date_add)', $this->params['ClientSearch']['date_add_start']]);
        }

        if (!empty($this->params['ClientSearch']['date_add_end'])) {
            $this->search_filter->getQuery()->andFilterWhere(['<=', 'DATE(date_add)', $this->params['ClientSearch']['date_add_end']]);
        }

        return $this;
    }

    public function searchFilterOrderBy()
    {
        $this->search_filter->getQuery()->orderBy('id ASC');

        return $this;
    }

    public function searchFilterResult()
    {
        return $this->search_filter->getDataProvider();
    }
}