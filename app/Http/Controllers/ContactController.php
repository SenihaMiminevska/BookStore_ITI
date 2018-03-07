<?php

namespace App\Http\Controllers;
/*use App\Comment;
use App\Rating;
use App\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use App\Book;*/

use App\AdminContact;
use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Swift_SmtpTransport;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact_us');
    }

    /**
     * @param ContactFormRequest $message
     * @param AdminContact $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mailToAdmin(Request $request, ContactFormRequest $message, AdminContact $admin)
    {
        $senderName = $request->get('name');
        $senderEmail = $request->get('email');
        $senderMessage = $request->get('message');

        // Create the Transport
        $transport = (new Swift_SmtpTransport(env('MAIL_HOST'), env('MAIL_PORT')))
            ->setUsername( env('MAIL_USERNAME'))
            ->setPassword(env('MAIL_PASSWORD'))
        ;

// Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

// Create a message
        $message = (new \Swift_Message('Subject: Test'))
            ->setFrom([$senderEmail => $senderName])
            ->setTo('bookstore_admin@gmail.com')
            ->setBody($senderMessage)
        ;

// Send the message
        $result = $mailer->send($message);

//        $admin->notify(new InboxMessage($message));

        // redirect the user back
        return redirect()->back()->with('message', 'Thanks for the message! We will get back to you soon!');
    }
}
