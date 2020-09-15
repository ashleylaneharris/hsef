<?php require 'parts/head.php'; ?>

<?php $authAccount = AuthAccount::get(); ?>

<div class="hsef">
  <nav class="navbar navbar-dark navbar-custom bg-darkgreen fixed-top">
    <a href="/hsef/?page=dashboard" class="navbar-brand">HSEF System</a>
    <?php if ($authAccount->isAuthenticated()) : $operator = Operator::get(); ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainMenu">
        <div class="navbar-nav">
          <?php if ($operator->hasReqEntitlement('owner')) : ?>
            <span class="navbar-text">Owner Tools</span>
            <a href="/hsef/?page=accessManagement" class="nav-item nav-link text-gold">Global Access Management</a>
          <?php endif; ?>
          <?php if ($operator->hasReqEntitlement('moderator')) : ?>
            <span class="navbar-text">Moderator Tools</span>
            <a href="/hsef/?page=adminManagement" class="nav-item nav-link text-gold">Admin Management</a>
          <?php endif; ?>
          <?php if ($operator->hasReqEntitlement('admin')) : ?>
            <span class="navbar-text">Admin Tools</span>
            <a href="/hsef/?page=judgeManagement" class="nav-item nav-link text-gold">Judge Management</a>
            <a href="/hsef/?page=studentManagement" class="nav-item nav-link text-gold">Student Management</a>
            <a href="/hsef/?page=projectManagement" class="nav-item nav-link text-gold">Project Management</a>
            <a href="/hsef/?page=scoreManagement" class="nav-item nav-link text-gold">Score Management</a>
          <?php endif; ?>
          <?php if ($operator->hasReqEntitlement('judge')) : ?>
            <span class="navbar-text">Judge Tools</span>
            <a href="/hsef/?page=judgeSchedule" class="nav-item nav-link text-gold">Judge Schedule</a>
            <a href="/hsef/?page=judgingForm" class="nav-item nav-link text-gold">Judging Form</a>
          <?php endif; ?>
          <?php if ($operator->hasReqEntitlement('viewer')) : ?>
            <span class="navbar-text">Other Tools</span>
            <a href="/hsef/?page=finalScores" class="nav-item nav-link text-gold">Final Scores</a>
          <?php endif; ?>
          <?php if (isset(Post::get()->LOGOUT)) {
            $authAccount->logout();
            redirect('login');
          } ?>
          <form method="POST" class="form-inline">
            <button class="btn btn-lg btn-warning my-4 font-weight-bolder" type="submit" name="LOGOUT">Logout</button>
          </form>
        </div>
      </div>
    <?php endif; ?>
  </nav>

  <?php if (isset(Session::get()->flashMessage)) : ?>
    <article class="limit-width-sm">
      <div class="alert alert-danger">
        <h4 class="alert-heading">Alert: </h4>
        <p>
          <?php echo Session::get()->flashMessage; ?>
        </p>
      </div>
    </article>
  <?php unset(Session::get()->flashMessage); endif; ?>

  <?php require "pages/".Session::get()->page.".php"; ?>

  <footer>
    <p>Made by Group 4 for N-342</p>
  </footer>
</div>

<?php require 'parts/foot.php'; ?>
