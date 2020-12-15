<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Eloquents\CateRepository;
use App\Repositories\Contracts\CateRepositoryInterface;

use App\Repositories\Eloquents\TagsRepository;
use App\Repositories\Contracts\TagsRepositoryInterface;

use App\Repositories\Eloquents\SlidesRepository;
use App\Repositories\Contracts\SlidesRepositoryInterface;

use App\Repositories\Eloquents\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

use App\Repositories\Eloquents\ProductRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

use App\Repositories\Eloquents\ProductTypeRepository;
use App\Repositories\Contracts\ProductTypeRepositoryInterface;

use App\Repositories\Eloquents\CommentRepository;
use App\Repositories\Contracts\CommentRepositoryInterface;

use App\Repositories\Eloquents\ClientRepository;
use App\Repositories\Contracts\ClientRepositoryInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CateRepositoryInterface::class,CateRepository::class);   
        $this->app->bind(TagsRepositoryInterface::class,TagsRepository::class);   
        $this->app->bind(SlidesRepositoryInterface::class,SlidesRepository::class);   
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);   
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);   
        $this->app->bind(ProductTypeRepositoryInterface::class,ProductTypeRepository::class);   
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);   
        $this->app->bind(ClientRepositoryInterface::class,ClientRepository::class);   
            
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
