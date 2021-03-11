<?php

namespace App\Domains\Type\Services;

use App\Domains\Type\Models\Type;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class TypeService.
 */
class TypeService extends BaseService
{
    /**
     * TypeService constructor.
     *
     * @param Type $type
     */
    public function __construct(Type $type)
    {
        $this->model = $type;
    }

    /**
     * @param array $data
     *
     * @return Type
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Type
    {
        DB::beginTransaction();

        try {
            $type = $this->model::create([
                'code' => $data['code'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this type. Please try again.'));
        }

        DB::commit();

        return $type;
    }

    /**
     * @param Type $type
     * @param array $data
     *
     * @return Type
     * @throws \Throwable
     */
    public function update(Type $type, array $data = []): Type
    {
        DB::beginTransaction();

        try {
            $type->update([
                'code' => $data['code'],
                'description' => $data['description'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this type. Please try again.'));
        }

        DB::commit();

        return $type;
    }

    /**
     * @param Type $type
     *
     * @return Type
     * @throws GeneralException
     */
    public function delete(Type $type): Type
    {
        if ($this->deleteById($type->id)) {
            return $type;
        }

        throw new GeneralException('There was a problem deleting this type. Please try again.');
    }

    /**
     * @param Type $type
     *
     * @return Type
     * @throws GeneralException
     */
    public function restore(Type $type): Type
    {
        if ($type->restore()) {
            return $type;
        }

        throw new GeneralException(__('There was a problem restoring this Types. Please try again.'));
    }

    /**
     * @param Type $type
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Type $type): bool
    {
        if ($type->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this Types. Please try again.'));
    }
}