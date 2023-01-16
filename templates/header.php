<?php

    //session_start();

    if($_SERVER['QUERY_STRING'] == 'noname'){
        session_unset();
    
    }
        
    // null coalesce
    $name = $_SESSION['name'] ?? 'Guest';

   
    if(isset($_SESSION['name'])){
        
        $result = 'warning';
        $sign = 'out';
        $able = 'disabled';
        //echo '1';
    }else{
        $result = 'white';
        $sign = 'in';
        $able = '';
        //echo '2';
    }


?>
<head>
    <title>New add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style type="text/css">
    </style>

</head>
<body>  

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">

    <div class="container-fluid">
    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="/dashboard/myProject/add.php">Add</a>
        </li>
        <li class="nav-item">
        <a class="nav-link <?php echo $able ?>" href="/dashboard/myProject/signup.php">Sign up</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " href="/dashboard/myProject/signin.php">Sign <?php echo htmlspecialchars($sign); ?></a>
        </li>
        <li class="nav-item ms-5 ">
        <a class="nav-link text-<?php echo $result ?>">Hello <?php echo htmlspecialchars($name); ?></a>
        </li>
    </ul>
    </div>

    </nav>
