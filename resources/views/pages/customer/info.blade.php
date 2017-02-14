@extends('layouts.navbar')
 @section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	        <div class="row">
	        <div class="col-lg-10">
	        	Customer History
	        </div>
	        </div>
	    </h2>   
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Customer Details</h3>
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
                                                <td>{{$cst->c_id}}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Name</td>
                                                <td>{{$cst->c_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Mobile Number</td>
                                                <td>{{$cst->c_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Address</td>
                                                <td>{{$cst->c_address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
	        </div>
	        </div>
	        </div>
	<table class="table table-striped">
		<tr>
			<th>Id</th>
			<th>Departure Time</th>
			<th>Departure Address</th>
			<th>Arrival Time</th>
			<th>Arrival Address</th>
			<th>Round Trip</th>
			<th>Vehicle Type</th>
			<th>Price</th>
			<th>Status</th>
			<th>Remarks</th>
			<!-- <th>Created At</th> -->
			<!-- <th>updated At</th> -->
			<!-- <th>History</th> -->
			<th>Trip</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach( $bkg as $b )
		<?php $sts=""; ?>
		<tr>
			<td>{{ $i++}}</td>
			<td>{{ date('d M Y - H:i:s',strtotime($b->b_time_from ))}}</td>
			<td>{{$b->b_from}}</td>
			<td>{{date('d M Y - H:i:s',strtotime($b->b_time_to))}}</td>
			<td>{{$b->b_to}}</td>
			<td>{{$b->is_round_trip}}</td>
			<td>{{$b->v_type}}</td>
			<td>{{$b->b_price}}</td>
			<td>
				<form action="{{url('/booking/trip/info')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="b_id" value="{{$b->b_id}}">
					<button type="submit" class="btn btn-link" data-toggle="tooltip" title="Trip Detail" >
						{{$b->b_status}}
					</button>
				</form>	
			</td>
			<td>{{$b->remarks}}</td>
			
			<td>				
				@if ($b->b_status === "Booked")
					<form action="{{url('/booking/trip/assign')}}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="b_id" value="{{$b->b_id}}">
						<button type="submit" class="btn btn-info" data-toggle="tooltip" title="Assign Trip">
							<i class="fa fa-hand-o-up"></i>
						</button>
					</form>	
				@elseif ($b->b_status === "Trip Assigned")
				    <form action="{{url('/booking/trip/run')}}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="b_id" value="{{$b->b_id}}">
						<button type="submit" class="btn btn-warning" data-toggle="tooltip" title="Run Trip">
							<i class="fa fa-paper-plane-o"></i>
						</button>
					</form>	
				@elseif ($b->b_status === "Trip On The Way")
				<?php $sts="disabled" ?>
			    <form action="{{url('/booking/trip/complete')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="b_id" value="{{$b->b_id}}">
					<button type="submit" class="btn btn-success" data-toggle="tooltip" title="Complete Trip">
						<i class="fa fa-check-square-o"></i>
					</button>
				</form>
				@elseif ($b->b_status === "Completed")
					<?php $sts="disabled" ?>
				    <form action="{{url('/booking/doDelete')}}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="b_id" value="{{$b->b_id}}">
						<button type="submit" class="btn btn-success" data-toggle="tooltip" title="Complete Trip" disabled="">
							<i class="fa fa-check-square-o"></i>
						</button>
					</form>
				@else
				    I don't have any records!
				@endif
			</td>
			<?php
				$eurl=url('/booking/edit')."/".$b->b_id
			?>
			<td><a href="{{ $sts == 'disabled' ? '' : $eurl}}" class="btn btn-primary" data-toggle="tooltip" title="Edit Booking" <?php echo $sts ?>>
				<i class="fa fa-pencil"></i>
			</a>
			</td>
			<td>
				
				<form action="{{url('/booking/doDelete')}}" method="post"onsubmit="return conf()">
					{{ csrf_field() }}
					<input type="hidden" name="b_id" value="{{$b->b_id}}" >
					<button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete Booking" <?php echo $sts ?>>
						<i class="fa fa-trash"></i>
					</button>
				</form>	
			</td>

		</tr>
		@endforeach
	</table>
</div>
<script type="text/javascript">
	function conf() {	return  confirm("Are you sure to delete ??") }
</script>
@stop