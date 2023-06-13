<x-app-layout>
     <h1>{{$name}}のレビュー一覧</h1>   
     <p>上 タイトル 下 投稿者</p>
     <p></p>
    @foreach ($posts as $post)
           <div class='post'>
              <h2 ><a href="{{ route('show.post',$post) }}">{{$post->title}} </a> </h2> 
             
              
              <p>{{$post->user->name}}</p>
              
             

            
             
              @endforeach
    
     {{ $posts->links('vendor/pagination/bootstrap-5') }}
    
    
    
</x-app-layout>