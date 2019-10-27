<?php

namespace App\Orchid\Screens\Base\Edit;

use App\Contract\Http\CodeInterface as HttpCodeInterface;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;
use App\Contract\Screen\Item\CommandBar\UpdateInterface as UpdateCommandInterface;
use App\Contract\Screen\Item\CommandBar\DeleteInterface as DeleteCommandInterface;
use App\Orchid\Screens\Base\EditScreen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;

abstract class UpdateScreen extends EditScreen
{
    /**
     * Button commands.
     *
     * @return Button[]
     */
    public function commandBar(): array
    {
        $buttons = parent::commandBar();

        if ($this->canUpdate()) {
            $buttons[] = $this->createUpdateCommandBarButton();
        }

        if ($this->canDelete()) {
            $buttons[] = $this->createDeleteCommandBarButton();
        }

        return $buttons;
    }

    private function canUpdate(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getUpdatePermission();

        return $currentUser->hasAccess($permission);
    }

    private function getUpdatePermission(): string
    {
        $constantName = PermissionConstantNameInterface::UPDATE;

        return $this->getPermissionClassConstant($constantName);
    }

    private function getDeletePermission(): string
    {
        $constantName = PermissionConstantNameInterface::DELETE;

        return $this->getPermissionClassConstant($constantName);
    }

    private function createUpdateCommandBarButton()
    {
        return $this->createCommandBarButton(
        UpdateCommandInterface::NAME,
            UpdateCommandInterface::ICON,
            UpdateCommandInterface::CLASS_NAME,
            'update'
        );
    }

    private function canDelete(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getDeletePermission();

        return $currentUser->hasAccess($permission);
    }


    private function createDeleteCommandBarButton()
    {
         return $this->createCommandBarButton(
             DeleteCommandInterface::NAME,
             DeleteCommandInterface::ICON,
             DeleteCommandInterface::CLASS_NAME,
             'delete'
         );
    }


    protected function getScreenName(): string
    {
        $genitiveName = $this->getGenitiveName();

        return $this->getBreadcrumbsUpdateName($genitiveName);
    }

    protected function getBreadcrumbsUpdateName(string $genitiveName): string
    {
        return $this->breadcrumbsHelper->getUpdateName($genitiveName);
    }

    /**
     * @param Model $model
     * @param Request $request
     *
     * @return RedirectResponse
     */
    protected function update($model, Request $request)
    {
        $this->checkUpdatePermission();
        $message = $this->getUpdateMessage();

        return $this->save($model, $request, $message);
    }

    private function checkUpdatePermission()
    {
        abort_if(!$this->canUpdate(), HttpCodeInterface::FORBIDDEN);
    }

    private function getUpdateMessage()
    {
        return $this->infoMessageProvider->getUpdateMessage();
    }

    protected function getPermissionClassConstantName(): string
    {
        return PermissionConstantNameInterface::UPDATE;
    }
}
