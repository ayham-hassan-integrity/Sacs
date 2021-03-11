@if (
    $customeraddress->trashed()
)
    <x-utils.form-button
        :action="route('admin.customeraddress.restore', $customeraddress)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.customeraddress.permanently-delete', $customeraddress)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.customeraddress.show', $customeraddress)"/>
    <x-utils.edit-button :href="route('admin.customeraddress.edit', $customeraddress)"/>
    <x-utils.delete-button :href="route('admin.customeraddress.destroy', $customeraddress)"/>
@endif