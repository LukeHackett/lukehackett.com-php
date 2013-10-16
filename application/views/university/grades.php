<h2 id="grades">Grades <small>received this year</small></h2>
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Module Tutor</th>
      <th>Module Code</th>
      <th>Module Title</th>
      <th>Module Grade</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($assessments as $assessment): ?>
      <tr data-module="<?php echo $assessment->code; ?>">
        <td><?php echo $assessment->tutor; ?></td>
        <td><?php echo $assessment->code; ?></td>
        <td><?php echo $assessment->name; ?></td>
        <td><?php echo sprintf("%d%% (%s)", $assessment->module_grade, $assessment->module_result); ?></td>
        <td><button class="btn btn-sm btn-primary grade" type="button">Assessments</button></td>
      </tr>
      <tr class="<?php echo $assessment->code; ?>" style="display: none;">
        <th>Assessment</th>
        <th>Grade</th>
        <th colspan="3">Weight</th>
      </tr>
      <?php foreach($assessment->assessment as $grades): ?>
        <tr class="<?php echo $assessment->code; ?>" style="display: none;">
          <td><?php echo $grades->type; ?></td>
          <td><?php echo sprintf("%d%% (%s)", $grades->grade, $grades->result); ?></td>
          <td colspan="3"><?php echo sprintf("%d%%", $grades->weight); ?></td>
        </tr>
      <?php endforeach; ?>
      <tr class="<?php echo $assessment->code; ?>" style="display: none;">
        <td colspan="5">&nbsp;</td>
      </tr>
    <?php endforeach; ?>  
  </tbody>
</table>