<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Criar Conta - Minha Loja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f2f2f2;
    }

    .register-container {
      max-width: 450px;
      margin: 80px auto;
      padding: 2rem;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-title {
      margin-bottom: 1.5rem;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="register-container">
      <h2 class="form-title">Criar Conta</h2>
      <form method="POST" action="newAccount.php">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome completo</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Criar Conta</button>
      </form>
      <div class="text-center mt-3">
        <a href="index.php">Já tem uma conta? Entrar</a>
      </div>
    </div>
  </div>
</body>
</html>
