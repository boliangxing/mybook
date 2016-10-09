@extends('master')

@section('title', '购物车')

@section('content')
<div class="page bk_content" style="top:0px;">
   @foreach ($cart_items as $cart_item)
  <div class="weui_cells weui_cells_checkbox" >

<label  class="weui_cell weui_check_label" for="{{$cart_item->product->id}}">
<div  class="weui_cell_hd" style="width:23px;height:23px">
<input type="checkbox" class="weui_check"name="cart_item" id="{{$cart_item->product->id}}">
<i class="weui_icon_checked"></i>
</div>
<div class="weui_cell_bd weui_cell_primary">
<div style="position: relative">
<img class="bk_preview" src="{{$cart_item->product->preview}}"class="m3_preview" onclick=""></div>
<div style="position:absolute left:100px;right:0px;top:0px">
<p>{{$cart_item->product->name}}</p>
<p class="bk_time" style="margin-top:15px;color:black">数量:<span class="bk_summary">：x{{$cart_item->count}}</span></p>
<p class="bk_time"  style="color:black">总计:<span class="bk_price"style="color:red">￥{{$cart_item->product->price * $cart_item->count }}</span></p>



</div>
</div>
</div>


</label>
@endforeach

  </div>
  <div class="bk_fix_bottom">
  <div class="bk_half_area" style="float:left">
  <button class="weui_btn weui_btn_primary" id="jiesuanForCart" >结算</button>

   </div>
   <div class="bk_half_area"style="float:right">
   <button id="deleteForCart"class="weui_btn weui_btn_default" >删除</button>

    </div>
  </div>
@endsection
@section('my-js')
<script type="text/javascript">

$('input:checkbox[name=cart_item]').click(function(){

  var checked=$(this).attr('checked');
  if(checked =='checked'){
  $(this).attr('checked',false);
  $(this).next().removeClass('weui_icon_checked');

  $(this).next().addClass('weui_icon_unchecked');

  }else {
    $(this).attr('checked','checked');
    $(this).next().removeClass('weui_icon_unchecked');

    $(this).next().addClass('weui_icon_checked');

  }



});
$('#deleteForCart').click(function () {
var product_ids_arr=[];
$('input:checkbox[name=cart_item]').each(function(index,e){
     if($(this).attr('checked')=='checked'){
product_ids_arr.push($(this).attr('id'));
      }


});
if(product_ids_arr.length==0){
  $('.bk_toptips').show();
  $('.bk_toptips span').html('请选择删除项');
  setTimeout(function() {$('.bk_toptips').hide();}, 2000);
  return;

}
$.ajax({
  type: "GET",
  url: '/service/cart/delete',
  dataType: 'json',
  cache: false,
   data:{product_ids:product_ids_arr+'' },
   success: function(data) {
    if(data == null) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html('服务端错误');
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
    if(data.status != 0) {
      $('.bk_toptips').show();
      $('.bk_toptips span').html(data.message);
      setTimeout(function() {$('.bk_toptips').hide();}, 2000);
      return;
    }
 location.reload();

  }
});
});

$('#jiesuanForCart').click(function () {
  var product_ids_arr=[];
  $('input:checkbox[name=cart_item]').each(function(index,e){
       if($(this).attr('checked')=='checked'){
  product_ids_arr.push($(this).attr('id'));
        }


  });
  if(product_ids_arr.length==0){
    $('.bk_toptips').show();
    $('.bk_toptips span').html('请选择提交项');
    setTimeout(function() {$('.bk_toptips').hide();}, 2000);
    return;

  }
location.href='/order_commit/'+product_ids_arr;



});

</script>
@endsection
