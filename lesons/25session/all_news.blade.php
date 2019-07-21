<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>all_news</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
 
    </head>
    <body>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<hr>

@if(session()->has('message'))
<hr>
{{  session()->get('message')[0]['key1']}}
{{  session()->get('message1')}}
 <hr>
@endif
<hr>

        <div class="flex-center position-ref full-height">
     
            <div class="content">
            <div class=" ">
                <form method="post" action="{{url('insert/news')}}">
                    <input type="hidden" name="_token"   value="{{csrf_token()}}">

                    <input type="text"   name="title"    value="{{old('title')}}"    placeholder="title"  ><br><br>
                    <input type="text"   name="desc"     value="{{old('desc')}}"     placeholder="desc"   > <br><br> 
                    <input type="number" name="add_by"   value="{{old('add_by')}}"   placeholder="add_by"  min="1" max="5" ><br><br>
                    <textarea            name="content"  value="{{old('content')}}"  placeholder="content">{{old('content')}}</textarea> <br><br>
                    <select              name="status"       placeholder="status" >   <br><br>
                    <option >......</option>
                    <option value="active"    {{old ('status') == 'active'?'selected':''}} >active</option>
                    <option value="pending "  {{old ('status') == 'pending'?'selected':''}}  >pending</option>
                    <option value="deactive"  {{old ('status') == 'deactive'?'selected':''}}  >deactive</option>
                    </select>
                    <input type="submit"  value="submit">
                </form>
            </div>
                            <form method="post" action="{{url('del/news')}}">
                            <input type="hidden"   name="_token" value="{{csrf_token()}}" >
                            <input type="hidden"   name="_method" value="DELETE" > 

               <table border="1" cellpadding="1" cellspacing="1">
              <tr>
                  <th>Titel</th>
                  <th>Desc</th>
                  <th>addby</th>
                  <th>status</th>
                  <th>deleted Status</th>
                  <th>action</th>

              </tr>                 

               @foreach($all_news as $news)
               <tr>>
                   <td>{{$news->title}}</td>   
                   <td>{{$news->add_by}}</td>
                    <td>{{$news->desc}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{!empty($news->deleted_at)?'Trashed':'published'}}</td>
                    <td>{{$news->id}}</td>
                    <td>    
                            <input type="checkbox" name="id[]" value="{{$news->id}}" >
                    </td>
               </tr>
               @endforeach 
              </table> <!--table--> 
              <br>
                <input type="submit" name="delete" value="delete  multiple" >
                <input type="submit" name="forcedelete" value="force delete" >


                </form>  


<hr> <center> trashed</center>
                   <form method="post" action="{{url('del/news')}}">
                            <input type="hidden"   name="_token" value="{{csrf_token()}}" >
                            <input type="hidden"   name="_method" value="DELETE" > 

               <table border="1" cellpadding="1" cellspacing="1">
              <tr>
                  <th>Titel</th>
                  <th>Desc</th>
                  <th>addby</th>
                  <th>status</th>
                  <th>action</th>

              </tr>                 

               @foreach($trashed as $trash)
               <tr>>
                   <td>{{$trash->title}}</td>   
                   <td>{{$trash->add_by}}</td>
                    <td>{{$trash->desc}}</td>
                    <td>{{$trash->status}}</td>
                    <td>{{$trash->id}}</td>
                    <td>    
                            <input type="checkbox" name="id[]" value="{{$trash->id}}" >
                    </td>
               </tr>
               @endforeach       

              </table> <!--table--> 
              <br> 
                <input type="submit" name="restore" value="restore" >
                <input type="submit" name="forcedelete" value="force delete" >

                </form>
             </div><!--content-->
        </div>
    </body>
</html>
