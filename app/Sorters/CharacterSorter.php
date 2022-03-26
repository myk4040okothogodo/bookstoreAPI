<?php

namespace App\Sorters;

use App\Sorters\AbstractSorter;
use Illuminate\Database\Eloquent\Builder;

class CharacterSorter extends AbstractSorter
{
    protected $sorters = [
        'sort' => Sorting::class
    ];
}
