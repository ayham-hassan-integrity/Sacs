@extends('backend.layouts.app')

@section('title', __('Customer Address'))

@section('breadcrumb-links')
    @include('backend.customer-address.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Customer Address')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.customeraddress.create')"
                :text="__('Create CustomerAddress')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:customeraddress-table/>
        </x-slot>
    </x-backend.card>
@endsection