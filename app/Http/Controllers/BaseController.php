<?php

namespace App\Http\Controllers;

use App\Enums\AlertType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    public function showAlert(string $message, string $type): void
    {
        if (!AlertType::hasValue($type)) {
            throw new \Error("$type undefined in AlertType");
        };
        Session::flash('session_alert', $message);
        Session::flash('session_alert_type', $type);
    }

    public function showSuccessAlert(string $message): void
    {
        $this->showAlert($message, AlertType::SUCCESS);
    }

    public function showErrorAlert(string $message): void
    {
        $this->showAlert($message, AlertType::ERROR);
    }
}
