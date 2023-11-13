<?php

namespace App\Util;

use App\Interfaces\newsGenerator;
use App\Models\News;

class newsGeneratorArray implements newsGenerator
{
    public function generate(): void
    {
        $newsArray  = [
            ["Dollar Falls by 7% Against the Peso", "During yesterday's trading sessions, the dollar experienced an unexpected drop across all markets, creating uncertainty in international investments and marking a significant change in parity with the local currency."],
            ["Discovery of a New Endangered Species of Butterfly", "Researchers in a nature reserve found a new species of butterfly with unique characteristics, unfortunately threatened by habitat loss."],
            ["Advances in the Fight Against Cancer: New Therapy Shows Promising Results", "An experimental treatment for certain types of cancer has shown effectiveness in early-stage trials, offering hope to patients with this disease."],
            ["Successful Launch of a Space Mission to Mars", "The space agency successfully sent an unmanned mission to Mars, aiming to explore uncharted terrain and gather scientific data."],
            ["Innovation in Renewable Energy: New Design of More Efficient Solar Panels", "Engineers have developed a revolutionary design for solar panels that promises a significant increase in solar energy capture, a significant step towards energy sustainability."],
            ["Study Reveals the Impact of Climate Change on Oceans", "Researchers have published a report detailing the concerning impact of climate change on oceans, showing an increase in acidification and its effects on marine life."],
            ["New Measures for Amazon Rainforest Conservation", "Governments and environmental organizations announce a joint plan to protect the Amazon rainforest, implementing strategies to curb deforestation and preserve its biodiversity."],
            ["Wearable Technology Revolutionizes Health Monitoring", "Innovative devices have changed how people monitor their health, providing real-time accurate data on vital aspects and improving disease prevention."],
            ["Advances in Artificial Intelligence: Autonomous Robot Performs Complex Tasks", "A new robot with advanced learning and decision-making capabilities completed complex tasks autonomously, marking a milestone in robotics."],
            ["Increase in Online Education Adoption", "The pandemic has accelerated the adoption of online education, transforming how people access learning and sparking debates about the future of education."],
            ["Record Growth in the Cryptocurrency Market", "Cryptocurrencies experience an unprecedented surge in value, attracting investors' attention and raising questions about their impact on the global economy."],
            ["Developments in Deep-Sea Exploration", "Scientists discover new species and unknown structures in the depths of the oceans, revealing a fascinating and unknown underwater world."],
            ["Launch of a New Generation of Mobile Devices", "Tech companies introduce revolutionary innovations in their mobile devices, promising significant improvements in performance and functionality."],
            ["Advances in the Vaccine Against Infectious Diseases", "Researchers announce significant progress in developing a universal vaccine against infectious diseases, providing hope in combating future pandemics."],
            ["Inauguration of the World's Largest Offshore Wind Farm", "An offshore wind farm is launched, considered the largest to date, promising to supply clean energy to millions of households."],
            ["New Regulations for Online Privacy", "Governments implement stricter regulations to protect online privacy, sparking debates about the balance between security and freedom on the internet."],
            ["Archaeological Discovery at Ancestral Site", "Archaeologists unearth ancient artifacts at an archaeological site, revealing surprising details about past civilizations and their legacy."],
            ["Trends in Sustainable Fashion: Designers Embrace Eco-Consciousness", "The fashion industry shows growing interest in sustainability, with designers adopting eco-friendly materials and practices."],
            ["Research Reveals the Impact of Pollution on Mental Health", "Recent studies show the connection between environmental pollution and mental health, raising awareness about this lesser-explored aspect."],
            ["Boost in Gender Equality in the Workplace", "Companies implement policies and programs to promote gender equality in the workplace, driving a significant change in diversity and inclusion."]
        ];

        $pos = rand(0, count($newsArray) - 1);

        $title = substr($newsArray[$pos][0], 0, 200);
        $description = substr($newsArray[$pos][1], 0, 250);
        $newNews['title'] = $title;
        $newNews['description'] = $description;

        $newsCreated = News::create($newNews);
        $newsCreated->assignFinancialEffects();

        return;
    }
}
