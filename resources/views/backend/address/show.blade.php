@extends('backend.layouts.app')

@section('title', __('View Address'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Address')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.address.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $address->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Building Num')</th>
                    <td>{{   $address->build_num }}</td>
                </tr>
                <tr>
                    <th>@lang('Street')</th>
                    <td>{{   $address->street }}</td>
                </tr>
                <tr>
                    <th>@lang('Area')</th>
                    <td>{{   $address->area }}</td>
                </tr>
                <tr>
                    <th>@lang('City')</th>
                    <td>{{   $address->city }}</td>
                </tr>
                <tr>
                    <th>@lang('Zipode')</th>
                    <td>{{   $address->zipcode }}</td>
                </tr>
                <tr>
                    <th>@lang('Country')</th>
                    <td>{{   $address->country }}</td>
                </tr>
                <tr>
                    <th>@lang('Details')</th>
                    <td>{{   $address->details }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Address Created'):</strong> @displayDate($address->created_at) ({{   $address->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($address->updated_at) ({{   $address->updated_at->diffForHumans() }})

                @if($address->trashed())
                    <strong>@lang('Address Deleted'):</strong> @displayDate($address->deleted_at) ({{   $address->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection