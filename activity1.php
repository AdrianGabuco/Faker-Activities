<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH');

for ($i=0; $i < 5; $i++){
    $generatePHNumber = '+63 9' . rand(0, 9) . rand(0,9) . ' ' . rand(0,9) . rand(0,9) . rand(0,9) . ' ' . rand(0,9) . rand(0,9) . rand(0,9);
    $users[] = [
        'name' => $faker->name(),
        'email' => $faker->email(),
        'number' => $generatePHNumber,
        'address' => $faker->address(),
        'birthdate' => $faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'),
        'job' => $faker->jobTitle()
    ];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Complete Address</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Job Title</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['number']); ?></td>
            <td><?php echo htmlspecialchars($user['address']); ?></td>
            <td><?php echo htmlspecialchars($user['birthdate']); ?></td>
            <td><?php echo htmlspecialchars($user['job']); ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>   
    
</body>
</html>
