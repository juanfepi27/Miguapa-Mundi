<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Alliance extends Model
{
    /**
     * ALLIANCE ATTRIBUTES
     * $this->attributes['id'] - int - contains the alliance primary key (id)
     * $this->attributes['name'] - string - contains the name of the alliance
     * $this->attributes['image'] - string - contains the image of the alliance
     * $this->attributes['created_at'] - datetime - contains the date and time when the alliance was created
     * $this->attributes['updated_at'] - datetime - contains the date and time when the alliance's information was updated
     * $this->members - Member[] - contains the associated members
     */
    protected $fillable = ['name', 'image'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt(): string
    {
        $createdAt = strtotime($this->attributes['created_at']);

        return date('Y/m/d', $createdAt);
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function setMembers(Collection $members): void
    {
        $this->members = $members;
    }
}
