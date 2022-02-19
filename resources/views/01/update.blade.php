<title>Withpet</title>
<body>
    <h1 class="title">スポット情報の更新</h1>
    <div class="content">
    {{--デザインの時にひとまとめで使える--}}
        <form action="/spot/{{ $spot->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class='content__spot_name'>
                <h3>場所名・店名</h3>
                <input type='text' name='spot[spot_name]' placeholder="50字以内" value="{{ $spot->spot_name }}">
                <p class="spot_name__error" style="color:red">{{ $errors->first('spot.spot_name') }}</p>
            </div>
            
            <div class='content__category_id'>
              <h2>目的</h2>
                @foreach ($categories as $category)
                    @if ($spot->categories->contains('id', $category->id))
                        <input type="checkbox" name="category_id[]" value="{{ $category->id }}" checked>
                    @else
                        <input type="checkbox" name="category_id[]" value="{{ $category->id }}">
                    @endif
                    <label for="category">
                        {{ $category->category_name }}
                    </label>
                @endforeach
            </div>
            
            <div class="content__erea_id">
              <h2>エリア</h2>    
                @foreach($ereas as $erea)
　　              <input type="radio" name="erea_id" id="erea_id"  value="{{ $erea->id }}" 
                    {{ $erea->id === old('erea_id', $spot->erea->id) ? 'checked' : ''}}/>
                  <label for="erea">
                    {{ $erea->erea_name }}
                  </label>  
                @endforeach
            </div>
           
            <div class='content__address'>
                <h3>住所</h3>
                <input type='text' name='spot[address]' placeholder="100字以内" value="{{ $spot->address }}">
                <p class="address__error" style="color:red">{{ $errors->first('spot.address') }}</p>
            </div>
            
             <div class='content__open_close'>
                <h3>営業時間</h3>
                <input type='text' name='spot[open_close]' placeholder="100字以内" value="{{ $spot->open_close }}">
                <p class="open_close__error" style="color:red">{{ $errors->first('spot.open_close') }}</p>
            </div>
            
             <div class='content__off'>
                <h3>定休日</h3s>
                <input type='text' name='spot[off]' placeholder="100字以内" value="{{ $spot->off }}">
                <p class="off__error" style="color:red">{{ $errors->first('spot.off') }}</p>
            </div>
            
            <div class="footer">
                <input type="submit" value="保存">
                <a href="/spot/{{$spot->id}}">戻る</a>
            </div>
        </form>
    </div>
</body>