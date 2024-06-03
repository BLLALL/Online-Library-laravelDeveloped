<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where('name', 'like', '%' . $search . '%' ));
    }
    protected $guarded = [];
    public function books() {
        return $this->hasMany(Book::class);
    }
}
