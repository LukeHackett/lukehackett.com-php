<div class="col-md-3">
  <div class="sidebar">
    <ul id="sidebar" class="nav sidenav">
      <?php if($year == 3): ?>
        <li class="active"><a href="#placement">Placement</a></li>
        <li><a href="#modules">Modules</a>
      <?php else: ?>
        <li class="active"><a href="#modules">Modules</a>
      <?php endif ?>
      
        <ul class="nav">
          <?php foreach ($modules as $index => $module): ?>
            <li><a href="#<?php echo $module->code;?>"><?php echo $module->name;?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>

      <li><a href="#grades">Grades</a></li>
    </ul>
  </div>
</div>
