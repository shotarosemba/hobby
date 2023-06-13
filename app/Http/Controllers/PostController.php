<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Work;
use App\Models\User;
use App\Models\Maker;
use App\Models\Comment;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use DB;



class PostController extends Controller
{
    public function favorite($id)
    {
        $user = Auth::user();
       
        
        

    // ユーザーが存在し、nameプロパティがguestであるか確認
    if ($user && $user->name == 'guest') {
        // guestであればログインページにリダイレクト
        Auth::logout();
        // ログインページにリダイレクト
        return redirect('login');
    }
      
        
        
     $favorite = Favorite::firstOrCreate([
        'post_id' => $id,
        'user_id' => $user->id
    ]);

       $post=Post::whereIn('id',[$id])->first();
       $comments=Comment::whereIn('post_id',[$post->id])->orderBy('updated_at','desc')->paginate(10);
      
      
       return view('blog/show-posts',compact ('post','comments','favorite')); 
      
      
    }
    
    
     public function show($id)
    {
        // パラメータで指定されたidでユーザーを検索する
        $user = User::find($id);
         $posts=Post::whereIn('user_id',[$id])->get();

        // showwriter.blade.phpに$user変数を渡して表示する
        return view('blog/showwriter', compact ('posts','user'));
    }
    
    
    
    
    public function destroy($id)
{
  // idに対応するpostを取得する
  $post = Post::find($id);
  // postが存在すれば削除する
  if ($post) {
    $post->delete();
  }
  // リダイレクトする
  return redirect()->  route('profile.edit');
}
    
    
    
    
    public function makecomment(Request $request,$id )
    
    {
     
     $user = Auth::user();

    // ユーザーが存在し、nameプロパティがguestであるか確認
    if ($user && $user->name == 'guest') {
        // guestであればログインページにリダイレクト
        Auth::logout();
        // ログインページにリダイレクト
        return redirect('login');
    }
     
     
     
     $new_comment=  new Comment();
    $new_comment->user_id = Auth::id();
     $new_comment->post_id=$id;
     $new_comment->content=$request->input('content');
      $new_comment->save();
      $post=Post::whereIn('id',[$id])->first();
       $comments=Comment::whereIn('post_id',[$post->id])->orderBy('updated_at','desc')->paginate(10);
      return view('blog/show-posts',compact ('post','comments')); 
     
    }
    
    
    
    
 public function showpost(Post $post)
 {
      $works = Work::all ();  
       $makers = Maker::all ();  
       $comments=Comment::whereIn('post_id',[$post->id])->orderBy('updated_at','desc')->paginate(10);
       $users = User::all();
       $post->increment('access_count');
     
     
     return view ('blog/show-posts', compact ('post','makers','works','comments','users')); 
 }
    
    
    
    
 public function updateMaker(Post $post )
    {
        // リクエストからmaker_idカラムの値を取得
        $maker_id = request('maker_id');

        // postテーブルからidカラムが$idと一致するレコードを取得
    

        // workテーブルからidカラムが$post->work_idと一致するレコードを取得
        $work = Work::find($post->work_id);

        // workテーブルに新しいレコードを作成し、maker_idカラムを$maker_idに設定
        $new_work = new Work();
        $new_work->name = $work->name; // 他のカラムは同じ値にする
        $new_work->maker_id = $maker_id;
        $new_work->save();
        

        // postテーブルのwork_idカラムを$new_work->idに更新
        $post->work_id = $new_work->id;
        $post->save();

        // リダイレクトやフラッシュメッセージなどの処理（省略）
       return redirect()-> route('profile.edit');
        
    }
    
    
    
    
    
    public function update(Request $request, Post $post){
    $post->update($request->all());
    session()->flash('success', 'Post updated successfully.');
        
   

// データベースに保存する
$post->save();

 $makers = DB::table('makers')->select('id', 'name')->groupBy('name')->get();
// リダイレクトする
return view ('profile/partials/update-maker', compact ('post','makers')); 
}
    
    public function updateworks(Post $post)
    {
        $works = DB::table('works')->select('id', 'name')->groupBy('name')->get();


        // ビューに渡す
        return view('profile/partials/update-works', [
            'post' => $post,
            'works' => $works,
          
        ]);
       
       
       
      
    }
   
    
    public function index()
      { $makers = Maker::select('name')->distinct()->get();
       $works = Work::select('name')->distinct()->get();
      $posts = Post::orderBy('access_count', 'desc')->paginate(4);
       $comments = Comment::all ();  
          return view('blog/Top-page',compact ('works','makers','posts','comments'));}
    public function notlogin(){
       $works = Work::all ();  
       $makers = Maker::all ();  
      $posts = Post::orderBy('access_count', 'desc')->paginate(15);
       $comments = Comment::all ();  
  return view ('blog/not-log-in', compact ('works','makers','posts','comments')); 
      
    }
    
    public function store(Request $request)
{
    // post配列を取り出す
    $post = $request->input('post');
    
    $user = Auth::user();

    // ユーザーが存在し、nameプロパティがguestであるか確認
    if ($user && $user->name == 'guest') {
        // guestであればログインページにリダイレクト
        Auth::logout();
        // ログインページにリダイレクト
        return redirect('login');
    }

    // バリデーション
   

    // 投稿データの作成
    $new_post = new Post();
    $new_post->user_id = Auth::id();
     $new_post->work_id = 1;
    $new_post->title = $post['title'];
    $new_post->content = $post['content'];
     $new_post->access_count = 1;
    
    $new_post->save();

    // リダイレクト
    return redirect()->route('profile.edit')->with('status', 'post-created');
}
}



