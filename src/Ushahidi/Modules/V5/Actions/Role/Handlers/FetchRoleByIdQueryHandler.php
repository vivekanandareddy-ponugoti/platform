<?php

namespace Ushahidi\Modules\V5\Actions\Role\Handlers;

use App\Bus\Action;
use App\Bus\Query\AbstractQueryHandler;
use App\Bus\Query\Query;
use Ushahidi\Modules\V5\Actions\Role\Queries\FetchRoleByIdQuery;
use Ushahidi\Modules\V5\Repository\Role\RoleRepository;

class FetchRoleByIdQueryHandler extends AbstractQueryHandler
{

    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    protected function isSupported(Query $query)
    {
        assert(
            get_class($query) === FetchRoleByIdQuery::class,
            'Provided query is not supported'
        );
    }
    

    /**
     * @param FetchRoleByIdQuery $query
     * @return array
     */
    public function __invoke(Action $query) //: array
    {
        $this->isSupported($query);
        $tos = $this->roleRepository->findById($query->getId());
        return $tos;
    }
}
