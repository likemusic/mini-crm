<?php

namespace Tests\Unit\Helper;

use App\Contract\Entity\Platform\PermissionInterface;
use App\Helper\ReflectionHelper;
use Tests\SubjectTestCase;

class ReflectionHelperTest extends SubjectTestCase
{
    public function testGetClassConstants()
    {
        $reflectionHelper = $this->getTestSubject();
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

    protected function getSubjectClassName(): string
    {
        return ReflectionHelper::class;
    }
}
