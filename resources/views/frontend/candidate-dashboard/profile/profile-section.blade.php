  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
      Profile Section
      <form action="{{ route('company.profile.company-founding') }}" method="POST">
          @csrf
          <div class="row">
              <div class="col-md-4">
                  <div class="form-group select-style">
                      <label class="font-sm color-text-mutted mb-10">Gender *</label>
                      <select name="gender" class="form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                          aria-label="Default select example">
                          <option selected>Open this select menu</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
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
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                      </select>
                      <x-input-error class="mt-2 text-danger" :messages="$errors->get('marital_status')" />
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="form-group select-style">
                      <label class="font-sm color-text-mutted mb-10">Your Availability *</label>
                      <select class="form-select {{ $errors->has('establishemnt_date') ? 'is-invalid' : '' }}"
                          aria-label="Default select example">
                          <option selected>Open this select menu</option>
                          <option value="1">Available</option>
                          <option value="2">Not Available</option>
                      </select>
                      <x-input-error class="mt-2 text-danger" :messages="$errors->get('organization_type_id')" />
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
              
              <div class="col-md-6">
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


              <div class="col-md-12">
                  <div class="form-group select-style">
                      <label class="font-sm color-text-mutted mb-10">Skills You Have *</label>
                      <select
                          class="form-control {{ $errors->has('experience_id') ? 'is-invalid' : '' }} form-icons select-active"
                          name="experience_id" aria-label="Default select example" multiple="multiple">
                          @foreach ($other['languages'] as $language)
                              <option @if (old('experience_id', $candidate->experience_id) == $language->id) selected @endif value="{{ $experience->id }}">
                                  {{ $language->name }}
                              </option>
                          @endforeach
                      </select>
                      <x-input-error class="mt-2 text-danger" :messages="$errors->get('experience_id')" />
                  </div>
              </div>


              <div class="col-md-12">
                  <div class="form-group select-style">
                      <label class="font-sm color-text-mutted mb-10">Languages You Know *</label>
                      <select
                          class="form-control {{ $errors->has('experience_id') ? 'is-invalid' : '' }} form-icons select-active"
                          name="experience_id" aria-label="Default select example" multiple="multiple">
                          @foreach ($other['languages'] as $language)
                              <option @if (old('experience_id', $candidate->experience_id) == $language->id) selected @endif value="{{ $experience->id }}">
                                  {{ $language->name }}
                              </option>
                          @endforeach
                      </select>
                      <x-input-error class="mt-2 text-danger" :messages="$errors->get('experience_id')" />
                  </div>
              </div>


              <div class="col-md-12">
                  <div class="form-group">
                      <label class="font-sm color-text-mutted mb-10">Biography </label>
                      <textarea cols="30" rows="10" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}"
                          name="bio">{{ old('bio', $candidate->bio) }}</textarea>
                      <x-input-error class="mt-2 text-danger" :messages="$errors->get('website')" />
                  </div>
              </div>
          </div>

          <div class="box-button mt-15">
              <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
          </div>
      </form>
  </div>
