<?php
    class ViewMainPage extends GenericView{
        public function __construct(){
            parent::__construct();
        }
        
        public function displayMainPage(){
            ?>
            <h1>Accueil</h1>
            <p>Bienvenue au site de l'association.<br/> Ici vous pouvez créer et participer à de nombreux événements, ainsi qu'à des demandes d'achats.</p>   
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
                        echo Connection::getUserFromId($event['creatorId'])['username']; 
                    }?></p>
                </div>
                <p class="eventDesc"><?php echo $event['description']; ?></p>
            </div>
            <?php
        }

    }

    
?>