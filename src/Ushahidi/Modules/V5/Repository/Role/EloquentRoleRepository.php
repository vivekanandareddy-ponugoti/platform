<?php

namespace Ushahidi\Modules\V5\Repository\Role;

use Ushahidi\Modules\V5\Models\Role;
use Ushahidi\Modules\V5\Repository\Role\RoleRepository as RoleRepository;
use Ushahidi\Core\Exception\NotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class EloquentRoleRepository implements RoleRepository
{
    /**
     * This method will fetch all the Role for the logged user from the database utilising
     * Laravel Eloquent ORM and return them as an array
     * @param int $limit
     * @param int $skip
     * @param string $sortBy
     * @param string $order
     * @return Role[]
     */
    public function fetch(int $limit, int $skip, string $sortBy, string $order, array $search_data): LengthAwarePaginator
    {
        return $this->setSearchCondition(
            $search_data,
            Role::take($limit)
                ->skip($skip)
                ->orderBy($sortBy, $order)
        )->paginate($limit);
    }

    /**
     * This method will fetch a single Role from the database utilising
     * Laravel Eloquent ORM. Will throw an exception if provided identifier does
     * not exist in the database.
     * @param int $id
     * @return Role
     * @throws NotFoundException
     */
    public function findById(int $id): Role
    {
        $role = Role::find($id);
        if (!$role instanceof Role) {
            throw new NotFoundException('role not found');
        }
        return $role;
    }

    private function setSearchCondition(array $search_data, $builder)
    {

        if ($search_data['q']) {
            $builder->where('name', 'LIKE', "%" . $search_data['q'] . "%");
        }
        if ($search_data['name']) {
            $builder->where('name', '=', $search_data['name']);
        }
        return $builder;
    }

    /**
     * This method will create a Role
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function create(array $input): int
    {
        DB::beginTransaction();
        try {
            $role = Role::create($input);
            DB::commit();
            return $role->id;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

     /**
     * This method will update the Role
     * @param int @id
     * @param array $input
     * @throws NotFoundException
     */
    public function update(int $id, array $input): void
    {
        $role = Role::find($id);
        if (!$role instanceof Role) {
            throw new NotFoundException('role not found');
        }
        
        DB::beginTransaction();
        try {
            Role::where('id', '=', $id)->update($input);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

     /**
     * This method will create a Role
     * @param int $id
     * @return int
     * @throws NotFoundException
     */
    public function delete(int $id): void
    {
        $this->findById($id)->delete();
    }
}
