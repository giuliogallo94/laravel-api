<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'hex_color', 'description'];

    public function setNameAttribute($_name) {
        $this->attributes['name'] = $_name;
        $this->attributes['slug'] = Str::slug($_name, '-');
    }

    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
