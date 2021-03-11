@extends('backend.layouts.app')

@section('title', __('View Status'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Status')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.status.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $status->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Code')</th>
                    <td>{{   $status->code }}</td>
                </tr>
                <tr>
                    <th>@lang('Description')</th>
                    <td>{{   $status->description }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Status Created'):</strong> @displayDate($status->created_at) ({{   $status->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($status->updated_at) ({{   $status->updated_at->diffForHumans() }})

                @if($status->trashed())
                    <strong>@lang('Status Deleted'):</strong> @displayDate($status->deleted_at) ({{   $status->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection