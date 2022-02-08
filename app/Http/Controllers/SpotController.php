<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spot;
use App\Category;
use App\Erea;
use App\Http\Requests\SpotRequest;

class SpotController extends Controller
{
    public function index(Spot $spot)
    {
        return view('01/top')->with(['spots' => $spot->getPaginateByLimit()]);  
    }
    
    public function show(Spot $spot)
    {
        return view('01/spot')->with(['spot' => $spot]);
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
    
    public function store(SpotRequest $request, Spot $spot) 
    {
        $input = $request['spot'];
        //store.bladeのinput〜name=のspotの情報を引き出し。
        
        $input2 = $request['erea_id'];
        $input += ['erea_id' => $input2];
        //store.bladeのselect〜name=のerea_idを＄input2に入れて、それを$inputに渡す。
        
        $input3 = $request['category_id'];
        //store.bladeのselect〜name=のcategory_idを＄input3に入れる。
        //中間テーブルを通す必要があるからこの段階では$inputには入れない。
        
        $spot->fill($input)->save();
        //インスタンスの空の$spotに$inputの情報を渡す。
        
        $spot->categories()->attach($input3); 
        return redirect('/top');
        //リダイレクト先をレビューにしてスポット登録後にすぐクチコミを投稿できるように。
    }
    
    public function edit(Spot $spot)
    {
        $categories = $this->category->get();
        $ereas = $this->erea->get();
        return view('01/update', compact('categories','ereas'))->with(['spot' => $spot]);
    }
    
    public function update(SpotRequest $request, Spot $spot)
    {
        $input_spot = $request['spot'];
        $input4 = $request['erea_id'];
        $input_spot += ['erea_id'=> $input4];
        $input5 = $request['category_id'];
        
        $spot->fill($input_spot)->save();
        $spot->categories()->sync($input5);
        
        return redirect('/spot/'.$spot->id);
    }
}
