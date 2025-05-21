<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildrenDayRegistration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_name',
        'department',
        'children_count',
        'children_ages',
        'phone',
        'notes',
        'status',
        'ip_address',
        'user_agent',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'children_count' => 'integer',
        'children_ages' => 'array',
    ];

    /**
     * Convertit le tableau des âges en JSON avant de l'enregistrer dans la base de données.
     *
     * @param  array  $value
     * @return void
     */
    public function setChildrenAgesAttribute($value)
    {
        $this->attributes['children_ages'] = json_encode($value);
    }

    /**
     * Convertit le JSON des âges en tableau lors de la récupération depuis la base de données.
     *
     * @param  string  $value
     * @return array
     */
    public function getChildrenAgesAttribute($value)
    {
        return json_decode($value, true) ?: [];
    }
}
