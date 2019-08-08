<?php

namespace App\Contract\Entity;


interface ProductInterface
{
    const TABLE = 'products';

    const FIELD_ID = 'id';
    const FIELD_NAME = 'name';
    const FIELD_NOTE = 'note';
}
