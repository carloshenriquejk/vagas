<?php

namespace App\session;

class Login
{

    /**
     * metodo respomsavel por verificar se o usuario está  logado 
     * @return boolean
     */
    public static function isLogged()
    {
        return false;
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