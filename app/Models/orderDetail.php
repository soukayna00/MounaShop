<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Order;


class orderDetail extends Model
{
    use HasFactory;
    public function articles(){
        return $this->BelongstoMany(Article::class);
    }
    public function order(){
        return $this->BelongsTo(Order::class);
    }
}
