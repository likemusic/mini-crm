<?php

namespace App\Contract\Entity\User\Field;

interface NameInterface
{
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const EMAIL_VERIFIED_AT = 'email_verified_at';
    const PASSWORD = 'password';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
