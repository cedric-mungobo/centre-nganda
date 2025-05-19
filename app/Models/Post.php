<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'status',
        'featured',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
        'featured' => 'boolean',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a slug from the title.
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        // Ne générer un nouveau slug que si l'article est nouveau ou si le titre a changé
        if (!$this->exists || (isset($this->original['title']) && $this->original['title'] !== $value)) {
            $this->attributes['slug'] = $this->createUniqueSlug($value);
        }
    }

    /**
     * Create a unique slug.
     *
     * @param string $title
     * @return string
     */
    private function createUniqueSlug($title)
    {
        $slug = Str::slug($title);

        // Requête de base pour vérifier l'unicité du slug
        $query = static::where('slug', $slug);

        // Si l'article existe déjà, exclure cet article de la vérification
        if ($this->exists) {
            $query->where('id', '!=', $this->id);
        }

        // Vérifier si le slug existe déjà (en excluant l'article actuel si nécessaire)
        $count = $query->count();

        // Si le slug existe déjà, ajouter un compteur
        if ($count > 0) {
            // Requête pour trouver tous les slugs similaires
            $similarQuery = static::where('slug', 'like', $slug . '-%');

            // Exclure l'article actuel si nécessaire
            if ($this->exists) {
                $similarQuery->where('id', '!=', $this->id);
            }

            // Récupérer tous les slugs similaires
            $slugs = $similarQuery->get()->pluck('slug');

            // Extraire les nombres à la fin des slugs existants
            $numbers = [];
            foreach ($slugs as $existingSlug) {
                if (preg_match('/-(\d+)$/', $existingSlug, $matches)) {
                    $numbers[] = (int) $matches[1];
                }
            }

            // Déterminer le prochain numéro
            $nextNumber = empty($numbers) ? 1 : max($numbers) + 1;

            return "{$slug}-{$nextNumber}";
        }

        return $slug;
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include featured posts.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
