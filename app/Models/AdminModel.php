<?php

namespace App\Models;

use Illuminate\{Database\Eloquent\Factories\HasFactory,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable};
use OwenIt\Auditing\Contracts\Auditable;


/**
 * App\Models\AdminModel
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminModel extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable, HasFactory, Notifiable;

    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
