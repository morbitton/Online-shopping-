	<!-- Cart Total Page Begin -->
	<section class="cart-total-page spad">
		<div class="container">
			<form action="./check-out.php" method="POST" class="checkout-form">
				<div class="row">
					<div class="col-lg-12">
						<h3>Your Information</h3>
					</div>
					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-2">
								<p class="in-name">Street Address*</p>
							</div>
							<div class="col-lg-10">
								<input type="text" name="street">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="in-name">Country*</p>
							</div>
							<div class="col-lg-10">
								<select class="cart-select country-usa">
									<option>Israel</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="in-name">City*</p>
							</div>
							<div class="col-lg-10">
								<input type="text" name="city">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="in-name">Phone*</p>
							</div>
							<div class="col-lg-10">
								<input type="text" name="phoneNumber">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="payment-method">
								<h3>Payment</h3>
								<ul>
									<li>Paypal <a href="<?php echo base_url(); ?>https://www.paypal.com/il/home"><img src="<?php echo base_url(); ?>img/paypal.jpg" alt=""></a></li>
									<li>Credit / Debit card <img src="<?php echo base_url(); ?>img/mastercard.jpg" alt="" style="cursor: not-allowed;"></li>
									<li>
										<label for="two">Pay when you get the package</label>
										<input type="radio" id="two">
									</li>
								</ul>
								<button type="submit">Place your order</button>
							</div>
						</div>
					</div>
			</form>
		</div>
	</section>
	<!-- Cart Total Page End -->
