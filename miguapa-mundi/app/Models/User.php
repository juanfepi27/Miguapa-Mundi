<?php

//Editor: Juan Felipe Pinzón 

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /*
    USER ATTRIBUTES
    $this -> attributes['id'] - int - contains the id of the User, primary key in the database
    $this -> attributes['role'] - int - contains the role of the User, 0 for end users and 1 for admin users
    $this -> attributes['name'] - string - contains the full name of the user
    $this -> attributes['username'] - string - contains the alias that the user wants to have in the platform
    $this -> attributes['email'] - string - contains the email registered for the user
    $this -> attributes['password'] - string - contains the authentication password to log in
    $this -> attributes['nationality'] - string - contains the nationality for the user
    $this -> attributes['budget'] - int - contains the amount of money that the user has in the platform
    $this -> attributes['remember_token'] - string - contains the token given by the app to remmember the session
    $this -> attributes['email_verified_at'] - datetime - contains the date when the email was verified
    $this -> attributes['created_at'] - datetime - when the User was created
    $this -> attributes['updated_at] - datetime - when the User was updated
    $this->boughtCountries - Country[] - contains the countries that the user owns
    $this->sentOffers - Offer[] - contains the offers sent by the user
    */
    protected $fillable = ['name', 'role', 'username', 'email', 'password', 'nationality', 'budget'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'nationality' => 'required',
            'budget' => 'required|numeric|max:2147483647|min:50000',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getRole(): int
    {
        return $this->attributes['role'];
    }

    public function setRole(int $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getUsername(): string
    {
        return $this->attributes['username'];
    }

    public function setUsername(string $username): void
    {
        $this->attributes['username'] = $username;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getNationality(): string
    {
        return $this->attributes['nationality'];
    }

    public function setNationality(string $nationality): void
    {
        $this->attributes['nationality'] = $nationality;
    }

    public function getBudget(): int
    {
        return $this->attributes['budget'];
    }

    public function getBudgetFormatted(): string
    {
        $budget = $this->getBudget();
        $budgetFormatted = number_format($budget, 0, ',', '.');

        return $budgetFormatted;
    }

    public function setBudget(int $budget): void
    {
        $this->attributes['budget'] = $budget;
    }

    public function boughtCountries(): HasMany
    {
        return $this->hasMany(Country::class, 'user_owner_id');
    }

    public function getBoughtCountries(): Collection
    {
        return $this->boughtCountries;
    }

    public function setBoughtCountries(Collection $boughtCountries): void
    {
        $this->boughtCountries = $boughtCountries;
    }

    public function sentOffers(): HasMany
    {
        return $this->hasMany(Offer::class, 'user_offeror_id');
    }

    public function getSentOffers(): Collection
    {
        return $this->sentOffers;
    }

    public function setSentOffers(Collection $sentOffers): void
    {
        $this->sentOffers = $sentOffers;
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
