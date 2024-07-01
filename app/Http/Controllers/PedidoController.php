<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index(){
        $pedidos = Pedido::all();
        return view('/pedidos/select',['pedidos' => $pedidos]);
    }

    public function create(Request $request){
        session_start();
        $pedido = new Pedido;
        $pedido->cliente = cache('user');
        $pedido->detalhes = [];
        $detalhesArray = [];
        $detalhes = [];
        foreach($request->quantidade as $key => $value){
            if(!$value == 0){
                $detalhes = [
                    "produto" => $request->descricao[$key],
                    "valor" => $request->valor[$key],
                    "quantidade" => $request->quantidade[$key]
                ];
                array_push($detalhesArray, $detalhes);
            }
        }
        $pedido->detalhes = json_encode($detalhesArray);
        $valorTotal = 0;
        foreach($request->quantidade as $key => $value){
            if(!$value == 0){
                $valorTotal += doubleval($request->valor[$key]) * intval($request->quantidade[$key]);
            }
        }
        $pedido->valorTotalPedido = $valorTotal;
        $pedido->status = 'PENDENTE';
        $pedido->save();
        return view('/home');
    }

    public function select(Request $request){
        $pedidos = Pedido::all();
        return view('/pedidos/select',['pedidos' => $pedidos]);
    }

    public function delete(Request $request){
        $pedidos = Pedido::where('id', '=', $request->id)
        ->where('status', '=', 'PENDENTE')
        ->delete();
        return redirect('/pedidos/select');
    }

    public function update(Request $request){
        $detalhes = "[";
        $valorTotal = 0;
        for ($i=0; $i < count($request->produto); $i++) {
            $detalhes .= '{"valor"' . ":" . '"' . $request->valor[$i] . '"' . ',';
            $detalhes .= '"produto"' . ":" . '"' . $request->produto[$i] . '"'. ',';
            $detalhes .= '"quantidade"' . ":" . '"' . $request->quantidade[$i] . '"'. '},';
            $valorTotal += doubleval($request->valor[$i]) * intval($request->quantidade[$i]);
        }
        $detalhesJson = rtrim($detalhes,",") . "]";
        $pedidos = Pedido::where('id', '=' , $request->id)
        ->update([
            'cliente' => $request->cliente,
            'detalhes' => $detalhesJson,
            'valorTotalPedido' => $valorTotal,
            'status' => $request->status
                            ]);
        return redirect('/pedidos/select');
    }
}
