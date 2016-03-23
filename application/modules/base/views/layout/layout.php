<?php $this->load->view($data['layout'] .'/header', $data); ?>

<?php $this->load->view($content, $data); ?>

<?php echo $data['pagination']; ?>
<?php $this->load->view($data['layout'] .'/footer', $data); ?>
