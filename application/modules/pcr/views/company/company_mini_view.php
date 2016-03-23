<?php

/**
 * Company_mini_view
 *
 * Quick view to send e-mail to a company
 *
 *
 * @copyright  2011 ARQABS
 * @version    $Id$
 */
?>
<tr>
<div itemscope itemtype="http://schema.org/Organization">
    <td><span itemprop="name"><?php echo $company->get_name() ?></span></td>
    
    <td>
    <a href="mailto:<?php echo $company->primary_email ?>" itemprop="email">
        <?php echo $company->primary_email ?>
    </a>
    </td>
</div>
</tr>
