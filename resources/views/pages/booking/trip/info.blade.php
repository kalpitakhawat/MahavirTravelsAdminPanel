@extends('layouts.navbar')
 @section('content')
<div class="row">
	<div class="col-lg-12">
	    <h2 class="page-header">
	        <div class="row">
	        <div class="col-lg-10">
	        	Trip
	        </div>
	        </div>
	    </h2>   
	</div>
	<div class="col-lg-8">
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <h3 class="panel-title">Trip Details</h3>
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
                                                <td>Booking Id</td>
                                                <td>{{$bkg->b_id}}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Name</td>
                                                <td>{{$ct->c_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer Mobile Number</td>
                                                <td>{{$ct->c_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td>Departure Time</td>
                                                <td>{{$bkg->b_time_from}}</td>
                                            </tr>
                                            <tr>
                                                <td>Departure Address</td>
                                                <td>{{$bkg->b_from}}</td>
                                            </tr>
                                            <tr>
                                                <td>Arrival Time</td>
                                                <td>{{$bkg->b_time_to}}</td>
                                            </tr>
                                            <tr>
                                                <td>Arrival Address</td>
                                                <td>{{$bkg->b_to}}</td>
                                            </tr>
                                            <tr>
                                                <td>Round Trip</td>
                                                <td>{{$bkg->is_round_trip}}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Type</td>
                                                <td>{{$bkg->v_type}}</td>
                                            </tr>
                                            <tr>
                                                <td>Price</td>
                                                <td>{{$bkg->b_price}}Rs./km</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>{{$bkg->b_status}}</td>
                                            </tr>
                                            @if($bkg->b_staus === "Trip Assigned")
                                            <tr>
                                                <td>Vendor Name</td>
                                                <td>{{$trp->b_to_b_vendor}}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Detail</td>
                                                <td>{{$vt->v_company}}&nbsp{{ $vt->v_model }}  {{$vt->v_number}}--{{$vt->v_max_passenger}} Seats</td>
                                            </tr>
                                            <tr>
                                                <td>Driver Detail</td>
                                                <td>{{$dr->d_name}}&nbsp- {{ $dr->d_mobile }}</td>
                                            </tr>
                                            
                                            @elseif($bkg->b_staus == "Trip On The Way ")
                                            <tr>
                                                <td>Vendor Name</td>
                                                <td>{{$trp->b_to_b_vendor}}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Detail</td>
                                                <td>{{$vt->v_company}}&nbsp{{ $vt->v_model }}  {{$vt->v_number}}--{{$vt->v_max_passenger}} Seats</td>
                                            </tr>
                                            <tr>
                                                <td>Driver Detail</td>
                                                <td>{{$dr->d_name}}&nbsp- {{ $dr->d_mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td>Meter At trip Started</td>
                                                <td>{{$trp->v_start_meter}}</td>
                                            </tr>
                                            <tr>
                                                <td>Meter At trip Complition</td>
                                                <td>{{$trp->v_end_meter}}</td>
                                            </tr>
                                            <tr>
                                                <td>Fuel At trip Started</td>
                                                <td>{{$trp->filled_fuel}} ltr.</td>
                                            </tr>
                                            <tr>
                                                <td>Fuel At this trip</td>
                                                <td>{{$trp->fuel_at_trip}} ltr.</td>
                                            </tr>
                                            @elseif($bkg->b_staus == "Completed")
                                             <tr>
                                                <td>Vendor Name</td>
                                                <td>{{$trp->b_to_b_vendor}}</td>
                                            </tr>
                                            <tr>
                                                <td>Vehicle Detail</td>
                                                <td>{{$vt->v_company}}&nbsp{{ $vt->v_model }}  {{$vt->v_number}}--{{$vt->v_max_passenger}} Seats</td>
                                            </tr>
                                            <tr>
                                                <td>Driver Detail</td>
                                                <td>{{$dr->d_name}}&nbsp- {{ $dr->d_mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td>Meter At trip Started</td>
                                                <td>{{$trp->v_start_meter}}</td>
                                            </tr>
                                            <tr>
                                                <td>Meter At trip Complition</td>
                                                <td>{{$trp->v_end_meter}}</td>
                                            </tr>
                                            <tr>
                                                <td>Fuel At trip Started</td>
                                                <td>{{$trp->filled_fuel}} ltr.</td>
                                            </tr>
                                            <tr>
                                                <td>Fuel At this trip</td>
                                                <td>{{$trp->fuel_at_trip}} ltr.</td>
                                            </tr>
                                            <tr>
                                                <td>Fuel At trip Complition</td>
                                                <td>{{$trp->fuel_remaining}}</td>
                                            </tr>
                                            <tr>
                                                <td>Average</td>
                                                <td>{{$trp->v_start_meter}}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment From Customer</td>
                                                <td>{{$trp->payment_from_customer}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
	        </div>
	    </div>
	</div>
</div>
@stop