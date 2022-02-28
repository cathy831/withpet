@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!--新規ユーザー登録画面/もともと入ってるやつ使うならこれは使わない-->
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Withpet</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/top" method="POST">
        <!--action属性はformの送信先を決める-->
            @csrf
            
            <div class="user_name">
                <h3>氏名</h3>
                <input type="text" name="user[name]" placeholder="50字以内" value="{{ old('user.name') }}"/>
                <p class="user_name__error" style="color:red">{{ $errors->first('user.name') }}</p>
            </div>
            
            <div class="nickname">
                <h3>ニックネーム</h3>
                <input type="text" name="user[nickname]" placeholder="30字以内" value="{{ old('user.nickname') }}"/>
                <p class="nickname__error" style="color:red">{{ $errors->first('user.nickname') }}</p>
            </div>
            
            <div class="age">
                <h3>年齢</h3>
                <input type="text" name="user[age]" value="{{ old('user.age') }}"/>
                <p class="nickname__error" style="color:red">{{ $errors->first('user.nickname') }}</p>
            </div>
            
            <div class="sex">
              　<h3>性別</h3>
                <label><input type="radio" name="user[sex]" value="man" required>男性</label>  
                <label><input type="radio" name="user[sex]" value="woman">女性</label>
                <label><input type="radio" name="user[sex]" value="no">選択しない</label>
            </div>
            
            <div class="email">
                <h3>メールアドレス</h3>
                <input type="text" name="user[email]" value="{{ old('user.email') }}"/>
                <p class="email__error" style="color:red">{{ $errors->first('user.email') }}</p>
            </div>
            
            <div class="password">
                <h3>パスワード</h3>
                <input type="text" name="user[password]" value="{{ old('user.password') }}"/>
                <p class="password__error" style="color:red">{{ $errors->first('user.password') }}</p>
            </div>
            <!--文字数設定の変更とエラーの確認-->
            
            <input type="submit" value="新規登録"/>
            <div class="back">
                <a href="/top">新規登録をキャンセル</a>
            </div>
        </form>
    </body>
</html>
　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection