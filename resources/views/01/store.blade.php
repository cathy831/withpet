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
            spot_name
            <div class="spot_name">
                <h2>場所名・店名</h2>
                <input type="text" name="spot[spot_name]" placeholder="50字以内" value="{{ old('spot.spot_name') }}"/>
                <p class="spot_name__error" style="color:red">{{ $errors->first('spot.spot_name') }}</p>
            </div>
            
            <div class="form-group">
              <label for="category-id">{{ __('カテゴリー') }}<span class="badge badge-danger ml-2">{{ __('(必須)') }}</span></label>
                <select class="form-control" id="category-id" name="category_id">
                     @foreach ($categories as $category)
                       <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                     @endforeach
                </select>
            </div>
            
            <div class="form-group">
              <label for="erea-id">{{ __('エリア') }}<span class="badge badge-danger ml-2">{{ __('(必須)') }}</span></label>
                <select class="form-control" id="erae-id" name="erea_id">
                     @foreach ($ereas as $erea)
                       <option value="{{ $erea->id }}">{{ $erea->erea_name }}</option>
                     @endforeach
                </select>
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
            {{--入れ方が合ってるか分からない。Reviewから引っ張ってくる内容なのでSpotと同じ感じでいいのか。
            <div class="body">
                <h2>クチコミ</h2>
                <textarea name="review[body]" placeholder="字以内"></textarea>
            </div>
            リダイレクト先に入れてしまえば書きやすい
            --}}
            <input type="submit" value="保存"/>
            <div class="back">[<a href="/top">戻る</a>]</div>
        </form>
       
    </body>
</html>