<section>
     <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('My Profile') }}

            
           
        </h2>
       </header>
    
    <form action="/posts-profile/{{ $user->id }}" method="POST" >
        @csrf
        <div class="profile">
            <h2>Profile</h2>
            <textarea name="profile" placeholder="write your profile here"/>
             {{ $user->profile }}
            </textarea>
            
        </div>
         <div class="flex items-center gap-4">
        <x-primary-button>
        <input type="submit" value="save"/>
        </x-primary-button>
        </div>
    </form>
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</section>








