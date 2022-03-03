@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Withpet</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
    </head>
    
    <body>
        
        <p>[<a href='/store'>スポット登録</a>]</p>
        <p>[<a href='/myreview'>投稿済みのクチコミを見る</a>]</p>
        
    {{--チェックボックス検索の実装--}}
        <div class='filter_search'>
            <h2 class='serch_01'>スポット検索</h2>
            {{--↑あとで消す--}}
            <div class="filter_tag">
                <form action="/top" method="GET">
                    @csrf
                {{--actionの後は動作に名前をつける感覚。methodはRouteの後と一致--}}
                    <h3>目的</h3>
                    <p>複数選択可</p>
                        @foreach($categories as $category)
                            <input type="checkbox" name="category_id[]" id="category_id" value="{{ $category->id }}" 
                                {{ $category->id == old('category') ? 'checked' : ''}} />
                            <label for="category">
                                {{ $category->category_name  }}
                            </label>  
                        @endforeach
                    <h3>エリア</h3>
                    <p>複数選択不可</p>
                        @foreach($ereas as $erea)
                            <input type="radio" name="erea_id" id="erea_id" value="{{ $erea->id }}" 
                                {{ $erea->id == old('erea') ? 'checked' : ''}}/>
                            <label for="erea">
                                {{ $erea->erea_name  }}
                            </label>  
                        @endforeach
                    <div class="serch_button">
                        <input type="submit" value="検索">
                    </div>
                </form>
             </div>
        </div>
        
    {{--実際は人気項目を表示させたい。要編集。--}}
        @if($spots->count())
        <div class='search_result'>
            @foreach($category_name as $category)
               {{ $category->category_name }}
            @endforeach
            {{ $erea_name }}
            検索結果
        </div>
        
        <br>
        
        <div class='spots'>
            @foreach ($spots as $spot)
                <div class='spot'>
                    <h4 class='spot_name'><a href="/spot/{{ $spot->id }}">{{$spot->spot_name}}</a></h4>
                    <p class='erea_id'>{{$spot->erea->erea_name}}</p>
                    @foreach($spot->categories as $category)   
                       <!--<p class='category_id'></p>-->
                       {{$category->category_name}}
                    @endforeach
                    <h6>住所</h6>
                    <p class='address'>{{$spot->address}}</p>
                    <h6>営業時間</h6>
                    <p class='open_close'>{{$spot->open_close}}</p>
                    <h6>定休日</h6>
                    <p class='off'>{{$spot->off}}</p>
                    <br>
                    <br>
                </div>
            @endforeach
        </div>
        
        @else
        
        
        @endif
        
        {{--つけれるならつけたいペジネーション
        <div class='paginate'>
            {{ $spots->links() }}
        </div>
        --}}
   </body>
</head>

@endsection
