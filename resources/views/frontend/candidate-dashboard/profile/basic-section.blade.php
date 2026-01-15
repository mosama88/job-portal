<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
    <form action="{{ route('candidate.basic.info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-6">
                @if (optional($candidate)->getFirstMediaUrl('profile_picture', 'preview'))
                    <img width="200" height="200"
                        src="{{ $candidate?->getFirstMediaUrl('profile_picture', 'preview') }}"
                        alt="{{ $candidate->full_name ?? '' }}">
                @endif
            </div>

            <div class="col-md-6 m-auto">
                @php
                    $cvUrl = optional($candidate)->getFirstMediaUrl('cv'); // رابط الملف الأصلي
                @endphp

                @if ($cvUrl)
                    <!-- لو الملف PDF أو Word، اعرض أيقونة تحميل -->
                    <a href="{{ $cvUrl }}" class="btn btn-primary" download>
                        تحميل السيرة الذاتية
                    </a>

                    <!-- لو حابب تعرض صورة preview لو موجودة -->
                @else
                    <p>لا يوجد سيرة ذاتية.</p>
                @endif
            </div>



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
                    <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text"
                        name="full_name" value="{{ old('full_name', $candidate->full_name) }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('full_name')" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Title/Tag Line *</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" value="{{ old('title', $candidate->title) }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('title')" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Experience Level *</label>
                    <select
                        class="form-control {{ $errors->has('experience_id') ? 'is-invalid' : '' }} form-icons select-active"
                        name="experience_id" aria-label="Default select example">
                        <option value="" selected>Open this select menu</option>
                        @foreach ($other['experiences'] as $experience)
                            <option @if (old('experience_id', $candidate->experience_id) == $experience->id) selected @endif value="{{ $experience->id }}">
                                {{ $experience->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('experience_id')" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Website *</label>
                    <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text"
                        name="website" value="{{ old('website', $candidate->website) }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('website')" />
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Date of Birth</label>
                    <input class="form-control {{ $errors->has('birth_date') ? 'is-invalid' : '' }} datepicker"
                        type="text" name="birth_date" value="{{ old('birth_date', $candidate->birth_date) }}">
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('birth_date')" />
                </div>
            </div>

        </div>

        <div class="box-button mt-15">
            <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
        </div>
    </form>
</div>
