<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use LaravelCaptcha\Integration\BotDetectCaptcha;
use PHPMailer;
use Symfony\Component\HttpFoundation\Response;
use function flash;
use function redirect;
use function view;

class WelcomeController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Welcome Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders the "marketing page" for the application and
      | is configured to only allow guests. Like most of the other sample
      | controllers, you are free to modify or remove it as you desire.
      |
     */

    
    private $mail;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PHPMailer $mail) {
         
        
        $this->mail = $mail;
    }

    /**
     * Show the application welcome screen to the user.
     *  
     * @return Response
     */
    public function index() {
        $imagenes = scandir('C:\xampp\htdocs\dev.eusalud\public\img\clientes'); 
        return view('welcome.inicio', compact('imagenes'));
    }

    public function about_us() {
        return view('welcome.about');
    }

    public function sede_traumatologia() {
        return view('welcome.sede_traumatologia');
    }

    public function sede_materno_infantil() {
        return view('welcome.sede_materno_infantil');
    }

    public function sede_pacientes_cronicos() {
        return view('welcome.sede_pacientes_cronicos');
    }

    public function vacantes() {
        return view('welcome.vacantes');
    }
    
    /*
     * Obtiene una instancia de captcha
     * @return captcha
     */
    private function getCaptchaInstance() {
      // Captcha parameters
      $captchaConfig = [
        'CaptchaId'             => 'ExampleCaptcha',    // a unique Id for the Captcha instance
        'UserInputId'           => 'CaptchaCode'       // Id of the Captcha code input textbox                                                 
        //'CaptchaConfigFilePath' => 'captchaConfig\CaptchaConfig.php',
      ];
      $captcha = BotDetectCaptcha::GetCaptchaInstance($captchaConfig);

      return $captcha;
    }

    /*
     * Muestra el formulario de contacto
     */
    public function contacto() {
        $captcha = $this->getCaptchaInstance();
        return view('welcome.contacto', ['captchaHtml' => $captcha->Html()]);
    }

    public function sendMsg() {
        if (count($_POST) > 0) {
            $captcha = $this->getCaptchaInstance();
            $code = Request::input('CaptchaCode');
            $isHuman = $captcha->Validate($code);
            if( $isHuman ){        
                $data = array(
                        'name' => Input::get('name'),
                        'email' => Input::get('email'),
                        'to' => Input::get('departamento'),
                        'subject' => Input::get('asunto'),
                        'message' => Input::get('mensaje')
                    );

                $fromEmail = $data['email'];
                $fromName = $data['name'];
                $to = $data['to'];
                $subject = $data['subject'];

                $this->mail->isSMTP();                                      // Set mailer to use SMTP
                $this->mail->Host = 'mail.eusalud.com';                     // Specify main and backup SMTP servers
                $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
                $this->mail->Username = 'pablo.ledesma@eusalud.com';                 // SMTP username
                $this->mail->Password = '1231PClo$@';                           // SMTP password
                $this->mail->isHTML(true);

                $this->mail->From = $fromEmail;
                $this->mail->FromName = $fromName;
                $this->mail->addAddress('pabloledes83@gmail.com', 'Pablo Ledesma');     // Add a recipient

                $this->mail->Subject = $subject;
                $html = view('emails.msj_contacto', compact('data'))->render();
                $this->mail->Body = $html;
                $this->mail->AltBody = $data['message'];

                if (!$this->mail->send()) {
                    $msg = "Message could not be sent.<br>";
                    $msg .= 'Mailer Error: ' . $this->mail->ErrorInfo;
                    flash()->error($msg);
                    return redirect('inicio');
                } else {
                    flash()->success("El mensaje se ha enviado correctamente.\nEn el menor tiempo posible nos pondremos en contacto con usted.");
                    return redirect('inicio');
                }
            } else {
                flash()->error("Por Favor verifique el código captcha.");
                return redirect('contacto');
            }
            
//            if( Mail::send('emails.msj_contacto', compact('data'), function($mensaje) use ($fromName, $to, $fromEmail, $subject) {
//                $mensaje->to($to, $fromName)
//                        ->from('pabloledes83@gmail.com', $fromName)
//                        ->subject($subject);                 
//            }) == 0 ){
//                return Mail::failures();
//            }
//    
//            flash()->success("El mensaje se ha enviado correctamente.\nEn el menor tiempo posible nos pondremos en contacto con usted.");
//            return redirect('inicio');
        } 
        
    }

    public function galeria() {
        return view('welcome.galeria');
    }

}
