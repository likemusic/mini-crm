<?php

namespace App\Orchid\Screens\Base\ListScreen;

use App\Contract\Entity\Base\NotEditableUseVariantProviderInterface;
use App\Orchid\Screens\Base;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Orchid\Screen\Layout;

abstract class BaseListScreen extends Base
{
    /**
     * @var NotEditableUseVariantProviderInterface
     */
    protected $useVariant;

    public function __construct(
        NotEditableUseVariantProviderInterface $useVariant,
        ?Request $request = null)
    {
        $this->name = $useVariant->getListName();
        $this->useVariant = $useVariant;

        parent::__construct($request);
    }

    public function commandBar(): array
    {
        return [];
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            $this->getDataKey() => $this->getData(),
        ];
    }

    /**
     * @return LengthAwarePaginator
     */
    abstract protected function getData();

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            $this->getLayoutClassName()
        ];
    }

    abstract protected function getLayoutClassName(): string;
}
