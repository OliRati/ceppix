<?php

class MainRepository
{
    public function create(?array $values, $table)
    {
        global $pdo;

        $keys = "";
        $keysAlias = "";
        foreach ($values as $key => $value) {
            $keys === "" ? $keys .= $key : $keys .= "," . $key;
            $keysAlias === "" ? $keysAlias .= ":" . $key : $keysAlias .= ",:" . $key;
        }
        $req = $pdo->prepare("INSERT INTO $table ($keys) VALUES ($keysAlias)");
        $req->execute($values);

        return $req->fetchAll();
    }

    /**
     * Summary of getBy
     * @param mixed $value ['table', 'key', 'value']
     * @return array
     */
    public function getBy(?array $value)
    {
        global $pdo;

        $req = $pdo->prepare("SELECT * FROM " . $value[0] . " WHERE " . $value[1] . " = :valeur");
        $req->execute([":valeur" => $value[2]]);

        return $req->fetchAll();
    }

    public function getById($id, $table)
    {
        global $pdo;

        $req = $pdo->prepare("SELECT * FROM " . $table . " WHERE id_" . $table . " = :id");
        $req->execute([":id" => $id]);

        return $req->fetch();
    }

    public function getByAll($table)
    {
        global $pdo;

        $req = $pdo->prepare("SELECT * FROM " . $table);
        $req->execute();

        return $req->fetchAll();
    }

    public function update($id, $values, $table)
    {
        global $pdo;

        $updateValues = "";
        foreach ($values as $key => $value) {
            $updateValues === "" ? $updateValues .= $key . " = :" . $key : $updateValues .= "," . $key . " = :" . $key;
        }

        $req = $pdo->prepare("UPDATE $table SET $updateValues WHERE id_$table = $id");
        $req->execute($values);

        return $req->fetchAll();
    }

    public function delete($id, $table)
    {
        global $pdo;
        $req = $pdo->prepare("DELETE FROM " . $table . " WHERE id_" . $table . " = " . $id);
        $req->execute();
    }
}
