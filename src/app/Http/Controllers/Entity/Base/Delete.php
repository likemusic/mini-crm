<?php

namespace App\Http\Controllers\Entity\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Orchid\Support\Facades\Alert;
use App\Orchid\Screens\Base\Can\DeleteTrait as CanDeleteTrait;
use App\Contract\Http\CodeInterface as HttpCodeInterface;

class Delete extends Controller
{
    use CanDeleteTrait;

    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    public function __construct(RouteNameProviderInterface $routeNameProvider)
    {
        $this->routeNameProvider = $routeNameProvider;
    }

    public function __invoke(Model $model)
    {
        try {
            $this->checkDeletePermission();

            $model->delete();
        } catch (Exception $exception) {
            $this->addErrorMessageByException($exception);
        }

        return $this->redirectToList();
    }

    private function checkDeletePermission()
    {
        abort_if(!$this->canDelete(), HttpCodeInterface::FORBIDDEN);
    }

    private function addErrorMessageByException(Exception $exception)
    {
        $errorMessage = $exception->getMessage();
        $this->addErrorMessage($errorMessage);
    }

    private function addErrorMessage($message)
    {
        Alert::error($message);
    }

    private function redirectToList()
    {
        $listRouteName = $this->getListRouteName();

        return redirect()->route($listRouteName);
    }

    private function getListRouteName()
    {
        return $this->routeNameProvider->getList();
    }
}
