@extends('backend.layouts.app')

@section('title', __('Create Customer'))

@section('content')
    <x-forms.post :action="route('admin.customer.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Customer')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.customer.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Customer Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" placeholder="{{  __('Customer Name') }} " value="{{  old('name') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="coming_date" class="col-md-2 col-form-label">@lang('Coming Date')</label>

                    <div class="col-md-10">
                        <input type="text" name="coming_date" class="form-control" placeholder="{{  __('Coming Date') }} " value="{{  old('coming_date') }} "  required   />
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
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Customer')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection