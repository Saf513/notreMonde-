<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',         // Nom du pays
        'capital',      // Capitale du pays
        'population',   // Population du pays
        'region',       // Région (continent, sous-région, etc.)
        'flag_url',     // URL ou chemin du drapeau
    ];

    /**
     * Les attributs qui doivent être cachés lors de la sérialisation.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     *
     * @var array
     */
    protected $casts = [
        'population' => 'integer', // Assure que la population est un entier
    ];
}
