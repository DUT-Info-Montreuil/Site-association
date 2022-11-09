<?php
    class ViewRequest extends GenericView{
        public function __construct(){
            parent::__construct();
        }
        
        public function displayRequestPage($tab){
            ?><HTML>
                <h1>Requête d'achat</h1>
                <form action='index.php?action=submit&module=request' method='post'>
                    <input type='text' name='title' placeholder='Titre' required>
                    <input type='text' name='description' placeholder='Description' required>
                    <input type='submit' value='Soumettre'>
                </form>
            </HTML>
            <?php
            
            foreach($tab as $row){
                echo '<p> - <a href="index.php?module=request&action=read&id=' . $row['ID'] . '">' . $row['title'] .'<br> par ' . $row['username'] .'</a></p>';
            }
        }

        public function displaySubmit(){
            ?><HTML>
                <h1>Requête d'achat</h1>
                
                <div>
                    Merci pour avoir soumit votre requête
                </div>
                
            </HTML><?php
        }

        public function displayRequestDetails($req, $comments){
            ?><HTML>
                
                <h1>Requête d'achat</h1>
                
            </HTML><?php

            echo $req['title'] . ' demandé par ' . $req['username'] . '<br>' . $req['description'] .'<br>'. $req['nbLike'] .' Aiment';

            ?><HTML>
                <form action='index.php?action=comment&module=request&id=<?php echo $req["ID"]?>' method='post'>
                    <input type='text' name='comment' placeholder='Commenter' required>
                    <input type='submit' value='Commenter'>
                </form>
            </HTML>
            <?php
            foreach($comments as $row){
                echo 'Commentaire de '. $row['username'] . ' le: '. $row['date'] .' à '. $row['time'] .' <br> '. $row['content'] .'<br>';
            }
        }
    }
?>