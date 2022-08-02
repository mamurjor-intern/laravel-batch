<header>
	<!-- tt-mobile menu -->
	<nav class="panel-menu mobile-main-menu">
		<ul>
			<li>
				<a href="index.html">HOME</a>
			</li>
			<li>
				<a href="listing-left-column.html">SHOP</a>
			</li>
			<li>
				<a href="blog-listing-without-col.html">BLOG</a>
			</li>
			<li>
				<a href="portfolio-col-grid-four.html">PORTFOLIO</a>
			</li>
		</ul>
		<div class="mm-navbtn-names">
			<div class="mm-closebtn">Close</div>
			<div class="mm-backbtn">Back</div>
		</div>
	</nav>
	<!-- tt-mobile-header -->
	<div class="tt-mobile-header">
		<div class="container-fluid">
			<div class="tt-header-row">
				<div class="tt-mobile-parent-menu">
					<div class="tt-menu-toggle">
						<i class="icon-03"></i>
					</div>
				</div>
				<!-- search -->
				<div class="tt-mobile-parent-search tt-parent-box"></div>
				<!-- /search -->
				<!-- cart -->
				<div class="tt-mobile-parent-cart tt-parent-box"></div>
				<!-- /cart -->
				<!-- account -->
				<div class="tt-mobile-parent-account tt-parent-box"></div>
				<!-- /account -->
				<!-- currency -->
				<div class="tt-mobile-parent-multi tt-parent-box"></div>
				<!-- /currency -->
			</div>
		</div>
		<div class="container-fluid tt-top-line">
			<div class="row">
				<div class="tt-logo-container">
					<!-- mobile logo -->
					<a class="tt-logo tt-logo-alignment" href="{{ url('/') }}"><img src="{{ asset(settingValue('header-logo')) }}" alt=""></a>
					<!-- /mobile logo -->
				</div>
			</div>
		</div>
	</div>


	<!-- tt-desktop-header -->
	<div class="tt-desktop-header">
		<div class="container">
			<div class="tt-header-holder">
				<div class="tt-col-obj tt-obj-logo">
					<!-- logo -->
					<a class="tt-logo tt-logo-alignment" href="{{ url('/') }}"><img src="{{ asset(settingValue('header-logo')) }}" alt=""></a>
					<!-- /logo -->
				</div>
				<div class="tt-col-obj tt-obj-menu">
					<!-- tt-menu -->
					<div class="tt-desctop-parent-menu tt-parent-box">
						<div class="tt-desctop-menu">
							<nav>
								<ul>
									<li class="dropdown tt-megamenu-col-02 selected">
										<a href="index.html">HOME</a>
									</li>
									<li class="dropdown megamenu">
										<a href="listing-collection.html">SHOP</a>
									</li>
									<li class="dropdown tt-megamenu-col-01">
										<a href="blog-listing-without-col.html">BLOG</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- /tt-menu -->
				</div>
				<div class="tt-col-obj tt-obj-options obj-move-right">
					<!-- tt-search -->
					<div class="tt-desctop-parent-search tt-parent-box">
						<div class="tt-search tt-dropdown-obj">
							<button class="tt-dropdown-toggle" data-tooltip="Search" data-tposition="bottom">
								<i class="icon-f-85"></i>
							</button>
							<div class="tt-dropdown-menu">
								<div class="container">
									<form>
										<div class="tt-col">
											<input type="text" class="tt-search-input" placeholder="Search Products...">
											<button class="tt-btn-search" type="submit"></button>
										</div>
										<div class="tt-col">
											<button class="tt-btn-close icon-g-80"></button>
										</div>
										<div class="tt-info-text">
											What are you Looking for?
										</div>
										<div class="search-results">
											<ul>
												<li>
										            <a href="product.html">
										            	<div class="thumbnail"><img src="{{ asset('/') }}images/loader.svg" data-src="images/product/product-03.jpg" alt=""></div>
										            	<div class="tt-description">
										            		<div class="tt-title">Flared Shift Bag</div>
										            		<div class="tt-price">
																<span class="new-price">$14</span>
																<span class="old-price">$24</span>
															</div>
										            	</div>
										            </a>
										        </li>
										        <li>
										           <a href="product.html">
										            	<div class="thumbnail"><img src="{{ asset('/') }}images/loader.svg" data-src="images/product/product-02.jpg" alt=""></div>
										            	<div class="tt-description">
										            		<div class="tt-title">Flared Shift Bag</div>
										            		<div class="tt-price">
																$24
															</div>
										            	</div>
										            </a>
										        </li>
										        <li>
										           <a href="product.html">
										            	<div class="thumbnail"><img src="{{ asset('/') }}images/loader.svg" data-src="images/product/product-01.jpg" alt=""></div>
										            	<div class="tt-description">
										            		<div class="tt-title">Flared Shift Bag</div>
										            		<div class="tt-price">
																$14
															</div>
										            	</div>
										            </a>
										        </li>
										        <li>
										           <a href="product.html">
										            	<div class="thumbnail"><img src="{{ asset('/') }}images/loader.svg" data-src="images/product/product-04.jpg" alt=""></div>
										            	<div class="tt-description">
										            		<div class="tt-title">Flared Shift Bag</div>
										            		<div class="tt-price">
																$24
															</div>
										            	</div>
										            </a>
										        </li>
										        <li>
										           <a href="product.html">
										            	<div class="thumbnail"><img src="{{ asset('/') }}images/loader.svg" data-src="images/product/product-05.jpg" alt=""></div>
										            	<div class="tt-description">
										            		<div class="tt-title">Flared Shift Bag</div>
										            		<div class="tt-price">
																$17
															</div>
										            	</div>
										            </a>
										        </li>
										        <li>
										           <a href="product.html">
										            	<div class="thumbnail"><img src="{{ asset('/') }}images/loader.svg" data-src="images/product/product-06.jpg" alt=""></div>
										            	<div class="tt-description">
										            		<div class="tt-title">Flared Shift Bag</div>
										            		<div class="tt-price">
																$20
															</div>
										            	</div>
										            </a>
										        </li>
											</ul>
											<button type="button" class="tt-view-all">View all products</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-search -->

					<!-- tt-cart -->
					<div class="tt-desctop-parent-cart tt-parent-box">
						<div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="bottom">
							<button class="tt-dropdown-toggle">
								<i class="icon-f-39"></i>
								<span class="tt-badge-cart" id="mini-cart-count"></span>
							</button>
							<div class="tt-dropdown-menu">
								<div class="tt-mobile-add">
									<h6 class="tt-title">SHOPPING CART</h6>
									<button class="tt-close">Close</button>
								</div>
								<div class="tt-dropdown-inner">
									<div class="tt-cart-layout">
										<!-- layout emty cart -->
										<div class="tt-cart-content">
											<div class="tt-cart-list" id="mini-carts">

											</div>

											<div class="tt-cart-total-row">
												<div class="tt-cart-total-title">SUBTOTAL:</div>
												<div class="tt-cart-total-price" id="sub-total"></div>
											</div>

											<div class="tt-cart-btn">
												<div class="tt-item">
													<a href="#" class="btn">PROCEED TO CHECKOUT</a>
												</div>
												<div class="tt-item">
													<a href="{{ route('frontend.cart.index') }}" class="btn-link-02 tt-hidden-mobile">View Cart</a>

													<a href="{{ route('frontend.cart.index') }}" class="btn btn-border tt-hidden-desctope">VIEW CART</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-cart -->

					<!-- tt-account -->
					<div class="tt-desctop-parent-account tt-parent-box">
						<div class="tt-account tt-dropdown-obj">
							<button class="tt-dropdown-toggle"  data-tooltip="My Account" data-tposition="bottom"><i class="icon-f-94"></i></button>
							<div class="tt-dropdown-menu">
								<div class="tt-mobile-add">
									<button class="tt-close">Close</button>
								</div>
								<div class="tt-dropdown-inner">
									<ul>
                                        @auth
                                            <li><a href="login.html"><i class="icon-f-94"></i>Account</a></li>
                                            <li><a href="wishlist.html"><i class="icon-n-072"></i>Wishlist</a></li>
                                            <li><a href="compare.html"><i class="icon-n-08"></i>Compare</a></li>
                                        @else
                                            <li><a href="{{ route('signin') }}"><i class="icon-n-08"></i>Signin</a></li>
                                            <li><a href="{{ route('signup') }}"><i class="icon-n-08"></i>Signup</a></li>
                                        @endauth
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /tt-account -->

				</div>
			</div>
		</div>
	</div>
	<!-- stuck nav -->
	<div class="tt-stuck-nav">
		<div class="container">
			<div class="tt-header-row ">
				<div class="tt-stuck-parent-menu"></div>
				<div class="tt-stuck-parent-search tt-parent-box"></div>
				<div class="tt-stuck-parent-cart tt-parent-box"></div>
				<div class="tt-stuck-parent-account tt-parent-box"></div>
				<div class="tt-stuck-parent-multi tt-parent-box"></div>
			</div>
		</div>
	</div>
</header>
