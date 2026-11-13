<?php

function getRestaurants(): array
{
    return [
        [
            'name' => 'CW Coffee Gajah Mada',
            'image' => 'cw-coffee.png',
            'rating' => '4.7',
            'reviews' => '980',
        ],
        [
            'name' => 'Mie Gacoan Karya Baru',
            'image' => 'mie-gacoan.png',
            'rating' => '4.7',
            'reviews' => '980',
        ],
        [
            'name' => 'KFC Karya Baru',
            'image' => 'KFC.png',
            'rating' => '4.7',
            'reviews' => '980',
        ],
    ];
}

function getPaymentMethods(): array
{
    return [
        'Visa.png',
        'master.png',
        'bca.png',
        'qris.png',
        'seabank.png',
        'Mandiri.png',
    ];
}
