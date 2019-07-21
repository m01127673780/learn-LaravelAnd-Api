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