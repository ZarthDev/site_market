<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Minha Loja Virtual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .cart {
      position: fixed;
      top: 0;
      right: -100%;
      width: 300px;
      height: 100vh;
      background-color: #fff;
      box-shadow: -2px 0 10px rgba(0, 0, 0, 0.2);
      padding: 1rem;
      overflow-y: auto;
      transition: right 0.3s ease-in-out;
      z-index: 1050;
    }

    .cart.active {
      right: 0;
    }

    .cart-toggle {
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">Minha Loja</span>
    <span class="text-white cart-toggle" id="cart-toggle">
      🛒 Carrinho
    </span>
  </nav>

  <!-- Vitrine de produtos -->
  <div class="container mt-4">
    <div class="row" id="product-list">
      <!-- Exemplo de card de produto -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Produto 1">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Camisa Oversized</h5>
            <p class="card-text">R$ 59,99</p>
            <button class="btn btn-primary mt-auto">Adicionar ao carrinho</button>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Produto 2">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Tênis Casual</h5>
            <p class="card-text">R$ 189,90</p>
            <button class="btn btn-primary mt-auto">Adicionar ao carrinho</button>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Produto 3">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Mochila Urbana</h5>
            <p class="card-text">R$ 129,50</p>
            <button class="btn btn-primary mt-auto">Adicionar ao carrinho</button>
          </div>
        </div>
      </div>
      <!-- Adicione mais cards aqui -->
    </div>
  </div>
</body>
</html>
