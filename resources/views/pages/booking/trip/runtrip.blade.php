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
	            <h3 class="panel-title">Run Trip</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/booking/trip/dorun')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="b_id" value="{{$b_id}}" />
	            	<div class="form-group col-lg-10">
	            		<label>Current Meter of Vehicle</label>
	            		<input class="form-control" placeholder="Current Meter of Vehicle" type="text" name="v_start_meter" />
	            	</div>
	            	<div class="form-group col-lg-10">
	            		<label>Priviously Remained Fuel</label>
									<div class="input-group">
										<div class="gauge gauge--liveupdate" id="gaugeP">
							        	<div class="gauge__container">
							        		<div class="gauge__marker"></div>
							        		<div class="gauge__background"></div>
							        		<div class="gauge__center"></div>
							        		<div class="gauge__data"></div>
							        		<div class="gauge__needle"></div>
							        	</div>
							        	<div class="gauge__labels mdl-typography__headline">
						            	<span class="gauge__label--low">E</span>
						            	<span class="gauge__label--spacer" id="spacerP" style="text-align:center;">0</span>
						            	<span class="gauge__label--high">F</span>
							        	</div>
							    	</div>
									</div>
									<div class="form-group input-group">
                                <span class="input-group-addon">0%</span>
                                <input type="range" class="form-control" value="0" min="0" max="100" name="filled_fuel" step="1" oninput="showVal(this.value)" onchange="showVal(this.value)">
                                <span class="input-group-addon">100%</span>
                  </div>
                </div>
	            	<div class="form-group col-lg-10">
	            		<label>Fuel Fill on This Trip</label>
		            	<div class="input-group">
		            		<input class="form-control" placeholder="Fuel for This Trip" type="text" name="fuel_at_trip" />
		            		<span class="input-group-addon">ltr.</span>
	            		</div>
                     </div>
	            	<div class="form-group col-lg-10 ">
	            		<button type="submit" class="btn btn-primary">Submit</button>
	            	</div>
	            </form>
	        </div>
	    </div>
	</div>
</div>
<script src="{{url('/js/material-gauge.js')}}"></script>
<script type="text/javascript">
	function showVal(value) {
		var gauge = new Gauge(document.getElementById("gaugeP"));

			gauge.value(value/100);
		var gaugeSpacer=document.getElementById('spacerP')
		gaugeSpacer.innerHTML=value;
	}
</script>
@stop
