@extends('admin.layout')
@section('page_title', 'Coupon')
@section('coupon_select', 'active')

@section('container')
@if (session()->has('message'))
<h1 class="text-center">Coupon</h1>
    <div class="alert alert-success">
    {{session('message')}}
    </div>
@endif
<a href="{{url('admin/coupon/manage_coupon')}}">    
    <button type="button" class="btn btn-secondary">Add Coupon</button>
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
                <th>Code </th>
                <th>Value </th>
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
                <a href="{{url('admin/coupon/delete')}}/{{$list->id}}">
                <button type="button" class="btn btn-danger">Delete</button></a>
                  
                @if ($list->status == 1)
                <a href="{{url('admin/coupon/status/0')}}/{{$list->id}}">
                  <button type="button" class="btn btn-primary">Active</button></a>
                @elseif($list->status == 0)
                <a href="{{url('admin/coupon/status/1')}}/{{$list->id}}">
                  <button type="button" class="btn btn-warning">Deactive</button></a>
                  
                 @endif  

                <a href="{{url('admin/coupon/manage_coupon')}}/{{$list->id}}">
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