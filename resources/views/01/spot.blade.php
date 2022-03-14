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
        <link rel="stylesheet" href="{{ asset('css/spot.css') }}">
    </head>
    <body>
        
        <div class="spot_body">
            <h1 class="spot_name">{{ $spot->spot_name }}</h1>
            <div class="circle">
                <small class="circle1"></small>
                <small class="circle2"></small>
            </div>
        
            <div class="category_erea_all">
                <div class="category_erea">
                    <p class='erea_name'>{{$spot->erea->erea_name}}</p>
                </div>
                <div class="category_erea">
                    @foreach($spot->categories as $category)   
                        <p class="category_name">{{$category->category_name}}</p>
                    @endforeach
                </div>
            </div>
        
            <h4 class="spot_items">住所</h4>
            <p class='address'>{{$spot->address}}</p>
        
            <h4 class="spot_items">営業時間</h4>
            <p class='open_close'>{{$spot->open_close}}</p>
            
            <h4 class="spot_items">定休日</h4>
            <p class='off'>{{$spot->off}}</p>
        
            <!--スポットに投稿されたクチコミの表示-->
        
            <!--もしレビューが空だったら「まだクチコミは投稿されていません」を表示させたいけどまだうまくいってない-->
            <div class="reviews">
                @foreach($spot->reviews as $review)
                    @if(empty($review))
                        <div class="null">クチコミはまだ投稿されていません</div>
                    @else
                        <div class='review'>
                            <small class="review_nickname">
                                <a class="nickname">{{ $review->user->nickname }}</a> さん
                            </small>
                    
                            <div class="review_images">
                                @foreach($images as $image)
                                    @if($image->review_id == $review->id)
                                        <div class="review_image">
                                            <img src="{{ asset('https://withpet.s3.ap-northeast-1.amazonaws.com/' . $image->url) }}" class="image">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <br>
                            <p class="review_body">{{$review->body}}</p>
                            <!--写真のパスの書き方に注意,blade上はフルパス,コントローラー上は普通のパス-->
                        </div>
                    @endif
                @endforeach
            </div>
        
            <div class="footer">
                <p class="edit"><a href="/update/{{ $spot->id }}">スポット情報の更新</a></p>
                <p class="add_review"><a href="/review/create/{{ $spot->id }}">クチコミを書く</a></p>
                <a href="/top">戻る</a>
            
                <form action="/spot/{{ $spot->id }}" id="form_{{ $spot->id }}" method="post" style="display:inline">
                    @csrf
                    @method('DELETE')
                        <p class="delete">
                            <button type="submit">削除</button> 
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
        </div>
    </body>
</html>
　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection