<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Upload extends Controller
{
//     public function upload ()  {
  
//    		$this->validate(request(), ['file' => 'required|image|mimes:jpg,jpeg,png']);
 
//  		$file = request()->file('file');
//  		$name =$file->getClientOriginalName();
//   		$ext =$file->getClientOriginalExtension();
//   		$size =$file->getSize();
//   		$mim =$file->getMimeType();
//   		$realpath =$file->getRealpath();
// return $file->move(public_path('uploads'),'image_'.time().'.'.$ext);
//     }


        public function upload ()  {
  		$nicename = [];	
  		$i = 0;	
  			foreach (request()->file('file') as $file) 
  			{

  				$nicename['file.'.$i] = 'The File ('.($i+1).')';
  				$i++;
  			}

   		$this->validate(request(), ['file.*' => 'required|image|mimes:jpg,jpeg,png,PNG'],[],$nicename);
 
 		$files = request()->file('file');

		foreach ($files as $file) {
		 	
		

 		$name =$file->getClientOriginalName();
  		$ext =$file->getClientOriginalExtension();
  		$size =$file->getSize();
  		$mim =$file->getMimeType();
  		$realpath =$file->getRealpath();
return $file->move(public_path('uploads'),'image_'.time().'.'.$ext);
 }
 return back();
    }
} 

  