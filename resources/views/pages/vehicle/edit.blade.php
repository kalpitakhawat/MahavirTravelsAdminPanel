@extends('layouts.navbar')
@section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	         Vechicles
	    </h2>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Edit Vehicle Details</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/vehicle/doEdit')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="v_id" value="{{$veh->v_id}}"/>
	            	<div class="form-group col-lg-10">
	            		<label>Model Name</label>
	            		<input class="form-control" placeholder="Vehicle model" type="text" name="v_model" value="{{$veh->v_model}}" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Company Name</label>
	            		<input class="form-control" placeholder="Company" type="text" name="v_company" value="{{$veh->v_company}}" />
	            	</div>
								<div class="form-group col-lg-10">
	            		<label>Maximum Fuel Tank Capacity</label>
		            	<div class="input-group">
		            		<input class="form-control" placeholder="Maximum Fuel Tank Capacity" type="text" name="max_fuel_capacity" name="{{$veh->max_fuel_capacity}}"/>
		            		<span class="input-group-addon">ltr.</span>
	            		</div>
                </div>
	            	<div class="form-group col-lg-5">
	            		<label>Vehicle Type</label>

                        <select name="v_type" class="form-control">
                        	@foreach ( $_vt as $vt )
                        		@if( $vt == $veh->v_type)
                        			<option selected="" value="{{ $vt }}">{{ $vt }}</option>
                        		@else
                        			<option value="{{ $vt }}">{{ $vt }}</option>
                        		@endif
                        	@endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-5">
                    	<label>Maximum Passenger Capacity</label>
	            		<input class="form-control" placeholder="Maximum Passenger Capacity" type="number" name="v_max_passenger" value="{{$veh->v_max_passenger}}" />
	            	</div>
	            	<div class="form-group col-lg-5">
	            		<label>Passing Number</label>
	            		<input class="form-control" placeholder="Vehicle Passing Number" type="text" name="v_number" value="{{$veh->v_number}}"/>
	            	</div>
	            	<div class="form-group col-lg-10 ">

	            		<button type="submit" class="btn btn-primary">Submit </button>
	            	</div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
@stop
