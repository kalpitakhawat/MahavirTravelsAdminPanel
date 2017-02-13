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
	            <h3 class="panel-title">Assign Trip</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/booking/trip/doassignment')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="b_id" value="{{$b_id}}" />
	            	<div class="form-group col-lg-10">
	            		<label>If You Direct This Booking To Another Vendor Than Fill Detail Of Vendor Here</label>
	            		<textarea class="form-control" rows="3" placeholder="Vendor Details" name="b_to_b_vendor"></textarea>
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Select Vehicle</label>
                        <select name="v_id" class="form-control">
                        	<option value="">Select Vehicle</option>
                        	@foreach ( $_vt as $vt )
                        			<option value="{{ $vt->v_id }}">{{$vt->v_company}}&nbsp{{ $vt->v_model }}  {{$vt->v_number}}--{{$vt->v_max_passenger}} Seats</option>
                        	@endforeach	
                        </select>
                     </div>
	            	<div class="form-group col-lg-10">
	            		<label>Selecte Driver</label>
	            		<select name="d_id" class="form-control">
	            			<option value="">Select Driver</option>
                        	@foreach ( $drv as $d )
                        			<option value="{{ $d->d_id }}">{{$d->d_name}}&nbsp- {{ $d->d_mobile }}</option>
                        	@endforeach	
                        </select>
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