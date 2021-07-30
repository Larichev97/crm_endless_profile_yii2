<?php


class SearchFilterCreator
{
    public function searchFilterBuild(SearchFilterBuilderInterface $builder)
    {
        $builder->searchFilterFind();
        $builder->searchFilterDataProvider();

        $builder->searchFilterConditionAddDate();


        return $builder->searchFilterResult();
    }
}