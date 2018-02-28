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
	<link rel="icon" href="{{ asset('img/favicon.png') }}">
	@yield('css')
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
</head>
<body>
<div class="overlay"></div>
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
					<a>Women's Products</a>
					<div>
						<ul>
							<li>
								<h2>Popular Categories</h2>
								<ul>
									{!! main_menu_helper(1,1) !!}
									<li>
										<a href="{{ route('products.list', ['offers' => 'all', 'line' => 'glamour-nutrition']) }}">View All Products</a>
									</li>
								</ul>
							</li>
							<li>
								<h2>Popular Products</h2>
								<ul>
									{!! main_menu_helper(1,2) !!}
									<li>
										<a href="{{ route('products.list', ['offers' => 'all', 'line' => 'glamour-nutrition']) }}">View All Products</a>
									</li>
								</ul>
							</li>
							<li>
								<h2>Featured Stack</h2>
								<div id="featured-stack">
									{!!  main_menu_helper(1,3) !!}
								</div>
							</li>
							<li class="ads">
								<div><a href="{{ route('custom-plan') }}" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
								<div><a href="{{ route('quality') }}" title=""><img src="{{ asset('img/quality.jpg') }}"></a></div>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a>Men's Products</a>
					<div>
						<ul>
							<li>
								<h2>POPULAR CATEGORIES</h2>
								<ul>
									{!! main_menu_helper(2,1) !!}
									<li>
										<a href="{{ route('products.list', ['offers' => 'all', 'line' => 'military-trail']) }}">View All Products</a>
									</li>
								</ul>
							</li>
							<li>
								<h2>POPULAR PRODUCTS</h2>
								<ul>
									{!! main_menu_helper(2,2) !!}
									<li>
										<a href="{{ route('products.list', ['offers' => 'all', 'line' => 'military-trail']) }}">View All Products</a>
									</li>
								</ul>
							</li>
							<li>
								<h2>Featured Stack</h2>
								<div id="featured-stack">
									{!!  main_menu_helper(2,3) !!}
								</div>
							</li>
							<li class="ads">
								<div><a href="{{ route('custom-plan') }}" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
								<div><a href="{{ route('quality') }}" title=""><img src="{{ asset('img/quality.jpg') }}"></a></div>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a>Shop All Products</a>
					<div>
						<ul>
							<li>
								<h2>POPULAR CATEGORIES</h2>
								<ul>
									{!! main_menu_helper(3,1) !!}
									<li>
										<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
									</li>
								</ul>
							</li>
							<li>
								<h2>POPULAR PRODUCTS</h2>
								<ul>
									{!! main_menu_helper(3,2) !!}
									<li>
										<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
									</li>
								</ul>
							</li>
							<li>
								<h2>Featured Stack</h2>
								<div id="featured-stack">
									{!!  main_menu_helper(3,3) !!}
								</div>
							</li>
							<li class="ads">
								<div><a href="{{ route('custom-plan') }}" title=""><img src="{{ asset('img/build.jpg') }}"></a>
								</div>
								<div><a href="{{ route('quality') }}" title=""><img src="{{ asset('img/quality.jpg') }}"></a></div>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a href="{{ route('science.index') }}">Science</a>
				</li>
			</ul>
		</nav>
		<div id="header-links">
			<ul>
				<li id="menu">
					<a>
						Menu
						<i class="fas fa-bars"></i>
					</a>
					<nav>
						<ul>
							<li><a href="{{ route('quality') }}">Quality</a></li>
							<li><a href="{{ route('team-midway.list')  }}">Team Midway</a></li>
							<li><a href="{{ route('blog.index') }}">Blog</a></li>
							<li><a href="{{ route('about') }}">About Us</a></li>
							<li><a href="{{ route('products.offers') }}">Sales & Promotions</a></li>
							{{--<li><a href="#">Store Locator</a></li>--}}
							<li><a href="{{ route('contact') }}">Contact Us</a></li>
							<li><a href="{{ route('videos') }}">Videos</a></li>
						</ul>
					</nav>
				</li>
				<li id="menu-mobile">
					<a>
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
											{!! main_menu_helper(1,1) !!}
											<li>
												<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
									<li>
										<h2>POPULAR PRODUCTS</h2>
										<ul>
											{!! main_menu_helper(1,2) !!}
											<li>
												<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
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
											{!! main_menu_helper(2,1) !!}
											<li>
												<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
									<li>
										<h2>POPULAR PRODUCTS</h2>
										<ul>
											{!! main_menu_helper(2,2) !!}
											<li>
												<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
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
											{!! main_menu_helper(3,1) !!}
											<li>
												<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
									<li>
										<h2>POPULAR PRODUCTS</h2>
										<ul>
											{!! main_menu_helper(3,2) !!}
											<li>
												<a href="{{ route('products.list') }}">VIEW ALL PRODUCTS</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="/">Science</a></li>
							<li><a href="{{ route('quality') }}">Quality</a></li>
							<li><a href="{{ route('team-midway.list')  }}">Team Midway</a></li>
							<li><a href="{{ route('blog.index') }}">Blog</a></li>
							<li><a href="{{ route('about') }}">About Us</a></li>
							<li><a href="{{ route('products.offers') }}">Sales & Promotions</a></li>
							{{--<li><a href="#">Store Locator</a></li>--}}
							<li><a href="{{ route('contact') }}">Contact Us</a></li>
							<li><a href="{{ route('videos') }}">Videos</a></li>
						</ul>
					</nav>
				</li>
				<li>
					<a href="https://br.midwaylabsusa.com/"><img src="{{ asset('img/br.svg') }}"
							alt="Midway Brasil"></a>
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
						{!! main_menu_helper(3,1) !!}
						<li>
							<a href="/">VIEW ALL CATEGORIES<i class="fas fa-angle-right arrow-link"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<h3>POPULAR PRODUCTS</h3>
					<ul>
						{!! main_menu_helper(3,2) !!}
						<li>
							<a href="/">VIEW ALL PRODUCTS <i class="fas fa-angle-right arrow-link"></i></a>
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
						<li><a href="https://www.instagram.com/midwaylabsusa/" target="_blank"><i
									class="fab fa-instagram"></i></a></li>
						<li><a href="https://www.facebook.com/MidwayLabsUSA/" target="_blank"><i
									class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://twitter.com/midwaylabsusa/" target="_blank"><i class="fab fa-twitter"></i></a>
						</li>
						<li><a href="https://www.youtube.com/user/MidwayLabsUSA" target="_blank"><i
									class="fab fa-youtube"></i></a></li>
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
				<small>* These statements have not been evaluated by the Food and Drug Administration. This product is
					not intended to diagnose, treat, cure or prevent any disease.
				</small>
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