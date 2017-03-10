<!DOCTYPE html>
<head>
	<!-- templatemo 418 form pack -->
    <!-- 
    Form Pack
    http://www.templatemo.com/preview/templatemo_418_form_pack 
    -->
	<title>Mahavir Travels</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="{{url('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('/css/templatemo_style.css')}}" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Login</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="{{url('/dologin')}}" method="post">				
				{{ csrf_field() }}
				
				@if($errors->any())
					@foreach ($errors->all() as $error)
				      <div class="alert alert-danger fade in">
				  		<strong>Error!</strong> {{ $error }}
					</div>
				  	@endforeach
					<?php $e =implode('', $errors->all()) ?>
					
				@endif
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" value="Log in" class="btn btn-info">
		          	</div>
		          </div>
		        </div>
		      </form>
		</div>
	</div>
</body>
</html>