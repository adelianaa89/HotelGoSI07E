<?php
$categories = ['Bathroom', 'Bedroom', 'Gym', 'Lobby', 'Restaurant', 'Rooftop Area', 'Swimming Pool'];
$baseDir = 'images/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Hotel Go</title>
    <link rel="stylesheet" href="1.css">
    <style>
        .gallery {
            text-align: center;
            padding: 20px;
        }
        .category {
            margin-bottom: 30px;
        }
        .category h3 {
            margin-bottom: 10px;
            font-size: 24px;
        }
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }
        .gallery-item {
            width: 200px;
            height: 150px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }
        .gallery-item:hover {
            transform: scale(1.1);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }
        .modal img {
            max-width: 80%;
            max-height: 80%;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-links">
                <a href="index.php">HOME</a>
                <a href="#">ROOMS</a>
                <a href="#">OUR SERVICES</a>
                <a href="#">AMENITIES</a>
                <a href="gallery.php">GALLERY</a>
            </div>
        </nav>
    </header>

    <section class="gallery">
        <h2>Gallery</h2>
        <?php foreach ($categories as $category): ?>
            <?php 
            $dir = $baseDir . $category . '/'; 
            $images = glob($dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
            ?>
            <div class="category">
                <h3><?php echo $category; ?></h3>
                <div class="gallery-container">
                    <?php foreach ($images as $image): ?>
                        <div class="gallery-item" onclick="openModal('<?php echo $image; ?>')">
                            <img src="<?php echo $image; ?>" alt="<?php echo $category; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <div class="modal" id="imageModal" onclick="closeModal()">
        <img id="modalImage" src="" alt="">
    </div>

    <script>
        function openModal(src) {
            document.getElementById("modalImage").src = src;
            document.getElementById("imageModal").style.display = "flex";
        }
        function closeModal() {
            document.getElementById("imageModal").style.display = "none";
        }
    </script>
</body>
</html>
