<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand sidebar-name">
            <img src="{{ url("img/optimus.jpg") }}" alt="" class="img-site"/>
            <a href="{{ url('/') }}">Distribuidora Optimus</a>
        </li>

        <li class="item-list"><a href="{{ url('/cidades') }}"><span class="fas fa-city"></span> Cidades</a></li>
        <li class="item-list"><a href="{{ url('/clientes') }}"><span class="fas fa-users"></span> Clientes</a></li>
        <li class="item-list"><a href="{{ url('/fabricantes') }}"><span class="fas fa-industry"></span> Fabricantes</a></li>
        <li class="item-list"><a href="{{ url('/modelos') }}"><span class="fas fa-laptop-medical"></span> Modelos</a></li>
        <li class="item-list"><a href="{{ url('/produtos') }}"><span class="fab fa-product-hunt"></span> Produtos</a></li>
        <li class="item-list"><a href="{{ url('/tipo_pagamentos') }}"><span class="fas fa-dollar-sign"></span> Tipo de Pagamento</a></li>
        <li class="item-list"><a href="{{ url('/vendas') }}"><span class="fas fa-cart-arrow-down"></span> Vendas</a></li>
        <li class="item-list"><a href="{{ url('/vendedores') }}"><span class="fas fa-user-tie"></span> Vendedores</a></li>
        <li class="item-list"><a href="{{ url('/vendas/grafico_fabricante') }}"><span class="fas fa-chart-bar"></span> Vendas por Fabricante</a></li>
        <li class="item-list"><a href="{{ url('/vendas/grafico_produto') }}"><span class="fas fa-chart-pie"></span> Vendas por Produto</a></li>
        <li class="item-list"><a href="{{ url('/vendas/grafico_vendedor') }}"><span class="fas fa-chart-line"></span> Vendas por Vendedor</a></li>
        <li class="item-list"><a href="{{ url('/') }}"><span class="fas fa-tachometer-alt"></span> Dashboard</a></li>

        <li class="sidebar-brand sidebar-user">
            <img src="{{ url('img/optimus2.jpg') }}" width="180px" alt="" class="img-user img-circle"/>
            <a href="" class="user-font"><span class="fas fa-user-lock"></span> Administrador</a>
            <a href="{{ route('logout') }}" class="user-font" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="fas fa-sign-out-alt"></span> Sair</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>