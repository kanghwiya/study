<?php

namespace App\Exceptions;

use Exception;

class MyDBException extends Exception
{
    /**
     * 
     */

    public function context() {
        return [
            'E80' => ['status' => 500, 'msg' => 'DB 에러']
        ];
    }
}
