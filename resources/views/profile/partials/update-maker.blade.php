<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update my blog') }}
        </h2>
    </x-slot>
    <h1>{{$post->title}}</h1>
    <h1>{{$post->work->name}}</h1>
    
    
    <form action="{{ route('update.maker', $post->id) }}" method="POST">
    @csrf
    @method('PUT') 
    <select name="maker_id">
        @foreach($makers as $maker)
        <option value="{{ $maker->id }}">{{ $maker->name }}</option>
        @endforeach
    </select>
    <button type="submit">更新</button>
    </form>

</x-app-layout>