<?php
require_once __DIR__ . '/../config.php';

class Game {
    private $pdo;
    private $tabela = 'jogos';

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function consulta() {
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaID($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function inserir(Game $game) {
        $sql = "INSERT INTO $this->tabela (nome, estudio, categoria, idade, valor, disponibilidade)
                VALUES (:nome, :estudio, :categoria, :idade, :valor, :disponibilidade)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $game->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':estudio', $game->getEstudio(), PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $game->getCategoria(), PDO::PARAM_STR);
        $stmt->bindParam(':idade', $game->getIdade(), PDO::PARAM_STR);
        $stmt->bindParam(':valor', $game->getValor());
        $stmt->bindParam(':disponibilidade', $game->getDisponibilidade(), PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    public function editar(Game $game, $id) {
        $sql = "UPDATE $this->tabela SET nome = :nome, estudio = :estudio, categoria = :categoria, idade = :idade, valor = :valor, disponibilidade = :disponibilidade WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $game->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':estudio', $game->getEstudio(), PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $game->getCategoria(), PDO::PARAM_STR);
        $stmt->bindParam(':idade', $game->getIdade(), PDO::PARAM_STR);
        $stmt->bindParam(':valor', $game->getValor());
        $stmt->bindParam(':disponibilidade', $game->getDisponibilidade(), PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function consultaPorCategoria($categoria) {
        $sql = "SELECT * FROM $this->tabela WHERE categoria = :categoria";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaPorNome($nome) {
        $like = "%$nome%";
        $sql = "SELECT * FROM $this->tabela WHERE nome LIKE :nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome', $like, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaPorEstudio($estudio) {
        $like = "%$estudio%";
        $sql = "SELECT * FROM $this->tabela WHERE estudio LIKE :estudio";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':estudio', $like, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaPorIdade($idade) {
        $sql = "SELECT * FROM $this->tabela WHERE idade = :idade";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idade', $idade, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaPorValorMenor($valor) {
        $sql = "SELECT * FROM $this->tabela WHERE valor < :valor";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaPorValorMaior($valor) {
        $sql = "SELECT * FROM $this->tabela WHERE valor > :valor";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaPorValorEntre($min, $max) {
        $sql = "SELECT * FROM $this->tabela WHERE valor BETWEEN :min AND :max";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':min', $min);
        $stmt->bindParam(':max', $max);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function consultaPorDisponibilidade($disponibilidade) {
        $sql = "SELECT * FROM $this->tabela WHERE disponibilidade = :disponibilidade";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':disponibilidade', $disponibilidade, PDO::PARAM_BOOL);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Getters e setters
    private $id;
    private $nome;
    private $estudio;
    private $categoria;
    private $idade;
    private $valor;
    private $disponibilidade;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }
    public function getEstudio() { return $this->estudio; }
    public function setEstudio($estudio) { $this->estudio = $estudio; }
    public function getCategoria() { return $this->categoria; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }
    public function getIdade() { return $this->idade; }
    public function setIdade($idade) { $this->idade = $idade; }
    public function getValor() { return $this->valor; }
    public function setValor($valor) { $this->valor = $valor; }
    public function getDisponibilidade() { return $this->disponibilidade; }
    public function setDisponibilidade($disponibilidade) { $this->disponibilidade = $disponibilidade; }
}
