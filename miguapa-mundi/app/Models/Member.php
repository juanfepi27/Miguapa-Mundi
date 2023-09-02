<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Country extends Model
{
    /**
     * MEMBER ATTRIBUTES
     * $this->attributes['id'] - int - contains the member primary key (id)
     * $this->attributes['founder'] - boolean - contains whether it is a founder or not
     * $this->attributes['moderator'] - boolean - contains whether it is a moderator or not
     * $this->attributes['is_accepted'] - boolean - contains whether it is accepted or not as a member
     * $this->attributes['created_at'] - datetime - contains the date and time when the member was created
     * $this->attributes['updated_at'] - datetime - contains the date and time when the member's information was updated
     */
    protected $fillable = ['founder', 'moderator'];

    public function validate(Request $request): void
    {
        $request->validate([
            'founder' => 'required',
            'moderator' => 'required',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getFounder(): bool
    {
        return $this->attributes['founder'];
    }

    public function setFounder(bool $founder): void
    {
        $this->attributes['founder'] = $founder;
    }

    public function getModerator(): bool
    {
        return $this->attributes['moderator'];
    }

    public function setModerator(bool $moderator): void
    {
        $this->attributes['moderator'] = $moderator;
    }

    public function getIsAccepted(): bool
    {
        return $this->attributes['is_accepted'];
    }

    public function setIsAccepted(bool $is_accepted): void
    {
        $this->attributes['is_accepted'] = $is_accepted;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
