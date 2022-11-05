<?php

declare(strict_types=1);

namespace App\Http\Repositories;


use App\Models\User;
use App\Http\Repositories\BaseRepository;

/**
 * Class UserRepository
 * 
 */
class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(User::class);
    }
}
