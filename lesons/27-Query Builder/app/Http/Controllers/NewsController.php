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
 
 

    $all_news =    News::withTrashed()->orderBy('desc','desk')->get(['title','add_by','desc','content','status','id','deleted_at']);
    $soft_deletes= News::onlyTrashed()->orderBy('desc','desk')->get(['title','add_by','desc','content','status','id']);
    // $all_news = News::orderBy('desc','desk')->paginate(7);
    return view ('layout.all_news',['all_news' => $all_news,'trashed' => $soft_deletes]);
     } 
     public function insert_news(){
      $attribute=[
 


          'title'   =>Lang::get('admin.title'),
          'desc'    =>   trans('admin.desc'),
          'add_by'  =>   trans('admin.add_by'), 
          'content' =>   trans('admin.content'),
          'status'  =>   trans('admin.status'), 



        ];
$date = $this->validate(request(),[

          'title'   =>    'required',
          'desc'    =>    'required',
          'add_by'  =>    'required',
          'content' =>    'required',
          'status'  =>    'required',
],[],$attribute);

   
   News::create($date);
     //  News::updateOrCreate([
          // 'title'=>request('title'),v 
          // 'desc'=>request('desc'),
          // 'add_by'=>request('add_by'),
          // 'content'=>request('content'),
          // 'status'=>request('status')
     //  ]);
 
  
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