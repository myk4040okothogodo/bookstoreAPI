<?php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;


class CharacterFilter extends AbstractFilter
{
      protected $filters = [
          'gender' => GenderFilter::class 
      ];
}
