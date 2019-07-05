<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
       
    </head>
    <body>
    </h1>
        <div class="flex-center position-ref full-height">

           
<form method="post" action="{{url('insert/news')}}">
            {!! csrf_field() !!}
            <input        type="text"      name="title"  value="title"  placeholder="title"   >     <br> 
            <input        type="number"    name="add_by"  value="5"     placeholder="add_by"   ><br> 
            <input        type="text"      name="desc"     value="desc" placeholder="desc" ><br> 
             <textarea     type="text"      name="content"                placeholder="content"   >content</textarea><br>
            <select name="status">
            <option value ="active">active</option>
            <option value ="pending">pending</option>
            <option value ="deactive">deactive</option>
            </select><br><br><br><br><br>
            <input       type="submit"   value="Sand"  >
           </form><!--form-->
<br><br><br>
            <div class="content">
            
                <table border=""> 

                    <th>Title</th> 
                    <th>addby</th>
                     <th>Desc</th>
                     <th>content</th>
                    <th>status</th>
                    <th>id</th>
                    <form method="post" action="{{url('del/news')}}">

                  @foreach($all_news as $news)
                  <tr>
                     <td>{{$news->title}}</td>   
                    <td>{{$news->add_by}}</td>
                    <td>{{$news->desc}}</td>
                    <td>{{$news->content}}</td>
                    <td>{{$news->status}}</td>
                    <td> 

                         {!! csrf_field ()!!}
                        <input type="hidden" method="_method" value="delete">
                        <input type="checkbox" name="id[]" value="{{$news->id}}">
                    </td>
                </tr>
                  @endforeach
                  <input type="submit" value="deletMultple">

                                         </form>

               </table>
               </div>
        </div>
    </body>
</html>