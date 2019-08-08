<?php

namespace App\Orchid\Screens;

use App\Contract\Route\Name\ProductInterface as ProductRouteNamesInterface;
use App\Orchid\Layouts\ProductListLayout;
use App\Product;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class ProductListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Товары';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Список товаров';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'products' => Product::paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::name('Добавить')
                ->icon('icon-plus')
                ->link(route(ProductRouteNamesInterface::NEW))
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            ProductListLayout::class
        ];
    }
}
