<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use MongoDB\Client as MongoClient;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\MongoDbSessionHandler;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Session::extend('mongodb', function ($app) {
            $client = new MongoClient(env('DB_MONGO_URI'));
            $collection = $client->selectDatabase('db_winnie_news')->selectCollection('sessions');
    
            return new MongoDbSessionHandler($collection, [
                'database' => 'db_winnie_news',
                'collection' => 'sessions',
                'id_field' => '_id', // ganti dari "id" ke "_id"
                'data_field' => 'payload',
                'time_field' => 'last_activity',
            ]);
        });
    }

}
