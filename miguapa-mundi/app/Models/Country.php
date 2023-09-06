<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * COUNTRY ATTRIBUTES
     * $this->attributes['id'] - int - contains the country primary key (id)
     * $this->attributes['name'] - string - contains the country name
     * $this->attributes['nick_name'] - string - contains the country nickname
     * $this->attributes['color'] - string - contains the color for the country
     * $this->attributes['flag'] - string - contains the flag of the country
     * $this->attributes['in_offer'] - boolean - contains whether or not the country is in offer
     * $this->attributes['minimum_offer_value'] - int - contains the minimum value to sell the country
     * $this->attributes['attractive_value'] - int - contains the attractive value the country has
     * $this->attributes['created_at'] - datetime - contains the date and time when the country was created
     * $this->attributes['updated_at'] - datetime - contains the date and time when the country's information was updated
     * $this->members - Member[] - contains the associated members
     */
    protected $fillable = ['name', 'nick_name', 'color', 'flag', 'in_offer', 'minimum_attractive_value', 'attractive_value'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'nick_name' => 'required',
            'color' => 'required',
            'flag' => 'required|image',
            'minimum_offer_value' => 'required|numeric|gt:0',
            'attractive_value' => 'required|numeric',
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

    public function getNickName(): string
    {
        return $this->attributes['nick_name'];
    }

    public function setNickName(string $nickName): void
    {
        $this->attributes['nick_name'] = $nickName;
    }

    public function getColor(): string
    {
        return $this->attributes['color'];
    }

    public function setColor(string $color): void
    {
        $this->attributes['color'] = $color;
    }

    public function getFlag(): string
    {
        return $this->attributes['flag'];
    }

    public function setFlag(string $flag): void
    {
        $this->attributes['flag'] = $flag;
    }

    public function getInOffer(): bool
    {
        return $this->attributes['in_offer'];
    }

    public function setInOffer(bool $inOffer): void
    {
        $this->attributes['in_offer'] = $inOffer;
    }

    public function getMinimumOfferValue(): int
    {
        return $this->attributes['minimum_offer_value'];
    }

    public function setMinimumOfferValue(int $minimumOfferValue): void
    {
        $this->attributes['minimum_offer_value'] = $minimumOfferValue;
    }

    public function getAttractiveValue(): int
    {
        return $this->attributes['attractive_value'];
    }

    public function setAttractiveValue(int $attractiveValue): void
    {
        $this->attributes['attractive_value'] = $attractiveValue;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
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
