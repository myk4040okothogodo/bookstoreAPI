<?php

namespace App\Filters;

class GenderFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('gender', $value);    
    }
}
