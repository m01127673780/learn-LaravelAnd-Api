<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use View;
use Session;
use Lang;
use DB;
class NewsController extends Controller{
   public function all_news(Request $request ){  
   //Session::->flush();

       Session::push('Meseeg',['Key1'=>'val1']);
       Session::put('Meseeg1','Key1 val1');
       Session::all();
 $all_news = News::withTrashed()->orderBy('desc','desk')->paginate(7);

    // $all_news =    News::withTrashed()->orderBy('desc','desk')->get(['title','user_id','desc','content','status','id','deleted_at']);
    $soft_deletes= News::onlyTrashed()->orderBy('desc','desk')->get(['title','user_id','desc','content','status','id']);
    return view ('layout.all_news',['all_news' => $all_news,'trashed' => $soft_deletes]);
     } 
     public function insert_news(){
      $attribute=[
 


          'title'   =>Lang::get('admin.title'),
          'desc'    =>   trans('admin.desc'),
          'user_id'  =>   trans('admin.user_id'), 
          'content' =>   trans('admin.content'),
          'status'  =>   trans('admin.status'), 



        ];
$date = $this->validate(request(),[

          'title'   =>    'required',
          'desc'    =>    'required',
          'user_id'  =>    'required',
          'content' =>    'required',
          'status'  =>    'required',
],[],$attribute);

 DB::table('news')->insertGetId( $date);
  
//      News::create($date);
     //  News::updateOrCreate([
					// 'title'=>request('title'),v 
					// 'desc'=>request('desc'),
					// 'user_id'=>request('user_id'),
					// 'content'=>request('content'),
					// 'status'=>request('status')
     //  ]);

       Session::push('Meseeg',['Key1'=>'val1']);
       Session::put('Meseeg1','Key1 val1');
  
       return redirect('all/news');
     } 
     public function delete($id=null){
      // return request($id);
      if($id != null)
      {
        $del =  News::find($id);
        $del->delete();
      }else if (request()->has('restore') and request()->has('id')) {
        News::whereIn('id',request('id'))->restore();
      }elseif (request()->has('forcedelete') and request()->has('id')) {
        News::whereIn('id',request('id'))->forceDelete();
      }elseif (request()->has('delete') and request()->has('id')) {
        News::destroy(request('id'));
      }
    return redirect('all/news');
    }
}