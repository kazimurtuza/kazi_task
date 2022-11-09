<!-- Bootstrap 5 Starter template -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
            crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <title>Hello, world!</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&display=swap');

        body {
            /*font-family: 'Inter', sans-serif;*/
            font-family: 'Poppins', sans-serif;

        }

        .logoimg {
            max-width: 98%;
            height: auto;
            padding: 12px;

        }

        .appointCard {
            background: #e6e8e9;
            border-radius: 10px;
            padding: 20px;
        }

        .dropdown-menu {
            position: absolute;
            top: 102%;
            left: -14px;
        }

        .custom .dropdown-menu {
            position: absolute;
            top: 102%;
            left: -18px;
            width: 97%;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="logoimg" src="{{asset('img/logo2.jpg')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('doctors.available.time.src')}}">Available Time</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('doctors.free.time')}}">Coffee Time</a>
                </li>


            </ul>
            <div class="d-flex custom">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Admin Login
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item " href="{{route('admin.login.view')}}">Admin</a></li>
                        <li><a class="dropdown-item" href="#">Doctor</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-4">
            <h1 class="text-center">Search Doctor, Make an Appointment</h1>
        </div>

        <div class="col-sm-12 mt-2 mb-2  ">
            <div class="row justify-content-center">
                <div class="col-sm-8 mt-4  appointCard ">
                    {{--<h3>--}}
                        {{--<strong>--}}
                            {{--Make an Appointment--}}
                        {{--</strong>--}}

                    {{--</h3>--}}
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>  {{ session()->get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>  {{ session()->get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    <form method="post" action="{{route('doctor.book')}}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="row justify-content-center">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="doctor_id" id="" required>
                                            <option value="">Select Doctor</option>
                                            @foreach($doctorList as $list)
                                                <option value="{{$list->id}}">{{$list->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" placeholder="Enter password"
                                               name="date">
                                    </div>

                                </div>
                                <div class="row mt-2 justify-content-center">
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" id="appt" name="start_time"
                                               min="10:00" max="17:00" required>

                                    </div>
                                    <div class="col-sm-1 text-center mt-2">
                                        To
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="time" class="form-control" id="appt" name="end_time"
                                               min="10:00" max="17:00" required>

                                    </div>
                                </div>

                            </div>


                            <div class="row mt-4">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Patient Name"
                                           name="patient_name" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                                </div>
                                <div class="col">
                                    <textarea name="address" placeholder="Address " class="form-control" id="" cols="10"
                                              rows="1"></textarea>

                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-info" type="submit">Book Now</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>


        </div>


        <div class="col-sm-12">
            <img width="100%" src="{{asset('img/search-bg.png')}}" alt="">
        </div>
    </div>
</div>

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"
>

</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>