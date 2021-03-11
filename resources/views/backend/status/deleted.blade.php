@extends('backend.layouts.app')

@section('title', __('Deleted Statuss'))

@section('breadcrumb-links')
    @include('backend.status.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Statuss')
        </x-slot>

        <x-slot name="body">
            <livewire:status-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection