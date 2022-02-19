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
       <form action="/spot/{{$spot->id}}" method="POST">
        @csrf    
            
        <h1 class="spot_name">{{ $spot->spot_name }}</h1>
        <div class="body">
            <h2>クチコミ投稿</h2>
            <textarea name="review[body]" placeholder="1000字以内" value="{{ old('review.body') }}"></textarea>
            <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
        </div>
        
        <div class="images">
            <h2>写真</h2>
            ドラッグ&ドロップ
        </div>
        
        <div class="footer">
            <input type="submit" value="保存"/>
            <a href="/spot/{{$spot->id}}">クチコミを投稿しない</a>
        </div>
       </form>
    </body>
</html>
