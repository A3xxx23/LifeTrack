<?php
session_start();
include_once('./Database/connection.php');

// if(isset($_SESSION['name']) && isset($_SESSION['username'] )){

// }
$_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página Web Portfolio Segundo Parcial" <meta name="keywords"
        content="HTML, CSS, JavaScript, Jquery,Boostrap,Portfolio, Pagina de portafolio">
    <meta name="author" content="Angel Aquino">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="Img/favicon-32x32.png" />
    <title>Home</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <style>
                * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    border: none;
    outline: none;
    scroll-behavior: smooth;
    font-family: 'Poppins';
  }
  
  :root {
    --text-color: #333;
    --second-color: #4481eb;
    --color-body: #fff;
    --header-color: #5995fd;
  }
  
  html {
    font-size: 62.5%;
    overflow-x: hidden;
  }
  
  body {
    background-color: var(--color-body);
  }
  
  section {
    min-height: 100vh;
    padding: 10rem 9% 10rem;
    margin-top: 7rem;
  }
  /* ---------------------------- Header and Navbar ------------------------------------*/
  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 3rem 9%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
    background-color: var(--color-body);
    box-shadow: 0 0 15px var(--second-color);
  }
  
  .header::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg,
        transparent,
        rgba(164, 212, 243, 0.801),
        transparent);
    transition: 0.5s;
  }
  
  .header:hover::before {
    left: 100%;
  }

  .logo {
    font-size: 3rem;
    text-decoration: none;
    font-weight: bold;
    cursor: default;
    transition: 0.3s ease;
    margin-right: auto;
  }
  
  .logo:hover {
    transform: scale(1.1);
  }
  
  .logo span {
    color: var(--second-color);
    text-shadow: 0 0 15px #4481eb;
  }
  
  .navbar a {
    color: var(--text-color);
    font-size: 1.8rem;
    text-decoration: none;
    margin-left: 3rem;
    transition: 0.3s;
    font-weight: 700;
  }
  
  .navbar a:hover{
    color: var(--second-color);
  }
  
  .navbar:hover a:not(:hover) {
    color: var(--second-color);
    opacity: 1;
    filter: blur(1px);
  }
  
  #menu-icon {
    font-size: 36px;
    color: var(--text-color);
    display: none;
  }

  /* ----------------------------Responsive design navbar------------------------------------*/
  @media screen and (max-width: 1018px) {
    #menu-icon {
        display: block;
    }
  
    .navbar {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        padding: 0.5rem 4%;
        display: none;
        margin: 1.5rem 0;
    }
  
    .navbar.active {
        display: block;
        background-color: var(--color-body);
    }
  
    .navbar a {
        display: block;
        margin: 1.5rem 0;
    }
  
    .nav-bg {
        position: absolute;
        top: 70px;
        left: 0;
        width: 100%;
        height: 295px;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        z-index: 99;
        display: none;
    }
  
    .nav-bg.active {
        display: block;
    }
  }
  
  @media (max-width: 995px) {
    .header {
      padding: 1.25rem 4%;
    }
    .nav-bg {
      position: absolute;
      top: 70px;
      left: 0;
      width: 100%;
      height: 295px;
      border-bottom: 2px solid rgba(255, 255, 255, 0.2);
      z-index: 99;
      display: none;
    }
    .navbar.active {
      display: block;
      background-color: var(--color-body);
    }
    .navbar a {
      display: block;
      margin: 1.5rem 0;
    }
  }
  
  @media (max-width: 768px) {
    #menu-icon {
      display: block;
    }
  
    .logo{
      font-size: 2.6rem;
    }
  
    .navbar {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      padding: 0.5rem 4%;
      display: none;
    }
    .navbar.active {
      display: block;
      background-color: var(--color-body);
    }
    .navbar a {
      display: block;
      margin: 1.5rem 0;
    }
    .nav-bg {
      position: absolute;
      top: 70px;
      left: 0;
      width: 100%;
      height: 295px;
      border-bottom: 2px solid rgba(255, 255, 255, 0.2);
      z-index: 99;
      display: none;
    }
    .nav-bg.active {
      display: block;
    }

    .text-animation span{
      font-size: 2.3rem;
    }

    .home-content .welcome{
      font-size: 2rem;
    }
  }
  
 /* ----------------------------Footer------------------------------------*/
  .footer {
    position: relative;
    bottom: 0;
    width: 100%;
    padding: 40px 0;
    background-color: #333;
    animation: fadeInUp 3s ease;
  }
  
  .footer .social {
    text-align: center;
    padding-bottom: 25px;
    color: var(--second-color);
  }
  
  .footer .social a {
    font-size: 3rem;
    display: inline-block;
    align-items: center;
    width: 5rem;
    height: 5rem;
    background: transparent;
    border: 0.2rem solid var(--second-color);
    border-radius: 50%;
    color: var(--second-color);
    margin: 0 10px;
    transition: 0.3s ease-in-out;
    line-height: 5rem;
  }
  
  .footer .social a:hover {
    color: var(--text-color);
    box-shadow: 0 0 25px var(--second-color);
    background-color: var(--second-color);
    transform: scale(1.2) translateY(-10px);
    filter: drop-shadow(0 0 15px #fff);
  }
  
  .footer ul {
    margin-top: 0;
    padding: 0;
    font-size: 2rem;
    line-height: 1.6;
    margin-bottom: 0;
    text-align: center;
  }
  
  .footer ul li a:hover {
    color: #ededed;
    border-bottom: 3px solid transparent;
    transition: 0.5s ease;
    transform: scale(1.1);
    font-size: 2rem;
  }
  
  .footer ul li a {
    border-bottom: 3px solid var(--second-color);
    text-decoration: none;
    color: #ededed;
  }
  
  .footer ul li {
    display: inline-block;
    padding: 0 15px;
  
  }
  
  .footer .copyright {
    margin-top: 50px;
    text-align: center;
    font-size: 2rem;
    color: #ededed;
  }

  
  
  @media screen and (max-width: 375px) {
  
    .footer .copyright {
        margin-top: 50px;
        text-align: center;
        font-size: 1.3rem;
        color: #ededed;
    }
  
  
    .footer ul li a:hover {
        color: #ededed;
        border-bottom: 3px solid transparent;
        transition: 0.5s ease;
        transform: scale(1.1);
        font-size: 1.3rem;
    }
  
  
    .social-media a {
        font-size: 1.3rem;
        width: 2.5rem;
        height: 3rem;
        margin: 0 0.7rem;
    }
  
  }
  
  @media screen and (max-width: 480px) {
    .footer .social {
        display: flex;
        justify-content: center;
        gap: 5px;
    }
  
    .footer .social a {
        font-size: 2.3rem;
        width: 4rem;
        height: 4rem;
        line-height: 4rem;
        margin: 0 3px;
    }
  
    .footer ul {
        margin-top: 10px;
        padding: 0;
        font-size: 1.3rem;
        line-height: 1.6;
        margin-bottom: 0;
        text-align: center;
    }
  
  }
  
  /* Responsive tablets (481px a 1024px) */
  @media screen and (min-width: 481px) and (max-width: 1024px) {
    .footer .social a {
        font-size: 2.5rem;
        width: 4.5rem;
        height: 4.5rem;
        line-height: 4.5rem;
    }
  
    .footer ul {
        font-size: 1.5rem;
    }
  }
  
  /* Responsive (1025px a 1280px) */
  @media screen and (min-width: 1025px) and (max-width: 1280px) {
    .footer .social a {
        font-size: 2.8rem;
        width: 4.8rem;
        height: 4.8rem;
        line-height: 4.8rem;
    }
  
    .footer ul {
        font-size: 1.8rem;
    }
  }

  .grid-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    padding: 20px;
    margin: 0;
}

.grid-items {
    border: 2px solid #4481eb;
    padding: 20px;
    text-align: center;
    align-items: center;
    align-content: center;
    margin-top: 10px;
    transition: 0.5s ease-in-out;
    font-size: 2rem;
}

.grid-items:hover {
    background-color: #4481eb;
    color: #333;
}

.Home {
  align-items: center;
  justify-content: center;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.home-content{
  align-items: center;
  justify-content: center;
  display: flex;
  flex-direction: column;
  text-align: center;
  margin-top: 3rem;
}

.home-content h3 {
  font-size: 4rem;
  font-weight: 750;
  align-items: center;
  justify-content: center;
  display: flex;
}

.home-content h1 {
  font-size: 6rem;
  font-weight: 800;
  align-items: center;
  justify-content: center;
  display: flex;
}

.home-content h3 span {
  color: var(--second-color);
  margin-left: 10px;
}

.home-content p {
  font-size: 2.1rem;
  width: 100%;
  display: flex;
  gap: 10px;
  margin-top: 20px;
}

.home-content h4{
  font-size: 2rem;
  margin-top: 25px;
}

            </style>
</head>

<body>
    <!-- Header and Navbar design -->

    <header class="header">
        <a href="Home.php" class="logo"><span>LifeTrack</span></a>
        <i class='bx bx-menu' id="menu-icon"></i>
        <nav class="navbar">
            <a href="Home.php">Home</a>
            <a href="calendar.php">Calendar</a>
            <a href="kanban.php">Kanban</a>
            <a href="Pomodoro.php">Pomodoro</a>
            <a href="To-Do list.php">To-Do list</a>
            <a href="index.php">Logout</a>
        </nav>

    </header>
    <div class="nav-bg"></div>

    <section class="Home" id="Home">
        <div class="home-content">
            <h3 class="welcome">Welcome, <span class="text-animation"><?=$_SESSION['name'];?></span></h3>
            <h4>You take care of studying, our algorithm organizes it for you </h4>
        </div>
    </section>

    <section id="elements">
        <div class="grid-container">
            <div class="grid-items">
                <h4 style="color: #1e1e1f; font-size: 3rem;">Calendar</h4>
                <p>Keeps your events and appointments in one place, making it easier to plan your day-to-day life.</p>
            </div>

            <div class="grid-items">
                <h4 style="color: #1e1e1f; font-size: 3rem;">Kanban</h4>
                <p>It facilitates the management of tasks at different stages, optimizing the work process and reducing stress.</p>
            </div>

            <div class="grid-items">
                <h4 style="color: #1e1e1f; font-size: 3rem;">Pomodoro</h4>
                <p>Improve concentration through interval work, helping you stay focused on specific tasks.</p>
            </div>

            <div class="grid-items">
                <h4 style="color: #1e1e1f; font-size: 3rem;">To-Do List</h4>
                <p>Visualize and prioritize your daily activities, allowing you to focus on what really matters.</p>
            </div>

            <div class="grid-items">
                <h4 style="color: #1e1e1f; font-size: 3rem;">Habit Management</h4>
                <p>It reinforces consistency and improves self-control, helping you form positive long-term habits.</p>
            </div>

            <div class="grid-items">
                <h4 style="color: #1e1e1f; font-size: 3rem;">Friendly Interface</h4>
                <p>Intuitive design that makes navigation easy, allowing any user, regardless of their technical level, to enjoy the app.</p>
            </div>
        </div>
    </section>
     

    <footer class="footer" id="Contact">
        <div class="social">
            <a href="https://www.linkedin.com/in/angel-emilio-aquino-a90574337/" target="_blank"><i
                    class="bi bi-linkedin"></i></a>
            <a href="https://www.instagram.com/angel_aquino_09/" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://github.com/A3xxx23" target="_blank"><i class="bi bi-github"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100017551052803" target="_blank"><i
                    class="bi bi-facebook"></i></a>
            <a href="tel:+18094038309"
                target="_blank"><i class="bi bi-telephone"></i></a>
            <a href=" mailto:angelemilioaquino6@gmail.com " target="_blank" <i class="bi bi-envelope"></i></a>
        </div>
        <ul class="list">
            <li><a
                    href="https://es.wikipedia.org/wiki/Preguntas_frecuentes#:~:text=El%20término%20preguntas%20frecuentes%20(traducción,para%20un%20tema%20en%20particular.">FAQ</a>
            </li>
            <li><a href="https://www.scnsoft.com/software-development/services">Services</a></li>
            <li><a href="https://www.eitb.eus/es/noticias/tecnologia/">Notices</a></li>
            <li><a href="https://mailchimp.com/es/resources/how-to-write-a-privacy-policy/">Privacy Policies</a></li>
        </ul>

        <p class="copyright">
            &copy; Created by Angel E. (2024) | All rights reserved.
        </p>

    </footer>
     <!-- Library text-->
     <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
        const menuIcon = document.querySelector('#menu-icon');
const navbar = document.querySelector('.navbar');
const navbg = document.querySelector('.nav-bg');
menuIcon.addEventListener('click', () => {
  menuIcon.classList.toggle('bx-x');
  navbar.classList.toggle('active');
  navbg.classList.toggle('active');
});

var typed = new Typed('.text-animation', {
    strings: [''],
    typeSpeed: 80,
    backSpeed: 100,
    backDelay: 1200,
    loop: true,
  });
    </script>
</body>

</html>