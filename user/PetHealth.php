<!DOCTYPE html>
<html>
<head>
    <title>Pet Health Tracker</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Pet Health Tracker</h1>
    </header>
    
    <section class="pet-form">
        <h2>Add Pet Data</h2>
        <form action="pet_data.php" method="post">
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name"><br><br>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age"><br><br>
            
            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight"><br><br>
            
            <input type="submit" value="Add Pet">
        </form>
    </section>
    
    <section class="pet-list">
        <h2>Pet List</h2>
        <ul>
            <?php
            // Assuming you have a function to fetch pet data from the database
            include('pet_data.php');
            $pets = get_pet_data(); // Placeholder function, replace with your actual function
            
            foreach ($pets as $pet) {
                echo "<li>{$pet['name']} - Age: {$pet['age']}, Weight: {$pet['weight']}kg</li>";
            }
            ?>
        </ul>
    </section>
</body>
</html>
