<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Color\Hex;



class QrController extends Controller
{
    public function index()
    {
        // $code= QrCode::generate('Make me into a QrCode!');
        // return view('qr_code.qr_builder', compact('code'));
        return view('qr_code.qr_builder');
    }
    public function do_qr_builder(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'body' => 'required'
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // return $request->all();
        $name = $request->input('name');
        $qr_img_type = $request->input('qr-img-type') ?? 'png';
        $code = Str::slug($name) . '.' . $qr_img_type;
        $body = $request->input('body');

        $qr_size = $request->input('qr-size') ?? '300';
        $qr_correction = $request->input('qr-correction') ?? 'H';
        $qr_encoding = $request->input('qr-encoding') ?? 'UTF-8';
        $qr_eye = $request->input('qr-eye') ?? 'square';

        $qr_margin = $request->input('qr-margin') ?? 0;
        $qr_style = $request->input('qr-style') ?? 'square';
        $qr_color = Hex::fromString($request->input('qr-color') ?? '#000000')->toRgb();
        $qr_background_color = Hex::fromString($request->input('qr-background-color') ?? '#FFFFFF')->toRgb();
        $qr_background_transparent = $request->input('qr-background-transparent') ?? 0;

        $qr_eye_color_inner_0 = Hex::fromString($request->input('qr-eye-color-inner-0') ?? '#000000')->toRgb();
        $qr_eye_color_outer_0 = Hex::fromString($request->input('qr-eye-color-outer-0') ?? '#000000')->toRgb();
        $qr_eye_color_inner_1 = Hex::fromString($request->input('qr-eye-color-inner-1') ?? '#000000')->toRgb();
        $qr_eye_color_outer_1 = Hex::fromString($request->input('qr-eye-color-outer-1') ?? '#000000')->toRgb();

        $qr_eye_color_inner_2 = Hex::fromString($request->input('qr-eye-color-inner-2') ?? '#000000')->toRgb();
        $qr_eye_color_outer_2 = Hex::fromString($request->input('qr-eye-color-outer-2') ?? '#000000')->toRgb();

        $qr_gradient_start = Hex::fromString($request->input('qr-gradient-start') ?? '#000000')->toRgb();
        $qr_gradient_end = Hex::fromString($request->input('qr-gradient-end') ?? '#000000')->toRgb();
        $qr_gradient_type = $request->input('qr-gradient-type') ??  'vertical';

        $qr_attachment = $request->input('qr-attachment') ??  'no';


        // $qr= QrCode::format('png')->generate($body , '../public/QR Code'.$code);
        $qr = QrCode::format($qr_img_type);
        $qr->size($qr_size);
        $qr->errorCorrection($qr_correction);
        $qr->encoding($qr_encoding);
        $qr->eye($qr_eye);
        $qr->margin($qr_margin);
        $qr->style($qr_style);
        $qr->color(
            $qr_color->red(),
            $qr_color->green(),
            $qr_color->blue()
        );
        $qr->backgroundColor(
            $qr_background_color->red(),
            $qr_background_color->green(),
            $qr_background_color->blue(),
            $qr_background_transparent
        );
        $qr->eyeColor(
            0,
            $qr_eye_color_inner_0->red(),
            $qr_eye_color_inner_0->green(),
            $qr_eye_color_inner_0->blue(),

            $qr_eye_color_outer_0->red(),
            $qr_eye_color_outer_0->green(),
            $qr_eye_color_outer_0->blue()
        );
        $qr->eyeColor(
            1,
            $qr_eye_color_inner_1->red(),
            $qr_eye_color_inner_1->green(),
            $qr_eye_color_inner_1->blue(),

            $qr_eye_color_outer_1->red(),
            $qr_eye_color_outer_1->green(),
            $qr_eye_color_outer_1->blue()
        );
        $qr->eyeColor(
            2,
            $qr_eye_color_inner_2->red(),
            $qr_eye_color_inner_2->green(),
            $qr_eye_color_inner_2->blue(),

            $qr_eye_color_outer_2->red(),
            $qr_eye_color_outer_2->green(),
            $qr_eye_color_outer_2->blue()
        );
        $qr->gradient(
            $qr_gradient_start->red(),
            $qr_gradient_start->green(),
            $qr_gradient_start->blue(),

            $qr_gradient_end->red(),
            $qr_gradient_end->green(),
            $qr_gradient_end->blue(),

            $qr_gradient_type
        );

        if ($qr_attachment == 'yes') {
            $qr->merge('../public/aleaqrab.png/', .2, true)->generate();
        }


        // must be in the end of code to generate all options
        $qr->generate(
            $body,
            '../public/QRCode/' . $code
        );




        return back()->with([
            'status' => 'QR Code generated successfuly',
            'code' => $code
        ]);
    }
    public function phone()
    {
        return view('qr_code.qr_phone');
    }
    public function email()
    {
        return view('qr_code.qr_email');
    }
    public function geo()
    {
        return view('qr_code.qr_geo');
    }
    public function sms()
    {
        return view('qr_code.qr_sms');
    }
}
