<?php

class Pedido {
   
    private $id;

    private $cliente;

    private $mesa;

    private $itens = [];

    // metodo para 
    public function __construct($id, $cliente) {
        $this->id = $id;
        $this->cliente = $cliente;
    }

   // metodo para adicionar a mesa

   public function adicionarMesa($numero){
    $mesa = [
        'numero' => $numero,
    ];
    $this ->mesa[] = $mesa;
}

    //metodo para a escolhar do item

    public function adicionarItem($nome, $quantidade, $precoUnitario) {
        $item = [
            'nome' => $nome,
            'quantidade' => $quantidade,
            'precoUnitario' => $precoUnitario
        ];

        $this->itens[] = $item;
    }

//metodo para calcular o total

    public function calcularTotal() {
        $total = 0;

        foreach ($this->itens as $item) {
            $total += $item['quantidade'] * $item['precoUnitario'];
        }

        return $total;
    }

    public function exibirPedido() {
        echo "Pedido {$this->id} para {$this->cliente}\n  </br>";
        echo "Itens do pedido:\n  </br>";
        
        foreach ($this->itens as $item) {
            echo "{$item['quantidade']}x {$item['nome']} - Preco unitario: {$item['precoUnitario']} \n   </br>";
        }

        echo "numero da mesa: \n  </br>";
        echo "Total do pedido: {$this->calcularTotal()}\n   </br>";
    }
}


?>