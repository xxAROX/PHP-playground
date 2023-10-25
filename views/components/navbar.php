<?php
use xxAROX\Playground\utils\Utils;
?>

<nav class="navbar navbar-expand" aria-label="Navigation">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Playground</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link <?= Utils::isActive() ?>" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" disabled>Link</a>
          </li>
          <?php 
          if (!is_null($user) && $user->isAdmin()): ?>
          <li class="nav-item">
            <a class="nav-link <?= Utils::isActive('admin-panel') ?>" href="/?action=admin-panel">Admin-Panel</a>
          </li>
          <?php endif; ?>
        </ul>
        <form role="search">
          <?php if ($user != null): ?>
            <div class="dropdown">
              <button class="d-flex align-items-center text-white dropdown-toggle" id="profile-dropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent !important; border-color: transparent !important;">
                <img src="https://picsum.photos/256" alt="Avatar" class="rounded-circle me-2 border border-2" width="32" height="32">
                <strong class="badge"><?= $user->getEmail() ?></strong>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile-dropdown">
                <li>
                  <a class="dropdown-item" href="/?action=settings">Settings</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/?action=logout"><span style="color: crimson;">Logout</span></a>
                </li>
              </ul>
            </div>
          <?php endif ?>
        </form>
      </div>
    </div>
  </nav>