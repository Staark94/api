<?php
    require '../vendor/autoload.php';
    use Src\DB;
    use Src\Model\User;
    use Src\Model\Posts;

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get data
    $users = new User;
    $posts = new Posts;

    // set response code - 200 OK
    http_response_code(200);

    if(isset($_GET['type']))
    {
        switch($_GET['type'])
        {
            case "get_user_data":
                $data = [
                    "api_status" => "success",
                    "status" => 200,
                    "api_version" => "1.3",
                    "user_data" => $users->get()
                ];
            break;

            case "posts_data":
                $data = [
                    "api_status" => "success",
                    "status" => 200,
                    "api_version" => "1.3",
                    "posts_data" => $posts->get()
                ];
            break;

            default:
                $data = [
                    "api_status" => "error",
                    "status" => 404,
                    "api_version" => "1.3"
                ];
        }

        // show products data in json format
        echo json_encode($data);
    } else {
        $data = [
            "status" => 404,
            "message" => "request method not found",
            "data" => []
        ];

        echo json_encode($data);
    }
?>