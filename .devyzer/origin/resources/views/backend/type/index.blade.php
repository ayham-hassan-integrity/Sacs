@extends('backend.layouts.app')

@section('title', __('Types'))

@section('breadcrumb-links')
    @include('backend.type.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Types')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.type.create')"
                :text="__('Create Type')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:type-table/>
        </x-slot>
    </x-backend.card>
@endsection