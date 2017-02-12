@extends('layouts.navbar')
@section('pageHeader')
@section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	         Drivers
	    </h2>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Add new Driver</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/driver/doAdd')}}">
	            	{{ csrf_field() }}
	            	<div class="form-group col-lg-10">
	            		<label>Driver Name</label>
	            		<input class="form-control" placeholder="Driver Name" type="text" name="d_name" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Licence Number</label>
	            		<input class="form-control" placeholder="Driving Licence Number" type="text" name="d_licence_number" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Mobile Number</label>
                      <input class="form-control" placeholder="Mobile Number" type="text" name="d_mobile" />
                </div>
                <div class="form-group col-lg-10">
                  	<label>Address</label>
            		       <textarea class="form-control" rows="3" name="d_address" placeholder="Address"></textarea>
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
