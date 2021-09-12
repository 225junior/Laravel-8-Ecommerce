@extends('admin.layout')
@section('page_title', 'copon')
@section('container')

<h1 class="text-center">copon</h1>
    <div class="alert alert-success">
    {{session('message')}}
    </div>
<a href="{{url('admin/copon/manage_copon')}}">
    <button type="button" class="btn btn-secondary">Add Cupon</button>
</a>

<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
<div class="table-responsive m-b-40">
    <table class="table table-borderless table-data3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Code</th>
                <th>Value</th>
                <th>Action</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $list)
               <tr>
                <th>{{$list->id}}</th>
                <th>{{$list->title}}</th>
                <th>{{$list->code}}</th>
                <th>{{$list->value}}</th>
               <th>
                <a href="{{url('admin/copon/delete')}}/{{$list->id}}">
                <button type="button" class="btn btn-danger">Delete</button></a>

                <a href="{{url('admin/copon/manage_copon')}}/{{$list->id}}">
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