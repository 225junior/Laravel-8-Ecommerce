@extends('admin.layout')
@section('page_title', 'Manage coupon')

@section('container')
<h1 class="text-center">Manage Coupon</h1>
<a href="{{url('admin/coupon')}}">
    <button type="button" class="btn btn-secondary">Back</button>
</a>

<div class="row">
    <div class="col-lg-12 mt-5">
       
        <div class="card">       
      <div class="card-body">
        <form action="{{route('coupon.manage_coupon_process')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title" class="control-label mb-1">Title</label>
                <input id="title" name="title" type="text" class="form-control" value="{{$title}}">
                @error('title')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
          </div>

              <div class="form-group">
                <label for="code" class="control-label mb-1">Code</label>
                <input id="code" name="code" type="text" class="form-control" value="{{$code}}">
                @error('code')
               <div class="alert alert-danger">
                {{$message}}
               </div>
                 @enderror
            </div>

            <div class="form-group">
                <label for="value" class="control-label mb-1">value</label>
                <input id="value" name="value" type="text" class="form-control" value="{{$value}}">
                @error('value')
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