<?php

namespace App\Domains\ContactActivity\Services;

use App\Domains\ContactActivity\Models\ContactActivity;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ContactActivityService.
 */
class ContactActivityService extends BaseService
{
    /**
     * ContactActivityService constructor.
     *
     * @param ContactActivity $contactactivity
     */
    public function __construct(ContactActivity $contactactivity)
    {
        $this->model = $contactactivity;
    }

    /**
     * @param array $data
     *
     * @return ContactActivity
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ContactActivity
    {
        DB::beginTransaction();

        try {
            $contactactivity = $this->model::create([
                'contact_id' => $data['contact_id'],
                'type_id' => $data['type_id'],
                'outcome_id' => $data['outcome_id'],
                'activity_date' => $data['activity_date'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this contactactivity. Please try again.'));
        }

        DB::commit();

        return $contactactivity;
    }

    /**
     * @param ContactActivity $contactactivity
     * @param array $data
     *
     * @return ContactActivity
     * @throws \Throwable
     */
    public function update(ContactActivity $contactactivity, array $data = []): ContactActivity
    {
        DB::beginTransaction();

        try {
            $contactactivity->update([
                'contact_id' => $data['contact_id'],
                'type_id' => $data['type_id'],
                'outcome_id' => $data['outcome_id'],
                'activity_date' => $data['activity_date'],
                'details' => $data['details'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this contactactivity. Please try again.'));
        }

        DB::commit();

        return $contactactivity;
    }

    /**
     * @param ContactActivity $contactactivity
     *
     * @return ContactActivity
     * @throws GeneralException
     */
    public function delete(ContactActivity $contactactivity): ContactActivity
    {
        if ($this->deleteById($contactactivity->id)) {
            return $contactactivity;
        }

        throw new GeneralException('There was a problem deleting this contactactivity. Please try again.');
    }

    /**
     * @param ContactActivity $contactactivity
     *
     * @return ContactActivity
     * @throws GeneralException
     */
    public function restore(ContactActivity $contactactivity): ContactActivity
    {
        if ($contactactivity->restore()) {
            return $contactactivity;
        }

        throw new GeneralException(__('There was a problem restoring this Contact Activities. Please try again.'));
    }

    /**
     * @param ContactActivity $contactactivity
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(ContactActivity $contactactivity): bool
    {
        if ($contactactivity->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this Contact Activities. Please try again.'));
    }
}