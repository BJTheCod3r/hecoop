<?php

declare(strict_types=1);

namespace App\Http\Repositories;

use App\Models\Resource;
use App\Http\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ResourceRepository
 * 
 */

class ResourceRepository extends BaseRepository
{
    /**
     * ResourceRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(Resource::class);
    }

    /**
     * Fetch user resources
     * 
     * @param int $id
     * @param null|string $q
     * @param bool $completed
     * @param null|string $sort
     * 
     * @return array
     */
    public function fetchUserResources(int $id, ?string $q, bool $completed, ?string $sort): array
    {
        $bind = [$id];

        $sql = "SELECT resources.id, resources.parent_resource_id, resources.title, completed_module.completed_at 
            FROM resources LEFT JOIN (SELECT resources.id, title, 
            progression_items.created_at as completed_at, parent_resource_id 
            FROM `resources` LEFT JOIN `progression_items` 
            ON resources.id = progression_items.resource_id WHERE user_id = ?) 
            as completed_module ON resources.id = completed_module.id WHERE 
            resources.title LIKE ?";

        $search = "%";

        if (!is_null($q)) {
            $search = "$q%";
        }
        $bind[] = $search;

        if ($completed) {
            $sql .= " AND completed_module.completed_at IS NOT NULL";
        }

        if (!is_null($sort)) {
            $sql .= " ORDER BY completed_module.completed_at $sort";
        }

        $resources = DB::select($sql, $bind);

        return $resources;
    }
}
