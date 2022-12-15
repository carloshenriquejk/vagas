<?php

namespace App\Entity;

use \App\Db\Database;

class Vaga
{

    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $descricao;

    /**
     * Define se a vaga ativa
     * @var string(s/n)
     */
    public $ativo;

    /**
     * Data de publicação da vaga
     * @var string
     */
    public $data;

    /**
     * publicação da vaga publicação da vaga
     * @return boolean
     */
    public function cadastrar()
    {
        // DEFINIR A DATA
        $this->data = date('y-m-d H:i:s');

        //inserir a vaga no banco de daodos
        $obDatabase = new Database('vagas');
        //atribuir a vaga na instancia
        $this->id = $obDatabase->insert([
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
        ]);


        //retornas sucesso 
        return true;
    }

    /**
     * metodo responsavel por atualizar a vaga
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('vagas'))->update('id =' . $this->id, [
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'ativo'     => $this->ativo,
            'data'      => $this->data
        ]);
    }

    /**
     * metodo responsavel por excluir a vaga
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('vagas'))->delete('id =' . $this->id,);
    }


    /**
     * metodo responsavel por obter as vagas do banco de dados
     * @param string where
     * @param string order
     * @param string limit
     * @return array
     * 
     */
    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new Database('vagas'))->select($where, $order, $limit)
            ->fetchAll(\PDO::FETCH_CLASS, self::class);
    }


    /**
     * metodo responsavel por buscar uma vaga com base em seu id
     * @param integer $id

     * @return vaga
     * 
     */
    public static function getVaga($id)
    {
        return (new Database('vagas'))->select('id =' . $id)
            ->fetchObject(self::class);
    }
}