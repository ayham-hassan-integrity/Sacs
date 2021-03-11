@extends('backend.layouts.app')

@section('title', __('View Contact'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Contact')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.contact.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Id')</th>
                    <td>{{   $contact->id }}</td>
                </tr>
                <tr>
                    <th>@lang('Photo')</th>
                    <td>{{   $contact->image }}</td>
                </tr>
                <tr>
                    <th>@lang('Name')</th>
                    <td>{{   $contact->name }}</td>
                </tr>
                <tr>
                    <th>@lang('Customer Name')</th>
                    <td>{{   $contact->customer_id }}</td>
                </tr>
                <tr>
                    <th>@lang('Status Code')</th>
                    <td>{{   $contact->status_id }}</td>
                </tr>
                <tr>
                    <th>@lang('Email')</th>
                    <td>{{   $contact->email }}</td>
                </tr>
                <tr>
                    <th>@lang('Web Site')</th>
                    <td>{{   $contact->web_sit }}</td>
                </tr>
                <tr>
                    <th>@lang('Phone')</th>
                    <td>{{   $contact->phone }}</td>
                </tr>
                <tr>
                    <th>@lang('Mobile')</th>
                    <td>{{   $contact->mobile }}</td>
                </tr>
                <tr>
                    <th>@lang('Fax')</th>
                    <td>{{   $contact->fax }}</td>
                </tr>
                <tr>
                    <th>@lang('Details')</th>
                    <td>{{   $contact->details }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Contact Created'):</strong> @displayDate($contact->created_at) ({{   $contact->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($contact->updated_at) ({{   $contact->updated_at->diffForHumans() }})

                @if($contact->trashed())
                    <strong>@lang('Contact Deleted'):</strong> @displayDate($contact->deleted_at) ({{   $contact->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection