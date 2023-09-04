<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /*
    Product attributes
    $this -> attributes['id'] - int - contains the id of the product primary key in the database
    $this -> attributes['title'] - string - contains the title of the product
    $this -> attributes['description'] - string - contains the description of the product
    $this -> attributes['created_at'] - created_at - when the product was created
    $this -> attributes['updated_at] - updated_at - when the product was updated
    */

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
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
