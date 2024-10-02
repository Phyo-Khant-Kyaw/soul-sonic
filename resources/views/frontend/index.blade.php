<x-frontend>

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">

			@foreach($albums as $album)
			@php
			$id=$album->id;
			$name=$album->name;
			$photo=$album->photo;
			@endphp

			<div class="hs-item">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hs-text">
								<h2><span>{{$name}}</span> for everyone.</h2>
								<p>You will not be alone</p>
								
							</div>
						</div>
											
						<div class="col-lg-6">
							<div class="hr-img">
								<a href="{{route('albumdetail',$id)}}">
								<img src="{{asset($photo)}}" alt="">
							</a>
							</div>
						</div>

					</div>
				</div>
			</div>
			@endforeach

{{-- 			<div class="hs-item">
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
			</div> --}}
		</div>
	</section>
	<!-- Hero section end -->


	

	

	<!-- Concept section -->
	<section class="concept-section spad">

       <div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>Toplist bla</h2>
					</div>
				</div>

				
				
			</div>
			@foreach($rsongs as $key => $song)
			@php
			$name=$song->name;
			$photo=$song->photo;
			$file=$song->file;
			$artist=$song->artist->name;
			$album=$song->album->name;
			$category=$song->category->name;
			@endphp
			<div class="song-item">
				<div class="row">


					<div class="col-lg-4">
						<div class="song-info-box">
							<img src="{{asset($photo)}}" alt="">
							<div class="song-info">
								<h4>{{$name}}</h4>
								<p>{{$artist}}</p>
								<p>{{$album}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="single_player_container">
							<div class="single_player">
								<div class="jp-jplayer jplayer" data-ancestor=".jp_container_{{$key}}" data-url="{{asset($file)}}"></div>
								<div class="jp-audio jp_container_{{$key}}" role="application" aria-label="media player">
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
							<a href=""><img src="{{asset('frontend/img/icons/p-1.png')}}" alt=""></a>
							<a href=""><img src="{{asset('frontend/img/icons/p-2.png')}}" alt=""></a>
							<a href=""><img src="{{asset('frontend/img/icons/p-3.png')}}" alt=""></a>
						</div>
					</div>
				</div>
          </div>
			@endforeach()
		</div>

	<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>Recommand </h2>
					</div>
				</div>

				
				
			</div>
			@foreach($rsongs as $key => $song)
			@php
			$i=$song->id;
			$name=$song->name;
			$photo=$song->photo;
			$file=$song->file;
			$artist=$song->artist->name;
			$album=$song->album->name;
			$category=$song->category->name;
			@endphp
			<div class="song-item">
				<div class="row">


					<div class="col-lg-4">
						<div class="song-info-box">
							<img src="{{asset($photo)}}" alt="">
							<div class="song-info">
								<h4>{{$name}}</h4>
								<p>{{$artist}}</p>
								<p>{{$album}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="single_player_container">
							<div class="single_player">
								<div class="jp-jplayer jplayer" data-ancestor=".jp_container_{{$i}}" data-url="{{asset($file)}}"></div>
								<div class="jp-audio jp_container_{{$i}}" role="application" aria-label="media player">
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
							<a href=""><img src="{{asset('frontend/img/icons/p-1.png')}}" alt=""></a>
							<a href=""><img src="{{asset('frontend/img/icons/p-2.png')}}" alt=""></a>
							<a href=""><img src="{{asset('frontend/img/icons/p-3.png')}}" alt=""></a>
						</div>
					</div>
				</div>
          </div>

			@endforeach()
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="section-title">
						<h2>Latest bla</h2>
					</div>
				</div>

				
				
			</div>
			@foreach($lsongs as $key => $song)
			@php
			$id=$song->id;
			$name=$song->name;
			$photo=$song->photo;
			$file=$song->file;
			$artist=$song->artist->name;
			$album=$song->album->name;
			$category=$song->category->name;
			@endphp
			<div class="song-item">
				<div class="row">


					<div class="col-lg-4">
						<div class="song-info-box">
							<img src="{{asset($photo)}}" alt="">
							<div class="song-info">
								<h4>{{$name}}</h4>
								<p>{{$artist}}</p>
								<p>{{$album}}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="single_player_container">
							<div class="single_player">
								<div class="jp-jplayer jplayer" data-ancestor=".jp_container_{{$id}}" data-url="{{asset($file)}}"></div>
								<div class="jp-audio jp_container_{{$id}}" role="application" aria-label="media player">
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
							<a href=""><img src="{{asset('frontend/img/icons/p-1.png')}}" alt=""></a>
							<a href=""><img src="{{asset('frontend/img/icons/p-2.png')}}" alt=""></a>
							<a href=""><img src="{{asset('frontend/img/icons/p-3.png')}}" alt=""></a>
						</div>
					</div>
				</div>
          </div>
			@endforeach()
		</div>


	</section>
	<!-- Concept section end -->
	@section('script')

	<!-- Audio Players js -->
	<script src="{{asset('frontend/js/jquery.jplayer.min.js')}}"></script>
	{{-- <script src="{{asset('frontend/js/wavesurfer.min.js')}}"></script> --}}

	<!-- Audio Players Initialization -->
	{{-- <script src="{{asset('frontend/js/WaveSurferInit.js')}}"></script> --}}
	<script src="{{asset('frontend/js/jplayerInit.js')}}"></script>
  @endsection

	
	
	<!-- Premium section end -->
</x-frontend>