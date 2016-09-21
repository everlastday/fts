<?php
//
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Адмінка - Менеджер сторінок';
$this->params['breadcrumbs'] = [
    ['label' => 'Менеджер сторінок'],
]
//?>



<div class="content-area">

    <table class="basic product-category">
        <tr>
            <th><span>Вибір</span></th>
            <th><span>№</span></th>
            <th><span>Заголовок</span></th>
            <!--<th><span>Ссылка</span></th>-->
        </tr>
        <?php foreach($data as $val): ?>
            <tr>
                <td class="right-border">
                    <input class="action_box" value="<?=$val['id']?>" type="checkbox" />
                </td>
                <td class="right-border"><?=$val['id']?></td>
                <td class="right-border">
                    <a target="_blank" class="product_link_to_site" href="<?=Url::to('/page/' . $val['url']) ?>"><?=$val['title']?></a>
                </td>
                <!--<td class="right-border">--><?//=$val['url']?><!--</td>-->
            </tr>

        <?php endforeach ?>
    </table>
</div>