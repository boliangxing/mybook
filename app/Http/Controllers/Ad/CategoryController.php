<?php
namespace App\Http\Controllers\Ad;
use App\Http\Controllers\Controller;
use App\Entity\Category;
use App\Models\M3Result;
use Illuminate\Http\Request;
class CategoryController extends Controller
{


     public function toCategory()
      {
        $categorys=Category::all();
        foreach ($categorys as $category) {
          # code...
          if($category->paraent_id!=null && $category->paraent_id!=''){

$category->parent=Category::find($category->paraent_id);

          }
        }
        return view('ad.category')->with('categorys',$categorys);
      }

           public function toCategoryAdd()
            {

$categorys= Category::whereNull('paraent_id')->get();
              return view('ad/category_add')->with('categorys',$categorys);
            }

            public function toCategoryEdit(Request $request){

            $id=$request->input('id','');
            $category=Category::find($id);
            $categorys= Category::whereNull('paraent_id')->get();

            return view('ad/category_edit')->with('category',$category)->with('categorys',$categorys);

            }

public function categoryAdd(Request $request ){

$name=$request->input('name','');
$category_no=$request->input('category_no','');
$paraent_id=$request->input('paraent_id','');
$category=new Category;
$category->name=$name;
$category->category_no=$category_no;
if($paraent_id!=''){

  $category->paraent_id=$paraent_id;

}
$category->save();
$m3_result =new M3Result;
$m3_result->status=0;
$m3_result->message='添加成功';
return  $m3_result->toJson();
}

public function categoryedit(Request $request ){
  $id=$request->input('id','');
  $category=Category::find($id);
$name=$request->input('name','');
$category_no=$request->input('category_no','');
$paraent_id=$request->input('paraent_id','');
$category->name=$name;
$category->category_no=$category_no;
if($paraent_id!=''){

  $category->paraent_id=$paraent_id;

}
$category->save();
$m3_result =new M3Result;
$m3_result->status=0;
$m3_result->message='修改成功';
return  $m3_result->toJson();
}
public function categorydel(Request $request){

$id=$request->input('id','');
Category::find($id)->delete();
$m3_result =new M3Result;
$m3_result->status=0;
$m3_result->message='删除成功';
return  $m3_result->toJson();

}

}
