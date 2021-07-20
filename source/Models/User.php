<?php

declare(strict_types=1);

namespace Source\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    /** @var string */
    public $table = 'users';

    /** @var array */
    protected $fillable = [
        ['first_name', 'last_name', 'email', 'passwd', 'fotget']
    ];

    /** @var string */
    protected $primaryKey = 'id';

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'id');
    }

    public function findById(int $id): User
    {
        return $this->newQuery()->find($id);
    }

    public function findByOne(string $key, string $value): User
    {
        return $this->newQuery()->where($key, $value)->first();
    }
}
