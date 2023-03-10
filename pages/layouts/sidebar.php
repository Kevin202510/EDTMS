<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="../assets/images/profiles/<?php echo $_SESSION['userEmail']; ?>/<?php echo $_SESSION['userProfile']; ?>">
          </div>
          <div class="user-name">
              <?php echo $_SESSION['userFullname']; ?>
          </div>
          <div class="user-designation">
              <?php echo $_SESSION['userRoleName'] ?>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../pages/index.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/rolesTable.php">
              <i class="icon-lock menu-icon"></i>
              <span class="menu-title">Roles</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/usersTable.php">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/categoriesTable.php">
              <i class="fa fa-list-alt menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fa fa-file-text-o menu-icon"></i>
              <span class="menu-title">Docs Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../pages/documentTable.php">Documents</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Achieves</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Send Documents</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">File Versions</a></li> -->
              </ul>
            </div>
          </li>
        </ul>
      </nav>