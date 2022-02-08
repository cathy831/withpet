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
        
        [<a href='/01/store'>スポット登録</a>]
        
        <div class='spots'>
            @foreach ($spots as $spot)
                <div class='spot'>
                    <h1 class='spot_name'><a href="/spot/{{ $spot->id }}">{{$spot->spot_name}}</a></h1>
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
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $spots->links() }}
        </div>
    </body>
</html>
