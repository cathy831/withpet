<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Spot;
use App\User;
use App\Image;
use Storage;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
        $this->spot = new Spot();
        $this->review = new Review();
        $this->image = new Image();
    }
    
    // public function show(Request $request, User $user, Review $review)
    // // レビュー一覧の表示メソッド
    // {
    //     $images = $this->image->get();
    //     $spots = $this->spot->get();
    //     $review_all = [];
    //     // 配列を受け取る変数
    //     foreach($spots as $spot)
    //     {
    //         if(DB::table('reviews')->where('spot_id', $spot->id)->exists()){
    //             // reviewsテーブルのspot_idカラムに選択されたidが入っている場合(レコード存在の判定)
    //             $review_parts = ['name'=>$spot->spot_name,'reviews'=>$spot->reviews()->get()];
    //             // 'name'に入れたいデータ、'reviews'に入れたいデータを指定
    //             array_push($review_all,$review_parts);
    //             // 入れたい配列名,入れるもの
    //         }
    //     }
        
    //     // return view('01/myreview',compact('images'))->with(['reviews' => $review_all]);
    //     return view('01/myreview',compact('images'))->with(['reviews' => $user->getOwnPaginateByLimit()]);
    // }
    
    public function add(Spot $spot)
    // レビュー新規投稿画面の表示メソッド
    {
        return view('01/newreview')->with(['spot' => $spot]);
    }
    
    public function store(Request $request, Spot $spot, Review $review)
    //レビュー新規投稿の保存メソッド
    {   
        
        $input=$request['review'];
        //review.bladeのinput〜name=のreviewの情報を引き出し。
        $input+=['spot_id' => $spot->id];
        $input += ['user_id' => $request->user()->id];
        
        $review->fill($input)->save();
        //インスタンスの空の$reviewに$inputの情報を渡す。
        
        
        $images=new Image;
        
        if(!$request->image){
        //imageが空ならno imageの画像を読み込む
            $images->url = 'review_image/B8E5EB41-97BB-4E37-99C9-4874E3D8B9AD.PNG';
            $images->review_id=$review->id;
            $images->save();
        }else{
        //imageに写真が入ってるならその写真を保存する
            $image=$request->file('image');
             //s3アップロード開始
            $path=Storage::disk('s3')->putFile('review_image', $image, 'public');
             //バケットの`review_image`フォルダへアップロード
             //アップロードした画像のフルパスを取得、第一引数がフォルダ名
            $images->url=$path;
            //フルパスではなく普通のパスを書く方がいい(s3上のキー)
            $images->review_id=$review->id;

            $images->save();
        }
        
        return redirect('/spot/'.$spot->id);
    }
    
    public function index(Review $review, Spot $spot)
    // 投稿済みレビューの編集画面表示メソッド
    {
        // $review=Review::where('id', $review->id)->first(); web.phpで書いてるからここで書かなくていい
        $spot=Spot::where('id', $review->spot_id)->first();
        return view('01/review', compact('review'))->with(['spot' => $spot]);
    }
    
    public function create(Request $request, Review $review, Spot $spot)
    // 投稿済みレビューの編集の保存メソッド→消す方がいいかも？
    {
        $input = $request['review'];
        //review.bladeのinput〜name=のreviewの情報を引き出し。。
        $input += ['spot_id' => $review->spot_id];
        $input += ['user_id' => $request->user()->id];
        
        $review->fill($input)->save();
        //インスタンスの空の$reviewに$inputの情報を渡す。
        
        $images = new Image;
        
        if(!$request->image){
        //imageが空ならno imageの画像を読み込む
            $images->url = 'review_image/B8E5EB41-97BB-4E37-99C9-4874E3D8B9AD.PNG';
            $images->review_id=$review->id;
            
            $images->save();
        }else{
        //imageに写真が入ってるならその写真を保存する
            $image = $request->file('image');
            //s3アップロード開始
            $path = Storage::disk('s3')->putFile('review_image', $image, 'public');
            //バケットの`review_image`フォルダへアップロード
            //アップロードした画像のフルパスを取得、第一引数がフォルダ名
            $images->url=$path;
            $images->review_id=$review->id;

            $images->save();
        }

        return redirect('/myreview');
        // 写真は小さめのデータで試す
        // クチコミのbodyを変える場合はまたコード書かないといけない。あとで！
    }
    
    public function delete(Review $review)
    // レビューの削除メソッド
    {
        $review->delete();
        return redirect('/myreview');
        // 写真を消す場合、S3から消してテーブルから消す.先にテーブルから消してしまうとS3がパスわからなくなる
    }
    
}
