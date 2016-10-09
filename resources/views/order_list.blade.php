@extends('master')

@section('title', '订单列表')

@section('content')
@foreach($orders as $order)
<div class="weui_cells_title">
<span>订单号:{{$order->order_no}}</span>
<span style="float:right;" class="bk_price">未支付</span>
</div>
<div class="weui_cells">
@foreach($order->order_items as $order_item)
<div class="weui_cell">
<div class="weui_cell_hd">
<img src="{{$order_item->product->preview}}"alt="" class="bk_icon">
 </div>
<div class="weui_cell_bd weui_cell_primary">
<p class="bk_summary">{{$order_item->product->name}}</p>

</div>
<div class="weui_cell_ft">
<span class="bk_summary">{{$order_item->product->price}} </span>
<span>x</span>
<span class="bk_important"> {{$order_item->count}}</span>
 </div>
</div>
@endforeach
</div>

@endforeach
<div class="weui_cells_tips" style="text-align:right;">共计2件, 合计<span class="bk_price">{{$order->total_price}}</span></div>
@endsection
@section('my-js')
<script type="text/javascript">



</script>
@endsection