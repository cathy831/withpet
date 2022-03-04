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
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- CSSは変更 → <link rel="stylesheet" href="{{ asset('css/review.css') }}"> --}}
    </head>
    <body>
        
        <!--レビューの編集フォーム-->
        <form action="/review/{{$review->id}}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
            
            <h1 class="spot_name">{{ $spot->spot_name }}</h1>
            <div class="body">
                <h2>クチコミ投稿</h2>
                <textarea name="review[body]" placeholder="1000字以内" cols="50" rows="30">{{ old('review.body', $review->body) }}</textarea>
                <!--textereaにvalueタグは存在しない-->
            
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
        
            <div class="images">
                <h2>写真</h2>
    
                <div class="input_file">
                    <input type="file" name="image">
                </div>
                <!--ドラッグ&ドロップ入れられそうなら入れる-->
            </div>
        
            <div class="footer">
                <input type="submit" value="保存"/>
                <a href="/spot/{{$spot->id}}">クチコミの編集をキャンセル</a>
            </div>
        </form>
    </body>
</html>
　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection