<?php
$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';
$alertaCadastro = strlen($alertaCadastro) ? '<div class="alert alert-danger">' . $alertaCadastro . '</div>' : '';

?>

<div class="jumbotron text-dark">

    <div class="row">

        <div class="col">

            <form method="post">

                <h2>Login</h2>
                <?= $alertaLogin ?>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>


                <div class="form-group">
                    <label> Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>


        <div class="col">
            <form method="post">

                <h2>Cadastre-se</h2>
                <?= $alertaCadastro ?>
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label> Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>

    </div>
</div>