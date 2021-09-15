@extends('admin.layout')
@section('page_title', 'Manage size')

@section('container')
<h1 class="text-center">Manage size</h1>
<a href="{{url('admin/size')}}">
    <button type="button" class="btn btn-secondary">Back</button>
</a>

<div class="row">
    <div class="col-lg-12 mt-5">
       
        <div class="card">       
      <div class="card-body">
        <form action="{{route('size.manage_size_process')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="size" class="control-label mb-1">size</label>
                <input id="size" name="size" type="text" class="form-control" value="{{$size}}">
                @error('size')
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