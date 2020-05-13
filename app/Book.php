<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
    public function pesanan_detail()
    {
        return $this->hasMany('App\Book_Order', 'book_id', 'id');
    }
}
