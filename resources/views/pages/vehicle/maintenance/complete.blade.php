@extends('layouts.navbar')
@section('pageHeader')
@section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	         Maintenance
	    </h2>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Mark As Complete</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/vehicle/maintenance/docomplete')}}">
	            	{{ csrf_field() }}
	            	<input type="hidden" name="m_id" value="{{$m_id}}" />
	            	<div class="form-group col-lg-10">
	            		<label>Maintenance Description</label>
	            		<textarea class="form-control" placeholder="Current Meter of Vehicle" name="description" rows="5" ></textarea>
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
