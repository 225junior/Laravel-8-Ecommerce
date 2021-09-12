<?php

namespace App\Http\Controllers;
use App\Models\Copon;
use Illuminate\Http\Request;

class CoponController extends Controller
{
    public function index()
    {
      $result['data'] = Copon::all();  
       return view('admin.copon', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    public function manage_manage_copon(Request $request, $id=''){
       if ($id > 0){
          $arr = Copon::where(['id' => $id])->get();
          $result['title'] = $arr['0']->title;
          $result['code'] = $arr['0']->code;
          $result['value'] = $arr['0']->value;  
          $result['id'] = $arr['0']->id;
       }else{
          $result['title'] = '';
          $result['code'] = '';
          $result['value'] = '';
          $result['id'] = '0';
       }
       return view('admin.manage_copon', $result);
    }


    public function manage_copon_process(Request $request)  {
        $request->validate([
           'title' => 'required',
           'code' => 'required|unique:copon,code'. $request->post('id'),
           'value' => 'required',
        ]);

         if ($request->post('id')>0) {
            $model = manage_copon::find($request->post('id'));
            $msg = "manage_copon Updated";
         }else{
            $model = new manage_copon();
            $msg = "manage_copon Inserted";
         }
        $model->title = $request->post('title');
        $model->code = $request->post('code');
        $model->value = $request->post('value');
        
        $model->save();

        $request->session()->flash('message', $msg);
        return redirect('admin/copon');
    }

    public function delete(Request $request, $id){
    
       $model = Copon::find($id);
       $model->delete();
       $request->session()->flash('message', 'copon Deleted');
       return redirect('admin/copon');
    }
}
