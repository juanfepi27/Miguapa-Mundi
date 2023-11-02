<div>
    <label for="country_id" class="form-label">@lang('offer.new.labelCountry')</label>
    <div class="form-text">@lang('offer.new.helpCountry'):</div>
    <select class="form-select" aria-label="Select country" wire:model.change="countryId" id="country_id" name="country_id" required>
        <option selected></option>

        @foreach ($viewData["countries"] as $country)
        <option value="{{$country->getId()}}">{{ $country->getName() }}</option>
        @endforeach
    </select>
    <div class="mb-3">
        <label for="price" class="form-label">@lang('offer.new.labelValue')</label>
        <div class="mb-1 form-text">- @lang('offer.new.helpValue1')
            @if($countryId)
            <span class="p-1 border border-3 border-warning rounded-pill bg-secondary">{{$countryName}} -> ${{$minimumOfferValue}}</span>
            @endif 
        </div>
        <div class="mt-1 form-text">- @lang('offer.new.helpValue2')</div>
        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" aria-describedby="offer value" required min="0" max="{{ request()->user()->getBudget() }}">
    </div>
</div>
