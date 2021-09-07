<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result['data'] = Category::all();  
       return view('admin.category', $result);
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
 
    public function manage_category()
    {
       return view('admin.manage_category');
    }


    public function manage_cateory_process(Request $request)  {
        $request->validate([
           'category_name' => 'required',
           'category_slug' => 'required|unique:categories'
        ]);

        $model = new Category();
        $model->category_name = $request->post('category_name');
        $model->category_slug = $request->post('category_slug');
        $model->save();
        $request->session()->flash('message', 'Category Inserted');
        return redirect('admin/category');
    }
   
}
