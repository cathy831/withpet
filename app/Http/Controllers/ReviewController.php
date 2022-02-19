<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Spot;
use App\User;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->spot = new Spot();
    }
    
    public function index(Spot $spot)
    {
        return view('01/review')->with(['spot' => $spot]);
    }
    
    public function show(Review $review)
    {
        $spots = $this->spot->get();
        $aaa = [];
        // 配列を受け取る変数
        foreach($spots as $spot)
        {
            if(DB::table('reviews')->where('spot_id', $spot->id)->exists()){
                // reviewsテーブルのspot_idカラムに選択されたidが入っている場合(レコード存在の判定)
                $bbb = ['name'=>$spot->spot_name,'reviews'=>$spot->reviews()->get()];
                // 'name'に入れたいデータ、'reviews'に入れたいデータを指定
                array_push($aaa,$bbb);
                // 入れたい配列名,入れるもの
            }
        }
        
        return view('01/myreview')->with(['reviews' => $aaa]);
    }
    
    public function store(Request $request, Spot $spot,Review $review)
    {
        $input = $request['review'];
        //store.bladeのinput〜name=のspotの情報を引き出し。
        $input += ['spot_id' => $spot->id];
        
        $review->fill($input)->save();
        //インスタンスの空の$spotに$inputの情報を渡す。
        
        return redirect('/spot/'.$spot->id);
    }
    
    public function delete(Review $review)
    {
        $review->delete();
        return redirect('/myreview');
        // ルーティングの呼び出しになるので、web.php
        //  view関数の時だけフォルダからかく
    }
}
