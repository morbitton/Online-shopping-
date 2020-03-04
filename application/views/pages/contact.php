 <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Contact us<span>.</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Contact Section Begin -->
    <div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form action="#" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="col-lg-12">
                                <input type="email" placeholder="E-mail">
                                <input type="text" placeholder="Subject">
                                <textarea placeholder="Message"></textarea>
                            </div>
                            <div class="col-lg-12 text-right">
                                <button type="submit">Send message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="contact-widget">
                        <div class="cw-item">
                            <h5>Location</h5>
                            <ul>
                                <li>Rabenu Yeruham St., </li>
                                <li>Tel Aviv yafo, IS</li>
                            </ul>
                        </div>
                        <div class="cw-item">
                            <h5>Phone</h5>
                            <ul>
                                <li>03-6803333</li>

                            </ul>
                        </div>
                        <div class="cw-item">
                            <h5>E-mail</h5>
                            <ul>
                                <li>contact@mta.ac.il</li>
                                <li>https://www.mta.ac.il/he-il/</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="map" style="height: 560px; width:100%; border:0">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

    <script>
        function initMap() {
            var location = { lat: 32.047469, lng: 34.760659 };
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 18, center: location
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap&callback=initMap"
        type="text/javascript"></script>




































<!--<main>
	<div id="mainWrraper">

		<p id="error"></p>

		<form>
			<fieldset>
				<legend>Contact us:</legend>
				<div class="inputWrapper"><label>First name: </label><input id="First_name" class="formInput" type="text" name="First_name"></div>
				<div class="inputWrapper"><label>Last name: </label><input id="Last_name" class="formInput" type="text" name="Last_name"></div>
				<div class="inputWrapper"><label>Email: </label><input id="Email" class="formInput" type="text" name="Email"></div>
				<div class="inputWrapper"><label>Subject: </label><input id="Message" class="formInput" type="textarea" name="Message"></div>
				<div class="inputWrapper"><input id="register" type="button" value="Send message" name="button" onclick="alert('thank-you!')"></div>
			</fieldset>
		</form>

	</div>

	<div class="col-lg-3 offset-lg-1">
		<div class="contact-widget">
			<div class="cw-item">
				<h5>Location</h5>
				<ul>
					<li>Rabenu Yeruham St., </li>
					<li>Tel Aviv yafo, IS</li>
				</ul>
			</div>
			<div class="cw-item">
				<h5>Phone</h5>
				<ul>
					<li>03-6803333</li>

				</ul>
			</div>
			<div class="cw-item">
				<h5>E-mail</h5>
				<ul>
					<li>contact@mta.ac.il</li>
					<li>https://www.mta.ac.il/he-il/</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="map" style="height: 560px; width:100%; border:0">
		<div class="row">
			<div class="col-lg-12">
			</div>
		</div>
	</div>
	 Contact Section End 


	<script>
		function initMap() {
			var location = {
				lat: 32.047469,
				lng: 34.760659
			};
			var map = new google.maps.Map(document.getElementById("map"), {
				zoom: 18,
				center: location
			});
		}

	</script>
	<script async defer src="<?php echo base_url(); ?>https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initMap"></script>-->
