<?php

namespace Fhp\Segment;

use Fhp\Syntax\Parser;

class Segment extends AbstractSegment
{
    /**
     * @return BaseSegment|AbstractSegment
     */
    public static function createFromString(string $string)
    {
        return Parser::detectAndParseSegment($string);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->type;
    }
}
