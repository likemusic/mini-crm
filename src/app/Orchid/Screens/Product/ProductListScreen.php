<?php

namespace App\Orchid\Screens\Product;

use App\Contract\Entity\Base\UseVariantInterface;
use App\Contract\Entity\Product\Route\NameInterface;
use App\Contract\Screen\Table\CommandBar\AddInterface as AddCommandInterface;
use App\Entity\Product\UseVariant as ProductUseVariant;
use App\Model\Product;
use App\Orchid\Layouts\ProductListLayout;
use App\Orchid\Screens\Link;
use Illuminate\Http\Request;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class ProductListScreen extends Screen
{
    const DATA_KEY = 'products';

    /**
     * @var UseVariantInterface
     */
    public $useVariant;

    public function __construct(ProductUseVariant $useVariant, ?Request $request = null)
    {
        $this->useVariant = $useVariant;
        $this->name = $useVariant->getListName();

        parent::__construct($request);
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            self::DATA_KEY => Product::paginate()
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
            Link::name(AddCommandInterface::NAME)
                ->icon(AddCommandInterface::ICON)
                ->link(route(NameInterface::NEW))
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
