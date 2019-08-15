<?php

namespace App\Orchid\Screens\Wallet;

use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Entity\Wallet\UseVariantProvider;
use App\Model\Wallet;
use App\Orchid\Layouts\Wallet\WalletListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(
        Wallet $model,
        UseVariantProvider $useVariant,
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
