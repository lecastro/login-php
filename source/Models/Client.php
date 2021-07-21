<?php

declare(strict_types=1);

namespace Source\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use SoftDeletes;

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

    public function findAllClients(int $id): array
    {
        $clients = $this
                    ->baseQuery()
                    ->where('user_id', $id)
                    ->get();

        return $this->formatted($clients);
    }

    public function new(array $client): Client
    {
        return $this->create($client);
    }

    private function baseQuery(): Builder
    {
        return $this
        ->newQuery()
        ->select(
            'clients.*',
            'addresses.street',
            'addresses.number',
            'addresses.neighborhood',
            'addresses.city',
            'addresses.state',
            'addresses.zip_code'
        )
        ->leftjoin('addresses', 'clients.id', 'client_id');
    }

    private function formatted(Collection $clients): array
    {
        return $clients->map(function ($client) {
            return [
                'id'               => $client->id,
                'name'             => $client->name,
                'rg'               => $client->rg,
                'cpf'              => $client->cpf,
                'birth_date'       => $client->birth_date,
                'phone'            => $client->phone,
                'formattedAddress' => $client->street . ', ' . $client->number . ' - ' . $client->neighborhood . ', ' . $client->city . ' - ' . $client->state . ', ' . $client->zip_code,
            ];
        })->toArray();
    }

    public function findClientById(int $id): client
    {
        return $this->baseQuery()->find($id);
    }
}
