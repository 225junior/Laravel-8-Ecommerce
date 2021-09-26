<?php

namespace App\Http\Controllers;

use App\Models\Prodcut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdcutController extends Controller
{
    public function index(){
      $result['data'] = Prodcut::all();  
       return view('admin.prodcut', $result);
    }
 
    public function manage_prodcut(Request $request, $id=''){
       if ($id > 0){
          $arr = Prodcut::where(['id' => $id])->get();
          $result['category_id'] = $arr['0']->category_id;
          $result['name'] = $arr['0']->name;
          $result['image'] = $arr['0']->image;
          $result['slug'] = $arr['0']->slug;
          $result['brand'] = $arr['0']->brand;
          $result['model'] = $arr['0']->model;
          $result['short_desc'] = $arr['0']->short_desc;
          $result['keywords'] = $arr['0']->keywords;
          $result['technical_specfication'] = $arr['0']->technical_specfication;
          $result['uses'] = $arr['0']->uses;
          $result['warranty'] = $arr['0']->warranty;
          $result['status'] = $arr['0']->status;
         $result['id'] = $arr['0']->id;
       }else{
          $result['category_id'] = '';
          $result['name'] = '';
          $result['image'] = '';
          $result['slug'] = '';
          $result['brand'] = '';
          $result['model'] = '';
          $result['short_desc'] = '';
          $result['keywords'] = '';
          $result['technical_specfication'] = '';
          $result['uses'] = '';
          $result['warranty'] = '';
          $result['status'] = '';
          $result['id'] = '0';
       }
     
        return view('admin.manage_prodcut', $result);
    }


    public function manage_prodcut_process(Request $request)  {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            $request->post('id'),
        ]);

         if ($request->post('id')>0) {
            $model = Prodcut::find($request->post('id'));
            $msg = "Product Updated";
         }else{
            $model = new Prodcut();
            $msg = "Product Inserted";
        }

        $model->category_id = 1;
        $model->name = $request->post('name');
        $model->image = $request->post('image');
        $model->slug = $request->post('slug');
        $model->brand = $request->post('brand');
        $model->model = $request->post('model');
        $model->short_desc = $request->post('short_desc');
        $model->keywords = $request->post('keywords');
        $model->technical_specfication = $request->post('technical_specfication');
        $model->uses = $request->post('uses');
        $model->warranty = $request->post('warranty');
        $model->status = $request->post('status');
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('admin/prodcut');
    }

    public function delete(Request $request, $id){
    
       $model = Prodcut::find($id);
       $model->delete();
       $request->session()->flash('message', 'Product Deleted');
       return redirect('admin/prodcut');
    }

    //Active and Deactive status update
    public function status(Request $request, $status, $id){
      $model = Prodcut::find($id);
      $model->status=$status;
      $model->save();
      $request->session()->flash('message', 'product Status Updated');
      return redirect('admin/prodcut');
       
 }
}