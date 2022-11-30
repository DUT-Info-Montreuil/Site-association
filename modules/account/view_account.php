<?php
    class ViewAccount extends GenericView{
        public function __construct(){
            parent::__construct();
        }


        public function formSignUp(){
            ?>
            <HTML>
                <form action='index.php?action=SignUp&module=connection' method='post'>
                    <input type='text' name='username' placeholder='Username' required>
                    <input type='email' name='email' placeholder='Email address' required>
                    <input type='password' name='password' placeholder='Password' required>
                    <select name='promotion' class='form-select form-select-sm' aria-label='.form-select-sm example'>
                        <option selected>Promotion</option>
                        <option value='INFO'>Informatique</option>
                        <option value='QLIO'>QLIO</option>
                        <option value='INFOCOM'>INFOCOM</option>
                        <option value='GACO'>GACO</option>
                    </select>
                    <input type='submit' value='Sign up'>
                </form>
            </HTML>
            <?php
        }

        public function formSignIn(){
            ?>
            <HTML>
                <form action='index.php?action=connect&module=connection' method='post'>
                    <input type='text' name='username' placeholder='Username' required>
                    <input type='password' name='password' placeholder='Password' required>
                    <input type='submit' value='Log in'>
                
                    <br><br>
                    <a href='index.php?action=formSignUp&module=connection'>Sign up</a>
                </form>
            </HTML>
            <?php
        }

        public function profilePage(){
            ?>
            <HTML>
                <a href='index.php?action=logout&module=connection'>Se déconnecter</a>
                <div id='PP'>
                    <div id='PPLeftColumn'>
                        <div id="PPLeftTop">
                            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width:100%">
                            <div>
                                <p><?php echo Connection::getUserDataFromId($_SESSION['id'])['username']?></p>
                                <p><?php echo Connection::getUserDataFromId($_SESSION['id'])['email']?></p>
                                <p>BUT <?php echo Connection::getUserDataFromId($_SESSION['id'])['promotion']?></p>
                            </div>
                        </div>
                    </div>
                
                    <div id='PPRightColumn'>
                        <div id="PPTabs">
                            <button id="PPBtn1" class="btn PPTabLinks" onclick="changeContent('getEvents')">Vos événements</button>
                            <button id="PPBtn2" class="btn PPTabLinks" onclick="changeContent('getRequests')">Vos requetes d'achats</button>
                            <button id="PPBtn3" class="btn PPTabLinks" onclick="changeContent('getSubEvents')">Evénements que vous suivez</button>
                        </div>
                        <div id="PPContent">

                        </div>
                        <script>
                            function changeContent(action){
                                $.ajax({
                                    url: "modules/account/accountActions.php",
                                    type: "POST",
                                    dataType: "json",
                                    data: {
                                        action: action
                                    },
                                    error: function() {
                                        alert("error");
                                    },
                                    success: function(data){
                                        var content = document.getElementById("PPContent");
                                        content.innerHTML = "";
                                        if(action == "getEvents" || action == "getSubEvents"){
                                            for(var i = 0; i < data.length; i++){
                                                var event = document.createElement("div");
                                                event.className = "PPEvent";
                                                event.innerHTML = "<p>" + data[i]['title'] + "</p>";
                                                event.innerHTML += "<p>" + data[i]['description'] + "</p>";
                                                event.innerHTML += "<p>" + data[i]['creationDate'] + "</p>";
                                                event.innerHTML += "<p>" + data[i]['startDate'] + "</p>";
                                                event.innerHTML += "<p>" + data[i]['endDate'] + "</p>";
                                                content.appendChild(event);
                                            }
                                        }
                                        else if(action == "getRequests"){
                                            for(var i = 0; i < data.length; i++){
                                                var request = document.createElement("div");
                                                request.className = "PPRequest";
                                                request.innerHTML = "<p>" + data[i]['title'] + "</p>";
                                                content.appendChild(request);
                                            }
                                        }
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </HTML>
            <?php
        }
    }
?>