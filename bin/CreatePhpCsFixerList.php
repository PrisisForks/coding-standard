<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018-2020 Daniel Bannert
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/narrowspark/coding-standard
 */

use Narrowspark\CS\Config\Config;
use Symfony\Component\VarExporter\VarExporter;

final class CreatePhpCsFixerList
{
    /**
     * Create the php cs fixer rules md file.
     *
     * @throws \Symfony\Component\VarExporter\Exception\ExceptionInterface
     */
    public static function build(): int
    {
        $rules = (new Config())->getRules();

        ksort($rules);

        $content = '```php';
        $content .= VarExporter::export($rules);
        $content .= '```';

        $dir = dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'docs';
        $return = file_put_contents($dir . \DIRECTORY_SEPARATOR . 'PHP-CS-Fixer-Rules-List.md', $content);

        return (int) $return;
    }
}
