<?php

namespace App\Http\Controllers;

use App\Models\UserQuizAttempt;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
  public function index()
    {
        $certificates = UserQuizAttempt::with('user', 'quiz')
            ->where('completed', true)
            ->latest()
            ->paginate(10);

        return view('certificate.index', compact('certificates'));
    }

    public function generate($attemptId)
    {
        $attempt = UserQuizAttempt::with('user', 'quiz')->findOrFail($attemptId);

        $data = [
            'name' => $attempt->user->name,
            'quiz_title' => $attempt->quiz->title,
            'score' => $attempt->score,
            'date' => $attempt->created_at->format('d M, Y'),
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('certificate.template', $data);

        return $pdf->download('certificate-' . $attempt->user->name . '.pdf');
    }
}
