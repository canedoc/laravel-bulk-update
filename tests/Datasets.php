<?php

dataset('users', [
    'with single conditional update' => [
        [
            ['email' => 'naruto@best.com', 'name' => 'naruto', 'id' => 1],
            ['email' => 'sasuki@best.com', 'name' => 'sasuki', 'id' => 2],
            ['email' => 'kakachi@best.com', 'name' => 'kakachi', 'id' => 2],
        ],
        [
            'email' => $result = [
                ['email' => 'narutoisthebest@best.com', 'name' => 'naruto', 'id' => 1],
                ['email' => 'sasukiisthebest@best.com', 'name' => 'sasuki', 'id' => 2],
                ['email' => 'kakachiisthebest@best.com', 'name' => 'kakachi', 'id' => 2],
            ],
        ],
        $result,
    ],

    'with set to values' => [
        $baseData = [
            ['email' => 'naruto@best.com', 'name' => 'naruto', 'id' => 1],
            ['email' => 'sasuki@best.com', 'name' => 'sasuki', 'id' => 2],
            ['email' => 'kakachi@best.com', 'name' => 'kakachi', 'id' => 2],
        ],
        $updateData = [
            'email' => 'itachi@idotensi.com',
        ],
        array_map(fn ($row) => $updateData + $row, $baseData),
    ],

    'with set to values' => [
        $baseData = [
            ['email' => 'naruto@best.com', 'name' => 'naruto', 'id' => 1],
            ['email' => 'sasuki@best.com', 'name' => 'sasuki', 'id' => 2],
            ['email' => 'kakachi@best.com', 'name' => 'kakachi', 'id' => 2],
        ],
        $updateData = [
            'email' => 'itachi@idotensi.com',
        ],
        array_map(fn ($row) => $updateData + $row, $baseData),
    ],
]);
