<?php

declare(strict_types=1);

namespace Source\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    /** @var string */
    public $table = 'addresses';

    /** @var array */
    protected $fillable = [
        'zip_code',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'address_id');
    }
}
