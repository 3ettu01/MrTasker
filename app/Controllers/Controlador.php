<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Controlador extends BaseController {
    function index() {

        return view ('Login_Registro/index');
    }
    public function __construct() {
        helper('form');
    }
    public function login(){
        $validar = service('validation'); //llamo al servicio de validacion
        $validar -> setRules ([
            'email' => 'required',
            'pass' => 'required' ] , [
            'email' => ['required' => 'El correo es obligatorio'] ,
            'pass' => ['required' => 'La contraseña es obligatoria']
        ]);
        if (!$validar -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validar->getErrors());
        }
        //control de email y pass
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('pass');

        $bdd = new \App\Models\UsuarioModel();

        $user = $bdd->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('errors', ['email' => 'El email no esta registrado']);
        }

        if (!password_verify($pass, $user['contrasena'])) {
            return redirect()->back()->with('errors', ['pass' => 'Contraseña incorrecta']);
        }
        //inicia la sesion
        $session = session();
        $session->set([
            'userid' => $user['id'],
            'usernombre' => $user['nombre'],
            'useremail' => $user['email'],
            'usericon' => $user['icono'],
            'logged' => true,
        ]);
        //retornar a la pagina
        return redirect()->to(base_url('/Tareas'));
    }
    public function registro(){
        $validar = service('validation');
        $validar -> setRules ([
            'nombre' => 'required|min_length[3]',
            'emailr' => 'required|valid_email|is_unique[usuarios.email]',
            'pass1' => 'required|min_length[8]',
            'pass2' => 'matches[pass1]' ] , [
            'nombre' => ['required' => 'El nombre es obligatorio',
                        'min_length' => 'El nombre es demasiado corto'] ,
            'emailr' => ['required' => 'El correo es obligatorio',
                        'valid_email' => 'El correo no es valido',
                        'is_unique' => 'El correo ya existe'] ,
            'pass1' => ['required' => 'La contraseña es obligatoria' ,
                        'min_length' => 'La contraseña debe tener minimo 8 caracteres'],
            'pass2' => ['matches' => 'Las contraseñas no coinciden'],
        ]);
        if (!$validar -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validar->getErrors());
        }
        //obtener datos
        $datos_registro = array('nombre' => $this->request->getPost('nombre'), 
                                'email' => $this->request->getPost('emailr'), 
                                'contrasena' =>  password_hash($this->request->getPost('pass1'), PASSWORD_DEFAULT),
                                'icono' => $this->request->getPost('catIcon'));
        $save_bdd = new \App\Models\UsuarioModel();
        $save_bdd -> insert($datos_registro);

        //guardar la sesion
        $correo = $this->request->getPost('emailr');
        $user = $save_bdd->where('email',$correo)->first();
        $session = session();
        $session->set([
            'userid' => $user['id'],
            'usernombre' => $user['nombre'],
            'useremail' => $user['email'],
            'usericon' => $user['icono'],
            'logged' => true,
        ]);
        //retornar a la pagina
        return redirect()->to(base_url('/Tareas'));
    }
    public function tarea(){
        $validar = service('validation');
        $validar -> setRules ([
            'titulo' => 'required|min_length[2]',
            'desc' => 'required',
            'fvencimiento' => 'required' //fecha valida??? 
            ] , [
            'titulo' => ['required' => 'El titulo es obligatorio',
                        'min_length' => 'El titulo es demasiado corto'] ,
            'desc' => ['required' => 'Añada una descripcion'] ,
            'fvencimiento' => ['required' => 'La fecha de vencimiento es obligatoria']
        ]);
        if (!$validar -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validar->getErrors());
        }
        //traduzco el color al numero
        $colorseleccionado = $this->request->getPost('color_tarea');
        $colores = [
            '#9ac8ff' => 1,  
            '#96db9d' => 2,  
            '#ff9c9c' => 3,  
            '#ffe885' => 4,  
            '#d29fd6' => 5   
        ];
        $numeroColor = $colores[$colorseleccionado];

        //guardo en la bdd
        $sesion = session();
        $datos_registro = array('iddueño' => $sesion->get('userid'),
                                'tema' => $this->request->getPost('titulo'), 
                                'descripcion' => $this->request->getPost('desc'), 
                                'prioridad' =>  $this->request->getPost('priori'),
                                'estado' => 'd',
                                'fvencimiento' => $this->request->getPost('fvencimiento'),
                                'frecordatorio' => $this->request->getPost('frecordatorio'),
                                'color' => $numeroColor);
        $save_bdd = new \App\Models\TareaModel();
        $save_bdd -> insert($datos_registro);

        return redirect()->to(base_url('/Tareas'));
    }

    function get_index() {
        return view('Pagina_Principal/index');
    }
    function get_crear_tarea() {
        return view('Pagina_Principal/Tareas/form_crear.php');
    }
    function get_perfil() {
        return view('Pagina_Principal/Perfil/index.php');
    }

    public function cerrar_sesion() {
        $sesion = session();
        $sesion->destroy();
        return redirect()->to(base_url('/'));
    }
}

?>