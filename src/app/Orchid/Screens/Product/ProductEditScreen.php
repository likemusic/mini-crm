<?php

namespace App\Orchid\Screens\Product;

use App\Contract\Entity\Product\Field\LabelInterface as ProductFieldLabelInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Product\Route\NameInterface as ProductRouteNamesInterface;
use App\Contract\Screen\Item\CommandBar\CancelInterface as CancelCommandInterface;
use App\Contract\Screen\Item\CommandBar\DeleteInterface as DeleteCommandInterface;
use App\Contract\Screen\Item\CommandBar\SaveInterface as SaveCommandInterface;
use App\Contract\Screen\Item\CommandBar\UpdateInterface as UpdateCommandInterface;
use App\Entity\Product\UseVariant as ProductUseVariant;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Helper\InfoMessageProvider\Product as ProductInfoMessageProvider;
use App\Model\Product;
use App\Orchid\Screens\Link;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class ProductEditScreen extends Screen
{
    const DATA_KEY = 'product';

    /** @var BreadcrumbsHelper */
    private $breadcrumbsHelper;

    /**
     * @var ProductInfoMessageProvider
     */
    private $productInfoMessageProvider;

    /**
     * @var ProductUseVariant
     */
    private $productUseVariant;

    /**
     * @var bool
     */
    private $exists = false;

    public function __construct(
        BreadcrumbsHelper $breadcrumbsHelper,
        ProductUseVariant $productUseVariant,
        ProductInfoMessageProvider $productInfoMessageProvider,
        ?Request $request = null
    ) {
        $this->breadcrumbsHelper = $breadcrumbsHelper;
        $this->productInfoMessageProvider = $productInfoMessageProvider;
        $this->productUseVariant = $productUseVariant;

        parent::__construct($request);
    }

    /**
     * Query data.
     *
     * @param Product $product
     * @return array
     */
    public function query(Product $product): array
    {
        $this->exists = $product->exists;

        $productGenitiveName = $this->productUseVariant->getGenitiveName();

        $this->name = $this->exists
            ? $this->breadcrumbsHelper->getUpdateName($productGenitiveName)
            : $this->breadcrumbsHelper->getCreateName($productGenitiveName);

        return [
            self::DATA_KEY => $product
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
            Link::name(SaveCommandInterface::NAME)
                ->icon(SaveCommandInterface::ICON)
                ->class(SaveCommandInterface::CLASS_NAME)
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Link::name(UpdateCommandInterface::NAME)
                ->icon(UpdateCommandInterface::CLASS_NAME)
                ->class(UpdateCommandInterface::CLASS_NAME)
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Link::name(DeleteCommandInterface::NAME)
                ->class(DeleteCommandInterface::CLASS_NAME)
                ->icon(DeleteCommandInterface::ICON)
                ->method('remove')
                ->canSee($this->exists),

            Link::name(CancelCommandInterface::NAME)
                ->class(CancelCommandInterface::CLASS_NAME)
                ->icon(CancelCommandInterface::ICON)
                ->method('cancel'),
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
            Layout::rows([
                Input::make($this->getDataPath(ProductFieldNameInterface::NAME))
                    ->title(ProductFieldLabelInterface::NAME),

                Input::make($this->getDataPath(ProductFieldNameInterface::APPROXIMATE_PRICE))
                    ->title(ProductFieldLabelInterface::APPROXIMATE_PRICE),

                Input::make($this->getDataPath(ProductFieldNameInterface::SELLING_PRICE))
                    ->title(ProductFieldLabelInterface::SELLING_PRICE),

                TextArea::make($this->getDataPath(ProductFieldNameInterface::NOTE))
                    ->title(ProductFieldLabelInterface::NOTE),
            ])
        ];
    }

    /**
     * @param string $key
     * @return string
     */
    private function getDataPath(string $key)
    {
        return self::DATA_KEY . '.'. $key;
    }

    /**
     * @param Product $product
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Product $product, Request $request)
    {
        try {
            $requestData = $request->get(self::DATA_KEY);

            $message = $product->exists
                ? $this->productInfoMessageProvider->getUpdateMessage()
                : $this->productInfoMessageProvider->getCreateMessage();

            $product->fill($requestData)->save();

            Alert::info($message);
        } catch (Exception $exception) {
            Alert::error($exception->getMessage());

            return Redirect::back()->withInput();
        }

        return redirect()->route(ProductRouteNamesInterface::LIST);
    }

    /**
     * @param Product $product
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function remove(Product $product)
    {
        try {
            $product->delete();
            Alert::info($this->productInfoMessageProvider->getDeleteMessage());
        }catch (\Exception $exception) {
            Alert::error($exception->getMessage());
        }

        return redirect()->route(ProductRouteNamesInterface::LIST);
    }

    /**
     * @return RedirectResponse
     */
    public function cancel()
    {
        return redirect()->route(ProductRouteNamesInterface::LIST);
    }
}
