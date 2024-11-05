<?php

namespace App\Providers;

use App\Models\Pegawai;
use App\Policies\PegawaiPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Pegawai::class => PegawaiPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
