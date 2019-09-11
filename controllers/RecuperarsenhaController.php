<?php

/**
 * Controller Usuarios Ajax - Responsável pelas requisicoes ajax das paginas de usuarios
 *
 * Camada - Controladores ou Controllers
 *
 * @package AVF-Framework
 * @author AVF
 * @version 1.0.0
 */
require_once ABSPATH . "/models/class/usuario/UsuarioModel.php";

class RecuperarSenhaController extends MainController {

    public function __construct() {
        $this->isLogin= false;
    }

    public function indexAction(){
        $View = new View('cadastro/novasenha.view.php');
        $View->showContents();
    }

    public function criarNovaSenhaAction(){

        $resp=[];
        $post = (!empty($this->parametrosPost) ? $this->parametrosPost : false);

        $user = (new UsuarioModel)->recuperarSenhaDoUsuario($post['email']);

        if(empty($user)){
            $resp['msg'] = 'Erro ao enviar email';
            $resp['tipo'] = 'danger';
        }else if(!empty($user) && $user !=1 ){
            $resp['msg'] = $user;
            $resp['tipo'] = 'danger';
        }else{
            $resp['msg'] = 'Foi enviado para seu email os passos para recuperar sua senha';
            $resp['tipo'] = 'success';
        }

        $View = new View('cadastro/novasenha.view.php');
        $View->addParams('boxMsg', $resp);
        $View->showContents();

    }

}