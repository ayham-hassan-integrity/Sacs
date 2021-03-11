@extends('backend.layouts.app')

@section('title', __('Deleted CustomerAddresss'))

@section('breadcrumb-links')
    @include('backend.customer-address.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted CustomerAddresss')
        </x-slot>

        <x-slot name="body">
            <livewire:customeraddress-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection