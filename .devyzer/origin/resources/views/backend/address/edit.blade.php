@extends('backend.layouts.app')

@section('title', __('Update Address'))

@section('content')
    <x-forms.patch :action="route('admin.address.update', $address)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Address')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.address.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="build_num" class="col-md-2 col-form-label">@lang('Building Num')</label>

                    <div class="col-md-10">
                        <input type="text" name="build_num" class="form-control" placeholder="{{  __('Building Num') }} " value="{{   $address->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="street" class="col-md-2 col-form-label">@lang('Street')</label>

                    <div class="col-md-10">
                        <input type="text" name="street" class="form-control" placeholder="{{  __('Street') }} " value="{{   $address->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="area" class="col-md-2 col-form-label">@lang('Area')</label>

                    <div class="col-md-10">
                        <input type="text" name="area" class="form-control" placeholder="{{  __('Area') }} " value="{{   $address->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="city" class="col-md-2 col-form-label">@lang('City')</label>

                    <div class="col-md-10">
                        <input type="text" name="city" class="form-control" placeholder="{{  __('City') }} " value="{{   $address->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="zipcode" class="col-md-2 col-form-label">@lang('Zipode')</label>

                    <div class="col-md-10">
                        <input type="text" name="zipcode" class="form-control" placeholder="{{  __('Zipode') }} " value="{{   $address->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="country" class="col-md-2 col-form-label">@lang('Country')</label>

                    <div class="col-md-10">
                        <input type="text" name="country" class="form-control" placeholder="{{  __('Country') }} " value="{{   $address->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="details" class="col-md-2 col-form-label">@lang('Details')</label>

                    <div class="col-md-10">
                        <input type="text" name="details" class="form-control" placeholder="{{  __('Details') }} " value="{{   $address->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Address')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection