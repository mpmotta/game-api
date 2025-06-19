<?php
require_once __DIR__ . '/../model/Game.php';


class GameController {

    public function index() {
        $gameModel = new Game();
        return $gameModel->consulta();
    }

    public function show($id) {
        $gameModel = new Game();
        return $gameModel->consultaID($id);
    }

    public function store($data) {
        $game = $this->popularGame($data);
        $gameModel = new Game();
        $gameModel->inserir($game);
    }

    public function update($id, $data) {
        $game = $this->popularGame($data);
        $game->setId($id);
        $gameModel = new Game();
        $gameModel->editar($game, $id);
    }

    public function destroy($id) {
        $gameModel = new Game();
        $gameModel->excluir($id);
    }

    public function filterByCategoria($categoria) {
        $gameModel = new Game();
        return $gameModel->consultaPorCategoria($categoria);
    }
    public function filterByNome($nome) {
        $gameModel = new Game();
        return $gameModel->consultaPorNome($nome);
    }
    public function filterByEstudio($estudio) {
        $gameModel = new Game();
        return $gameModel->consultaPorEstudio($estudio);
    }
    public function filterByIdade($idade) {
        $gameModel = new Game();
        return $gameModel->consultaPorIdade($idade);
    }
    public function filterByValorMenor($valor) {
        $gameModel = new Game();
        return $gameModel->consultaPorValorMenor($valor);
    }
    public function filterByValorMaior($valor) {
        $gameModel = new Game();
        return $gameModel->consultaPorValorMaior($valor);
    }
    public function filterByValorEntre($min, $max) {
        $gameModel = new Game();
        return $gameModel->consultaPorValorEntre($min, $max);
    }
    public function filterByDisponibilidade($disponibilidade) {
        $gameModel = new Game();
        $disp = filter_var($disponibilidade, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        return $gameModel->consultaPorDisponibilidade($disp);
    }

    private function popularGame($dados) {
        $game = new Game();
        $game->setNome($dados['nome'] ?? '');
        $game->setEstudio($dados['estudio'] ?? '');
        $game->setCategoria($dados['categoria'] ?? '');
        $game->setIdade($dados['idade'] ?? '');
        $game->setValor($dados['valor'] ?? 0);
        $game->setDisponibilidade($dados['disponibilidade'] ?? true);
        return $game;
    }
}
