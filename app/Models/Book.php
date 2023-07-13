<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
    'title','description','image'
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
}
