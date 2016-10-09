<?php
namespace App\Http\Controllers\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Entity\Order;
use App\Models\M3Result;
class OrderController extends Controller
{
  public function toOrder(Request $request)
  {
    $orders = Order::all();
    return view('ad.order')->with('orders', $orders);
  }
  public function toOrderEdit(Request $request)
  {
    $order = Order::find($request->input('id', ''));
    return view('ad.order_edit')->with('order', $order);
  }
  public function orderEdit(Request $request)
  {
    $order = Order::find($request->input('id', ''));
    $order->status = $request->input('status', 1);
    $order->save();
    $m3_result = new M3Result;
    $m3_result->status = 0;
    $m3_result->message = '添加成功';
    return $m3_result->toJson();
  }
}
