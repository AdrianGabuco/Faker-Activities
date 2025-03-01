<?php

require 'vendor/autoload.php'; // Include Faker library

$faker = Faker\Factory::create('en_PH'); // Set Philippine locale

$pdo = new PDO('mysql:host=localhost;dbname=fakerdemo', 'root', 'captainbuko');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Insert Offices
for ($i = 1; $i <= 50; $i++) {
    $stmt = $pdo->prepare("INSERT INTO office (id, name, contactnum, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$i, $faker->company, $faker->phoneNumber, $faker->email, $faker->address, $faker->city, 'Philippines', $faker->postcode]);
}

echo "50 Offices inserted successfully!\n";

// Insert Employees
for ($i = 1; $i <= 200; $i++) {
    $office_id = rand(1, 50); // Random office_id
    $stmt = $pdo->prepare("INSERT INTO employee (id, lastname, firstname, office_id, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$i, $faker->lastName, $faker->firstName, $office_id, $faker->address]);
}

echo "200 Employees inserted successfully!\n";

// Insert Transactions
for ($i = 1; $i <= 500; $i++) {
    $employee_id = rand(1, 200); // Random employee_id
    $office_id = rand(1, 50); // Random office_id
    $datelog = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'); // Ensure no future dates
    $stmt = $pdo->prepare("INSERT INTO transaction (id, employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$i, $employee_id, $office_id, $datelog, $faker->word, $faker->sentence, strtoupper($faker->bothify('DOC###'))]);
}

echo "500 Transactions inserted successfully!\n";


?>