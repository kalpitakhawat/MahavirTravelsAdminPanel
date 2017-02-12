@extends('layouts.navbar')
 @section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	        <div class="row">
	        <div class="col-lg-10">
	        	Booking
	        </div>
	        <div class="col-lg-2">
	        	<a href="/booking/add" class="btn btn-primary">
						<i class="fa fa-plus"></i>
	        	 &nbsp;New Booking</a>
	        </div>
	        </div>
	    </h2>   
	</div>
	<table class="table table-striped">
		<tr>
			<th>Id</th>
			<th>Customer Name</th>
			<th>Departure Time</th>
			<th>Departure Address</th>
			<th>Arrival Time</th>
			<th>Arrival Address</th>
			<th>Round Trip</th>
			<th>Price</th>
			<th>Status</th>
			<th>Remarks</th>
			<th>Created At</th>
			<th>updated At</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach ($bkg as $b )
		<tr>
			<td>{{ $i++}}</td>
			<td>{{$b->c_name}}</td>
			<td>{{ date('d M Y - H:i:s',strtotime($b->b_time_from ))}}</td>
			<td>{{$b->b_from}}</td>
			<td>{{date('d M Y - H:i:s',strtotime($b->b_time_to))}}</td>
			<td>{{$b->b_to}}</td>
			<td>{{$b->is_round_trip}}</td>
			<td>{{$b->b_price}}</td>
			<td>{{$b->b_status}}</td>
			<td>{{$b->remarks}}</td>
			<td>{{ date('d M Y - H:i:s', $b->created_at) }}</td>
			<td>{{ date('d M Y - H:i:s', $b->updated_at) }}</td>
			<td><a href="/booking/edit/{{$b->b_id}}" class="btn btn-primary">
				<i class="fa fa-pencil"></i>
			</a>
			</td>
			<td>
				
				<form action="/booking/doDelete" method="post"onsubmit="return conf()">
					{{ csrf_field() }}
					<input type="hidden" name="b_id" value="{{$b->b_id}}">
					<button type="submit" class="btn btn-danger">
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