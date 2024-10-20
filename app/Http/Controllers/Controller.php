<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

abstract class Controller
{
    protected function handleException(Exception $e, $customMessage): RedirectResponse
    {
        if (is_array($customMessage)) {
            $customMessage = implode(' ', array_map(function ($error) {
                return is_array($error) ? implode(' ', $error) : $error;
            }, $customMessage));
        }

        Log::error($customMessage, [
            'error_message' => $e->getMessage(),
            'stack_trace' => $e->getTraceAsString(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);

        return redirect()->back()->withErrors(['error' => $customMessage]);
    }
}
