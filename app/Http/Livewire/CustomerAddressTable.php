<?php

namespace App\Http\Livewire;

use App\Domains\CustomerAddress\Models\CustomerAddress;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class CustomerAddressTable.
 */
class CustomerAddressTable extends TableComponent
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
        $query = CustomerAddress::query();

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
            Column::make(__('Customer Name'), 'customer_id')
,
            Column::make(__('Address City'), 'address_id')
,
            Column::make(__('Record Date'), 'rec_date')
,
            Column::make(__('Details'), 'details')
,

            Column::make(__('Actions'))
                ->view('backend.customer-address.includes.actions', 'customeraddress'),
        ];
    }
}