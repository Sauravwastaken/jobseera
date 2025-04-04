<?php
include_once('parts/_dbconnect.php');
include_once('parts/_google_config.php');

if (!isset($_GET['code'])) {
    echo "Login Failed";
    exit;
}

echo "Logged in<br>";

// Fetch access token
$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

// Check for errors in token fetching
if (isset($token['error'])) {
    echo "Error: " . $token['error_description'];
    exit;
}

// Set the access token
$client->setAccessToken($token['access_token']);

$oauth = new Google\Service\Oauth2($client);
$user_info = $oauth->userinfo->get();

$user_name = $user_info->name;
$user_email = $user_info->email;
$error_msg_signup;

$stmt = $connect->prepare("SELECT * FROM `users` WHERE user_email = ?");
$stmt->bind_param('s', $user_email);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
} else {
    echo "Fetched data from db";
}

$result = $stmt->get_result();
$count = $result->num_rows;
echo "Count: ";
echo $count;

if ($count > 0) {
    $row = $result->fetch_assoc();
    if ($row['user_google_linked']) {
        $error_msg_signup = "An account with this email already exists. Please log in with password";
        echo $error_msg_signup;
    } else {
        $user_id = $row['user_id'];

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $user_name;
        $_SESSION['loggedIn'] = true;
        header('location: index.php');
        exit();

    }


} else {
    $provider = 'google';
    $stmt = $connect->prepare("INSERT INTO `users` (user_name,user_email,user_provider) VALUES (?,?,?)");
    if (!$stmt) {
        echo "error: " . $connect->error;
    } else {
        echo "prepared";
    }


    if (!$stmt->bind_param('sss', $user_name, $user_email, $provider)) {
        echo "error: " . $stmt->error;
    } else {
        echo "prepared";
    }

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    } else {
        echo "saved";
    }

    $user_id = $stmt->insert_id;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['loggedIn'] = true;

    header('location: index.php');
    exit();

}

header('location: signup.php?error_msg_signup=' . $error_msg_signup);

?>