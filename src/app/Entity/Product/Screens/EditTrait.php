<?php

namespace App\Entity\Product\Screens;

use App\Contract\Entity\Product\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ProductCategory\Field\NameInterface as ProductCategoryFieldNameInterface;
use App\Entity\Product\CrudUseVariantProvider;
use App\Entity\Product\NamesProvider;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use App\Entity\Product\InfoMessageProvider as InfoMessageProvider;
use App\Entity\Product\Product;
use App\Entity\ProductCategory\ProductCategory;
use App\Entity\Product\Screens\PermissionsClassNameTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use Orchid\Screen\Field;
use Illuminate\Contracts\Container\Container as ContainerInterface;

trait EditTrait
{
    use PermissionsClassNameTrait;

    /** @var ContainerInterface */
    protected $container;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        CrudUseVariantProvider $useVariant,
        InfoMessageProvider $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        NamesProvider $namesProvider,
        ContainerInterface $container,
        ?Request $request = null
    )
    {
        $this->container = $container;

        parent::__construct($routeNameProvider, $useVariant, $infoMessageProvider, $breadcrumbsHelper, $namesProvider, $request);
    }

    public function query(Product $model): array
    {
        return $this::onQuery($model);
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME)
                    ->required(),

                Field::group([
                    Select::make($this->getDataPath(FieldNameInterface::CATEGORY_ID))
                        ->fromModel(ProductCategory::class, ProductCategoryFieldNameInterface::NAME)
                        ->title(FieldLabelInterface::CATEGORY),

                    $this->createPriceInput(FieldNameInterface::APPROXIMATE_PRICE, FieldLabelInterface::APPROXIMATE_PRICE),
                    $this->createPriceInput(FieldNameInterface::SELLING_PRICE, FieldLabelInterface::SELLING_PRICE),
                ]),

                $this->createNoteTextArea(FieldNameInterface::NOTE, FieldLabelInterface::NOTE),
            ])
        ];
    }
}
