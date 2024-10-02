<x-frontend>

		<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Music</span> for everyone.</h2>
								<p>You will not be alone</p>
								
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="{{asset('frontend/img/p.webp')}}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>Listen </span> to new music.</h2>
								<p>Make your Feel well</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="hr-img">
								<img src="{{asset('frontend/img/k.png')}}" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Concept section -->
	<section class="concept-section spad">
		<div class="container">
			<div class="row">

				<div class="col-lg-6">
					<div class="section-title">
						<h2>Artist's Profile</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostr.
				</p>
				</div>
			</div>
			<div class="row">


				@foreach($artists as $artist)
				@php
				   $id=$artist->id;
				   $name=$artist->name;
				   $photo=$artist->photo;

				@endphp
				<div class="col-lg-3 col-sm-6">
					<a href="{{route('artistdetail',$id)}}">
					<div class="concept-item">


						<img src="{{asset($photo)}}" alt="" class="img-fluid" style="width: 200px ; height: 200px;" >
						<h5>{{$name}}</h5>
					</div>
					</a>
				</div>
				@endforeach

				
			</div>
		</div>
	</section>
	<!-- Concept section end -->

	
	
	<!-- Premium section end -->
</x-frontend>