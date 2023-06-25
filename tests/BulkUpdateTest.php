<?php

it('update with conditional update', function ($data, $updateData, $result, $filters = null) {
    \DB::table('users')->delete();
    \DB::table('users')->insert($data);

    \DB::table('users')->bulkUpdate($updateData);

    expect(getDBUsers())
        ->toHaveCount(count($result))
        ->toEqualCanonicalizing($result);
})->with('users conditional update');

it('update with filters clauses', function ($data, $updateData, $result, $filters) {
    \DB::table('users')->insert($data);

    $filters($query = \DB::table('users'));

    $query->bulkUpdate($updateData);

    expect(getDBUsers())
        ->toHaveCount(count($result))
        ->toEqualCanonicalizing($result);
})->with('users conditional update with query filters');

function getDBUsers(): array
{
    return json_decode(\DB::table('users')->get()->values()->toJson(), true);
}
