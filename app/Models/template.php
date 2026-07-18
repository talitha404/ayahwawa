<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', // nullable, jika NULL berarti template global
        'name',
        'content',
    ];

    /**
     * The "booted" method of the model.
     * Menerapkan Global Scope untuk memfilter data template secara otomatis.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('company_or_global', function (Builder $builder) {
            // Cek jika user yang login adalah 'staff'
            if (Auth::check() && Auth::user()->role->name === 'staff') {
                // Maka, tampilkan template yang company_id-nya sama dengan milik user,
                // ATAU template global (yang company_id-nya NULL).
                $builder->where('company_id', Auth::user()->company_id)
                        ->orWhereNull('company_id');
            }
            // Jika user adalah 'admin', scope ini tidak akan diaplikasikan,
            // sehingga admin bisa melihat semua template dari semua company dan template global.
        });
    }

    /**
     * Relasi ke Company
     * Template bisa dimiliki oleh company atau bersifat global (company_id = NULL)
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
