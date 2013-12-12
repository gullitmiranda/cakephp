<h1><?php echo $movie['Movie']['title']?></h1>
<img class="img-thumbnail" alt="<?php echo $movie['Movie']['title']; ?>" src="<?php echo $movie['Movie']['thumb']; ?>">
<p>
  <?php echo __("Created at"); ?>
  <small><?php echo $movie['Movie']['created'] ?></small>
</p>

<p><?php echo $movie['Movie']['body']?></p>
