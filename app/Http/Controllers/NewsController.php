<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use View;
class NewsController extends Controller{
   public function all_news(Request $request ){
    $all_news = News::orderBy('desc','desk')->get(['title','add_by','desc','content','status','id']);
    $soft_deletes = News::onlyTrashed()->orderBy('desc','desk')->get(['title','add_by','desc','content','status','id']);
    // $all_news = News::orderBy('desc','desk')->paginate(7);
    return view ('layout.all_news',['all_news' => $all_news,'trashed' => $soft_deletes]);
     } 
     public function insert_news()
{
      News::updateOrCreate([
					'title'=>request('title'),
					'desc'=>request('desc'),
					'add_by'=>request('add_by'),
					'content'=>request('content'),
					'status'=>request('status')
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
      } elseif (request()->has('delete') and request()->has('id')) {
        News::destroy(request('id'));
      }
    return redirect('all/news');
    }
}