@extends('admin.layout')
@section('page_title', 'Manage prodcut')

@section('container')
@if ($id>0)
    {{$image_required = ""}}
  @else
  {{$image_required = "required"}}
@endif

<h1 class="text-center">Manage Product</h1>
<a href="{{url('admin/prodcut')}}">
    <button type="button" class="btn btn-secondary">Back</button>
</a>

<div class="row">
<div class="col-lg-12 mt-5">
    
    <div class="card">       
    <div class="card-body">
    <form action="{{route('prodcut.manage_prodcut_process')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="control-label mb-1">name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{$name}}">
            @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

            <div class="form-group">
            <label for="brand" class="control-label mb-1"> Slug</label>
            <input id="slug" name="slug" type="text" class="form-control" value="{{$slug}}">
            @error('slug')
            <div class="alert alert-danger">
            {{$message}}
            </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="image" class="control-label mb-1"> Image</label>
            <input id="image" name="image" type="file" class="form-control" value="{{$image}}" {{$image_required}}>
            @error('image')
            <div class="alert alert-danger">
            {{$message}}
            </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="category_id" class="control-label mb-1">Category</label>
            <select id="category_id " type="text" class="form-control" value="{{$category_id}}">
                <option value="">Select Category</option>
                @foreach ($category as $list)

                <option value="{{$list->id}}">
                {{$list->category_name}}</option>
                @endforeach
            </select>
            </div>

        <div class="form-group">
            <label for="brand" class="control-label mb-1"> brand</label>
            <input id="brand" name="brand" type="text" class="form-control" value="{{$brand}}">
            @error('brand')
            <div class="alert alert-danger">
            {{$message}}
            </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="model" class="control-label mb-1">Model</label>
            <input id="model" name="model" type="text" class="form-control" value="{{$model}}">
            @error('model')
            <div class="alert alert-danger">
            {{$message}}
            </div>
                @enderror
        </div>
        
        <div class="form-group">
            <label for="short_desc" class="control-label mb-1">Short Desc</label>
            <input id="short_desc" name="short_desc" type="textarea" class="form-control" value="{{$short_desc}}">
            @error('short_desc')
            <div class="alert alert-danger">
            {{$message}}
            </div>
                @enderror
        </div>

        <div class="form-group">
            <label for="keywords" class="control-label mb-1">keywords</label>
            <input id="keywords" name="keywords" type="text" class="form-control" value="{{$keywords}}">
            @error('keywords')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="technical_specfication" class="control-label mb-1">Technical Specfication</label>
            <input id="technical_specfication" name="technical_specfication" type="text" class="form-control" value="{{$technical_specfication}}">
            @error('technical_specfication')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="uses" class="control-label mb-1">Uses</label>
            <input id="uses" name="uses" type="text" class="form-control" value="{{$uses}}">
            @error('uses')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="warranty" class="control-label mb-1">warranty </label>
            <input id="warranty" name="warranty" type="text" class="form-control" value="{{$warranty}}">
            @error('warranty')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status" class="control-label mb-1">status</label>
            <input id="status" name="status" type="text" class="form-control" value="{{$status}}">
            @error('status')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>


<div class="col-lg-12">
<div class="card">
<div class="card-body">
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
           <label for="sku" class="control-label mb-1">sku</label>
            <input id="sku" name="sku" type="text" class="form-control">
            @error('sku')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
            </div>

            <div class="col-md-1">
                <label for="mrp" class="control-label mb-1">mrp</label>
                 <input id="mrp" name="mrp" type="text" class="form-control">
                 @error('mrp')
                 <div class="alert alert-danger">
                     {{$message}}
                 </div>
                 @enderror
            </div>

            <div class="col-md-1">
                <label for="price" class="control-label mb-1">price</label>
                 <input id="price" name="price" type="text" class="form-control">
                 @error('price')
                 <div class="alert alert-danger">
                     {{$message}}
                 </div>
                 @enderror
            </div>

            <div class="col-md-3">
                <label for="size_id" class="control-label mb-1">Sizes</label>
                <select id="size_id" name="size_id" type="text" class="form-control">
                    <option value="">Select</option>
                    @foreach ($sizes as $list)
                  <option value="{{$list->id}}">
                    {{$list->size}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="color_id" class="control-label mb-1">Colors</label>
                <select id="color_id" name="color_id" type="text" class="form-control">
                    <option value="">Select</option>
                    @foreach ($colors as $list)
                  <option value="{{$list->id}}">
                    {{$list->color}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
</div>
</div>

        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit 
            </button>
        </div>
        <input type="hidden" name="id" value="{{$id}}">
    </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection 