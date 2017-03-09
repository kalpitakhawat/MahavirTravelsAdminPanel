<!DOCTYPE html>
<head>
	<!-- templatemo 418 form pack -->
    <!-- 
    Form Pack
    http://www.templatemo.com/preview/templatemo_418_form_pack 
    -->
	<title>Change Password</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Change Password</h1>
			<form class="form-horizontal templatemo-forgot-password-form templatemo-container" role="form" action="dochange" method="post">		
				{{ csrf_field() }}
				@if($errors->any())
					@foreach ($errors->all() as $error)
				      <div class="alert alert-danger fade in">
				  		<strong>Error!</strong> {{ $error }}
					</div>
				  	@endforeach
					
				@endif
		        <div class="form-group">
		          <div class="col-md-12">
		          	<label>Current Password</label>
		            <input type="password" class="form-control" id="old_pwd" placeholder="Current Passsword" name="current-password" required="">	            
		          </div>              
		        </div>	
		        <div class="form-group">
		          <div class="col-md-12">
		          	<label>New password</label>
		            <input type="password" class="form-control" id="new_pwd" placeholder="New Password" name="password" required="">	            
		          </div>              
		        </div>		
		        <div class="form-group">
		          <div class="col-md-12">
		          	<label>Confirm password</label>
		            <input type="password" class="form-control" id="cfm_pwd" placeholder="Confirm Password" name="password_confirmation" required="">	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="submit" value="Change Password" class="btn btn-danger">
		            <a href="/" class="text-right pull-right"> Go to Dashboard</a>
		          </div>
		        </div>
		      </form>
		</div>
	</div>
</body>
</html>