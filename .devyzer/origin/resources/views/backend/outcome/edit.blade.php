@extends('backend.layouts.app')

@section('title', __('Update Outcome'))

@section('content')
    <x-forms.patch :action="route('admin.outcome.update', $outcome)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Outcome')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.outcome.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="code" class="col-md-2 col-form-label">@lang('Code')</label>

                    <div class="col-md-10">
                        <input type="text" name="code" class="form-control" placeholder="{{  __('Code') }} " value="{{   $outcome->title }}  "  required   />
                    </div>

                </div><!--form-group-->
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>

                    <div class="col-md-10">
                        <input type="text" name="description" class="form-control" placeholder="{{  __('Description') }} " value="{{   $outcome->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Outcome')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection