  <?php 
            $names = $_POST["Name"];
            $messages = $_POST["Message"];
            
            $firstDTE = $_POST["firstDTE"];

            date_default_timezone_set("Australia/Brisbane");
            $date = date("h:i:sa");
            
            if ($firstDTE == null) {
               $firstDTE = $date;
            }
            
            
            $listMSG = $_POST["ARR"];
            $listDTE = $_POST["DTE"];
            $listNME = $_POST["NME"];
            
            
            if ($messages != null || $messages != "") {
                $listMSG[] = $messages;
                $listDTE[] = $date;
            } 
            
            
            if (count($listMSG) == 0){
                    $listMSG[] = "";
                    $listDTE[] = "";
                }
                
            if ($names != null){
                $listNME = $names;
            }
            
            echo $listNME;
            
            include 'classes/PostSeeder.php';
            use\wp;
            $posts = PostSeeder::seed();
            
           
            $posts[0] -> addComment("Nmeres","STill here");
            $posts[0]->addComment('stiljjnj', 'hgdeasjhfg');
            
            $posts[1]->addComment('Bill', 'Tomsdgvd');
            $posts[1]->addComment('stil', 'hgdeasjhfg');
           // var_dump($posts[0]);

            ?>
  
  
  <!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name = "viewport" content="width=device-width, initial-scale=1">
        <title>Soci</title>
        <link rel = "stylesheet" href = https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
       <link rel = "stylesheet" href="css/style3.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class= "row" id="nav">
                <div class="col-sm-6"><a href="../Task2">Social</a></div>
                <div class="col-sm-2"><a href="../Task2">Photos</a></div>
                <div class="col-sm-2"><a href="../Task2">Friends</a></div>
                <div class="col-sm-2"><a href="../Task2">Login</a></div>
            </div>
            
            
            
            
            
            
            
             <div class= "row" id="content">
                <div class="col-md-4">
                    
                    <form action="index.php" method="post">
                    <label>Name:</label><input name = "Name" type = "text"><br>
                    <label>Message:</label><input name = "Message" type = "text" value = ""><br>
                    <?php 
                        echo '<input id = "HIDEME" name = "NME" value = "'.$listNME.'" type = "text">'; 
                        echo '<input id = "HIDEME" name = "firstDTE" value = "'.$firstDTE.'" type = "text">';

                        if (count($listDTE) != null){
                            foreach ($listDTE as $printdate){
                                echo '<input id = "HIDEME" name = "DTE[]" value = "'.$printdate.'" type = "text">'; 
                            }
                        }
                         
                        if (count($listMSG) != null){
                            foreach ($listMSG as $printmsg){
                                echo '<input id = "HIDEME" name = "ARR[]" value = "'.$printmsg.'" type = "text">'; 
                             }
                         }
                         echo "</br></br>";
                         echo '<button type = "Submit">Submit</button>'; 
                         echo " Posts: " . (count($listDTE) - 1 + 3);
                         echo "</br></br>";
                     ?>
                    </form>
                </div>
                
                
                <?php
                echo '<div class="col-md-8">';

                 foreach ($posts as $post){
                        echo '<div class="col-md-8">';
                        
                        echo '<img src = "'. $post->getImg() .'" width = 50>';
                        echo "<br>";
                        echo "<p> Signed: ". $post->getUser() ."</p>";
                        
                        echo "</div>";
    
                        echo '<div class="col-md-4">';
                            echo "<p>Date Time: " . $post->getDate()  . "</p>" ;
     
                            echo "<p>Message: " .  $post->getMessage() . "</p>";
                            
                           
                           
                           $comments =  $post->getComments();
                           echo "Comments: </br>";
                            
                            foreach ($comments as $comment){
                            echo " " . $comment['user'] . " Said " . $comment['comment'] . "</br>";
                            }
                            
                        echo "</br></br>";
                        echo "</div>";
                        }

                    ?>
                
                </div>
            </div>
        </div>
    </body>
</html>