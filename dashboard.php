<?php
session_start();

// Simulasi database dalam bentuk array (seharusnya menggunakan database)
$users = [
    ["username" => "admin", "password" => "admin123"],
    ["username" => "user1", "password" => "user123"]
];

// Fungsi untuk mengecek login
function authenticate($username, $password, $users) {
    foreach ($users as $user) {
        if ($user["username"] === $username && $user["password"] === $password) {
            return true;
        }
    }
    return false;
}

// Proses form login/register
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $auth_type = $_POST["auth_type"];

    if ($auth_type == "login") {
        if (authenticate($username, $password, $users)) {
            $_SESSION["user"] = $username;
            echo "<script>alert('Login sukses! Selamat datang, $username');</script>";
        } else {
            echo "<script>alert('Username atau password salah!');</script>";
        }
    } elseif ($auth_type == "register") {
        $users[] = ["username" => $username, "password" => $password];
        echo "<script>alert('Registrasi sukses! Silakan login.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Landing Page</title>
    <style>
        /* Reset tampilan */
        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #000000;
        }

        /* Beranda 1 dengan background image */
        .beranda1 {
            background-image: url("gambar%20keperluan%20web%20HOTEL%20GO/image%2010.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Navbar */
        .navbar ul {
            position: absolute;
            top: 0;
            width: 90%;
            max-width: 1200px;
            margin: auto;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            color: white;
        }

        /* Hero Content */
        .hero-content h1, .hero-content h2 {
            margin: 0;
            font-size: 3rem;
        }

        /* Booking Form */
        .booking-form {
            background: rgba(255, 254, 254, 0.2);
            padding: 20px;
            border-radius: 20px;
            display: flex;
            gap: 10px;
        }

        .booking-form input, .booking-form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .destinations {
            padding: 50px;
            text-align: center;
            color: #fcfbfb;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            margin: 40px;
            grid-gap: 35px;
        }

        .grid > article {
            box-shadow: 5px 5px 5px 0px rgb(0, 0, 0);
            border-radius: 20px;
            text-align: left;
            background-color: rgb(0, 0, 0);
            width: 250px;
            transition: transform 0.3s;
        }

        .grid > article:hover {
            transform: scale(1.2);
        }

        /* Modal Login */
        .modal {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            margin: 15% auto;
            width: 300px;
            border-radius: 5px;
        }

        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <section class="beranda1">
        <nav class="navbar">
            <ul>
                <?php
                $menu = ["ROOMS", "OUR SERVICES", "AMENITIES", "GALLERY", "CONTACTS", "ABOUT US", "FAQ", "SIGN UP"];
                foreach ($menu as $item) {
                    echo "<li>$item</li>";
                }

                if (isset($_SESSION["user"])) {
                    echo "<li>Welcome, " . $_SESSION["user"] . " | <a href='logout.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='#' onclick='showModal()'>LOGIN</a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="hero-content">
            <h1>EXPERIENCE</h1>
            <h2>A VACATION WITH CLASS</h2>
            <p>YOU DESERVE IT!</p>
        </div>
        <div class="booking-form">
            <input type="text" placeholder="Hotel, City">
            <input type="text" placeholder="Check in - out">
            <input type="text" placeholder="Persons">
            <button>Check</button>
        </div>
    </section>

    <section class="destinations">
        <h2>Explore More Destination</h2>
        <div class="container">
            <main class="grid">
                <?php
                $hotels = [
                    ["Roynet Hotel", "Mapo-gu, Seoul, South Korea", "image 2.jpg"],
                    ["The Berkeley Hotel", "Bangkok, Thailand", "image 6.jpg"],
                    ["Shangri La Hotel", "London, UK", "image 7.jpg"],
                    ["Ecozy Dijiwa Hotel", "Bali, Indonesia", "image 4.jpg"],
                    ["Grand Prince Hotel", "Tokyo, Japan", "image 3.jpg"],
                    ["Chateau de Briancon", "Baune, France", "image 9.jpg"],
                    ["Bohol Coastal Hotel", "Tawala, Filipine", "image 8.jpg"],
                    ["Rezel Select Hotel", "Huadu, China", "image 5.jpg"]
                ];

                foreach ($hotels as $hotel) {
                    echo "<article>
                        <img src='gambar keperluan web HOTEL GO/$hotel[2]' width='250px' height='250px'>
                        <div class='konten'>
                            <h2>$hotel[0]</h2>
                            <p>$hotel[1]</p>
                        </div>
                    </article>";
                }
                ?>
            </main>
        </div>
    </section>

    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Login / Register</h2>
            <form method="POST">
                <label>Username:</label>
                <input type="text" name="username" required>
                
                <label>Password:</label>
                <input type="password" name="password" required>

                <label><input type="radio" name="auth_type" value="login" checked> Login</label>
                <label><input type="radio" name="auth_type" value="register"> Register</label>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function showModal() { document.getElementById('authModal').style.display = 'block'; }
        function closeModal() { document.getElementById('authModal').style.display = 'none'; }
    </script>
</body>
</html>
