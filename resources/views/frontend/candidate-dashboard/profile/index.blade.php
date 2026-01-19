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
                            <form action="{{ route('candidate.profile.candidate-account') }}" method="POST">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Mobile *</label>
                                            <input class="form-control {{ $errors->has('phone_one') ? 'is-invalid' : '' }}"
                                                type="text" name="phone_one" value="{{ auth()->user()->phone_one }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('phone_one')" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Seconed Mobile *</label>
                                            <input class="form-control {{ $errors->has('phone_two') ? 'is-invalid' : '' }}"
                                                type="text" name="phone_two" value="{{ auth()->user()->phone_two }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('phone_two')" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-5">
                                        <button type="submit" class="btn btn-success mb-3">Save</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form action="{{ route('candidate.profile.candidate-password') }}" method="POST">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Create  Modal -->
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
                                    <input class="form-control" type="text" name="company"
                                        value="{{ old('company') }}">
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

    <!--############################################################################################## -->

    <!-- Edit Modal  -->
    <div class="modal fade" id="editExperienceModal" tabindex="-1" aria-labelledby="editExperienceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editExperienceModalLabel">Modifying the experience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="editExperienceForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="experience_id" id="edit_experience_id">
                    <input type="hidden" name="candidate_id" value="{{ auth()->user()->id }}">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Company *</label>
                                    <input class="form-control" type="text" name="company" value=""
                                        id="edit_company">
                                    <div class="invalid-feedback company-error"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Department *</label>
                                    <input class="form-control" type="text" name="department" id="edit_department">
                                    <div class="invalid-feedback department-error"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Designation *</label>
                                    <input class="form-control" type="text" name="designation" id="edit_designation">
                                    <div class="invalid-feedback designation-error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Start Date *</label>
                                    <input class="form-control datepicker" type="text" name="start"
                                        id="edit_start">
                                    <div class="invalid-feedback start-error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">End Date *</label>
                                    <input class="form-control datepicker" type="text" name="end" id="edit_end">
                                    <div class="invalid-feedback end-error"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check mt-3">
                                    <input name="currently_working" class="form-check-input" type="checkbox"
                                        value="1" id="edit_currently_working">
                                    <label class="form-check-label" for="edit_currently_working">
                                        I am currently working
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Responsibilities *</label>
                                    <textarea cols="30" rows="5" class="form-control" name="responsibilities" id="edit_responsibilities"></textarea>
                                    <div class="invalid-feedback responsibilities-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="updateExperienceBtn">
                            Experience Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--############################################################################################## -->
    <!--Create  Education -->
    <div class="modal fade" id="exampleModalEducation" tabindex="-1" aria-labelledby="exampleModalEducation"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalEducation">Create new Education</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="addEducationForm">
                    @csrf
                    <input type="hidden" name="candidate_id" value="{{ auth()->user()->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Level *</label>
                                    <input class="form-control" type="text" name="level"
                                        value="{{ old('level') }}">
                                    <!-- Error will be inserted here by JavaScript -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Degree *</label>
                                    <input class="form-control" type="text" name="degree"
                                        value="{{ old('degree') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Year *</label>
                                    <input class="form-control" type="text" name="year"
                                        value="{{ old('year') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Note *</label>
                                    <textarea cols="30" rows="5" class="form-control" name="note">{{ old('note') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Education</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--############################################################################################## -->

    <!-- Edit Education Modal  -->
    <div class="modal fade" id="editEducationModal" tabindex="-1" aria-labelledby="editEducationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editEducationModalLabel">Modifying the Education</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="editEducationForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="education_id" id="edit_education_id">
                    <input type="hidden" name="candidate_id" value="{{ auth()->user()->id }}">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Level *</label>
                                    <input class="form-control" type="text" name="level" value=""
                                        id="edit_level">
                                    <div class="invalid-feedback level-error"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Degree *</label>
                                    <input class="form-control" type="text" name="degree" id="edit_degree">
                                    <div class="invalid-feedback degree-error"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Year *</label>
                                    <input class="form-control" type="text" name="year" id="edit_year">
                                    <div class="invalid-feedback year-error"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Note *</label>
                                    <textarea cols="30" rows="5" class="form-control" name="note" id="edit_note"></textarea>
                                    <div class="invalid-feedback note-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="updateEducationBtn">
                            Education Update
                        </button>
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
    {{-- // ==================== Start Create Experiance ==================== --}}

    <script>
        $(document).ready(function() {
            $('#addExperienceForm').on('submit', function(event) {
                event.preventDefault();

                // زر الحفظ
                let submitBtn = $(this).find('button[type="submit"]');
                let originalText = submitBtn.html();

                // إظهار حالة التحميل
                submitBtn.html('<span class="spinner-border spinner-border-sm"></span> Saving...');
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
                                title: 'Entry error',
                                text: 'Please review the entered data.',
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

    {{-- // ==================== End Create Experiance ==================== --}}
    {{-- // ==================== Start Edit Experiance ==================== --}}
    <script>
        $(document).ready(function() {
            // CSRF Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ==================== فتح مودال التعديل (الطريقة البسيطة) ====================
            $(document).on('click', '.edit-experience-btn', function() {
                let experienceId = $(this).data('id');

                // إظهار المودال أولاً
                let modal = new bootstrap.Modal(document.getElementById('editExperienceModal'));
                modal.show();

                // إظهار حالة التحميل
                $('#editExperienceModal .modal-body').addClass('loading');
                $('#updateExperienceBtn').prop('disabled', true).html('Loading...');

                // جلب بيانات الخبرة
                $.ajax({
                    method: 'GET',
                    url: "{{ url('candidate/candidate-experiences') }}/" + experienceId + "/edit",
                    success: function(response) {
                        if (response.status) {
                            let experience = response.data;

                            // تعبئة الحقول مباشرة
                            $('#edit_experience_id').val(experience.id);
                            $('#edit_company').val(experience.company || '');
                            $('#edit_department').val(experience.department || '');
                            $('#edit_designation').val(experience.designation || '');
                            $('#edit_start').val(experience.start || '');
                            $('#edit_end').val(experience.end || '');
                            $('#edit_responsibilities').val(experience.responsibilities || '');

                            // تفعيل/تعطيل checkbox
                            if (experience.currently_working == 1) {
                                $('#edit_currently_working').prop('checked', true);
                                $('#edit_end').prop('disabled', true);
                            } else {
                                $('#edit_currently_working').prop('checked', false);
                                $('#edit_end').prop('disabled', false);
                            }

                            // إخفاء حالة التحميل
                            $('#editExperienceModal .modal-body').removeClass('loading');
                            $('#updateExperienceBtn').prop('disabled', false).html(
                                'Experience Update');
                        }
                    },
                    error: function(xhr) {
                        $('#editExperienceModal').modal('hide');
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while loading the data',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            // ==================== تحديث الخبرة ====================
            $('#editExperienceForm').on('submit', function(event) {
                event.preventDefault();

                let experienceId = $('#edit_experience_id').val();
                let updateBtn = $('#updateExperienceBtn');
                let originalText = updateBtn.html();

                updateBtn.html('<span class="spinner-border spinner-border-sm"></span> Updating...');
                updateBtn.prop('disabled', true);

                $.ajax({
                    method: 'POST',
                    url: "{{ url('candidate/candidate-experiences') }}/" + experienceId,
                    data: $(this).serialize() + '&_method=PUT',
                    success: function(response) {
                        if (response.status) {
                            $('#editExperienceModal').modal('hide');

                            updateBtn.html(originalText);
                            updateBtn.prop('disabled', false);

                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        updateBtn.html(originalText);
                        updateBtn.prop('disabled', false);

                        // مسح الأخطاء السابقة
                        $('.is-invalid').removeClass('is-invalid');
                        $('.invalid-feedback').html('');

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, messages) {
                                let input = $('#edit_' + key);
                                input.addClass('is-invalid');

                                // إضافة رسالة الخطأ
                                let errorDiv = input.siblings('.invalid-feedback');
                                if (errorDiv.length) {
                                    errorDiv.html(messages[0]);
                                }
                            });
                        }
                    }
                });
            });

            // ==================== التحكم في حقل تاريخ الانتهاء ====================
            $(document).on('change', '#edit_currently_working', function() {
                if ($(this).is(':checked')) {
                    $('#edit_end').val('').prop('disabled', true);
                } else {
                    $('#edit_end').prop('disabled', false);
                }
            });

            // ==================== إعادة تعيين المودال عند الإغلاق ====================
            $('#editExperienceModal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').html('');
                $('#edit_end').prop('disabled', false);
                $('#updateExperienceBtn').prop('disabled', false).html('Experience Update');
            });
        });
    </script>
    {{-- // ==================== End Edit Experiance ==================== --}}

    <style>
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }
    </style>


    {{-- // ==================== Start Create Education ==================== --}}

    <script>
        $(document).ready(function() {
            $('#addEducationForm').on('submit', function(event) {
                event.preventDefault();

                // زر الحفظ
                let submitBtn = $(this).find('button[type="submit"]');
                let originalText = submitBtn.html();

                // إظهار حالة التحميل
                submitBtn.html('<span class="spinner-border spinner-border-sm"></span> Saving...');
                submitBtn.prop('disabled', true);

                $.ajax({
                    method: 'POST',
                    url: "{{ route('candidate.candidate-educations.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status) {
                            // إغلاق المودال مباشرة - هذه هي الطريقة الصحيحة
                            $('#exampleModalEducation').modal('hide');

                            // إعادة تعيين النموذج
                            $('#addEducationForm')[0].reset();

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
                                title: 'Entry error',
                                text: 'Please review the entered data.',
                                timer: 2000
                            });
                        }
                    }
                });
            });

            // إعادة تعيين النموذج عند إغلاق المودال
            $('#exampleModalEducation').on('hidden.bs.modal', function() {
                $('#addExperienceForm')[0].reset();
                $('.is-invalid').removeClass('is-invalid');
                $('.text-danger').remove();
            });
        });
    </script>

    {{-- // ==================== End Create Education ==================== --}}

    {{-- // ==================== Start Edit Education ==================== --}}
    <script>
        $(document).ready(function() {
            // CSRF Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // ==================== فتح مودال التعديل ====================
            $(document).on('click', '.edit-education-btn', function() {
                // تصحيح هنا: استخدام educationId بدلاً من experienceId
                let educationId = $(this).data('id'); // <-- التصحيح هنا

                // إظهار المودال أولاً
                let modal = new bootstrap.Modal(document.getElementById('editEducationModal'));
                modal.show();

                // إظهار حالة التحميل
                $('#editEducationModal .modal-body').addClass('loading');
                $('#updateEducationBtn').prop('disabled', true).html('Loading...');

                // جلب بيانات التعليم
                $.ajax({
                    method: 'GET',
                    url: "{{ url('candidate/candidate-educations') }}/" + educationId + "/edit",
                    success: function(response) {
                        if (response.status) {
                            let education = response.data;

                            // تعبئة الحقول مباشرة
                            $('#edit_education_id').val(education.id);
                            $('#edit_level').val(education.level || '');
                            $('#edit_degree').val(education.degree || '');
                            $('#edit_year').val(education.year || '');
                            $('#edit_note').val(education.note || '');

                            // إخفاء حالة التحميل
                            $('#editEducationModal .modal-body').removeClass('loading');
                            $('#updateEducationBtn').prop('disabled', false).html(
                                'Education Update');
                        }
                    },
                    error: function(xhr) {
                        $('#editEducationModal').modal('hide');
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while loading the data',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

            // ==================== تحديث التعليم ====================
            $('#editEducationForm').on('submit', function(event) {
                event.preventDefault();

                let educationId = $('#edit_education_id').val();
                let updateBtn = $('#updateEducationBtn');
                let originalText = updateBtn.html();

                updateBtn.html('<span class="spinner-border spinner-border-sm"></span> Updating...');
                updateBtn.prop('disabled', true);

                $.ajax({
                    method: 'POST',
                    url: "{{ url('candidate/candidate-educations') }}/" + educationId,
                    data: $(this).serialize() + '&_method=PUT',
                    success: function(response) {
                        if (response.status) {
                            $('#editEducationModal').modal('hide');

                            updateBtn.html(originalText);
                            updateBtn.prop('disabled', false);

                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        updateBtn.html(originalText);
                        updateBtn.prop('disabled', false);

                        // مسح الأخطاء السابقة
                        $('.is-invalid').removeClass('is-invalid');
                        $('.invalid-feedback').html('');

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, messages) {
                                let input = $('#edit_' + key);
                                input.addClass('is-invalid');

                                // إضافة رسالة الخطأ
                                let errorDiv = input.siblings('.invalid-feedback');
                                if (errorDiv.length) {
                                    errorDiv.html(messages[0]);
                                }
                            });
                        }
                    }
                });
            });


            // ==================== إعادة تعيين المودال عند الإغلاق ====================
            $('#editEducationModal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').html('');
                $('#updateEducationBtn').prop('disabled', false).html('Education Update');
            });
        });
    </script>
    {{-- // ==================== End Edit Education ==================== --}}

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
