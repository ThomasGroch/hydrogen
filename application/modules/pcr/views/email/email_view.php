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
    <span itemprop="name"><?php echo $email->type_email_name ?></span>
    
    <a href="mailto:<?php echo $email->email ?>" itemprop="email">
        <?php echo $email->email ?>
    </a>    
</div>
<?php $this->load->view('footer'); ?>