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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create City</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.cities.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" placeholder="Enter Name">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Country</label>
                                <select name="country_id" id="country" class="form-control select2 select2-primary"
                                    data-dropdown-css-class="select2-primary" style="width: 100%;">
                                    <option>-- Select Country --</option>
                                    @forelse ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if (old('country_id') == $country->id) selected @endif>
                                            {{ $country->name }}</option>
                                    @empty
                                        no data else
                                    @endforelse
                                </select>
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group select-style">
                                <label class="font-sm color-text-mutted mb-10">State</label>
                                <select
                                    class="form-control select2 select2-primary {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                    name="state_id" id="state" aria-label="Default select example">
                                    <option value="">Select State</option>
                                    <!-- سيتم ملؤها بالـ JavaScript -->
                                </select>
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('state')" />
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
            // الحصول على القيم من data attributes
            var currentCountry = $('#country').data('current');
            var currentState = $('#state').data('current');
            var stateCountry = $('#state').data('country');

            // تحميل الولايات إذا كان هناك بلد محفوظ
            if (currentCountry) {
                loadStates(currentCountry, true);
            }

            // عند تغيير البلد
            $('#country').change(function() {
                var countryId = $(this).val();
                loadStates(countryId, false);
            });

            // عند تغيير الولاية
            $('#state').change(function() {
                var stateId = $(this).val();
                loadCities(stateId, false);
            });

            function loadStates(countryId, isInitialLoad = false) {
                $('#state').html('<option value="">Select State</option>');

                if (!countryId) return;

                $.ajax({
                    url: '/admin/get-states/' + countryId,
                    type: 'GET',
                    success: function(data) {
                        var shouldSelectState = isInitialLoad && currentState;

                        $.each(data, function(key, state) {
                            var selected = (shouldSelectState && state.id == currentState) ?
                                'selected' : '';
                            $('#state').append('<option value="' + state.id + '" ' + selected +
                                '>' +
                                state.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            }
        });
    </script>
@endpush
