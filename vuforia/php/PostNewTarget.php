<?php

require_once 'HTTP/Request2.php';
require_once 'SignatureBuilder.php';

// See the Vuforia Web Services Developer API Specification - https://developer.vuforia.com/resources/dev-guide/retrieving-target-cloud-database
// The PostNewTarget sample demonstrates how to update the attributes of a target using a JSON request body. This example updates the target's metadata.

class PostNewTarget{

	//Server Keys

	
	//private $targetId 		= "eda03583982f41cdbe9ca7f50734b9a1";
	private $url 			= "https://vws.vuforia.com";
	private $requestPath 	= "/targets";
	private $request;       // the HTTP_Request2 object
	private $jsonRequestObject;
	

	
	function PostNewTarget($accessKey, $secretKey, $targetName, $imageLocation, $itemType, $itemLocation, $scale,$rotationx, $rotationy, $rotationz,$region,$grapeType,$pairing,$YearArrFinal){
    	$metadata = $itemType."~)".$itemLocation."~)".$scale."~)".$rotationx."~)".$rotationy."~)".$rotationz."~)".$region."~)".$grapeType."~)".$pairing."~)".$YearArrFinal;
		$this->jsonRequestObject = json_encode( array( 'width'=>320.0 , 'name'=>$targetName , 'image'=>$this->getImageAsBase64($imageLocation) , 'application_metadata'=>base64_encode($metadata) , 'active_flag'=>1 ) );

		$this->execPostNewTarget($accessKey, $secretKey, $targetName,$imageLocation, $itemType, $itemLocation, $scale, $rotationx, $rotationy, $rotationz, $region, $grapeType,$pairing,$YearArrFinal);

	}
	
	function getImageAsBase64($imageLocation){
		
		$file = file_get_contents( $imageLocation );
		
		if( $file ){
			
			$file = base64_encode( $file );
		}
		
		return $file;
	
	}

	public function execPostNewTarget($accessKey, $secretKey, $targetName, $imageLocation, $itemType, $itemLocation, $scale, $rotationx, $rotationy, $rotationz,  $region, $grapeType,$pairing, $YearArrFinal){

		$this->request = new HTTP_Request2();
		$this->request->setMethod( HTTP_Request2::METHOD_POST );
		$this->request->setBody( $this->jsonRequestObject );

		$this->request->setConfig(array(
				'ssl_verify_peer' => false
		));

		$this->request->setURL( $this->url . $this->requestPath );

		// Define the Date and Authentication headers
		$this->setHeaders($accessKey, $secretKey);


		try {

			$response = $this->request->send();

			if (200 == $response->getStatus() || 201 == $response->getStatus() ) {
				$json = json_decode($response->getBody(), true);
				$result_code=$json['result_code'];
				include 'connection.php';
				$vuforiaId= $json['target_id'];
                $sql = "INSERT INTO objects(vuforiaId,targetName,imageLocation,itemType,itemLocation,scale,rotationx,rotationy,rotationz,region,grapeType,pairing,years)
                VALUES ('$vuforiaId','$targetName','$imageLocation','$itemType','$itemLocation','$scale','$rotationx','$rotationy','$rotationz', '$region', '$grapeType','$pairing','$YearArrFinal')";
                if (mysqli_multi_query($conn, $sql)) {
                    echo "<script>
                        window.location.href = 'target-manager.php';
                    </script>";
                }
				else
				{
					echo '<div class="card border-left-danger shadow" style="position:absolute; top:20px; right:20px; width:200px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Failed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'"Error: " .$sql."<br>".mysqli_error($conn)'</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>';
					
					
					echo "Error: " .$sql."<br>".mysqli_error($conn);
				}
				
				
				
				
			} else {
			    $json = json_decode($response->getBody(), true);
				$result_code=$json['result_code'];
			    echo '<div class="card border-left-danger shadow" style="position:absolute; top:20px; right:20px; width:200px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Failed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">'.$result_code.'</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>';
			}
		} catch (HTTP_Request2_Exception $e) {
			//echo 'Error: ' . $e->getMessage();
		}


	}

	private function setHeaders($accessKey, $secretKey){
		$sb = 	new SignatureBuilder();
		$date = new DateTime("now", new DateTimeZone("GMT"));

		// Define the Date field using the proper GMT format
		$this->request->setHeader('Date', $date->format("D, d M Y H:i:s") . " GMT" );
		
		$this->request->setHeader("Content-Type", "application/json" );
		// Generate the Auth field value by concatenating the public server access key w/ the private query signature for this request
		$this->request->setHeader("Authorization" , "VWS " . $accessKey . ":" . $sb->tmsSignature( $this->request , $secretKey ));

	}
}

?>
