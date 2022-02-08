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
              <label for="category-id">{{ __('カテゴリー') }}<span class="badge badge-danger ml-2">{{ __('(必須)') }}</span></label>
                 <select class="form-control" id="category-id" name="category_id">
                     {{-- value="{{$category->category_name}}--}}
                     @foreach ($categories as $category)
                           <!-- 初期表示時 -->
                           @if ($category->id == old('id'))
                              <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                           @else
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                           @endif
                     @endforeach
                 </select>    
            </div>
            
            <div class='content__erea_id'>
              <label for="erea-id">{{ __('エリア') }}<span class="badge badge-danger ml-2">{{ __('(必須)') }}</span></label>
                 <select class="content__erea_id" id="erae-id" name="erea_id">
                     {{-- value="{{ $erea->erea_name }}--}}
                     @foreach ($ereas as $erea)
                       <option value="{{ $erea->id }}">{{ $erea->erea_name }}</option>
                     @endforeach
                 </select>
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
            
            <input type="submit" value="保存">
        </form>
    </div>
</body>