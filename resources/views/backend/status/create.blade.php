@extends('backend.layouts.app')

@section('title', __('Create Status'))

@section('content')
    <x-forms.post :action="route('admin.status.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Status')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.status.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="code" class="col-md-2 col-form-label">@lang('Code')</label>

                    <div class="col-md-10">
                        <input type="text" name="code" class="form-control" placeholder="{{  __('Code') }} " value="{{  old('code') }} "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <input type="text" name="description" class="form-control" placeholder="{{  __('Description') }} " value="{{  old('description') }} "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Status')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection