<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <head>
      <meta charset="utf-8">
        <title>緑の玩具箱(TOP)</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
           <p>緑の玩具箱</p> 
           <a href="/index" >login</a>
           @foreach ($works as $work)
  <p>{{ $work->id }}</p>
  <p>{{ $work->maker->name }}</p>
@endforeach
         <div class='posts'>
        @foreach ($posts as $post)
           <div class='post'>
              <h2 >{{$post->title}}  </h2> 
             
              <p>{{$post->updated_at}} </p>
              <p>{{$post->created_at}} </p>
              <p>{{$post->access_count}}</p>
             
              
            
             
              @endforeach
              @foreach ($post->comments as $comment)
                    <p>{{$comment->content}}</p>
            @endforeach
             {{ $posts->links() }}
              
              
              
             
              
               
               
               
               
               
               
           </div>
               
               
               
               
               
               
               
           </div>
           
            
            
        </body>
        </html>