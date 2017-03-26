@extends('layouts.navbar')
 @section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	        <div class="row">
	        <div class="col-lg-10">
	        	Vehicle Info
	        </div>
	        </div>
	    </h2>
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Vehicle Details</h3>
	        </div>
	        <div class="panel-body">
	        	<div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Filled</th>
                                                <th>Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Id</td>
                                                <td>{{$vst->v_id}}</td>
                                            </tr>
                                            <tr>
                                                <td>Company</td>
                                                <td>{{$vst->v_company}}</td>
                                            </tr>
                                            <tr>
                                                <td>Model</td>
                                                <td>{{$vst->v_model}}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Number</td>
                                                <td>{{$vst->v_number}}</td>
                                            </tr>
                                            <tr>
                                                <td>Max Fuel Capacity</td>
                                                <td>{{$vst->max_fuel_capacity}}</td>
                                            </tr>
                                            <tr>
                                                <td>Max Passenger Capacity</td>
                                                <td>{{$vst->v_max_passenger}}</td>
                                            </tr>
                                            <tr>
                                                <td>Maintenance at</td>
                                                <td>Every {{$vst->maintenance_at}} kms</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
	        </div>
	        </div>
	        </div>

	<table class="table table-striped" id="booking">
		<thead>

			<tr>
				<th>Id</th>
				<th>Notification Count</th>
				<th>Status</th>
				<th>Milestone Count</th>
				<th>Milestone Meter</th>
				<th>Description</th>
        <th>Mark As complete</th>
			</tr>
		</thead>
		<tbody>

			@foreach( $mnt as $m )
			<tr>
				<td>{{ $i++}}</td>
        <td>{{$m->notification_count}}</td>
				<td>{{$m->status}}</td>
				<td>{{$m->milestone_count}}</td>
				<td>{{$m->milestone_meter}}</td>
				<td>{{$m->description}}</td>
				<td>
					@if ($m->status === "Completed")
						<form action="{{url('/vehicle/maintance/complete')}}" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="m_id" value="{{$m->m_id}}">
							<button type="submit" class="btn btn-info" data-toggle="tooltip" title="Mark as Complete" disabled>
								<i class="fa fa-hand-o-up"></i>
							</button>
						</form>
					@else
            <form action="{{url('/vehicle/maintenance/complete')}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="m_id" value="{{$m->m_id}}">
              <button type="submit" class="btn btn-info" data-toggle="tooltip" title="Mark as Complete" >
                <i class="fa fa-hand-o-up"></i>
              </button>
            </form>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$('#booking').DataTable();
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
@stop
