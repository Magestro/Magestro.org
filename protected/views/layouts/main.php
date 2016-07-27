<?php
//todo redo this fucking shit
ob_start();
/**
 * @var $this Controller
 * @var $content mixed
 */

$page_title = isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" id="viewport" content="width=device-width"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    <title><?=$page_title?></title>
    <meta name="description" content="*"/>
    <meta name="keywords" content="*"/>

    <title><?=CHtml::encode($page_title); ?></title>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        $(function () {
            google.charts.load('current', {'packages':['corechart']});
        });
    </script>
</head>

<body>
<div id="preloader-full"></div>
<nav class="navbar navbar-default vertical-navbar" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?if(Yii::app()->user->isGuest):?>
            <a class="navbar-brand ajax-nav" href="/">magestro.org</a>
        <?else:?>
            <span class="navbar-brand">
                Привет, <?=Yii::app()->user->getName()?>!
                <?=CHtml::link('<span class="glyphicon glyphicon-log-out"></span> Выйти', ['site/logout']);?>
            </span>

        <?endif;?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <?php $this->widget('CSideMenu', Array(
                'items' => array(
                    array('label' => 'Кто я', 'url' => array('site/i/', 'template' => 'who')),
                    array('label' => 'Я делаю', 'url' => array('site/i/', 'template' => 'do')),
                    array('label' => 'Я умею', 'url' => array('site/i/', 'template' => 'can')),
                    array('label' => 'Я сделал', 'url' => array('site/i/', 'template' => 'did')),
                    array('label' => 'GitHub', 'url' => 'https://github.com/Magestro', 'external' => true),
                    array(
                        'label' => 'Прочее',
                        'url' => array('#'),
                        'items' => array(
                            array('label' => 'Текст', 'url' => array('site/i/', 'template' => 'write')),
                            array('label' => 'Инвентарь', 'url' => array('site/i/', 'template' => 'use')),
                            array('label' => 'Ссылки', 'url' => array('site/i/', 'template' => 'share')),
                            array('label' => 'Onliner Parser', 'url' => array('onlinerPrices/index/'), 'no-ajax' => true),
                        )
                    )
                ),
                'action' => Yii::app()->getController()->getAction()->getId()
            )
        ); ?>
        <div class="nav navbar-nav bottom-nav">
            <form class="form-horizontal container-fluid" role="form">
                <fieldset>
                    <span class="text-center">Я могу написать вам:</span>
                    <div class="form-group dark-input">
                        <div class="col-xs-10 nopadding">
                            <input type="text" class="form-control" placeholder="example@mail.com">
                        </div>

                        <div class="col-xs-2 nopadding">
                            <button type="submit" style="max-width: 100%;" class="btn btn-md btn-default"
                            onclick="javascript: alert('Иди нахуй, форма не работает, чо доебался'); return false;">></button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <hr/>
            <div class="copy container-fluid">
                <div>
                    &copy; 2016 Magestro;
                </div>
                <div>
                    E-mail:
                    <a href="mailto:ratibor.bulatov@gmail.com">ratibor.bulatov@gmail.com</a>
                </div>
                <div>
                    Skype:
                    <a href="skype:add?magestro_o">magestro</a>
                </div>
                <div>
                    Life:
                   <a href="tel:375255290540">+ 375 (25)
                        529-05-40</a>
                </div>
            </div>
        </div>
    </div><!-- /.navbar-collapse -->
</nav>

<div class="container-fluid main-container">
    <div class="row">
        <div id="main-content" class="col-lg-8 col-md-10 col-xs-12">
            <?ob_start();?>
            <h1 id="page-title" class="well"><?=$page_title?></h1>
            <hr/>
            <?$page_title_html = ob_get_clean();?>
            <?php /* if(isset($this->breadcrumbs)):?>
        <?php
 $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		));
        ?><!-- breadcrumbs -->
        <?php endif*/ ?>
            <?php
            $buffer = ob_get_clean();
            $as_json = false;
            if (isset($_GET["view_as"]) && $_GET["view_as"] == "json") {
                echo json_encode(
                    array(
                        "page_title" => $page_title,
                        "content" => $page_title_html.$content
                    )
                );
                die();
            } else {
                echo $buffer.$page_title_html;
                echo $content;
            }?>
        </div>
    </div>
</div>
</body>
</html>
