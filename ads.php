<?php 
	class Ads {
		private $socket;
		private $AmsNetIdTarget;
		private $AmsnetIdSource; 		
		     
		public function __construct($a1,$a2,$a3,$a4,$a5,$a6,$port )
    	{
        	$this->AmsNetAddrTarget = new AmsAddr($a1,$a2,$a3,$a4,$a5,$a6,$port); 						
			$this->AmsnetAddrSource = new AmsAddr(192,168,0,162,1,1,3000); 
    	}

		public function SetOwnAmsAddr($a1,$a2,$a3,$a4,$a5,$a6,$port )
		{
			$this->AmsnetAddrSource->SetAddr($a1,$a2,$a3,$a4,$a5,$a6,$port );
		}

		function Connect($host, $port ) 
		{
			error_reporting(E_ALL);
			/* Die  IP-Adresse des Zielrechners ermitteln. */
			$address = gethostbyname($host);
			
			$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
			if ($this->socket === false) {
				echo "socket_create() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error()) . "\n";
				return false;
			} 

			$result = socket_connect($this->socket, $address, $port);
			if ($result === false) {
				echo "socket_connect() fehlgeschlagen.\nGrund: ($result) " . socket_strerror(socket_last_error($this->socket)) . "\n";
				return false;
			}
			return true;

		}
		
		function Disconnect()
		{
			socket_close($this->socket);
		}

		function AdsRead($u32IndexGroup, $u32IndexOffset, $u32Length)
		{
			$u32InvokeId = 0;
			$AmsSendPacket    = new tAMS_PACKET_REQ_R();
			$AmsReceivePacket = new tAMS_PACKET_RESP_R();
		   
			$AmsSendPacket->TargetAmsAddr = $this->AmsNetAddrTarget;
			$AmsSendPacket->SourceAmsAddr = $this->AmsnetAddrSource;
		   
			$AmsSendPacket->u16CommandId  = ADSSRVID_READ;
			$AmsSendPacket->u16StateFlags = STATE_FLAG_MASK_ADS_CMD;
			$AmsSendPacket->u32Length     = tADS_REQ_READ::Size();
			$AmsSendPacket->u32ErrorCode  = 0;
			$AmsSendPacket->u32InvokeId   = $u32InvokeId;
		   
			$AmsSendPacket->ReadRequest->u32IndexGroup  = $u32IndexGroup;
			$AmsSendPacket->ReadRequest->u32IndexOffset = $u32IndexOffset;
			$AmsSendPacket->ReadRequest->u32Length      = $u32Length;
		   
		   
			$AmsSendPacket->TmsTcpHeader->reserved = 0;
			$AmsSendPacket->TmsTcpHeader->u32Length = SIZEOF_AMS_HEADER + tADS_REQ_READ::Size();
		   
		    socket_set_option($this->socket,SOL_SOCKET, SO_RCVTIMEO, array("sec"=>5, "usec"=>0));
			// Write AmsCmd
			
			socket_write( $this->socket, $AmsSendPacket->ToStream(), $AmsSendPacket->Size());

			// Read AmsResponse
			$AmsReceivePacket->ToStruct(socket_read($this->socket, 1000 + $AmsReceivePacket->Size()));
			
			return $AmsReceivePacket->ReadResponse->Data;
		}
		
		function AdsWrite($u32IndexGroup, $u32IndexOffset, $data, $u32Length)
		{
			$AmsSendPacket    = new tAMS_PACKET_REQ_W();
			$AmsReceivePacket = new tAMS_PACKET_RESP_W();

			$AmsSendPacket->TargetAmsAddr = $this->AmsNetAddrTarget;
			$AmsSendPacket->SourceAmsAddr = $this->AmsnetAddrSource;

			$AmsSendPacket->u16CommandId  = ADSSRVID_WRITE;
			$AmsSendPacket->u16StateFlags = STATE_FLAG_MASK_ADS_CMD;
			$AmsSendPacket->u32Length     = (tADS_REQ_WRITE::Size() - ADS_MAX_DATA_SIZE) + u32Length;
			$AmsSendPacket->u32ErrorCode  = 0;
			$AmsSendPacket->u32InvokeId   = $u32InvokeId;

			$AmsSendPacket->WriteRequest->u32IndexGroup  = $u32IndexGroup;
			$AmsSendPacket->WriteRequest->u32IndexOffset = $u32IndexOffset;
			$AmsSendPacket->WriteRequest->u32Length      = $u32Length;
			$AmsSendPacket->WriteRequest->data      	 = $data;


			$AmsSendPacket->TmsTcpHeader->reserved = 0;
			$AmsSendPacket->TmsTcpHeader->u32Length = SIZEOF_AMS_HEADER + tADS_REQ_READ::Size() - ADS_MAX_DATA_SIZE + u32Length;

		    socket_set_option($this->socket,SOL_SOCKET, SO_RCVTIMEO, array("sec"=>5, "usec"=>0));
			// Write AmsCmd
			
			socket_write( $this->socket, $AmsSendPacket->ToStream(), $AmsSendPacket->Size());

			// Read AmsResponse
			$AmsReceivePacket->ToStruct(socket_read($this->socket, $AmsReceiReadWriteResponsevePacket->Size()));

    
    		return $AmsReceivePacket->u32WrResponse;
		}

		function AdsReadWrite($u32IndexGroup, $u32IndexOffset, $u32RdLength, $u32WrLength, $WrData)
		{
		
			$AmsSendPacket    = new tAMS_PACKET_REQ_RW();
			$AmsReceivePacket = new tAMS_PACKET_RESP_RW();

			$AmsSendPacket->TargetAmsAddr = $this->AmsNetAddrTarget;
			$AmsSendPacket->SourceAmsAddr = $this->AmsnetAddrSource;

   			$AmsSendPacket->u16CommandId  = ADSSRVID_READWRITE;
			$AmsSendPacket->u16StateFlags = STATE_FLAG_MASK_ADS_CMD;
			$AmsSendPacket->u32Length     = (tADS_REQ_READ::Size()) + $u32WrLength;
			$AmsSendPacket->u32ErrorCode  = 0;
			$AmsSendPacket->u32InvokeId   = 0;

			$AmsSendPacket->ReadWriteRequest->u32IndexGroup  = $u32IndexGroup;
			$AmsSendPacket->ReadWriteRequest->u32IndexOffset = $u32IndexOffset;
			$AmsSendPacket->ReadWriteRequest->u32ReadLength  = $u32RdLength;
			$AmsSendPacket->ReadWriteRequest->u32WriteLength = $u32WrLength;

			$AmsSendPacket->ReadWriteRequest->Data = $WrData;



			$AmsSendPacket->TmsTcpHeader->reserved = 0;
			$AmsSendPacket->TmsTcpHeader->u32Length = SIZEOF_AMS_HEADER + $AmsSendPacket->Size() + 1000 ;//+ $u32WrLength;

			socket_set_option($this->socket,SOL_SOCKET, SO_RCVTIMEO, array("sec"=>5, "usec"=>0));

			echo var_dump(unpack("H*", $AmsSendPacket->ToStream()));

			echo $AmsSendPacket->Size() . "\n";
			// Write AmsCmd
			echo socket_write( $this->socket, $AmsSendPacket->ToStream(), 68);
			// Read AmsResponse  
			//$AmsReceivePacket->ToStruct(socket_read($this->socket, $AmsReceivePacket->Size()));
			$test = socket_read($this->socket, 64 + $AmsReceivePacket->Size(),PHP_BINARY_READ);
			//echo $test;
			echo var_dump(unpack("H*",socket_read($this->socket, 1000 + $AmsReceivePacket->Size(),PHP_BINARY_READ)));
echo socket_last_error();
			return $AmsReceivePacket->ReadWriteResponse->Data;
		}
		
		function AdsReadSymbol($Name, $Type)
		{
			echo strlen($Name);
			echo $this->AdsReadWrite(0x0000F004, 00, 50, 64, pack("a*",$Name));
		}
	} 
?>
