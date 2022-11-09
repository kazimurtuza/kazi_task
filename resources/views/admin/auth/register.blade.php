@extends('admin.auth.layout')
@section('page_css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400&display=swap');

        body{
            font-family: 'Poppins', sans-serif ;
        }
        .register{
            width: 800px;
        }
        .modalstyle {

            border-radius: 48px;
        }

        .imgrow {
            background: #166275;
            border-radius: 30px 0px 0px 30px;
            height: 500px;
            justify-content: center;
        }

        .imgstyle {
            margin-top: -18%;
            margin-left: -22px;
        }

        .loginrg {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            letter-spacing: 0.0015em;
            color: #000000;
            opacity: 0.3;
        }

        .inputstyle {

            height: 26px;
            margin-top: 24px;
            border-radius: 8px;
            border-color: #32323247;
        }


        .sing {
            width: 65px;
            height: 24px;
            font-family: 'Lato';
            font-style: normal;
            font-weight: 400;
            font-size: 20px;
            line-height: 24px;

            letter-spacing: 0.0015em;

            color: #000000;
        }

        .btnnext {
            margin-top: 28px;
            background: #2F80ED;
            box-shadow: 0px 10px 24px rgba(54, 123, 245, 0.25);
            border-radius: 99px;
        }

        .btnnext2 {
            margin-right: 12px;
            margin-top: 28px;
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 700;
            border-radius: 99px;

            color: #6A6A6A;;
        }

        .imgback {
            margin-bottom: 3px;
        }

        .imgiconnext {
            height: 13px;
        }
        .error_span{
            font-size: 11px;
            font-weight: 500;
            display: none;
        }
        .googletxt:hover{
            color: rgba(0, 187, 255, 0.31);
        }

        .step {
            margin-right: 19px;
        }
        .inputstyle {
            height: 35px;
            margin-top: 10px;
            border-radius: 8px;
            border-color: #32323247;
        }
        .package_info{

            justify-content: center;

        }

        .package_info{
            box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;
            padding: 23px;
            background: #fefefe;
            border-radius: 15px;
            width: 88%;
        }

        .package_info ol li {
            list-style-type: circle;
        }
        .topdiv{
            background: #ededed94;
            padding: 4px 8px;
            border-radius: 5px;
        }

    </style>

