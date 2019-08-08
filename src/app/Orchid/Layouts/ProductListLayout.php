<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use App\Contract\Route\Name\ProductInterface as ProductRouteNamesInterface;
use App\Contract\Entity\ProductInterface as ProductEntityInterface;

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
            TD::set(ProductEntityInterface::FIELD_NAME, 'Наименование')->link(ProductRouteNamesInterface::EDIT, 'id', 'name'),
            TD::set(ProductEntityInterface::FIELD_NOTE, 'Примечание'),
            TD::set(ProductEntityInterface::FIELD_CREATED_AT, 'Создан'),
            TD::set(ProductEntityInterface::FIELD_UPDATED_AT, 'Изменен'),
        ];
    }
}
