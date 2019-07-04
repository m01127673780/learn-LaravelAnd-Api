<?php

namespace App\Http\Controllers;
use App\News;
use Illuminate\Http\Request;
use View;
class NewsController extends Controller{

   public function all_news(Request $request ){
    // $all_news = News::orderBy('desc','desk')->get(['title','add_by','desc','content','status','id']);
    $all_news = News::orderBy('desc','desk')->paginate(7);
    return view ('layout.all_news',['all_news' => $all_news]);
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
      /*
      $add->title = request('title');
      $add->desc = request('desc');
      $add->add_by = request('add_by');
      $add->content = request('content');
      $add->status = request('status');
      $add->save();*/
      return redirect('all/news');
     } 
}
