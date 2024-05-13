<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Spots - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f3fa;
        }
        .carousel-item img {
            width: 100%;
            height: 300px; /* Adjust height as needed */
            object-fit: cover;
        }
        .carousel {
            border: 3px solid #aee2e6;
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: #f8f9fa;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: auto;
        }
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .card {
            border: 2px solid #aee2e6;
            border-radius: 10px;
            background-color: #f8f9fa;
            margin-bottom: 20px;
        }
        .card img {
            width: 100%;
            height: 200px; /* Adjust height as needed */
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php include('include/nav.php'); ?>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div id="carouselExampleDark" class="carousel carousel-dark slide center">
            <div class="carousel-inner center">
                <div class="carousel-item active center" data-bs-interval="200">
                    <img src="<?php echo base_url('/uploads/image/image5.jpg') ?>" alt="Zoomable Image" id="zoom-image">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item center" data-bs-interval="200">
                    <img src="<?php echo base_url('/uploads/image/image3.jpg') ?>" alt="Zoomable Image" id="zoom-image">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item center">
                    <img src="<?php echo base_url('/uploads/image/image4.jpg') ?>" alt="Zoomable Image" id="zoom-image">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <img src="<?php echo base_url('/uploads/image/image4.jpg') ?>" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo base_url('/uploads/image/image5.jpg') ?>" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="<?php echo base_url('/uploads/image/image6.jpg') ?>" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>

</body>
</html>
