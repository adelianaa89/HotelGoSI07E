<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Go</title>
    <link rel="stylesheet" href="1.css">
</head>
<body>
    <header>
        <div class="hero">
            <nav class="navbar">
                <div class="nav-links">
                    <a href="#">ROOMS</a>
                    <a href="#">OUR SERVICES</a>
                    <a href="#">AMENITIES</a>
                    <a href="gallery.php">GALLERY</a>
                </div>
                <div class="nav-right">
                    <a href="#">CONTACTS</a>
                    <a href="about.php">ABOUT US</a>
                    <a href="#">FAQ</a>
                    <a href="tel:08889999333" class="call-btn">
                        <i class="fas fa-phone-alt"></i> 0812 2389 3234
                    </a>
                </div>
            </nav>
            <div class="hero-text">
                <h1>EXPERIENCE</h1>
                <h2>A VACATION WITH CLASS</h2>
                <p>YOU DESERVE IT!</p>
            </div>
        </div>
    </header>

    <section class="booking">
        <div class="booking-container">
            <label>
                <span>Check availability:</span>
                <input type="date">
            </label>
            <input type="date">
            <input type="number" placeholder="Persons">
            <button>Check</button>
        </div>
    </section>

<body>
        <section class="team-section">
        <h2 class="team-title">Our Team</h2>
        <div class="team-container">
            <?php
            $team = [
                ["Nama" => "Adelia Eka Putri", "NIM" => "23111031028", "Jobs" => "Front End"],
                ["Nama" => "Khadeeja Tatsbitha Aydin", "NIM" => "2311103147", "Jobs" => "Database"],
                ["Nama" => "Yessi Olivia Sari Purba", "NIM" => "2311103120", "Jobs" => "Server UI/UX"],
                ["Nama" => "Leni Marlina Awendu", "NIM" => "2311103124", "Jobs" => "Back End"]
            ];

            foreach ($team as $index => $member) {
                echo "<button onclick=\"showPopup('popup$index')\">{$member['Jobs']}</button>";
            }
            ?>
        </div>
    </section>

    <?php
    foreach ($team as $index => $member) {
        echo "
        <div id='popup$index' class='popup'>
            <div class='popup-content'>
                <p><strong>Nama:</strong> {$member['Nama']}</p>
                <p><strong>NIM:</strong> {$member['NIM']}</p>
                <p><strong>Jobs:</strong> {$member['Jobs']}</p>
                <button onclick=\"closePopup('popup$index')\">Tutup</button>
            </div>
        </div>";
    }
    ?>

    <script>
    function showPopup(id) {
        document.getElementById(id).style.display = "block";
    }

    function closePopup(id) {
        document.getElementById(id).style.display = "none";
    }
    </script>
</body>
</html>
