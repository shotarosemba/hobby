<x-app-layout>
        <body>
           <h1>緑の玩具箱 </h1> 
           
          
              
        <div class='post'>
            <p>人気ブログランキング(上タイトル，下投稿者)</p>  
             
        @foreach ($posts as $post)
           
              <h2 ><a href="{{ route('show.post',$post) }}">{{$post->title}} </a> </h2> 
             
              
              <p>{{$post->user->name}}</p>
             

            
             
              @endforeach
              
　　　　　
            
             
            {{ $posts->links('vendor/pagination/bootstrap-5') }}
             </div>  
              
            
            <div class='maker'>
                　<div class='makers'>
                  <p>ジャンル別(メーカー)</p>
                @foreach($makers as $maker)
                <h2><a href="{{ route('makers.show', $maker->name) }}">{{$maker->name}}</a></h2>
                
                  @endforeach
                   </div>
              </div>  
              
              
               <div class='work'>
                <div class='works'>
                              　    
                  <p>ジャンル別(作品)</p>
                  
                @foreach($works as $work)
                <h2><a href="{{ route('works.show', $work->name) }}">{{$work->name}}</a></h2>
                
                  @endforeach
                </div>
                  </div>  
                    </div>  
              
             
        </body>
        
        <style>
  /* 親要素にposition relativeを指定 */
  .post {
    position: relative;
    width: 800px;
    height: 600px;
    top: 50px; /* 親要素の上から50pxの位置 */
    left: 400px; /* 親要素の左から50pxの位置 */
   
  }





  /* 子要素にposition absoluteと具体的な位置を指定 */
  .paginate {
    position: absolute;
    bottom: 10px; /* 親要素の下から10pxの位置 */
    right: 5px; /* 親要素の右から10pxの位置 */
    background-color: lightblue;
    padding: 10px;
  }
  
  .maker {
    position: relative;
    width: 800px;
    height: 600px;
      left: 300px;
   top:0px;
  }
  
   .makers {
    position: absolute;
    top: -500px; /* 親要素の下から10pxの位置 */
    right: 0px; /* 親要素の右から10pxの位置 */

    padding: 10px;
  }
  
  .work{
    position: relative;
    width: 800px;
    height: 600px;
     top:0px; /* 親要素の上から50pxの位置 */
    left: 0px; 
   
  }
  
   .works {
    position: absolute;
    top: -1100px; /* 親要素の下から10pxの位置 */
    left: 0px; /* 親要素の右から10pxの位置 */

    padding: 10px;
  }
  
  
  
    
</style>

        
 </x-app-layout>