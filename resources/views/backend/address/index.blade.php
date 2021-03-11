@extends('backend.layouts.app')

@section('title', __('Addresses'))

@section('breadcrumb-links')
    @include('backend.address.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Addresses')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.address.create')"
                :text="__('Create Address')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:address-table/>
        </x-slot>
    </x-backend.card>
@endsection