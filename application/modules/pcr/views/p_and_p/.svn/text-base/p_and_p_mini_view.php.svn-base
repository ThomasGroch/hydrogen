<div>
    <?php
    echo $p_and_p->p_id. '-' . $p_and_p->p_id_username . nbs() . lang('has_relation_with') . nbs() . $p_and_p->p_id1. '-' . $p_and_p->p_id1_username;
    echo '<br />';
    echo lang('has_role') . nbs() . $p_and_p->role_id. '-' . $p_and_p->role_name;
    echo '<br />';
    echo lang('started_in') . nbs() . brazilian_datetime($p_and_p->start_date) . nbs() . lang('and_finished_in') . nbs() . brazilian_datetime($p_and_p->end_date);
    ?>
    <br /><a href="<?php echo site_url('/p_and_p/delete/' . $p_and_p->id) ?>"> <?php echo lang('delete') ?> </a>
</div>