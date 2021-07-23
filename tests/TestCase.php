<?php declare(strict_types=1);
/*
 * Copyright 2020-2021 Cristiano Cinotti
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Susina\CodingStandard\Tests;

use Composer\Script\Event;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamFile;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /** @var vfsStreamDirectory */
    private $root = null;

    public function getRoot(): vfsStreamDirectory
    {
        if (null === $this->root) {
            $this->root = vfsStream::setup();
        }

        return $this->root;
    }

    public function getEvent(): Event
    {
        $event = $this->getMockBuilder(Event::class)->disableOriginalConstructor()->getMock();
        $event->method('getArguments')->willReturn(['basePath' => $this->getRoot()->url()]);

        return $event;
    }

    public function getComposer(): vfsStreamFile
    {
        $composerContent = '{
    "name" : "susina/coding-standard",
    "type" : "library",
    "description" : "Shared config for php-cs-fixer, based on PSR1 and PSR2",
    "license" : "Apache-2.0",
    "autoload" : {
        "psr-4" : {
            "Susina\\\\CodingStandard\\\\" : "src/"
        }
    }
}
';

        return vfsStream::newFile('composer.json')->at($this->getRoot())->setContent($composerContent);
    }

    public function getComposerWithScripts(): vfsStreamFile
    {
        $composerContent = '{
    "name" : "susina/coding-standard",
    "type" : "library",
    "description" : "Shared config for php-cs-fixer, based on PSR1 and PSR2",
    "license" : "Apache-2.0",
    "autoload" : {
        "psr-4" : {
            "Susina\\\\CodingStandard\\\\" : "src/"
        }
    },
    "scripts": {
        "post-install-cmd": [
            "Susina\\\\CodingStandard\\\\Script\\\\ComposerScripts::postInstall"
        ]
    }
}        
';

        return vfsStream::newFile('composer.json')->at($this->getRoot())->setContent($composerContent);
    }

    public function getComposerWithCsScript(): vfsStreamFile
    {
        $composerContent = '{
    "name" : "susina/coding-standard",
    "type" : "library",
    "description" : "Shared config for php-cs-fixer, based on PSR1 and PSR2",
    "license" : "Apache-2.0",
    "autoload" : {
        "psr-4" : {
            "Susina\\\\CodingStandard\\\\" : "src/"
        }
    },
    "scripts": {
        "post-install-cmd": [
            "Susina\\\\CodingStandard\\\\Script\\\\ComposerScripts::postInstall"
        ],
        "cs": "cs script already present"
    }
}        
';

        return vfsStream::newFile('composer.json')->at($this->getRoot())->setContent($composerContent);
    }

    public function getComposerWithCsFixScript(): vfsStreamFile
    {
        $composerContent = '{
    "name" : "susina/coding-standard",
    "type" : "library",
    "description" : "Shared config for php-cs-fixer, based on PSR1 and PSR2",
    "license" : "Apache-2.0",
    "autoload" : {
        "psr-4" : {
            "Susina\\\\CodingStandard\\\\" : "src/"
        }
    },
    "scripts": {
        "post-install-cmd": [
            "Susina\\\\CodingStandard\\\\Script\\\\ComposerScripts::postInstall"
        ],
        "cs-fix": "cs-fix script already present"
    }
}        
';

        return vfsStream::newFile('composer.json')->at($this->getRoot())->setContent($composerContent);
    }

    public function getComposerWithBothCsScripts(): vfsStreamFile
    {
        $composerContent = '{
    "name" : "susina/coding-standard",
    "type" : "library",
    "description" : "Shared config for php-cs-fixer, based on PSR1 and PSR2",
    "license" : "Apache-2.0",
    "autoload" : {
        "psr-4" : {
            "Susina\\\\CodingStandard\\\\" : "src/"
        }
    },
    "scripts": {
        "post-install-cmd": [
            "Susina\\\\CodingStandard\\\\Script\\\\ComposerScripts::postInstall"
        ],
        "cs": "cs script already present",    
        "cs-fix": "cs-fix script already present"
    }
}        
';

        return vfsStream::newFile('composer.json')->at($this->getRoot())->setContent($composerContent);
    }
}
