<?php
    include_once "./classes/MusicDB.php";
    $db = new MusicDB();
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Bands</title>
            <link rel="stylesheet" href="./css/styles.css">
            <meta charset="UTF-8">
        </head>
    <body>
    if (ISSET($_POST[create]))
    {
            $OK=db->createBand($POST["naam"],$POST["omschrijving"])


    }
        <header class="header">
                <h1>Bands en hun muziek<h1>
        </header>   
        <div class="wrapper">
           
            <article>
                    <h2>Example1:</h2>
                    
            </article>         
            <div class="example">
                                  
                <?php               
                    $rows = $db->selectBands();

                    foreach($rows as $row)
                    {                  
                        echo "
                            <article>
                                <h3>$row[name]</h3>
                                <img src='data:image/png;base64,".base64_encode($row['image'])."'/>
                                <p>$row[description]</p>   
                                <a href='Song.php?bandid=$row[id]'>Naar de liedjes</a>                     
                            </article>
                            ";
                    }
                ?>
            </div>
            <article>
                    <h2>Example2:</h2>
            </article>      
            <div class="example">   
                <form action="Song.php" method="get">
                    <select name="bandid">                
                        <?php
                            $rows = $db->selectBands();

                            foreach($rows as $row)
                            {                  
                                echo "<option value='$row[id]'>$row[name]</option>";
                            }
                        ?>
                    </select>

                    <input type="submit" value="Naar de liedjes"/>

                </form>
                <a href="create.php"><button>Invoeren</button></a>
            </div>   
        </div>
        <footer>
            <div class="bottom">
               <img width="50" height="50" src="https://images.pexels.com/photos/3938708/pexels-photo-3938708.jpeg?cs=srgb&dl=pexels-gabb-tapic-3938708.jpg&fm=jpg"/>
            </div>

        </footer> 
        
    </body>
</html>