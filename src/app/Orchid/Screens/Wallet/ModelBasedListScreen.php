<?php

namespace App\Orchid\Screens\Wallet;

use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Entity\Wallet\EditableUseVariantProvider;
use App\Model\Wallet;
use App\Orchid\Layouts\Wallet\WalletListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBasedListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Wallet $model,
        EditableUseVariantProvider $useVariant,
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
