<?php 
function afficher($table){
	$data=[];
	if(require("conex.php"))
	{
		$req=$access->prepare("SELECT * FROM $table ORDER BY id ASC"); 
	     $req->execute();
		 $rows=$req->fetchAll(PDO::FETCH_OBJ);

        foreach ($rows as $row ){
			$imageData = base64_encode($row->img);
            $imageType = exif_imagetype('data://image/jpeg;base64,' . $imageData);
            $mimeType = image_type_to_mime_type($imageType);
			$row->img = 'data:' . $mimeType . ';base64,' . $imageData;
		    $data[]=$row;
		}
		
		 $req->closeCursor();
	}
	return $data;
};


?>