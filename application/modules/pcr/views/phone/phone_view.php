<?php

/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
?>
<?php $this->load->view('header'); ?>

<div itemscope itemtype="http://schema.org/Organization">
    <span itemprop="name"><?php echo $phone->type_phone_name ?></span>
    
    <a href="<?php echo $phone->number ?>" itemprop="email">
        <?php echo $phone->number ?>
    </a>    
</div>
<?php $this->load->view('footer'); ?>