@if (
    $customer->trashed()
)
    <x-utils.form-button
        :action="route('admin.customer.restore', $customer)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.customer.permanently-delete', $customer)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.customer.show', $customer)"/>
    <x-utils.edit-button :href="route('admin.customer.edit', $customer)"/>
    <x-utils.delete-button :href="route('admin.customer.destroy', $customer)"/>
@endif