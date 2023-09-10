<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    /*
    OFFER ATTRIBUTES
    $this -> attributes['id'] - int - contains the id of the offer, primary key in the database
    $this -> attributes['status'] - string - contains the status of the offer (SENT - ACCEPTED - REJECTED)
    $this -> attributes['price'] - int - contains the monetary value of the offer
    $this -> attributes['created_at'] - created_at - when the offer was created
    $this -> attributes['updated_at] - updated_at - when the offer was updated
    $this -> attributes['country_id'] - int - contains the id of the country, primary key in the database
    $this -> country - Country - contains the country of the offer
    $this -> attributes['offeror_id'] - int - contains the id of the offeror user, primary key in the database
    $this -> offeror - User - contains the offeror user
    */

    protected $fillable = ['status', 'price', 'country_id', 'offeror_id'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'status' => 'required|in:SENT,REJECTED,ACCEPTED',
            'price' => 'required|numeric|min:0',
            'country_id' => 'required',
            'user_offeror_id' => 'required',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getCountryId(): int
    {
        return $this->attributes['country_id'];
    }

    public function setCountryId(int $countryId): void 
    {
        $this->attributes['country_id'] = $countryId;
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

    public function getUserOferrorId(): int
    {
        return $this->attributes['user_offeror_id'];
    }

    public function setUserOferrorId(int $userOfferorId): void 
    {
        $this->attributes['user_offeror_id'] = $userOfferorId;
    }

    public function userOfferor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUserOferror(): User
    {
        return $this->userOfferor;
    }

    public function setUserOferror(User $userOfferor): void
    {
        $this->userOfferor = $userOfferor;
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