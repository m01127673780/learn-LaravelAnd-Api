<?php

Blade::if('check',function(){
	return auth()->user()? true:false;
}); 

 // return dd( auth()->user());
// Blade::if('check',function (){

// if (auth()->check())
//  {
// 	 	return  false;
// 	 }else{
// 	 	return true;
// 	 }	 
// }); 
   