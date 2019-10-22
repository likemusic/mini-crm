<?php

namespace App\Orchid\Screens\Base\Edit;

use App\Contract\Common\HttpCodeInterface;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;
use App\Contract\Screen\Item\CommandBar\SaveInterface as SaveCommandInterface;
use App\Orchid\Screens\Base\EditScreen;
use App\Orchid\Screens\Button;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

abstract class CreateScreen extends EditScreen
{
    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        $buttons = parent::commandBar();

        if ($this->canCreate()) {
            $buttons[] = $this->createCreateCommandBarButton();
        }

        return $buttons;
    }

    private function canCreate(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getCreatePermission();

        return $currentUser->hasAccess($permission);
    }

    private function getCreatePermission(): string
    {
        $constantName = PermissionConstantNameInterface::DELETE;

        return $this->getPermissionClassConstant($constantName);
    }

    private function createCreateCommandBarButton()
    {
        return Button::make(SaveCommandInterface::NAME)
            ->icon(SaveCommandInterface::ICON)
            ->class(SaveCommandInterface::CLASS_NAME)
            ->method('create');
    }

    protected function getScreenName(): string
    {
        $genitiveName = $this->getGenitiveName();

        return $this->getBreadcrumbsCreateName($genitiveName);
    }

    protected function getBreadcrumbsCreateName(string $genitiveName): string
    {
        return $this->breadcrumbsHelper->getCreateName($genitiveName);
    }

    /**
     * @param Model $model
     * @param Request $request
     *
     * @return RedirectResponse
     */
    protected function create($model, Request $request)
    {
        $this->checkCreatePermission();
        $message = $this->getCreateMessage();

        return $this->save($model, $request, $message);
    }

    private function checkCreatePermission()
    {
        abort_if(!$this->canCreate(), HttpCodeInterface::FORBIDDEN);
    }

    private function getCreateMessage()
    {
        return $this->infoMessageProvider->getCreateMessage();
    }
}