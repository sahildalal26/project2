<nav aria-label="Primary">
  <ul>
    <li>
      <a
        href="index.php"
        <?php if (isset($currentPage) && $currentPage === 'home') echo 'aria-current="page" class="is-active"'; ?>
      >Home</a>
    </li>
    <li>
      <a
        href="jobs.php"
        <?php if (isset($currentPage) && $currentPage === 'jobs') echo 'aria-current="page" class="is-active"'; ?>
      >Jobs</a>
    </li>
    <li>
      <a
        href="apply.php"
        <?php if (isset($currentPage) && $currentPage === 'apply') echo 'aria-current="page" class="is-active"'; ?>
      >Apply</a>
    </li>
    <li>
      <a
        href="about.php"
        <?php if (isset($currentPage) && $currentPage === 'about') echo 'aria-current="page" class="is-active"'; ?>
      >About</a>
    </li>
    <li>
      <a
        href="login.php"
        <?php if (isset($currentPage) && $currentPage === 'manage') echo 'aria-current="page" class="is-active"'; ?>
      >Manage</a>
    </li>

    <?php
      // Show logout button only on manage.php
      if (basename($_SERVER['PHP_SELF']) === 'manage.php') {
        echo '
        <li style="margin-left:auto;">
          <form action="logout.php" method="post" style="display:inline;">
            <button type="submit" class="btn btn-danger">Logout</button>
          </form>
        </li>';
      }
    ?>
  </ul>
</nav>
</header>
