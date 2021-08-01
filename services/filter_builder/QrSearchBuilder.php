<?php
namespace app\services\filter_builder;


class QrSearchBuilder implements SearchFilterBuilderInterface
{
    private $search_filter;
    private $options;   // get request data

    public function __construct(array $options = null)
    {
        $this->options = $options;
        $this->search_filter = new QrSearchFilter();
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

    public function searchFilterResult()
    {
        return $this->search_filter->getDataProvider();
    }
}