<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

if (isset($_GET["parking"]) && !empty($_GET["parking"])) {
    $filter = [];

    foreach ($hotels as $hotel) {
        $park = $hotel["parking"] ? "yes" : "no";
        if ($park == $_GET["parking"]) {
            $filter[] = $hotel;
        }
    }
    $hotels = $filter;
}
if (isset($_GET["vote"]) && !empty($_GET["vote"])) {
    $vote = $_GET["vote"];
    $hotels = array_filter($hotels, fn ($vote_value) => $vote_value["vote"] >= $vote);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./img/icon.png">
    <title>Table Hotel</title>

    <!-- link to bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- link to css -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>

    <div class="container d-flex flex-column align-items-center">

        <h1 class="text-center title">Find Your Hotel</h1>

        <!-- FORM SECTION -->
        <form action="index.php" method="GET" class="d-flex flex-column align-items-center w-75">
            <div class="d-flex align-items-center justify-content-center w-100 gap-5">
                <!-- PARKING SELECT -->
                <div class="select-container">
                    <label for="parking" class="text-center w-100 py-2 fw-bold">Parking</label>

                    <select name="parking" class="form-select" id="parking">
                        <option value="">Choose</option>
                        <option value="yes">With Parking</option>
                        <option value="no">No Parking</option>
                    </select>

                </div>

                <!-- VOTE SELECT -->
                <div class="select-container">
                    <label for="vote" class="text-center w-100 py-2 fw-bold">Hotels Ratings</label>

                    <select name="vote" class="form-select" id="vote">
                        <option value="">Choose</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-dark mt-3 w-25">Send</button>
        </form>

        <!-- LIST SECTION -->
        <div class="d-flex flex-wrap justify-content-center w-100">
            <h3 class="pt-3">Hotel List</h3>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th class="col">Name</th>
                        <th class="col">Description</th>
                        <th class="col">Parking</th>
                        <th class="col">Vote</th>
                        <th class="col">Distance from Center</th>
                    </tr>
                </thead>
                <?php foreach ($hotels as $hotel) {
                    $park = $hotel["parking"] ? "Yes" : "No";
                ?>
                    <tr class="text-center">
                        <td><?php echo $hotel["name"]; ?></td>
                        <td><?php echo $hotel["description"]; ?></td>
                        <td><?php echo $park; ?></td>
                        <td><?php echo $hotel["vote"]; ?></td>
                        <td><?php echo "{$hotel["distance_to_center"]} km" ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>



</body>

</html>