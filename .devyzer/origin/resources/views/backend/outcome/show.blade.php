@extends('backend.layouts.app')

@section('title', __('View Outcome'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Outcome')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.outcome.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $outcome->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Code')</th>
                    <td>{{   $outcome->code }}</td>
                </tr>
                <tr>
                    <th>@lang('Description')</th>
                    <td>{{   $outcome->description }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Outcome Created'):</strong> @displayDate($outcome->created_at) ({{   $outcome->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($outcome->updated_at) ({{   $outcome->updated_at->diffForHumans() }})

                @if($outcome->trashed())
                    <strong>@lang('Outcome Deleted'):</strong> @displayDate($outcome->deleted_at) ({{   $outcome->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection