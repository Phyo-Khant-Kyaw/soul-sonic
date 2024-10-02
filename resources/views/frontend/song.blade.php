<x-frontend>

	@php
	$uid=Auth::user()->id;
	@endphp

	<!-- Similar Songs section -->
	<section class="similar-songs-section">
<input type="hidden" name="uid" value="{{$uid}}">
		<div class="container-fluid">
			<h3> Songs</h3>
			<div class="row">
				@foreach($songs as $key => $song)

				@php
				$id = $song->id;

				
				$name=$song->name;
				$photo=$song->photo;
				$file=$song->file;

				$artistname=$song->artist->name;
				$albumname=$song->album->name;


				@endphp

				<div class="col-xl-3 col-sm-6 my-4">
					<div class="similar-song">
						<img class="ss-thumb" src="{{asset($photo)}}" alt="" style="width: 200px; height: 300px;">
						<h4>{{$name}}</h4>
						<p>{{$artistname}}-{{$albumname}}</p>
						<div class="single_player">
							<div class="jp-jplayer jplayer" data-ancestor=".jp_container_{{$key}}" data-url="{{$file}}"></div>
							<div class="jp-audio jp_container_{{$key}}" role="application" aria-label="media player">
								<div class="jp-gui jp-interface">
									<!-- Player Controls -->
									<div class="ss-controls">
										<div class="songs-links">
											@guest
											<a href="{{route('login')}}"><img src="{{asset('frontend/img/icons/p-1.png')}}" alt=""></a>
											@else
											

											<a href="javascript:void(0) " data-sid="{{$id}}" data-uid="{{$uid}} " class="btn fav"><img src="{{asset('frontend/img/icons/p-1.png')}}" alt=""></a>
											@endif

											
										</div>
										<div class="player_controls_box">
											<button class="jp-prev player_button" tabindex="0"></button>
											<button class="jp-play player_button" tabindex="0"></button>
											<button class="jp-next player_button" tabindex="0"></button>
											<button class="jp-stop player_button" tabindex="0"></button>
										</div>
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

				@endforeach
			</div>
		</div>
	</section>
	<!-- Similar Songs section end -->

	
   @section('script')

	<!-- Audio Players js -->
	<script src="{{asset('frontend/js/jquery.jplayer.min.js')}}"></script>
	{{-- <script src="{{asset('frontend/js/wavesurfer.min.js')}}"></script> --}}

	<!-- Audio Players Initialization -->
	{{-- <script src="{{asset('frontend/js/WaveSurferInit.js')}}"></script> --}}
	<script src="{{asset('frontend/js/jplayerInit.js')}}"></script>
 


   
    <script type="text/javascript">
    	
    	$(document).ready(function(){
    		$('.fav').click(function(){

                      
                      //alert('ok');
    			var sid=$(this).data('sid');
    			var uid=$(this).data('uid');
    			console.log('SID = '+sid);
    			console.log('UID = '+uid);

    			$.ajaxSetup({
            headers:{
                'X_CSRF_TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

    			 $.post('/favorite',{sid:sid,uid:uid},function(res){
                        console.log(res);
                    })
    		})
    		
    	})
    </script>
  @endsection
	<!-- Similar Songs section end -->
</x-frontend>