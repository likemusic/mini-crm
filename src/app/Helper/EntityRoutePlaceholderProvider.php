<?php

namespace App\Helper;

use App\Contract\EntityInterface;
use \App\Entity\Product\NamesProvider as ProductNamesProvider;
use App\Contract\Entity\Base\NamesProviderInterface;
use Illuminate\Contracts\Container\Container as ContainerInterface;

class EntityRoutePlaceholderProvider
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    private $entitiesCodesToNameProvidersMap = [
        EntityInterface::PRODUCT => ProductNamesProvider::class
    ];

    public function getRoutePlaceholderByEntityCode(string $entityCode): string
    {
        $entityNameProvider = $this->getEntityNameProviderByEntityCode($entityCode);

        return $entityNameProvider->getRoutePlaceholder();
    }

    private function getEntityNameProviderByEntityCode(string $entityCode): NamesProviderInterface
    {
        $nameProviderClassName = $this->getNameProviderClassNameByEntityCode($entityCode);

        return $this->container->get($nameProviderClassName);
    }

    private function getNameProviderClassNameByEntityCode(string $entityCode): string
    {
        $map = $this->entitiesCodesToNameProvidersMap;

        if (!array_key_exists($entityCode, $map)) {
            throw new \InvalidArgumentException('Unknown entity code: '. $entityCode);
        }

        return $map[$entityCode];
    }
}
