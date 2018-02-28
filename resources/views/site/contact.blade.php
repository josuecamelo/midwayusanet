@extends('site.main')

@section('css')
<style>

	#contact .row {
		margin-bottom: 25px;
	}

	#contact textarea {
		height: 200px;
	}
	.contactSidebarList {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.contactSidebarList h2 {
		margin: 0 0 5px 0;
	}

	.contactSidebarList li {
		margin-bottom: 30px;
	}

	.social li {
		display: inline-block;
	}

	.social {
		margin: 0;
		padding: 0;
	}

	.social li a {
		display: inline-block;
		color: white;
		font-size: 22px;
		text-decoration: none;
		background: red;
		height: 41px;
		width: 41px;
		line-height: 41px;
		border-radius: 100%;
		text-align: center;
		padding: 0;
	}

	.social li a:hover {
		background: #000;
	}
</style>
@endsection

@section('main')

	<h1>Contact</h1>

	<div class="container text-center">
		@include('flash::message')
	</div>

	<div class="container" id="contact">
		<form method="post" action="{{ route('contact-send') }}">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="name" class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="col-md-6">
							<input type="email" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="phone" class="form-control" placeholder="Phone">
						</div>
						<div class="col-md-6">
							<input type="text" name="city" class="form-control" placeholder="City">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="subject" class="form-control" placeholder="Subject">
						</div>
						<div class="col-md-6">
							<select name="department" class="form-control">
								<option value="Others">Department</option>
								<option value="Commercial">Commercial</option>
								<option value="Finance">Finance</option>
								<option value="Marketing">Marketing</option>
								<option value="Nutricionist">Nutricionist</option>
								<option value="SAC">SAC</option>
								<option value="Others">Others</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<textarea name="message" class="form-control" placeholder="Message"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<button type="submit" class="btn btn-primary btn-block">Send <i class="fas fa-angle-right"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<ul class="contactSidebarList">
						<li>
							<h2>Address</h2>
							<div>
								<p>Boca Raton, FL 33487<br>
									<b>Phone</b>: 561 571 6252<br>
									<b>Email</b>: <a href="mailto:info@midwaylabsusa.com">info@midwaylabsusa.com</a></p>
							</div>
						</li>
						<li>
							<h2>Customer Call Center</h2>
							<div>
								<p><b>Phone</b>: 561 571 6252<br>
									<b>Email</b>: <a href="mailto:info@midwaylabsusa.com">info@midwaylabsusa.com</a></p>
							</div>
						</li>
						<li>
							<h2>Social networks</h2>
							<ul class="social">
								<li><a href="https://www.instagram.com/midwaylabsusa/" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://www.facebook.com/MidwayLabsUSA/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/midwaylabsusa/" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://www.youtube.com/user/MidwayLabsUSA" target="_blank"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

		</form>
	</div>

@endsection