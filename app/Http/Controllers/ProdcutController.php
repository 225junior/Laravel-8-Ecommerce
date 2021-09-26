<?php

namespace App\Http\Controllers;

use App\Models\Prodcut;
use Illuminate\Http\Request;

class ProdcutController extends Controller
{
    public function index(){
      $result['data'] = Prodcut::all();  
       return view('admin.product', $result);
    }
 
    public function manage_product(Request $request, $id=''){
       if ($id > 0){
          $arr = Prodcut::where(['id' => $id])->get();
          $result['product'] = $arr['0']->product;
          $result['status'] = $arr['0']->status;
          $result['id'] = $arr['0']->id;
       }else{
          $result['product'] = '';
          $result['status'] = '';
          $result['id'] = '0';
       }
       return view('admin.manage_product', $result);
    }


    public function manage_product_process(Request $request)  {
        $request->validate([
            'product' => 'required|unique:products'
        ]);

         if ($request->post('id')>0) {
            $model = Prodcut::find($request->post('id'));
            $msg = "product Updated";
         }else{
            $model = new Prodcut();
            $msg = "product Inserted";

        }

        $model->product = $request->post('product');
       
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('admin/product');
    }

    public function delete(Request $request, $id){
    
       $model = Prodcut::find($id);
       $model->delete();
       $request->session()->flash('message', 'product Deleted');
       return redirect('admin/product');
    }

    //Active and Deactive status update
    public function status(Request $request, $status, $id){
      $model = Prodcut::find($id);
      $model->status=$status;
      $model->save();
      $request->session()->flash('message', 'product Status Updated');
      return redirect('admin/product');
       
 }
}