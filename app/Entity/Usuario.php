<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario
{

    /**
     * identificador unico do usuario
     * @var integer
     */
    public $id;

    /**
     * nome unico do usuario
     * @var string
     */
    public $nome;

    /**
     * E-mail unico do usuario
     * @var string
     */
    public $email;

    /**
     * senha unico do usuario
     * @var string
     */
    public $senha;




    /**
     * metodo responavel por cadastrar um novo usuario
     * @return boolean
     */
    public function cadastrar()
    {
        //database
        $obDatabase = new Database('usuarios');

        //insere um novo usuario
        $this->id = $obDatabase->insert([
            'nome'  => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha

        ]);
        //sucesso
        return true;
    }

    /**
     * metodo responavel por cadastrar um novo usuario
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email)
    {
        return (new Database('usuarios'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}