<?php

namespace App\Exceptions;

use Exception;
use Log;

class HackerException extends Exception
{

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report()
    {
        Log::critical('Hack try to login');
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return response()->json([ 'messages' => 'Hacker. You are not lucky' ]);
    }
}
