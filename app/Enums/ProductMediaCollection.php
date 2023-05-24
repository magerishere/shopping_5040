<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static DEFAULT()
 * @method static static MOBILE()
 */
final class ProductMediaCollection extends Enum
{
    const DEFAULT = 'default';
    const MOBILE = 'mobile';
}
