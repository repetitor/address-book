<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $opinion_id
 * @property int $user_id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Opinion $opinion
 * @property User $user
 *
 * @method static self create(array $data)
 */
class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'opinion_id',
        'user_id',
        'description',
    ];

    public function opinion(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Opinion::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
