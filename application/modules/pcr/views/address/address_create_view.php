<?php $this->load->view('header') ?>

<?php $this->load->view('pcr/address/address_create_form') ?>

<?php $this->load->view('footer') ?>

<script>
jQuery(document).ready(function($) {
    $("#selectstate").bind("change",function(){
        $("#citieswrapper").load("<?php echo site_url('address/get_city'); ?>", {
            state_id: $(this).val()
        } );
    })
});
</script>