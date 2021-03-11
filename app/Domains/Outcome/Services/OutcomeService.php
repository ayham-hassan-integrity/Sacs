<?php

namespace App\Domains\Outcome\Services;

use App\Domains\Outcome\Models\Outcome;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class OutcomeService.
 */
class OutcomeService extends BaseService
{
    /**
     * OutcomeService constructor.
     *
     * @param Outcome $outcome
     */
    public function __construct(Outcome $outcome)
    {
        $this->model = $outcome;
    }

    /**
     * @param array $data
     *
     * @return Outcome
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Outcome
    {
        DB::beginTransaction();

        try {
            $outcome = $this->model::create([
                'code' => $data['code'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this outcome. Please try again.'));
        }

        DB::commit();

        return $outcome;
    }

    /**
     * @param Outcome $outcome
     * @param array $data
     *
     * @return Outcome
     * @throws \Throwable
     */
    public function update(Outcome $outcome, array $data = []): Outcome
    {
        DB::beginTransaction();

        try {
            $outcome->update([
                'code' => $data['code'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this outcome. Please try again.'));
        }

        DB::commit();

        return $outcome;
    }

    /**
     * @param Outcome $outcome
     *
     * @return Outcome
     * @throws GeneralException
     */
    public function delete(Outcome $outcome): Outcome
    {
        if ($this->deleteById($outcome->id)) {
            return $outcome;
        }

        throw new GeneralException('There was a problem deleting this outcome. Please try again.');
    }

    /**
     * @param Outcome $outcome
     *
     * @return Outcome
     * @throws GeneralException
     */
    public function restore(Outcome $outcome): Outcome
    {
        if ($outcome->restore()) {
            return $outcome;
        }

        throw new GeneralException(__('There was a problem restoring this Outcome. Please try again.'));
    }

    /**
     * @param Outcome $outcome
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Outcome $outcome): bool
    {
        if ($outcome->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this Outcome. Please try again.'));
    }
}