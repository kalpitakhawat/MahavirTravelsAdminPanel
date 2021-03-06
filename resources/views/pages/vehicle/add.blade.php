@extends('layouts.navbar')
@section('pageHeader')
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
	            <h3 class="panel-title">Add new vehicle</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/vehicle/doAdd')}}">
	            	{{ csrf_field() }}
	            	<div class="form-group col-lg-10">
	            		<label>Model Name</label>
	            		<input class="form-control" placeholder="Vehicle model" type="text" name="v_model" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Company Name</label>
	            		<input class="form-control" placeholder="Company" type="text" name="v_company" />
	            	</div>
								<div class="form-group col-lg-10">
	            		<label>Maximum Fuel Tank Capacity</label>
		            	<div class="input-group">
		            		<input class="form-control" placeholder="Maximum Fuel Tank Capacity" type="text" name="max_fuel_capacity" />
		            		<span class="input-group-addon">ltr.</span>
	            		</div>
                </div>
	            	<div class="form-group col-lg-5">
	            		<label>Vehicle Type</label>
                        <select name="v_type" class="form-control">
                        	<option value="">Select Type</option>
                            <option value="car">car</option>
                            <option value="family car">family car</option>
                            <option value=" Mini Bus">Mini Bus</option>
                            <option value="Bus">Bus</option>
                            <option value="Slipper Coach Bus">Slipper Coach Bus</option>
                            <option value="3x2 Bus">3x2 Bus</option>
                            <option value="2x2 Bus">2x2 Bus</option>
                        </select>
                    </div>
										<div class="form-group col-lg-5">
											<label>Maintenance at every Kilometers</label>
											<div class="input-group">
				            		<input class="form-control" placeholder="Maintenance" type="text" name="maintenance_at" />
				            		<span class="input-group-addon">km.</span>
			            		</div>
								</div>
                    <div class="form-group col-lg-5">
                    	<label>Maximum Passenger Capacity</label>
	            		<input class="form-control" placeholder="Maximum Passenger Capacity" type="number" name="v_max_passenger" />
	            	</div>
	            	<div class="form-group col-lg-5">
	            		<label>Passing Number</label>
	            		<input class="form-control" placeholder="Vehicle Passing Number" type="text" name="v_number" />
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
