<script src="{{ asset('assets/backend/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/backend/vendor/moment/moment.min.js') }}"></script>
@yield('js_plugins')
<script src="{{ asset('assets/backend/js/button.js') }}"></script>
<script src="{{ asset('assets/backend/js/custom.js') }}"></script>
<script src="{{ asset('assets/backend/js/deznav-init.js') }}"></script>
<script src="{{ asset('assets/backend/js/alert.js') }}"></script>
@include('common.sweetalert-msg')
@yield('js')

<script>


     function changeSidebarBranch(){
        $('#changeAdminBranch').submit();

    }
</script>
