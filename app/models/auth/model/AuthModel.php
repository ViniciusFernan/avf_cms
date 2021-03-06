<?php

/**
 * @package Sistema distribuido em modulos
 * @author AVF-WEB
 * @version 1.0
 * */

require_once APP . "/models/auth/dao/AuthDAO.php";
require_once APP . "/models/usuario/factory/UsuarioFactory.php";
require_once APP . "/models/usuario/dao/UsuarioDAO.php";

class AuthModel
{

    public function logar($email, $senha)
    {
        try {
            //Valida se o email foi preenchido e se é um email valido
            if (empty($email) || !Util::Email($email)) throw new Exception("Email Inválido");

            //Valida se a senha foi preenchida e se tem pelomenos 5 caracteres
            if (empty($senha) || strlen($senha) < 5) throw new Exception("Preencha a senha corretamente");

            //Seta os falores dos atributos
            $this->email = strtolower($email);
            $this->senha = Util::encriptaSenha($senha);

            // Apaga a sessao de usuario caso exista
            $_SESSION['usuario'] = [];
            unset($_SESSION['usuario']);

            $usuario = (new UsuarioFactory);
            $usuario->setEmail(strtolower($email));
            $usuario->setSenha(Util::encriptaSenha($senha));

            $loginResult = (new UsuarioDAO())->getUsuarioFromEmailSenha($usuario);
            if ($loginResult instanceof Exception) throw $loginResult;

            if (!empty($loginResult) && is_string($loginResult))
                throw new Exception($loginResult);
            if (empty($loginResult))
                throw new Exception("Usuario não encontrado");

            $_SESSION['usuario'] = serialize($loginResult);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Mata a sessão de Usuário e Redireciona para a página de auth
     * @param Boolean $redirectLogin - true para redirecionar para auth
     */
    public function deslogar()
    {
        //apaga a sessao de usuario
        $_SESSION['usuario'] = [];
        unset($_SESSION['usuario']);
        Util::redirect(HOME_URI."/auth");
    }

}