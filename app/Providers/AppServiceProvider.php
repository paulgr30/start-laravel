<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Auths Login
        $this->app->when(\Core\Domain\Services\Auths\LoginService::class)
            ->needs(\Core\Domain\Contracts\AuthContract::class)
            ->give(\Core\Domain\Repositories\Eloquent\AuthRepository::class);

        //Auths Profile
        $this->app->when(\Core\Domain\Services\Auths\ProfileService::class)
            ->needs(\Core\Domain\Contracts\AuthContract::class)
            ->give(\Core\Domain\Repositories\Eloquent\AuthRepository::class);

        //Auths UpdateProfile
        $this->app->when(\Core\Domain\Services\Auths\UpdateProfileService::class)
            ->needs(\Core\Domain\Contracts\AuthContract::class)
            ->give(\Core\Domain\Repositories\Eloquent\AuthRepository::class);

        //Auths ChangePassword
        $this->app->when(\Core\Domain\Services\Auths\ChangePasswordService::class)
            ->needs(\Core\Domain\Contracts\AuthContract::class)
            ->give(\Core\Domain\Repositories\Eloquent\AuthRepository::class);

        //Auths RefreshToken
        $this->app->when(\Core\Domain\Services\Auths\RefreshTokenService::class)
        ->needs(\Core\Domain\Contracts\AuthContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\AuthRepository::class);

        //Auths Logout
        $this->app->when(\Core\Domain\Services\Auths\LogoutService::class)
            ->needs(\Core\Domain\Contracts\AuthContract::class)
            ->give(\Core\Domain\Repositories\Eloquent\AuthRepository::class);










        //Users Get
        $this->app->when(\Core\Domain\Services\Users\GetByIdService::class)
        ->needs(\Core\Domain\Contracts\BaseContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\UserRepository::class);

        //Users GetAll
        $this->app->when(\Core\Domain\Services\Users\GetAllService::class)
        ->needs(\Core\Domain\Contracts\BaseContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\UserRepository::class);

        //Users GetByCriteria
        $this->app->when(\Core\Domain\Services\Users\GetByCriteriaService::class)
        ->needs(\Core\Domain\Contracts\BaseContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\UserRepository::class);

        //Users Store
        $this->app->when(\Core\Domain\Services\Users\StoreService::class)
        ->needs(\Core\Domain\Contracts\BaseContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\UserRepository::class);

        //Users Update
        $this->app->when(\Core\Domain\Services\Users\UpdateService::class)
        ->needs(\Core\Domain\Contracts\BaseContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\UserRepository::class);

        //Users Destroy
        $this->app->when(\Core\Domain\Services\Users\DestroyService::class)
        ->needs(\Core\Domain\Contracts\BaseContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\UserRepository::class);









        //Roles Get
        $this->app->when(\Core\Domain\Services\Roles\GetRoleService::class)
        ->needs(\Core\Domain\Contracts\RoleContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\RoleRepository::class);

        //Roles All
        $this->app->when(\Core\Domain\Services\Roles\GetRolesService::class)
        ->needs(\Core\Domain\Contracts\RoleContract::class)
        ->give(\Core\Domain\Repositories\Eloquent\RoleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
