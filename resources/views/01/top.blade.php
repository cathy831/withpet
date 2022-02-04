<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WithPet</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    
    <body>
        
        [<a href='/01/store'>場所登録</a>]
        
        <div class='spots'>
            @foreach ($spots as $spot)
                <div class='spot'>
                    <h1 class='spot_name'>{{$spot->spot_name}}</h1>
                    <p class='erea_id'>{{$spot->erea->erea_name}}</p>
                    @foreach($spot->categories as $category)   
                       {{$category->category_name}}
                    @endforeach
                    <p class='open_close'>{{$spot->open_close}}</p>
                    <p class='off'>{{$spot->off}}</p>
                </div>
            @endforeach
        </div>
        
    </body>
</html>
