<?php if (!Operator::get()->hasOneOfReqEntitlement(['owner', 'moderator', 'admin'])) {
  redirect('exception', 'You do not have permission to view this page');
  die();
} ?>
<h1>Student Management</h1>
