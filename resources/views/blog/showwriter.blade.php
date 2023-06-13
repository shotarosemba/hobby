<x-app-layout>
  <p>{{$user->name}}のプロフィール</p>  
  <p>プロフィール</p>
  <p>{{$user->profile}}</p>
  <p>投稿一覧(タイトルを表示)</p>
    @foreach($posts as $post)
    
     <h2 ><a href="{{ route('show.post',$post) }}">{{$post->title}} </a> </h2> 
    
    
    @endforeach
    
    
    
    
    
</x-app-layout>