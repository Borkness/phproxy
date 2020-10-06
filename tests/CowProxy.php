<?php

namespace Borkness\Phproxy\Tests;

class CowProxy extends \Borkness\Phproxy\Phproxy
{
    public static function getClassIdentifier()
    {
        return 'cow';
    }
}