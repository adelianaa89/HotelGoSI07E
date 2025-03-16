<?php
$team_members = [
    ["name" => "Adelia Eka Putri", "nim" => "2311103028", "jobs" => "Frond End"],
    ["name" => "Khadeeja Tatsbitha Aydin", "nim" => "2311103147", "jobs" => "Database"],
    ["name" => "Yessi Olivia Sari Purba", "nim" => "231103120", "jobs" => "Server UI/UX"],
    ["name" => "Leni Marlina Awendu", "nim" => "2311103124", "jobs" => "Back End"],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            background: #f4f4f4; 
            margin: 0; 
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1 {
            color: #333;
        }
        .team-buttons {
            margin-top: 20px;
        }
        button {
            background:rgb(0, 0, 0);
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background:rgb(61, 61, 61);
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .close-btn {
            background: black;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>About Us</h1>
        <p>Team Members</p>
        <div class="team-buttons">
            <?php foreach ($team_members as $index => $member): ?>
                <button onclick="showPopup(<?php echo $index; ?>)"> <?php echo $member['name']; ?></button>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="overlay" id="overlay" onclick="hidePopup()"></div>
    <div class="popup" id="popup">
        <p id="popupContent"></p>
        <button class="close-btn" onclick="hidePopup()">Tutup</button>
    </div>

    <script>
        var members = <?php echo json_encode($team_members); ?>;

        function showPopup(index) {
            document.getElementById('popupContent').innerHTML = "<strong>Nama:</strong> " + members[index].name + "<br><strong>NIM:</strong> " + members[index].nim + "<br><strong>Jobs:</strong> " + members[index].jobs;
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</body>
</html>
