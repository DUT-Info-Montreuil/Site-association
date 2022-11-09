<?php
    class ViewRequest extends GenericView{
        public function __construct(){
            parent::__construct();
        }
        
        public function displayRequestPage(){
            ?><HTML>
                <h1>Requête d'achat</h1>
                <form action='index.php?action=submit&module=request' method='post'>
                    <input type='text' name='title' placeholder='Titre' required>
                    <input type='text' name='description' placeholder='Description' required>
                    <input type='submit' value='Soumettre'>
                </form>
            </HTML>
            <?php
        }

        public function displaySubmit(){
            ?><HTML>
                <h1>Requête d'achat</h1>
                
                <div>
                    Merci pour avoir soumit votre requête
                </div>
                
            </HTML><?php
        }
    }
?>