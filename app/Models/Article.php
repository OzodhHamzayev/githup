<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'image',
        'content',
        'sarlavha_haqida',
        'like',
        'user_id',
    ];
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
