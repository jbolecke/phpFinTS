<?php /** @noinspection PhpUnused */

namespace Fhp\Segment\HNVSK;

use Fhp\Model\TanMode;
use Fhp\Segment\BaseDeg;

/**
 * Class SicherheitsprofilV1
 * Data Element Group: Sicherheitsprofil (Version 1)
 *
 * @link https://www.hbci-zka.de/dokumente/spezifikation_deutsch/fintsv3/FinTS_3.0_Security_Sicherheitsverfahren_HBCI_Rel_20181129_final_version.pdf
 * Section: D
 *
 * @link https://www.hbci-zka.de/dokumente/spezifikation_deutsch/fintsv3/FinTS_3.0_Security_Sicherheitsverfahren_PINTAN_2018-02-23_final_version.pdf
 * Section: B.9.1
 *
 * @package Fhp\Segment\HNVSK
 */
class SicherheitsprofilV1 extends BaseDeg
{
    const VERSION_EIN_SCHRITT_VERFAHREN = 1;
    const VERSION_ZWEI_SCHRITT_VERFAHREN = 2;

    /** @var string Allowed values: "PIN", "RAH" */
    public $sicherheitsverfahren;
    /** @var integer Allowed values: 1, 2 (for "PIN"), 7, 9, 10 (for "RAH") */
    public $versionDesSicherheitsverfahrens;

    /**
     * @param TanMode|null $tanMode Optionally specifies which two-step TAN mode to use, defaults to 999 (single step).
     * @return SicherheitsprofilV1
     */
    public static function createPIN($tanMode)
    {
        $result = new SicherheitsprofilV1();
        $result->sicherheitsverfahren = 'PIN';
        $result->versionDesSicherheitsverfahrens =
            $tanMode === null ? static::VERSION_EIN_SCHRITT_VERFAHREN : static::VERSION_ZWEI_SCHRITT_VERFAHREN;
        return $result;
    }
}