<?php

namespace Tests\Unit\Helper;

use Tests\TestCase;
use Tests\SubjectTestCase;

use App\EntityMeta\DataProvider\PermissionsProvider;

class PermissionsProviderTest extends SubjectTestCase
{
    protected function getSubjectClassName(): string
    {
        return PermissionsProvider::class;
    }

    public function testGetAvailablePermissions()
    {
        /** @var PermissionsProvider $permissionsProvider */
        $permissionsProvider = $this->getTestSubject();
        $permissions = $permissionsProvider->getAvailablePermissions();
        $expectedPermissions = $this->getExpectedPermissions();

        $this->assertEquals($expectedPermissions, $permissions);
    }

    private function getExpectedPermissions()
    {
        return [
            'platform.index',
            'platform.systems',
            'platform.systems.index',
            'platform.systems.roles',
            'platform.systems.users',
            'platform.systems.attachment',
            'platform.systems.announcement',
        ];
    }
}
