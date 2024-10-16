<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pelanggan(): BelongsTo
    {
        return $this->BelongsTo(Pelanggan::class);
    }

    public function kasir(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
