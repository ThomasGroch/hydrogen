<tr id="site_<?php echo $site->id ?>">
    
    <td><img src="<?php echo base_url() . $site->image ?>"></td>
    <td><a href="<?php echo $site->url ?>" target="_blanko"> <?php echo $site->name ?> </a></td>
    
    <td><a class='delete' data-id="<?php echo $site->id ?>" href="<?php echo site_url('/site/ajax_delete/' . $site->id) ?>"> <?php echo lang('delete') ?> </a></td>

    <td><a class='edit' data-id="<?php echo $site->id ?>" data-p_id="<?php echo $site->p_id ?>"  href="<?php echo '#'; ?>"> <?php echo lang('edit_site') ?> </a></td>
</tr>

