<?php

namespace App\Orchid\Layouts\Wallet;

use App\Contract\Entity\Wallet\Field\LabelInterface;
use App\Contract\Entity\Wallet\Field\NameInterface as FieldNameInterface;
use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Model\User;
use App\Model\Wallet;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class WalletListLayout extends ListLayout
{
    const DATA_KEY = 'wallets';

    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::OWNER_ID, LabelInterface::OWNER)
                ->render(function (Wallet $wallet) {
                    /** @var User $owner */
                    $owner = $wallet->owner;
                    $ownerName = $owner->name;

                    $ownerRoles = $owner->getRoles();

                    $roleNames = [];
                    foreach ($ownerRoles as $ownerRole) {
                        $roleNames[] = $ownerRole->name;
                    }


                    $ownerRoleNames = implode(', ', $roleNames);

                    return "{$ownerName} ({$ownerRoleNames})";
                }),

            TD::set(FieldNameInterface::CURRENCY_CODE, LabelInterface::CURRENCY_CODE),
            TD::set(FieldNameInterface::AMOUNT, LabelInterface::AMOUNT),
            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),

            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
