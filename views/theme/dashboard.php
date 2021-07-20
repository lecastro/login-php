<?php $v->layout('theme/_theme'); ?>

<p><a class="btn btn-green" href="<?= $router->route('app.logoff'); ?>" title="Sair agora">SAIR AGORA :)</a></p>
</div>

<div class="container">
    <h2>Clientes</h2>
    <p>Lista de clientes cadastro.:</p>
    <h3>Novo <a href="<?= $router->route('client.create'); ?>" class="btn btn-dark">ADD</a></h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Rg</th>
                <th>Cpf</th>
                <th>Telefone</th>
                <th>Data de Nasci</th>
                <th>Endereço</th>
                <th style="width=270px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $value):  ?>
            <tr>
                <td><?=$v->e($value['name'])?></td>
                <td><?=$v->e($value['rg'])?></td>
                <td><?=$v->e($value['cpf'])?></td>
                <td><?=$v->e($value['birth_date'])?></td>
                <td><?=$v->e($value['phone'])?></td>
                <td><?=$v->e($value['formattedAddress'])?></td>
                <td>
                    <a href="#" class="btn btn-info">Editar</a>
                    <a href="#" class="btn btn-warning">Apagar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>