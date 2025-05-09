<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\TareaModel;
use App\Models\SubtareaModel;
use App\Models\UsuarioModel;

class Controlador extends BaseController {
    function index($filtroestado = 'p') {

        $sesion = session();

        if (!$sesion->has('userid')) {
            return view ('Login_Registro/index');
        }

        $tareaM = new TareaModel();
        $subtareaM = new SubtareaModel();

        $tareas = $tareaM
            ->where('iddueño', $sesion->get('userid'))
            ->where('estado', $filtroestado)
            ->orderBy("FIELD(prioridad, 'a', 'm', 'b')", '', false) 
            ->orderBy('fvencimiento', 'ASC') 
            ->findAll();
    
        $prioridad = [
            'b' => 'baja',
            'm' => 'media',
            'a' => 'alta'
        ];
        $color = [
            1 => '#9ac8ff',
            2 => '#96db9d',
            3 => '#ff9c9c',
            4 => '#ffe885',
            5 => '#d29fd6'
        ];

        foreach ($tareas as &$tarea) {
            $tarea['cantsubtareas'] = $subtareaM
                ->where('idtarea', $tarea['id'])
                ->countAllResults();
            $tarea['prioridadtxt'] = $prioridad[$tarea['prioridad']];
            $tarea['colorcod'] = $color[$tarea['color']];
        }

        return view('Pagina_Principal/index', [
            'tareas' => $tareas,
            'estadoactual' => $filtroestado
        ]);
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
        ]);
        //retornar a la pagina
        return redirect()->to(base_url('/'));
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
        ]);
        //retornar a la pagina
        return redirect()->to(base_url('/'));
    }
    public function tarea(){
        $validar = service('validation');
        $validar -> setRules ([
            'titulo' => 'required|min_length[2]',
            'desc' => 'required',
            'fvencimiento' => 'required|check_future_date',
            'frecordatorio' => 'check_future_date|reminder_before_due'
            ] , [
            'titulo' => ['required' => 'El titulo es obligatorio',
                        'min_length' => 'El titulo es demasiado corto'] ,
            'desc' => ['required' => 'Añada una descripcion'] ,
            'fvencimiento' => ['required' => 'La fecha de vencimiento es obligatoria',
                        'check_future_date' => 'Fecha no valida'] ,
            'frecordatorio' => ['check_future_date' => 'Fecha invalida',
                                'reminder_before_due' => 'Fecha invalida: no puede ser posterior al vencimiento']
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

        $idtarea = $save_bdd->insertID(); //obtengo el id de la tarea recien creada

        return redirect()->to(base_url('/tareas/ver/'. $idtarea));
    }
    public function subtarea($idtarea){
        $validar = service('validation');
        $validar -> setRules ([
            'sub_titulo' => 'required|min_length[2]',
            'sub_desc' => 'required',
            'sub_fvencimiento' => 'required|check_future_date',
            'sub_frecordatorio' => 'check_future_date|sub_reminder_before_due'
            ] , [
            'sub_titulo' => ['required' => 'El titulo es obligatorio',
                        'min_length' => 'El titulo es demasiado corto'] ,
            'sub_desc' => ['required' => 'Añada una descripcion'] ,
            'sub_fvencimiento' => ['required' => 'La fecha de vencimiento es obligatoria',
                        'check_future_date' => 'Fecha no valida'] ,
            'sub_frecordatorio' => ['check_future_date' => 'Fecha invalida',
                                    'sub_reminder_before_due' => 'Invalida: no puede ser posterior al vencimiento']
            ]);
        if (!$validar -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validar->getErrors());
        }
        
        //guardo en la bdd
        $datos_registro = array('idtarea' =>  $idtarea,
                                'tema' => $this->request->getPost('sub_titulo'), 
                                'descripcion' => $this->request->getPost('sub_desc'), 
                                'prioridad' =>  $this->request->getPost('sub_priori'),
                                'estado' => 'd',
                                'fvencimiento' => $this->request->getPost('sub_fvencimiento'),
                                'frecordatorio' => $this->request->getPost('sub_frecordatorio'),
                                'comentario' => $this->request->getPost('sub_com'));
        $save_bdd = new \App\Models\SubtareaModel();
        $save_bdd -> insert($datos_registro);

        return redirect()->to(base_url('/tareas/ver/'. $idtarea));
    }
    public function ver($id){
        if (!session()->get('userid')) { //control para no entrar sin sesion
            return redirect()->to('/');
        }
        $tareaM = new TareaModel();
        $subtareaM = new SubtareaModel();
        $tarea = $tareaM->find($id);

        if (!$tarea) { //control
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Tarea no encontrada");
        }

        $prioridad = [
            'b' => 'baja',
            'm' => 'media',
            'a' => 'alta'
        ];
        $estado = [ 
            'd' => 'DEFINIDA',
            'p' => 'EN PROCESO',
            'c' => 'COMPLETADA'
        ];
        $color = [
            1 => '#9ac8ff',
            2 => '#96db9d',
            3 => '#ff9c9c',
            4 => '#ffe885',
            5 => '#d29fd6'
        ];
        $tarea['prioridadtxt'] = $prioridad[$tarea['prioridad']];
        $tarea['colorcod'] = $color[$tarea['color']];
        $tarea['estadotxt'] = $estado[$tarea['estado']];

        $subtareas = $subtareaM
                    ->where('idtarea', $id)
                    ->orderBy("FIELD(prioridad, 'a', 'm', 'b')", '', false)
                    ->findAll();

        foreach ($subtareas as &$sub) {
            $sub['prioridadtxt'] = $prioridad[$sub['prioridad']];
        }

        return view('Pagina_Principal/Tareas/ver', [
            'tarea' => $tarea,
            'subtareas' => $subtareas
        ]);
    }

    public function editperfil() {
        $sesion = session();
        $userid = $sesion->get('userid');

        $validar = service('validation');
        $validar -> setRules ([
            'editnombre' => 'required|min_length[3]',
            'editemail' => "required|valid_email|is_unique[usuarios.email,id,{$userid}]"
            ] , [
            'editnombre' => ['required' => 'El nombre es obligatorio',
                        'min_length' => 'El nombre es demasiado corto'] ,
            'editemail' => ['required' => 'El correo es obligatorio',
                        'valid_email' => 'El correo no es valido',
                        'is_unique' => 'El correo ya existe'] 
            ]);
        if (!$validar -> withRequest($this->request) -> run()) {
            return redirect() -> back() -> withInput() -> with('errors',$validar->getErrors());
        }

        $usuarioM = new \App\Models\UsuarioModel();
        $usuarioM->update($userid, [
            'nombre' => $this->request->getPost('editnombre'),
            'email' => $this->request->getPost('editemail'),
            'icono' => $this->request->getPost('editIcon')
        ]);

        // actualizar sesion
        $sesion->set('usernombre', $this->request->getPost('editnombre'));
        $sesion->set('useremail', $this->request->getPost('editemail'));
        $sesion->set('usericon', $this->request->getPost('editIcon'));

        return redirect()->back()->with('success', 'Perfil actualizado');
    }

    public function actestado($id) {
        $subM = new \App\Models\SubtareaModel();
        $tareaM = new \App\Models\TareaModel();

        $subtarea = $subM->find($id);
        // if (!$subtarea) {
        //     return redirect()->back()->with('error', 'Subtarea no encontrada');
        // }

        $nuevoEstado = $this->request->getPost('estado'.$id) === 'c' ? 'c' : 'd';
        $subM->update($id, ['estado' => $nuevoEstado]);

        $idtarea = $this->request->getPost('idtarea');
        $total = $subM->where('idtarea', $idtarea)->countAllResults();
        $completadas = $subM->where('idtarea', $idtarea)->where('estado', 'c')->countAllResults();

        if ($completadas === 0) {
            $nuevoEstadoTarea = 'd'; //definida
        } elseif ($completadas === $total) {
            $nuevoEstadoTarea = 'c'; //completada
        } else {
            $nuevoEstadoTarea = 'p'; //en proceso
        }

        $tareaM->update($idtarea, ['estado' => $nuevoEstadoTarea]);

        return redirect()->to(base_url('tareas/ver/' . $idtarea));
    }
    public function filtrarestado($estado = 'p') {
        if (!session()->get('userid')) {
            return redirect()->to('/');
        }

        $tareaM = new \App\Models\TareaModel();

        $tareas = $tareaM
            ->where('userid', session()->get('userid'))
            ->where('estado', $estado)
            ->findAll();

        $estadotxt = [
            'd' => 'definido',
            'p' => 'en proceso',
            'c' => 'completado'
        ];

        return view('Pagina_Principal/index', [
            'tareas' => $tareas,
            'estadoactual' => $estadotxt[$estado] ?? 'en proceso'
        ]);

    }
    public function ordenar ($estado, $orden) {
        $sesion = session();
        if (!$sesion->has('userid')) {
            return redirect()->to('/');
        }

        $tareaM = new TareaModel();
        $subtareaM = new SubtareaModel();

        $query = $tareaM->where('iddueño', $sesion->get('userid'))
                        ->where('estado', $estado);

        switch ($orden) {
            case 'antiguos':
                $query->orderBy('fvencimiento', 'ASC');
                break;
            case 'prioridadalta':
                $query->orderBy("FIELD(prioridad, 'a', 'm', 'b')", '', false);
                break;
            case 'prioridadbaja':
                $query->orderBy("FIELD(prioridad, 'b', 'm', 'a')", '', false);
                break;
            case 'recientes':
                $query->orderBy('fvencimiento', 'DESC');
                break;
        }

        $tareas = $query->findAll();

        $prioridad = ['b' => 'baja', 'm' => 'media', 'a' => 'alta'];
        $color = [1 => '#9ac8ff', 2 => '#96db9d', 3 => '#ff9c9c', 4 => '#ffe885', 5 => '#d29fd6'];

        foreach ($tareas as &$tarea) {
            $tarea['cantsubtareas'] = $subtareaM->where('idtarea', $tarea['id'])->countAllResults();
            $tarea['prioridadtxt'] = $prioridad[$tarea['prioridad']];
            $tarea['colorcod'] = $color[$tarea['color']];
        }

        return view('Pagina_Principal/index', [
            'tareas' => $tareas,
            'estadoactual' => $estado,
            'ordenactual' => $orden
        ]);
    }

    function get_index() {
        return view('Pagina_Principal/index');
    }
    function get_crear_tarea() {
        return view('Pagina_Principal/Tareas/form_crear.php');
    }
    function get_perfil(){
        $sesion = session();
        $userid = $sesion->get('userid');

        $tareaM = new \App\Models\TareaModel();
        $userM = new \App\Models\UsuarioModel();
        $tareas_creadas = $tareaM->where('iddueño', $userid)->countAllResults();
        $tareas_terminadas = $tareaM->where(['iddueño' => $userid, 'estado' => 'c'])->countAllResults();
    
        return view('Pagina_Principal/Perfil/index', [
            'tareas_creadas' => $tareas_creadas,
            'tareas_terminadas' => $tareas_terminadas,
            'user_datos' => ['nombre' => $sesion->get('usernombre') , 'email' => $sesion->get('useremail'), 'icono' => $sesion->get('usericon')]
        ]);

    }

    public function cerrar_sesion() {
        $sesion = session();
        $sesion->destroy();
        return redirect()->to(base_url('/'));
    }
}

?>