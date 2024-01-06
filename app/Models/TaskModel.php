<?php

namespace App\Models;

use Illuminate\{Database\Eloquent\Factories\HasFactory, Database\Eloquent\Model, Database\Eloquent\Relations\BelongsTo};

/**
 * App\Models\TaskModel
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $assigned_by_id
 * @property int|null $assigned_to_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel whereAssignedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel whereAssignedToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TaskModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TaskModel extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'assigned_to_id', 'assigned_by_id'];

    /**
     * @return BelongsTo
     */
    public function getUser(): BelongsTo
    {
        return $this->belongsTo(related: UserModel::class, foreignKey: 'assigned_to_id');
    }

    /**
     * @return BelongsTo
     */
    public function getAdmin(): BelongsTo
    {
        return $this->belongsTo(related: UserModel::class, foreignKey: 'assigned_by_id');
    }
}
