<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Midway Labs USA | Premium Supplements</title>
	<link rel="stylesheet" href="https://use.typekit.net/nhi6prz.css">
	<link href="{{ asset('css/site.css'). '?v='.time() }}" rel="stylesheet">
	@yield('css')
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
</head>
<body>
<header id="header" class="animated fadeInDown">
	<div class="container-fluid">
		<div id="logo">
			<h1>
				<a href="/">
					<img src="{{ asset('img/logo-midway.svg') }}" alt="Midway Labs USA">
				</a>
			</h1>
		</div>
		<nav id="nav-main" role="navigation">
			<ul>
				<li>
					<a href="#">Women's Products</a>
					<ul>
						<li>
							<h2>Popular Categories</h2>
							<ul>
								<li>
									<a href="/">Protein</a>
								</li>
								<li>
									<a href="/">Collagen</a>
								</li>
								<li>
									<a href="/">Sleep Support</a>
								</li>
								<li>
									<a href="/">Anti Age</a>
								</li>
								<li>
									<a href="/">Hair Skin And Nails</a>
								</li>
								<li>
									<a href="/">View All Products</a>
								</li>
							</ul>
						</li>
						<li>
							<h2>Popular Products</h2>
							<ul>
								<li>
									<a href="/">Glamour Protein</a>
								</li>
								<li>
									<a href="/">Glamour Collagen</a>
								</li>
								<li>
									<a href="/">Beauty Sleep</a>
								</li>
								<li>
									<a href="/">Glamour Anti Age</a>
								</li>
								<li>
									<a href="/">Hair Skin And Nails</a>
								</li>
								<li>
									<a href="/">View All Products</a>
								</li>
							</ul>
						</li>
						<li>
							<h2>BEAUTY STACK BUNDLE</h2>
							<div id="featured-stack">
								<a href="/">
									<img src="{{ asset('img/Beauty_Stack20_720x.png') }}">
									<p>Glamour Collagen</p>
									<p class="value">$ <span>51</span><sup>.99</sup></p>
								</a>
							</div>
						</li>
						<li class="ads">
							<div><a href="{{ route('custom-plan') }}" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
							<div><a href="/" title=""><img src="{{ asset('img/quality.jpg') }}"></a></div>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Men's Products</a>
					<ul>
						<li>
							<h2>POPULAR CATEGORIES</h2>
							<ul>
								<li>
									<a href="/">PRE-WORKOUT</a>
								</li>
								<li>
									<a href="/">PROTEIN</a>
								</li>
								<li>
									<a href="/">AMINO</a>
								</li>
								<li>
									<a href="/">CREATINE</a>
								</li>
								<li>
									<a href="/">TEST BOOSTER</a>
								</li>
								<li>
									<a href="/">VIEW ALL PRODUCTS</a>
								</li>
							</ul>
						</li>
						<li>
							<h2>POPULAR PRODUCTS</h2>
							<ul>
								<li>
									<a href="/">ATP ENHANCER</a>
								</li>
								<li>
									<a href="/">MILITARY WHEY</a>
								</li>
								<li>
									<a href="/">AMINO TANK</a>
								</li>
								<li>
									<a href="/">CREATINE</a>
								</li>
								<li>
									<a href="/">ERE FORCE</a>
								</li>
								<li>
									<a href="/">VIEW ALL PRODUCTS</a>
								</li>
							</ul>
						</li>
						<li>
							<h2>FAT BURNER BUNDLE</h2>
							<div id="featured-stack">
								<a href="/">
									<img src="{{ asset('img/Fat_Burner_Bundle_1080x.png') }}">
									<p>Thermogenic Blast + L-Carnitine Strike</p>
									<p class="value">$ <span>69</span><sup>.99</sup></p>
								</a>
							</div>
						</li>
						<li class="ads">
							<div><a href="{{ route('custom-plan') }}" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
							<div><a href="/" title=""><img src="{{ asset('img/quality.jpg') }}"></a></div>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Shop All Products</a>
					<ul>
						<li>
							<h2>POPULAR CATEGORIES</h2>
							<ul>
								<li>
									<a href="/">PRE-WORKOUT</a>
								</li>
								<li>
									<a href="/">PROTEIN</a>
								</li>
								<li>
									<a href="/">AMINO</a>
								</li>
								<li>
									<a href="/">CREATINE</a>
								</li>
								<li>
									<a href="/">TEST BOOSTER</a>
								</li>
								<li>
									<a href="/">VIEW ALL PRODUCTS</a>
								</li>
							</ul>
						</li>
						<li>
							<h2>POPULAR PRODUCTS</h2>
							<ul>
								<li>
									<a href="/">PRE-WORKOUT</a>
								</li>
								<li>
									<a href="/">PROTEIN</a>
								</li>
								<li>
									<a href="/">AMINO</a>
								</li>
								<li>
									<a href="/">CREATINE</a>
								</li>
								<li>
									<a href="/">TEST BOOSTER</a>
								</li>
								<li>
									<a href="/">VIEW ALL PRODUCTS</a>
								</li>
							</ul>
						</li>
						<li>
							<h2>Featured Stack</h2>
							<div id="featured-stack">
								<a href="/">
									<img src="https://via.placeholder.com/150x150">
									<p>Product Name</p>
									<p class="value">$ <span>109</span><sup>.99</sup></p>
								</a>
							</div>
						</li>
						<li class="ads">
							<div><a href="{{ route('custom-plan') }}" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
							<div><a href="/" title=""><img src="{{ asset('img/quality.jpg') }}"></a></div>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Science</a>
				</li>
			</ul>
		</nav>
		<div id="header-links">
			<ul>
				<li id="menu">
					<a href="#">
						Menu
						<i class="fas fa-bars"></i>
					</a>
					<nav>
						<ul>
							<li><a href="#">Quality</a></li>
							<li><a href="#">Team Midway</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Sales & Promotions</a></li>
							<li><a href="#">Store Locator</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Videos</a></li>
						</ul>
					</nav>
				</li>
				<li id="menu-mobile">
					<a href="#">
						<i class="fas fa-bars"></i>
					</a>
					<nav>
						<ul>
							<li>
								<a href="#">Women's Products<i class="fas fa-plus"></i></a>
								<ul>
									<li>
										<h2>POPULAR CATEGORIES</h2>
										<ul>
											<li>
												<a href="/">PRE-WORKOUT</a>
											</li>
											<li>
												<a href="/">PROTEIN</a>
											</li>
											<li>
												<a href="/">AMINO</a>
											</li>
											<li>
												<a href="/">CREATINE</a>
											</li>
											<li>
												<a href="/">TEST BOOSTER</a>
											</li>
											<li>
												<a href="/">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
									<li>
										<h2>POPULAR PRODUCTS</h2>
										<ul>
											<li>
												<a href="/">PRE-WORKOUT</a>
											</li>
											<li>
												<a href="/">PROTEIN</a>
											</li>
											<li>
												<a href="/">AMINO</a>
											</li>
											<li>
												<a href="/">CREATINE</a>
											</li>
											<li>
												<a href="/">TEST BOOSTER</a>
											</li>
											<li>
												<a href="/">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a href="/">Men's Products<i class="fas fa-plus"></i></a>
								<ul>
									<li>
										<h2>POPULAR CATEGORIES</h2>
										<ul>
											<li>
												<a href="/">PRE-WORKOUT</a>
											</li>
											<li>
												<a href="/">PROTEIN</a>
											</li>
											<li>
												<a href="/">AMINO</a>
											</li>
											<li>
												<a href="/">CREATINE</a>
											</li>
											<li>
												<a href="/">TEST BOOSTER</a>
											</li>
											<li>
												<a href="/">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
									<li>
										<h2>POPULAR PRODUCTS</h2>
										<ul>
											<li>
												<a href="/">PRE-WORKOUT</a>
											</li>
											<li>
												<a href="/">PROTEIN</a>
											</li>
											<li>
												<a href="/">AMINO</a>
											</li>
											<li>
												<a href="/">CREATINE</a>
											</li>
											<li>
												<a href="/">TEST BOOSTER</a>
											</li>
											<li>
												<a href="/">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a href="/">Shop All Products<i class="fas fa-plus"></i></a>
								<ul>
									<li>
										<h2>POPULAR CATEGORIES</h2>
										<ul>
											<li>
												<a href="/">PRE-WORKOUT</a>
											</li>
											<li>
												<a href="/">PROTEIN</a>
											</li>
											<li>
												<a href="/">AMINO</a>
											</li>
											<li>
												<a href="/">CREATINE</a>
											</li>
											<li>
												<a href="/">TEST BOOSTER</a>
											</li>
											<li>
												<a href="/">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
									<li>
										<h2>POPULAR PRODUCTS</h2>
										<ul>
											<li>
												<a href="/">PRE-WORKOUT</a>
											</li>
											<li>
												<a href="/">PROTEIN</a>
											</li>
											<li>
												<a href="/">AMINO</a>
											</li>
											<li>
												<a href="/">CREATINE</a>
											</li>
											<li>
												<a href="/">TEST BOOSTER</a>
											</li>
											<li>
												<a href="/">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a href="/">Science</a>
							</li>
							<li><a href="#">Quality</a></li>
							<li><a href="#">Team Midway</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Sales & Promotions</a></li>
							<li><a href="#">Store Locator</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Videos</a></li>
						</ul>
					</nav>
				</li>
				<li>
					<a href="https://br.midwaylabsusa.com/"><img src="{{ asset('img/br.svg') }}" alt="Midway Brasil"></a>
				</li>
				<li id="search">
					<i class="fas fa-search"></i><input type="search" class="form-control" placeholder="Search...">
				</li>
			</ul>
		</div>
	</div>
