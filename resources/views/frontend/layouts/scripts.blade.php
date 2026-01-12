<script src="{{ asset('frontend') }}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/waypoints.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/wow.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/magnific-popup.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/select2.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/isotope.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/scrollup.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/Font-Awesome.js"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/counterup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.10.1/dist/js/bootstrap-datepicker.min.js"></script>

<script src="{{ asset('frontend') }}/assets/js/main.js?v=4.1"></script>
<script src="{{ asset('frontend') }}/assets/js/plugins/counterup.js"></script>

<!-- Add Laravel Notify JavaScript -->
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-m-d',
    });
</script>

<script>
    // ننتظر الصفحة تحمل بالكامل
    document.addEventListener('DOMContentLoaded', function() {
        const alertBox = document.getElementById('success-alert');
        if (alertBox) {
            setTimeout(() => {
                // اختفاء تدريجي (اختياري)
                alertBox.style.transition = 'opacity 0.5s ease';
                alertBox.style.opacity = '0';
                // إزالة العنصر من DOM بعد اختفاءه
                setTimeout(() => alertBox.remove(), 500);
            }, 3000); // 3000 ملي ثانية = 3 ثواني
        }
    });
</script>
@stack('js')
