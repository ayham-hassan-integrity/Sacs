@extends('backend.layouts.app')

@section('title', __('Deleted ContactActivitys'))

@section('breadcrumb-links')
    @include('backend.contact-activity.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted ContactActivitys')
        </x-slot>

        <x-slot name="body">
            <livewire:contactactivity-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection