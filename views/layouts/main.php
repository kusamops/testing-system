<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->registerJsFile(
    Yii::$app->request->baseUrl.'/js/main.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Testing System</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    if (Yii::$app->user->isGuest) {
        $menuItems = [
            ['label' => 'Login', 'url' => ['/site/login']],
            ['label' => 'Signup', 'url' => ['/site/signup']]
        ];
    } else {
        $menuItems = [
            ['label' => 'Questions', 'url' => ['/questions/index'], 'visible' => Yii::$app->user->can('manager')],
            //['label' => 'Tags', 'url' => ['/tags/index']],
            ['label' => 'Questions Packs', 'url' => ['/questions-packs/index'], 'visible' => Yii::$app->user->can('manager')],
            ['label' => 'Rooms', 'url' => ['/rooms/index']],
            ['label' => 'Overall Results', 'url' => ['/rooms-candidates/index']],
            ['label' => 'Logout (' . Yii::$app->user->identity->name . ')', 'url' => ['/site/logout']]

        ];
    }

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
