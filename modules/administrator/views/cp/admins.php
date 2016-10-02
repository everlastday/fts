<?php

$this->title = 'Адміністратори';
$this->params['breadcrumbs'] = [
    ['label' => 'Адміни'],
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
        <tr>
            <td><input type="checkbox"></td>
            <td>1</td>
            <td>Васкул Василь</td>
            <td><img class="status" src="/images/status-in-stock.png"/></td>
            <td>Адмін</td>
            <td>18-08-2014:11:38</td>
            <td>1
                <a href="users-details.html" class="btn-user-details">Деталі</a>
            </td>
        </tr>
    </table>
</div>