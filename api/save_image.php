<?php
	$folder = "/Medico/uploads/images/";
	$destinationFolder = $_SERVER['DOCUMENT_ROOT'] . $folder; 
	$maxFileSize = 2 * 1024 * 1024;

	$postdata = file_get_contents("php://input");

	if (!isset($postdata) || empty($postdata))
	    exit(json_encode(["success" => false, "reason" => "Not a post data"]));

	$request = json_decode($postdata);

	if (trim($request->data) === "")
	    exit(json_encode(["success" => false, "reason" => "Not a post data"]));

	$file = $request->data;

	$size = getimagesize($file);
	$ext = $size['mime'];
	if ($ext == 'image/jpeg')
	    $ext = '.jpg';
	elseif ($ext == 'image/png')
	    $ext = '.png';
	else
	    exit(json_encode(['success' => false, 'reason' => 'only png and jpg mime types are allowed']));

	if (strlen(base64_decode($file)) > $maxFileSize)
	    exit(json_encode(['success' => false, 'reason' => "file size exceeds {$maxFileSize} Mb"]));

	$img = str_replace('data:image/png;base64,', '', $file);
	$img = str_replace('data:image/jpeg;base64,', '', $img);
	$img = str_replace(' ', '+', $img);

	$img = base64_decode($img);

	$filename = $request->nombre.$ext;

	$destinationPath = "$destinationFolder$filename";

	$success = file_put_contents($destinationPath, $img);

	if (!$success)
	    exit(json_encode(['success' => false, 'reason' => 'the server failed in creating the image']));

	exit(json_encode(['success' => true, 'path' => "$folder$filename"]));
?>