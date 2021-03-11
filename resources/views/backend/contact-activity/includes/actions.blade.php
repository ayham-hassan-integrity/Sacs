@if (
    $contactactivity->trashed()
)
    <x-utils.form-button
        :action="route('admin.contactactivity.restore', $contactactivity)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.contactactivity.permanently-delete', $contactactivity)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.contactactivity.show', $contactactivity)"/>
    <x-utils.edit-button :href="route('admin.contactactivity.edit', $contactactivity)"/>
    <x-utils.delete-button :href="route('admin.contactactivity.destroy', $contactactivity)"/>
@endif