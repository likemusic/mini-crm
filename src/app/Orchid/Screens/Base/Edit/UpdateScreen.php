<?php

namespace App\Orchid\Screens\Base\Edit;

use App\Contract\Http\CodeInterface as HttpCodeInterface;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;
use App\Contract\Screen\Item\CommandBar\UpdateInterface as UpdateCommandInterface;
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
        $constantName = PermissionConstantNameInterface::DELETE;

        return $this->getPermissionClassConstant($constantName);
    }

    private function createUpdateCommandBarButton()
    {
        return Button::make(UpdateCommandInterface::NAME)
            ->icon(UpdateCommandInterface::CLASS_NAME)
            ->class(UpdateCommandInterface::CLASS_NAME)
            ->method('update');
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
