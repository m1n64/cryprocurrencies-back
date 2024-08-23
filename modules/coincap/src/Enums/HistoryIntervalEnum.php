<?php
declare(strict_types=1);

namespace Modules\Coincap\Enums;

enum HistoryIntervalEnum: string
{
    case MINUTE = 'm1';
    case FIVE_MINUTES = 'm5';
    case FIFTEEN_MINUTES = 'm15';
    case THIRTY_MINUTES = 'm30';
    case HOUR = 'h1';
    case TWO_HOURS = 'h2';
    case SIX_HOURS = 'h6';
    case TWELVE_HOURS = 'h12';
    case DAY = 'd1';
}
