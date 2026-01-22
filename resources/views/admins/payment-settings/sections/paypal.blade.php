 <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">

     <form action="{{ route('admin.payment-settings.update-paypal') }}" method="POST">
         @csrf
         <div class="card-body">

             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="exampleInputName">Paypal Status</label>
                         <select name="paypal_status"
                             class="custom-select {{ $errors->has('paypal_status') ? 'is-invalid' : '' }}">
                             <option selected>Select Options</option>
                             <option @if (old('paypal_status') == 'active') selected @endif value="active">Active</option>
                             <option @if (old('paypal_status') == 'inactive') selected @endif value="inactive">Inactive
                             </option>
                         </select>
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_status')" />
                     </div>
                 </div>

                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="exampleInputName">Paypal Mode</label>
                         <select name="paypal_mode"
                             class="custom-select {{ $errors->has('paypal_mode') ? 'is-invalid' : '' }}">
                             <option selected>Select Options</option>
                             <option @if (old('paypal_mode') == 'sandbox') selected @endif value="sandbox">Sandbox</option>
                             <option @if (old('paypal_mode') == 'live') selected @endif value="live">Live</option>
                         </select>
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_mode')" />
                     </div>
                 </div>


                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="exampleInputName">Country</label>
                         <select name="paypal_country_name"
                             class="form-control select2 select2-primary {{ $errors->has('paypal_country_name') ? 'is-invalid' : '' }}"
                             data-dropdown-css-class="select2-primary" style="width: 100%;">
                             <option>-- Select Country --</option>
                             @forelse ($countries as $country)
                                 <option value="{{ $country->id }}" @if (old('paypal_country_name') == $country->id) selected @endif>
                                     {{ $country->name }}</option>
                             @empty
                                 no data else
                             @endforelse
                         </select>
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_country_name')" />
                     </div>
                 </div>


                 <div class="col-md-6">
                     <div class="form-group">
                         <label for="exampleInputName">Currency</label>
                         <select name="paypal_currency_name"
                             class="form-control select2 select2-primary {{ $errors->has('paypal_currency_name') ? 'is-invalid' : '' }}"
                             data-dropdown-css-class="select2-primary" style="width: 100%;">
                             <option>-- Select Currency --</option>
                             @forelse ($currencies as $currency)
                                 <option value="{{ $currency->id }}" @if (old('paypal_currency_name') == $currency->id) selected @endif>
                                     {{ $currency->code }}</option>
                             @empty
                                 no data else
                             @endforelse
                         </select>
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_currency_name')" />
                     </div>
                 </div>


                 <div class="col-md-12">
                     <div class="form-group">
                         <label for="exampleInputName">Currency Rate</label>
                         <input type="text" name="paypal_currency_rate" value="{{ old('paypal_currency_rate') }}"
                             class="form-control {{ $errors->has('paypal_currency_rate') ? 'is-invalid' : '' }}"
                             id="exampleInputName" placeholder="Enter Currency Rate">
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_currency_rate')" />
                     </div>
                 </div>


                 <div class="col-md-12">
                     <div class="form-group">
                         <label for="exampleInputName">Paypal Client ID</label>
                         <input type="text" name="paypal_client_id" value="{{ old('paypal_client_id') }}"
                             class="form-control {{ $errors->has('paypal_client_id') ? 'is-invalid' : '' }}"
                             id="exampleInputName" placeholder="Enter Paypal Client">
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_client_id')" />
                     </div>
                 </div>

                 <div class="col-md-12">
                     <div class="form-group">
                         <label for="exampleInputSecret">Paypal Secret Key</label>
                         <input type="text" name="paypal_secret_key" value="{{ old('paypal_secret_key') }}"
                             class="form-control {{ $errors->has('paypal_secret_key') ? 'is-invalid' : '' }}"
                             id="exampleInputName" placeholder="Enter Paypal Secret Key">
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_secret_key')" />
                     </div>
                 </div>

                 <div class="col-md-12">
                     <div class="form-group">
                         <label for="exampleInputSecret">Paypal App ID</label>
                         <input type="text" name="paypal_app_id" value="{{ old('paypal_app_id') }}"
                             class="form-control {{ $errors->has('paypal_app_id') ? 'is-invalid' : '' }}"
                             id="exampleInputName" placeholder="Enter Paypal Secret Key">
                         <x-input-error class="mt-2 text-danger" :messages="$errors->get('paypal_app_id')" />

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
