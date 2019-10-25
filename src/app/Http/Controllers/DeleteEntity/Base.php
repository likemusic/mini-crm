<?php

namespace App\Http\Controllers\DeleteEntity;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Base extends Controller
{
    public function __invoke(Model $model)
    {
        $model->delete();

        return $this->redirectBack();
    }

    private function redirectBack()
    {
        return redirect()->back();
    }
}
