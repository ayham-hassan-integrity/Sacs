@extends('backend.layouts.app')

@section('title', __('Create ContactActivity'))

@section('content')
    <x-forms.post :action="route('admin.contactactivity.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create ContactActivity')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.contactactivity.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="contact_id" class="col-md-2 col-form-label">@lang('Contact Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="contact_id" class="form-control" placeholder="{{  __('Contact Name') }} " value="{{  old('contact_id') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="type_id" class="col-md-2 col-form-label">@lang('Type Code')</label>

                    <div class="col-md-10">
                        <input type="text" name="type_id" class="form-control" placeholder="{{  __('Type Code') }} " value="{{  old('type_id') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="outcome_id" class="col-md-2 col-form-label">@lang('Outcome Code')</label>

                    <div class="col-md-10">
                        <input type="text" name="outcome_id" class="form-control" placeholder="{{  __('Outcome Code') }} " value="{{  old('outcome_id') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="activity_date" class="col-md-2 col-form-label">@lang('Activity date')</label>

                    <div class="col-md-10">
                        <input type="text" name="activity_date" class="form-control" placeholder="{{  __('Activity date') }} " value="{{  old('activity_date') }} "  required   />
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
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create ContactActivity')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection