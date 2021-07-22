<?php $v->layout('theme/_theme'); ?>

<div class="container">
    <h2 class="text-white">Clientes</h2>
    <p class="text-white">Lista de clientes cadastro.:</p>
    <div class="d-flex justify-content-between mb-3">
        <h3 class="text-white">Novo <a href="<?= $router->route('client.create'); ?>" class="btn btn-dark">ADD</a></h3>
        <p><a class="btn btn-green" href="<?= $router->route('app.logoff'); ?>" title="Sair agora">SAIR AGORA :)</a></p>
    </div>
    <table class="table table-striped">
        <thead>
            <tr class="text-white">
                <th>Nome</th>
                <th>Rg</th>
                <th>Cpf</th>
                <th>Telefone</th>
                <th>Data de Nasci</th>
                <th>Endereço</th>
                <th style="width=270px;">Ações</th>
            </tr>
        </thead>
        <tbody class="text-white">
            <?php foreach ($data as $value):  ?>
            <tr>
                <td><?=$v->e($value['name'])?></td>
                <td><?=$v->e($value['rg'])?></td>
                <td><?=$v->e($value['cpf'])?></td>
                <td><?=$v->e($value['birth_date'])?></td>
                <td><?=$v->e($value['phone'])?></td>
                <td><?=$v->e($value['formattedAddress'])?></td>

                <td>
                    <a href="<?= $router->route('client.edit', ['id' => $value['id']]); ?>"
                        class="btn btn-info">Editar</a>
                    <a href="<?= $router->route('client.delete', ['id' => $value['id']]); ?>"
                        class="btn btn-warning">Apagar</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>