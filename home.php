<?php
  session_start();
  if (!isset($_SESSION['logado'])) {
      header("Location: index.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Minha Loja Virtual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
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
    
    <form action="market.php" method='post' class="d-flex">
        <input type="hidden" name="cart" value="">
        <button class="text-white cart-toggle btn btn-outline-light" id="cart-toggle">
          🛒 Carrinho
        </button>
        <a href="logout.php" class="ms-2 btn btn-outline-danger">
          🚪 Sair
        </a>

    </form>
  </nav>

  <div class="container mt-4">
  <div class="card text-white shadow-sm" style="background-color: #2c3e50;">
    <div class="card-body d-flex align-items-center">
      <div class="me-4 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
             alt="avatar" width="70" height="70" 
             class="rounded-circle border border-3 border-info p-1">
      </div>
      <div>
        <h5 class="mb-1 text-info" style="letter-spacing: 1px;">USERPANEL</h5>
        <p class="mb-0"><strong>Nome:</strong> <?= htmlspecialchars($_SESSION['usuario_nome']) ?></p>
          </div>
        </div>
      </div>
    </div>

  <!-- Vitrine de produtos -->
  <div class="container mt-4">
    <div class="row" id="product-list">
      <!-- Exemplo de card de produto -->
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Camisa Oversized</h5>
            <p class="card-text">R$ 59,99</p>
            <button class="btn btn-primary mt-auto" onclick="addToCart('Camisa Oversized', 59.99)">Adicionar ao carrinho</button>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Tênis Casual</h5>
            <p class="card-text">R$ 189,90</p>
            <button class="btn btn-primary mt-auto" onclick="addToCart('Tênis Casual', 189.90)">Adicionar ao carrinho</button>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">Mochila Urbana</h5>
            <p class="card-text">R$ 129,50</p>
            <button class="btn btn-primary mt-auto" onclick="addToCart('Mochila Urbana', 129.50)">Adicionar ao carrinho</button>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Jaqueta Jeans</h5>
          <p class="card-text">R$ 199,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Jaqueta Jeans', 199.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Relógio Esportivo</h5>
          <p class="card-text">R$ 349,00</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Relógio Esportivo', 349.00)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Óculos de Sol</h5>
          <p class="card-text">R$ 129,99</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Óculos de Sol', 129.99)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Boné Trucker</h5>
          <p class="card-text">R$ 49,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Boné Trucker', 49.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Calça Cargo</h5>
          <p class="card-text">R$ 89,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Calça Cargo', 89.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Mochila de Couro</h5>
          <p class="card-text">R$ 249,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Mochila de Couro', 249.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Tênis Esportivo</h5>
          <p class="card-text">R$ 299,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Tênis Esportivo', 299.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Camisa Polo</h5>
          <p class="card-text">R$ 79,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Camisa Polo', 79.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Cinto de Couro</h5>
          <p class="card-text">R$ 59,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Cinto de Couro', 59.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Calça Jeans Skinny</h5>
          <p class="card-text">R$ 139,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Calça Jeans Skinny', 139.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Jaqueta de Couro</h5>
          <p class="card-text">R$ 399,00</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Jaqueta de Couro', 399.00)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Blusa de Frio</h5>
          <p class="card-text">R$ 99,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Blusa de Frio', 99.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Sandália Feminina</h5>
          <p class="card-text">R$ 89,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Sandália Feminina', 89.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Relógio de Pulso</h5>
          <p class="card-text">R$ 199,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Relógio de Pulso', 199.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Camisa Social</h5>
          <p class="card-text">R$ 89,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Camisa Social', 89.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Bolsa de Ombro</h5>
          <p class="card-text">R$ 179,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Bolsa de Ombro', 179.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Tênis Casual</h5>
          <p class="card-text">R$ 159,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Tênis Casual', 159.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Camisa Regata</h5>
          <p class="card-text">R$ 39,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Camisa Regata', 39.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Chapéu Panamá</h5>
          <p class="card-text">R$ 99,00</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Chapéu Panamá', 99.00)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Camisa de Manga Longa</h5>
          <p class="card-text">R$ 69,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Camisa de Manga Longa', 69.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Jaqueta Corta Vento</h5>
          <p class="card-text">R$ 129,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Jaqueta Corta Vento', 129.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Calça Legging</h5>
          <p class="card-text">R$ 79,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Calça Legging', 79.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Meia Esportiva</h5>
          <p class="card-text">R$ 19,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Meia Esportiva', 19.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Camiseta Básica</h5>
          <p class="card-text">R$ 29,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Camiseta Básica', 29.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Tênis de Corrida</h5>
          <p class="card-text">R$ 299,90</p>
          <button class="btn btn-primary mt-auto" onclick="addToCart('Tênis de Corrida', 299.90)">Adicionar ao carrinho</button>
        </div>
      </div>
    </div>

    </div>
  </div>

  <footer class="bg-dark text-light py-4 mt-5">
  <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
    <p class="mb-2 mb-md-0">
      &copy; <?= date('Y') ?> Minha Loja. Todos os direitos reservados.
    </p>
    <ul class="list-unstyled d-flex mb-0">
      <li class="ms-3">
        <a class="text-info text-decoration-none" href="#"><i class="bi bi-facebook"></i></a>
      </li>
      <li class="ms-3">
        <a class="text-info text-decoration-none" href="#"><i class="bi bi-instagram"></i></a>
      </li>
      <li class="ms-3">
        <a class="text-info text-decoration-none" href="#"><i class="bi bi-envelope-fill"></i></a>
      </li>
    </ul>
  </div>
</footer>

  <script>
    function addToCart(productName, productPrice) {
        const inputHidden = document.querySelector('input[type="hidden"]');
        inputHidden.value += productName + "#" + productPrice + ";";
        alert(`${productName} foi adicionado ao carrinho!`);
    }
  </script>
</body>
</html>