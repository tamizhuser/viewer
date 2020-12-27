<?php

require_once 'HTTP/Request2.php';
require_once 'SignatureBuilder.php';

// See the Vuforia Web Services Developer API Specification - https://developer.vuforia.com/resources/dev-guide/retrieving-target-cloud-database
// The DeleteTarget sample demonstrates how to delete a target from its Cloud Database using the target's target id.
// * note that targets cannot be 'Processing' and must be inactive to be deleted.

class DeleteTarget{

	private $url 			= "https://vws.vuforia.com";
	private $requestPath 	= "/targets/";
	private $request;
	
	function DeleteTarget($accessKey, $secretKey, $targetId){

		$this->requestPath = $this->requestPath . $targetId;
		
		$this->execDeleteTarget($accessKey, $secretKey, $targetId);

	}

	public function execDeleteTarget($accessKey, $secretKey, $targetId){

		$this->request = new HTTP_Request2();
		$this->request->setMethod( HTTP_Request2::METHOD_DELETE );
		
		$this->request->setConfig(array(
				'ssl_verify_peer' => false
		));

		$this->request->setURL( $this->url . $this->requestPath );

		// Define the Date and Authentication headers
		$this->setHeaders($accessKey, $secretKey);


		try {

			$response = $this->request->send();

			if (200 == $response->getStatus()) {
				include 'connection.php';
				$query="delete from objects where vuforiaId='$targetId'";
                if (mysqli_query($conn, $query)) {
                    echo "<script>
                        window.location.href = 'target-manager.php';
                    </script>";
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
			echo 'Error: ' . $e->getMessage();
		}


	}

	private function setHeaders($accessKey, $secretKey){
		$sb = 	new SignatureBuilder();
		$date = new DateTime("now", new DateTimeZone("GMT"));

		// Define the Date field using the proper GMT format
		$this->request->setHeader('Date', $date->format("D, d M Y H:i:s") . " GMT" );
		// Generate the Auth field value by concatenating the public server access key w/ the private query signature for this request
		$this->request->setHeader("Authorization" , "VWS " . $accessKey . ":" . $sb->tmsSignature( $this->request , $secretKey ));

	}
}

?>
