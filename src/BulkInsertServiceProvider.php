<?php

namespace Candooc\BulkInsert;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;

class BulkInsertServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Builder::mixin(new BulkUpdate);
    }
}
