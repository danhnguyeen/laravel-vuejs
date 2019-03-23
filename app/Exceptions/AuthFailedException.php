<?php

namespace CMSTutorial\Exceptions;

use Exception;

class AuthFailedException extends Exception
{

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return response()->json([
          'message' => 'These credentials do not match our records.',
        ], 422);
    }
}
