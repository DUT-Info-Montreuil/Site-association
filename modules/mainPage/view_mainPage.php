<?php
    class ViewMainPage extends GenericView{
        public function __construct(){
            parent::__construct();
        }
        
        public function displayMainPage(){
            ?>
            <h1>Accueil</h1>
            <p>Bienvenue au site de l'association.</p>
            <p>Ici vous pouvez créer et participer à de nombreux événements, ainsi qu'à des demandes d'achats.</p>   
        <?php

        }

        public function displayEvent($event){
            ?>
            <div class="event">
                <div class="eventTop">
                    <h2><?php echo $event['title']; ?></h2>
                    <p>par : <?php 
                    if(isset($_SESSION['id']) && $event['creatorId'] == $_SESSION ['id']){
                        echo "Vous";
                    } else{
                        echo Connection::getUserDataFromId($event['creatorId'])['username']; 
                    }?></p>
                </div>
                <p class="eventDesc"><?php echo $event['description']; ?></p>
            </div>
            <?php
        }

        public function displayRequestPage($tab){
            $i=0;
            foreach($tab as $row){
                ?>
                    <div class="requestList">
                        <h2> <?php echo $row['title']?> </h2>
                        <?php echo 'par ' . $row['username']; ?>
                    </div>
                </HTML>
                <?php
                $i++;
                if ($i>5){
                  break;
                }
            }
        }

    } 
?>