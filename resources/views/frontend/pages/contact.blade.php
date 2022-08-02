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
            <div class="row">
                <div class="col-8 mx-auto">
                    <form action="{{ route('frontend.contact-mail') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group">
                            <textarea rows="5" class="form-control" name="message"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>





@endsection
