<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
     
     
     
     
    public function edit(Request $request): View
    {
       // ログインしているユーザーのインスタンスを取得
        $user = $request->user();

        // ユーザーに紐づくすべてのPostモデルのインスタンスを取得
        $posts = $user->posts()->orderBy('created_at')->paginate(5);
       
        $favorites = $user->favorites()->orderBy('created_at')->paginate(5);

        // ビューに渡す
        return view('profile.edit', [
            'user' => $user,
            'posts' => $posts,
             'favorites' => $favorites,
            
            ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
        
        
        
        
        public function save(Request $request,User $user){
            
            $user->profile=$request['profile'];
            $user->save();
             return Redirect::route('profile.edit');
        }
    }
        
        
        
    