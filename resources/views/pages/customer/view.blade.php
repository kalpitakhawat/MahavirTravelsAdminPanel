@extends('layouts.navbar')
 @section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	        <div class="row">
	        <div class="col-lg-10">
	        	Customer
	        </div>
	        <div class="col-lg-2">
	        	<a href="/customer/add" class="btn btn-primary">
						<i class="fa fa-plus"></i>
	        	 &nbsp;New Customer</a>
	        </div>
	        </div>
	    </h2>   
	</div>
	<table class="table table-striped">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Mobile Number</th>
			<th>Address</th>
			<th>Created At</th>
			<th>updated At</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		@foreach ($cst as $c )
		<tr>
			<td>{{ $i++}}</td>
			<td>{{ $c->c_name }}</td>
			<td>{{ $c->c_mobile }}</td>
			<td>{{$c->c_address}}</td>
			<td>{{ $c->created_at }}</td>
			<td>{{ $c->updated_at }}</td>
			<td><a href="/customer/edit/{{$c->c_id}}" class="btn btn-primary">
				<i class="fa fa-pencil"></i>
			</a>
			</td>
			<td>
				
				<form action="/customer/doDelete" method="post"onsubmit="return conf()">
					{{ csrf_field() }}
					<input type="hidden" name="c_id" value="{{$c->c_id}}">
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