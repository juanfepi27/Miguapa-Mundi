<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
     */
    protected $fillable = ['name', 'nick_name', 'color', 'flag', 'in_offer', 'minimum_attractive_value', 'attractive_value'];

    public function validate(Request $request): void
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

    public function setNickName(string $nick_name): void
    {
        $this->attributes['nick_name'] = $nick_name;
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

    public function setInOffer(bool $in_offer): void
    {
        $this->attributes['in_offer'] = $in_offer;
    }

    public function getMinimumOfferValue(): int
    {
        return $this->attributes['minimum_offer_value'];
    }

    public function setMinimumOfferValue(int $minimum_offer_value): void
    {
        $this->attributes['minimum_offer_value'] = $minimum_offer_value;
    }

    public function getAttractiveValue(): int
    {
        return $this->attributes['attractive_value'];
    }

    public function setAttractiveValue(int $attractive_value): void
    {
        $this->attributes['attractive_value'] = $attractive_value;
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
