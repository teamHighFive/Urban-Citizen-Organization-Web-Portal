<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //------------------------------------------------------------------------------------------
        //By Sandali
        //------------------------------------------------------------------------------------------

        $this->mapUserRoutes();
        $this->mapMeetingRoutes();
        $this->mapEventRoutes();
        $this->mapDonationRoutes();
        $this->mapArchiveRoutes();
        $this->mapBlogRoutes();
        $this->mapGalleryRoutes();

        //------------------------------------------------------------------------------------------
        //By Sandali
        //------------------------------------------------------------------------------------------
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    //------------------------------------------------------------------------------------------
    //By Sandali
    //------------------------------------------------------------------------------------------

    protected function mapUserRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/user.php'));
    }

    protected function mapMeetingRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/meeting.php'));
    }

    protected function mapEventRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/event.php'));
    }

    protected function mapDonationRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/donation.php'));
    }

    protected function mapArchiveRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/archive.php'));
    }

    protected function mapBlogRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/blog.php'));
    }

    protected function mapGalleryRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/gallery.php'));
    }

    //------------------------------------------------------------------------------------------
    //By Sandali
    //------------------------------------------------------------------------------------------

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
