<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\User;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class ArticleController extends Controller
{
    public function show($slug){
        $article = Article::where('is_active', '=', 1)->where('slug', $slug)->firstOrFail();


        return view('article', compact('article'));
    }

    public function jsontest(){
        //$user = User::select('id', 'email', 'name')->get();
        $user = collect([1, 2, 3, 'ani' => 'ivo']);
        dd($user);
        //dd($github->items[1]->name);
        //return response()->json($var);
    }
}
