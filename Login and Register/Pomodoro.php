<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomodoro Timer</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="CSS/Home.css">
    <link rel="icon" type="image/png" sizes="32x32" href="Img/favicon-32x32.png" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Header and Navbar design -->

<header class="header">
        <a href="Pomodoro.php" class="logo"><span>LifeTrack</span></a>
        <i class='bx bx-menu' id="menu-icon"></i>
        <nav class="navbar">
            <a href="Home.php">Home</a>
            <a href="calendar.php">Calendar</a>
            <a href="kanban.php">Kanban</a>
            <a href="Pomodoro.php">Pomodoro</a>
            <a href="To-Do list.php">To-Do list</a>
            <a href="index.php">Logout</a>
        </nav>
        <div class="nav-bg"></div>
    </header>
    
<div id="timer-message">Please select a timer before starting.</div>

<div class="container" id="Container">
      <div class="timer">
        <h1>🍅 Pomodoro Timer</h1>

        <div class="button-container">
          <button class="button" id="pomodoro-session">Pomodoro</button>
          <button class="button" id="short-break">Short Break</button>
          <button class="button" id="long-break">Long break</button>
        </div>

        <div id="pomodoro-timer" class="timer-display" data-duration="25.00">
          25:00
        </div>

        <div id="short-timer" class="timer-display" data-duration="5.00">
          5:00
        </div>

        <div id="long-timer" class="timer-display" data-duration="10.00">
          10:00
        </div>

        <div id="buttons">
          <button id="start">START</button>
          <button id="stop">STOP</button>
        </div>
      </div>
    </div>

    <!-- Script JS -->
    <script src="Scripts/pomodoro.js"></script>
</body>
</html>