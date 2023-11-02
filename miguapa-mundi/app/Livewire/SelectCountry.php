<?php

namespace App\Livewire;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

class SelectCountry extends Component
{
    public array $viewData;
    public int|null $countryId;
    public string $countryName;
    public string $minimumOfferValue;

    public function setCountryInformation():void
    {
        $country = Country::findOrFail($this->countryId);
        $this->countryName=$country->getName();
        $this->minimumOfferValue=$country->getMinimumOfferValueFormatted();
    }

    public function mount(Request $request,array $viewData): void
    {
        $this->viewData=$viewData;

        if(session()->has('country_id')){
            $this->countryId=session()->get('country_id');

            $this->setCountryInformation();
        }

        if($request->old('country_id')){
            $this->countryId=$request->old('country_id');

            $this->setCountryInformation();
        }
    }

    public function updatedCountryId(int|null $countryId):void
    {
        $this->countryId=$countryId;
        if($countryId){
            $this->setCountryInformation();
        }else{
            $this->countryName="";
            $this->minimumOfferValue="";
        }
    }

    public function render(): View
    {
        return view('livewire.select-country');
    }
}
