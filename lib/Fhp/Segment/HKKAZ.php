<?php

namespace Fhp\Segment;

use Fhp\DataTypes\Dat;

/**
 * Class HKKAZ (Kontoumsätze anfordern/Zeitraum)
 * Segment type: Geschäftsvorfall
 *
 * @link: http://www.hbci-zka.de/dokumente/spezifikation_deutsch/fintsv3/FinTS_3.0_Messages_Geschaeftsvorfaelle_2015-08-07_final_version.pdf
 * Section: C.2.1.1.1.2
 */
class HKKAZ extends AbstractSegment
{
    const NAME = 'HKKAZ';
    const ALL_ACCOUNTS_N = 'N';
    const ALL_ACCOUNTS_Y = 'J';

    /**
     * HKKAZ constructor.
     * @param mixed $ktv
     */
    public function __construct(
        int $version,
        int $segmentNumber,
        $ktv,
        $allAccounts,
        \DateTime $from,
        \DateTime $to,
        ?string $touchdown = null
    ) {
        parent::__construct(
            static::NAME,
            $segmentNumber,
            $version,
            [
                $ktv,
                $allAccounts,
                new Dat($from),
                new Dat($to),
                null,
                $touchdown,
            ]
        );
    }

    public function getName(): string
    {
        return static::NAME;
    }
}
