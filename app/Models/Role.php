<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // Attributs modifiables en masse
    public function showRegistrationForm()
    {
        $roles = Role::all(); // Récupérer tous les rôles
        return view('auth.register', compact('roles'));
    }
}
