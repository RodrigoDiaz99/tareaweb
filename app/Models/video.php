<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Video extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'link', 'name','img_path_url', 'user_id'
    ];
    public function user()
   {
       return $this->belongsTo(User::class);
   }
}
