@extends('layouts.navbar')
@section('pageHeader')
@section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	         SMS
	    </h2>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Send SMS</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/sms/send')}}">
	            	{{ csrf_field() }}
	            	<div class="form-group col-lg-10">
	            		<label>Mobile Number</label>
	            		@if(isset($num))
	            			<input class="form-control" placeholder="10 Digit Mobile Number" type="text" name="number" value="{{$num}}"/>
	            		@else
	            			<input class="form-control" placeholder="10 Digit Mobile Number" type="text" name="number"/>
	            		@endif
	            	</div>
                <div class="form-group col-lg-10">
                  	<label>Message</label>
            		       <textarea class="form-control" rows="3" name="msg" placeholder="Message"></textarea>
	            	</div>
	            	<div class="form-group col-lg-10 ">
	            		<button type="submit" class="btn btn-primary">Send </button>
	            	</div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
@stop
