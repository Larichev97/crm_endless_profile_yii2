<?php


interface SearchFilterBuilderInterface
{
    public function searchFilterFind();
    public function searchFilterDataProvider();

//    public function searchFilterLeftJoin();
//    public function searchFilterWhere();
//    public function searchFilterAndWhere();
//    public function searchFilterAndFilterWhere();
//    public function searchFilterOrderBy();
//    public function searchFilterGroupBy();

//    public function searchFilterConditionBirthdayDate(); // `bdate` (с - по)
//    public function searchFilterConditionDeathDate(); // `date_death` (с - по)
    public function searchFilterConditionAddDate(); // `date_add` (с - по)
//    public function searchFilterConditionUpdateDate(); // `date_update` (с - по)

    public function searchFilterResult();
}