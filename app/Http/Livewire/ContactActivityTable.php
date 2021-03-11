<?php

namespace App\Http\Livewire;

use App\Domains\ContactActivity\Models\ContactActivity;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ContactActivityTable.
 */
class ContactActivityTable extends TableComponent
{
    /**
     * @var string
     */
    public $sortField = 'id';

    /**
     * @var string
     */
    public $status;

    /**
     * @param string $status
     */
    public function mount($status = null): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = ContactActivity::query();

        if ($this->status === 'deleted') {
            return $query->onlyTrashed();
        }

        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Contact Name'), 'contact_id')
,
            Column::make(__('Type Code'), 'type_id')
,
            Column::make(__('Outcome Code'), 'outcome_id')
,
            Column::make(__('Activity date'), 'activity_date')
,
            Column::make(__('Details'), 'details')
,

            Column::make(__('Actions'))
                ->view('backend.contact-activity.includes.actions', 'contactactivity'),
        ];
    }
}