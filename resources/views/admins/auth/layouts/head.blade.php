<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Jobs Portal | @yield('title')</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('fontawesome') }}/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{ asset('admin') }}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin') }}/assets/dist/css/adminlte.min.css">


<style>
    body {
        background: url('{{ asset('admin') }}/assets/dist/img/portal-jobs-background.jpg') no-repeat center center fixed;
        background-size: cover;
        position: relative;
    }

    /* طبقة شفافة فوق الخلفية لتسهيل قراءة النص */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        z-index: -1;
    }

    .login-box {
        width: 600px !important;
        margin: 50px auto;
    }

    .login-box .card {
        padding: 20px;
        min-height: 400px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        backdrop-filter: blur(5px);
        background-color: rgba(255, 255, 255, 0.9);

        /* obacity card */
        background-color: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background-color: transparent !important;
        border-bottom: 1px solid #dee2e6;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: translateY(-2px);
    }

    .input-group-text {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    /* تحسينات للشاشات الصغيرة */
    @media (max-width: 576px) {
        .login-box {
            width: 90% !important;
            margin: 20px auto;
        }
    }
</style>


@stack('js')
