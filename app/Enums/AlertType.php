<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Bootstrap alert classes
 * @method static static SUCCESS()
 * @method static static ERROR()
 */
final class AlertType extends Enum
{
    const SUCCESS = 'success';
    const ERROR = 'danger';


}
