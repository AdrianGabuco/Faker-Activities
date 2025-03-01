
<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();

for ($i=0; $i <= 10; $i++){
    $password = $faker->password();
    $email = $faker->email();
    $username = strtolower(explode('@', $email)[0]);
    $users[] = [
        'id' => $faker->uuid(),
        'name' => $faker->name(),
        'email' => $email,
        'username' => $username,
        'password' => hash('sha256', $password),
        'accountCreated' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
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
      <th scope="col">UUID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Account Created</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['username']); ?></td>
            <td><?php echo htmlspecialchars($user['password']); ?></td>
            <td><?php echo htmlspecialchars($user['accountCreated']); ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>   
    
</body>
</html>