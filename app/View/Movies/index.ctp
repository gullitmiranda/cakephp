<h1><?php echo __('List movies'); ?></h1>

<ul class="media-list">
  <?php foreach ($movies as $movie): ?>
  <li class="media" id="<?php echo $movie['Movie']['id']; ?>">
    <a class="pull-left" href="#">
      <img class="media-object" alt="<?php echo $movie['Movie']['title']; ?>" style="width: 64px; height: 64px;" src="<?php echo $movie['Movie']['thumb']; ?>">
    </a>
    <div class="media-body">
      <h4 class="media-heading">
        <?php echo $this->Html->link(
          $movie['Movie']['title'],
          array('controller' => 'movies', 'action' => 'view', $movie['Movie']['id'])); ?>
      </h4>
      <p><?php echo $movie['Movie']['body']; ?></p>
      <div class="details">
        <span class="datetime created"><?php echo $movie['Movie']['created']; ?></span>
      </div>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
