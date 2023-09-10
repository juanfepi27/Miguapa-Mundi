<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;

class FinancialEffect extends model
{
    /**
     * FINANCIAL EFFECT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['financial_effect] - int - contains the financial effect of the news
     * $this->attributes['news_id] - int - contains the financial effect of the news
     * $this->news - contains the news that the financial effect is related to
     * $this->attributes['country_id] - int - contains the financial effect of the news
     * $this->countries - contains the countries that the financial effect is related to
     * $this->attributes['created_at'] - created_at - when the product was created
     * $this->attributes['updated_at] - updated_at - when the product was updated
     */

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getNewsId(): int
    {
        return $this->attributes['news_id'];
    }

    public function setNewsId(int $news_id): void
    {
        $this->attributes['news_id'] = $news_id;
    }

    public function getEffect(): int
    {
        return $this->attributes['effect'];
    }

    public function setEffect(int $effect): void
    {
        $this->attributes['effect'] = $effect;
    }

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function getNews(): News
    {
        return $this->news;
    }

    public function setNews(News $news): void
    {
        $this->news = $news;
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

    public function getCountries(): Country
    {
        return $this->country;
    }

    public function setCountries(Country $country): void
    {
        $this->country = $country;
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
