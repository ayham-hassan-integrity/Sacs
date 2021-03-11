@extends('backend.layouts.app')

@section('title', __('Update ContactActivity'))

@section('content')
    <x-forms.patch :action="route('admin.contactactivity.update', $contactactivity)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update ContactActivity')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.contactactivity.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="contact_id" class="col-md-2 col-form-label">@lang('Contact Name')</label>

                    <div class="col-md-10">
                        <input type="text" name="contact_id" class="form-control" placeholder="{{  __('Contact Name') }} " value="{{   $contactactivity->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="type_id" class="col-md-2 col-form-label">@lang('Type Code')</label>

                    <div class="col-md-10">
                        <input type="text" name="type_id" class="form-control" placeholder="{{  __('Type Code') }} " value="{{   $contactactivity->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="outcome_id" class="col-md-2 col-form-label">@lang('Outcome Code')</label>

                    <div class="col-md-10">
                        <input type="text" name="outcome_id" class="form-control" placeholder="{{  __('Outcome Code') }} " value="{{   $contactactivity->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="activity_date" class="col-md-2 col-form-label">@lang('Activity date')</label>

                    <div class="col-md-10">
                        <input type="text" name="activity_date" class="form-control" placeholder="{{  __('Activity date') }} " value="{{   $contactactivity->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="details" class="col-md-2 col-form-label">@lang('Details')</label>

                    <div class="col-md-10">
                        <input type="text" name="details" class="form-control" placeholder="{{  __('Details') }} " value="{{   $contactactivity->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update ContactActivity')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection