<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = ' <div class="alert alert-success">Ação Execultada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = ' <div class="alert alert-danger">Ação não Execultada!</div>';
            break;
    }
}

$resultados = '';
foreach ($vagas as $vaga) {
    $resultados .= '<tr>
                      <td>' . $vaga->id . '</td>
                      <td>' . $vaga->titulo . '</td>
                      <td>' . $vaga->descricao . '</td>
                      <td>' . ($vaga->ativo == 's' ? 'Ativo' : 'Inativo') . '</td>
                      <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->data)) . '</td>
                      <td>
                        <a href="editar.php?id=' . $vaga->id . '">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id=' . $vaga->id . '">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr>
                                                   <td colpan="6" class="text-center"> NEnhuma vaga Encontrafa</td>
                                                   </tr>';
$paginacao = '';
$paginas  = $obPagination->getPages();

foreach ($paginas as $key => $pagina) {
    $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
    $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '">
    <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
    </a>';
}

?>
<main>
    <?= $mensagem ?>
    <section class="new-vaga">
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova vaga</button>
        </a>
    </section>

    <section class="search">
        <form method="get">
            <div class="container">
                <div class="row my-4">
                    <div class="col pl-0">
                        <label class="h5">busca titulo</label>
                        <input type="text" class="form-control" name="busca" value="<?= $busca ?>">
                    </div>
                    <div class="col">
                        <label>status</label>
                        <select name="status" class="form-control">
                            <option value="">Ativa/Inativa</option>
                            <option value="s" <?= $filtroStatus == 's' ? 'selected' : '' ?>>Ativa</option>
                            <option value="n" <?= $filtroStatus == 'n' ? 'selected' : '' ?>>Inativa</option>
                        </select>
                    </div>

                    <div class="col d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <section class="table">
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>titulo</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
    <section class="paginatio">
        <?= $paginacao ?>
    </section>
</main>