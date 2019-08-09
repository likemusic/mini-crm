<?php

namespace App\Database\Migrations;

use App\Contract\Common\PriceInterface;
use Illuminate\Database\Migrations\Migration as BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ColumnDefinition;

class Migration extends BaseMigration
{
    /**
     * @param Blueprint $table
     * @param string $columnName
     * @return ColumnDefinition
     */
    protected function addPriceColumn(Blueprint $table, $columnName)
    {
        return $table->decimal($columnName,PriceInterface::TOTAL,PriceInterface::PLACES);
    }
}
