<?php

namespace App\Entity\Wallet\Screens;

use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Entity\Wallet\CrudUseVariantProvider;
use App\Entity\Wallet\Wallet;
use App\Entity\Wallet\Layouts\WalletListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Wallet $model,
        CrudUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return WalletListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return WalletListLayout::class;
    }
}
