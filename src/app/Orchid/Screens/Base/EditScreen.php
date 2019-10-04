<?php

namespace App\Orchid\Screens\Base;

use App\Contract\Entity\Base\InfoMessageProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProviderInterface;
use App\Contract\Screen\Item\CommandBar\CancelInterface as CancelCommandInterface;
use App\Contract\Screen\Item\CommandBar\DeleteInterface as DeleteCommandInterface;
use App\Contract\Screen\Item\CommandBar\SaveInterface as SaveCommandInterface;
use App\Contract\Screen\Item\CommandBar\UpdateInterface as UpdateCommandInterface;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Model\Product;
use App\Orchid\Screens\Button;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Orchid\Support\Facades\Alert;

abstract class EditScreen extends Screen
{
    /** @var BreadcrumbsHelper */
    private $breadcrumbsHelper;
    /**
     * @var InfoMessageProviderInterface
     */
    private $infoMessageProvider;
    /**
     * @var UseVariantProviderInterface
     */
    private $useVariantProvider;
    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;
    /**
     * @var bool
     */
    private $exists = false;

    public function __construct(
        RouteNameProviderInterface $routeRouteNameProviderInterface,
        UseVariantProviderInterface $useVariant,
        InfoMessageProviderInterface $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        ?Request $request = null
    ) {
        $this->breadcrumbsHelper = $breadcrumbsHelper;
        $this->routeNameProvider = $routeRouteNameProviderInterface;
        $this->infoMessageProvider = $infoMessageProvider;
        $this->useVariantProvider = $useVariant;

        parent::__construct($request);
    }

    /**
     * Query data.
     *
     * @param Model $model
     * @return array
     */
    protected function onQuery($model): array
    {
        $this->exists = $model->exists;

        $productGenitiveName = $this->useVariantProvider->getGenitiveName();

        $this->name = $this->exists
            ? $this->breadcrumbsHelper->getUpdateName($productGenitiveName)
            : $this->breadcrumbsHelper->getCreateName($productGenitiveName);

        return [
            $this->getDataKey() => $model
        ];
    }

    protected function getDataKey(): string
    {
        return 'product';
    }

    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        return [
            Button::name(SaveCommandInterface::NAME)
                ->icon(SaveCommandInterface::ICON)
                ->class(SaveCommandInterface::CLASS_NAME)
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::name(UpdateCommandInterface::NAME)
                ->icon(UpdateCommandInterface::CLASS_NAME)
                ->class(UpdateCommandInterface::CLASS_NAME)
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::name(DeleteCommandInterface::NAME)
                ->class(DeleteCommandInterface::CLASS_NAME)
                ->icon(DeleteCommandInterface::ICON)
                ->method('remove')
                ->canSee($this->exists),

            Button::name(CancelCommandInterface::NAME)
                ->class(CancelCommandInterface::CLASS_NAME)
                ->icon(CancelCommandInterface::ICON)
                ->method('cancel'),
        ];
    }

    /**
     * @param Model $model
     * @param Request $request
     *
     * @return RedirectResponse
     */
    protected function onCreateOrUpdate($model, Request $request)
    {
        try {
            $requestData = $request->get($this->getDataKey());

            $message = $model->exists
                ? $this->infoMessageProvider->getUpdateMessage()
                : $this->infoMessageProvider->getCreateMessage();

            $model->fill($requestData)->save();

            Alert::info($message);
        } catch (Exception $exception) {
            Alert::error($exception->getMessage());

            return Redirect::back()->withInput();
        }

        return redirect()->route($this->getRouteNameList());
    }

    private function getRouteNameList()
    {
        return $this->routeNameProvider->getList();
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
            Alert::info($this->infoMessageProvider->getDeleteMessage());
        }catch (\Exception $exception) {
            Alert::error($exception->getMessage());
        }

        return redirect()->route($this->getRouteNameList());
    }

    /**
     * @return RedirectResponse
     */
    public function cancel()
    {
        return redirect()->route($this->getRouteNameList());
    }

    /**
     * @param string $key
     * @return string
     */
    protected function getDataPath(string $key)
    {
        return $this->getDataKey(). '.'. $key;
    }
}
