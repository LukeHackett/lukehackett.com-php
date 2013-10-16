<h2 id="modules">Modules <small>undertaken this year</small></h2>
<?php foreach($modules as $module): ?>
  <h3 id="<?php echo $module->code; ?>"><?php echo $module->name; ?></h3>
  <p><?php echo $module->description; ?></p>
  <a href="<?php echo base_url(PUBLIC_FILES_DIR . $module->specification); ?>" class="btn btn-sm btn-primary">Download Module Specification</a>
  <hr>
<?php endforeach; ?>