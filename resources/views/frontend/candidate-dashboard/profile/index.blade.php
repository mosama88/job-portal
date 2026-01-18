@extends('frontend.layouts.master')
@section('profile_active', 'active')
@push('css')
    <style>
        .ck-editor__editable {
            min-height: 350px
        }
    </style>
@endpush
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Dashboard</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('frontend.candidate-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Company Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-experience" type="button" role="tab"
                                aria-controls="pills-experience" aria-selected="false">Experience & Education</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Account Setting</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="col-4 mx-auto mb-3">
                            @if (session('success') != null)
                                <div class="alert alert-success text-center" id="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>


                        @include('frontend.candidate-dashboard.profile.basic-section')
                        @include('frontend.candidate-dashboard.profile.profile-section')
                        @include('frontend.candidate-dashboard.profile.experience-section')



                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                            tabindex="0">
                            {{-- <form action="{{ route('company.profile.company-account') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Name *</label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                type="text" name="name" value="{{ auth()->user()->name }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                type="email" name="email" value="{{ auth()->user()->email }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-5">
                                        <button type="submit" class="btn btn-success mb-3">Save</button>
                                    </div>
                                </div>
                            </form> --}}
                            <hr>
                            {{-- <form action="{{ route('company.profile.company-password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Password *</label>
                                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                type="password" name="password">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('password')" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                                            <input
                                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                type="password" name="password_confirmation">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('password_confirmation')" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-5">
                                        <button type="submit" class="btn btn-success mb-3">Save</button>

                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create new Experience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="addExperienceForm">
                    @csrf
                    <input type="hidden" name="candidate_id" value="{{ auth()->user()->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Company *</label>
                                    <input class="form-control" type="text" name="company" value="{{ old('company') }}">
                                    <!-- Error will be inserted here by JavaScript -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Department *</label>
                                    <input class="form-control" type="text" name="department"
                                        value="{{ old('department') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Designation *</label>
                                    <input class="form-control" type="text" name="designation"
                                        value="{{ old('designation') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Start Date *</label>
                                    <input class="form-control datepicker" type="text" name="start"
                                        value="{{ old('start') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">End Date *</label>
                                    <input class="form-control datepicker" type="text" name="end"
                                        value="{{ old('end') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check mt-3">
                                    <input name="currently_working" class="form-check-input" type="checkbox"
                                        value="1" id="currentlyWorking">
                                    <label class="form-check-label" for="currentlyWorking">
                                        Currently Working
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Responsibilities *</label>
                                    <textarea cols="30" rows="5" class="form-control" name="responsibilities">{{ old('responsibilities') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Experience</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))

            .catch(error => {
                console.error('Error initializing CKEditor 5:', error);
            });
    </script>

    <script>
        $(document).ready(function() {
            $('#addExperienceForm').on('submit', function(event) {
                event.preventDefault();

                // زر الحفظ
                let submitBtn = $(this).find('button[type="submit"]');
                let originalText = submitBtn.html();

                // إظهار حالة التحميل
                submitBtn.html('<span class="spinner-border spinner-border-sm"></span> جاري الحفظ...');
                submitBtn.prop('disabled', true);

                $.ajax({
                    method: 'POST',
                    url: "{{ route('candidate.candidate-experiences.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status) {
                            // إغلاق المودال مباشرة - هذه هي الطريقة الصحيحة
                            $('#exampleModal').modal('hide');

                            // إعادة تعيين النموذج
                            $('#addExperienceForm')[0].reset();

                            // إعادة تفعيل الزر
                            submitBtn.html(originalText);
                            submitBtn.prop('disabled', false);

                            // إظهار رسالة النجاح
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // إعادة تحميل الصفحة
                                window.location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        // إعادة تفعيل الزر
                        submitBtn.html(originalText);
                        submitBtn.prop('disabled', false);

                        // مسح الأخطاء السابقة
                        $('.is-invalid').removeClass('is-invalid');
                        $('.text-danger').remove();

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            // عرض الأخطاء الجديدة
                            $.each(errors, function(key, messages) {
                                let inputElement = $('[name="' + key + '"]');
                                inputElement.addClass('is-invalid');

                                // إضافة رسالة الخطأ
                                inputElement.after(
                                    '<div class="text-danger small mt-1">' +
                                    messages[0] + '</div>');
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'خطأ في الإدخال',
                                text: 'يرجى مراجعة البيانات المدخلة',
                                timer: 2000
                            });
                        }
                    }
                });
            });

            // إعادة تعيين النموذج عند إغلاق المودال
            $('#exampleModal').on('hidden.bs.modal', function() {
                $('#addExperienceForm')[0].reset();
                $('.is-invalid').removeClass('is-invalid');
                $('.text-danger').remove();
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attach event listener to delete buttons
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior

                    // Retrieve the form ID from the button's data attribute
                    const nameId = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-form-${nameId}`);

                    // Display SweetAlert confirmation dialog
                    Swal.fire({
                        title: 'Are You Sure?',
                        text: "You won't be able to undo this.!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request
                            fetch(form.action, {
                                    method: 'POST',
                                    body: new FormData(form),
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // Add CSRF token
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: "Success!",
                                            text: data
                                                .message, // هذه الرسالة تأتي من الـ Controller
                                            icon: 'success',
                                            timer: 1500,
                                            showConfirmButton: false
                                        }).then(() => {
                                            location
                                                .reload(); // Reload the page
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Error!",
                                            text: data.message ||
                                                "An error occurred",
                                            icon: 'error'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "An error occurred",
                                        icon: 'error'
                                    });
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
