<?php

//Author: Miguel Ángel Calvache

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinancialEffect extends model
{
    /**
     * FINANCIAL EFFECT ATTRIBUTES
     * $this->attributes['id'] - int - contains the financial_effect primary key (id)
     * $this->attributes['news_id] - int - contains the id of the news with the financial effect
     * $this->attributes['country_id] - int - contains the id of the country with the financial effect
     * $this->attributes['effect] - int - contains the financial effect of the news
     * $this->attributes['created_at'] - datetime - when the financial effect was created
     * $this->attributes['updated_at] - datetime - when the financial effect was updated
     * $this->news - News - contains the news that the financial effect is related to
     * $this->country - Country - contains the country that the financial effect is related to
     */
    
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getNewsId(): int
    {
        return $this->attributes['news_id'];
    }

    public function setNewsId(int $newsId): void
    {
        $this->attributes['news_id'] = $newsId;
    }

    public function getEffect(): int
    {
        return $this->attributes['effect'];
    }

    public function getEffectFormatted(): string
    {
        $effect = $this->getEffect();
        $effectFormatted = number_format($effect, 0, ',', '.');

        return $effectFormatted;
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
