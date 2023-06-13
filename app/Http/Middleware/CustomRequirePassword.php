<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RequirePassword;

class CustomRequirePassword extends RequirePassword
{
  protected function shouldConfirmPassword($request, $passwordTimeoutSeconds = null)
    {
        // 親クラスのメソッドを呼び出す
        $shouldConfirm = parent::shouldConfirmPassword($request);

        // 確認が必要な場合
        if ($shouldConfirm) {
            // ユーザーのnameを取得する
            $name = $request->user()->name;

            // nameがguestと一致するかどうかをチェックする
            if ($name == 'guest') {
                // 一致する場合はfalseを返す
                return false;
            }
        }

        // それ以外の場合は親クラスのメソッドの結果を返す
        return $shouldConfirm;
    }
}