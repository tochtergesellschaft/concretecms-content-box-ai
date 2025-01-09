<?php

defined('C5_EXECUTE') or die(_('Access Denied.'));

/** @var \Concrete\Package\TgsContentBox\Model\ContentBox $cb */
?>
<div id="ccm-block-tgs-content-box-bid-<?php echo $cb->getBlockId(); ?>"
     class="ccm-block-tgs-content-box default image-left">
    <div class="tgs-content-box-body">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <?php if ($cb->hasImage()) { ?>
                <div class="tgs-content-box-media">
                    <figure>
                        <?php
                        /** @var \Concrete\Core\Html\Image $htmlImage */
                        $file = $cb->getImageFile();
                        $htmlImage = app('html/image', ['f' => $file]);

                        $imageTag = $htmlImage->getTag();
                        $imageTag->setAttribute("width", $file->getAttribute('width'));
                        $imageTag->setAttribute("height", $file->getAttribute('height'));
                        $imageTag->setAttribute('alt', t($cb->getImageAlt()));
                        $imageTag->addClass('img');
                        $imageTag->addClass('img-fluid');
                        $imageTag->addClass('img-responsive');
                        ?>
                        <?php print $imageTag; ?>
                        <?php if (!empty($cb->getImageLegend())) { ?>
                        <figcaption><?php echo t($cb->getImageLegend()); ?></figcaption>
                        <?php } ?>
                    </figure>
                </div>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php if ($cb->getText()) { ?>
                <div class="tgs-content-box-text">
                    <?php echo t($cb->getText()); ?>
                </div>
                <?php } ?>
                <?php if ($cb->hasLink()) { ?>
                <div class="tgs-content-box-link">
                    <a class="btn btn-<?php echo $cb->getButtonType(); ?>"
                       href="<?php echo $cb->getLink(); ?>"
                       target="<?php echo $cb->getLinkTarget(); ?>"
                       rel="<?php echo $cb->getLinkRel(); ?>"><?php echo t($cb->getLinkText()); ?></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
