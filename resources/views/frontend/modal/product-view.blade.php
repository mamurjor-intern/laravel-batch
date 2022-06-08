<!-- modal (quickViewModal) -->
<div class="modal  fade"  id="product-view-modal" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-quickview desctope">
					<div class="row">
						<div class="col-12 col-md-4 col-lg-4">
							<div class="tt-mobile-product-slider arrow-location-center" id="product-image">

								{{-- <div>
                                    <img src="{{ asset('/') }}images/loader.svg" data-src="images/product/product-01.jpg" alt="">
                                </div> --}}
							</div>
						</div>
						<div class="col-12 col-md-8 col-lg-8">
							<div class="tt-product-single-info">
								<div class="tt-add-info">
									<ul>
										<li><span>SKU:</span> <span id="sku"></span></li>
										<li><span>Availability:</span> <span id="qty"></span> in Stock</li>
									</ul>
								</div>
								<h2 class="tt-title" id="product-name"></h2>
								<div class="tt-price">
									<span class="new-price" id="product-price"></span>
									<span class="old-price" id="discount-price"></span>
								</div>
								<div class="tt-review">
									<div class="tt-rating">
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star-half"></i>
										<i class="icon-star-empty"></i>
									</div>
									<a href="#">(1 Customer Review)</a>
								</div>
								<div class="tt-wrapper" id="description"></div>
								<div class="tt-swatches-container">
									<div class="tt-wrapper">
										<div class="tt-title-options">SIZE</div>
                                        <div class="form-group">
                                            <select class="form-control" id="product-size">
                                            </select>
                                        </div>
									</div>
									<div class="tt-wrapper">
										<div class="tt-title-options">COLOR</div>
                                        <div class="form-group">
                                            <select class="form-control" id="product-color">
                                            </select>
                                        </div>
									</div>
								</div>
								<div class="tt-wrapper">
									<div class="tt-row-custom-01">
										<div class="col-item">
											<div class="tt-input-counter style-01">
												<span class="minus-btn"></span>
												<input type="text" min="1" value="1" size="5">
												<span class="plus-btn"></span>
											</div>
										</div>
										<div class="col-item">
											<a href="#" class="btn btn-lg"><i class="icon-f-39"></i>ADD TO CART</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
