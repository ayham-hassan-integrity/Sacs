@extends('backend.layouts.app')

@section('title', __('Update CustomerAddress'))

@section('content')
    <x-forms.patch :action="route('admin.customeraddress.update', $customeraddress)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update CustomerAddress')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.customeraddress.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="customer_id" class="col-md-2 col-form-label">@lang('Customer Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="customer_id" class="form-control" placeholder="{{  __('Customer Name') }} " value="{{   $customeraddress->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="address_id" class="col-md-2 col-form-label">@lang('Address City')</label>

                    <div class="col-md-10">
                        <input type="text" name="address_id" class="form-control" placeholder="{{  __('Address City') }} " value="{{   $customeraddress->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="rec_date" class="col-md-2 col-form-label">@lang('Record Date')</label>

                    <div class="col-md-10">
                        <input type="text" name="rec_date" class="form-control" placeholder="{{  __('Record Date') }} " value="{{   $customeraddress->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="details" class="col-md-2 col-form-label">@lang('Details')</label>

                    <div class="col-md-10">
                        <input type="text" name="details" class="form-control" placeholder="{{  __('Details') }} " value="{{   $customeraddress->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update CustomerAddress')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection