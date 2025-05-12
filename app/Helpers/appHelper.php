<?php

use App\Models\Navigation;
use App\Models\Role;

if (!function_exists('getMenus')) {
    function getMenus()
    {
        return Navigation::with('subMenus')->orderBy('sort', 'desc')->get();
    }
}

if (!function_exists('getParentMenus')) {
    function getParentMenus($url)
    {
        $menu = Navigation::where('url', $url)->first();
        if ($menu) {
            $parentMenu = Navigation::select('name')->where('id', $menu->main_menu)->first();
            return $parentMenu->name ?? '';
        }
        return '';
    }
}

if (!function_exists('getRoles')) {
    function getRoles()
    {
        return Role::where('name', '!=', 'admin')->get();
    }
}

// Perbaikan fungsi isParentActive
if (!function_exists('isParentActive')) {
    function isParentActive($menu, $subMenus)
    {
        // Cek apakah route utama aktif
        if (request()->routeIs($menu->url . '*')) {
            return true;
        }

        // Cek apakah URL utama aktif, tanpa "admin/" tambahan
        if (request()->is($menu->url . '*')) {
            return true;
        }

        // Cek apakah salah satu submenu aktif
        foreach ($subMenus as $submenu) {
            if (request()->is($submenu->url . '*') || request()->routeIs($submenu->url . '*')) {
                return true;
            }
        }

        return false;
    }
}

// Perbaikan fungsi isMenuActive
if (!function_exists('isMenuActive')) {
    function isMenuActive($menuUrl)
    {
        // Cek tanpa duplikasi "admin/"
        return request()->routeIs($menuUrl . '*') ||
            request()->is($menuUrl . '*');
    }
}
