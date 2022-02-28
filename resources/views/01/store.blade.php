@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!--新規スポット登録画面-->
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
       
       <form action="/top" method="POST">
            @csrf
            
            <div class="spot_name">
                <h2>場所名・店名</h2>
                <input type="text" name="spot[spot_name]" placeholder="50字以内" value="{{ old('spot.spot_name') }}"/>
                <p class="spot_name__error" style="color:red">{{ $errors->first('spot.spot_name') }}</p>
            </div>
            
            <div class="category">
              <h2>目的</h2>
                @foreach ($categories as $category)
                  <input name="category_id[{{$category->id}}]" type="checkbox" value="{{ $category->id }}" 
                    {{ old('category.'.$category->id) == $category->id ? 'checked' : '' }}>
                  <label class="form-check-label">
                      {{ $category->category_name }}
                  </label>
                @endforeach
            </div>
            
            <div class="erea">
              <h2>エリア</h2>    
                @foreach($ereas as $erea)
　　              <input type="radio" name="erea_id" id="erea_id"  value="{{ $erea->id }}" 
                    {{ $erea->id == old('erea_id') ? 'checked' : ''}}/>
                  <label for="erea">
                    {{ $erea->erea_name  }}
                  </label>  
                @endforeach
            </div>
            
            <div class="address">
                <h2>住所</h2>
                <input type="text" name="spot[address]" placeholder="100字以内" value="{{ old('spot.address') }}"/>
                <p class="address__error" style="color:red">{{ $errors->first('spot.address') }}</p>
            </div>
            
            <div class="open_close">
                <h2>営業時間</h2>
                <input type="text" name="spot[open_close]" placeholder="100字以内" value="{{ old('spot.open_close') }}"/>
                <p class="open_close__error" style="color:red">{{ $errors->first('spot.open_close') }}</p>
            </div>
            
            <div class="off">
                <h2>定休日</h2>
                <input type="text" name="spot[off]" placeholder="100字以内" value="{{ old('spot.off') }}"/>
                <p class="off__error" style="color:red">{{ $errors->first('spot.off') }}</p>
            </div>
    
            <input type="submit" value="保存"/>
            <div class="back">
                <a href="/top">戻る</a>
            </div>
        </form>
       
    </body>
</html>
　　　　　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection