<?php

$this->title = 'Користувачі';
$this->params[ 'breadcrumbs' ] = [
    ['label' => 'Користувачі'],
]
?>
<div class="content-area">

    <table class="basic users-table">
        <tr>
            <th><span>Вибір</span></th>
            <th><span>№</span></th>
            <th><span>Ім'я користувача</span></th>
            <th><span>Онлайн</span></th>
            <th><span>Група</span></th>
            <th><span>Останій візит</span></th>
            <th><span>ID</span></th>
        </tr>

        <?php foreach ($users as $user): ?>

            <tr>
                <td><input class="action_box" value="<?=$user->id?>" type="checkbox"></td>
                <td><?=$user->id?></td>
                <td><?=$user->username?></td>
                <td>
	                <?= \yii\helpers\Html::img('@web/images/admin/status-in-stock.png', ['class' => 'status']) ?>

                </td>
                <td>Адмін</td>
                <td><?=date('d.m.Y H:i', $user->updated_at)?></td>
                <td><?=$user->id?>
                    <a href="<?=\yii\helpers\Url::to(['users/' .$user->id]) ?>" class="btn-user-details">Деталі</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>