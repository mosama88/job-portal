<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
    Profile Section
    <form action="{{ route('candidate.profile.info.update') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Gender *</label>
                    <select name="gender" class="form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                        aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option @if (old('gender') == 'male') selected @endif value="male">Male</option>
                        <option @if (old('gender') == 'female') selected @endif value="female">Female</option>
                    </select>
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('gender')" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Marital Status *</label>
                    <select name="marital_status"
                        class="form-select {{ $errors->has('marital_status') ? 'is-invalid' : '' }}"
                        aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option @if (old('marital_status') == 'single') selected @endif value="single">Single</option>
                        <option @if (old('marital_status') == 'married') selected @endif value="married">Married</option>
                    </select>
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('marital_status')" />
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Your Availability *</label>
                    <select name="availability"
                        class="form-select {{ $errors->has('availability') ? 'is-invalid' : '' }}"
                        aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option @if (old('availability') == 'available') selected @endif value="available">Available</option>
                        <option @if (old('availability') == 'not_available') selected @endif value="not_available">Not Available
                        </option>
                    </select>
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('availability')" />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Profession *</label>
                    <select
                        class="form-control {{ $errors->has('profession_id') ? 'is-invalid' : '' }} form-icons select-active"
                        name="profession_id" aria-label="Default select example">
                        <option value="" selected>Open this select menu</option>
                        @foreach ($other['professions'] as $profession)
                            <option @if (old('profession_id', $candidate->profession_id) == $profession->id) selected @endif value="{{ $profession->id }}">
                                {{ $profession->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('profession_id')" />
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Skills You Have *</label>
                    <select
                        class="form-control {{ $errors->has('skill_you_have') ? 'is-invalid' : '' }} form-icons select-active"
                        name="skill_you_have" aria-label="Default select example" multiple="multiple">
                        @foreach ($other['skills'] as $skill)
                            <option @if (old('skill_you_have', $candidate->skill_you_have) == $skill->id) selected @endif value="{{ $skill->id }}">
                                {{ $skill->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('skill_you_have')" />
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group select-style">
                    <label class="font-sm color-text-mutted mb-10">Languages You Know *</label>
                    <select
                        class="form-control {{ $errors->has('language_you_know') ? 'is-invalid' : '' }} form-icons select-active"
                        name="language_you_know" aria-label="Default select example" multiple="multiple">
                        @foreach ($other['languages'] as $language)
                            <option @if (old('language_you_know', $candidate->language_you_know) == $language->id) selected @endif value="{{ $language->id }}">
                                {{ $language->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('language_you_know')" />
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Biography </label>
                    <textarea id="editor" name="biography" class="form-control {{ $errors->has('biography') ? 'is-invalid' : '' }}"
                        rows="6">{{ old('biography', $candidate->biography) }}</textarea>

                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('biography')" />
                </div>
            </div>
        </div>

        <div class="box-button mt-15">
            <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
        </div>
    </form>
</div>
