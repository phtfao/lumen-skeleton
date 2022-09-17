<?php

namespace App\Providers;

use Phtfao\Panako\Broker\Model\User;
use Illuminate\Support\ServiceProvider;
use Phtfao\Panako\Broker\Model\Transaction;
use Phtfao\Panako\Support\Contracts\ModelInterface;
use Phtfao\Panako\Support\Repository\UserRepository;
use Phtfao\Panako\Core\Transaction\TransactionService;
use Phtfao\Panako\Broker\Factory\TransactionServiceFactory;
use Phtfao\Panako\Support\Repository\TransactionRepository;
use Phtfao\Panako\Support\Contracts\UserRepositoryInterface;
use Phtfao\Panako\Support\Contracts\TransactionRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TransactionRepositoryInterface::class,
            TransactionRepository::class
        );

        $this->app->bind(
            TransactionRepositoryInterface::class,
            function () {
                return new TransactionRepository(new Transaction());
        });

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            function () {
                return new UserRepository(new User());
        });

        // $this->app->bind(
        //     ModelInterface::class,
        //     function () {
        //         return new Transaction();
        // });
    }
}
