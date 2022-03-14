<!--自分の投稿済みのクチコミ一覧-->

@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Withpet</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/myreview.css') }}">
    </head>
    <body>
        
        <div class="own_reviews">
            
            <h4>自分の投稿済みクチコミ一覧</h4>
            
            <div class="reviews">
                @foreach($own_reviews as $review)
                    <div class="review">
                        <h4><a href="/spot/{{ $review->spot->id }}">{{ $review->spot->spot_name }}</a></h4>
                        <p>
                            @foreach($images as $image)
                                @if($image->review_id == $review->id)
                                    <img src="{{ asset('https://withpet.s3.ap-northeast-1.amazonaws.com/' . $image->url) }}" class="image">
                                    <!--写真の表示-->
                                @endif
                            @endforeach
                            {{-- $images->links() --}}
                        </p>
                        <p>{{ $review->body }}</p>
                        <p class="edit">[<a href="/review/{{ $review->id }}">レビューの編集</a>]</p>
             
                    　　<form action="/review/{{ $review->id }}" id="form_{{ $review->id }}" method="post" style="display:inline">
                        　　@csrf
                        　　@method('DELETE')
                        　　<div class="delete">
                            　　<button type="button" onclick="deletePost({{$review->id}})">削除</button>
                            　　<!--type=submitにするといきなり動作が送信されてしまう。関数名括弧を書いてJSを挟む-->
                                <!--写真のページネーションを作る-->
                        　　</div>
                    　　</form>
            　　      </div>
                @endforeach
            </div>
            
            <div class='paginate'>
                {{ $own_reviews->links() }}
            </div>
            
            <div class="footer">
                <a href="/top">戻る</a>
            </div>
            
        </div>
        
        <script>
            function deletePost(e)
            {
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${e}`).submit();
                    {{-- javascriptの文字列を埋め込む場合バッククォーテーションと$ --}}
                }
            }
        </script>
        
    </body>
</html>
　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection