@extends('backend.layouts.app')

@section('title', __('Create Address'))

@section('content')
    <x-forms.post :action="route('admin.address.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Address')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.address.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="build_num" class="col-md-2 col-form-label">@lang('Building Num')</label>

                    <div class="col-md-10">
                        <input type="text" name="build_num" class="form-control" placeholder="{{  __('Building Num') }} " value="{{  old('build_num') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="street" class="col-md-2 col-form-label">@lang('Street')</label>

                    <div class="col-md-10">
                        <input type="text" name="street" class="form-control" placeholder="{{  __('Street') }} " value="{{  old('street') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="area" class="col-md-2 col-form-label">@lang('Area')</label>

                    <div class="col-md-10">
                        <input type="text" name="area" class="form-control" placeholder="{{  __('Area') }} " value="{{  old('area') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="city" class="col-md-2 col-form-label">@lang('City')</label>

                    <div class="col-md-10">
                        <input type="text" name="city" class="form-control" placeholder="{{  __('City') }} " value="{{  old('city') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="zipcode" class="col-md-2 col-form-label">@lang('Zipode')</label>

                    <div class="col-md-10">
                        <input type="text" name="zipcode" class="form-control" placeholder="{{  __('Zipode') }} " value="{{  old('zipcode') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="country" class="col-md-2 col-form-label">@lang('Country')</label>

                    <div class="col-md-10">
                        <input type="text" name="country" class="form-control" placeholder="{{  __('Country') }} " value="{{  old('country') }} "  required   />
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
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Address')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection