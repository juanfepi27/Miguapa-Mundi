<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Alliance;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    /**
     * MEMBER ATTRIBUTES
     * $this->attributes['id'] - int - contains the member primary key (id)
     * $this->attributes['founder'] - boolean - contains whether it is a founder or not
     * $this->attributes['moderator'] - boolean - contains whether it is a moderator or not
     * $this->attributes['is_accepted'] - boolean - contains whether it is accepted or not as a member
     * $this->attributes['created_at'] - datetime - contains the date and time when the member was created
     * $this->attributes['updated_at'] - datetime - contains the date and time when the member's information was updated
     * $this->attributes['country_id'] - int - contains the associated Country Id
     * $this->attributes['alliance_id'] - int - contains the associated Alliance Id
     * $this->country - Country - contains the associated Country
     * $this->alliance - Alliance - contains the associated Alliance
     */
    protected $fillable = ['founder', 'moderator', 'country_id', 'alliance_id'];

    public function validate(Request $request): void
    {
        $request->validate([
            'founder' => 'required',
            'moderator' => 'required',
            'country_id' => 'required',
            'alliance_id' => 'required',
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

    public function getCountryId(): int
    {
        return $this->attributes['country_id'];
    }

    public function setCountryId(int $country_id): void
    {
        $this->attributes['country_id'] = $country_id;
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    public function getAllianceId(): int
    {
        return $this->attributes['alliance_id'];
    }

    public function setAllianceId(int $alliance_id): void 
    {
        $this->attributes['alliance_id'] = $alliance_id;
    }

    public function alliance(): BelongsTo
    {
        return $this->belongsTo(Alliance::class);
    }

    public function getAlliance(): Alliance
    {
        return $this->alliance;
    }

    public function setAlliance(Alliance $alliance): void
    {
        $this->alliance = $alliance;
    }

}
