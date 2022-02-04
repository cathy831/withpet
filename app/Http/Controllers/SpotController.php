<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spot;
use App\Category;
use App\Erea;

class SpotController extends Controller
{
    public function index(Spot $spot)
    {
        return view('01/top')->with(['spots' => $spot->get()]);  
    }
    
    public function __construct()
    {
        $this->category = new Category();
        $this->erea = new Erea();
    }
    
    public function create(Request $request)
    {
        $categories = $this->category->get();
        $ereas = $this->erea->get();
        return view('01/store', compact('categories','ereas'));
    }
    
    public function store(Request $request, Spot $spot) //空のSpotインスタンスっていうのは上のインスタンスと違って{}内で定義してないから？
    {
        $input = $request['spot'];
        $input2 = $request['erea_id'];
        $input += ['erea_id' => $input2];
        $input3 = $request['category_id'];
        //あんまここの構造わからん。store.bladeのinput〜name=のspotを指してる
        //idの入れ方1.コントローラー2.bladeでinputタグ
        $spot->fill($input)->save();
        //ここで空の$spotに情報が入ってる。↓でカテゴリーと紐付け
        $spot->categories()->attach($input3); 
        return redirect('/top');
        //リダイレクト先をレビューにしてしまおう。
    }
}
