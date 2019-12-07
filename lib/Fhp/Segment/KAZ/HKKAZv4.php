<?php /** @noinspection PhpUnused */

namespace Fhp\Segment\KAZ;

use Fhp\Segment\BaseSegment;

/**
 * Segment: Kontoumsätze anfordern/Zeitraum (Version 4)
 *
 * @link https://www.hbci-zka.de/dokumente/spezifikation_deutsch/archiv/HBCI_V2.x_FV.zip
 * File: Gesamtdok_HBCI210.pdf
 * Section: VII.2.1.1 a)
 */
class HKKAZv4 extends BaseSegment
{
    /** @var \Fhp\Segment\Common\Kto */
    public $kontoverbindungAuftraggeber;
    /** @var string|null */
    public $kontowaehrung;
    /** @var string|null JJJJMMTT gemäß ISO 8601 */
    public $vonDatum;
    /** @var string|null JJJJMMTT gemäß ISO 8601 */
    public $bisDatum;
    /** @var int|null Only allowed if HIKAZS $eingabeAnzahlEintraegeErlaubt says so. */
    public $maximaleAnzahlEintraege;
    /** @var string|null Max length: 35 */
    public $aufsetzpunkt;

    /**
     * @param \Fhp\Segment\Common\Kto $kto
     * @param \DateTime|null $vonDatum
     * @param \DateTime|null $bisDatum
     * @return HKKAZv4
     */
    public static function create($kto, $vonDatum, $bisDatum)
    {
        $result = HKKAZv4::createEmpty();
        $result->kontoverbindungAuftraggeber = $kto;
        $result->vonDatum = isset($vonDatum) ? $vonDatum->format('Ymd') : null;
        $result->bisDatum = isset($bisDatum) ? $bisDatum->format('Ymd') : null;
        return $result;
    }
}