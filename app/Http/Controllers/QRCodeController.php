<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\QrCodeGenerate;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function index(): View
    {
        $data['qr_codes'] = QrCodeGenerate::latest()->get();
        return view('stand_manager.qr_code.index', $data);
    }
    public function showForm()
    {
        return view('stand_manager.qr_code.create');
    }

    public function generateFromForm(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $qr = new QrCodeGenerate();
        $qr->url = $request->url;
        $qr->title = $request->title;
        $qr->token = Str::random(40);
        $qr->save();

        $loginRedirectLink = route('secured.url', $qr->token);

        $data['qrCode'] = QrCode::size(300)->generate($loginRedirectLink);
        $data['originalUrl'] = $qr->url;
        return redirect()->route('stand_manager.qr.index', $data);
    }

    public function securedUrl(Request $request, $token)
    {
        if (!Auth::check()) {
            // Store the token in session
            session(['qr_token' => $token]);
            return redirect()->route('redirect.google');
        }

        $qrData = QrCodeGenerate::where('token', $token)->first();

        if ($qrData && $qrData->url) {
            return redirect($qrData->url);
        }

        abort(404, 'QR কোডের লিংক পাওয়া যায়নি।');
    }
    public function bulkQRCodes()
    {
        $qrcodes = QrCodeGenerate::latest()->get();
        return view('backend.qr_form.bulk', compact('qrcodes'));
    }

    // public function download($token)
    // {
    //     $url = route('secured.url', $token);
    //     $image = QrCode::format('png')->size(300)->generate($url);

    //     return response($image)
    //         ->header('Content-Type', 'image/png')
    //         ->header('Content-Disposition', 'attachment; filename="qr-code.png"');
    // }
    public function download($token)
    {
        $url = route('secured.url', $token);

        $image = QrCode::format('png')->size(300)->generate($url);

        return response($image)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="qr-code-' . $token . '.png"');
    }
    public function downloadQR($id)
    {
        $qrRecord = QrCodeGenerate::findOrFail($id);
        $rawSvg = QrCode::size(150)->generate(route('secured.url', $qrRecord->token));
        $cleanSvg = preg_replace('/<\?xml.*?\?>/', '', $rawSvg);

        return response()->json([
            'svg' => $cleanSvg,
            'filename' => 'qr-code-' . $qrRecord->id . '.svg'
        ]);
    }
}
