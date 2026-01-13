@extends('admins.layouts.master', ['titlePage' => 'City'])
@section('cities_active', 'active')
@section('title', 'City')
@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@section('content')

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update {{ $city->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.cities.update', $city->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ old('name', $city->name) }}"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" placeholder="Enter Name">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                            </div>


                        </div>


                            <div class="col-md-6">
                                <div class="form-group select-style">
                                    <label class="font-sm color-text-mutted mb-10">Country *</label>
                                    <select name="country_id" id="country"
                                        data-current="{{ old('country_id', $city->country_id ?? '') }}"
                                        class="form-control select2 select2-primary">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id', $city->country_id) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('country_id')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group select-style">
                                    <label class="font-sm color-text-mutted mb-10">State</label>
                                    <select name="state_id" id="state"
                                        data-current="{{ old('state_id', $city->state_id ?? '') }}"
                                        class="form-control select2 select2-primary">
                                        <option value="">Select State</option>
                                    </select>

                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('state_id')" />
                                </div>
                            </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <!-- Select2 -->
    <script src="{{ asset('admin') }}/assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {

            // القيم المحفوظة
            var currentCountry = $('#country').data('current'); // country_id
            var currentState = $('#state').data('current'); // state_id

            // لو في بلد محفوظة (Edit Page)
            if (currentCountry) {
                loadStates(currentCountry, true);
            }

            // عند تغيير البلد
            $('#country').on('change', function() {
                var countryId = $(this).val();
                loadStates(countryId, false);
            });

            /**
             * تحميل الولايات
             */
            function loadStates(countryId, isInitialLoad = false) {

                // reset
                $('#state').html('<option value="">Select State</option>');

                if (!countryId) return;

                $.ajax({
                    url: '/admin/get-states/' + countryId,
                    type: 'GET',
                    success: function(data) {

                        $.each(data, function(index, state) {

                            var selected =
                                (isInitialLoad && currentState && state.id == currentState) ?
                                'selected' :
                                '';

                            $('#state').append(
                                '<option value="' + state.id + '" ' + selected + '>' +
                                state.name +
                                '</option>'
                            );
                        });

                        // تحديث select2 لو مستخدم
                        if ($.fn.select2) {
                            $('#state').trigger('change.select2');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error loading states:', xhr.responseText);
                    }
                });
            }

            /**
             * حماية من Chart.js errors
             * (لو في dashboard scripts مشتركة)
             */
            if (typeof Chart !== 'undefined') {
                document.querySelectorAll('canvas').forEach(function(canvas) {
                    if (!canvas.getContext) return;
                });
            }

        });
    </script>
@endpush
