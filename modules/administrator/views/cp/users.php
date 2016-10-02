<?php

$this->title = 'Користувачі';
$this->params['breadcrumbs'] = [
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
        <tr>
            <td><input type="checkbox"></td>
            <td>2</td>
            <td>Іван Іванович</td>
            <td><img class="status" src="/images/status-out.png"/></td>
            <td>Користувач</td>
            <td>18-08-2014:11:38</td>
            <td>2
                <a href="users-details.html" class="btn-user-details">Деталі</a>
            </td>
        </tr>
    </table>
</div>