<?php

declare(strict_types=1);

namespace App\Http\Repositories\Interfaces;


use Illuminate\Database\Eloquent\Model;

/**
 * Interface RepositoryInterface
 * 
 */
interface RepositoryInterface
{
    /**
     * Find By ID or UUID
     * @param $id
     * @return Model|null
     */
    public function find($id): ?Model;

    /**
     * Find One By
     * @param string $key
     * @param $value
     * @return Model|null
     */
    public function findOneBy(string $key, $value): ?Model;

    /**
     * Create record
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;
}
