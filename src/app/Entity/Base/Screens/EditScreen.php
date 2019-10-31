<?php

namespace App\Entity\Base\Screens;

use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;
use App\Contract\Entity\Base\InfoMessageProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;
use App\Contract\Screen\Item\CommandBar\CancelInterface as CancelCommandInterface;
use App\Contract\Screen\Item\CommandBar\DeleteInterface as DeleteCommandInterface;
use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use App\Base\Screen as BaseScreen;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use App\Contract\Entity\Base\NamesProviderInterface;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Input;

abstract class EditScreen extends BaseScreen
{
    /** @var BreadcrumbsHelper */
    protected $breadcrumbsHelper;
    /**
     * @var InfoMessageProviderInterface
     */
    protected $infoMessageProvider;
    /**
     * @var CrudUseVariantProviderInterface
     */
    private $useVariantProvider;
    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    /**
     * @var NamesProviderInterface
     */
    private $namesProvider;

    public function __construct(
        RouteNameProviderInterface $routeRouteNameProviderInterface,
        CrudUseVariantProviderInterface $useVariant,
        InfoMessageProviderInterface $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        NamesProviderInterface $namesProvider,
        ?Request $request = null
    )
    {
        $this->breadcrumbsHelper = $breadcrumbsHelper;
        $this->routeNameProvider = $routeRouteNameProviderInterface;
        $this->infoMessageProvider = $infoMessageProvider;
        $this->useVariantProvider = $useVariant;
        $this->namesProvider = $namesProvider;

        parent::__construct($request);
    }

    protected function getDataKey(): string
    {
        return $this->namesProvider->getItemDataKey();
    }

    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        $buttons = [];
        $buttons[] = $this->createCancelCommandBarButton();

        return $buttons;
    }

    private function createCancelCommandBarButton()
    {
        return $this->createCommandBarButton(
            CancelCommandInterface::NAME,
            CancelCommandInterface::ICON,
            CancelCommandInterface::CLASS_NAME,
            'cancel'
        );
    }

    protected function createCommandBarButton($name, $icon = null, $className = null, $method = null)
    {
        $button = Button::make($name);

        if ($icon) {
            $button->icon($icon);
        }

        if ($className) {
            $button->class($className);
        }

        if ($method) {
            $button->method($method);
        }

        return $button;
    }

    /**
     * @param Model $model
     *
     * @return RedirectResponse
     */
    public function delete(Model $model)
    {
        try {
            $model->delete();
            $message = $this->getDeleteMessage();
            $this->addAlertMessage($message);
        } catch (Exception $exception) {
            $message = $exception->getMessage();
            $this->addErrorMessage($message);
        }

        return $this->redirectToList();
    }

    private function getDeleteMessage()
    {
        return $this->infoMessageProvider->getDeleteMessage();
    }

    protected function addAlertMessage(string $message)
    {
        Alert::info($message);
    }

    protected function addErrorMessage(string $message)
    {
        Alert::error($message);
    }

    protected function redirectToList()
    {
        $routeName = $this->getRouteNameList();

        return $this->redirectToRoute($routeName);
    }

    private function getRouteNameList()
    {
        return $this->routeNameProvider->getList();
    }

    protected function redirectToRoute($routeName)
    {
        return redirect()->route($routeName);
    }

    /**
     * @return RedirectResponse
     */
    public function cancel()
    {
        return redirect()->route($this->getRouteNameList());
    }

    /**
     * @param Model $model
     * @param Request $request
     *
     * @param string $successMessage
     * @return RedirectResponse
     */
    protected function save(Model $model, Request $request, string $successMessage)
    {
        try {
            $requestData = $this->getRequestData($request);
            $model->fill($requestData)->save();
            $this->addAlertMessage($successMessage);
        } catch (Exception $exception) {
            $this->addErrorMessageByException($exception);

            return $this->redirectBackWithInput();
        }

        return $this->redirectToList();
    }

    protected function getRequestData(Request $request): array
    {
        $dataKey = $this->getDataKey();

        return $request->get($dataKey);
    }

    private function addErrorMessageByException(Exception $exception)
    {
        $message = $exception->getMessage();
        $this->addErrorMessage($message);
    }

    protected function redirectBackWithInput()
    {
        return Redirect::back()->withInput();
    }

    /**
     * Query data.
     *
     * @param Model $model
     * @return array
     */
    protected function onQuery($model): array
    {
        $this->name = $this->getScreenName();
        $dataKey = $this->getDataKey();

        return [$dataKey => $model];
    }

    abstract protected function getScreenName(): string;

    protected function getGenitiveName()
    {
        return $this->useVariantProvider->getGenitiveName();
    }

    /**
     * @param string $key
     * @return string
     */
    protected function getDataPath(string $key)
    {
        return $this->getDataKey() . '.' . $key;
    }

    protected function createNoteTextArea(string $name, string $title)
    {
        return TextArea::make($this->getDataPath($name))
            ->title($title)
            ->rows(4);
    }

    protected function createPriceInput(string $name, string $title)
    {
        return Input::make($this->getDataPath($name))
            ->title($title)
            ->type('number')
            ->min(0)
            ;
    }
}
