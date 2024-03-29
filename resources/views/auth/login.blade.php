@extends('layouts.app')

@push('css')
 <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css')}}">
@endpush
@section('content')
       
    <div class="contact_form" >
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1"  style="border: 1px solid grey; padding: 20px; box-shadow:  2px 5px 5px 5px #888888;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign In</div>

                        <form action="{{ route('login') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Or Phone</label>
                                <input type="text" id="exampleInputEmail1" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Email Or Phone" required="">
                                @error('email')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <input type="password" id="exampleInputPassword" class="form-control @error('password') is-invalid @enderror" name="password" required=""  aria-describedby="emailHelp" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </form><br>
                        <a href="{{ route('password.request') }}">I Forgot My Password.</a>
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-block">Login With Facebook</button>
                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block">Login With Google</a>
                        
                        <a href="{{ url('/auth/redirect/github') }}" class="btn btn-info btn-block">Login With Github</a>
 
                    </div>
                </div>
                 <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; box-shadow:  2px 5px 5px 5px #888888;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign Up</div>

                        <form action="{{ route('register') }}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="fullName">Full Name </label>
                                <input type="text" id="fullName" class="form-control"  aria-describedby="emailHelp" placeholder="Full Name " name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="userPhone">Phone </label>
                                <input type="text" id="userPhone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  aria-describedby="emailHelp" placeholder="Phone "  required="">
                            </div>
                            <div class="form-group">
                                <label for="usereMail">Email </label>
                                <input type="text" id="usereMail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  aria-describedby="emailHelp" placeholder="Email " required="">
                            </div>
                            <div class="form-group">
                                <label for="userPassword">Password</label>
                                <input type="password" id="userPassword" class="form-control"  aria-describedby="emailHelp" placeholder="Password" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label for="conPassword">Confirm Password</label>
                                <input type="password" id="conPassword" class="form-control"  aria-describedby="emailHelp" placeholder="Re-type Password" name="password_confirmation" required="">
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">SIgnUp</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
