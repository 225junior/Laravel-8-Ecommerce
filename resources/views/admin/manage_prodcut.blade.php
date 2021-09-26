@extends('admin.layout')
@section('page_title', 'Manage prodcut')

@section('container')
<h1 class="text-center">Manage Product</h1>
<a href="{{url('admin/prodcut')}}">
    <button type="button" class="btn btn-secondary">Back</button>
</a>

<div class="row">
    <div class="col-lg-12 mt-5">
       
        <div class="card">       
      <div class="card-body">
        <form action="{{route('prodcut.manage_prodcut_process')}}" method="post">
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
                <label for="slug" class="control-label mb-1"> Slug</label>
                <input id="slug" name="slug" type="text" class="form-control" value="{{$slug}}">
                @error('slug')
               <div class="alert alert-danger">
                {{$message}}
               </div>
                 @enderror
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