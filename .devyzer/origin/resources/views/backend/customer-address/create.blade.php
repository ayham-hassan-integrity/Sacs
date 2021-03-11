@extends('backend.layouts.app')

@section('title', __('Create CustomerAddress'))

@section('content')
    <x-forms.post :action="route('admin.customeraddress.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create CustomerAddress')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.customeraddress.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="customer_id" class="col-md-2 col-form-label">@lang('Customer Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="customer_id" class="form-control" placeholder="{{  __('Customer Name') }} " value="{{  old('customer_id') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="address_id" class="col-md-2 col-form-label">@lang('Address City')</label>

                    <div class="col-md-10">
                        <input type="text" name="address_id" class="form-control" placeholder="{{  __('Address City') }} " value="{{  old('address_id') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="rec_date" class="col-md-2 col-form-label">@lang('Record Date')</label>

                    <div class="col-md-10">
                        <input type="text" name="rec_date" class="form-control" placeholder="{{  __('Record Date') }} " value="{{  old('rec_date') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="details" class="col-md-2 col-form-label">@lang('Details')</label>

                    <div class="col-md-10">
                        <input type="text" name="details" class="form-control" placeholder="{{  __('Details') }} " value="{{  old('details') }} "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create CustomerAddress')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection