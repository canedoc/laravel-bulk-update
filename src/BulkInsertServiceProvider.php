<?php

namespace Candooc\BulkInsert;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder;

class BulkInsertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Builder::mixin(new BulkUpdate);
    }
}
