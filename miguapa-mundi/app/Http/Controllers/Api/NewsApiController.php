<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\News;
use App\Models\FinancialEffect;
use App\Models\Country;

class NewsApiController extends Controller
{
    public function generator()
    {
        $subjects = ['Politics','Government','Business','Economy','Technology','Science','Health','Environment','Sustainability','Entertainment','Sports','Education','International Relations','Social Issues','Lifestyle','Culture','Science','Futurism','Personal','Art','Creativity','Wellness','Fashion','Travel','Food','Music','Movies','TV','Celebrities','Music','Celebrities','Literature','Climate','Conflicts','Diplomacy','Space','Investments','Money','Financial','Religion','Automotive','Crime','Terrorism','Immigration','Human','Technology','Gaming','Wildlife','Pets','Startups','Cybersecurity','Digital','Food','Education','Student','Travel','Natural','Humanitarian','Medical','Mental','LGBTQ','Gender','Celebrity','Trends','Events','Visual','Literature','Home','Automotive','Sports','Athlete','DIY','Celebrity','Parenting','Aging','Films','Books','Crises','Gadgets','Environmental','Justice','Immigration','Climate','Living','Activism','Energy','Discoveries','Missions','Health','Breakthroughs','Fitness','Tips','Adventure','Auto','Economy'];
        $pos = rand(0, count($subjects) - 1);
        $subject = $subjects[$pos];

        $response = Http::get('https://newsapi.org/v2/everything?q='.$subject.'&pageSize=1&apiKey=55ac1e51e3a745e7af07c9a2cbefe154'); ###############################################33

        if($response->ok() == false) {
            return response()->json(['error'], 500);
        }

        $title = $response->json()['articles'][0]['title'];
        $description = $response->json()['articles'][0]['description'];

        $title = substr($title, 0, 200);
        $description = substr($description, 0, 250);

        $newNews['title'] = $title;
        $newNews['description'] = $description;
        $newsCreated = News::create($newNews);

        $numberOfCountriesAffected = rand(1, 5);
        $countries = Country::all()->random($numberOfCountriesAffected);

        for($i = 0; $i < $numberOfCountriesAffected; $i++) {
            $newFinancialEffect['news_id'] = $newsCreated->getId();
            $newFinancialEffect['country_id'] = $countries[$i]->getId();
            $newFinancialEffect['effect'] = rand(-1000, 1000);
            FinancialEffect::create($newFinancialEffect);

            if(($countries[$i]->getMinimumOfferValue() + $newFinancialEffect['effect'])<0){
                $countries[$i]->setUserOwnerId(1); #########################################################################
                $countries[$i]->setInOffer(true);
                $countries[$i]->setColor('#000000');
                $countries[$i]->setMinimumOfferValue($countries[$i]->getDefaultOfferValue());
            }
            else{
                $countries[$i]->setMinimumOfferValue($countries[$i]->getMinimumOfferValue() + $newFinancialEffect['effect']);
            }

            if($newFinancialEffect['effect']>=0){
                $countries[$i]->setAttractiveValue($countries[$i]->getAttractiveValue() + 1);
            }
            else{
                $countries[$i]->setAttractiveValue($countries[$i]->getAttractiveValue() - 1);
            }
            $countries[$i]->save();
        }

        return response()->json('OK', 200);
    }
}