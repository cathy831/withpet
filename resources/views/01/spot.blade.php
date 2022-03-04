<!--スポットの詳細画面の表示-->

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
        {{-- CSSは変更 → <link rel="stylesheet" href="{{ asset('css/spot.css') }}"> --}}
    </head>
    <body>
        
        <h1 class="spot_name">{{ $spot->spot_name }}</h1>
        
        <p class='erea_id'>{{$spot->erea->erea_name}}</p>
        
        @foreach($spot->categories as $category)   
            {{$category->category_name}}
        @endforeach
        
        <h3>住所</h3>
        <p class='address'>{{$spot->address}}</p>
        
        <h3>営業時間</h3>
        <p class='open_close'>{{$spot->open_close}}</p>
        
        <h3>定休日</h3>
        <p class='off'>{{$spot->off}}</p>
        
        <!--スポットに投稿されたクチコミの表示-->
        <h3>クチコミ</h3>
        <!--CSSで調整後は消す-->
        @foreach($spot->reviews as $review) 
            <p class='review'>
                <small>{{ $review->user->nickname }} さん</small>
                <p>{{$review->body}}</p>
            </p>
            
            <p>
                @foreach($images as $image)
                    @if($image->review_id == $review->id)
                        <img src="{{ asset('https://withpet.s3.ap-northeast-1.amazonaws.com/' . $image->url) }}">
                        <!--写真の表示-->
                    @endif
                @endforeach
            </p>
            <!--写真のパスの書き方に注意,blade上はフルパス,コントローラー上は普通のパス-->
        @endforeach
        
        <div class="footer">
            <p class="edit">[<a href="/update/{{ $spot->id }}">スポット情報の更新</a>]</p>
            <p class="review">[<a href="/review/create/{{ $spot->id }}">クチコミを書く</a>]</p>
            <a href="/top">戻る</a>
            
            <form action="/spot/{{ $spot->id }}" id="form_{{ $spot->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                    <p class="delete">
                        <button type="submit">delete</button> 
                    </p>
            </form>
            
        </div>
        
        <script>
            function deletePost(e){
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection