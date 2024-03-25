<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6">
        <h1 class="text-center">Dados do Usuário</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuario as $usuario) : ?>
                    <tr>
                        <td><?= $usuario->nome; ?></td>
                        <td><?= $usuario->email; ?></td>
                        <td> 
                            <div class="d-flex">
                                <form action="<?= base_url('usuario/deletar/'.$usuario->id) ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Deletar</button>
                                </form>
                                <a href="<?= base_url('editar_usuario/'.$usuario->id) ?>" class="btn btn-primary">Editar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Criar Usuário</a>
    </div>
</div>

</body>

</html>
