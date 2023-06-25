<?php

namespace Candooc\BulkInsert\Tests;

use Candooc\BulkInsert\BulkInsertServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }


    protected function getPackageProviders($app)
    {
        return [
            BulkInsertServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'mysql');
        config()->set('database.connections.mysql.port', 3307);
        config()->set('database.connections.mysql.host', '172.31.112.1');
        config()->set('database.connections.mysql.database', 'testing');
        config()->set('database.connections.mysql.username', 'root');
        config()->set('database.connections.mysql.password', 'root');

        $migration = include __DIR__ . '/../database/migrations/create_users_table.php';
        $migration->up();
    }
}
