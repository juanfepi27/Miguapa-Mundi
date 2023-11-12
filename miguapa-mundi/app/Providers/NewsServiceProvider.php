<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\newsGenerator;
use App\Util\newsGeneratorApi;

class NewsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(newsGenerator::class, function ($app,$params){
            
            $type = $params['type'] ?? 'api';
            logger('Serviceeeee ccccccccccccccccccccccccccccccccccccccc'.$type);
            if($type == 'api'){
                return new newsGeneratorApi();
            }
            else if ($type == 'array'){
                // return new newsGeneratorArray();
            }

            // throw new \InvalidArgumentException("Unknown newsGenerator: $type");
        });
    }
}