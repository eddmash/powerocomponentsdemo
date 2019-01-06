<?php

function get_clean_form_data($key)
{
    return clean_user_data(post_data($key));
}

function clean_user_data($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

function get_array_value($haystack, $key, $default = '')
{
    return (isset($haystack[$key])) ? $haystack[$key] : $default;
}

function render_validation_errors($haystack)
{
    if ($haystack) { ?>
        <div class="alert-danger alert">
            <?php
            foreach ($haystack as $field => $errors) {
                foreach ($errors as $error) {
                    $name = str_replace("_", " ", $field);
                    $name = strtoupper($name);
                    ?>
                    <span class="help-block"><?= $name . ": " . $error ?></span>

                <?php }
            } ?>
        </div>
        <?php
    }
}

function is_valid_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function redirect($page)
{
    header("Location:" . path($page), TRUE, 301);
    // Stop rendering the rest of the pagesss
    exit();
}

function is_post()
{
    return $_SERVER["REQUEST_METHOD"] == "POST";
}

function is_get()
{
    return $_SERVER["REQUEST_METHOD"] == "GET";
}

function post_data($key)
{
    return get_array_value($_POST, $key);
}

function get_data($key)
{
    return get_array_value($_GET, $key);
}

function is_authenticated()
{
    return isset($_SESSION['user']);
}


function logout()
{
    unset($_SESSION['cart']);
    unset($_SESSION['roles']);
    unset($_SESSION['user']);
    session_destroy();
}

function get_session_data($key, $default = "")
{
    return get_array_value($_SESSION, $key, $default);
}

function is_base()
{

    $querystring = explode("?", $_SERVER['REQUEST_URI']);
    $urls = $querystring[0];
    if (substr($urls, strlen($urls) - 1) === "/") {
        $urls = rtrim($urls, "/");
    }

    return $_SERVER['SCRIPT_NAME'] === $urls || !$urls;
}

function render_content($default = "default.php")
{
    $querystring = explode("?", $_SERVER['REQUEST_URI']);
    $urls = $querystring[0];

    $page = str_replace($_SERVER['SCRIPT_NAME'] . "/", "", $urls);
    if (substr($page, strlen($page) - 1) === "/") {
        return;
    }
    require sprintf("%s/%s", UI_DIR, $page);
}

function path($url, $params = [])
{
    $querystring = [];
    foreach ($params as $key => $param) {
        $querystring[] = $key . "=" . $param;
    }
    if ($querystring) {
        $querystring = implode("&", $querystring);
        $querystring = "?" . $querystring;
    } else {
        $querystring = "";
    }
    return sprintf("%s/%s%s", $_SERVER['SCRIPT_NAME'], $url, $querystring);
}

function secured_page()
{
    if (false === is_authenticated()) {
        redirect('login');
    }
}

function has_role($role)
{
    return in_array($role, get_session_data("roles", []));
}

function load_init_data($status = false)
{
    if ($status) {
        foreach ([ROLE_ADMIN, ROLE_SUPPLIER, ROLE_CUSTOMER] as $role) {
            $stmt = Database::get_connection()->prepare("insert into role(name)VALUES(:name)");
            $stmt->bindParam(':name', $role);
            $stmt->execute();
        }
        $name = "admin";
        $email = "admin@admin.com";
        $stmt = Database::get_connection()->prepare("insert into user(email, first_name, last_name, password) " .
            "VALUES(:email, :fname, :lname, :password)");
        $stmt->bindParam(':fname', $name);
        $stmt->bindParam(':lname', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', md5($name));
        $stmt->execute();
        $id = 1;
        $stmt = Database::get_connection()
            ->prepare("insert into user_role (user_id,role_id) values(:user_id, :role_id)");
        $stmt->bindParam(':role_id', $id);
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();

        $id = 2;
        $i = 2;
        foreach (["sup" => "sup@sup.com", "sup2" => "sup2@sup.com"] as $name => $email) {
            $stmt = Database::get_connection()->prepare("insert into user(email, first_name, last_name, password) " .
                "VALUES(:email, :fname, :lname, :password)");
            $stmt->bindParam(':fname', $name);
            $stmt->bindParam(':lname', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', md5($name));
            $stmt->execute();
            $stmt = Database::get_connection()
                ->prepare("insert into user_role (user_id,role_id) values(:user_id, :role_id)");
            $stmt->bindParam(':role_id', $id);
            $stmt->bindParam(':user_id', $i);
            $stmt->execute();
            $i++;
        }
    }

}

function pretty_dump($array)
{

    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function get_cart()
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart']['total_amount'] = 0;
        $_SESSION['cart']['item_count'] = 0;
        $_SESSION['cart']['items'] = [];
    }
    return $_SESSION['cart'];
}

function clear_cart()
{
    unset($_SESSION['cart']);
}

function set_cart($data)
{

    return $_SESSION['cart'] = $data;
}

function get_clean_form_image($name, &$errors)
{
    return upload($name, $errors);
}

function upload($name, &$errors)
{
    if ($_FILES[$name]['error'] > 0) {
        $errors[$name][] = 'An error ocurred when uploading.';
        return '';
    }

    if ($_FILES[$name]['size'] > 500000) {
        $errors[$name][] = 'File uploaded exceeds maximum upload size.';
        return '';
    }
    $ext = pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);
    $newfilename = substr(md5(mt_rand()), 0, 7) . "." . $ext;
    $path = 'upload/' . $newfilename;
    if (file_exists($path)) {
        $errors[$name][] = 'File with that name already exists.';
        return '';
    }
    if (!move_uploaded_file($_FILES[$name]['tmp_name'], $path)) {
        $errors[$name][] = 'Error uploading file - check destination is writeable.';
        return '';
    }

    return $path;
}

function asset($asset)
{

    $base = BASE_DIR;

    $d = explode("/", $_SERVER['DOCUMENT_ROOT']);
    if (BASE_DIR === end($d)) {
        $base = '';
    } else {
        $base = '/' . $base;
    }

    return sprintf("%s/%s", $base, $asset);
}

function base_url()
{
    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}