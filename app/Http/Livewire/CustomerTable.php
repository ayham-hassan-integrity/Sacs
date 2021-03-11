<?php

namespace App\Http\Livewire;

use App\Domains\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class CustomerTable.
 */
class CustomerTable extends TableComponent
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
        $query = Customer::query();

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
            Column::make(__('Customer Name'), 'name')
,
            Column::make(__('Coming Date'), 'coming_date')
,
            Column::make(__('Details'), 'details')
,

            Column::make(__('Actions'))
                ->view('backend.customer.includes.actions', 'customer'),
        ];
    }
}