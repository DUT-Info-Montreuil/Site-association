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

        public function displayFilterButton(){
            ?>
                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="index.php?module=events">TOUS</a></li>
                    <li><a class="dropdown-item" href="index.php?module=events&action=filter&promo=INFO">INFO</a></li>
                    <li><a class="dropdown-item" href="index.php?module=events&action=filter&promo=QLIO">QLIO</a></li>
                    <li><a class="dropdown-item" href="index.php?module=events&action=filter&promo=INFOCOM">INFOCOM</a>
                    <li><a class="dropdown-item" href="index.php?module=events&action=filter&promo=GACO">GACO</a></li>
                </ul>
                </div>
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
                    if(isset($_SESSION['id']) && Connection::getUserDataFromId($_SESSION['id'])['promotion'] == $event['promotion']){
                        if(isset($_SESSION['id']) && $event['creatorId'] != $_SESSION ['id'] && !Connection::isSubscribedToEvent($event['id'])){
                            // button to participate to the event
                            ?>
                            <button class="btn btn-success" onclick="subscribeToEvent(<?php echo $event['id']?>)">
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
                                            location.reload();
                                        },
                                        error: function(){
                                            alert("Une erreur est survenue");
                                        }
                                    });
                                }
                            </script>
                    <?php
                        }
                        else if (isset($_SESSION['id']) && Connection::isSubscribedToEvent($event['id'])){
                            // button to cancel participation to the event
                            ?>
                            <button class="btn btn-danger" onclick="unsubscribeFromEvent(<?php echo $event['id']?>)">
                                Ne plus participer
                            </button>
                            <script>
                                function unsubscribeFromEvent(id){
                                    $.ajax({
                                        url: "modules/events/eventActions.php",
                                        type: "POST",
                                        data: {
                                            id: id,
                                            action: "unsubscribe"
                                        },
                                        success: function(data){
                                            location.reload();
                                        },
                                        error: function(){
                                            alert("Une erreur est survenue");
                                        }
                                    });
                                }
                            </script>
                            <?php
                        }
                    }
                    

                    if(isset($_SESSION['id'])){
                        //ajax buttons to delete or modify the event
                ?>
                        <div class="eventButtons">
                        <?php
                        if($event['creatorId'] == $_SESSION ['id']){
                        ?>
                            <button class="btn btn-danger" onclick="deleteEvent(<?php echo $event['id']; ?>)"><img src="resources/Trashcan.png"></button>
                            <button class="btn btn-warning" onclick="modifyEvent(<?php echo $event['id']; ?>)"><img src="resources/Craft.png"></button>
                        <?php
                        }else if(Connection::getUserDataFromId($_SESSION['id'])['role'] == 'admin'){
                        ?>
                            <button class="btn btn-danger" onclick="deleteEvent(<?php echo $event['id']; ?>)"><img src="resources/Trashcan.png"></button>
                        <?php
                        }
                        ?>
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
                <div id="eventFormBorder">
                    <form action='index.php?module=events&action=published' method='post' id='eventForm'>
                        <input type='text' name='title' placeholder='Titre' required>
                        <textarea name='description' placeholder='Description'></textarea>
                        <div class='date'>
                            <label for="start">Date de début:</label>
                            <input id="start" type="date" name="startDate" required>
                        </div>
                        <div class='date'>
                            <label for="end">Date de fin:</label>
                            <input id="end" type="date" name="endDate" required>
                        </div>
                        <div id = 'participants'>
                            <input type='text' name='participantsMin' placeholder='Participants Minimum' required>
                            <input type='text' name='participantsMax' placeholder='Participants Maximum' required>
                        </div>
                        <select name='promotion' class='form-select form-select-sm' aria-label='.form-select-sm example' id = 'eventPromo'>
                            <option selected>Promotion</option>
                            <option value='Tous'>Tous</option>
                            <option value='INFO'>Informatique</option>
                            <option value='QLIO'>QLIO</option>
                            <option value='INFOCOM'>INFOCOM</option>
                            <option value='GACO'>GACO</option>
                        </select>
                        <input type='submit' value='Publier' id='submitEvent'>
                    </form>
            </div>
            <?php
        }
    }
?>