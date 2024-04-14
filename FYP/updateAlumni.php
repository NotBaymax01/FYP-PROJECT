<html>
<head>
<meta charset="utf-8">
<title>Log In</title>
<style>
    * { 
        padding: 0; 
        margin: 0; 
        box-sizing: border-box; 
    	}

    .container{
			width: 100%;
			background-color: #0b1623;
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
		
		.sticky + .home {
			  padding-top: 60px;
			}

        body {
            font-family: "Hoefler Text", "Liberation Serif",  "Times New Roman", "serif";
            background-image: url("bgBlack.jpg"); 
            background-size: cover; 
            background-repeat: no-repeat;
        }
        
        .form {
            justify-content: center; 
            padding-top: 3rem;
			background-color: white;
        }

        .userData {
            display: flex;
            width: 45vw;
            height: 60vh;
			border-style: solid;
            border-radius: 12px; 
            box-shadow: rgba(50, 50, 93, 0,25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px; 
            background-color: white;
			margin-left: 27%;
			margin-top: 30px;
			margin-bottom: 105px;
        }
		
		.data {
			display: inline-block;
			box-sizing: border-box;
			margin: 10px 50px;
		}

        h2 {
            margin: 1.5rem 0 1rem 0; 
            text-align: center;
        }
		
		label{
			font-size: 17px;
		}

        input {
			height: 35px;
            width: 230px;
            outline: none;
            font-size: 14px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
			margin: 10px 0;
        }
		
		select{
			height: 35px;
            width: 230px;
            outline: none;
            font-size: 14px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid #ccc;
            border-bottom-width: 2px;
			margin: 10px 0;
		}

        button {
            padding: 12px 48px;
            border-radius: 40px;
            margin-top: 10px; 
            cursor: pointer;
            color: white;
            font-size: 15px;
            border-radius: 1rem;
            border: none;
            position: relative;
            background: #000000;
            transition: 0.1s;
            width: 200px;
			margin-left: 88%;
            }

        button::after {
            content: '';
            width: 100%;
            height: 100%;
            background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(2,245,255,1) 17.8%, rgba(255,94,247,1) 100.2%);
            filter: blur(15px);
            z-index: -1;
            position: absolute;
            left: 0;
            top: 0;
            }

        button:hover {
            background: radial-gradient(circle farthest-corner at 10% 20%, rgba(2,245,255,1) 17.8%, rgba(255,94,247,1)  100.2%);
            opacity: 0.8;
            color: black;
            }
    </style>
</head>

<body>
    <div class="cointainer">
        <div class="navbar">
            <img src="UPTMLogo.png" class="logo">
        </div>

        <div class="update">
            <form action="autoUpdate.php" method="post" class="userData">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "alumniSystem";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                    
                // Get input value
                $icNum = $_POST['icNum'];
                    
                // SQL to retrieve alumni information
                $sql = "SELECT * FROM alumni WHERE icNumber='$icNum'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="forms">
                            <h2>Update Alumni Information</h2>
                            <div class="data">
                                <label>Full Name</label> <br>
                                <input type="text" value="<?php echo $row["name"]?>" name="name" id="name" required><br>
                            </div>
                            <div class="data">
                                <label>IC Number (without space or -)</label> <br>
                                <input type="text" value="<?php echo $row["icNumber"]?>" name="icNum" id="icNum" required><br>
                            </div>
                            <div class="data">
                                <label>Telephone Number</label> <br>
                                <input type="text" value="<?php echo $row["telNum"]?>" name="telNum" id="telNum" required><br>
                            </div>
                            <div class="data">
                                <label>Email</label> <br>
                                <input type="text" value="<?php echo $row["email"]?>" name="email" id="email" required><br>
                            </div>
                            <div class="data">
                                <label>Address</label> <br>
                                <input type="text" value="<?php echo $row["address"]?>" name="address" id="address" required><br>
                            </div>
                            <div class="data">
                                <label>Current Job</label> <br>
                                <input type="text" value="<?php echo $row["currentJob"]?>" name="job" id="job" required><br>
                            </div>
                            <div class="data">
                                <button type="submit">Update</button><br>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
            </form>
        </div>
    </div>
</body>
</html>