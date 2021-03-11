@if (
    $outcome->trashed()
)
    <x-utils.form-button
        :action="route('admin.outcome.restore', $outcome)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.outcome.permanently-delete', $outcome)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.outcome.show', $outcome)"/>
    <x-utils.edit-button :href="route('admin.outcome.edit', $outcome)"/>
    <x-utils.delete-button :href="route('admin.outcome.destroy', $outcome)"/>
@endif