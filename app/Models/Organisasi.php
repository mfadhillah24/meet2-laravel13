<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasOne;
#[Fillable(['name'])]
class Organisasi extends Model
{
    /** @use HasFactory<\Database\Factories\OrganisasiFactory> */
    use HasFactory, HasUuids;

    public function OrganisasiLeader() : HasOne
    {
        return $this->hasOne(OrganisasiLeader::class);
    }
}
