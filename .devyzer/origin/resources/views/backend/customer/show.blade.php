@extends('backend.layouts.app')

@section('title', __('View Customer'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Customer')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.customer.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $customer->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Customer Name')</th>
                    <td>{{   $customer->name }}</td>
                </tr>
                <tr>
                    <th>@lang('Coming Date')</th>
                    <td>{{   $customer->coming_date }}</td>
                </tr>
                <tr>
                    <th>@lang('Details')</th>
                    <td>{{   $customer->details }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Customer Created'):</strong> @displayDate($customer->created_at) ({{   $customer->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($customer->updated_at) ({{   $customer->updated_at->diffForHumans() }})

                @if($customer->trashed())
                    <strong>@lang('Customer Deleted'):</strong> @displayDate($customer->deleted_at) ({{   $customer->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection