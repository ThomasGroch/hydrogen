<tr id="email_<?php echo $email->id ?>">
    
    <td><span itemprop="name"><?php echo $email->type_email_name ?></span></td>
    <td><a href="mailto:<?php echo $email->email ?>" itemprop="email">
            <?php echo $email->email ?>
        </a>
    </td>
    
    <td><a class='delete' data-id="<?php echo $email->id ?>" href="<?php echo site_url('/email/ajax_delete/' . $email->id) ?>"> <?php echo lang('delete') ?> </a></td>
    
    <td><a class='edit' data-id="<?php echo $email->id ?>" data-p_id="<?php echo $email->p_id ?>"  href="<?php echo '#'; ?>"> <?php echo lang('edit_email') ?> </a></td>
</tr>