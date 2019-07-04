<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
// use view;
use validate;
use Session;
use Lang;
use DB;

class NewsController extends Controller{

   public function all_news(Request $request){
   Session::forget('message');
  //Session::flush();
    Session::push('message', ['key1' => 'val']);
    Session::put('message1', 'message1');
   Session::all();
    $all_news = News::withTrashed()->orderBy('id','desc')->get(['id','title','desc','add_by','status']);
    $soft_deletes = News::onlyTrashed()->orderBy('id','desc')->get(['id','title','desc','add_by','status']);
    return view('layout.all_news', ['all_news' => $all_news ,'trashed' => $soft_deletes]);
  }
  public function insert_news() {

    $attribute = [
          'title'   => trans('admin.title'),
          'desc'    => trans('admin.desc'),
          'add_by'  => trans('admin.add_by'),
          'content' => trans('admin.content'),
          'status'  => trans('admin.status'),
          ];

   $data=$this->validate(request(),[
          'title'   => 'required',
          'desc'    => 'required',
          'add_by'  => 'required',
          'content' => 'required',
          'status'  => 'required',
    ],[],$attribute); 
   $reslt =  DB::table('news')->insertGetID($data);
 //  return dd($reslt);
   //News::create($data);
 

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