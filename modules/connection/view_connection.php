<?php
    class ViewConnection{
        public function __construct(){}


        public function formSignUp(){
            echo "
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
            ";
        }

        public function formSignIn(){
            echo "
                <form action='index.php?action=connect&module=connection' method='post'>
                    <input type='text' name='username' placeholder='Username' required>
                    <input type='password' name='password' placeholder='Password' required>
                    <input type='submit' value='Log in'>
                
                <br><br>
                <a href='index.php?action=formSignUp&module=connexion'>Sign up</a>
            ";
        }
    }
?>