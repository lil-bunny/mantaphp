@extends('layouts.home')

@section('content')

<div class="inner-shade"></div>
<section class="sec-pb sec-log-regi">
    <div class="container">
        <h1>Forget Password Email</h1>
        
        You can reset password from the link:
        <a href="{{ route('frontend.showResetPasswordForm', $token) }}">Reset Password</a>
    </div>
</section>

@endsection