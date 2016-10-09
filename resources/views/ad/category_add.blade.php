@extends('ad.master')
@section('content')
<form action="" method="post" class="form form-horizontal" id="form-category-add">

{{csrf_field()}}
  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>名称：</label>
    <div class="formControls col-5">
      <input type="text" class="input-text" value="" placeholder="" name="name" datatype="*" nullmsg="名称不能为空">
    </div>
    <div class="col-4"> </div>
  </div>


  <div class="row cl">
    <label class="form-label col-3"><span class="c-red">*</span>序号：</label>
    <div class="formControls col-5">
      <input type="number" value="0"class="input-text" value="" placeholder="" name="category_no"  datatype="*" nullmsg="序号不能为空">
    </div>
    <div class="col-4"> </div>
  </div>

  <div class="row cl">
    <label class="form-label col-3">父类别：</label>
    <div class="formControls col-5"> <span class="select-box" style="width:150px;">
      <select class="select" name="paraent_id" size="1">

        <option value="0">无</option>
        @foreach($categorys as $category)
    <option selected="" value="{{$category->id}}">{{$category->name}}</option>
        @endforeach


      </select>
      </span> </div>
  </div>

  <div class="row cl">
  <label class="form-label col-3">预览图：</label>
  <div class="formControls col-5">
    <img id="preview_id" src="/admin/images/icon-add.png" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
    <input type="file" name="file" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'preview_id');" />
  </div>
</div>

  <div class="row cl">
    <div class="col-9 col-offset-3">
      <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
    </div>
  </div>
</form>
@endsection


@section('my-js')
<script type="text/javascript">
$("#form-category-add").Validform({
  tiptype:2,
  callback:function(form){
$('#form-category-add').ajaxSubmit({
type:'post',
url:'/ad/service/category/add',
dataType:'json',
data:{
name:$('input[name=name]').val(),
category_no:$('input[name=category_no]').val(),
paraent_id:$('select[name=paraent_id] option:selected').val(),
_token:"{{csrf_token()}}"


},
success:function(data){

if(data==null){
layer.msg('服务器端错误',{icon:2,time:2000});
return;

}
if(data.status!=0){
layer.msg(data.message,{icon:2,time:2000});
return;

}
layer.msg(data.message,{icon:1,time:2000});
parent.location.reload();
},
error:function(xhr,status,error){

console.log(xhr);
console.log(status);
console.log(error);
layer.msg('ajax error',{icon:2,time:2000});


},beforeSend:function(xhr){

layer.load(0,{shade:false});

},

});

return false;


  }
});

</script>
@endsection
