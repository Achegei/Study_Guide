<?php

namespace App\Filament\Navigation;

use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;

class CustomNavigation
{
    public static function get(): array
    {
        return [
            NavigationGroup::make('Content')
                ->items([
                    NavigationItem::make('Blogs')
                        ->url(fn () => route('filament.admin.resources.blogs.index'))
                        ->icon('heroicon-o-document'),
                ]),

            NavigationGroup::make('Users')
                ->items([
                    NavigationItem::make('Manage Users')
                        ->url(fn () => route('filament.admin.resources.users.index'))
                        ->icon('heroicon-o-user-group'),
                ]),
        ];
    }
}