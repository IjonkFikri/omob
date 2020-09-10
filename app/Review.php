<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table ="review";
    protected $fillable =['books_id','sinopsis','kelebihan','kekurangan','kesimpulan'];

    public function book(){

            return $this->belongsTo(Book::class,'books_id');
        
    }
}
