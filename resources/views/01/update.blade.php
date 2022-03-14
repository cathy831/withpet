@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')

<!--スポット情報の更新-->
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
<body>
    <div class="all">
        <h3>スポット情報の更新</h3>
        <form action="/spot/{{ $spot->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class='content__spot_name'>
                <h4 class="body_items">場所名・店名</h4>
                <div>
                    <input type='text' name='spot[spot_name]' placeholder="50字以内" value="{{ $spot->spot_name }}">
                    <p class="spot_name__error" style="color:red">{{ $errors->first('spot.spot_name') }}</p>
                </div>
            </div>
            <br>
            
            <div class='content__category_id'>
              <h4 class="body_items">目的</h4>
                <div>
                    @foreach ($categories as $category)
                        @if ($spot->categories->contains('id', $category->id))
                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}" checked>
                        @else
                            <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                        @endif
                        <label for="category">
                            <p class="category_name">{{ $category->category_name }}</p>
                        </label>
                    @endforeach
                </div>
            </div>
            <br>
            
            <div class="content__erea_id">
              <h4 class="body_items">エリア</h4>
                <div>
                    @foreach($ereas as $erea)
                        <input type="radio" name="erea_id" id="erea_id"  value="{{ $erea->id }}" 
                            {{ $erea->id === old('erea_id', $spot->erea->id) ? 'checked' : ''}}/>
                        <label for="erea">
                            <p class="erea_name">{{ $erea->erea_name }}</p>
                        </label>  
                    @endforeach
                </div>
            </div>
            <br>
           
            <div class='content__address'>
                <h4 class="body_items">住所</h4>
                <div>
                    <input type='text' name='spot[address]' placeholder="100字以内" value="{{ $spot->address }}">
                    <p class="address__error" style="color:red">{{ $errors->first('spot.address') }}</p>
                </div>
            </div>
            <br>
            
             <div class='content__open_close'>
                <h4 class="body_items">営業時間</h4>
                <div>
                    <input type='text' name='spot[open_close]' placeholder="100字以内" value="{{ $spot->open_close }}">
                    <p class="open_close__error" style="color:red">{{ $errors->first('spot.open_close') }}</p>
                </div>
            </div>
            <br>
            
            <div class='content__off'>
                <h4 class="body_items">定休日</h4>
                <div>
                    <input type='text' name='spot[off]' placeholder="100字以内" value="{{ $spot->off }}">
                    <p class="off__error" style="color:red">{{ $errors->first('spot.off') }}</p>
                </div>
            </div>
            <br>
            
            <div class="footer">
                <input type="submit" value="保存">
                <a href="/spot/{{$spot->id}}">戻る</a>
            </div>
        </form>
    </div>
</body>
　　　　　　　　  　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
@endsection