<?php
namespace app\services\filter_builder;

class SearchFilterCreator
{
    public function searchFilterBuild(SearchFilterBuilderInterface $builder)
    {

        $builder->searchFilterConditionAddDate();

        return $builder->searchFilterResult();
    }
}