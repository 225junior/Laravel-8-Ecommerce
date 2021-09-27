@extends('admin.layout')
@section('page_title', 'prodcut')
@section('prodcut_select', 'active')

@section('container')
@if (session()->has('message'))
<h1 class="text-center">prodcut</h1>
    <div class="alert alert-success">
    {{session('message')}}
    </div>
 @endif
<a href="{{url('admin/prodcut/manage_prodcut')}}">    
    <button type="button" class="btn btn-secondary">Add Products</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>ID</th>
                <th> Name</th>
                <th> Image</th>
                <th> Slug</th>
                <th>Action</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($data as $list)
               <tr>
                <th>{{$list->id}}</th>
                <th>{{$list->name}}</th>
                <th><img src="{{asset('storage/media/'. $list->image)}}"></th>
                <th>{{$list->slug}}</th>
                <th>
                <a href="{{url('admin/prodcut/delete')}}/{{$list->id}}">
                <button type="button" class="btn btn-danger">Delete</button></a>
                
              @if ($list->status == 1)
              <a href="{{url('admin/prodcut/status/0')}}/{{$list->id}}">
                <button type="button" class="btn btn-primary">Active</button></a>
              @elseif($list->status == 0)
              <a href="{{url('admin/prodcut/status/1')}}/{{$list->id}}">
                <button type="button" class="btn btn-warning">Deactive</button></a>
                @endif

                <a href="{{url('admin/prodcut/manage_prodcut')}}/{{$list->id}}">
                <button type="button" class="btn btn-success">Edit</button></a>
               </th>
                 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
        <!-- END DATA TABLE-->
    </div>
</div>


@endsection 