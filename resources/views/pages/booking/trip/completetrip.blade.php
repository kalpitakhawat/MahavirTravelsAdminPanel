@extends('layouts.navbar')
@section('pageHeader')
@section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	         Booking
	    </h2>   
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Complete Trip</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/booking/trip/docomplete')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="b_id" value="{{$b_id}}" />
	            	<div class="form-group col-lg-10">
	            		<label>Meter of Vehicle at Complition Time</label>
	            		<input class="form-control" placeholder="Current Meter of Vehicle" type="text" name="v_end_meter" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Remained Fuel at Complition Trip</label>
		            	<div class="input-group">
		            		<input class="form-control" placeholder="Remained Fuel" type="text" name="fuel_remaining" />
		            		<span class="input-group-addon">ltr.</span>
	            		</div>
                     </div>
	            	<div class="form-group col-lg-10">
	            		<label>Payment From Customer</label>
	            		<input class="form-control" placeholder="Payment" type="text" name="payment_from_customer" />
	            	</div>
	            	<div class="form-group col-lg-10 ">
	            		<button type="submit" class="btn btn-primary">Submit</button>
	            	</div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
@stop