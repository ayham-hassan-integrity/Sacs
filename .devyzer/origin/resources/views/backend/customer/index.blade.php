@extends('backend.layouts.app')

@section('title', __('Customers'))

@section('breadcrumb-links')
    @include('backend.customer.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Customers')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.customer.create')"
                :text="__('Create Customer')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:customer-table/>
        </x-slot>
    </x-backend.card>
@endsection