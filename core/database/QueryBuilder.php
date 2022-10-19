<?php
    class QueryBuilder{
        private PDO $pdo;
        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public  function selectAll($table, $intoClass){
            $statement=$this->pdo->prepare(query: "SELECT * FROM {$table}");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS,$intoClass);
        }
    }