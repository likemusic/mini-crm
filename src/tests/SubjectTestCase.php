<?php

namespace Tests;

abstract class SubjectTestCase extends TestCase
{
    abstract protected function getSubjectClassName(): string;

    protected function getTestSubject()
    {
        $subjectClassName = $this->getSubjectClassName();

        return $this->app->get($subjectClassName);
    }
}
