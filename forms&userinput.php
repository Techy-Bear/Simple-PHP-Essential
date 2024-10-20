<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*
    $_SERVER is super global variable that contains information about headers, paths and script location

    Super Global variable means that they are always accessible regardless of scope

    $_SERVER["REQUEST_METHOD"] returns the method use to access the page (such as get & post)

    GET: sends data via URL, not secure and visible to everyone, not suitable for sensive data
    Example usage: Visiting a URL or submitting a search query

    POST: sends data in the body of HTTP request, more secure for handling sensitive data
    Example usage: sending form data such as  a username or password

    More about $_SERVER: https://www.w3schools.com/php/php_superglobals_server.asp

    More about super gloabal variable: https://www.w3schools.com/php/php_superglobals.asp

    */

    $name = trim($_POST["name"]); //remove whitespace in beginning or end
    $name = stripcslashes($name); // remove all blackslash \

    $email = trim($_POST["email"]);
    $email = stripcslashes($email);

    # $_POST & $_GET holds an array of variables in key-value pairs received via the HTTP POST/GET mehod
    # In this case, it is use to retrieves the submitted form data

    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    # htmlspecialchars(): functions that escapes special HTML characters to prevent them from being interpreted as HTML or script code
    # important security measure to prevent XSS (Cross-Site Scripting) attacks, where an attacker inject harmful HTML or JavaScript into your form fields

    /* Example
    If a user enter this into text box "<script>alert('Hacked!');</script>", the script will run

    But with htmlspecialchars(), it will convert it into
    &lt;script&gt;alert('Hacked!');&lt;/script&gt;, where the code unable to run, making the page safe from the XSS attack */

    if (! preg_match("/^[a-zA-Z ]*$/", $name)){ // ! means not
        echo "Only letters and white space are allowed in the name. <br>";
        /* preg_match(): use to validate the user input (string)
        ^ means start of the string
        * means zero or more occurrences
        $ means end of the string
        [a-zA-Z  allows only a-z, A to Z and allow spaces
        */
    }else{
        // validate email
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format.<br>";
            # filter_var: filter and validate data
            # FILTER_VALIDATE_EMAIL: check whether the $email contains a valid email format

        } else {
            echo "Name: " . $name . "<br>";
            echo "Email: " . $email . "<br>";
        }

    }
}

// Securely storing password
// use password_hash()
?>
