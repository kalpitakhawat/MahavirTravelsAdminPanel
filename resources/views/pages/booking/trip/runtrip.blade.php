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
	            <h3 class="panel-title">Run Trip</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/booking/trip/dorun')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="b_id" value="{{$b_id}}" />
	            	<div class="form-group col-lg-10">
	            		<label>Current Meter of Vehicle</label>
	            		<input class="form-control" placeholder="Current Meter of Vehicle" type="text" name="v_start_meter" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Priviously Remained Fuel</label>
		            	<div class="input-group">
		            		<input class="form-control" placeholder="RemaineD Fuel" type="text" name="filled_fuel" />
		            		<span class="input-group-addon">ltr.</span>
	            		</div>
                     </div>
	            	<div class="form-group col-lg-10">
	            		<label>Fuel Fill on This Trip</label>
		            	<div class="input-group">
		            		<input class="form-control" placeholder="Fuel for This Trip" type="text" name="fuel_at_trip" />
		            		<span class="input-group-addon">ltr.</span>
	            		</div>
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