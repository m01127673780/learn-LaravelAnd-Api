
  
 @extends('index')
 @section('content')
 @section('css')
         <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

 @endsection

   @section('js')
         <script type="text/javascript">
           
           alert('MOhamed Saeed Jacoub');
         </script>
 @endsection


        <div class="flex-center position-ref full-height">
     
            <div class="content">
            <div class=" ">
           
<hr>
{!! Form::open(['url'=>'insert/news' ]) !!}
<div class="form-group">   
  {{Form::text('title',old('title'),['placeholder'=>'title'])}}<br>     
  {{Form::text('desc',old('desc'),['placeholder'=>'descripton'])}}<br>     
  {{Form::number('add_by',old('add_by'),['placeholder'=>'add_by',''])}}<br>     
  {{Form::textarea('content',old('content'),['placeholder'=>'content'])}}<br>     
  {{Form::select('status',[''=>'......','active'=>'active','pending'=>'pending','deactive'=>'deactive'],old('status'),['placeholder'=>' placeholdermmmmmmmmm'])}}<br>     
{{  Form::submit('send_btn')  }}
 {!! Form::close() !!}

  

            </div>
                            <form method="post" action="{{url('del/news')}}">
                            <input type="hidden" placeholder=""   name="_token" value="{{csrf_token()}}" >
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
               <tr>
 
                   <td>{{$news->title}}</td>   
                   <td>{{$news->add_by}}</td>
                    <td>{{$news->desc}}</td>
                    <td>{{$news->status}}</td>
          
<td>{{!empty($news->deleted_at)?'Trashed':'published'}}</td>
                    <td>                    <td>
                    <td>

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
@endsection 