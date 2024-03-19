<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Article extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
    public function orderDetail(){
        return $this->BelongstoMany(orderDetail::class);
    }

}
