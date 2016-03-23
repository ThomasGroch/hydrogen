<tr class="address_<?php echo $address->id ?>">
    <?php
    echo '<td>' . $address->address1 . nbs() . (!empty($address->address2) ? ', ' . $address->address2 : '');
    echo (!empty($address->address3) ? ', ' . '<br />' . $address->address3 : ''  . '</td>');
    echo '<td>' . $address->zipcode . '</td>' ;
    echo ('<td>' . $address->city . ', ' . $address->state_acronym  . '</td>');
    echo '<td>' . $address->country  . '</td>';
    ?>
</tr>
<tr class="address_<?php echo $address->id ?>">
    <td> <a class='delete' data-id="<?php echo $address->id ?>"  href="<?php echo site_url('/address/ajax_delete/' . $address->id) ?>"> <?php echo lang('delete') ?> </a></td>
    
    <td colspan="3"><a class='edit' data-id="<?php echo $address->id ?>" data-p_id="<?php echo $address->p_id ?>"  href="<?php echo '#'; ?>"> <?php echo lang('edit_address') ?> </a></td>
</tr>