<?php
/*
Blade::if('check',function ()
{
if (auth()->check()) {
	 	return  false;
	 }else{
	 	return true;
	 }	 
}); */

Blade::directive ('comment',function(){
 
 	return  view ('comment');
   });