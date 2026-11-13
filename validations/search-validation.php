<?php

function getSearchRequest(array $request): string
{
    return is_string($request['q'] ?? null) ? trim($request['q']) : '';
}

function validateSearch($query): array
{
    if (!is_string($query)) {
        return [
            'value' => '',
            'error' => 'Kata kunci pencarian tidak valid.',
        ];
    }

    $query = trim($query);
    $characterCount = preg_match_all('/./us', $query, $matches);

    if ($characterCount === false) {
        return [
            'value' => '',
            'error' => 'Kata kunci pencarian menggunakan format yang tidak valid.',
        ];
    }

    if ($characterCount > 100) {
        return [
            'value' => '',
            'error' => 'Kata kunci pencarian maksimal 100 karakter.',
        ];
    }

    return [
        'value' => $query,
        'error' => '',
    ];
}
