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
                                <h2><?php echo Connection::getUserDataFromId($_SESSION['id'])['username']?></h2>
                                <h4><?php echo Connection::getUserDataFromId($_SESSION['id'])['email']?></h4>
                                <h4>BUT <?php echo Connection::getUserDataFromId($_SESSION['id'])['promotion']?></h4>
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
                                                var link = document.createElement("a");
                                                var event = document.createElement("div");
                                                
                                                link.className = "PPEvent";
                                                event.innerHTML = "<h3>" + data[i]['title'] + "</h3>";
                                                event.innerHTML += "<h4>" + data[i]['description'] + "</h4>";
                                                event.innerHTML += "<div class='PPDates'>";
                                                var dates = document.createElement("div");
                                                dates.className = "PPDates";
                                                dates.innerHTML += "<p>du : " + data[i]['startDate'] + "</p>";
                                                dates.innerHTML += "<p>au : " + data[i]['endDate'] + "</p>";

                                                event.appendChild(dates);
                                                link.href = "index.php?module=events";
                                                link.appendChild(event);
                                                content.appendChild(link);
                                            }
                                        }
                                        else if(action == "getRequests"){
                                            for(var i = 0; i < data.length; i++){
                                                var link = document.createElement("a");
                                                var request = document.createElement("div");
                                                link.className = "PPRequest";
                                                request.innerHTML = "<h3>" + data[i]['title'] + "</h3>";
                                                request.innerHTML += "<h4>" + data[i]['description'] + "</h4>";
                                                request.innerHTML += "<p>" + data[i]['nbLike'] + " personnes ont aimées</p>";
                                                link.href = "index.php?module=request&action=read&id=" + data[i]['ID'];
                                                link.appendChild(request);
                                                content.appendChild(link);
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