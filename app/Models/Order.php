<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\PayementDetail;
use App\Models\OrderDetail;



class Order extends Model
{
    use HasFactory;
    public function articles(){
         return $this->belongsToMany(Article::class,'category_id');
    }
    public function paymentDetails()
    {
        return $this->hasMany(PayementDetail::class);
    }
    public function orderdetail(){
        return $this->hasOne(OrderDetail::class);
    }
}
