<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;


class Helpers
{
    public static function beginDumpSQl($sql = '', $qset = '', $open = true)
    {
        if ($open):
            echo "<div class='dump-sql'>";
        endif;
        echo sprintf(
            "<small class='qset'>>> %s</small><small class='sql'>%s</small>",
            $qset,
            $sql
        );
    }
    
    public static function dumpString($sql = '')
    {
        echo sprintf("<small>%s</small>", $sql);
    }
    
    public static function dumpArray($sql = '')
    {
        echo "<small>";
        print_r($sql);
        echo "</small>";
    }
    
    public static function endDumpSql()
    {
        echo "</div>";
    }
}