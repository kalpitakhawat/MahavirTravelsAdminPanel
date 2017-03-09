@extends('layouts.navbar')
@section('pageHeader')
@section('content')
<script type="text/javascript">
	window.onload=onLoad;

	function onLoad () {
		var lsts=document.getElementsByClassName("list-group-item");
		for(var i=0; i<lsts.length;i++){
			setClick(lsts[i]);
		};
	}

	function setClick (lst) {
		lst.onclick=click;
	}
	function click() {
		var t=this.getElementsByTagName('p');
		var text=t[0].innerText;
		var msgbox=document.getElementById('msgBox');
		msgbox.value=text;
		return false;
	}

</script>
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	         SMS
	    </h2>
	</div>
	<div class="col-lg-7">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Send SMS</h3>
	        </div>
	        <div class="panel-body">
	            <form method="post" class="row" action="{{url('/sms/send')}}">
	            	{{ csrf_field() }}
	            	<div class="form-group col-lg-10">
	            		<label>Mobile Number</label>
	            		@if(isset($num))
	            			<input class="form-control" placeholder="10 Digit Mobile Number" type="text" name="number" value="{{$num}}"/>
	            		@else
	            			<input class="form-control" placeholder="10 Digit Mobile Number" type="text" name="number" />
	            		@endif
	            	</div>
                <div class="form-group col-lg-10">
                  	<label>Message</label>
            		       <textarea class="form-control" rows="3" name="msg" placeholder="Message" id="msgBox"></textarea>
	            	</div>
	            	<div class="form-group col-lg-10 ">
	            		<button type="submit" class="btn btn-primary">Send </button>
	            	</div>
	            </form>
	        </div>
	    </div>
	</div>
	<div class="col-lg-5"">
		<div >
			
		<div class="panel panel-info" >
            <div class="panel-heading">
                <h3 class="panel-title">Templates</h3>
            </div>
            <div class="panel-body" style="max-height: 265px; overflow-y: scroll;">
	            <div class="list-group">
	            	<a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Blank Message</h4>
                        <p class="list-group-item-text"></p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Promotion</h4>
                        <p class="list-group-item-text">JAY JINENDRA<br/>MAHAVIR TRAVELS<br/>All types of Cars and Buses available on rent. <br/>Contact-<br/>ShantilalJi Kunavat:9998612962,8128457286<br/>Nishang Kunavat:7383145575<br/>Office No:8140177359<br/>MAHAVIR TRAVELS,Your Comforts…. We care</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Thank You</h4>
                        <p class="list-group-item-text">Thank You For Travelling With Us<br/>MAHAVIR TRAVELS,Your Comforts…. We care</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Vehicle And Driver Details</h4>
                        <p class="list-group-item-text">Vechile No:<br/>Driver Name:<br/>MAHAVIR TRAVELS,Your Comforts…. We care</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Bank Detail 1</h4>
                        <p class="list-group-item-text">NAME: SHANTILAL  KARULAL  JAIN.<br/>AC.NO: 624401090244<br/>AC.TYPE: SAVING ACCOUNT<br/>BANK NAME: ICICI<br/>BANK BRANCH:GROUND FLOOR,POONAM PLAZA,RAMBAUG,MANINAGAR,AHMEDABAD-380028<br/>IFSC CODE: ICIC0006244</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">Bank Detail 2</h4>
                        <p class="list-group-item-text">NAME:MAHAVIR TRAVELS<br/>AC.NO:009111101000163<br/>AC.TYPE:CURRENT ACCOUNT<br/>BANK NAME:SARASPUR NAGRIK CO-OP.BANK LTD.<br/>BRANCH NAME:AMRAIWADI BRANCH.291/2,NAVO VAAS,OPP.NEW MUNICIPAL SCHOOL,AMRAIWADI,AHMEDABAD-380026<br/>IFSC CODE:GSCB0USNCBL</p>
                    </a>
                </div>
            </div>
        </div>
		</div>
	</div>
</div>

@stop
