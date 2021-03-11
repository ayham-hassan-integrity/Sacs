@if (
    $address->trashed()
)
    <x-utils.form-button
        :action="route('admin.address.restore', $address)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.address.permanently-delete', $address)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.address.show', $address)"/>
    <x-utils.edit-button :href="route('admin.address.edit', $address)"/>
    <x-utils.delete-button :href="route('admin.address.destroy', $address)"/>
@endif