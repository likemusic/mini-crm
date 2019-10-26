<?php

namespace App\Orchid\Screens\Base\Edit;

use App\Contract\Http\CodeInterface as HttpCodeInterface;
use App\Contract\Screen\Item\CommandBar\SaveInterface as SaveCommandInterface;
use App\Orchid\Screens\Base\CanCreateTrait;
use App\Orchid\Screens\Base\EditOrCreateScreen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

abstract class CreateOrCreateScreen extends EditOrCreateScreen
{
    use CanCreateTrait;

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

    protected function getPermissionClassConstantName(): string
    {
        return PermissionConstantNameInterface::CREATE;
    }
}
