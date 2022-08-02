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
			<h1 class="tt-title-subpages noborder">CREATE AN ACCOUNT</h1>
			<div class="tt-login-form">
				<div class="row justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="tt-item">
							<h2 class="tt-title">PERSONAL INFORMATION</h2>
							<div class="form-default">
								<form method="post" action="{{ route('signup.store') }}" >
                                    @csrf
									<div class="form-group">
										<label for="loginInputName">FULL NAME *</label>
										<div class="tt-required">* Required Fields</div>
										<input type="text" name="full_name" class="form-control" id="loginInputName" value="{{ old('full_name') }}" placeholder="Enter First Name">

                                        @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</div>
									<div class="form-group">
										<label for="loginLastName">USERNAME *</label>
										<input type="text" name="username" class="form-control" id="loginLastName" value="{{ old('username') }}" placeholder="Enter Last Name">

                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

									</div>
									<div class="form-group">
										<label for="loginInputEmail">E-MAIL *</label>
										<input type="text" name="email" class="form-control" id="loginInputEmail" value="{{ old('email') }}" placeholder="Enter E-mail">

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</div>
									<div class="form-group">
										<label for="loginInputPassword">PASSWORD *</label>
										<input type="password" name="password" class="form-control" id="loginInputPassword" placeholder="Enter Password">

                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
									</div>
									<div class="row">
										<div class="col-auto">
											<div class="form-group">
												<button class="btn btn-border" type="submit">CREATE</button>
											</div>
										</div>
										<div class="col-auto align-self-center">
											<div class="form-group">
												<ul class="additional-links">
													<li>or <a href="#">Return to Store</a></li>
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
