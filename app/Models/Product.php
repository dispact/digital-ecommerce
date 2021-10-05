<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
            )
        );
    }

    public function highlights() {
        return $this->hasMany(Highlight::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function faqs() {
        return $this->hasMany(Faq::class);
    }

    public function downloadUrl() {
        return route('file.download', explode('/', $this->file)[1]);
    }
}
