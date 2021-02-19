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

use Susina\CodingStandard\Config;

class ConfigTest extends TestCase
{
    public function testConfig(): void
    {
        $expected = [
            '@PSR12' => true,
            'declare_strict_types' => true,
            'linebreak_after_opening_tag' => false,
            'blank_line_after_opening_tag' => false,
            'php_unit_internal_class' => false,
            'php_unit_test_class_requires_covers' => false,
            'php_unit_size_class' => false,
            'concat_space' => [
                'spacing' => 'one'
            ],
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'binary_operator_spaces' => [
                'operators' => ['|' => null]
            ]
        ];

        $config = new Config();

        $this->assertEquals($expected, $config->getRules());
    }
}
