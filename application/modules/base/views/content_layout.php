<?php print_r($data);exit;?>
<?php $this->load->view('base/content_layout/content_header_view', $data); ?>

<?php $this->load->view($content, $data); ?>

<?php echo $data['pagination']; ?>
<?php $this->load->view('base/content_layout/content_footer_view', $data); ?>
