<?php

namespace Mkijak\NoindexByPath;

class NoindexByPath
{
    /**
     * @var bool
     */
    private $alreadyRun = false;

    public function checkPageAgainstNoindexedPaths()
    {
        if ($this->alreadyRun) {
            return;
        }

        $repository = new PathRepository();

        if (!$repository->find(RelativePathResolver::resolve())) {
            return;
        }

        RobotsModifier::setNoindex();

        $this->alreadyRun = true;
    }
}
