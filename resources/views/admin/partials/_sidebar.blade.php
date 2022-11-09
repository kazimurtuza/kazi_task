

<!--**********************************
        Sidebar start
    ***********************************-->
<div class="navbar-close"></div>
<div class="deznav">
    <div class="deznav-scroll">

        {{--@if(isAdmin())--}}
        {{--<form action="{{route('change.admin.branch')}}"  method="get" id="changeAdminBranch">--}}
        {{--<select name="branch_id" class="form-control w-75 m-auto sitebarBranch" onchange="changeSidebarBranch()">--}}
        {{--@foreach($company_branch_list as $branch)--}}
        {{--<option value="{{$branch->id}}" {{auth()->user()->employee->branch_id == $branch->id?'selected':''}}>{{$branch->name}}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--</form>--}}

        {{--@endif--}}


        <ul class="metismenu" id="menu">

            <li>
                <a class="ai-icon" href="{{ route('admin.index') }}" aria-expanded="false">
                    {{--<i class="flaticon-025-dashboard"></i>--}}
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>


            <li>
                <a class="ai-icon" href="{{route('doctor.list')}}" aria-expanded="false">
                    {{--<i class="flaticon-025-dashboard"></i>--}}
                    <i class="fas fa-code-branch"></i>
                    <span class="nav-text">Doctor List</span>
                </a>
            </li>






            {{--<li>--}}
                {{--<a class="has-arrow ai-icon" href="javascript:void(0)" aria-expanded="false">--}}
                    {{--<i class="far fa-hand-paper"></i>--}}
                    {{--<span class="nav-text">Requisition</span>--}}
                {{--</a>--}}
                {{--<ul aria-expanded="false">--}}
                    {{--<li><a href="/">New</a></li>--}}
                    {{--<li><a href="/">New1</a></li>--}}
                    {{--<li><a href="/">New2</a></li>--}}

                {{--</ul>--}}
            {{--</li>--}}




        </ul>

        {{--<div class="plus-box">--}}
        {{--<p class="fs-16 font-w500 mb-1">Need Any Help? Please Contact Our Support Team.</p>--}}
        {{--            <a class="btn rsbtn-2 mt-3" href="https://www.retinasoft.com.bd/" target="_blank"><i class="las la-long-arrow-alt-right"></i></a>--}}
        {{--<div class="rsbtn-2 mt-2">--}}
        {{--<span class="rsbtn-2_circle">--}}
        {{--</span>--}}
        {{--<a class="rsbtn-2_inner" href="https://www.retinasoft.com.bd/" target="_blank">--}}
        {{--<span class="button_text_container">--}}
        {{--Contact--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="copyright">--}}
        {{--<p class="fs-14 font-w200">--}}
        {{--<strong class="font-w400 text-black">Company Name </strong>--}}
        {{--<br>--}}
        {{--© 2022 All Rights Reserved--}}
        {{--</p>--}}
        {{--<p>Developed By <strong class=""><a href="https://www.retinasoft.com.bd/" class="text-black" target="_blank">Retina Soft</a></strong></p>--}}
        {{--<p>Version: 1.0</p>--}}
        {{--</div>--}}
    </div>
</div>


<!--**********************************
    Sidebar end
***********************************-->
