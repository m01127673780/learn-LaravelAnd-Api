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
@if(session()->has('Meseeg'))
 
<hr/>
{{   session()->get('Meseeg')[0] ['Key1'] }}4<hr>
{{   session()->get('Meseeg1')}}
 
 <hr>
  @endif