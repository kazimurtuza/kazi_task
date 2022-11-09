@extends('admin.auth.layout')

@section('main_content')
    <div class="authincation-content">
        <div class="row no-gutters">
            <div class="col-xl-12">
                <div class="auth-form">
                    <h4 class="text-center mb-4">Sign in your account</h4>
                    <form action="{{ route('auth.login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="mb-1"><strong>Email</strong></label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" id="email">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="mb-1"><strong>Password</strong></label>
                            <div class="input-group mb-3 password-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <button class="btn group-btn" onclick="togglePassword(this, '#password')" type="button">
                                    <i class="fa fa-eye-slash"></i>
                                </button>
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <div class="mb-3">
                                <div class="form-check custom-checkbox ms-1">
                                    <input type="checkbox" class="form-check-input" name="remember" value="1" id="basic_checkbox_1">
                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <div class="rsbtn-2">
                                <span class="rsbtn-2_circle">
                                </span>
                                <button type="submit" class="rsbtn-2_inner">
                                      <span class="button_text_container">
                                        Sign Me In
                                      </span>
                                </button>
                            </div>

                            <h3><span class="loginftr">Don’t have an account?</span> <a href="{{route('auth.register')}}" class="signtxt">Sign up</a></h3>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_bottom_btn')

    <div class="btn-wrapper d-flex justify-content-between mt-5">
        <button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-admin@bizglow.app" data-pass="123456">Admin</button>
        <button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-manager@bizglow.app" data-pass="123456">Manager</button>
        <button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-storekeeper@bizglow.app" data-pass="123456">Store Keeper</button>
        <button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-accountant@bizglow.app" data-pass="123456">Accountant</button>
    </div>

@endsection
@section('css_plugins')

@endsection

@section('js_plugins')

@endsection

@section('js')
    <script>
        function getLoginInfo(button) {
            let email = $(button).attr('data-email');
            let pass = $(button).attr('data-pass');
            $("#email").val(email);
            $("#password").val(pass);
        }
    </script>
@endsection
