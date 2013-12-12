<div class="movies form">
<?php echo $this->Form->create('Movie');?>
  <fieldset>
    <legend><?php echo __('Add Movie'); ?></legend>
    <?php
    echo $this->Form->input('title');
    echo $this->Form->input('body');
    echo $this->Form->input('movie_id', array("type" => "url"));
  ?>
  </fieldset>

<?php echo $this->Form->end(__('Submit')); ?>
</div>

