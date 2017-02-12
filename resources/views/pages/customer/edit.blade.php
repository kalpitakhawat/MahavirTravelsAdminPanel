@extends('layouts.navbar')
@section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	         Customer
	    </h2>   
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Edit Customer Details</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="../doEdit">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="c_id" value="{{$cst->c_id}}"/>
	            	<div class="form-group col-lg-10">
	            		<label>Customer Name</label>
	            		<input class="form-control" placeholder="Customer Name" type="text" name="c_name" value="{{$cst->c_name}}" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Customer Mobile Number</label>
	            		<input class="form-control" placeholder="Company" type="text" name="c_mobile" value="{{$cst->c_mobile}}" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Vehicle Type</label>
	            		 <textarea class="form-control" rows="3" name="c_address" placeholder="Customer Address">{{$cst->c_address}}</textarea>
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