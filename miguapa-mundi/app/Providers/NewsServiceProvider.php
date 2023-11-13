<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\newsGenerator;
use App\Util\newsGeneratorApi;
use App\Util\newsGeneratorArray;

class NewsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(newsGenerator::class, function ($app,$params){
            
            $type = $params['type'] ?? 'api';
            if($type == 'api'){
                return new newsGeneratorApi();
            }
            else if ($type == 'array'){
                return new newsGeneratorArray();
            }
        });
    }
}