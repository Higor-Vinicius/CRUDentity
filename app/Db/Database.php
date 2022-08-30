<?php

namespace App\Db;
use \PDO;
use \PDOException;

define('HOST','localhost'); 
define('DATABASENAME','crud');
define('USER','root');
define('PASSWORD','root');

class Database{
    /**
     * Abaixo o table vai ser a tabale que posso ou não passar para manipular
     */
    private $table;
    protected $connection;

    /**DEFINE A INSTANCIA DA CONEXÂO */
   public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnectDatabase();
    }
    private function setConnectDatabase(){
        try
        {
            $this->connection = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
    /**
     * Metodo responsavel para executar as query
     */
    public function execute($query,$params = []){
        try {
           $statement = $this->connection->prepare($query);
           $statement->execute($params);
           return $statement;

        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    
        /**
 * Metodo REsponsavel para inserir valores no banco
 */
    public function insert($values){
        //dados da query
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        //monta query
        $query = 'insert into '.$this->table.' ('.implode(',',$fields).') values ('.implode(',',$binds).');';


        $this->execute($query,array_values($values));

        //retorna o ID INSERIDO
        return $this->connection->lastInsertId();
        }


        /**
         * @return PDOSTATEMENT
         */
        public function select($where = null, $order = null,$limit = null, $fields = '*'){
            $where = strlen($where) ? 'WHERE '.$where : '';
            $order = strlen($order) ? 'ORDER BY '.$order : '';
            $limit = strlen($limit) ? 'LIMIT '.$limit : '';
            
            //MONTAR QUERY
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.''.$limit;
            
            return $this->execute($query);
        }

        public function update ($where, $values){
            //DADOS DA QUERY
            $fields = array_keys($values);

            //MONTA A QUERY
            $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? where '.$where;
            $this->execute($query,array_values(($values)));
            return true;
        }

        
        public function delete ($where){
            
            $query = 'delete from '.$this->table.' WHERE '.$where;
            $this->execute($query);
            return true;
        }
} 
 


?>