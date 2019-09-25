<?php

namespace App\Providers;

use App\Models\Usuario;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text'        => 'Usuário pendentes',
                'url'         => 'usuario/pendente',
                'icon'        => 'users',
                'label'       => Usuario::where('cadastroAprovado','=','0')->count(),
                'icon' => 'fas fa-fw fa-user-plus',
            ]);
        });
    }
}
