<?php

it('test update with conditional update', function ($data, $updateData, $result) {
    \DB::table('users')->insert($data);

    \DB::table('users')->bulkUpdate($updateData);

    expect(json_decode(\DB::table('users')->get()->values()->toJson(), true))
    ->toHaveCount(count($result))
    ->toEqualCanonicalizing($result);
})->with('users');

