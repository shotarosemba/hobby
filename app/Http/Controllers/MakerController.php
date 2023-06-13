<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;
use App\Models\Post;
use App\Models\Work;
class MakerController extends Controller
{
     public function show($name)
    {
        $makers =Maker::where('name', $name)->get();
        
      $works = Work::whereIn('maker_id', $makers->pluck('id'))->get();

        // ワークのIDを配列にする
        $work_ids = $works->pluck('id')->toArray();

        // work_idが一致するポストをアクセス数の降順で取得し、ペジネーションする
        $posts = Post::whereIn('work_id', $work_ids)->orderBy('access_count', 'desc')->paginate(4);

        // makers/show.blade.phpというビューにデータを渡して表示する
        return view('blog/show-makers', ['makers' => $makers, 'posts' => $posts,'works'=>$works,'name'=>$name]);
    }
}