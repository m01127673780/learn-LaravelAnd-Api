<?php

Blade::if('check',function ()
{
if (auth()->check()) {
	 	return  false;
	 }else{
	 	return true;
	 }	 
}); 