@extends('admin.layout')

@section('container')
<h1 class="text-center">Manage Category</h1>
<a href="category">
    <button type="button" class="btn btn-secondary">Back</button>
</a>

<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-header">Credit Card</div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">Manage Category</h3>
        </div>
        <hr>
        <form action="" method="post" novalidate="novalidate">
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
            </div>
            
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Name on card</label>
                <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
            </div>
        
            
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">Pay $100.00</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
        </form>
            </div>
        </div>
    </div>

</div>

 
</div>


@endsection 