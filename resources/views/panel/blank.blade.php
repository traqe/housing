@extends('master')
@section('content')
	<div class="container-fluid">
		<div class="animate fadeIn">
			<div class="row">

				{{--<div class="col-md-12">--}}{{--
				--}}{{--@include('layouts.partials.alerts')--}}{{--
				--}}{{--</div>--}}{{--

				--}}{{--@if ($announcement != "")--}}{{--
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<marquee scrollamount="10" direction="left" behavior="scroll">
									<h3>
										<strong><font color="orangered"> <i class="fa fa-bullhorn"></i> Welcome to the Hornet System</font> </strong>
									</h3>
								</marquee>
							</div>
						</div>
					</div>
				--}}{{--@endif--}}

				<div class="col-6 col-lg-3">
					<div class="card">
						<div class="card-body p-3 clearfix">
							<i class="fa fa-user-secret bg-primary p-3 font-2xl mr-3 float-left"></i>
							<div class="h7 text-primary mb-0 mt-2"> {{$stands}}  </div>
							<div class="text-muted text-uppercase font-weight-bold font-xs">All Stands</div>
						</div>
						<div class="card-footer px-3 py-2">
							<a class="font-weight-bold font-xs btn-block text-muted" href="{{route('stands')}}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3">
					<div class="card">
						<div class="card-body p-3 clearfix">
							<i class="fa fa-cc-mastercard bg-success p-3 font-2xl mr-3 float-left"></i>
							<div class="h7 text-primary mb-0 mt-2"> {{$available}} </div>
							<div class="text-muted text-uppercase font-weight-bold font-xs">Available Stands</div>
						</div>
						<div class="card-footer px-3 py-2">
							<a class="font-weight-bold font-xs btn-block text-muted" href="{{route('stands')}}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3">
					<div class="card">
						<div class="card-body p-3 clearfix">
							<i class="fa fa-pencil bg-warning p-3 font-2xl mr-3 float-left"></i>
							<div class="h7 text-primary mb-0 mt-2">{{$applications}}  </div>
							<div class="text-muted text-uppercase font-weight-bold font-xs">Active Applications</div>
						</div>
						<div class="card-footer px-3 py-2">
							<a class="font-weight-bold font-xs btn-block text-muted" href="{{route('applications')}}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3">
					<div class="card">
						<div class="card-body p-3 clearfix">
							<i class="fa fa-book bg-danger p-3 font-2xl mr-3 float-left"></i>
							<div class="h7 text-primary mb-0 mt-2">{{$batches}} </div>
							<div class="text-muted text-uppercase font-weight-bold font-xs">Batches</div>
						</div>
						<div class="card-footer px-3 py-2">
							<a class="font-weight-bold font-xs btn-block text-muted" href="{{route('batches')}}">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
						</div>
					</div>
				</div>
			</div>



		</div>

			{{--<div class="row">--}}
			{{--<div class="col-md-6 col-sm-12">--}}
			{{--<div class="card">--}}
			{{--<div class="card-header">--}}
			{{--Leave Activity--}}
			{{--<div class="card-actions">--}}
			{{--<a href="http://www.chartjs.org">--}}
			{{--<small class="text-muted">Load</small>--}}
			{{--</a>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--<div class="card-body">--}}
			{{--<div class="chart-wrapper" >--}}
			{{--<canvas id="canvas-3"></canvas>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--<div class="col-md-6 col-sm-12">--}}
			{{--<div class="card">--}}
			{{--<div class="card-header">--}}
			{{--Employee Summary--}}
			{{--<div class="card-actions">--}}
			{{--<a href="http://www.chartjs.org">--}}
			{{--<small class="text-muted">More</small>--}}
			{{--</a>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--<div class="card-body">--}}
			{{--<div class="chart-wrapper">--}}
			{{--<canvas id="canvas-1"></canvas>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}

			{{--</div>--}}
			{{--<div class="row">--}}
			{{--<div class="col-md-6 col-sm-12">--}}
			{{--<div class="card">--}}
			{{--<div class="card-header">--}}
			{{--Bar Chart--}}
			{{--<div class="card-actions">--}}
			{{--<a href="http://www.chartjs.org">--}}
			{{--<small class="text-muted">docs</small>--}}
			{{--</a>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--<div class="card-body">--}}
			{{--<div class="chart-wrapper">--}}
			{{--<canvas id="canvas-3"></canvas>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--<div class="col-md-6 col-sm-12">--}}
			{{--<div class="card">--}}
			{{--<div class="card-header">--}}
			{{--Radar Chart--}}
			{{--<div class="card-actions">--}}
			{{--<a href="http://www.chartjs.org">--}}
			{{--<small class="text-muted">docs</small>--}}
			{{--</a>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--<div class="card-body">--}}
			{{--<div class="chart-wrapper">--}}
			{{--<canvas id="canvas-3"></canvas>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}
			{{--</div>--}}



		</div>



	</div>
@endsection





