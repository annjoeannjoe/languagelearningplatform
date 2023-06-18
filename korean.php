<!DOCTYPE html>
<html>
<?php include 'nav.php'; ?>
<head>
  <title>Korean Language Learning</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    .container {
      margin-top: 20px;
    }

    .container-with-sidebar {
      display: flex;
    }

    .sidebar {
      background-color: #FFFDD6;
      padding: 20px;
      width: 200px;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar ul li {
      margin-bottom: 15px;
    }

    .sidebar ul li a {
      display: block;
      color: #333;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .sidebar ul li a:hover {
      color: #C6E6C3;
    }

    .sidebar ul li.active a {
      color: #C6E6C3;
      background-color: #FFD700;
      padding: 10px;
      border-radius: 4px;
    }

    .content {
      flex-grow: 1;
      padding: 20px;
      background-color: #FFFFFF;
      border: 1px solid #DDDDDD;
      border-radius: 4px;
    }

    .section-header {
      font-size: 20px;
      font-weight: bold;
      color: #333;
      margin-bottom: 10px;
    }

    .section-content {
      color: #777777;
      line-height: 1.6;
    }

    .section-content a {
      color: #337AB7;
      text-decoration: none;
    }

    .section-content a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col-12 text-center">
        <h3 style="background-color: #f5f5f5; padding: 10px;">
        <img src="images/korea.png" alt="Korea Flag" style="width: 50px; height: auto; vertical-align: middle;">
        <span style="vertical-align: middle;">Korean</span>
        </h3>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="container-with-sidebar">
          <div class="sidebar">
            <ul>
              <li><a href="lesson_materials.php"><i class="fas fa-book"></i> Materials</a></li>
              <li><a href="#grammar-exercises"><i class="fas fa-file-alt"></i> Exercises</a></li>
              <li><a href="#pronunciation-practice"><i class="fas fa-volume-up"></i> Practice</a></li>
              <li><a href="#quizzes"><i class="fas fa-question-circle"></i> Quizzes</a></li>
            </ul>
          </div>
          <div class="content">
            <div class="language-section" id="lesson-materials">
              <h2 class="section-header">Lesson Materials</h2>
              <div class="section-content">
                <p>Here you will find a collection of lesson materials for learning Japanese. Click on the links below to access the materials:</p>
                <ul>
                  <li><a href="korean_lesson1.php">Lesson 1: Hangul</a></li>
                  <li><a href="korean_lesson2.php">Lesson 2: Greeting in Korean</a></li>
                  <li><a href="korean_lesson3.php">Lesson 3: Numbers and Colors</a></li>
                </ul>
              </div>
            </div>

            <div class="language-section" id="grammar-exercises">
              <h2 class="section-header">Grammar Exercises</h2>
              <div class="section-content">
                <p>Test your understanding of Japanese grammar with these exercises:</p>
                <ul>
                  <li><a href="#">Exercise 1: Verb Conjugation</a></li>
                  <li><a href="#">Exercise 2: Particle Usage</a></li>
                  <li><a href="#">Exercise 3: Sentence Structure</a></li>
                  <li><a href="#">Exercise 4: Conditional Sentences</a></li>
                </ul>
              </div>
            </div>

            <div class="language-section" id="pronunciation-practice">
              <h2 class="section-header">Pronunciation Practice</h2>
              <div class="section-content">
                <p>Improve your Japanese pronunciation with these practice exercises:</p>
                <ul>
                  <li><a href="#">Practice 1: Vowel Sounds</a></li>
                  <li><a href="#">Practice 2: Consonant Sounds</a></li>
                  <li><a href="#">Practice 3: Pitch Accent</a></li>
                </ul>
              </div>
            </div>

            <div class="language-section" id="quizzes">
              <h2 class="section-header">Quizzes</h2>
              <div class="section-content">
                <p>Test your knowledge of Japanese with these quizzes:</p>
                <ul>
                  <li><a href="#">Quiz 1: Vocabulary</a></li>
                  <li><a href="#">Quiz 2: Grammar</a></li>
                  <li><a href="#">Quiz 3: Listening Comprehension</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    // Add active class to the clicked sidebar item
    $(document).ready(function() {
      $('.sidebar ul li a').click(function() {
        $('.sidebar ul li a').removeClass('active');
        $(this).addClass('active');
      });
    });
  </script>
</body>
</html>
