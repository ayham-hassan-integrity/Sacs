@if (
    $type->trashed()
)
    <x-utils.form-button
        :action="route('admin.type.restore', $type)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.type.permanently-delete', $type)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.type.show', $type)"/>
    <x-utils.edit-button :href="route('admin.type.edit', $type)"/>
    <x-utils.delete-button :href="route('admin.type.destroy', $type)"/>
@endif