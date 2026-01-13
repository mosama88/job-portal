    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Portal | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('fontawesome') }}/all.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/dist/css/toastr.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/dist/css/sweetalert2.min.css">



    @stack('css')
    <style>
        /* خلي select2 ياخد عرض العمود */
        .select2-container {
            width: 100% !important;
        }

        /* شكل الـ select2 زي input bootstrap */
        .select2-container--default .select2-selection--single {
            height: 38px;
            /* نفس input bootstrap */
            padding: 6px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;

            display: flex;
            align-items: center;
        }

        /* النص اللي جوه */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-left: 0;
            line-height: normal;
        }

        /* السهم */
        .select2-container--default .select2-selection__arrow {
            height: 38px;
        }
    </style>
