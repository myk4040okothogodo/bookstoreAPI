<?php

namespace App\Sorters;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractSorter
{
    protected $request;

    protected $sorters = [];

    public function __construct(Request $request)
    {
      $this->request = $request;
    }

    public function sorter(Builder $builder)
    {
      foreach($this-> getSorters() as $sorter => $value)
      {
          $this->resolveSorter($sorter)->sorter($builder, $value);
      }
      return $builder;

    }
    protected function getSorters()
    {
        return array_filter($this->request->only(array_keys($this->sorters)));
    }

    protected function resolveSorter($sorter)
   {
        return new $this->sorters[$sorter];
    }

}    
