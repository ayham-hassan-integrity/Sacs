@extends('backend.layouts.app')

@section('title', __('Contact Activities'))

@section('breadcrumb-links')
    @include('backend.contact-activity.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Contact Activities')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.contactactivity.create')"
                :text="__('Create ContactActivity')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:contactactivity-table/>
        </x-slot>
    </x-backend.card>
@endsection