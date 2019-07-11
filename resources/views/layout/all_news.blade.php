use Illuminate\Support\Facades\View;
 @extends('index')
@section('content')
@section('css')

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
@section('js')
<script type="text/javascript">
</script>
@endsection
<div class="flex-center position-ref full-height">
<div class="content" >
<div class=" ">
<hr>
{!! Form::open(['url'=>'insert/news' ]) !!}
<div class="form-group" style="padding:7px;max-width: 30%;">   
{{Form::text('title',old('title'),['placeholder'=>'title','class'=>'form-control'])}}<br>     
{{Form::text('desc',old('desc'),['placeholder'=>'descripton','class'=>'form-control'])}}<br>     
{{Form::number('user_id',old('user_id'),['placeholder'=>'user_id','class'=>'form-control'])}}<br>     
{{Form::textarea('content',old('content'),['placeholder'=>'content','class'=>'form-control'])}}<br>     
{{Form::select('status',[''=>'......','actiev'=>'actiev','pending'=>'pending','deactive'=>'deactive'],old('status'),['placeholder'=>' ........','class'=>'form-control'])}}<br>     
{{ Form::button('<i class="fa fa-edit fa-spin"></i> Send value ', ['type' => 'submit','Send value', 'class' => 'btn btn-primary  btn-sm'] )  }}
{!! Form::close() !!}
</div>
    <form method="post" action="{{url('del/news')}}">
    <input type="hidden" placeholder=""   name="_token" value="{{csrf_token()}}" >
    <input type="hidden"   name="_method" value="DELETE" > 
    <table border="1" cellpadding="1" cellspacing="1" class="table table-bordered ">
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
@foreach($all_news as $news)
<tr>
<td>{{$news->title}}</td>  
<td>{{$news->desc}}</td>
<td>{{$news->user_id()->first()->name }}</td>
<td>{{$news->status}}</td>
<td>{{!empty($news->deleted_at)?'Trashed':'published'}}</td>
<td>{{$news->id}}</td>
<td> <input type="checkbox" name="id[]" value="{{$news->id}}" ></td>
   <!-- <td>{{var_dump($news->deleted_at)}}</td> -->
</tr>
@endforeach 
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