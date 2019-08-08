<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Contract\Route\Name\ProductInterface as ProductRouteNamesInterface;

class ProductListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $data = 'products';

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            TD::set('name', 'Наименование')->link(ProductRouteNamesInterface::EDIT, 'id', 'name'),
            TD::set('created_at', 'Создан'),
            TD::set('updated_at', 'Изменен'),
        ];
    }
}
