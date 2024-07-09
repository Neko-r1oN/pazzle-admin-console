<?php

    namespace App\Http\Controllers;

    use App\Http\Resources\MailResource;
    use App\Models\Mail;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class MailController extends Controller
    {
        public function index()
        {

        }

        public function showMailList()
        {
            $mail = Mail::all();
            $response = [
                "detail" => $mail
            ];
            return response()->json(MailResource::collection($mail));

        }
    }