@endsection
@section('main_content')
    <div class="authincation-content">

        <div class="row p-0 mairow">
            <div class="col-sm-6 imgrow d-flex align-items-center">

                {{--<img class="imgstyle" src="{{asset('assets/backend/images/register.png')}}" alt="">--}}

                    <div class="package_info">
                        <div class="topdiv">
                            <span >{{$package_name}}</span>
                            <strong style="float: right">{{$package_price}} for 1 {{$bill_type}}</strong>

                        </div>
                        <h4 class="mt-3">Highlighted Features</h4>
                        <ol>
                            @foreach($subscription_details as $packageInfo)
                            <li>{{$packageInfo->name}} @if($packageInfo->type==0) <strong>:{{$packageInfo->$package_type}}</strong> @endif</li>
                            @endforeach
                        </ol>
                    </div>

            </div>
            <div class="col-sm-6">
                <form action="{{route('auth.register.store')}}" id="fromsubmit" method="post">
                @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-10 p-2 step step1">
                            <div class="text-center frtop" style="margin-top: 32px"><a class="sing">Sign up</a>
                                &nbsp; <a class="loginrg" href="">Login</a>
                            </div>
                            <div class="text-center frtop" style="margin-top: 32px"><span>Step 1-</span> &nbsp;
                                <span class="sing">Registration</span> &nbsp;&nbsp; <span class="loginrg">1</span>
                            </div>

                            <input type="hidden" name="package_type" value="{{ request()->package_type }}">
                            <input type="hidden" name="bill_type" value="{{ request()->bill_type }}">

                            <div class="mt-4">
                                <div class="form-row row g-3">
                                    <div class="col-sm-12 mt-4">
                                        <input name="email"  value="{{old('email')}}" type="text" class="form-control inputstyle"
                                               placeholder="Email*">
                                        <span class="text-danger error_span" id="customerEmail">This Field is Required And Must be Email</span>
                                    </div>
                                    <div class="col-sm-12">
                                        <input name="password" value="{{old('password')}}"  value="{{old('password')}}" type="password" class="form-control inputstyle"
                                               placeholder="Password">
                                        <span  class="text-danger password error_span" id="passwordRequired" >Passwords must have at least 6 digit</span>
                                    </div>
                                    <div class="col-sm-12">
                                        <input id="confirmpass" type="password" value="{{old('confirmpass')}}" name="confirmpass" class="form-control inputstyle"
                                               placeholder="Confirm Password">
                                        {{--<span  class="text-danger password error_span " >This Field is Required</span>--}}
                                        <span  class="text-danger password error_span " id="passMatchError" >Passwords do not match</span>

                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 text-center">
                                <span class="loginrg">or</span>
                                <br>
                                <br>

                                <a href="" style="cursor: pointer;">
                                    <img height="60px" src="{{asset('assets/frontend/images/coolicon.png')}}"
                                         alt=""> <span class="googletxt" style="color:rgba(0,0,0,0.84)">Sign up with Google</span> </a>
                                <br>

                            </div>

                            <div class="col-sm-12 text-center submitbtn">
                                    <span class="btn btn-info btnnext" onclick="stepShow('step2')"> Next &nbsp; <img
                                                class="imgiconnext" src="{{asset('assets/frontend/images/arrow.png')}}"
                                                alt=""></span>
                            </div>


                        </div>
                        <div style="display: none"  class="col-sm-10 p-2 step step2 ">
                            <div class="text-center frtop" style="margin-top: 32px"><span
                                        class="sing">Sign up</span> &nbsp; <span class="loginrg">Login</span></div>
                            <div class="text-center frtop" style="margin-top: 32px"><span>Step 2-</span> &nbsp;
                                <span class="sing">Your Information</span></div>

                            <div class="mt-4">
                                <div class="form-row row g-3">
                                    <div class="col-sm-12 mt-4">


                                        <input type="text" name="first_name" value="" class="form-control inputstyle"
                                               placeholder="First Name*">
                                        <span  class="text-danger password error_span " id="first_name" >First name is required</span>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="last_name" value="" class="form-control inputstyle"
                                               placeholder="Last Name*">
                                        <span  class="text-danger password error_span " id="last_name" >Last name is required</span>

                                    </div>
                                    <div class="col-sm-12">
                                        <input type="phone" name="phone" value="{{old('phone')}}" class="form-control inputstyle"
                                               placeholder="Phone Number*">
                                        <span  class="text-danger password error_span " id="phone" >Phone number is required</span>
                                    </div>

                                </div>
                            </div>

                            <br>
                            <br>
                            <br>
                            <br>

                            <div class="col-sm-12 text-center submitbtn">

                            <span class="btn  btnnext2" onclick="stepShow('step1')"><img
                                        class="imgiconnext imgback"
                                        src="{{asset('assets/frontend/images/arrowback.png')}}" alt=""> &nbsp; Back</span>

                                <span class="btn btn-info btnnext" onclick="stepShow('step3')"> Next &nbsp; <img
                                            class="imgiconnext" src="{{asset('assets/frontend/images/arrow.png')}}"
                                            alt=""></span>
                            </div>


                        </div>
                        <div style="display: none" class="col-sm-10 p-2 step step3">
                            <div class="text-center frtop" style="margin-top: 32px"><span
                                        class="sing">Sign up</span> &nbsp; <span class="loginrg">Login</span></div>
                            <div class="text-center frtop" style="margin-top: 32px"><span>Step 3-</span> &nbsp;
                                <span class="sing">Your Company</span></div>

                            <div class="mt-4">
                                <div class="form-row row g-3">
                                    <div class="col-sm-12 mt-4">
                                        <input type="text" name="company_name" value="{{old('company_name')}}" class="form-control inputstyle"
                                               placeholder="Company Name*" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" name="mc_number" value="{{old('mc_number')}}" class="form-control inputstyle"
                                               placeholder="MC Number*" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <input type="text" id="company_email" name="company_email" class="form-control inputstyle"
                                               placeholder="Email" value="{{old('company_email')}}" required>

                                        <span  class="text-danger  error_span " style="position: absolute;" id="companyEmail" >Company email already exists</span>
                                    </div>
                                    <div class="col-sm-12">
                                            <textarea name="address" rows="5" cols="10" class="form-control inputstyle"
                                                      placeholder="Address" maxlength="200"
                                                      style="resize:none;"></textarea>


                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="col-sm-12 text-center submitbtn">
                                    <span class="btn  btnnext2" onclick="stepShow('step2')"><img
                                                class="imgiconnext imgback"
                                                src="{{asset('assets/frontend/images/arrowback.png')}}" alt=""> &nbsp; Back</span>
                                <span  onclick="registration()" class="btn btn-info btnnext"> Done &nbsp; <img
                                            class="imgiconnext" src="{{asset('assets/frontend/images/arrow.png')}}"
                                            alt=""></span>
                            </div>


                        </div>

                    </div>

                </form>

            </div>


        </div>

        {{--new register end--}}
    </div>

@endsection

