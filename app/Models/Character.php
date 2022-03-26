<?php

namespace App\Models;

//use Kyslik\ColumnSortable\Sortable;
use App\Filters\CharacterFilter;
use App\Sorters\CharacterSorter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Character extends Model
{
  //
  //
   //use Sortable;

   protected $table = 'characters';
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'age','gender'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
  /*
    public $sortable = ['id',
                        'age',
                        'name',
                        'gender'];
   */
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new CharacterFilter($request))->filter($builder);
    }

    public function scopeSorter(Builder $builder, $request)
    {
      return (new CharacterSorter($request))->sorter($builder);
    }


}
