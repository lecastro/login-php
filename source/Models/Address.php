<?php

declare(strict_types=1);

namespace Source\Models;

use Illuminate\Database\Eloquent\Model;

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

    /** @var string */
    protected $primaryKey = 'id';
}
