<?php

namespace App\Http\Livewire;

use App\Domains\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ContactTable.
 */
class ContactTable extends TableComponent
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
        $query = Contact::query();

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
            Column::make(__('Photo'), 'image')
,
            Column::make(__('Name'), 'name')
,
            Column::make(__('Customer Name'), 'customer_id')
,
            Column::make(__('Status Code'), 'status_id')
,
            Column::make(__('Email'), 'email')
,

            Column::make(__('Actions'))
                ->view('backend.contact.includes.actions', 'contact'),
        ];
    }
}