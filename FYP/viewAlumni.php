<!DOCTYPE html>
<html>
<head>
    <title>View User Info</title>
    <style>
        * { 
            margin: 0; 
        }

        .container{
            width: 100%;
            background-image: url("bgAdmin.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .navbar{
            overflow: hidden;
            height: 75px;
            display: flex; 
            align-items: center;
            background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(255,120,120,1), rgba(255,0,0,1));
        }
        
        .sticky {
              position: fixed;
              top: 0;
              width: 100%;
        }

        .logo{
            height: 65px;
            margin-left: 10px;
        }

        nav{
            flex: 1;
            text-align: right;
        }

        nav ul li{
            list-style: none;
            display: inline-block;
            margin-right: 15px;
        }

        nav ul li a{
            text-decoration: none;
            color: black;
            font-size: 16px;
            padding-right: 7px;
        }

        nav ul li a:hover{
            color: white;
        }

        h1{
            text-align: center;
            font-size: 70px;
            margin-top: 10px;
        }

        .content {
            margin: 20px auto;
            width: 86%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .search{
            margin-bottom: 20px;
        }

        button {
            padding: 12px 48px;
            border-radius: 50px;
            margin-top: 1rem; 
            cursor: pointer;
            color: white;
            font-size: 15px;
            border-radius: 1rem;
            border: none;
            position: relative;
            background: #000000;
            transition: 0.1s;
            width: 14%;
            margin-left: 42%;
        }

        button:hover {
            background: radial-gradient(circle farthest-corner at 10% 20%, rgba(2,245,255,1) 17.8%, rgba(255,94,247,1)  100.2%);
            opacity: 0.8;
            color: black;
            border: 2px solid #000000;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <img src="UPTMLogo.png" class="logo">
        </div>

        <h1>Alumni Information</h1>

        <div class="content">
            <div class="search">
                <form action="viewAlumni.php" method="GET">
                    <input type="text" name="search" placeholder="Search by name">
                    <input type="submit" value="Search">
                </form>
            </div>

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "alumnisystem";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if search query is set
                if(isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM alumni WHERE name LIKE '%$search%'";
                } else {
                    // Default query to fetch all alumni
                    $sql = "SELECT * FROM alumni";
                }

                // Create and execute query
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
                    echo '<tr><td align="center"><b>Name</b></td>
                        <td align="center"><b>Ic Number</b></td>
                        <td align="center"><b>Telephone Number</b></td>
                        <td align="center"><b>Email</b></td>
                        <td align="center"><b>Address</b></td>
                        <td align="center"><b>Current Job</b></td>
                        <td align="center"></td></tr>';

                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td align="center">'.$row["name"].'</td>';
                        echo '<td align="center">'.$row["icNumber"].'</td>';
                        echo '<td align="center">'.$row["telNum"].'</td>';
                        echo '<td align="center">'.$row["email"].'</td>';
                        echo '<td align="center">'.$row["address"].'</td>';
                        echo '<td align="center">'.$row["currentJob"].'</td>';
                        echo '<td align="center">';
                        echo '<form action="updateAlumni.php" method="post">';
                        echo '<input type="hidden" name="icNum" value="'.$row["icNumber"].'">';
                        echo '<input type="submit" value="Update" name="update">';
                        echo '</form>';
                        echo '<div style="margin-top: 5px;"></div>';
                        echo '<form action="javascript:confirmDelete(\'' . $row["icNumber"] . '\')" method="post">';
                        echo '<input type="submit" value="Delete" name="delete">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
        </div>

        <div class="back">
            <button type="button" onClick="document.location='adminMenu.html'">Main Menu</button><br>
        </div>
    </div>

    <script>
    // Function to confirm deletion
    function confirmDelete(icNum) {
        if (confirm("Are you sure you want to delete this alumni record?")) {
            window.location.href = "deleteAlumni.php?icNum=" + icNum;
        } else {
            window.location.href = "viewAlumni.php";
        }
    }
</script>
</body>
</html>
