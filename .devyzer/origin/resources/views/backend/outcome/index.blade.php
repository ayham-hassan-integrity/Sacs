@extends('backend.layouts.app')

@section('title', __('Outcome'))

@section('breadcrumb-links')
    @include('backend.outcome.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Outcome')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.outcome.create')"
                :text="__('Create Outcome')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:outcome-table/>
        </x-slot>
    </x-backend.card>
@endsection