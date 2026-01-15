<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
    <form action="{{ route('company.profile.company-info') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            {{--
            <div class="col-md-6">
                 @if (optional($companyInfo)->getFirstMediaUrl('profile_picture', 'preview'))
                    <img width="200" height="200"
                        src="{{ $companyInfo?->getFirstMediaUrl('profile_picture', 'preview') }}"
                        alt="{{ $companyInfo->name ?? '' }}">
                @endif
            </div>
            --}}

            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Profile Picture *</label>
                    <input class="form-control {{ $errors->has('profile_picture') ? 'is-invalid' : '' }}" type="file"
                        name="profile_picture">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('profile_picture')" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">CV *</label>
                    <input class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }}" type="file"
                        name="cv">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('cv')" />
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="name" value="{{ old('name') }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Title/Tag Line *</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" value="{{ old('title') }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('title')" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Experience Level *</label>
                    <input class="form-control {{ $errors->has('experience_id') ? 'is-invalid' : '' }}" type="text"
                        name="experience_id" value="{{ old('experience_id') }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('experience_id')" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Website *</label>
                    <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text"
                        name="website" value="{{ old('website') }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('website')" />
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Date of Birth</label>
                    <input class="form-control {{ $errors->has('birth_date') ? 'is-invalid' : '' }} datepicker"
                        type="text" name="birth_date" value="{{ old('birth_date') }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('birth_date')" />
                </div>
            </div>

        </div>

        <div class="box-button mt-15">
            <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
        </div>
    </form>
</div>
