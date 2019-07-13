@extends('index')
@section('content')
@section('css')

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
@section('js')
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
     $(document).on('click','#add_news', function () { 
       var form = $('#news').serialize();
       var url = $('#news').attr('action');
         $.ajax({
            url:url,
            dataType:'json',
            data:form,
            type:'post',
            beforeSend: function(){
                   $('.alert_error h1').empty();
                   $('.alert_error ul').empty();
            },success:function (data){
                if (data.status == true ) {
                 $('list_news tbody').prepend(data.result);
                 $('#news')[0].reset();
                }
            },error: function(data_error,exception){
                if(exception == 'error') 
                    console.log(data_error);
                  // alert(data_error.message);
                  var error_list = '';
                 $('.alert_error h1').html(data_error.responseJSON.message);
                 $.each(data_error.responseJSON.errors,function(index,v){
                    error_list += '<li>'+v+'</li>'
                 $('.alert_error ul').html(error_list);
                  });
            }
         });
        // return false;
});
</script>
 
 
 



@endsection
<div class="alert_error">
   
     <center><h1></h1></center>
     <ul>
         
     </ul>

</div>
<div class="flex-center position-ref full-height">
<div class="content" >
<div class=" ">
<hr>
{!! Form::open(['url'=>'insert/news','id'=>'news' ]) !!}

<div class="form-group" style="padding:7px;max-width: 30%;">   
{!!Form::text('title',old('title'),['placeholder'=>'title','class'=>'form-control'])!!}<br>     
{!!Form::text('desc',old('desc'),['placeholder'=>'descripton','class'=>'form-control'])!!}<br>     
{!!Form::number('user_id',old('user_id'),['placeholder'=>'user_id','class'=>'form-control'])!!}<br>     
{!!Form::textarea('content',old('content'),['placeholder'=>'content','class'=>'form-control'])!!}<br>     
{!!Form::select('status',[''=>'......','actiev'=>'actiev','pending'=>'pending','deactive'=>'deactive'],old('status'),['placeholder'=>' ........','class'=>'form-control'])!!}<br>
<input type="submit" value="seeend" id="add_news">

{!! Form::close() !!}
</div>
    <form method="post" action="{{url('del/news')}}">
    <input type="hidden" placeholder=""   name="_token" value="{{csrf_token()}}" >
    <input type="hidden"   name="_method" value="DELETE" > 
    <table border="1" cellpadding="1" cellspacing="1" class="  list_news  table table-bordered ">
    <thead class="btn-light">
    <tr>
    <th >Titel</th>
    <th >Desc</th>
    <th >addby</th>
    <th >status</th>
    <th >deleted </th>
    <th >action</th>
    <th >ch</th>
    </tr>            
</thead>    
<tbody >               
@foreach($all_news as $news)
@include('layout.row_news')
@endforeach 
</tbody>
</table> <!--table--> 
{!! $all_news-> render() !!}
<br>
<!--  <input type="submit" name="delete" value="delete  multiple" >
<input type="submit" name="forcedelete" value="force delete" > -->
<button type="submit" name="delete" class="btn-primary">
<i class="fa fa-refresh" aria-hidden="true"></i>
delete  multiple 
</button>
<!-- <input type="submit" name="forcedelete" value="force delete " > -->
<button type="submit" name="forcedelete" class="btn-danger">
force delete <i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
</form>  
<hr> <center> trashed</center>
<form method="post" action="{{url('del/news')}}">
    <input type="hidden"   name="_token" value="{{csrf_token()}}" >
    <input type="hidden"   name="_method" value="DELETE" > 
<table border="1" cellpadding="1" cellspacing="1" class="table table-bordered table-dark">
<thead class="btn-light">
<tr >
<th>Titel</th>
<th>Desc</th>
<th>addby</th>
<th>status</th>
<th>action</th>
<th>ch</th>
</tr>                 
</thead>
@foreach($trashed as $trash)
<tr>>
<td>{{$trash->title}}</td>   
<td>{{$trash->user_id}}</td>
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
<!-- <input type="submit" name="restore" value="restore" > -->
<button type="submit" name="restore" class="btn-primary">
<i class="fa fa-repeat" aria-hidden="true"> restore This</i>
</button>
<!--<input type="submit" name="forcedelete" value="force delete " > -->
<button type="submit" name="forcedelete" class="btn-danger">
force delete <i class="fa fa-trash-o" aria-hidden="true"></i>
</button>
</form>
</div><!--content-->
</div><br><br><br>
@endsection 