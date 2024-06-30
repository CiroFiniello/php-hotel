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
// foreach ($hotels as $hotel) {
//     echo "Hotel <br>";
//     foreach ($hotel as $key => $value) {
//         echo "$key --- $value";
//         echo "<br>";
//     }
// }
$filteredHotels = $hotels;

if (isset($_GET['parking'])) {
    $parking = $_GET['parking'];
    if ($parking == '1') { // With Parking
        $tempArray = [];
        foreach ($filteredHotels as $hotel) {
            if ($hotel['parking'] == true) {
                $tempArray[] = $hotel;
            }
        }
        $filteredHotels = $tempArray;
    } elseif ($parking == '2') { // Without Parking
        $tempArray = [];
        foreach ($filteredHotels as $hotel) {
            if ($hotel['parking'] == false) {
                $tempArray[] = $hotel;
            }
        }
        $filteredHotels = $tempArray;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
</head>
<body>
    <main>
        <section class="row searchbar">
            <div class="col6">
                <form action="./index.php" method="get">
                    <div class="mb-3">
                        <label for="parking">Parking?</label>
                        <select name="parking" id="parking">
                            <option value="0" selected>Not Needed</option>
                            <option value="1">With Parking</option>
                            <option value="2">Without Parking</option>
                        </select>
                        <button type="submit">
                            filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="col6"></div>
        </section>
        <section class="content">
            <table class="table table-hover ">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Parking
                    </th>
                    <th>
                        Vote
                    </th>
                    <th>
                        Distance to Center
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $hotel) {?>
                <tr>
                    <?php foreach ($hotel as $property) { ?>
                    <td>
                        <?php echo "$property" ?>
                    </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
            </table>
        </section>

    </main>
</body>
</html>