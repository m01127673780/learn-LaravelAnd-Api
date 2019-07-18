<tr>
<td>{{$news->title}}</td>  
<td>{{$news->desc}}</td>
<td>{{$news->user_id}}</td>
<td>{{$news->status}}</td>
<td>{{!empty($news->deleted_at)?'Trashed':'published'}}</td>
<td>{{$news->id}}</td>
<td> <input type="checkbox" name="id[]" value="{{$news->id}}" ></td>
   <!-- <td>{{var_dump($news->deleted_at)}}</td> -->
</tr>