@if ($errors->any())
    <div >
        <ol class="btn-danger  ">
            @foreach ($errors->all() as $error)
               <li class="btn-danger  ">  {{ $error }}</li>
             @endforeach
        </ol>
    </div>
@endif
<hr><!-- 
@if(session()->has('Meseeg'))
 
<hr/>
{{   session()->get('Meseeg')[0] ['Key1'] }}4<hr>
{{   session()->get('Meseeg1')}}
 
 <hr>
  @endif -->