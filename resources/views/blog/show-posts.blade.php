<x-app-layout>
     <h1>タイトル: {{$post->title}}</h1>   
     <h3><a href="{{ route('showwriter',  $post->user->id) }}">投稿者: {{$post->user->name}}</a></h3>
     <p>本文</p>
     <p>{{$post->content}}</p>
     <p>作品: {{$post->work->name}}</p>
     <p>メーカー: {{$post->work->maker->name}}</p>
      <form action="{{ route('favorites.store', $post->id) }}" method="POST">
        @csrf
       
        <button type="submit" class="btn btn-primary">お気に入りに追加</button>
    </form>
     <p></p>
     <p>コメント欄</p>
     @foreach ($comments as $comment)
     <p>ユーザー: {{$comment->user->name}}</p>
     <p>本文</p>
     <p> {{$comment->content}}</p>
     <p>投稿日時: {{$comment->updated_at}}</p>
     
     
     @endforeach
     
     
      {{ $comments->links('vendor/pagination/bootstrap-5') }}
      
       <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
            
             <form action="/comments/{{$post->id}}" method="POST">
            @csrf

            <div class="body">
                <h2>コメントする(ゲスト不可)</h2>
                <textarea name="content" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        
     
     
     
     
     
     
     
     </x-app-layout>