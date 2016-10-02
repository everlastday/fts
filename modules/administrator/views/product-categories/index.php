<?php
//
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
//
///* @var $this yii\web\View */
///* @var $searchModel app\models\ProductCategoriesSearch */
///* @var $dataProvider yii\data\ActiveDataProvider */
//
//$this->title = 'Product Categories';
//$this->params['breadcrumbs'][] = $this->title;
//?>
<!--<div class="product-categories-index">-->
<!---->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!--    --><?php //// echo $this->render('_search', ['model' => $searchModel]); ?>
<!---->
<!--    <p>-->
<!--        --><?//= Html::a('Create Product Categories', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!---->
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'category_name',
//            'status',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
<!---->
<!--</div>-->
<!---->
<!---->
<?php
//
$this->title = 'Адмінка - Категорія товарів';
$this->params['breadcrumbs'] = [
    ['label' => 'Категорія товарів'],
]
//?>



<div class="content-area">




    <table class="basic product-category">
        <tr>
            <th><span>Вибір</span></th>
            <th><span>№</span></th>
            <th><span>Категорія товару</span></th>
            <th><span>Статус</span></th>
        </tr>
        <?php foreach($data as $val): ?>
            <tr>
                <td class="right-border"><input class="action_box" value="<?=$val['id']?>" type="checkbox"></td>
                <td class="right-border"><?=$val['id']?></td>
                <td class="right-border"><?=$val['category_name']?></td>
                <td>
                <?php if($val['status'] == 1): ?>
	                <?= Html::img('@web/images/admin/status-in-stock.png', ['class' => 'status']) ?>
                <?php else: ?>
	                <?= Html::img('@web/images/admin/status-out.png', ['class' => 'status']) ?>
                <? endif; ?>
                </td>
            </tr>



        <?php endforeach ?>

        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">1</td>-->
        <!--    <td class="right-border">Штукатурки декоративні</td>-->
        <!--    <td><img class="status" src="/images/status-in-stock.png"/></td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">2</td>-->
        <!--    <td class="right-border">Штукатурки мозаїчні</td>-->
        <!--    <td><img class="status" src="/images/status-in-stock.png"/></td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">3</td>-->
        <!--    <td class="right-border">Грунти</td>-->
        <!--    <td><img class="status" src="/images/status-in-stock.png"/></td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">4</td>-->
        <!--    <td class="right-border">Фарби</td>-->
        <!--    <td><img class="status" src="/images/status-in-stock.png"/></td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">5</td>-->
        <!--    <td class="right-border">Пінопласт</td>-->
        <!--    <td><img class="status" src="/images/status-in-stock.png"/></td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--    <td class="right-border"><input type="checkbox"></td>-->
        <!--    <td class="right-border">6</td>-->
        <!--    <td class="right-border">Клей</td>-->
        <!--    <td><img class="status" src="/images/status-in-stock.png"/></td>-->
        <!--</tr>-->
    </table>
</div>