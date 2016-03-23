<tr itemscope itemtype="http://schema.org/Person">
    <td><span itemprop="name"><?php echo $person->get_name() ?></span></td>
    
    <td><a href="mailto:<?php echo $person->primary_email ?>" itemprop="email">
        <?php echo $person->primary_email ?>
    </a>
    </td>
</tr>
