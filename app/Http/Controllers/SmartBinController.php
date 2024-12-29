<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SmartBinController extends Controller
{
    public function activateSensor()
    {
        $response = ['status' => 'failed', 'points' => 0, 'message' => ''];

        // URL Wemos (ganti dengan alamat IP Wemos kamu)
        $wemosUrl = 'http://192.168.37.66/activateSensor'; // Pastikan ini adalah alamat yang benar

        try {
            // Kirim request untuk mengaktifkan sensor
            $sensorResponse = Http::get($wemosUrl);

            if ($sensorResponse->successful()) {
                $data = $sensorResponse->json();

                if (isset($data['object_detected']) && $data['object_detected']) {
                    /** @var User $user */
                    $user = Auth::user();
                    $user->points += 5; // Tambahkan 5 poin jika objek terdeteksi
                    $user->save();

                    $response['status'] = 'success';
                    $response['points'] = 5;
                    $response['message'] = 'Object detected. Points awarded!';
                } else {
                    $response['message'] = 'No object detected.';
                }
            } else {
                $response['message'] = 'Failed to connect to Wemos.';
            }
        } catch (\Exception $e) {
            $response['message'] = 'Error: ' . $e->getMessage();
        }

        return redirect()->route('dashboard')->with('status', $response['message']);
    }
}
