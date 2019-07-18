@include('header')
@include('messages')
<center style="    font-weight: 900;
    line-height: 1.2;
    font-size: 26px;"><span> </i> {{trans('admin.news')}}  <i class="fa fa-cog"  ></i> </span> &
  </i> {{trans('admin.news2')}}   <i class="fa fa-refresh"  ></i></span></center>
 @yield('content')
@include('footer')
 

