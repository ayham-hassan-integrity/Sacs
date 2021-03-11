@if (
    $status->trashed()
)
    <x-utils.form-button
        :action="route('admin.status.restore', $status)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.status.permanently-delete', $status)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.status.show', $status)"/>
    <x-utils.edit-button :href="route('admin.status.edit', $status)"/>
    <x-utils.delete-button :href="route('admin.status.destroy', $status)"/>
@endif