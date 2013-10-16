<?php $url = array_reverse($this->uri->segment_array()); ?>
<?php $selected = $url[0]; ?>
<div class="col-md-3">
  <div class="sidebar">
    <ul class="nav sidenav">
        <li class="<?php echo ($selected == "huddersfield") ? "active" : ""; ?>">
          <a href="<?php echo site_url("about/huddersfield"); ?>">About Huddersfield</a>
        </li>
        <li class="<?php echo ($selected == "course") ? "active" : ""; ?>">
          <a href="<?php echo site_url("about/course"); ?>">About the Course</a>
        </li>
        <li class="<?php echo ($selected == "me") ? "active" : ""; ?>">
          <a href="<?php echo site_url("about/me"); ?>">About Me</a>
        </li>
    </ul>
  </div>
</div>