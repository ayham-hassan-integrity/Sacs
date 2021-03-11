@extends('backend.layouts.app')

@section('title', __('Deleted Outcomes'))

@section('breadcrumb-links')
    @include('backend.outcome.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Outcomes')
        </x-slot>

        <x-slot name="body">
            <livewire:outcome-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection