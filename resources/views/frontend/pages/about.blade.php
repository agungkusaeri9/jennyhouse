@extends('frontend.layouts.app')
@section('content')
    <!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>About</h1>
					<nav class="d-flex align-items-center">
						<a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="{{ route('about') }}">About</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container">
			<h3 class="text-heading">Tentang Kami</h3>
			{!! $setting->description !!}
		</div>
	</section>
@endsection
