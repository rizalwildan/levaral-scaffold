<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('sidebar', function ($menu) {
            $menu->add('Dashboard');
            $menu->add('User', ['route' => 'admin.users.index']);
            $menu->add('Roles', ['route' => 'admin.roles.index']);
            $menu->add('Permission', ['route' => 'admin.permissions.index']);
            $menu->add('Parent Menu', ['icon' => 'fa fa-book'])->nickname('parent_menu');
            $menu->parent_menu->add('Child Menu 1');
            $menu->parent_menu->add('Child Menu 2');
            $menu->parent_menu->add('Child Menu 3');
        });
        return $next($request);
    }
}