</header>

<main>
	@yield('main')
</main>

<footer>
	<div class="row">
		<div class="col-md-6">
			<h2>Midway Store</h2>
			<div class="row">
				<div class="col-md-6">
					<h3>POPULAR CATEGORIES</h3>
					<ul>
						<li>
							<a href="/">PROTEIN<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">COLLAGEN<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">TESTO BOOSTER<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">PRE WORKOUT<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">CREATINE<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">VIEW ALL CATEGORIES<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<h3>POPULAR PRODUCTS</h3>
					<ul>
						<li>
							<a href="/">ERE FORCE<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">L CARNITINE STRIKE<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">ANABOLIC ARSENAL<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">GLAMOUR PROTEIN<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
						<li>
							<a href="/">GLAMOUR COLLAGEN<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<h2>LET US HELP YOU</h2>
			<ul>
				<li><a href="/">Find a Store<i class="fas fa-angle-right arrow-link"></i></a></li>
				<li><a href="/">Your Account<i class="fas fa-angle-right arrow-link"></i></a></li>
				<li><a href="/">Your Orders<i class="fas fa-angle-right arrow-link"></i></a></li>
				<li><a href="/">Shipping Rates &amp; Policies<i class="fas fa-angle-right arrow-link"></i></a></li>
				<li><a href="/">Returns &amp; Refund<i class="fas fa-angle-right arrow-link"></i></a></li>
				<li><a href="/">Sales &amp; Promotions<i class="fas fa-angle-right arrow-link"></i></a></li>
				<li><a href="/">About Us<i class="fas fa-angle-right arrow-link"></i></a></li>
				<li><a href="/">Contact Us<i class="fas fa-angle-right arrow-link"></i></a></li>
			</ul>
		</div>
		<div class="col-md-3">
			<h2>STAY IN TOUCH</h2>
			<form>
				<div class="form-group">
					<label for="first-name-contact">First Name</label>
					<input type="text" class="form-control" id="first-name-contact">
				</div>
				<div class="form-group">
					<label for="email-contact">Email address</label>
					<input type="email" class="form-control" id="email-contact">
				</div>
				<button type="submit" class="btn btn-danger">Subscribe <i class="fas fa-angle-right"></i></button>
			</form>
			<div class="row" id="social-icons">
				<div class="col-md-6">
					<h3>Follow Midway</h3>
				</div>
				<div class="col-md-6">
					<ul>
						<li><a href="https://www.instagram.com/midwaylabsusa/" target="_blank"><i class="fab fa-instagram"></i></a></li>
						<li><a href="https://www.facebook.com/MidwayLabsUSA/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://twitter.com/midwaylabsusa/" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.youtube.com/user/MidwayLabsUSA" target="_blank"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="sub-footer">
		<div class="col-md-6">
			© {{ date('Y') }} Midway Labs USA | All Rights Reserved.
		</div>
		<div class="col-md-6">
			<ul>
				<li><a href="/">Privacy Policy</a></li>
				<li><a href="/">Terms of Use</a></li>
				<li><a href="/">Sitemap</a></li>
				<li><a href="/">Affiliate</a></li>
			</ul>
		</div>
	</div>
	<div id="deep-footer">
		<div class="row">
			<div class="col-md-12">
				<small>* These statements have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure or prevent any disease.</small>
			</div>
		</div>
	</div>
</footer>

<script type="text/javascript">
	var base_url = "{{ url('/') }}"
</script>
<script src="{{ asset('js/site.js'). '?v='.time() }}"></script>
@yield('js')
</body>
</html>