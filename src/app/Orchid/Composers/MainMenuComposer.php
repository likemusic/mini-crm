<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Orchid\Platform\Menu;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Dashboard;
use App\Contract\Route\Name\ProductInterface;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {
        // Profile
        $this->dashboard->menu
            ->add(Menu::PROFILE,
                ItemMenu::label('Empty 1')
                    ->icon('icon-compass')
            )
            ->add(Menu::PROFILE,
                ItemMenu::label('Empty 2')
                    ->icon('icon-heart')
                    ->badge(function () {
                        return 6;
                    })
            );

        // Main
        $this->dashboard->menu
            ->add(Menu::MAIN,
                ItemMenu::label('Example')
                    ->icon('icon-folder')
                    ->route('platform.example')
                    ->title('Example boilerplate')
            )
            ->add(Menu::MAIN,
                ItemMenu::label('Empty menu')
                    ->slug('example-menu')
                    ->icon('icon-code')
                    ->childs()
            )
            ->add('example-menu',
                ItemMenu::label('Empty sub item 1')
                    ->icon('icon-bag')
            )
            ->add('example-menu',
                ItemMenu::label('Empty sub item 2')
                    ->icon('icon-heart')
                    ->title('Separate')
            )
            // Email sender
            ->add(Menu::MAIN,
                ItemMenu::label('Email sender')
                    ->icon('icon-envelope-letter')
                    ->route('platform.email')
                    ->title('Tools')
            )

            // Product
            ->add(Menu::MAIN,
                ItemMenu::label('Товары')
                    ->icon('icon-bag')
                    ->route(ProductInterface::LIST)
                    ->title('Сущности')
            );

    }
}
