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
	            <h3 class="panel-title">Edit Booking</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/booking/doEdit')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="b_id" value="{{$bkg->b_id}}" />
	            	<div class="form-group col-lg-10">
	            		<label>Customer Name</label>
	            		<input class="form-control" placeholder="Customer Name" type="text" value="{{$bkg->c_name}}" disabled="" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Vehicle Type</label>
                        <select name="v_type" class="form-control">
                        	@foreach ( $_vt as $vt )
                        		@if( $vt == $bkg->v_type)
                        			<option selected="" value="{{ $vt }}">{{ $vt }}</option>
                        		@else
                        			<option value="{{ $vt }}">{{ $vt }}</option>
                        		@endif
                        	@endforeach	
                        </select>
                     </div>
	            	<div class="form-group col-lg-10">
	            		<label>Departure Date & Time</label>
	            		<input class="form-control" placeholder="Departure Time" type="datetime-local" name="b_time_from" value="{{$bkg->b_time_from}}" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Arrival Date & Time</label>
	            		<input class="form-control" placeholder="Arrival Time" type="datetime-local" name="b_time_to" value="{{$bkg->b_time_to}}" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Departure Address</label>
	            		<textarea class="form-control" rows="3" placeholder="Departure Address" name="b_from">{{$bkg->b_from}}
	            		</textarea>
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Arrival Address</label>
	            		<textarea class="form-control" rows="3" placeholder="Arrival Address" name="b_to">{{$bkg->b_to}}
	            		</textarea>
	            	</div>
	            	<div class="form-group col-lg-10">
                                <label>Round Trip</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_round_trip" id="optionsRadios1" value="Yes" {{$bkg->is_round_trip == 'Yes'?'checked':''}}>Yes
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="is_round_trip" id="optionsRadios2" value="No" {{$bkg->is_round_trip == 'No'?'checked':''}}>No
                                    </label>
                                </div>
                            </div>
	            	<div class="form-group col-lg-10">
	            		<label>Price</label>
	            		<div class="input-group">
	            		<span class="input-group-addon">RS.</span>
	            		<input class="form-control" placeholder="price in rupee" type="text" name="b_price" value="{{$bkg->b_price}}" />
	            		<span class="input-group-addon">/km</span>
	            		</div>
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Remarks</label>
	            		<textarea class="form-control" rows="3" placeholder="Remarks" name="remarks">{{$bkg->remarks}}
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