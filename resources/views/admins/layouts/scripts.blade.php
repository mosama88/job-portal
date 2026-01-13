    <!-- jQuery -->
    <script src="{{ asset('admin') }}/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('admin') }}/assets/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('admin') }}/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin') }}/assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin') }}/assets/dist/js/pages/dashboard3.js"></script>

    <!-- toastr -->
    <script src="{{ asset('admin') }}/assets/dist/js/toastr.min.js"></script>


    <!-- sweetalert2@11.js -->
    <script src="{{ asset('admin') }}/assets/dist/js/sweetalert2@11.js"></script>

    <script>
        function resetFilters() {
            window.location.href = window.location.pathname;
        }
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
    </script>
    @stack('js')
