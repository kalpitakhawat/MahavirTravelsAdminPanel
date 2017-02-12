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
		<div class="panel panel-yellow">
	        <div class="panel-heading">
	            <h3 class="panel-title">Warrning</h3>
	        </div>
	        <div class="panel-body">
	            <h4>Oops, Customer For Booking not Found </h2>
	            <div class="form-group col-lg-10">
	            	<a href="{{url('/customer/view')}}" class="btn btn-primary">Select Customer</a>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@stop