<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Offer extends Model
{
    /*
    OFFER ATTRIBUTES
    $this -> attributes['id'] - int - contains the id of the offer, primary key in the database
    $this -> attributes['status'] - string - contains the status of the offer (SENT - ACCEPTED - REJECTED)
    $this -> attributes['price'] - int - contains the monetary value of the offer
    $this -> attributes['country_id'] - int - contains the id of the country, primary key in the database
    $this -> country - Country - contains the country of the offer
    $this -> attributes['user_offeror_id'] - int - contains the id of the offeror user, primary key in the database
    $this -> userOfferor - User - contains the offeror user
    $this -> attributes['created_at'] - created_at - when the offer was created
    $this -> attributes['updated_at] - updated_at - when the offer was updated
    */

    protected $fillable = ['status', 'price', 'country_id', 'user_offeror_id'];

    public static function validate(Request $request,int $minimumOfferValue): void
    {
        $userBudget=$request->user()->getBudget();
        $request->validate([
            'status' => 'required|in:SENT,REJECTED,ACCEPTED',
            'price' => 'required|numeric|gt:0|min:'.$minimumOfferValue.'|max:'.$userBudget,
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

    public function getPriceFormatted(): string
    {
        $price = $this->getPrice();;
        $priceFormatted = number_format($price, 0, ',', '.');
        return $priceFormatted;
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

    public function getUserOfferorId(): int
    {
        return $this->attributes['user_offeror_id'];
    }

    public function setUserOfferorId(int $userOfferorId): void
    {
        $this->attributes['user_offeror_id'] = $userOfferorId;
    }

    public function userOfferor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUserOfferor(): User
    {
        return $this->userOfferor;
    }

    public function setUserOfferor(User $userOfferor): void
    {
        $this->userOfferor = $userOfferor;
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
}
