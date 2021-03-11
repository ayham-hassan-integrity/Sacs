@extends('backend.layouts.app')

@section('title', __('Deleted Addresss'))

@section('breadcrumb-links')
    @include('backend.address.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Addresss')
        </x-slot>

        <x-slot name="body">
            <livewire:address-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection