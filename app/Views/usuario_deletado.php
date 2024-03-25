<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário Deletado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6 text-center">
        <h1>Usuário Deletado</h1>
        <p>O usuário foi deletado com sucesso.</p>
        <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary">Voltar</a>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Criar Usuário</a>
        
    </div>
</div>

</body>
</html>
