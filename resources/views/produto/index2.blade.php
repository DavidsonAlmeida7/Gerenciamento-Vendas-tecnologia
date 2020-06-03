@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

@if ($produtos)

    <h2>Produtos</h2>
    <hr>

    <div class="card-columns">
        @foreach ($produtos as $p)
            <div class="card" style="text-align:center;" >
                <img class="card-img-top" src="{{ url("img_produto/{$p->foto}") }}" alt="{{ $p->foto }}" style="width:270px; height:250px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nome }}</h5>
                    <p class="card-text">{{ 'R$ ' . number_format($p->preco, 2, ",", ".") }}</p>
                    <a href="#" class="btn btn-success"><i class="fas fa-cart-plus"></i> Adicionar ao carrinho</a>
                </div>
            </div>
        @endforeach
    </div>
    <hr>

    <h4 style="text-align:right;"><span class="badge badge-danger">Três ou menos itens no estoque</span></h4>

    {{ $produtos->links() }}

@else

    <h2>Produtos</h2>
    <hr>
    <div class="alert alert-danger">Você não tem nenhum produto cadastrado.</div>
    
@endif

@stop