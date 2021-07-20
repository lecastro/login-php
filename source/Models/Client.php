<?php

declare(strict_types=1);

namespace Source\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    /** @var string */
    public $table = 'clients';

    /** @var array */
    protected $fillable = [
        'name',
        'birth_date',
        'rg',
        'cpf',
        'phone',
        'user_id'
    ];

    /** @var string */
    protected $primaryKey = 'id';

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'id');
    }

    public function findClientsById(int $id): array
    {
        $clients = $this
                    ->newQuery()
                    ->leftjoin('addresses', 'clients.id', 'client_id')
                    ->where('user_id', $id)
                    ->get();

        return $clients->map(function ($client) {
            return [
                'name'             => $client->name,
                'rg'               => $client->rg,
                'cpf'              => $client->cpf,
                'birth_date'       => $client->birth_date,
                'phone'            => $client->phone,
                'formattedAddress' => $client->street . ', ' . $client->number . ' - ' . $client->neighborhood . ', ' . $client->city . ' - ' . $client->state . ', ' . $client->zip_code,
            ];
        })->toArray();
    }

    public function new(array $client): Client
    {
        return $this->create($client);
    }
}
