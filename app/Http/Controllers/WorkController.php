<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Maker;
use App\Models\Post;

class WorkController extends Controller
{
    public function show($name)
    {
        
        $works =Work::where('name', $name)->get();
         
       $posts = Post::whereIn('work_id', $works->pluck('id')->toArray())->orderBy('access_count', 'desc')->paginate(4);
        
         $makers = Maker::all ();  
        
        return view('blog/show-works',['works'=>$works,'posts'=>$posts,'makers'=>$makers,'name'=>$name]);
    }
        
    }

