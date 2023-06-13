<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update my blog') }}
        </h2>
    </x-slot>
    
    



<h1>タイトル : {{$post->title}} のブログ内容の編集</h1>
<form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST">
     @csrf @method('PUT') 
     <div class="form-group"> 
     <label for="work_id">作品ジャンル </label>
     <select name="work_id" id="work_id" class="form-control"> 
     @foreach ($works as $work) <option value="{{ $work->id }}" {{ $post->work_id == $work->id ? 'selected' : '' }}>
     {{ $work->name }}</option> @endforeach </select>
     </div>
      <div class="form-group">
       <label for="title">タイトル</label>
       <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}">
     </div>
     <!-- contentカラムの値を表示するtextareaタグ -->
     <div class="form-group">
       <label for="content">内容</label>
       <textarea id="content" type="text" class="form-control" name="content">{{ $post->content }}</textarea>
     </div>
     
     
     <button type="submit" class="btn btn-primary">Update</button> </form> 
  </div>
</x-app-layout>