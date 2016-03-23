<?php $this->load->view('header'); ?>

<?php if ( isset($companies) ) : ?>
    <div id="items_view">
        <?php foreach ( $companies as $company ) : ?>
            <?php echo $company->name . nbs() . anchor('/company/use_as/' . $company->id, lang('use_as'), 'class="button"')?>
            <br />
        <?php endforeach; ?>
    </div>	
    <?php
endif;
?>

<?php $this->load->view('footer'); ?>