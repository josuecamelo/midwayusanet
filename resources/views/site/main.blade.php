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
							<div><a href="/" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
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
							<div><a href="/" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
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
							<div><a href="/" title=""><img src="{{ asset('img/build.jpg') }}"></a></div>
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
							<a href="/">Pre-Workout<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Protein<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Amino<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Creatine<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Test Booster<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">View All Products<i class="fas fa-angle-right"></i></a>
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<h3>POPULAR PRODUCTS</h3>
					<ul>
						<li>
							<a href="/">Pre-Workout<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Protein<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Amino<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Creatine<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">Test Booster<i class="fas fa-angle-right"></i></a>
						</li>
						<li>
							<a href="/">View All Products<i class="fas fa-angle-right"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<h2>LET US HELP YOU</h2>
			<ul>
				<li><a href="/">Find a Store<i class="fas fa-angle-right"></i></a></li>
				<li><a href="/">Your Account<i class="fas fa-angle-right"></i></a></li>
				<li><a href="/">Your Orders<i class="fas fa-angle-right"></i></a></li>
				<li><a href="/">Shipping Rates &amp; Policies<i class="fas fa-angle-right"></i></a></li>
				<li><a href="/">Returns &amp; Refund<i class="fas fa-angle-right"></i></a></li>
				<li><a href="/">Sales &amp; Promotions<i class="fas fa-angle-right"></i></a></li>
				<li><a href="/">About Us<i class="fas fa-angle-right"></i></a></li>
				<li><a href="/">Contact Us<i class="fas fa-angle-right"></i></a></li>
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
						<li><a href="https://www.instagram.com/midwaylabsusa/"><i class="fab fa-instagram"></i></a></li>
						<li><a href="https://www.facebook.com/MidwayLabsUSA/"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://twitter.com/midwaylabsusa/"><i class="fab fa-twitter"></i></a></li>
						<li><a href="https://www.youtube.com/user/MidwayLabsUSA"><i class="fab fa-youtube"></i></a></li>
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
</footer>

{{--<footer>--}}
{{----}}
{{--<section id="cadastro">--}}
{{--<h1>Cadastre-se e receba novidades</h1>--}}
{{--<p>Inscreva-se gratuitamente para receber programas de treinamento, dicas nutricionais e muito mais!</p>--}}
{{--<p><a href="{{ route('inscreverse') }}" class="bt">Inscreva-se agora <i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>--}}
{{--		<p class="textcenter"><img src="{{ asset('img/produtos.jpg') }}" alt="" class="img-responsive"></p>--}}
{{--</section>--}}
{{----}}
{{--<a href="#" class="to-top">--}}
{{--<span class="name">ir para o topo</span>--}}
{{--</a>--}}
{{--<div class="container">--}}
{{--<div class="row" id="meio-footer">--}}
{{--<div class="col-md-2 text-center">--}}
{{--<a href="/">--}}
{{--<img src="{{ asset('img/logo-midway.svg') }}" alt="Midway">--}}
{{--</a>--}}
{{--<div id="social-icons">--}}
{{--<ul>--}}
{{--<li><a href="https://pt-br.facebook.com/militarytrail/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="https://www.instagram.com/militarytrail_/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-2">--}}
{{--<h4>Objetivos</h4>--}}
{{--{!! goal_menu_helper() !!}--}}
{{--</div>--}}
{{--<div class="col-md-2">--}}
{{--<h4>Suplementos</h4>--}}
{{--{!! menu_footer_helper(1) !!}--}}
{{--</div>--}}
{{--<div class="col-md-2">--}}
{{--<h4>Roupas</h4>--}}
{{--{!! menu_footer_helper(2) !!}--}}
{{--</div>--}}
{{--<div class="col-md-2">--}}
{{--<h4>Acessórios</h4>--}}
{{--{!! menu_footer_helper(3) !!}--}}
{{--</div>--}}
{{--<div class="col-md-2">--}}
{{--<h4>Informações</h4>--}}
{{--<ul>--}}
{{--<li><a href="{{ route('atletas') }}">Atletas</a></li>--}}
{{--<li><a href="{{ route('objetivos') }}">Objetivos</a></li>--}}
{{--<li><a href="{{ route('treinos') }}">Treinos</a></li>--}}
{{--<li><a href="{{ route('historia') }}">História</a></li>--}}
{{--<li><a href="https://www.midwaybrasil.com.br/busca?q=military-trail" target="_blank">Comprar online</a></li>--}}
{{--<li><a href="{{ route('lojas.index') }}">Encontre uma loja</a></li>--}}
{{--<li><a href="{{ route('revenda') }}">Seja um revendedor</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="text-center" id="copyright">--}}
{{--Copyright © {{ date('Y') }} <a href="http://br.midwaylabsusa.com/" target="_blank" class="link">Midway Labs USA</a> - Todos os direitos reservados--}}
{{--</div>--}}
{{--</footer>--}}
<script type="text/javascript">
	var base_url = "{{ url('/') }}"
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
{{--<script async src="https://www.googletagmanager.com/gtag/js?id={{env('GOOGLE_ANALYTICS_ID')}}"></script>--}}
{{--<script>--}}
{{--window.dataLayer = window.dataLayer || [];--}}

{{--function gtag() {--}}
{{--dataLayer.push(arguments);--}}
{{--}--}}

{{--gtag('js', new Date());--}}

{{--gtag('config', '{{env('GOOGLE_ANALYTICS_ID')}}');--}}
{{--</script>--}}
<script src="{{ asset('js/site.js'). '?v='.time() }}"></script>
@yield('js')
</body>
</html>