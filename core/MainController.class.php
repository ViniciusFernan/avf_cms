<?php

/**
 * MainController - Todos os controllers deverão estender essa classe
 *
 * Camada - Controladores ou Controllers
 *
 *
 * @package Sistema distribuido em modulos
 * @author AVF-WEB
 * @version 1.0
 * */
require_once APP . "/models/auth/model/AuthModel.php";
abstract class MainController {

    /**
     * Atribudo define se acesso a area deve ter um auth ativo
     * segue como pagina privada por default
     */
    protected $isLogin = AUTH;


    /**
     * Classe de Manipulação do auth
     * @var AuthModel
     * */
    protected $Login;

    /**
     * Parametros passados por GET
     * @access protected
     */
    protected $parametros = array();

    /**
     * Parametros passados POST
     * @access protected
     */
    protected $parametrosPost = array();

    /**
     * Salva as Permissões do usuario logado
     *
     * <b>Para usar, tem que ser pagina restrita e o usuario deve estar logado</b>
     * @var Array
     */
    protected $permissoes = array();

    /**
     * constructor definindo acesso
     */
    public function __construct() {
        if($this->isLogin==true){
            $this->checkLogado();
        }
    }

    /**
     * Verifica permissao de acesso, caso acesso negado, carrega a pagina de acesso negado
     * @param type $checaPermissoes
     * @param BOOLEAN $ajax - True para barrar o acesso a pagina 404
     * @return boolean
     */
    public function notPermission() {
            $View = new View('PermissaoNegada.view.php');
            $View->showContents();
    }

    public function page404() {
        $View = new View('page404/page404.php');
        $View->showContents();
    }


    public function checkLogado(){
        if(empty($_SESSION['usuario']) || !isset($_SESSION['usuario'])){
            $this->Login = new AuthModel;
            $this->Login->deslogar();
        }
    }

    public function setParametros($parametros) {
        $this->parametros = $parametros;
    }

    public function setParametrosPost($parametrosPost) {
        $this->parametrosPost = $parametrosPost;
    }
}

// class MainController