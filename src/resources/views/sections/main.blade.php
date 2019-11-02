@php
    /** @var \App\Contract\MainMenu\RenderedItemInterface[] $menu */
@endphp

<div class="row admin-wrapper wrapper-sm">
    @foreach ($menu as $renderedItem)
        @php
            $itemData = $renderedItem->getData();
        @endphp

        <div class="col-md-6 col-lg-4 no-padder admin-element-item">
            <div class="admin-element w-full">
                <h3 class="font-thin h3 text-black">
                    <i class="{{ $itemData->getIcon() }}"></i> {{ $itemData->getLabel() }}
                </h3>
                <div class="line line-dashed b-b line-lg"></div>
                @php
                    /** @var App\Contract\MainMenu\ItemData\ChildInterface[] $children */
                    $children = $renderedItem->getChildren();
                @endphp

                <ul>
                    @foreach ($children as $childItem)
                        <li>
                            <a href="{{ route($childItem->getRouteName()) }}"><i
                                    class="{{ $childItem->getIcon() }}"></i>
                                {{ $childItem->getLabel() }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>

    @endforeach
</div>
