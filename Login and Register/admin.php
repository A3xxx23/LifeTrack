
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="16x16" href="Img/favicon-16x16.png" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="CSS/admin.css" />
  <title>Admin Panel</title>
</head>
<body>
  <div class="container">
    <div class="admin-form-container">
      <form action="#" class="admin-form">
        <h2 class="title">Admin Login</h2>
        <div class="input-field">
          <i class="fas fa-user-shield"></i>
          <input type="text" placeholder="Admin Username" required />
        </div>
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Admin Password" required />
        </div>
        <input type="submit" value="Login" class="btn solid" />
        <p align="center">are you a <a href="index.php" class="text-blue" style="font-weight:600;text-decoration:none;">user?</a></p>
      </form>
    </div>
  </div>

  <script src="Scripts/admin.js"></script>
</body>
</html>
