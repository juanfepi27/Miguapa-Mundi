<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinancialEffect extends model
{
    /**
     * FINANCIAL EFFECT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['financial_effect] - int - contains the financial effect of the news
     * $this->attributes['news_id] - int - contains the financial effect of the news
     * $this->news - contains the news that the financial effect is related to
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

    public function getFinancialEffect(): int
    {
        return $this->attributes['financial_effect'];
    }

    public function setFinancialEffect(int $financial_effect): void
    {
        $this->attributes['financial_effect'] = $financial_effect;
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

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
