@extends('layouts.front')
{{-- title --}}
@section('title',$title)
{{-- meta title --}}
@section('meta_title',$metaTitle)
{{-- meta description --}}
@section('meta_description',$metaDescription)

@section('contents')
    <div id="tt-pageContent">
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">ALREADY REGISTERED?</h1>
                <div class="tt-login-form">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="tt-item">
                                <h2 class="tt-title">NEW CUSTOMER</h2>
                                <p>
                                    By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                                </p>
                                <div class="form-group">
                                    <a href="{{ route('signup') }}" class="btn btn-top btn-border">CREATE AN ACCOUNT</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="tt-item">
                                <h2 class="tt-title">LOGIN</h2>
                                If you have an account with us, please log in.
                                <div class="form-default form-top">
                                    <form action="{{ route('signin.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="loginInputName">USERNAME OR E-MAIL *</label>
                                            <div class="tt-required">* Required Fields</div>
                                            <input type="email" name="email" class="form-control" id="loginInputName" placeholder="Enter Username or E-mail">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="loginInputEmail">PASSWORD *</label>
                                            <input type="password" name="password" class="form-control" id="loginInputEmail" placeholder="Enter Password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                                <label class="form-check-label" for="remember">Remember</label>
                                              </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto mr-auto">
                                                <div class="form-group">
                                                    <button class="btn btn-border" type="submit">LOGIN</button>
                                                </div>
                                            </div>
                                            <div class="col-auto align-self-end">
                                                <div class="form-group">
                                                    <ul class="additional-links">
                                                        <li><a href="#">Lost your password?</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
