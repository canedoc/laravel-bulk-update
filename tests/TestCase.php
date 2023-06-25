<?php

namespace Candooc\BulkInsert\Tests;

use Candooc\BulkInsert\BulkInsertServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
        \DB::table('users')->delete();
    }

    protected function getPackageProviders($app)
    {
        return [
            BulkInsertServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $baseDBConfigPath = "database.connections.{$_ENV['DB_DRIVER']}.";

        config()->set('database.default', $_ENV['DB_DRIVER']);
        config()->set($baseDBConfigPath . 'port',  $_ENV['DB_PORT']);
        config()->set($baseDBConfigPath . 'host', $_ENV['DB_HOST']);
        config()->set($baseDBConfigPath . 'database', $_ENV['DB_NAME']);
        config()->set($baseDBConfigPath . 'username', $_ENV['DB_USERNAME']);
        config()->set($baseDBConfigPath . 'password', $_ENV['DB_PASSWORD']);
        config()->set($baseDBConfigPath . 'trust_server_certificate', 'true');

        config()->set($baseDBConfigPath . 'options' , [
            \PDO::ATTR_STRINGIFY_FETCHES => false,
            \PDO::SQLSRV_ATTR_FETCHES_NUMERIC_TYPE => true
        ]);

        $migration = include __DIR__.'/../database/migrations/create_users_table.php';
        $migration->up();
    }
}
