@extends('backend.layouts.app')

@section('title', __('View Type'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Type')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.type.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $type->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Code')</th>
                    <td>{{   $type->code }}</td>
                </tr>
                <tr>
                    <th>@lang('Description')</th>
                    <td>{{   $type->description }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Type Created'):</strong> @displayDate($type->created_at) ({{   $type->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($type->updated_at) ({{   $type->updated_at->diffForHumans() }})

                @if($type->trashed())
                    <strong>@lang('Type Deleted'):</strong> @displayDate($type->deleted_at) ({{   $type->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection