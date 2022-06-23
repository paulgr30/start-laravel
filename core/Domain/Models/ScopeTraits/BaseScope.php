<?php

namespace Core\Domain\Models\ScopeTraits;


trait BaseScope
{
    // Filtrar ppor nombre
    public function scopeOfName($query, $value) {
        if ($value != "") {
            return $query->where('name', 'like', "{$value}%");
        }
    }

    public function scopeOfRole($query)
    {
        return $query->whereHas('roles', function ($q) {
            return $q->first();
        });
    }
}