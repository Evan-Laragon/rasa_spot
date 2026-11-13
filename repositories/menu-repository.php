<?php

function getMenus(string $query = ''): array
{
    $menus = [
        [
            'name' => 'Soto Madura',
            'image' => 'soto-madura.png',
            'rating' => '4.5',
            'reviews' => '620',
            'price' => 'Rp 25.000',
        ],
        [
            'name' => 'Iga Bakar Jumbo',
            'image' => 'iga-bakar-jumbo.png',
            'rating' => '4.9',
            'reviews' => '985',
            'price' => 'Rp 30.000',
        ],
        [
            'name' => 'Nasi Ayam Spesial',
            'image' => 'nasi-ayam-spesial.png',
            'rating' => '4.7',
            'reviews' => '980',
            'price' => 'Rp 28.000',
        ],
        [
            'name' => 'Nasi Padang',
            'image' => 'nasi-padang.png',
            'rating' => '4.8',
            'reviews' => '432',
            'price' => 'Rp 25.000',
        ],
        [
            'name' => 'Ayam Geprek',
            'image' => 'ayam-geprek.png',
            'rating' => '5.0',
            'reviews' => '1200',
            'price' => 'Rp 18.000',
        ],
        [
            'name' => 'Nasi Goreng gokil',
            'image' => 'nasi-goreng-gokil.png',
            'rating' => '5.0',
            'reviews' => '2180',
            'price' => 'Rp 20.000',
        ],
    ];

    if ($query === '') {
        return $menus;
    }

    return array_values(array_filter(
        $menus,
        static fn (array $menu): bool => stripos($menu['name'], $query) !== false
    ));
}
