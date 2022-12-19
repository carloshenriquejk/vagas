<?php

namespace App\Db;

class Pagination
{
    /**
     * numero maximo de registros por pagina
     * @var integer
     */
    private $limit;


    /**
     * quantidade total de resultados do banco
     * @var integer
     */
    private $results;

    /**
     * quantidade de paginas
     * @var integer
     */
    private $pages;

    /**
     * pagina atual
     * @var integer
     */
    private $currentPage;



    /**
     * contrutor da classe
     * @var integer $results
     * @var integer $currentPage
     * @var integer $limit
     */
    public function __construct($results, $currentPage = 1, $limit = 10)
    {
        $this->results   = $results;
        $this->limit   = $limit;
        $this->currentPage   = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    //metodo responsavel por calcular a paginação
    private function calculate()
    {
        //calcular o total de paginas 
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        //verificcar de a pagina atual não ecxede o numero de paginas
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;;
    }

    /**
     * metodo rrespomsavel por retornar a clausula limit dosql
     * @return string
     */
    public function getLimit()
    {
        $offset = ($this->limit * ($this->currentPage - 1));
        return $offset . ',' . $this->limit;
    }


    /**
     * metodo rrespomsavel por retornar as opçoes da pagina disppnivel
     */
    public function getPages()
    {

        //NÂO RETORNA PAGINAS
        if ($this->pages == 1) return [];

        //PAGINAS-
        $paginas = [];
        for ($i = 1; $i <= $this->pages; $i++) {
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];
        }
        return $paginas;
    }
}