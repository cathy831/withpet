<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spot;
use App\Category;
use App\Erea;
use App\Review;
use App\User;
use App\Http\Requests\SpotRequest;
use Illuminate\Support\Facades\DB;

class SpotController extends Controller
{
    public function __construct()
    {
        $this->category = new Category();
        $this->erea = new Erea();
        $this->review = new Review();
        $this->user = new User();
    }
    
    public function index(Request $request, Spot $spot)
    {
        $categories = $this->category->get();
        $ereas = $this->erea->get();
        
        $category = $request['category_id'];
        $erea = $request['erea_id'];
        $erea_name = "";
        $category_name =[];
 
        $query = Spot::query();
        //先にereaで絞り込んで、categoryを絞り込み
 
        if (!empty($erea)) {
        //!は否定。空じゃないときにif文実行
            $query->where('erea_id',$erea );
            //第一引数は調べたいカラム、第二引数は絞り込みたい条件の値
            $erea_name = DB::table('ereas')->where('id', $erea)->first()->erea_name;
        }
 
        if (!empty($category)){
            foreach($category as $category_search){
                $query->whereHas('categories',function($q) use($category_search){
                $q->where('categories.id', $category_search);
                });
            }
            $category_name = DB::table('categories')->whereIn('id', $category)->get();
        }
 
        $spots = $query->get();
 
        return view('01/top', compact('spots', 'erea','categories','ereas','category_name','erea_name'));
    }
    
    public function show(Spot $spot)
    {
        return view('01/spot')->with(['spot' => $spot]);
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
        foreach($input3 as $category){
          $spot->categories()->attach($category); 
        }
        return redirect('/review/'.$spot->id);
        //リダイレクト先をレビューにしてスポット登録後にすぐクチコミを投稿できるように。
    }
    
    public function edit(Spot $spot)
    {
        $categories = $this->category->get();
        $ereas = $this->erea->get();
    
        return view('01/update', compact('categories','ereas'))->with(['spot' => $spot]);
    }
    
    public function update(SpotRequest $request, Spot $spot, Category $categories)
    {
        $input_spot = $request['spot'];
        $input4 = $request['erea_id'];
        $input_spot += ['erea_id'=> $input4];
        $input5 = $request['category_id'];
        
        $spot->fill($input_spot)->save();
        $spot->categories()->sync($input5);
        
        return redirect('/spot/'.$spot->id);
    }
    
    public function delete(Spot $spot)
    {
        $spot->delete();
        return redirect('/top');
    }
}
