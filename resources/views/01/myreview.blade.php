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
        
        <h4>クチコミ</h4>
        @foreach($reviews as $review)
        
            <h3>{{$review['name']}}</h3>
        
            @foreach($review['reviews'] as $review)
            <!--連想配列、キーと値をセットで扱う。コントローラーを連想配列でかくとこの書き方-->
                <p>{{$review->body}}</p>
                
                <p class="edit">[<a href="/update/{{ $review->spot_id }}">レビューの編集</a>]</p>
            
            　　<form action="/review/{{ $review->id }}" id="form_{{ $review->id }}" method="post" style="display:inline">
            　　@csrf
            　　@method('DELETE')
                　　<div class="delete">
                    　　<button type="button" onclick="deletePost({{$review->id}})">delete</button>
                    　　<!--submitにするといきなり送信されてしまうのでtypeに注意.関数名()-->
                　　</div>
            　　</form>
            @endforeach

        @endforeach
        
        <div class="footer">
            <a href="/top">戻る</a>
        </div>
        
        <script>
            function deletePost(e){
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${e}`).submit();
                    // javascriptの文字列を埋め込む場合バッククォーテーションと$
                }
            }
        </script>
    </body>
</html>
