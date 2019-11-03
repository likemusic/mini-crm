<?php

namespace App\Entity\Settings\Screens;

use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use App\Contract\Entity\Settings\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Settings\Field\NameInterface as FieldNameInterface;
use App\Entity\Settings\CrudUseVariantProvider;
use App\Entity\Settings\InfoMessageProvider as InfoMessageProvider;
use App\Entity\Settings\NamesProvider;
use App\Entity\Settings\Route\NameProvider as RouteNameProvider;
use App\Entity\Settings\Settings;
use Illuminate\Contracts\Container\Container as ContainerInterface;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layout;

//use App\Contract\Entity\ProductCategory\Field\NameInterface as ProductCategoryFieldNameInterface;
//use App\Entity\ProductCategory\ProductCategory;

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

    public function query(Settings $model): array
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
                Input::make($this->getDataPath(FieldNameInterface::KEY))
                    ->title(FieldLabelInterface::KEY)
                    ->readonly(),

                Input::make($this->getDataPath(FieldNameInterface::VALUE))
                    ->title(FieldLabelInterface::VALUE)
                    ->readonly(),

//                Field::group([
//                    Select::make($this->getDataPath(FieldNameInterface::CATEGORY_ID))
//                        ->fromModel(ProductCategory::class, ProductCategoryFieldNameInterface::NAME)
//                        ->title(FieldLabelInterface::CATEGORY),
//
//                    $this->createPriceInput(FieldNameInterface::APPROXIMATE_PRICE, FieldLabelInterface::APPROXIMATE_PRICE),
//                    $this->createPriceInput(FieldNameInterface::SELLING_PRICE, FieldLabelInterface::SELLING_PRICE),
//                ]),
//
//                $this->createNoteTextArea(FieldNameInterface::NOTE, FieldLabelInterface::NOTE),
            ])
        ];
    }
}
