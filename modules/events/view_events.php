<?php
    class ViewEvents extends GenericView{
        public function __construct(){
            parent::__construct();
        }

        //Button to open the form that allows the user to create a new event
        public function displayCreateEventButton(){
            ?>
                <a href="index.php?module=events&action=publish">
                    <button class="btn btn-primary">Créer un événement</button>
                </a>
            <?php
        }

        // This function is called from the controller and is used to display the events on the page in html.
        public function displayEvent($event){
            ?>
            <div class="event">
                <div class="eventTop">
                    <h2><?php echo $event['title']; ?></h2>
                    <p><?php echo $event['creationDate']; ?></p>
                    <p>par : <?php 
                    if(isset($_SESSION['id']) && $event['creatorId'] == $_SESSION ['id']){
                        echo "Vous";
                    } else{
                        echo Connection::getUserDataFromId($event['creatorId'])['username']; 
                    }?></p>
                </div>

                <p class="eventDesc"><?php echo $event['description']; ?></p>

                <div class="eventBottom">
                    <p>du : <?php echo $event['startDate']; ?></p>
                    <p>au : <?php echo $event['endDate']; ?></p>
                    <p><?php echo $event['minParticipants']?> <?php if(isset($event['maxParticipants'])){
                        echo "/ " . $event['maxParticipants'];
                    } ?> participants
                    </p>
                </div>

                <?php
                    if(isset($_SESSION['id']) && $event['creatorId'] != $_SESSION ['id'] && !Connection::isSubscribedToEvent($event['id'])){
                        // button to participate to the event
                        ?>
                        <button class="btn btn-success" id="subcribeEventButton" onclick="subscribeToEvent(<?php echo $event['id']?>)">
                            Participer
                        </button>
                        <script>
                            function subscribeToEvent(id){
                                $.ajax({
                                    url: "modules/events/eventActions.php",
                                    type: "POST",
                                    data: {
                                        id: id,
                                        action: "subscribe"
                                    },
                                    success: function(data){
                                        //location.reload();
                                    },
                                    error: function(){
                                        alert("Une erreur est survenue");
                                    }
                                });
                            }
                        </script>
                <?php
                    }
                    

                    if(isset($_SESSION['id']) && $event['creatorId'] == $_SESSION ['id']){
                        //ajax buttons to delete or modify the event
                ?>
                        <div class="eventButtons">
                            <button id="deleteButton" class="btn btn-danger" onclick="deleteEvent(<?php echo $event['id']; ?>)"><img src="resources/Trashcan.png"></button>
                            <button id="modifyButton" class="btn btn-warning" onclick="modifyEvent(<?php echo $event['id']; ?>)"><img src="resources/Craft.png"></button>
                        </div>
                        <script>
                            function deleteEvent(id){
                                $.ajax({
                                    url: "modules/events/eventActions.php",
                                    type: "POST",
                                    data: {
                                        id: id,
                                        action: "delete"
                                    },
                                    error: function() {
                                        alert("error");
                                    },
                                    success: function(data){
                                        location.reload();
                                    }
                                });
                            }

                            function modifyEvent(id){
                                $.ajax({
                                    url: "modules/events/eventActions.php",
                                    type: "POST",
                                    data: {
                                        id: id,
                                        action: "modify"
                                    },
                                    error: function() {
                                        alert("error");
                                    },
                                    success: function(data){
                                        location.reload();
                                    }
                                });
                            }
                        </script>
                        <?php
                    }
                ?>
            </div>
            <?php
        }

        // This function is called from the controller and is used to display the form that allows the user to create a new event.
        public function displayFormEvent(){
            ?>
                <form action='index.php?module=events&action=published' method='post'>
                    <input type='text' name='title' placeholder='Titre' required>
                    <textarea name='description' placeholder='Description'></textarea>
                    <label for="start">Date de début</label>
                    <input id="start" type="date" name="startDate" required>
                    <label for="end">Date de début</label>
                    <input id="end" type="date" name="endDate" required>
                    <input type='submit' value='Publier'>
                </form>
            <?php
        }
    }
?>