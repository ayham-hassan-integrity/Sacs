@extends('backend.layouts.app')

@section('title', __('View ContactActivity'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View ContactActivity')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.contactactivity.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $contactactivity->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Contact Name')</th>
                    <td>{{   $contactactivity->contact_id }}</td>
                </tr>
                <tr>
                    <th>@lang('Type Code')</th>
                    <td>{{   $contactactivity->type_id }}</td>
                </tr>
                <tr>
                    <th>@lang('Outcome Code')</th>
                    <td>{{   $contactactivity->outcome_id }}</td>
                </tr>
                <tr>
                    <th>@lang('Activity date')</th>
                    <td>{{   $contactactivity->activity_date }}</td>
                </tr>
                <tr>
                    <th>@lang('Details')</th>
                    <td>{{   $contactactivity->details }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('ContactActivity Created'):</strong> @displayDate($contactactivity->created_at) ({{   $contactactivity->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($contactactivity->updated_at) ({{   $contactactivity->updated_at->diffForHumans() }})

                @if($contactactivity->trashed())
                    <strong>@lang('ContactActivity Deleted'):</strong> @displayDate($contactactivity->deleted_at) ({{   $contactactivity->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection