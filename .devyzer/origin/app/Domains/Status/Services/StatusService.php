<?php

namespace App\Domains\Status\Services;

use App\Domains\Status\Models\Status;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class StatusService.
 */
class StatusService extends BaseService
{
    /**
     * StatusService constructor.
     *
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->model = $status;
    }

    /**
     * @param array $data
     *
     * @return Status
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Status
    {
        DB::beginTransaction();

        try {
            $status = $this->model::create([
                'code' => $data['code'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this status. Please try again.'));
        }

        DB::commit();

        return $status;
    }

    /**
     * @param Status $status
     * @param array $data
     *
     * @return Status
     * @throws \Throwable
     */
    public function update(Status $status, array $data = []): Status
    {
        DB::beginTransaction();

        try {
            $status->update([
                'code' => $data['code'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this status. Please try again.'));
        }

        DB::commit();

        return $status;
    }

    /**
     * @param Status $status
     *
     * @return Status
     * @throws GeneralException
     */
    public function delete(Status $status): Status
    {
        if ($this->deleteById($status->id)) {
            return $status;
        }

        throw new GeneralException('There was a problem deleting this status. Please try again.');
    }

    /**
     * @param Status $status
     *
     * @return Status
     * @throws GeneralException
     */
    public function restore(Status $status): Status
    {
        if ($status->restore()) {
            return $status;
        }

        throw new GeneralException(__('There was a problem restoring this Status. Please try again.'));
    }

    /**
     * @param Status $status
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Status $status): bool
    {
        if ($status->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this Status. Please try again.'));
    }
}