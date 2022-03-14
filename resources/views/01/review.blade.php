<!--投稿済みクチコミ編集画面-->

@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Withpet</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    </head>
    <body>
        <div class="all">
            <!--レビューの編集フォーム-->
            <form action="/review/{{$review->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <h1 class="spot_name">{{ $spot->spot_name }}</h1>
                <div class="circle">
                    <small class="circle1"></small>
                    <small class="circle2"></small>
                </div>
                <br><br>
                
                <div class="body">
                    <h4 class="body_items">クチコミ編集</h4>
                    <div class="texterea">
                        <textarea name="review[body]" placeholder="1000字以内" cols="50" rows="30">{{ old('review.body', $review->body) }}</textarea>
                        <!--textereaにvalueタグは存在しない-->
                    </div>
                    <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
                </div>
        
                <div class="images">
                    <h4 class="body_items">写真</h4>
                    <div class="input_file">
                        <input type="file" name="image">
                    </div>
                    <!--ドラッグ&ドロップ入れられそうなら入れる-->
                </div>
                <br>
            
                <div class="footer">
                    <p class="store"><input type="submit" value="保存"/></p>
                    <a href="/spot/{{$spot->id}}">クチコミの編集をキャンセル</a>
                </div>
            </form>
        </div>
    </body>
</html>
　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection