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
	            <form method="post" class="row" action="./doAdd">
	            	{{ csrf_field() }}
	            	<div class="form-group col-lg-10">
	            		<label>Customer Name</label>
	            		<input class="form-control" placeholder="Customer Name" type="text" name="c_id" />
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
	            		<textarea class="form-control" rows="3" placeholder="Departure Address" name="b_from">
	            		</textarea>
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Arrival Address</label>
	            		<textarea class="form-control" rows="3" placeholder="Arrival Address" name="b_to">
	            		</textarea>
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
                                        <input type="radio" name="is_round_trip" id="optionsRadios2" value="option2">No
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
	            		<textarea class="form-control" rows="3" placeholder="Remarks" name="remarks">
	            		</textarea>
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