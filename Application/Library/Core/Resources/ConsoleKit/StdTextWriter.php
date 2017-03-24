<?php
/**
 * This file is part of the ConsoleKit package.
 *
 * @copyright (c) 2017 Skytells, Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ConsoleKit;

/***
 * Text writer that writes to stdout or stderr
 */
class StdTextWriter implements TextWriter
{
    public function write($text, $pipe = TextWriter::STDOUT)
    {
        $f = fopen('php://' . $pipe, 'w');
        fwrite($f, $text);
        fclose($f);
    }

    public function writeln($text = '', $pipe = TextWriter::STDOUT)
    {
        $this->write("$text\n", $pipe);
    }
}
