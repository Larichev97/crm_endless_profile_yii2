<?php
namespace app\services\filter_builder;

interface SearchFilterBuilderInterface
{
    public function searchFilterConditionAddDate(); // `date_add` (с - по)

    public function searchFilterResult();


//    public function searchFilterConditionBirthdayDate(); // `bdate` (с - по)
//    public function searchFilterConditionDeathDate(); // `date_death` (с - по)
//    public function searchFilterConditionUpdateDate(); // `date_update` (с - по)

//    public function searchFilterLeftJoin();
//    public function searchFilterWhere();
//    public function searchFilterAndWhere();
//    public function searchFilterAndFilterWhere();
//    public function searchFilterOrderBy();
//    public function searchFilterGroupBy();
}