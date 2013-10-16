<div class="jumbotron subhead">
  <div class="container">
    <h1><?php echo $jumbo_header; ?></h1>
    <p class="lead"><?php echo $jumbo_lead; ?></p>
  </div>
</div>

<div class="container">
  <div class="row">
    <!-- Mini Sidebar -->
    <?php $this->load->view('university/sidebar'); ?>
    <!-- Page Content -->    
    <div class="col-md-9">
      <?php if($year == 3): ?>
        <!-- Placement -->
        <?php $this->load->view('university/placement'); ?>
      <?php endif; ?>
      <!-- Modules -->
      <?php $this->load->view('university/modules'); ?>
      <!-- Grades -->
      <?php $this->load->view('university/grades'); ?>
      <!-- Spacer -->
      <br class="spacer"/>
    </div>
  </div>
</div>