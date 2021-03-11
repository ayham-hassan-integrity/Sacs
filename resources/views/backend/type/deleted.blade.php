@extends('backend.layouts.app')

@section('title', __('Deleted Types'))

@section('breadcrumb-links')
    @include('backend.type.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Types')
        </x-slot>

        <x-slot name="body">
            <livewire:type-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection