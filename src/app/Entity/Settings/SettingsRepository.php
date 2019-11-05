<?php

namespace App\Entity\Settings;

use App\Contract\Entity\Settings\NameInterface;

class SettingsRepository
{
    /** @var Settings */
    private $model;

    public function __construct(Settings $model)
    {
        $this->model = $model;
    }

    public function getBaseCurrencyId(): ?int
    {
        $key = NameInterface::BASE_CURRENCY_ID;

        return $this->getByKey($key);
    }

    private function getByKey(string $key)
    {
        return $this->model->get($key);
    }
}
