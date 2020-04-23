<?php

namespace App\Core\Database;

use PDO;
use Exception;

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo, $logger = null)
    {
        $this->pdo = $pdo;
        $this->logger = ($logger) ? $logger : null;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function get($table, $id)
    {
        $statement = $this->pdo->prepare("select * from {$table} where id = '{$id}'");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
		
    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function remove($table, $id)
    {
        $statement = $this->pdo->prepare("delete from {$table} where id = '{$id}'");
        $statement->execute();
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $parameters = $this->cleanParameterName($parameters);
				$update = [];
				
				foreach (array_keys($parameters) as $key) {
					array_push($update, $key.'=VALUES('.$key.')');
				}
				
        $sql = sprintf(
            'insert into %s (%s) values (%s) ON DUPLICATE KEY UPDATE %s',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters)),
            implode(', ', $update),
        );
				
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
						return $this->pdo->lastInsertId();
        } catch (Exception $e) {
					print_r($e);
            $this->sendToLog($e);
        }
    }
		
    private function sendToLog(Exception $e)
    {
        if ($this->logger) {
            $this->logger->error('Error', ["Error" => $e]);
        }
    }

    /**
     * Limpia guiones - que puedan venir en los nombre de los parametros
     * ya que esto no funciona con PDO
     *
     * Ver: http://php.net/manual/en/pdo.prepared-statements.php#97162
     */
    private function cleanParameterName($parameters)
    {
        $cleaned_params = [];
        foreach ($parameters as $name => $value) {
            $cleaned_params[str_replace('-', '', $name)] = $value ;
        }
        return $cleaned_params;
    }
}
