<?php if ( isset($items) ) : ?>
    <div id="items_view">

        <?php foreach ( $items as $item ) : ?>
            <?php $this->load->view('role/role_mini_view', array('role' => $item)) ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<script type="text/javascript">
    jQuery(document).ready(function() {    				
        function set_deletable() {
            jQuery('.delete').click(function() {
                id = $(this).attr('data-id');
                $.post('<?php echo site_url("role/ajax_delete") ?>', {id: id }, 
                function(info) {
                    jQuery("#role_"+id).remove();
                    $("#info").html(info.msg); 
                    message()}, 
                "json");
                return false;
            });		
                    
            $('.delete').confirm({
                dialogShow: 'fadeIn',
                dialogSpeed: 'slow',
                wrapper:'<span class="confirm"></span>'
            });
        }
        
        function prepare() {
            set_deletable();
        }
        prepare(); 

    });
</script>