<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'template_id',
        'title',
        'content',
    ];

    /**
     * The "booted" method of the model.
     * Menerapkan Global Scope untuk memfilter data dokumen secara otomatis.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('company', function (Builder $builder) {
            // Cek jika user yang login adalah 'staff'
            if (Auth::check() && Auth::user()->role->name === 'staff') {
                // Maka, hanya tampilkan dokumen yang company_id-nya sama dengan company_id user
                $builder->where('company_id', Auth::user()->company_id);
            }
            // Jika user adalah 'admin', scope ini tidak akan diaplikasikan,
            // sehingga admin bisa melihat semua dokumen dari semua company.
        });
    }

    /**
     * Relasi ke Company
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relasi ke Template
     */
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
