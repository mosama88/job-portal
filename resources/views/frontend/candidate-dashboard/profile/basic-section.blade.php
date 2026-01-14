 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
     <form action="{{ route('company.profile.company-info') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
             <div class="col-md-6">
                 {{-- @if (optional($companyInfo)->getFirstMediaUrl('logo', 'preview'))
                                            <img width="200" height="200"
                                                src="{{ $companyInfo?->getFirstMediaUrl('logo', 'preview') }}"
                                                alt="{{ $companyInfo->name ?? '' }}">
                                        @endif --}}

             </div>
             <div class="col-md-6">
                 {{-- @if (optional($companyInfo)->getFirstMediaUrl('banner', 'preview'))
                                            <img width="200" height="200"
                                                src="{{ $companyInfo?->getFirstMediaUrl('banner', 'preview') }}"
                                                alt="{{ $companyInfo->name ?? '' }}">
                                        @endif --}}

             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Logo *</label>
                     <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" type="file"
                         name="logo">
                     <x-input-error class="mt-2 text-danger" :messages="$errors->get('logo')" />
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Banner *</label>
                     <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}" type="file"
                         name="banner">
                     <x-input-error class="mt-2 text-danger" :messages="$errors->get('banner')" />
                 </div>
             </div>

             <div class="col-md-12">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                     <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                         name="name" value="{{ old('name') }}">
                     <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                 </div>
             </div>

             <div class="col-md-12">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                     <textarea cols="30" rows="10" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}"
                         name="bio">{{ old('bio') }}</textarea>
                     <x-input-error class="mt-2 text-danger" :messages="$errors->get('bio')" />
                 </div>
             </div>

             <div class="col-md-12">
                 <div class="form-group">
                     <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                     <textarea cols="30" rows="10" class="form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}"
                         name="vision">{{ old('vision') }}</textarea>
                     <x-input-error class="mt-2 text-danger" :messages="$errors->get('vision')" />
                 </div>
             </div>
         </div>

         <div class="box-button mt-15">
             <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
         </div>
     </form>
 </div>
