<x-frontend>
	<!-- Category section -->
	<section class="category-section spad">
		<div class="container-fluid">
			<div class="">
				<h2>Music Category</h2>
			</div>
			
			<div class="category-items">
				<div class="row " >
					@foreach( $categories as $category )
					@php
					$id=$category->id;
				$name=$category->name;
				$photo=$category->photo;

					@endphp
					
					<div class="col-md-4 mt-4">
						<div class="category-item">
							<img src="{{asset($photo)}}" alt="" style="width: 150px; height: 400px;">
							<div class="ci-text">
								<h4>{{$name}}</h4>
							</div>
							<a href="{{route('categorydetail',$id)}}" class="ci-link"><i class="fa fa-play"></i></a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->

	<!-- Songs section  -->
	{{-- <section class="songs-section">
		<div class="container">
			<!-- song -->
			<div class="song-item">
				<div class="row">
					<div class="col-lg-4">
						<div class="song-info-box">
							<img src="img/songs/1.jpg" alt="">
							<div class="song-info">
								<h4>Jennifer Brown</h4>
								<p>One Night in Ibiza</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="single_player_container">
							<div class="single_player">
								<div class="jp-jplayer jplayer" data-ancestor=".jp_container_1" data-url="music-files/1.mp3"></div>
								<div class="jp-audio jp_container_1" role="application" aria-label="media player">
									<div class="jp-gui jp-interface">

										<!-- Player Controls -->
										<div class="player_controls_box">
											<button class="jp-prev player_button" tabindex="0"></button>
											<button class="jp-play player_button" tabindex="0"></button>
											<button class="jp-next player_button" tabindex="0"></button>
											<button class="jp-stop player_button" tabindex="0"></button>
										</div>
										<!-- Progress Bar -->
										<div class="player_bars">
											<div class="jp-progress">
												<div class="jp-seek-bar">
													<div>
														<div class="jp-play-bar"><div class="jp-current-time" role="timer" aria-label="time">0:00</div></div>
													</div>
												</div>
											</div>
											<div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
										</div>
									</div>
									<div class="jp-no-solution">
										<span>Update Required</span>
										To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="songs-links">
							<a href=""><img src="img/icons/p-1.png" alt=""></a>
							<a href=""><img src="img/icons/p-2.png" alt=""></a>
							<a href=""><img src="img/icons/p-3.png" alt=""></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="site-pagination pt-5 mt-5">
				<a href="#" class="active">01.</a>
				<a href="#">02.</a>
				<a href="#">03.</a>
				<a href="#">04.</a>
			</div>
		</div>
	</section> --}}
</x-frontend>	