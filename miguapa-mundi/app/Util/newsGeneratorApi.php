<?php

namespace App\Util;

use App\Interfaces\newsGenerator;
use Illuminate\Support\Facades\Http;
use App\Models\News;

class newsGeneratorApi implements newsGenerator
{
    public function generate(): void
    {
        $subjects = ['Politics','Government','Business','Economy','Technology','Science','Health','Environment','Sustainability','Entertainment','Sports','Education','International Relations','Social Issues','Lifestyle','Culture','Science','Futurism','Personal','Art','Creativity','Wellness','Fashion','Travel','Food','Music','Movies','TV','Celebrities','Music','Celebrities','Literature','Climate','Conflicts','Diplomacy','Space','Investments','Money','Financial','Religion','Automotive','Crime','Terrorism','Immigration','Human','Technology','Gaming','Wildlife','Pets','Startups','Cybersecurity','Digital','Food','Education','Student','Travel','Natural','Humanitarian','Medical','Mental','LGBTQ','Gender','Celebrity','Trends','Events','Visual','Literature','Home','Automotive','Sports','Athlete','DIY','Celebrity','Parenting','Aging','Films','Books','Crises','Gadgets','Environmental','Justice','Immigration','Climate','Living','Activism','Energy','Discoveries','Missions','Health','Breakthroughs','Fitness','Tips','Adventure','Auto','Economy'];
        $pos = rand(0, count($subjects) - 1);
        $subject = $subjects[$pos];

        $response = Http::get('https://newsapi.org/v2/everything?q='.$subject.'&pageSize=1&apiKey='.config('services.news.api_key')); ###############################################33

        if($response->ok() == false) {
            return;
        }

        $title = $response->json()['articles'][0]['title'];
        $description = $response->json()['articles'][0]['description'];

        $title = substr($title, 0, 200);
        $description = substr($description, 0, 250);
        $newNews['title'] = $title;
        $newNews['description'] = $description;

        $newsCreated = News::create($newNews);
        $newsCreated->assignFinancialEffects();

        return;
    }
}