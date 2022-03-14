<!--検索画面-->

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
         
        <p><a href='/store'>スポット登録</a></p>
        <p><a href='/myreview'>投稿済みのクチコミを見る</a></p>
        
    {{--検索の実装--}}
        <div class='filter_search'>
            <h2 class='search_01'>スポット検索</h2>
            <small></small>
            <div class="filter_tag">
                <form action="/top" method="GET">
                    @csrf
                {{--actionの後は動作に名前をつける感覚、formの送信先。methodはweb.phpのRouteの後と一致させる--}}
                
                    <!--カテゴリーのチェックボックス検索-->
                    <h3>目的</h3>
                    <div class="circle">
                        <small class="circle1"></small>
                        <small class="circle2"></small>
                        <small class="circle3"></small>
                    </div>
                    <small class="category_option">複数選択可</small>
                    <br><br>
                    @foreach($categories as $category)
                        <input type="checkbox" name="category_id[]" id="category_id" value="{{ $category->id }}" 
                            {{ $category->id == old('category') ? 'checked' : ''}} />
                        <label for="category">
                            <p class="search_category">{{ $category->category_name  }}</p>
                        </label>
                    @endforeach
                        
                    <!--エリアのラジオボタン検索-->
                    <h3>エリア</h3>
                    <div class="circle">
                        <small class="circle1"></small>
                        <small class="circle2"></small>
                        <small class="circle3"></small>
                    </div>
                    <small class="erea_option">複数選択不可</small>
                    <br><br>
                    @foreach($ereas as $erea)
                        <input type="radio" name="erea_id" id="erea_id" value="{{ $erea->id }}" 
                            {{ $erea->id == old('erea') ? 'checked' : ''}}/>
                        <label for="erea">
                            <p class="search_erea">{{ $erea->erea_name }}</p>
                        </label>  
                    @endforeach
                    
                    <div class="search_button">
                        <input type="submit" value="検索">
                    </div>
                </form>
             </div>
        </div>
    
        <!--検索結果の表示-->
        @if($spots->count())
        
        <!--何の検索結果かを表示-->
        <div class='search_result'>
            @foreach($category_name as $category)
               <p class="search_result01">{{ $category->category_name }}</p>
            @endforeach
            <p class="search_result02">{{ $erea_name }}</p>
            <p>検索結果</p>
        </div>
        
        <br>
        
        <!--検索結果表示実際は人気項目順に表示させたい。要編集-->
        <div class='spots'>
            @foreach ($spots as $spot)
                <div class='spot'>
                    
                    <h4 class='spot_name'><a href="/spot/{{ $spot->id }}">{{$spot->spot_name}}</a></h4>
                    
                    <div class="check_redio_all">
                        <div class="category_erea">
                            <p class='erea_name'>{{$spot->erea->erea_name}}</p>
                        </div>
                        <div class="category_erea">
                            @foreach($spot->categories as $category)   
                                <p class="category_name">{{$category->category_name}}</p>
                            @endforeach
                        </div>
                    </div>
                    
                    <h6 class="spot_items">住所</h6><!--<small class="circle4"></small>-->
                    <p class='address'>{{$spot->address}}</p>
                    
                    <h6 class="spot_items">営業時間</h6><!--<small class="circle5"></small>-->
                    <p class='open_close'>{{$spot->open_close}}</p>
                    
                    <h6 class="spot_items">定休日</h6><!--<small class="circle6"></small>-->
                    <p class='off'>{{$spot->off}}</p>
                    <br>
                    <br>
                </div>
            @endforeach
        </div>
        
        @else
        
        @endif
        
        {{--9件ずつペジネーション。このままだとエラーが出るので要編集。
        <div class='paginate'>
            {{ $spots->links() }}
        </div>
        --}}
    </body>
</head>

@endsection
