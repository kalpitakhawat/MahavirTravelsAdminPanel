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
	        	<a href="{{url('/customer/add')}}" class="btn btn-primary">
						<i class="fa fa-plus"></i>
	        	 &nbsp;New Customer</a>
	        </div>
	        </div>
	    </h2>   
	</div>
	<table class="table table-striped table-responsive" id="customer">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Mobile Number</th>
				<th>Address</th>
				<th>Created At</th>
				<th>updated At</th>
				<th>History</th>
				<th>Message</th>
				<th>Book</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cst as $c )
		<tr>
			<td>{{ $i++}}</td>
			<td>{{ $c->c_name }}</td>
			<td>{{ $c->c_mobile }}</td>
			<td>{{$c->c_address}}</td>
			<td>{{ $c->created_at }}</td>
			<td>{{ $c->updated_at }}</td>
			<td>
				
				<form action="{{url('/customer/info')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="c_id" value="{{$c->c_id}}">
					<button type="submit" class="btn btn-info" data-toggle="tooltip" title="History">
						<i class="fa fa-history"></i>
					</button>
				</form>	
			</td>
			<td>
				
				<form action="{{url('/sms/portal')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="c_mobile" value="{{$c->c_mobile}}">
					<button type="submit" class="btn btn-info" data-toggle="tooltip" title="Send Message">
						<i class="fa fa-envelope-o"></i>
					</button>
				</form>	
			</td>
			<td>
				<form action="{{url('/booking/add')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="c_id" value="{{$c->c_id}}">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-automobile"></i>
					</button>
				</form>	
			</td>
			<td><a href="{{url('/customer/edit')}}/{{$c->c_id}}" class="btn btn-primary">
				<i class="fa fa-pencil"></i>
			</a>
			</td>
			<td>
				
				<form action="{{url('/customer/doDelete')}}" method="post"onsubmit="return conf()">
					{{ csrf_field() }}
					<input type="hidden" name="c_id" value="{{$c->c_id}}">
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
	$('#customer').DataTable();
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@stop