<?php

//Author: Miguel Ángel Calvache

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class News extends Model
{
    /*
    News attributes
    $this -> attributes['id'] - int - contains the id of the news primary key in the database
    $this -> attributes['title'] - string - contains the title of the news
    $this -> attributes['description'] - string - contains the description of the news
    $this -> attributes['created_at'] - datetime - when the news was created
    $this -> attributes['updated_at] - datetime - when the news was updated
    $this -> financialEffects - FinancialEffect[] - contains the financial effects of the news
    */

    protected $fillable = ['title', 'description'];

    public static function validateCreateform(Request $request): void
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getCreatedAt(): string
    {
        $createdAt = strtotime($this->attributes['created_at']);

        return date('Y/m/d H:i:s', $createdAt);
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function financialEffects(): HasMany
    {
        return $this->hasMany(FinancialEffect::class);
    }

    public function getFinancialEffects(): Collection
    {
        return $this->financialEffects;
    }

    public function setFinancialEffects(Collection $financialEffects): void
    {
        $this->financialEffects = $financialEffects;
    }
}
