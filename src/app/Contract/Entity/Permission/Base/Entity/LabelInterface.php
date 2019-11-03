<?php

namespace App\Contract\Entity\Permission\Base\Entity;

use App\Contract\Entity\Permission\Base\Entity\Label\ListInterface;
use App\Contract\Entity\Permission\Base\Entity\Label\CreateInterface;
use App\Contract\Entity\Permission\Base\Entity\Label\UpdateInterface;
use App\Contract\Entity\Permission\Base\Entity\Label\DeleteInterface;

interface LabelInterface extends ListInterface, CreateInterface, UpdateInterface, DeleteInterface
{
}
