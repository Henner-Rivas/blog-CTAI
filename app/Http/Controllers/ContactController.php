<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function showContactForm()
    {
        return view('pages.contactanos');
    }

    /**
     * funcion que recibe los datos del formulario y los envia al correo
     *
     * @param  mixed $request
     * @return void
     */
    public function submitContactForm(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $mensaje = $request->message;
        $correo = new ContactanosMailable($name, $email, $mensaje, $subject);
        $correo->to('uniontemporal2023@gmail.com');
        $correo->from($request->email, $request->name);
        $correo->subject($request->subject);
        $correo->with('message', $request->message);

        Mail::send($correo);

        return redirect()->back()->with('mensaje', 'El correo electrónico ha sido enviado correctamente.');
    }



    public function showThankYouPage()
    {
        return view('thankyou');
    }
}
