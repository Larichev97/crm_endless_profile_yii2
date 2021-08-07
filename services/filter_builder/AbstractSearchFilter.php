<?php

namespace app\services\filter_builder;

abstract class AbstractSearchFilter
{
    abstract protected function getQuery();
    abstract protected function getDataProvider();
}