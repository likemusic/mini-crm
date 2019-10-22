<?php

namespace App\Orchid\Screens\Base;

use App\Contract\Entity\Base\EditableUseVariantProviderInterface;
use App\Contract\Entity\Base\InfoMessageProviderInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;
use App\Contract\Screen\Item\CommandBar\CancelInterface as CancelCommandInterface;
use App\Contract\Screen\Item\CommandBar\DeleteInterface as DeleteCommandInterface;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use App\Model\User;
use App\Orchid\Screens\Base as BaseScreen;
use App\Orchid\Screens\Button;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Orchid\Support\Facades\Alert;

abstract class EditScreen extends BaseScreen
{
    /** @var BreadcrumbsHelper */
    protected $breadcrumbsHelper;
    /**
     * @var InfoMessageProviderInterface
     */
    protected $infoMessageProvider;
    /**
     * @var EditableUseVariantProviderInterface
     */
    private $useVariantProvider;
    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    public function __construct(
        RouteNameProviderInterface $routeRouteNameProviderInterface,
        EditableUseVariantProviderInterface $useVariant,
        InfoMessageProviderInterface $infoMessageProvider,
        BreadcrumbsHelper $breadcrumbsHelper,
        ?Request $request = null
    )
    {
        $this->breadcrumbsHelper = $breadcrumbsHelper;
        $this->routeNameProvider = $routeRouteNameProviderInterface;
        $this->infoMessageProvider = $infoMessageProvider;
        $this->useVariantProvider = $useVariant;

        parent::__construct($request);
    }

    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        $buttons = [];

        if ($this->canDelete()) {
            $buttons[] = $this->createDeleteCommandBarButton();
        }

        $buttons[] = $this->createCancelCommandBarButton();

        return $buttons;
    }

    private function canDelete(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getDeletePermission();

        return $currentUser->hasAccess($permission);
    }

    /**
     * @return Authenticatable|User
     */
    protected function getCurrentUser(): Authenticatable
    {
        return Auth::user();
    }

    private function getDeletePermission(): string
    {
        $constantName = PermissionConstantNameInterface::DELETE;

        return $this->getPermissionClassConstant($constantName);
    }

    protected function getPermissionClassConstant(string $constantName): string
    {
        $permissionClassName = $this->getPermissionsClassName();

        return $this->getClassConstantValue($permissionClassName, $constantName);
    }

    abstract protected function getPermissionsClassName(): string;

    private function getClassConstantValue($className, $constantName): string
    {
        return constant("{$className}::{$constantName}");
    }

    private function createDeleteCommandBarButton()
    {
        return Button::make(DeleteCommandInterface::NAME)
            ->class(DeleteCommandInterface::CLASS_NAME)
            ->icon(DeleteCommandInterface::ICON)
            ->method('delete');
    }

    private function createCancelCommandBarButton()
    {
        return Button::make(CancelCommandInterface::NAME)
            ->class(CancelCommandInterface::CLASS_NAME)
            ->icon(CancelCommandInterface::ICON)
            ->method('cancel');
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
    protected function save($model, Request $request, string $successMessage)
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

    protected function addAlertMessage(string $message)
    {
        Alert::info($message);
    }

    private function addErrorMessageByException(Exception $exception)
    {
        $message = $exception->getMessage();
        $this->addErrorMessage($message);
    }

    protected function addErrorMessage(string $message)
    {
        Alert::error($message);
    }

    protected function redirectBackWithInput()
    {
        return Redirect::back()->withInput();
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
}
