<?php
namespace App\Entity;

use App\Db\Database;
use PDO;


class Vaga{

    /**
     * 
     */
    public $id;
    public $titulo;
    public $descricao;
    public $status;
    public $data;

    public function cadastrar(){
        //definir a data
        $this->data = date('Y-m-d H:i:s');

        //inserir a vaga no banco
        $database = new Database('vagas');

       $this->id = $database->insert([
                                        'titulo' => $this->titulo,
                                        'descricao' => $this->descricao,
                                        'status' => $this->status,
                                        'data' => $this->data
        ]);    
        header('location: index.php?status=sucess');
        //retornar sucesso
    }

        /**
         * Nessa parte é atualizado os dados do banco
         */
    public function atualizar(){
            return (new Database('vagas'))->update('id = '.$this->id,[
                                                                'titulo'     => $this->titulo,
                                                                'descricao'  => $this->descricao,
                                                                'status'     => $this->status,
                                                                'data'       => $this->data
                                                                ]);
    }


    /**
     * Metodo responsavel para obter as litagem de vagas
     * @return array
     */
    public static function getVagas($where = null, $limit = null,$order = null){
        return (new Database('vagas'))->select($where,$order,$limit)
                                                    ->fetchAll(PDO::FETCH_CLASS,self::class);


                                            
    }

    public static function getVaga($id){
        return (new Database('vagas'))->select(' id = '.$id)
                                              ->fetchObject(self::class);
    }

    public function excluir(){
        return (new Database('vagas'))->delete('id = '.$this->id);
    }
}

