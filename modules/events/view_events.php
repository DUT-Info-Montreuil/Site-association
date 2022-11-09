<?php
    class ViewEvents extends GenericView{
        public function __construct(){
            parent::__construct();
        }

        // This function is called from the controller and is used to display the events on the page in html.
        public function displayEvent($event){
            ?>
            <div class="event">
                <h2><?php echo $event['title']; ?></h2>
                <p><?php echo $event['description']; ?></p>
                <p><?php echo $event['creationDate']; ?></p>
            </div>
            <?php
        }
    }
?>