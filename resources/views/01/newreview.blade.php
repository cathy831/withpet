<!--新規クチコミ登録画面-->

@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Withpet</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/newreview.css') }}">
    </head>
    <body>
        <div class="all">
            <!--レビューの投稿フォーム-->
            <form action="/review/{{$spot->id}}" method="POST" enctype="multipart/form-data">
                @csrf    
            
                <h1 class="spot_name">{{ $spot->spot_name }}</h1>
                <div class="circle">
                    <small class="circle1"></small>
                    <small class="circle2"></small>
                </div>
                <br><br>
                
                <div class="body">
                    <h4 class="body_items">クチコミ投稿</h4>
                    <div class="texterea">
                        <textarea name="review[body]" placeholder="1000字以内" cols="50" rows="30">{{ old('review.body') }}</textarea>
                        <!--textereaにvalueタグは存在しない-->
                        <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
                    </div>
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
                    <p class="store"><input type="submit" value="クチコミ投稿"/></p>
                    <a href="/spot/{{$spot->id}}">クチコミを投稿しない</a>
                </div>
            </form>
        </div>
    </body>
</html>
　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection