<?php

namespace App\Db;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    /**
     * Host da conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /**
     * nome do banco de dados
     * @var string
     */
    const NAME = 'youtubee';

    /**
     * usuario do banco de dados
     * @var string
     */
    const USER = 'root';

    /**
     * nome da tabela a ser manipulada
     * @var string
     */
    const PASS = '';

    /**
     * nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * instancia de conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Definir a tabela e a instancia da conexão
     * @param string
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }



    /**
     * Metodo responsavel por criar uma conexão com o banco de dados 
     *
     */
    private function setConnection()
    {
        try {

            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR:' . $e->getMessage());
        }
    }

    /**
     * metodo responsavel por executar a query no banco de dados 
     * @param string $query
     * @param array  $params
     * @return PDOStatement 
     */

    private function execute($query, $params = [])
    {
        try {
            $statment = $this->connection->prepare($query);
            $statment->execute($params);
            return $statment;
        } catch (PDOException $e) {
            die('ERROR:' . $e->getMessage());
        }
    }


    /**
     * metodo responsavel por inserir dados no banco de dados 
     * @param array $values []field=> values
     * @return integer ID inserido
     */
    public function insert($values)
    {
        //dados da query
        $fields = array_keys($values);
        $bind = array_pad([], count($fields), '?');

        //MONTAR da query
        $query = 'INSERT INTO ' . $this->table . '(' . implode(',', $fields) . ') VALUES(' . implode(',', $bind) . ')';


        //executa o insert
        $this->execute($query, array_values($values));

        //retorna o id inserido
        return $this->connection->lastInsertId();
    }

    /**
     * metodo responsavel por execultar uma consulta no banco de dados
     * @param string where
     * @param string order
     * @param string limit
     * @return PDOStatement
     * 
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        //DADOS DA QUERY
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        //montar a query
        $query = ' SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit . '';

        return  $this->execute($query);
    }
}