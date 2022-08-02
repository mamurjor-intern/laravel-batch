@extends('layouts.front')
{{-- title --}}
@section('title', $title)
{{-- meta title --}}
@section('meta_title', $metaTitle)
{{-- meta description --}}
@section('meta_description', $metaDescription)

@push('styles')
    <style>
        .loader{
            top: 20%;
            left: 50%;
            transform: translate(-50%,20%);
        }
    </style>
@endpush

{{-- front page content  --}}
@section('contents')
<div id="tt-pageContent">
	<div class="container-indent">
		<div class="container">
			<h1 class="tt-title-subpages noborder">SHOPPING CART</h1>
			<div class="row">
				<div class="col-sm-12">
                    <div class="tt-shopcart-table">
                        <div class="position-relative">
                            <table class="table-style">
                                <tbody id="cart-products">

                                </tbody>
                            </table>
                            <div class="tt-shopcart-box tt-boredr-large">
                                <table class="tt-shopcart-table01">
                                    <tbody>
                                        <tr>
                                            <td class="text-right">SUBTOTAL</td>
                                            <td class="text-right">{{ Cart::getSubtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <td>GRAND TOTAL</td>
                                            <td>{{ Cart::getTotal() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right">
                                <a href="{{ route('frontend.checkout.index') }}" class="btn btn-lg"><span class="icon icon-check_circle"></span>PROCEED TO CHECKOUT</a>
                            </div>
                            <img src="{{ asset('img/loader.svg') }}" class="loader d-none position-absolute" alt="">
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script>
        function cartProducts(){
            // ajax
            $.ajax({
                url: '{{ route("frontend.product.cart.get-product") }}',
                type: 'POST',
                data: {_token:_token},
                dataType: 'JSON',
                cache: false,
                beforeSend: function(){
                    $('.loader').removeClass('d-none');
                },
                complete: function(){
                    $('.loader').addClass('d-none');
                },
                success: function(data){
                    $('tbody#cart-products').html('');
                    let output = '';
                    $.each(data,function(key, value){
                        output += `
                            <tr>
                                <td>
                                    <a href="javascript:" class="tt-btn-close product-remove" data-id="${value.id}"></a>
                                </td>
                                <td>
                                    <div class="tt-product-img">
                                        <img src="${value.attributes.image}" alt="">
                                    </div>
                                </td>
                                <td>
                                    <h2 class="tt-title">
                                        <a href="#">${value.name}</a>
                                    </h2>
                                    <ul class="tt-list-parameters">
                                        <li>
                                            <div class="tt-price">
                                                ${value.price}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detach-quantity-mobile"></div>
                                        </li>
                                        <li>
                                            <div class="tt-price subtotal">
                                                ${value.price}
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="tt-price">
                                        ${value.price}
                                    </div>
                                </td>
                                <td>
                                    <div class="detach-quantity-desctope">
                                        <div class="tt-input-counter style-01">
                                            <span class="minus-btn"></span>
                                            <input type="text" value="1" size="5">
                                            <span class="plus-btn"></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="tt-price subtotal">
                                        ${value.price * value.quantity}
                                    </div>
                                </td>
                            </tr>
                        `;
                    });

                    $('tbody#cart-products').append(output);

                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        cartProducts()

    </script>
@endpush

