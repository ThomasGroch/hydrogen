<?php

/**
 * Type_phone_mini_view
 *
 * Quick view to send e-mail to a type_phone registered
 *
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
?>
<div itemscope itemtype="http://schema.org/Organization">
    <span itemprop="name"><?php echo $type_phone->description ?></span>
    
    <a href="<?php echo $type_phone->name ?>" itemprop="email">
        <?php echo $type_phone->name ?>
    </a>    
</div>
