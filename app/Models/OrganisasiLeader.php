<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
#[Fillable(['leader_name', 'organisasi_id'])]

class OrganisasiLeader extends Model
{
    /** @use HasFactory<\Database\Factories\OrganisasiLeaderFactory> */
    use  HasFactory, HasUuids;

    public function Organisasi() : BelongsTo
    {
        return $this->belongsTo(Organisasi::class);
    }
}
