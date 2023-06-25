<?php

dataset('users', [
    'with single column conditional update' => [
        [
            ['email' => 'naruto@best.com', 'name' => 'naruto', 'id' => 1],
            ['email' => 'sasuki@best.com', 'name' => 'sasuki', 'id' => 2],
            ['email' => 'kakachi@best.com', 'name' => 'kakachi', 'id' => 2],
        ],
        [
            'email' => $result = [
                ['email' => 'narutoisthebest@best.com', 'name' => 'naruto', 'id' => 1],
                ['email' => 'sasukiisthebest@best.com', 'name' => 'sasuki', 'id' => 2],
                ['email' => null, 'name' => 'kakachi', 'id' => 2],
            ],
        ],
        $result,
    ],

    'with single column conditional update when name is null' => [
        [
            ['email' => 'naruto@best.com', 'name' => 'naruto', 'id' => 1],
            ['email' => 'sasuki@best.com', 'name' => null, 'id' => 2],
        ],
        [
            'email' => $result = [
                ['email' => 'narutoisthebest@best.com', 'name' => 'naruto', 'id' => 1],
                ['email' => 'sasukiisthebest@best.com', 'name' => null, 'id' => 2],
            ],
        ],
        $result,
    ],

    'with multiple column conditional update' => [
        [
            ['email' => 'naruto@best.com', 'name' => 'naruto', 'id' => 1],
            ['email' => 'sasuki@best.com', 'name' => 'sasuki', 'id' => 2],
        ],
        [
            'email' => [
                ['email' => 'narutoisthebest@best.com', 'name' => 'naruto', 'id' => 1],
                ['email' => 'sasukiisthebest@best.com', 'name' => 'sasuki', 'id' => 2],
                ['email' => 'kakachiisthebest@best.com', 'name' => 'kakachi', 'id' => 2],
            ],
            'name' => [
                ['name' => 'Kurama', 'id' => 1],
            ]
        ],
        [
            ['email' => 'narutoisthebest@best.com', 'name' => 'Kurama', 'id' => 1],
            ['email' => 'sasukiisthebest@best.com', 'name' => 'sasuki', 'id' => 2],
        ]
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
