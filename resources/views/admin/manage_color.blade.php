@extends('admin.layout')
@section('page_title', 'Manage color')

@section('container')
<h1 class="text-center">Manage color</h1>
<a href="{{url('admin/color')}}">
    <button type="button" class="btn btn-secondary">Back</button>
</a>

<div class="row">
    <div class="col-lg-12 mt-5">
       
        <div class="card">       
      <div class="card-body">
        <form action="{{route('color.manage_color_process')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="color" class="control-label mb-1">color</label>
                <input id="color" name="color" type="text" class="form-control" value="{{$color}}">
                @error('color')
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