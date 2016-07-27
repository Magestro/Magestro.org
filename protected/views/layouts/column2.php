<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="content" class="well">
        <div class="row">
            <div class="col-xs-12">
                <?php
                $this->widget('CSubMenu', array(
                    'items' => $this->menu
                ));
                ?>
            </div><!-- sidebar -->
        </div>
        <br/>
        <div class="row">
            <div id="col-xs-12">
                <?php echo $content; ?>
            </div><!-- content -->
        </div>
    </div>
<?php $this->endContent(); ?>