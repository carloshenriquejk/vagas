<?php

namespace App\session;

use App\Entity\Usuario;

class Login
{

    /**
     * metodo respomsavel poriniciar a sessão
     */
    public static function init()
    {
        //verifica o status da sessão
        if (session_status() !== PHP_SESSION_ACTIVE) {
            //inicia a sessão
            session_start();
        }
    }

    /**
     * metodo respomsavel por criar a sesão do usuario
     * @param Usuario $ obUsuarios
     */
    public static function login($obUsuario)
    {
        ///inicia a sessão 
        self::init();

        //sessão de usuario
        $_SESSION['usuario'] = [
            'id' => $obUsuario->id,
            'nome' => $obUsuario->nome,
            'email' => $obUsuario->email
        ];
        //redireciona o usuario para a index
        header('location: index.php');
        exit;
    }



    /**
     * metodo respomsavel por deslogar o usuario

     */
    public static function logout()
    {
        ///inicia a sessão 
        self::init();

        //remove a sessão de usuario
        unset($_SESSION['usuario']);
        //redireciona o usuario para o login
        header('location: login.php');
        exit;
    }


    public static function getUsuarioLogado()
    {
        //inicia a sessão
        self::init();

        //retorna os dados do usuariop
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }


    /**
     * metodo respomsavel por verificar se o usuario está  logado 
     * @return boolean
     */
    public static function isLogged()
    {
        ///inicia a sessão 
        self::init();
        //validação da sessão
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * metodo respomsavelpor verificar se o usuario está  logado  para acessar
     */
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            header('location: login.php');
            exit;
        }
    }

    /**
     * metodo respomsavelpor verificar se o usuario está  deslogado  para acessar
     */
    public static function requireLogout()
    {
        if (self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}