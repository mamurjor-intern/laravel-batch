@extends('layouts.front')
{{-- title --}}
@section('title', $title)
{{-- meta title --}}
@section('meta_title', $metaTitle)
{{-- meta description --}}
@section('meta_description', $metaDescription)

@push('styles')
    <style>
        .product-img{
            width: 100%;
            height: 60px;
            border-radius: 5px;
        }
        .title {
            font-size: 16px !important;
            line-height: 1.4 !important;
            font-weight: 400 !important;
        }
        .qty{
            font-weight: 600;
            color: #000;
            font-size: 15px;
        }
        .form-label{
            font-weight: 600;
        }
        .qty-size{

        }
    </style>
@endpush

{{-- front page content  --}}
@section('contents')
<div id="tt-pageContent">
	<div class="container-indent">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="border rounded p-3">
                        <h2 style="font-size: 22px; font-weight: 600;">Shipping Information</h2>
                        <form action="{{ route('frontend.checkout.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <x-textbox name="full_name" labelName="Full Name" value="{{ old('full_name') }}"/>
                                </div>
                                <div class="col-md-6">
                                    <x-textbox name="email" labelName="Email" value="{{ old('email') }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-textbox name="address" labelName="Address" value="{{ old('address') }}"/>
                                </div>
                                <div class="col-md-6">
                                    <x-textbox name="state" labelName="State" value="{{ old('state') }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <x-textbox name="city" labelName="City" value="{{ old('city') }}"/>
                                </div>
                                <div class="col-md-4">
                                    <x-textbox name="postal_code" labelName="Postal Code" value="{{ old('postal_code') }}"/>
                                </div>
                                <div class="col-md-4">
                                    <x-textbox name="phone_number" labelName="Phone Number" value="{{ old('phone_number') }}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod">
                                        <label class="form-check-label font-weight-bold" for="cod">
                                          Cash on Delivery
                                        </label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                                        <label class="form-check-label font-weight-bold" for="paypal">
                                          Paypal
                                        </label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="stripe" value="stripe" name="payment_method">
                                        <label class="form-check-label font-weight-bold" for="stripe">
                                          Stripe
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" name="term_of_condition" class="form-check-input" id="tems-condition">
                                        <label class="form-check-label font-weight-bold" for="tems-condition">term of condition</label>
                                      </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Checkout</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-3">
                        <h2 style="font-size: 22px; font-weight: 600;">Order Summary</h2>
                        @forelse ($cartProducts as $value)
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <img class="product-img" src="{{ asset($value->attributes->image) }}" alt="">
                                </div>
                                <div class="col-md-9">
                                    <div class="product-summary">
                                        <h5 class="mb-0 title pb-0">{{ $value->name }}</h5>
                                        <p class="mb-0 mt-0 qty"><strong>{{ $value->price }}</strong>X<span>{{ $value->quantity }}</span></p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <div class="row">
                            <div class="col-12">
                                <div class="text-right">
                                    <h4 class="font-weight-bold m-0 p-0">Total: {{ Cart::getTotal() }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
