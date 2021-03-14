<?php

class Query
{
    public function insert($qry)
    {
        /*SÓ FUNCIONA NO PC DO BRUNO GUIMARAES, NAO DESCOMENTE NEM DELETE
        $dsn = "mysql:host=localhost:3308;dbname=reservas";
        $user = "root";
        $pass = "";
        */

        //COMENTE O CÓDIGO ACIMA SE VOCÊ NÃO FOR O BRUNO E USE O ABAIXO
        $dsn = "mysql:host=localhost;dbname=reservas";
        $user = "root";
        $pass = "123123";
        

        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stm = $pdo->prepare($qry);

            $stm->execute();

            echo 200;
        } catch (PDOException $e) {
            echo "Erro:" . $e->getMessage();
        }
    }

    public function select($qry)
    {
        /*SÓ FUNCIONA NO PC DO BRUNO GUIMARAES, NAO DESCOMENTE NEM DELETE
        $dsn = "mysql:host=localhost:3308;dbname=reservas";
        $user = "root";
        $pass = "";*/

        // COMENTE O CÓDIGO ACIMA SE VOCÊ NÃO FOR O BRUNO E USE O ABAIXO
        $dsn = "mysql:host=localhost;dbname=reservas";
        $user = "root";
        $pass = "123123";
        

        try {
            $pdo = new PDO($dsn, $user, $pass);

            $result = $pdo->query($qry);
            $rows = $result->fetchAll();

            return $rows;
        } catch (PDOException $e) {
            echo "Erro:" . $e->getMessage();
        }
    }
}
