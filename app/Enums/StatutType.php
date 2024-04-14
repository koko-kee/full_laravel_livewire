<?php

namespace App\Enums;


enum StatutType : string
{
    case STARTED = 'started';

    case  IN_PROGESS = 'in_progress';

    case DONE = 'done';

    public function color():string
    {
        return match ($this){
            self::STARTED => 'border-blue-500',
            self::IN_PROGESS => 'border-yellow-500',
            self::DONE => 'border-green-500'
        };
    }

}



?>
