<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  //
  //
   protected $table = 'comments';
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content', 'commenters_ip'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
   protected $hidden = ['commenters_ip'];

   public function book()
   {
       return $this->belongsTo(Book::class);
   }
}
