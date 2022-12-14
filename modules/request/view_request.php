<?php
    class ViewRequest extends GenericView{
        public function __construct(){
            parent::__construct();
        }
        
        public function displayRequestPage($tab){
            ?>
                <HTML>
                    <h1>Requête d'achat</h1>
                    <form action='index.php?action=submit&module=request' method='post' id = 'requestForm'>
                        <input type='text' id = 'requestTitle' name='title' placeholder='Titre' required>
                        <input type='text' id = 'requestDescription' name='description' placeholder='Description' required>
                        <input type='submit' id = 'submitRequest' value='Soumettre'>
                    </form>
                </HTML>
                
                <div class="requestContainer">
                
                <?php
                
                foreach($tab as $row){
                    ?>
                    <HTML>
                        <a href="index.php?module=request&action=read&id= <?php echo $row["ID"]?>">
                        <div class="requestList">
                            <h2> <?php echo $row['title']?> </h2>
                            <?php echo 'par ' . $row['username'] .'</a></p>'; ?>
                        </div>
                        </a>
                    </HTML>

                <?php
            }
            ?>
            </div>
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

        public function displayRequestDetails($req, $comments, $author){
            ?>
            <div class="requestContainer">
            <HTML>
                
                <h1>Requête d'achat</h1>
                
            </HTML> 
            <div class="requestDetails"><?php

                    echo $req['title'] . ' demandé par ' . $req['username'] . '<br>' . $req['description'] .'<br>'. $req['nbLike'] .' Aiment' . '<br>Statut: '. $req['state'];
                    if($author['COUNT(*)'] == 1){
                        ?>
                        <HTML>
                            <div id='edit'>
                                <a href="index.php?module=request&action=edit&id=<?php echo $_GET['id']?>"> Editer </a>
                            </div>
                        </HTML>
                        <?php
                    }

                    ?>
                    <HTML>
                        <form action='index.php?action=like&module=request&id=<?php echo $req["ID"]?>' method='post'>
                            <input type='submit' value='Aimer'>
                        </form>
                    </HTML>
                    <?php if(Connection::getUserDataFromId($_SESSION['id'])['role'] == 'admin'){ ?>
                    <HTML>
                        <form action='index.php?action=approve&module=request&id=<?php echo $req["ID"]?>' method='post'>
                            <input type='submit' value='Approuver'>
                        </form>
                        <form action='index.php?action=discard&module=request&id=<?php echo $req["ID"]?>' method='post'>
                            <input type='submit' value='Rejeter'>
                        </form>
                    </HTML>
                    <?php } ?>
                </div>

                <HTML> <div id="reqCom"> <h2> Commentaires: </h2> </div> 
                            <form action='index.php?action=comment&module=request&id=<?php echo $req["ID"]?>' method='post'>
                            <input type='text' name='comment' placeholder='Commenter' required>
                            <input type='submit' value='Commenter'>
                        </form>
                </HTML>

                <?php
                foreach($comments as $row){
                    ?>
                    <HTML> 
                        <div class="commentRequests">
                            <?php echo 'Commentaire de '. $row['username'] . ' le: '. $row['date'] .' à '. $row['time'] .' <br> '. $row['content'] .'<br>';?>
                        </div>
                    </HTML>
                <?php
            }
            ?>
            </div>
            <?php
        }

        public function edit($row){
            ?>
            <HTML>
                    <h1>Edition de la requête d'achat</h1>
                    <form action='index.php?action=submitedit&module=request&id= <?php echo $row['ID']?>' method='post'>
                        <input type='text' name='title' placeholder='Titre' value = "<?php echo $row['title'] ?>" required>
                        <input type='text' name='description' placeholder='Description' value = "<?php echo $row['description'] ?>" required>
                        <input type='submit' value='Soumettre'>
                    </form>
            </HTML>
            <?php
        }

        public function submitEdit(){
            ?><HTML>
                <h1>Edition de la requête d'achat</h1>
                
                <div>
                    Vous avez édité votre requête
                </div>
                
            </HTML><?php
        }
    }
?>