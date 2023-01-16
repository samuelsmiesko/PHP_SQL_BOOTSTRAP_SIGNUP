<?php
    include('config/db_connect.php');

    $name = $email = $password = '';
    $errors = array('name' => '',  'email' => '', 'password' => '');
    $a=array();

    if(isset($_POST['submit'])){

        $sql = 'SELECT email, password, name, id FROM datas ';

        $result = mysqli_query($conn, $sql);

        //$realDatas = mysqli_fetch_all($result, MYSQLI_ASSOC);

        session_start();

        if ($result->num_rows > 0){
            // output data of each row
            while($row = $result->fetch_assoc()){
              $email = $_POST['email'];  
              $password = $_POST['password']; 
              // echo "id: " . $row["id"]. " - Name: " . $row["email"]. " " . $row["password"]. "<br>";
              // echo $email . ' ' . $password;
              $password = $_POST['password']; 
              array_push($a,$row["email"]);
              if($row["email"]===$email && $row["password"]===$password){
                $name = $row['name']; 
                $_SESSION['name'] = $name;
                //echo $_SESSION['name'];
                //header('Location: add.php');
                
              }
              else{         
                if($row["email"]===$email){
                  if($row["email"]===$email && $row["password"]!=$password){
                    $errors['password'] = "Email and password don't match";
                  }
                }
              }
            }
            //print_r($a);
            if(!in_array($email, $a)) {
              //echo "$email doesn't exist<br>";
              $errors['email'] = "Email doesn't exist";
            }
          }
        
          //header('Location: signup.php');
          $conn->close();
    };
?>

<!DOCTYPE html>
<html lang="en">


    <?php include('templates/header.php'); ?>

    <form class="container mt-4" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email" <?php echo htmlspecialchars($email) ?>>
            <div class="container text-danger">
                <?php echo $errors['email']; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" <?php echo htmlspecialchars($password) ?>>
            <div class="container text-danger">
                <?php echo $errors['password']; ?>
            </div>
        </div>
        <div class="checkbox mt-3">
            <label><input type="checkbox"> Remember me</label>
        </div>
        <button type="submit" name="submit" class="btn btn-success mt-3">Log in</button>
    </form>

      <!-- <?php foreach($realDatas as $realData): ?>
        <?php foreach(explode(',', $realData['email']) as $ing): ?>
          <li><?php echo htmlspecialchars($ing); ?></li>
        <?php endforeach; ?>
      <?php endforeach; ?>   -->
      
  
    <?php include('templates/footer.php'); ?>
    
</html>