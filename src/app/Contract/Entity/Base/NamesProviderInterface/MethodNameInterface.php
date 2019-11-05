<?php

namespace App\Contract\Entity\Base\NamesProviderInterface;

interface MethodNameInterface
{
    const GET_ROUTE_PLACEHOLDER = 'getRoutePlaceholder';
    const GET_ROUTE_BASE_PATH = 'getRouteBasePath';
    const GET_ROUTE_BASE_NAME = 'getRouteBaseName';
    const GET_ITEM_DATA_KEY = 'getItemDataKey';
    const GET_LIST_DATA_KEY = 'getListDataKey';
}
