<?php
//require "model/query.php";

class reservaController
{
    public function view() 
    {
        $qry = "SELECT assentos.id, passageiros.nome, assentos.posicao, passagens.preco, assentos.PCD, assentos.overbooking FROM assentos INNER JOIN passagens on assentos.id_passagem = passagens.id ";
        $qry .= "INNER JOIN passageiros on passagens.id_passageiro = passageiros.id ";
        $qry .= " WHERE assentos.id_passagem IS NOT NULL";
        $qry .= " ORDER BY assentos.id";

        $pdo = new Query();

        $reservas = $pdo->select($qry);

        include "view/reservas/view.php";
    }

    public function cadastro()
    {
        $qry = "SELECT id_passagem FROM assentos ORDER BY id";

        $pdo = new Query();

        $assentos = $pdo->select($qry);

        $qry = "SELECT * FROM passageiros";

        $passageiros = $pdo->select($qry);

        include "view/reservas/cadastro.php";
    }

    public function save($request)
    {
        for ($i = 1; $i <= 26; $i++) {
            foreach (range('A', 'D') as $j) {
                $cadeira = $i . $j;
                if (isset($request[$cadeira])) {
                    $qry = "INSERT INTO passagens(id_passageiro, preco, pago, data) VALUES (";
                    $qry .= "'" . $request["passageiro"] . "'";
                    $qry .= ",";
                    $qry .= "'" . $request["preco"]  . "'";
                    $qry .= ",";
                    $qry .= "'N'";
                    $qry .= ",";
                    $qry .= "'" . date('yy-m-d') . "'";
                    $qry .= ")";

                    $pdo = new Query();
                    $pdo->insert($qry);

                    $qry = "SELECT MAX(id) from passagens";
                    $id = $pdo->select($qry);    

                    $qry = "UPDATE assentos SET id_passagem = " . $id[0][0];
                    $qry .= " WHERE posicao = '" . $cadeira . "'";

                    $pdo = new Query();
                    $pdo->insert($qry);
                }
            }
        }

        header("Location: /reserva");
    }
}
