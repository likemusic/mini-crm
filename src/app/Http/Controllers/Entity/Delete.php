<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Orchid\Support\Facades\Alert;

class Delete extends Controller
{
    public function __invoke(Model $model)
    {
        try {
            $model->delete();
        } catch (Exception $exception) {
            $this->addErrorMessageByException($exception);
        }

        return $this->redirectBack();
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

    private function redirectBack()
    {
        return redirect()->back();
    }
}
