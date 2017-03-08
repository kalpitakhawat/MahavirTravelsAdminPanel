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
	            <h3 class="panel-title">Create Booking</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/booking/doAdd')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="c_id" value="{{$c->c_id}}" />
	            	<div class="form-group col-lg-10">
	            		<label>Customer Name</label>
	            		<input class="form-control" placeholder="Customer Name" type="text" value="{{$c->c_name}}" disabled="" />
	            	</div>
	            	<div class="form-group col-lg-10">
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
	            	<div class="form-group col-lg-10">
	            		<label>Departure Date & Time</label>
	            		<input class="form-control" placeholder="Departure Time" type="datetime-local" name="b_time_from" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Arrival Date & Time</label>
	            		<input class="form-control" placeholder="Arrival Time" type="datetime-local" name="b_time_to" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Departure Address</label>
	            		<textarea class="form-control" rows="3" placeholder="Departure Address" name="b_from"></textarea>
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Arrival Address</label>
	            		<textarea class="form-control" rows="3" placeholder="Arrival Address" name="b_to"></textarea>
	            	</div>
	            	<div class="form-group col-lg-10">
                                <label>Round Trip</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_round_trip" id="optionsRadios1" value="Yes" checked="">Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_round_trip" id="optionsRadios2" value="No">No
                                    </label>
                                </div>
                            </div>
	            	<div class="form-group col-lg-10">
	            		<label>Price</label>
	            		<div class="input-group">
	            		<span class="input-group-addon">RS.</span>
	            		<input class="form-control" placeholder="price in rupee" type="text" name="b_price" />
	            		<span class="input-group-addon">/km</span>
	            		</div>
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Remarks</label>
	            		<textarea class="form-control" rows="3" placeholder="Remarks" name="remarks"></textarea>
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