<!DOCTYPE html>
<html>
<head>
  <title>Language Learning Platform</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    /* Custom CSS styles */
    .header {
      background-color: #C6E6C3;
      padding: 20px;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .nav-link {
      color: #333;
      font-weight: bold;
    }

    .nav-link:hover {
      color: #C6E6C3;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
      background-color: #FFFDD6; /* Updated color for the dropdown menu */
      border: none;
      border-radius: 0;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .dropdown-item {
      color: #333;
      font-weight: bold;
    }

    .dropdown-item:hover {
      background-color: #E7E7E7 ; /* Updated hover color for the dropdown items */
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand logo" href="#">Language Learning Platform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'home.php') ? 'active' : ''; ?>">
              <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item dropdown <?php echo (basename($_SERVER['PHP_SELF']) == 'japanese.php' || basename($_SERVER['PHP_SELF']) == 'cantonese.php' || basename($_SERVER['PHP_SELF']) == 'korean.php') ? 'active' : ''; ?>">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Learn
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'japanese.php') ? 'active' : ''; ?>" href="japanese.php">Japanese</a>
                <a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'cantonese.php') ? 'active' : ''; ?>" href="cantonese.php">Cantonese</a>
                <a class="dropdown-item <?php echo (basename($_SERVER['PHP_SELF']) == 'korean.php') ? 'active' : ''; ?>" href="korean.php">Korean</a>
              </div>
            </li>
            <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'forum.php') ? 'active' : ''; ?>">
              <a class="nav-link" href="forum.php">Forum</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <!-- Rest of the content goes here -->

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
