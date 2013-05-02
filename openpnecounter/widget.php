<?php
/**
 * Include Response class and create object Response
 */
require_once('response.class.php');
$response_obj = new Response();

if (isset($_POST) && isset($_SERVER['PHP_AUTH_USER'])) {
    /**
     * Set response format
     */
    $format = isset($_POST['format']) ? (int)$_POST['format'] : 0;
    $format = ($format == 1) ? 'xml' : 'json';
    $response_obj->setFormat($format);
    /**
     * Widget type:
     * 1 - Number + optional secondary stat
     * 2 - RAG column and numbers
     * 3 - RAG numbers only
     * 4 - Text
     */
    $type = isset($_POST['type']) ? (int)$_POST['type'] : 1;

    /**
     * Check API key
     */
    if ('123' == $_SERVER['PHP_AUTH_USER']) {
        switch($type) {
            case 1:
                $data = array('item' => array(
                                array('value' => 123, 'text' => 'text'),
                                array('value' => 103, 'text' => 'text'),
                ));
                $response = $response_obj->getResponse($data);
                break;
            case 2:
                $data = array('item' => array(
                                array('value' => 134, 'text' => 'Red Indicator'),
                                array('value' => NULL, 'text' => 'Amber Indicator'),
                                array('value' => 34, 'text' => 'Green Indicator'),
                ));
                $response = $response_obj->getResponse($data);
                break;
            case 3:
                $data = array('item' => array(
                                array('value' => NULL, 'text' => 'Red Indicator'),
                                array('value' => 134, 'text' => 'Amber Indicator'),
                                array('value' => 234, 'text' => 'Green Indicator'),
                ));
                $response = $response_obj->getResponse($data);
                break;
            case 4:
                $data = array('item' => array(
                                array('text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ", 'type' => 0),
                                array('text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.", 'type' => 1),
                ));
                $response = $response_obj->getResponse($data, true);
                break;
        }
        echo $response;
    }
    else {
        Header("HTTP/1.1 403 Access denied");
        $data = array('error' => 'Access denied.');
        echo $response_obj->getResponse($data);
    }
}
else {
    Header("HTTP/1.1 404 Page not found");
}
