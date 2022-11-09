@extends('admin.layout.layout')

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-7 d-flex align-items-start align-items-center">
                    @include('admin.partials._datatable_top_section', ['table_id' => 'responsive_datatable2', 'import_button' => 'show'])
                </div>
                <div class="col-md-5 d-flex justify-content-end align-items-center">
                    <div>
                        <button class="btn deletebtn btn-export btn-export-danger" style="display: none"  onclick="BulkDelete()">
                            <i class="fas fa-trash fa-fw"></i> Delete
                        </button> &nbsp;
                    </div>
                    <div>
                        <button class="btn btn-export" type="button" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add Doctor</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="rs-table-wrapper">
                <table id="responsive_datatable2" class="w-100">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Doctor Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>
                            <i class="fa fa-cog"></i>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctorList as $key=>$doctorInfo)
                        <tr>

                            <td class="table_sl">
                               {{$key+1}}
                            </td>
                            <td class="table_text">
                                <div class="table-user">
                                    <div class="tu-image">
                                        <img src="{{ asset($doctorInfo->image)}}" alt="No Img">
                                    </div>
                                    <div class="tu-text">
                                        <div class="tu-title">
                                            <p>{{ $doctorInfo->name }}</p>
                                        </div>
                                        <div class="tu-subtitle">
                                            <p>{{ $doctorInfo->specialist }}</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                {{$doctorInfo->phone}}
                            </td>
                            <td class="table_sl">{{$doctorInfo->email}}</td>
                            <td class="text-center">{{$doctorInfo->address}}</td>
                            <td>

                                <div class="dropdown ms-auto text-center">
                                    <div class="btn-link" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                    {{--data-href="{{ route('admin.employee.edit',$employee->id) }}"--}}
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="editEmployee(this)" >Edit</a>

                                    </div>
                                </div>
                            </td>
                        </tr>

                     @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('page_modals')
    <form action="{{route('doctor.store')}}" id="addBranchForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="addEmployeeModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Doctor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name </label>
                                    <input required type="text" class="form-control" value="{{old('name')}}" name="name" >

                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone </label>
                                    <input required type="text" class="form-control" value="{{old('phone')}}" name="phone" >

                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Photo </label>
                                    <input type="file" class="form-control" value="{{old('image')}}" name="image" autocomplete="off" >

                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Specialist </label>
                                    <input type="text" class="form-control" value="{{old('specialist')}}" name="specialist" >

                                    @if($errors->has('specialist'))
                                        <span class="text-danger">{{ $errors->first('specialist') }}</span>
                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input required type="email" class="form-control" value="{{old('email')}}" name="email" autocomplete="off" >

                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password </label>
                                    <input required type="password" class="form-control" value="{{old('password')}}" name="password" >

                                    @if($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                            </div>

                        </div>







                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn rsbtn-1 color-primary" >Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="" id="editBranchForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="editBranchModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn rsbtn-1 color-primary" >Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

        <div class="modal fade" id="detailModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Employee Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="employeeImport">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-4">


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('css_plugins')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendor/select2/css/select2.min.css') }}">
    @include('admin.partials._datatable_css', ['with' => 'button'])
    @include('admin.partials._mdatepicker_css')
    @include('admin.partials._dropify_css')
@endsection

@section('js_plugins')
    <script src="{{ asset('assets/backend/vendor/select2/js/select2.full.min.js') }}"></script>
    @include('admin.partials._datatable_js', ['with' => 'button'])
    @include('admin.partials._mdatepicker_js')
    @include('admin.partials._dropify_js')
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2()


            $('.xlimport').on('click', function () {
                $('#employeeImport').modal('show');
            })

            var table2 = $('#responsive_datatable2').DataTable( {
                dom: "<'row d-none'<'col-sm-12'Br>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                searching:true,
                paging:true,
                lengthChange:false,
                info:true,
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: 2 },
                    { responsivePriority: 4, targets: 1 },
                    { responsivePriority: 5, targets: 4 },
                    { responsivePriority: 6, targets: 3 },
                    { responsivePriority: 6, targets: 5 },
                ],
                language: {
                    paginate: {
                        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        });

        function updateStatus(button) {
            let href = $(button).attr('data-href');
            let _token = "{{ csrf_token() }}";
            let req_data = {_token: _token};
            if ($(button).is(":checked")) {
                href = href + "/1";
            } else {
                href = href + "/0";
            }
            $.ajax({
                type: 'POST',
                url: href,
                data: req_data,
                beforeSend: function () {
                    showLoader('Loading...', 'Please Wait');
                },
                success: function (response) {
                    if (response.status == 200) {
                        if (response.updated_status == 1) {
                            $(button).parent().parent().find('.status-btn').html('Active').removeClass('btn-danger').addClass('btn-success');
                        } else {
                            $(button).parent().parent().find('.status-btn').html('Inactive').removeClass('btn-success').addClass('btn-danger');
                        }
                        hideLoader();
                    } else {
                        hideLoader();
                        showErrorAlert('Error!', response.msg);
                    }
                },
                error: function (err) {
                    showHttpErrorAlert(err);
                },
                complete: function () {
                }
            });
        }

        function editEmployee(button) {
            let href = $(button).attr('data-href');
            let _token = "{{ csrf_token() }}";
            let req_data = {_token: _token};
            $.ajax({
                type: 'GET',
                url: href,
                data: req_data,
                beforeSend: function () {
                    showLoader('Loading...', 'Please Wait');
                },
                success: function (response) {
                    if (response.status == 200) {
                        $("#editBranchForm").attr('action', href);
                        $("#editBranchModal .modal-body").html(response.view);
                        $("#editBranchModal").modal('show');
                        hideLoader();
                    } else {
                        hideLoader();
                        showErrorAlert('Error!', response.msg);
                    }

                },
                error: function (err) {
                    showHttpErrorAlert(err);
                },
                complete: function () {
                    if(jQuery('.default-select').length > 0 ){
                        jQuery('.default-select').niceSelect('update');
                    }
                    $(".mdate").bootstrapMaterialDatePicker({
                        weekStart: 0,
                        time: false,
                        format: 'YYYY-MM-DD'
                    });
                    $('.dropify').dropify();
                }
            });
        }

        function detailsEmployee(button) {
            let href = $(button).attr('data-href');
            let _token = "{{ csrf_token() }}";
            let req_data = {_token: _token};
            $.ajax({
                type: 'GET',
                url: href,
                data: req_data,
                beforeSend: function () {
                    showLoader('Loading...', 'Please Wait');
                },
                success: function (response) {
                    if (response.status == 200) {

                        $("#detailModal .modal-body").html(response.view);
                        $("#detailModal").modal('show');
                        hideLoader();
                    } else {
                        hideLoader();
                        showErrorAlert('Error!', response.msg);
                    }
                },
                error: function (err) {
                    showHttpErrorAlert(err);
                },
                complete: function () {
                }
            });
        }

        $('.slck').on('click',function(){
            let checked_num = $('.bulk_id:checkbox:checked').length;
            if (checked_num > 0) {
                $('.deletebtn').show();
            } else {
                $('.deletebtn').hide();
            }
        });


        function BulkDelete() {
            var bulk_ids = [];
            $('.bulk_id:checkbox:checked').each(function () {
                let checkbox = this;
                bulk_ids.push($(checkbox).val());
            });
            if (bulk_ids.length <= 0) {
                showErrorAlert('Invalid!', 'Please select at least 1 element to delete');
                return false;
            }

            {{--let route = "{{ route('admin.employeeBulk.delete') }}";--}}
            let token = "{{ csrf_token()}}";
            $.ajax({
                url: route,
                type: 'get',
                data: {
                    _token:token,
                    ids:bulk_ids,
                },
                success: function(response) {
                    showSuccessAlert('Invalid!', 'Successfully Deleted services');
                    window.location.href = window.location.href;

                },
                error: function(xhr) {
                    //Do Something to handle error
                }});


        }
        $('#emptype').on('change',function(){
            if($(this).val()==='staff'){
                $('#password').hide();
            }else{
                $('#password').show();
            }


        })

    </script>

@endsection
