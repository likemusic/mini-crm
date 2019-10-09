<?php

use App\Contract\Domain\CurrencyCodeInterface;
use App\Contract\Entity\ExchangeRate\Field\NameInterface;
use App\Model\ExchangeRate;
use App\Repositories\CurrencyRepository;
use Illuminate\Database\Seeder;

class ExchangeRatesTableSeeder extends Seeder
{
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bynCurrencyId = $this->getCurrencyIdByCode(CurrencyCodeInterface::BYN);
        $usdCurrencyId = $this->getCurrencyIdByCode(CurrencyCodeInterface::USD);

        $entitiesAttributes = [
            [
                NameInterface::FROM_CURRENCY_ID => $bynCurrencyId,
                NameInterface::TO_CURRENCY_ID => $usdCurrencyId,
                NameInterface::RATE => 0.48,
            ],
            [
                NameInterface::FROM_CURRENCY_ID => $usdCurrencyId,
                NameInterface::TO_CURRENCY_ID => $bynCurrencyId,
                NameInterface::RATE => 2.07,
            ],
        ];

        foreach ($entitiesAttributes as $entityAttributes) {
            $entity = new ExchangeRate($entityAttributes);
            $entity->save();
        }
    }

    private function getCurrencyIdByCode($currencyCode): ?int
    {
        return $this->currencyRepository->getCurrencyIdByCode($currencyCode);
    }
}
