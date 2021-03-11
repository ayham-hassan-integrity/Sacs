<?php

namespace App\Http\Livewire;

use App\Domains\Address\Models\Address;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class AddressTable.
 */
class AddressTable extends TableComponent
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
        $query = Address::query();

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
            Column::make(__('Building Num'), 'build_num')
,
            Column::make(__('Street'), 'street')
,
            Column::make(__('Area'), 'area')
,
            Column::make(__('City'), 'city')
,
            Column::make(__('Zipode'), 'zipcode')
,
            Column::make(__('Country'), 'country')
,
            Column::make(__('Details'), 'details')
,

            Column::make(__('Actions'))
                ->view('backend.address.includes.actions', 'address'),
        ];
    }
}