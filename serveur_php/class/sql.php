<?php

class sql
{
    private string $host = "127.0.0.1";
    private string $user = "root";
    private string $password = "";
    private string $db = "nuntius_game";
    private ?PDO $pdo;
    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $e) {
            throw new Exception('PDO connection error: ' . $e->getMessage());
        }
    }
    public function query(string $query, array $datas)
    {
        if (!$this->pdo) {
            throw new Exception('PDO not initialized');
        }
        $presql = $this->pdo->prepare($query);
        foreach ($datas as $key => $data) {
            $presql->bindValue($key, $data['value'], $data['type']);
        }
        $presql->execute();
        return $presql;
    }
}
