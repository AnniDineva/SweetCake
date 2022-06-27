<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function run(){
        $product=['title'=>'cake',
                'description'=>'sweet cake with chocolate',
                'price'=>20,
                'img'=>'product-10.jpg'
            ];
    }  
}


