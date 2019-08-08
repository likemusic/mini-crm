<?php

namespace App\Contract\Entity;


interface ProductInterface
{
    const TABLE = 'products';

    const FIELD_ID = 'id';
    const FIELD_NAME = 'name';
    const FIELD_NOTE = 'note';
    const FIELD_CREATED_AT = 'created_at';
    const FIELD_UPDATED_AT = 'updated_at';
}
