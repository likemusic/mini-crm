<?php

namespace Tests\Unit\Helper;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Contract\Entity\Platform\PermissionInterface;
use App\Helper\ReflectionHelper;

class ReflectionHelperTest extends TestCase
{
    public function testGetClassConstants()
    {
        $reflectionHelper = $this->getTestReflectionHelper();
        $className = PermissionInterface::class;
        $constants = $reflectionHelper->getClassConstants($className);
        $expectedConstants = $this->getExpectedConstants();

        $this->assertEquals($expectedConstants, $constants);
    }

    private function getExpectedConstants()
    {
        return [
            'INDEX' => 'platform.index',
            'SYSTEMS' => 'platform.systems',
            'SYSTEMS_INDEX' => 'platform.systems.index',
            'SYSTEMS_ROLES' => 'platform.systems.roles',
            'SYSTEMS_USERS' => 'platform.systems.users',
            'SYSTEMS_ATTACHMENT' => 'platform.systems.attachment',
            'SYSTEMS_ANNOUNCEMENT' => 'platform.systems.announcement',
        ];
    }

    private function getTestReflectionHelper()
    {
        return new ReflectionHelper();
    }
}
