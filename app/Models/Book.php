<?php

namespace App\Models;

//use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use App\Sorters\CharacterSorter;
use Illuminate\Database\Eloquent\Builder;



class Book extends Model
{
  //
  //use  Sortable;

  protected $table = 'books';
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'authors','release_date'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   protected $hidden = [];

  /* 
   public $sortable = ['id',
                       'name',
                       'authors',
                       'release_date'];
   */
   public function characters()
   {
       return $this->belongsToMany(Character::class);
   
   }

   public function comments()
   {
       return $this->hasMany(Comment::class);
   }

  public function scopeSorter(Builder $builder, $request)
  {
      return (new CharacterSorter($request))->sorter($builder);
  }
}
