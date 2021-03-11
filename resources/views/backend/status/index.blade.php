@extends('backend.layouts.app')

@section('title', __('Status'))

@section('breadcrumb-links')
    @include('backend.status.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Status')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.status.create')"
                :text="__('Create Status')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:status-table/>
        </x-slot>
    </x-backend.card>
@endsection