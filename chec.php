<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="st2.css">
</head>
<body>
    <div class="container">
        
        <header class="navbar">
            <div class="logo">My Portfolio</div>
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="admin.php">Add Projects</a></li>
                </ul>
            </nav>
        </header>
        <section class="hero">
            <h1>Hello, I'm Yared Girma</h1>
            <p>Full Stack Developer</p>
            <a href="#projects" class="btn">Explore My Work</a>
        </section>
        <section id="projects" class="projects">
            <h2>Projects</h2>
            <div class="project-list">
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
        <section id="contact" class="contact">
            <h2>Contact Me</h2>
            <p>Feel free to reach out for collaborations or just to say hello!</p>
            <p>Email: <a href="mailto:yared@.com">yared@gmail.com</a></p>
        </section>
        <footer class="footer">
            <p>&copy; 2024 Yared. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
