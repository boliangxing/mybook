<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Entity\Category;
use App\Models\M3Result;
class BookController extends Controller
{
  public function getCategoryByParentId($paraent_id)
  {
    $categorys=Category::where('paraent_id',$paraent_id)->get();
    $m3_result=new M3Result;
    $m3_result->status=0;
    $m3_result->message='返回成功';
    $m3_result->category=$categorys;
    return $m3_result->toJson();
  }


}
