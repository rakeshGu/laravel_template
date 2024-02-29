<?php

namespace App\Http\Controllers;

use App\Mail\SendgridMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sichikawa\LaravelSendgridDriver\SendGrid; 

class mailController extends Controller
{
    use SendGrid;
    public function sendMail(){
        Mail::to('rakesh@vibhuti.biz')->send(new SendgridMail());
        dd('mail sent');
    }
    public function sendMail2(){
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom(env('MAIL_FROM_ADDRESS'), 'Community Direct');
        $email->setSubject('testing');
        $email->addTo('rakesh@vibhuti.biz');
        $email->addContent("text/html",'testing');
        $sendgrid = new \SendGrid('SENDGRID_API_KEY');
        try {
            $response = $sendgrid->send($email);
            dd($response);
            dd('mail sent');
           return;
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
            return;
        }
    }
}
