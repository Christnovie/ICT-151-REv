<?php
/**
 * Revision ict 151 - login.php
 *version : ${VERSION}
 *Initial version by: Christnovie.KIALA-BI
 *Initial version created on : 19.06.2020
 *Time : 08:37
 */
// Tampon de flux stocké en mémoire
ob_start();
$titre = "Login";
?>
    <div>
        <h1>Login</h1><br>
        <form action="index.php?action=login" id="formulaireLogin" method="post">
            <label>Username</label>
            <input type="text" id="username" name="inputUsername" placeholder="input your username or email" value="" required><br>
            <label>Password</label>
            <input type="password" id="password" name="pwd" placeholder="Enter password" value="" required>

            <br>
            <input type="submit" name="log" value="Login"><input type="reset" value="Reset"><br>
            Pas encore membre?          <a href="index.php?action=register">Register </a>
        </form>
    </div>


<?php
$contenu = ob_get_clean();
require 'gabarit.php';