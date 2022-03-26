<?php


namespace App\Sorters;

class Sorting
{
    public function sorter($builder, $value)
    {
        return $builder->orderBy($value); // specify if in desc or ascending order
    }
}
