<?php

return [
    'navbar' => [
        'aToMe'=>'To Me',
        'aByMe'=>'By Me',
        'aNew'=>'New',
    ],
    'toMe' => [
        'titleTemplate' => 'My Offers - Miguapa Mundi',
        'cardTitle' => 'Offer',
        'cardOfferor' => 'Offeror',
        'cardCountry' => 'Country',
        'cardValue' => 'Offered Value',
        'cardDate' => 'Sent Date',
        'btnAccept' => 'Accept',
        'btnReject' => 'Reject',
    ],
    'byMe' => [
        'titleTemplate' => 'Offers By Me - Miguapa Mundi',
        'cardTitle' => 'Offer',
        'cardCountry' => 'Country',
        'cardValue' => 'Offered Value',
        'cardDate' => 'Sent Date',
        'footSent' => 'SENT',
        'footAccept' => 'ACCEPTED',
        'footReject' => 'REJECTED',
    ],
    'new' => [
        'titleTemplate' => 'Create Offer - Miguapa Mundi',
        'cardTitle' => 'New Offer',
        'labelCountry' => 'Country',
        'helpCountry' => 'Select the country you want to offer for',
        'labelValue' => 'Value to offer',
        'helpValue1' => 'Remember that you may offer a value greater that the minimum offer value of the country to be a valid offer',
        'helpValue2' => 'Remember that you have to add a value without dots or commas (for example: $1.000.000 must be 1000000)',
        'btnSubmit' => 'Submit',
        'successMsg' => 'Created Offer!'
    ],
    'accept' => [
        'errorMsg' => 'Sorry! the offeror doesn\'t have enough budget to buy your country',
        'successMsg' => 'You sold correctly your country!'
    ],
    'reject' => [
        'successMsg' => 'You rejected correctly an offer!'
    ],
    'delete' => [
        'successMsg' => 'You deleted correctly your offer!'
    ]
];