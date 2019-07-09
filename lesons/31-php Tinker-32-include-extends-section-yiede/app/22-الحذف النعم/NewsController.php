<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
// use view;

class NewsController extends Controller{

   public function all_news(Request $request){
    $all_news = News::withTrashed()->orderBy('id','desc')->get(['id','title','desc','add_by','status']);
    $soft_deletes = News::onlyTrashed()->orderBy('id','desc')->get(['id','title','desc','add_by','status']);
    return view('layout.all_news', ['all_news' => $all_news ,'trashed' => $soft_deletes]);
  }
  public function insert_news() {
       News::firstOrCreate([
          'title'   =>  Request ('title'),
          'desc'      =>  Request ('desc'),
            'add_by'  =>  Request ('add_by'),
            'content'   =>  Request ('content'),
            'status'  =>  Request ('status')
       ]);
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

