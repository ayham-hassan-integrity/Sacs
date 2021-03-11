@extends('backend.layouts.app')

@section('title', __('View CustomerAddress'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View CustomerAddress')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.customeraddress.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $customeraddress->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Customer Name')</th>
                    <td>{{   $customeraddress->customer_id }}</td>
                </tr>
                <tr>
                    <th>@lang('Address City')</th>
                    <td>{{   $customeraddress->address_id }}</td>
                </tr>
                <tr>
                    <th>@lang('Record Date')</th>
                    <td>{{   $customeraddress->rec_date }}</td>
                </tr>
                <tr>
                    <th>@lang('Details')</th>
                    <td>{{   $customeraddress->details }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('CustomerAddress Created'):</strong> @displayDate($customeraddress->created_at) ({{   $customeraddress->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($customeraddress->updated_at) ({{   $customeraddress->updated_at->diffForHumans() }})

                @if($customeraddress->trashed())
                    <strong>@lang('CustomerAddress Deleted'):</strong> @displayDate($customeraddress->deleted_at) ({{   $customeraddress->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection