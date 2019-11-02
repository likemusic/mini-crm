<?php

namespace App\Contract\Entity;

interface LabelInterface
{
    const COUNTERAGENT = 'Контрагент';
    const CURRENCY = 'Валюта';
    const DISCOUNTED_PRODUCT = 'Уцененный товар';
    const EXCHANGE_RATE = 'Курс обмена';
    const MONEY_CHANGE = 'Изменение баланса';
    const MONEY_TRANSFER = 'Перевод между кошельками';
    const ORDER = 'Заказ';
    const PHARMACY = 'Аптека';

    const PRODUCT = 'Товар';
    const PRODUCT_CATEGORY = 'Категория товара';
    const ROLE = 'Роль пользователя';
    const USER = 'Пользователь';
    const WAREHOUSE = 'Склад';
    const WALLET = 'Кошелек';
}
