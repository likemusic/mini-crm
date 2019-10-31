<?php

namespace App\Entity\Currency\Screens;

use App\Contract\Entity\Currency\Field\LabelInterface as FieldLabelInterface;
use App\Contract\Entity\Currency\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\ProductCategory\Field\NameInterface as ProductCategoryFieldNameInterface;
use App\Entity\Currency\CrudUseVariantProvider;
use App\Entity\Currency\NamesProvider;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as InfoMessageProvider;
use App\Model\Currency;
use App\Model\ProductCategory;
use App\Entity\Currency\Screens\PermissionsClassNameTrait;
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

    public function query(Currency $model): array
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
                Input::make($this->getDataPath(FieldNameInterface::CODE))
                    ->title(FieldLabelInterface::CODE),

                Input::make($this->getDataPath(FieldNameInterface::NAME))
                    ->title(FieldLabelInterface::NAME),

                Input::make($this->getDataPath(FieldNameInterface::SORT_ORDER))
                    ->title(FieldLabelInterface::SORT_ORDER),
            ])
        ];
    }
}
