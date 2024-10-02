<x-frontend>

	<!-- Contact section -->
	<section class="contact-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 p-0">
					<!-- Map -->
					<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.2047096869896!2d96.12647891489462!3d16.81619762345268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb34335a92f5%3A0xea3210d0410309d7!2sTimes%20City%20Yangon!5e0!3m2!1sen!2smm!4v1599119525324!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
				</div>
				<div class="col-lg-6 p-0">
					<div class="contact-warp">
						<div class="section-title mb-0">
							<h2>Get in touch</h2>
						</div>
						<p>Welcome to our Soul Sonic website. You can give feedback to our website and can add Your Ads to this website. You can connect to our admin from below form. </p>
						<ul>
							<li>Time City, No 25/11</li>
							<li>+34 556788 3221</li>
							<li>contact@soulsonic.com</li>
						</ul>
						<form class="contact-from" action="{{route('feedback')}}" method="post" enctype="multipart/form-data">
							@csrf

							<div class="row">
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="Your name" name="name">
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" placeholder="Your e-mail" name="email">
								</div>
								<div class="col-md-12">
									<input type="text" class="form-control" placeholder="Subject" name="subject">
									<textarea placeholder="Message" name="message"></textarea>
									<button class="site-btn">send message</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end -->
</x-frontend>

