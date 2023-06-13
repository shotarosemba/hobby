<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                          @include('profile.partials.update-profile-text-form')
                         </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
            
             <form action="/post" method="POST">
            @csrf
            <div class="title">
                <h1>ブログ投稿(ゲスト不可)</h1>
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[content]" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        
         <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                  <h2>My blog(クリックで編集)</h2>   
                  <p></p>
                  
                  @foreach ($posts as $post)
           <div class='post'>
              <a href="/update-works/{{$post->id}}" >{{$post->title}}  </a> 
             
             
              
              
             

            
             
              @endforeach
              {{ $posts->links('vendor/pagination/bootstrap-5') }}
　　　　　
                  
               
        </div>
        
         <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                  <h2>My favorite</h2>   
                  <p></p>
                  
                  @foreach ($favorites as $favorite)
           <div class='post'>
              <a href='show.post',{{$favorite->post->id}} >{{$favorite->post->title}}  </a> 
             
             
              
              
             

            
             
              @endforeach
              {{ $favorites->links('vendor/pagination/bootstrap-5') }}
　　　　　
                  
               
        </div>
     <style>
    button.delete {
  background-color: red;
  color: white;
  border: none;
  padding: 1px;
}
        
        
    </style>
    <script>let deleteButtons = document.querySelectorAll('.delete');
// 各deleteボタンに対してイベントハンドラを設定する
for (let button of deleteButtons) {
  button.addEventListener('click', function(event) {
    // 確認のメッセージを表示する
    let confirm = window.confirm('本当に削除しますか？');
    // キャンセルを押した場合は削除を中止する
    if (!confirm) {
      event.preventDefault();
    }
  });
}</script>
    </div>
   

</x-app-layout>
