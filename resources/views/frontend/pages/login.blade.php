@extends ('frontend.layout.template-no-sidebar')
@section('body')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class="active">Login</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->			
                <div class="col-md-12 col-sm-12 sign-in">
                    <h4 class="">Sign in</h4>
                    <form class="register-form outer-top-xs" method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span>*</span></label>
                            <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror"" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" id="password" name="password"  name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="radio outer-xs">
                            <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me!
                            </label>
                            <a href="#" class="forgot-password pull-right">Forgot your Password?</a>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                    </form>
                </div>
                <!-- Sign-in -->		
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.container -->
</div>
@endsection