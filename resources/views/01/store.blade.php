<!--新規スポット登録画面-->

@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WithPet</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/store.css') }}">
    </head>
    
    <body>
        <div class="all">
            
            <h3>新規スポット登録</h3>
            <br>
            
            <!--新規スポット投稿フォーム-->
            <form action="/top" method="POST">
                @csrf
            
                <div class="spot_name">
                    <h4 class="body_items">場所名・店名</h4>
                    <div>
                        <input type="text" name="spot[spot_name]" placeholder="50字以内" value="{{ old('spot.spot_name') }}"/>
                        <p class="spot_name__error" style="color:red">{{ $errors->first('spot.spot_name') }}</p>
                    </div>
                </div>
                <br>
            
                <div class="category">
                    <h4 class="body_items">目的</h4>
                    <div>
                        @foreach ($categories as $category)
                            <input name="category_id[{{$category->id}}]" type="checkbox" value="{{ $category->id }}" 
                                {{ old('category.'.$category->id) == $category->id ? 'checked' : '' }}>
                            <label class="form-check-label">
                                <p class="category_name">{{ $category->category_name }}</p>
                            </label>
                        @endforeach
                    </div>
                </div>
                <br>
            
                <div class="erea">
                    <h4 class="body_items">エリア</h4>
                    <div>
                        @foreach($ereas as $erea)
　　                        <input type="radio" name="erea_id" id="erea_id"  value="{{ $erea->id }}" 
                                {{ $erea->id == old('erea_id') ? 'checked' : ''}}/>
                            <label for="erea">
                                <p class="erea_name">{{ $erea->erea_name }}</p>
                            </label>  
                        @endforeach
                    </div>
                </div>
                <br>
                
                <div class="address">
                    <h4 class="body_items">住所</h4>
                    <div>
                        <input type="text" name="spot[address]" placeholder="100字以内" value="{{ old('spot.address') }}"/>
                        <p class="address__error" style="color:red">{{ $errors->first('spot.address') }}</p>
                    </div>
                </div>
                <br>
                
                <div class="open_close">
                    <h4 class="body_items">営業時間</h4>
                    <div>
                        <input type="text" name="spot[open_close]" placeholder="100字以内" value="{{ old('spot.open_close') }}"/>
                        <p class="open_close__error" style="color:red">{{ $errors->first('spot.open_close') }}</p>
                    </div> 
                </div>
                <br>
            
                <div class="off">
                    <h4 class="body_items">定休日</h4>
                    <div>
                        <input type="text" name="spot[off]" placeholder="100字以内" value="{{ old('spot.off') }}"/>
                        <p class="off__error" style="color:red">{{ $errors->first('spot.off') }}</p>
                    </div>
                </div>
                <br>
        
                <input type="submit" value="保存"/>
                <div class="back">
                    <a href="/top">戻る</a>
                </div>
            </form>
        </div>
    </body>
</html>
　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection