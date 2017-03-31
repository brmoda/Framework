<?php
/**
 * Skytells PHP Framework --------------------------------------------------*
 * @category   Web Development ( Programming )
 * @package    Skytells PHP Framework
 * @version 2.2.0
 * @license Freeware
 * @copyright  2007-2017 Skytells, Inc. All rights reserved.
 * @license    https://www.skytells.net/us/terms  Freeware.
 * @author Dr. Hazem Ali ( fb.com/Haz4m )
 * @see The Framework's changelog to be always up to date.
 */
Namespace Skytells\Libraries\Validation;
Class JsonpCallbackValidator
{
    private static $regexp = '/^[a-zA-Z_$][0-9a-zA-Z_$]*(?:\[(?:"(?:\\\.|[^"\\\])*"|\'(?:\\\.|[^\'\\\])*\'|\d+)\])*?$/';

    private static $reservedKeywords = array(
        'break',
        'do',
        'instanceof',
        'typeof',
        'case',
        'else',
        'new',
        'var',
        'catch',
        'finally',
        'return',
        'void',
        'continue',
        'for',
        'switch',
        'while',
        'debugger',
        'function',
        'this',
        'with',
        'default',
        'if',
        'throw',
        'delete',
        'in',
        'try',
        'class',
        'enum',
        'extends',
        'super',
        'const',
        'export',
        'import',
        'implements',
        'let',
        'private',
        'public',
        'yield',
        'interface',
        'package',
        'protected',
        'static',
        'null',
        'true',
        'false',
    );

    /**
     * @param  string  $callback
     * @return boolean
     */
    public static function validate($callback)
    {
        foreach (explode('.', $callback) as $identifier) {
            if (!preg_match(self::$regexp, $identifier)) {
                return false;
            }

            if (in_array($identifier, self::$reservedKeywords)) {
                return false;
            }
        }

        return true;
    }
}
