<?php      
include('session.php');
$user_id = $_SESSION['user_id'];
?>

<?php      
  include('SQLFunctions.php');

   /*Open the database connection based on config.php file settings*/
   $link = connectDB();
   
    /*Create the Sql Statement*/
    /*$sql = "SELECT ToDoID, ToDoTitle, ToDoDescription, ToDueDate FROM ToDos WHERE ToDoID = 7"; */
    $sql = "SELECT User_ID, username FROM User_Dfn WHERE User_ID=".$user_id;
    /*We will use the hard-coded sql statement for now*/
    echo '<br>sql :'.$sql.'<br>Comment this out, after testing<br><br>';
    
    
    /*If the $sql passes validation, exectute it*/
    if($stmt = $link->prepare($sql))
    {
        $stmt->execute();
        /*Assign the results into their respective php variables*/
        $stmt->bind_result($UserID, $username);
        while ($stmt->fetch())
        {
          /*reformat the date to html*/
          echo "<BODY>";
          echo "  <div>";
          echo "    <div>";
          echo "    <h1>User Info</h1>";
          /*Create and prepopulate an html form with the values pulled from the database.*/
          echo "    <form action='' method = 'POST' onsubmit='' />";
          echo "      <p>UserID:  <input text='text' name='UserID' maxlength='50'  required value='".$UserID."'/></p>";
          echo "      <p>Username: <input text='text' name='UserID' maxlength='50'  required value='".$username."'/></p>";
          echo "    </form>";
          echo "    <a href='ToDoApp.php'><button>Cancel</button></a>";
          echo "    </div>";
          echo "  </div>";
          echo "</BODY>";    
        }
    }
    else  { 
      echo 'Unable to connect'; 
      exit();
    }
?>   