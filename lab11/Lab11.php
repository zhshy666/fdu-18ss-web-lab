<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here

$conn=mysqli_connect("localhost","root","SY1215371982@");
if (mysqli_errno($conn)){
    echo mysqli_error($conn);
}
mysqli_select_db($conn,"travel");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/caption.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
                <?php
                //Fill this place

                //****** Hint ******
                //display the list of continents

                $result=mysqli_query($conn,"SELECT * FROM continents");

                while($row = $result->fetch_assoc()) {
                    $ContinentCode=$row['ContinentCode'];
                    $ContinentName=$row['ContinentName'];
                  echo "<option value='$ContinentCode'>$ContinentName</option>";
                }

                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
                <?php 
                //Fill this place

                //****** Hint ******
                /* display list of countries */

                $result=mysqli_query($conn,"SELECT * FROM countries");
                while($row = $result->fetch_assoc()) {
                    echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                }

                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name='title'>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php 
            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */

            if (@isset($_GET['continent'])&&@isset($_GET['country'])&&@isset($_GET['title'])){
                $s1=$_GET['continent'];
                $s2=$_GET['country'];
                $s3=$_GET['title'];
                if ($s1=='0'){
                    if ($s2=='0'){
                        if ($s3==''){
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails");
                        }
                        else{
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails WHERE Title LIKE '%$s3%'");
                        }
                    }
                    else{
                        if ($s3==''){
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails WHERE CountryCodeISO='$s2'");
                        }
                        else{
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails WHERE CountryCodeISO='$s2' AND Title LIKE '%$s3%'");
                        }
                    }
                }
                else{
                    if ($s2=='0'){
                        if ($s3==''){
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails WHERE ContinentCode='$s1'");
                        }
                        else{
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails WHERE ContinentCode='$s1' AND Title LIKE '%$s3%'");
                        }
                    }
                    else{
                        if ($s3==''){
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails WHERE ContinentCode='$s1' AND CountryCodeISO='$s2'");
                        }
                        else{
                            $result=mysqli_query($conn,"SELECT * FROM imagedetails WHERE ContinentCode='$s1' AND CountryCodeISO='$s2' AND Title LIKE '%$s3%'");
                        }
                    }
                }
                if (@mysqli_num_rows($result)){
                   for ($i=0;$i<mysqli_num_rows($result);$i++){
                        $row=mysqli_fetch_assoc($result);
                        $id=$row['ImageID'];
                        $path=$row['Path'];
                        $title=$row['Title'];
                        echo "<li>";
                        echo "<a href='detail.php?id=$id' class='img-responsive'>";
                        echo "<img src='images/square-medium/$path' alt='picture'>";
                        echo "<div class='caption'><div class='blur'></div><div class='caption-text'>$title</div></div>";
                        echo "</a></li>";
                    }
                }
                else{
                    echo "No result.";
                }
            }
            ?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>