{{--@section('footer_bottom_btn')--}}

    {{--<div class="btn-wrapper d-flex justify-content-between mt-5">--}}
        {{--<button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-admin@bizglow.app" data-pass="123456">Admin</button>--}}
        {{--<button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-manager@bizglow.app" data-pass="123456">Manager</button>--}}
        {{--<button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-storekeeper@bizglow.app" data-pass="123456">Store Keeper</button>--}}
        {{--<button type="button" onclick="getLoginInfo(this)" class="btn btn-primary btn-demo-login" data-email="demo-accountant@bizglow.app" data-pass="123456">Accountant</button>--}}
    {{--</div>--}}

{{--@endsection--}}
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

    <script>
        $('#exampleModal').modal('show')

        function stepShow(stem) {
            $('.error_span').hide();
            if (stem === 'step4') {
                $('#left2').show();
                $('#left1').hide();
                let company_name = $('.step3 input[name=company_name]').val();
                let mc_number = $('.step3 input[name=mc_number]').val();
                let copmany_email = $('.step3 input[name=copmany_email]').val();
                let address = $('.step3 textarea[name=address]').val();


                if (company_name.length < 1) {
                    alert('Company Name is Required');
                    return false
                }
                if (mc_number.length < 1) {
                    alert('MC Number Name is Required');
                    return false
                }

                if (address.length < 1) {
                    alert('Company Address  is Required');
                    return false
                }

            }else{
                $('#left2').hide();
                $('#left1').show();
            }

            if (stem === 'step2') {
                let email = $(".step1 input[name=email]").val();

                var email_uniq='false';
                $.ajax({
                    url : "{{route('user.email.check')}}", //PHP file to execute
                    type : 'GET',
                    data : {email : email},
                    success : function(result){

                        console.log(result) ;

                        if(result==1){
                            $('#customerEmail').html('This email already exists');
                            $('#customerEmail').show();
                            $('.step').hide();
                            $('.step1').show();

                        }
                    },
                    error : function(result, statut, error){ // Handle errors
                    }
                });


                // if(email_uniq){
                //      alert()
                // }


                if (!validateEmail(email)) {
                    $('#customerEmail').show();
                    return false;
                }
                let password_confirmation =$('#confirmpass').val();
                let password = $(".step1 input[name=password]").val();



                if (password.length < 6) {
                    $('#passwordRequired').show();
                    return false;
                }
                if (password !== password_confirmation) {
                    // alert('didn\'t matched passwords');
                    $('#passMatchError').show();
                    return false;
                }
            }

            if (stem === 'step3') {
                let firsname = $('.step2 input[name=first_name]').val();
                let lastname = $('.step2 input[name=last_name]').val();
                let phone = $('.step2 input[name=phone]').val();

                if (firsname.length < 1) {
                    $('#first_name').show()

                    return false
                }
                if (lastname.length < 1) {
                    $('#last_name').show()
                    return false
                }
                if (phone.length < 1) {
                    $('#phone').show()
                    return false
                }
            }



            $('.step').hide();
            $('.' + stem).show();
        }

        function validateEmail(email) {
            return String(email)
                .toLowerCase()
                .match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
        }


        function checkUniqCustomerEmail(email){
            let  exist='false';
            // alert(email)
            {{--$.ajax({--}}
                {{--url : "{{route('user.email.check')}}", //PHP file to execute--}}
                {{--type : 'GET',--}}
                {{--data : {email : email},--}}
                {{--success : function(result){--}}
                    {{--// alert(result);--}}

                    {{--if(result==1){--}}
                        {{--exist='true';--}}
                    {{--}--}}
                {{--},--}}
                {{--error : function(result, statut, error){ // Handle errors--}}
                {{--}--}}
            {{--});--}}

            return false

        }

        function checkUniqCompanyEmail(email){
            let  exist='false';
            // alert(email)
            {{--$.ajax({--}}
                {{--url : "{{route('company.email.check')}}", //PHP file to execute--}}
                {{--type : 'GET', //method used POST or GET--}}
                {{--data : {email : email}, // Parameters passed to the PHP file--}}
                {{--success : function(result){--}}
                    {{--alert(result);--}}

                    {{--if(result==1){--}}
                        {{--exist='true';--}}
                    {{--}--}}
                {{--},--}}
                {{--error : function(result, statut, error){ // Handle errors--}}
                {{--}--}}
            {{--});--}}
            alert(exist);
            return exist

        }

        function hideme() {
            $('#messagedata').hide();
        }
        function registration(){

            $company_email=$('#company_email').val();

            $("#fromsubmit").submit();

            {{--$.ajax({--}}
                {{--url : "{{route('company.email.check')}}", //PHP file to execute--}}
                {{--type : 'GET', //method used POST or GET--}}
                {{--data : {email : $company_email}, // Parameters passed to the PHP file--}}
                {{--success : function(result){--}}
                    {{--if(result==1){--}}
                        {{--$('#companyEmail').html('Company email already exists');--}}
                        {{--$('#companyEmail').show();--}}
                    {{--}else{--}}

                        {{--$("#fromsubmit").submit();--}}
                    {{--}--}}
                {{--},--}}
                {{--error : function(result, statut, error){ // Handle errors--}}
                {{--}--}}
            {{--});--}}





        }
    </script>
@endsection
