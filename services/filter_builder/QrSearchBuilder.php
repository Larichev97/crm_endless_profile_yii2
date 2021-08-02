<?php
namespace app\services\filter_builder;


class QrSearchBuilder implements SearchFilterBuilderInterface
{
    private $search_filter;
    private $options;   // get request filter data
    private $params;   // get request grid data

    public function __construct(array $options = null, array $params = null)
    {
        $this->options = $options;
        $this->params = $params;
        $this->search_filter = new QrSearchFilter();
    }

    public function searchFilterGridCondition()
    {
        if (!empty($this->params['id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'id', $this->params['id']]);
        }
        elseif (!empty($this->params['client_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'client_id', $this->params['client_id']]);
        }
        elseif (!empty($this->params['country_born_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'country_born_id', $this->params['country_born_id']]);
        }
        elseif (!empty($this->params['city_born_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'city_born_id', $this->params['city_born_id']]);
        }
        elseif (!empty($this->params['profile_status_id'])) {
            $this->search_filter->getQuery()->andFilterWhere(['=', 'profile_status_id', $this->params['profile_status_id']]);
        }

        return $this;
    }

    public function searchFilterConditionAddDate()      // Дата создания (с - по)
    {
        if (!empty($this->options['date_add_start'])) {
            $this->search_filter->getQuery()->andFilterWhere(['>=', 'DATE(date_add)', $this->options['date_add_start']]);
        }

        if (!empty($this->options['date_add_end'])) {
            $this->search_filter->getQuery()->andFilterWhere(['<=', 'DATE(date_add)', $this->options['date_add_end']]);
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