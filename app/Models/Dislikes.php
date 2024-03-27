<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislikes extends Model
{
    use HasFactory;
    public $fillable = [
        'post_id',
        'user_id',
        'dislikes'
    ];
    public function post_id(){
        return $this->hasOne(Article::class,'id','post_id');
    }
    public function user_id(){
        return $this->hasOne(User::class,'id','user_id');
    }
}