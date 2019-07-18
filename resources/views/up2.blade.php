
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

 
    </head>
    <body>
         
             <center><h1 >     You are visitor </h1></center>  
             <br>
             <br>
             <br>
             <br>
             <br>
             <br>
             <br>
             <br>

             <br>
             <br>
             <br>
             <br>
              
             <center>
             {!!Form::open(['files'=>true, 'url'=>'upload/file'])!!}
             {!!Form::file('file')!!}
             {!!Form::submit('Save')!!}
             {!!Form::close()!!}
  

         </center>  
 
     </body>
</html>
