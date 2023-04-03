<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function showContactForm()
    {
        return view('pages.contactanos');
    }

    public function submitContactForm(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Enviar el correo electrónico usando los datos del formulario
        Mail::send('emails.contact', [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
        ], function ($message) {
            $message->to('berrio320683@gmail.com
            ', 'Nombre del destinatario')
                ->subject('Mensaje de contacto');
        });

        // Redirigir al usuario a la página de agradecimiento
        return redirect()->route('pages.thankyou');
    }



    public function showThankYouPage()
    {
        return view('thankyou');
    }
}
