@extends('master')

@section('title', "$product->name")

@section('content')
<link href="/css/datouwang.css" rel="stylesheet" type="text/css" />

<div class="page .bk_content">
<div id="fsD1" class="focus" style="margin-left:0px,width:1px">
    <div id="D1pic1" class="fPic">
      @foreach ($pdt_images as $pdt_image)
        <div class="fcon" style="display: none;">
      <a href="javascript:;"><img  style="width:500px"src="{{$pdt_image->image_path}}"></a>
            <span class="shadow"><a  href="#"></a></span>
        </div>
@endforeach
    </div>
    <div class="fbg">
    <div class="D1fBt" id="D1fBt">
        <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>1</i></a>
        <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>2</i></a>
        <a href="javascript:void(0)" hidefocus="true" target="_self" class="current"><i>3</i></a>
        <a href="javascript:void(0)" hidefocus="true" target="_self" class=""><i>4</i></a>
    </div>
    </div>
    <span class="prev"></span>
    <span class="next"></span>
</div>





<div class="weui_cells_title">
<span class="bk_title">{{$product->name}}</span>

  <span class="bk_price" style="float:right;">￥{{$product->price}}</span>

</div>

<div class="weui_cells">
<div class="weui_cell">

<p class="bk_summary">{{$product->summary}} </p>
 </div>
 </div>

<div class="weui_cells_title">详细介绍</div>
<div class="weui_cells">
<div class="weui_cell">

<p> {!!$pdt_content->content!!}</p>
</div>

</div></div>
<div class="bk_fix_bottom">
<div class="bk_half_area" style="float:left">
<button class="weui_btn weui_btn_primary"  id="gogogo">加入购物车</button>

 </div>
 <div class="bk_half_area"style="float:right">
 <button class="weui_btn weui_btn_default">结算(<span id="cart_num"class="m3_price">{{$count}}</span>)</button>

  </div>
</div>


@endsection
@section('my-js')
<script type="text/javascript" src="/js/koala.min.1.5.js"></script>
<script type="text/javascript">
Qfast.add('widgets', { path: "/js/terminator2.2.min.js", type: "js", requires: ['fx'] });
	Qfast(false, 'widgets', function () {
		K.tabs({
			id: 'fsD1',   //焦点图包裹id
			conId: "D1pic1",  //** 大图域包裹id
			tabId:"D1fBt",
			tabTn:"a",
			conCn: '.fcon', //** 大图域配置class
			auto: 1,   //自动播放 1或0
			effect: 'fade',   //效果配置
			eType: 'click', //** 鼠标事件
			pageBt:true,//是否有按钮切换页码
			bns: ['.prev', '.next'],//** 前后按钮配置class
			interval: 3000  //** 停顿时间
		})
	})



</script>
<script type="text/javascript">

$('#gogogo').click(function () {
  var product_id="{{$product->id}}";
       $.ajax({
         type: "GET",
         url: '/service/cart/add/'+product_id,
         dataType: 'json',
         cache: false,
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

   var num =$('#cart_num').html();
   if (num=='')num=0;
   $('#cart_num').html(Number(num)+1);}


         });
       });


</script>
@endsection
