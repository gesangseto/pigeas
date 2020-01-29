<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Contact Us
				</h1>
				<p class="text-white link-nav"><a href="<?= site_url('Home') ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="contact.html"> Contact Us</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->
<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
	<div class="container">
		<?php
		if (isset($status)) {
			if ($status == 0) {
				echo '<div class="alert alert-success alert-dismissible">';
				echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				echo '<strong>' . $message . '</strong>';
				echo '</div>';
			} else {
				echo '<div class="alert alert-danger alert-dismissible">';
				echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
				echo '<strong>' . $message . '</strong>';
				echo '</div>';
			}
		}
		?>

		<div class="row">
			<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
			<div class="col-lg-4 d-flex flex-column address-wrap">
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-home"></span>
					</div>
					<div class="contact-details">
						<h5>Tangerang, Indonesia</h5>
						<p>
							JL.Semeru Blok K, Kunciran Mas Permai
						</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-phone-handset"></span>
					</div>
					<div class="contact-details">
						<h5>62821 2222 2657</h5>
						<p>Mon to Fri 8 am to 5 pm</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-envelope"></span>
					</div>
					<div class="contact-details">
						<h5>pigeas.help@gmail.com</h5>
						<p>Send us your query anytime!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<form class="form-area " id="myForm" action="<?= site_url('Contact') ?>" method="POST" class="contact-form text-right">
					<div class="row">
						<div class="col-lg-6 form-group">
							<input name="fullname" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

							<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

							<input name="phone_number" placeholder="Enter your phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your phone number'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-lg-6 form-group">
							<textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						</div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>
							<button class="genric-btn primary circle" style="float: right;">Send Message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End contact-page Area -->


<script src="asset_compro/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.asset_compro/js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="asset_compro/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="asset_compro/js/easing.min.js"></script>
<script src="asset_compro/js/hoverIntent.js"></script>
<script src="asset_compro/js/superfish.min.js"></script>
<script src="asset_compro/js/mn-accordion.js"></script>
<script src="asset_compro/js/jquery.ajaxchimp.min.js"></script>
<script src="asset_compro/js/jquery.magnific-popup.min.js"></script>
<script src="asset_compro/js/owl.carousel.min.js"></script>
<script src="asset_compro/js/jquery.nice-select.min.js"></script>
<script src="asset_compro/js/jquery.circlechart.js"></script>
<script src="asset_compro/js/mail-script.js"></script>
<script src="asset_compro/js/main.js"></script>
</body>

</html>