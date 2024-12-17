<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css12.css" />
    <title> Projects</title>
  </head>
  <body>
    <nav>
      <div class="nav__content">
        <div class="logo"><a href="#">Yared.</a></div>
        <label for="check" class="checkbox">
          <i class="ri-menu-line"></i>
        </label>
        <input type="checkbox" name="check" id="check" />
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="project.php">Projects</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="admin.php">Admin</a></li>
        </ul>
      </div>
    </nav>

    <section id="projects" class="projects">
            <h2>Projects</h2>
            <div class="project-list">
                <div class="project-card">
                <h3>Weather App</h3>
                <p>A responsive weather app with live updates and forecast information.</p>
                </div>

                <div class="project-card">
                <h3>Task Tracker</h3>
                <p>A task management system to keep track of daily to-do lists.</p>
                </div>
                <div class="project-card">
                <h3>Recipe Finder</h3>
                <p>A search engine for recipes based on available ingredients.</p>
                </div>
                <div class="project-card">
                <h3>Portfolio Template</h3>
                <p>A clean and modern portfolio template for personal use.</p>
                </div>
                <div class="project-card">
                <h3>Movie Review App</h3>
                <p>An app that allows users to review and rate movies.</p>
                </div>
                <div class="project-card">
                <h3>Fitness Tracker</h3>
                <p>A fitness app to track workouts, calories, and daily activity.</p>
                </div>
                <div class="project-card">
                <h3>Online Quiz App</h3>
                <p>A quiz app with multiple categories and score tracking.</p>
                </div>
                <div class="project-card">
                <h3>Chat Application</h3>
                <p>A real-time chat application with support for multiple rooms.</p>
                </div>
                <div class="project-card">
                <h3>Expense Tracker</h3>
                <p>A tool to track expenses and visualize spending habits.</p>
                </div>
                <div class="project-card">
                    <h3>E-Commerce Website</h3>
                    <p>A responsive e-commerce platform with a clean user interface.</p>
                </div>
                
            <?php  
include("index1.php");     
$select = mysqli_query($conn, "SELECT * FROM products"); 
while ($row = mysqli_fetch_assoc($select)) { 
?>
 <div class="project-card">
    
    <div class="image">
    </div>
    <div class="products_text">
         <h3><?php echo $row['name']; ?></h3>
        <p>
         <?php echo $row['description']; ?>
        </p>
        <h3></h3>
        
        
    </div>
</div>
<?php 
}; 
?>

            
        </section>
  </body>
  <footer class="footer">
            <p>&copy; 2024 Yared. All Rights Reserved.</p>
        </footer>
</html>