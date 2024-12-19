document.querySelector(".admin-form").addEventListener("submit", (e) => {
  e.preventDefault(); // Evita el envío del formulario
  const username = document.querySelector('input[placeholder="Admin Username"]').value;
  const password = document.querySelector('input[placeholder="Admin Password"]').value;

  // Verificación básica (para pruebas)
  if (username === "admin" && password === "12345") {
    alert("Welcome, Admin!");
    // Redirige al panel de administración
    window.location.href = "user.php";
  } else {
    alert("Access Denied: Invalid credentials.");
  }
});