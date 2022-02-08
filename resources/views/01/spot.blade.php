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
        
        <div class="footer">
            <p class="edit">[<a href="/01/update/{{ $spot->id }}">スポット情報の更新</a>]</p>
            {{--スポットの情報更新画面に飛ぶ--}}
            <a href="/top">戻る</a>
        </div>
    </body>
</html>
