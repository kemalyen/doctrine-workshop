<?php

declare(strict_types = 1);

namespace Rhino\Order\Enums;

enum OrderStatus: int
{
    case Pending = 0;
    case Paid    = 1;
    case Void    = 2;
    case Failed  = 3;

    public function toString(): string
    {
        return match($this) {
            self::Paid   => 'Paid',
            self::Failed => 'Declined',
            self::Void   => 'Void',
            default      => 'Pending'
        };
    }
 
}