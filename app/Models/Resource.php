<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'parent_resource_id',
        'course_id',
        'type',
        'description',
        'order',
    ];

    /**
     * Relationship to the parent resource, if it exists.
     *
     * @return BelongsTo
     */
    public function parentResource(): BelongsTo
    {
        return $this->belongsTo(Resource::class, 'parent_resource_id');
    }
}
