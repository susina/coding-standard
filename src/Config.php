<?php declare(strict_types=1);
/**
 * Copyright 2020 Cristiano Cinotti
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

namespace Susina\CodingStandard;

use PhpCsFixer\Config as BaseConfig;

class Config extends BaseConfig {

    public function __construct() {
        parent::__construct('coding-standard');
        $this->setRiskyAllowed(true);
        $this->setLineEnding("\n");
    }

    public function getRules(): array {
        return [
            '@PhpCsFixer' => true,
            'array_syntax' => [
                'syntax' => 'short'
            ],
            'blank_line_after_opening_tag' => false,
            'declare_strict_types' => true,
            'php_unit_internal_class' => false,
            'php_unit_test_class_requires_covers' => false,
            'php_unit_size_class' => false
        ];
    }
}
