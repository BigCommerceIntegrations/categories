<?php

namespace BigCommerceIntegrations\Categories;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider {
    public function boot() {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ .'/database/migrations');
    }
}
