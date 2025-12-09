<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @include('admins.auth.layouts.head')

</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="javascript:void(0)" class="h1"><b>Portal</b>Jobs</a>
            </div>
            <div class="card-body">

                @yield('content')

            </div>
        </div>
    </div>

    @include('admins.auth.layouts.scripts')
</body>


</html>
