<?php
    class QueryBuilder{
        private PDO $pdo;
        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public  function selectAll($table){
            $statement=$this->pdo->prepare(query: "SELECT * FROM {$table}");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        }
        public function select($table,$id){
            $statement=$this->pdo->prepare(query: "SELECT * FROM {$table} WHERE id=:id");
            $statement->execute(['id'=>$id]);
            return $statement->fetch(PDO::FETCH_OBJ);
        }
        public function selectWhere($table,$where){
            $statement=$this->pdo->prepare(query: "SELECT * FROM {$table} WHERE {$where}");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        }
        public function selectUser($email){
            $statement=$this->pdo->prepare(query:
                "SELECT * FROM users WHERE email=:email"
            );
            $statement->execute(['email'=>$email]);
            return $statement->fetch(PDO::FETCH_OBJ);
        }
        public  function delete($table,$id){
            $statement=$this->pdo->prepare(query: "DELETE FROM {$table} WHERE id=:id");
            $statement->execute(['id'=>$id]);
        }
        public function update($table, $set, $where, $params)
            {
                $sql = sprintf(
                    "update %s set %s where %s",
                    $table,
                    $set,
                    $where
                );
                try {
                    $statement = $this->pdo->prepare($sql);
                    $statement->execute($params);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
        public  function insert($table, $params)
        {
            $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                $table,
                implode(',', array_keys($params)),
                ':' . implode(', :', array_keys($params))
            );
            try {
                $statement = $this->pdo->prepare($sql);
                $statement->execute($params);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }