@extends('layouts.navbar')
 @section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	        <div class="row">
	        <div class="col-lg-10">
	        	Drivers
	        </div>
	        <div class="col-lg-2">
	        	<a href="{{url('/driver/add')}}" class="btn btn-primary">
						<i class="fa fa-plus"></i>
	        	 &nbsp;New Driver</a>
	        </div>
	        </div>
	    </h2>   
	</div>
	<table class="table table-striped" id="driver">
		<thead>
			
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Licence Number</th>
				<th>mobile Number</th>
				<th>Address</th>
				<th>Created At</th>
				<th>updated At</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($drv as $d )
			<tr>
				<td>{{ $i++}}</td>
				<td>{{ $d->d_name }}</td>
				<td>{{ $d->d_licence_number }}</td>
				<td>{{$d->d_mobile}}</td>
				<td>{{ $d->d_address }}</td>
				<td>{{ $d->created_at }}</td>
				<td>{{ $d->updated_at }}</td>
				<td><a href="{{url('/driver/edit')}}/{{$d->d_id}}" class="btn btn-primary">
					<i class="fa fa-pencil"></i>
				</a>
				</td>
				<td>
					
					<form action="{{url('/driver/doDelete')}}" method="post"onsubmit="return conf()">
						{{ csrf_field() }}
						<input type="hidden" name="d_id" value="{{$d->d_id}}">
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
	$('#driver').DataTable();
</script>
@stop