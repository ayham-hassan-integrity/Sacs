@extends('backend.layouts.app')

@section('title', __('Create Contact'))

@section('content')
    <x-forms.post :action="route('admin.contact.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Contact')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.contact.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="image" class="col-md-2 col-form-label">@lang('Photo')</label>

                    <div class="col-md-10">
                        <input type="text" name="image" class="form-control" placeholder="{{  __('Photo') }} " value="{{  old('image') }} "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{  __('Name') }} " value="{{  old('name') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="customer_id" class="col-md-2 col-form-label">@lang('Customer Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="customer_id" class="form-control" placeholder="{{  __('Customer Name') }} " value="{{  old('customer_id') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="status_id" class="col-md-2 col-form-label">@lang('Status Code')</label>

                    <div class="col-md-10">
                        <input type="text" name="status_id" class="form-control" placeholder="{{  __('Status Code') }} " value="{{  old('status_id') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('Email')</label>

                    <div class="col-md-10">
                        <input type="text" name="email" class="form-control" placeholder="{{  __('Email') }} " value="{{  old('email') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="web_sit" class="col-md-2 col-form-label">@lang('Web Site')</label>

                    <div class="col-md-10">
                        <input type="text" name="web_sit" class="form-control" placeholder="{{  __('Web Site') }} " value="{{  old('web_sit') }} "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="mobile" class="col-md-2 col-form-label">@lang('Mobile')</label>

                    <div class="col-md-10">
                        <input type="text" name="mobile" class="form-control" placeholder="{{  __('Mobile') }} " value="{{  old('mobile') }} "  />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="fax" class="col-md-2 col-form-label">@lang('Fax')</label>

                    <div class="col-md-10">
                        <input type="text" name="fax" class="form-control" placeholder="{{  __('Fax') }} " value="{{  old('fax') }} "  />
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
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Contact')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection