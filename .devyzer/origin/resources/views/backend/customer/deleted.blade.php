@extends('backend.layouts.app')

@section('title', __('Deleted Customers'))

@section('breadcrumb-links')
    @include('backend.customer.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Customers')
        </x-slot>

        <x-slot name="body">
            <livewire:customer-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection