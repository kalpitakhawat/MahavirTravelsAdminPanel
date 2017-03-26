@extends('layouts.navbar')
 @section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	        <div class="row">
	        <div class="col-lg-10">
	        	Vechicles
	        </div>
	        <div class="col-lg-2">
	        	<a href="{{url('/vehicle/add')}}" class="btn btn-primary">
						<i class="fa fa-plus"></i>
	        	 &nbsp;New Vehicle</a>
	        </div>
	        </div>
	    </h2>
	</div>
	<table class="table table-striped" id="vehicle">
		<thead>

			<tr>
				<th>Id</th>
				<th>Model</th>
				<th>Company</th>
				<th>Passing Number</th>
        <th>Maximum Fuel Capacity</th>
				<th>Passenger capacity</th>
				<th>Created At</th>
				<th>updated At</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($veh as $v )
			<tr>
				<td>{{ $i++}}</td>
				<td>{{ $v->v_model }}</td>
				<td>{{ $v->v_company }}</td>
				<td>{{$v->v_number}}</td>
        <td>{{$v->max_fuel_capacity}} ltrs</td>
				<td>{{ $v->v_max_passenger }}</td>
				<td>{{ $v->created_at }}</td>
				<td>{{ $v->updated_at }}</td>
				<td><a href="{{url('/vehicle/edit')}}/{{$v->v_id}}" class="btn btn-primary">
					<i class="fa fa-pencil"></i>
				</a>
				</td>
				<td>

					<form action="{{url('/vehicle/doDelete')}}" method="post"onsubmit="return conf()">
						{{ csrf_field() }}
						<input type="hidden" name="v_id" value="{{$v->v_id}}">
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-trash"></i>
						</button>
					</form>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function conf() {	return  confirm("Are you sure to delete ??") }
</script>
<script type="text/javascript">
	$('#vehicle').DataTable();
</script>
@stop
