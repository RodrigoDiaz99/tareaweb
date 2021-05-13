<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
   
    use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name', 'author', 'book_path_url', 'img_path_url', 'user_id'
   ];

   /* *
    * The attributes that should be hidden for arrays.
    *
    * @var array
    * /
   protected $hidden = [
       'password',
       'remember_token',
       'two_factor_recovery_codes',
       'two_factor_secret',
   ];*/

   /* *
    * The attributes that should be cast to native types.
    *
    * @var array
    * /
   protected $casts = [
       'email_verified_at' => 'datetime',
   ];*/

   /* *
    * The accessors to append to the model's array form.
    *
    * @var array
    * /
   protected $appends = [

   ];*/

   // Relations
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function categorie_books()
   {
       return $this->belongsToMany(CategorieBook::class);
   }
}
