<?php
namespace app\services\filter_builder;

class SearchFilterCreator
{
    public function searchFilterBuild(SearchFilterBuilderInterface $builder)
    {
        $builder->searchFilterGridCondition();

        $builder->searchFilterConditionAddDate();

        $builder->searchFilterOrderBy();

        //echo '<pre>'; var_dump($builder->searchFilterResult()->getModels()); die();

        return $builder->searchFilterResult();
    }
}