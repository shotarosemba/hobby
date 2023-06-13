<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GuestLoginController extends Controller
{
    // ゲストログイン用のメールアドレスとパスワード
    private const GUEST_EMAIL = 'guest@gmail.ac.jp';
    private const GUEST_PASSWORD = 'guestguest';

    // ゲストログイン用のメソッド
    public function login()
    {
        // ゲストユーザーの情報を取得する
        $user = User::where('email', self::GUEST_EMAIL)->first();

        // ゲストユーザーが存在しない場合はエラーを返す
        if (!$user) {
            abort(404);
        }

        // ゲストユーザーでログイン処理を行う
        Auth::login($user);

        // ログイン後の画面にリダイレクトする
        return redirect()->route('dashboard');
    }
}