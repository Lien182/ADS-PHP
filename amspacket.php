<?php



define("ADS_TCP_SERVER_PORT",0xBF02);


define("STATE_FLAG_MASK_RESPONSE",0x0001);
define("STATE_FLAG_MASK_ADS_CMD", 0x0004);

////////////////////////////////////////////////////////////////////////////////
// AMS Ports
define("AMSPORT_LOGGER",100);
define("AMSPORT_R0_RTIME",200);
define("AMSPORT_R0_TRACE",(AMSPORT_R0_RTIME + 90));
define("AMSPORT_R0_IO",300);
define("AMSPORT_R0_SPS",400);
define("AMSPORT_R0_NC",500);
define("AMSPORT_R0_ISG",550);
define("AMSPORT_R0_PCS ",600);
define("AMSPORT_R0_PLC",801);
define("AMSPORT_R0_PLC_RTS1",801);
define("AMSPORT_R0_PLC_RTS2",811);
define("AMSPORT_R0_PLC_RTS3",821);
define("AMSPORT_R0_PLC_RTS4",831);
define("AMSPORT_R0_PLC_TC",851);

////////////////////////////////////////////////////////////////////////////////
// ADS Cmd Ids
define("ADSSRVID_INVALID",0x00);
define("ADSSRVID_READDEVICEINFO",0x01);
define("ADSSRVID_READ",0x02);
define("ADSSRVID_WRITE",0x03);
define("ADSSRVID_READSTATE",0x04);
define("ADSSRVID_WRITECTRL",0x05);
define("ADSSRVID_ADDDEVICENOTE",0x06);
define("ADSSRVID_DELDEVICENOTE",0x07);
define("ADSSRVID_DEVICENOTE",0x08);
define("ADSSRVID_READWRITE",0x09);

////////////////////////////////////////////////////////////////////////////////
// ADS reserved index groups
define("ADSIGRP_SYMTAB",0xF000);
define("ADSIGRP_SYMNAME",0xF001);
define("ADSIGRP_SYMVAL",0xF002);

define("ADSIGRP_SYM_HNDBYNAME",0xF003);
define("ADSIGRP_SYM_VALBYNAME",0xF004);
define("ADSIGRP_SYM_VALBYHND",0xF005);
define("ADSIGRP_SYM_RELEASEHND",0xF006);
define("ADSIGRP_SYM_INFOBYNAME",0xF007);
define("ADSIGRP_SYM_VERSION",0xF008);
define("ADSIGRP_SYM_INFOBYNAMEEX",0xF009);

define("ADSIGRP_SYM_DOWNLOAD",0xF00A);
define("ADSIGRP_SYM_UPLOAD",0xF00B);
define("ADSIGRP_SYM_UPLOADINFO",0xF00C);
define("ADSIGRP_SYM_DOWNLOAD2",0xF00D);
define("ADSIGRP_SYM_DT_UPLOAD",0xF00E);
define("ADSIGRP_SYM_UPLOADINFO2",0xF00F);

define("ADSIGRP_SYMNOTE",0xF010 );     /**< notification of named handle */

/**
 * AdsRW  IOffs list size or 0 (=0 -> list size == WLength/3*sizeof(ULONG))
 * @param W: {list of IGrp, IOffs, Length}
 * @param R: if IOffs != 0 then {list of results} and {list of data}
 * @param R: if IOffs == 0 then only data (sum result)
 */
define("ADSIGRP_SUMUP_READ",0xF080);

/**
 * AdsRW  IOffs list size
 * @param W: {list of IGrp, IOffs, Length} followed by {list of data}
 * @param R: list of results
 */
define("ADSIGRP_SUMUP_WRITE",0xF081);

/**
 * AdsRW  IOffs list size
 * @param W: {list of IGrp, IOffs, RLength, WLength} followed by {list of data}
 * @param R: {list of results, RLength} followed by {list of data}
 */
define("ADSIGRP_SUMUP_READWRITE",0xF082);

/**
 * AdsRW  IOffs list size
 * @param W: {list of IGrp, IOffs, Length}
 */
define("ADSIGRP_SUMUP_READEX",0xF083);

/**
 * AdsRW  IOffs list size
 * @param W: {list of IGrp, IOffs, Length}
 * @param R: {list of results, Length} followed by {list of data (returned lengths)}
 */
define("ADSIGRP_SUMUP_READEX2",0xF084);

/**
 * AdsRW  IOffs list size
 * @param W: {list of IGrp, IOffs, Attrib}
 * @param R: {list of results, handles}
 */
define("ADSIGRP_SUMUP_ADDDEVNOTE",0xF085);

/**
 * AdsRW  IOffs list size
 * @param W: {list of handles}
 * @param R: {list of results, Length} followed by {list of data}
 */
define("ADSIGRP_SUMUP_DELDEVNOTE",0xF086);

define("ADSIGRP_IOIMAGE_RWIB",0xF020   );   /**< read/write input byte(s) */
define("ADSIGRP_IOIMAGE_RWIX",0xF021   );   /**< read/write input bit */
define("ADSIGRP_IOIMAGE_RISIZE",0xF025  );    /**< read input size (in byte) */
define("ADSIGRP_IOIMAGE_RWOB",0xF030    );  /**< read/write output byte(s) */
define("ADSIGRP_IOIMAGE_RWOX",0xF031    );  /**< read/write output bit */
define("ADSIGRP_IOIMAGE_ROSIZE",0xF035   );   /**< read output size (in byte) */
define("ADSIGRP_IOIMAGE_CLEARI",0xF040    );  /**< write inputs to null */
define("ADSIGRP_IOIMAGE_CLEARO",0xF050  );    /**< write outputs to null */
define("ADSIGRP_IOIMAGE_RWIOB",0xF060  );   /**< read input and write output byte(s) */

define("ADSIGRP_DEVICE_DATA",0xF100    );  /**< state, name, etc... */
define("ADSIOFFS_DEVDATA_ADSSTATE",0x0000   );   /**< ads state of device */
define("ADSIOFFS_DEVDATA_DEVSTATE",0x0002   );   /**< device state */

////////////////////////////////////////////////////////////////////////////////
// Global Return codes
define("ERR_GLOBAL",0x0000);

define("GLOBALERR_TARGET_PORT",(0x06 + ERR_GLOBAL)); /**< target port not found, possibly the ADS Server is not started */
define("GLOBALERR_MISSING_ROUTE",(0x07 + ERR_GLOBAL)); /**< target machine not found, possibly missing ADS routes */
define("GLOBALERR_NO_MEMORY",(0x19 + ERR_GLOBAL)); /**< No memory */
define("GLOBALERR_TCP_SEND",(0x1A + ERR_GLOBAL)); /**< TCP send error */

////////////////////////////////////////////////////////////////////////////////
// Router Return codes
define("ERR_ROUTER",0x0500);

define("ROUTERERR_NOTREGISTERED",(0x07 + ERR_ROUTER)); /**< Port not registered */
define("ROUTERERR_NOMOREQUEUES",(0x08 + ERR_ROUTER)); /**< The maximum number of Ports reached */

////////////////////////////////////////////////////////////////////////////////
// ADS Return codes
define("ADSERR_NOERR",0x00);
define("ERR_ADSERRS",0x0700);

define("ADSERR_DEVICE_ERROR",(0x00 + ERR_ADSERRS) );/**< Error class < device error > */
define("ADSERR_DEVICE_SRVNOTSUPP",(0x01 + ERR_ADSERRS)); /**< Service is not supported by server */
define("ADSERR_DEVICE_INVALIDGRP",(0x02 + ERR_ADSERRS) );/**< invalid indexGroup */
define("ADSERR_DEVICE_INVALIDOFFSET",(0x03 + ERR_ADSERRS)); /**< invalid indexOffset */
define("ADSERR_DEVICE_INVALIDACCESS",(0x04 + ERR_ADSERRS)); /**< reading/writing not permitted */
define("ADSERR_DEVICE_INVALIDSIZE",(0x05 + ERR_ADSERRS)); /**< parameter size not correct */
define("ADSERR_DEVICE_INVALIDDATA",(0x06 + ERR_ADSERRS) );/**< invalid parameter value(s) */
define("ADSERR_DEVICE_NOTREADY",(0x07 + ERR_ADSERRS)); /**< device is not in a ready state */
define("ADSERR_DEVICE_BUSY",(0x08 + ERR_ADSERRS)); /**< device is busy */
define("ADSERR_DEVICE_INVALIDCONTEXT",(0x09 + ERR_ADSERRS)); /**< invalid context (must be InWindows) */
define("ADSERR_DEVICE_NOMEMORY",(0x0A + ERR_ADSERRS)); /**< out of memory */
define("ADSERR_DEVICE_INVALIDPARM",(0x0B + ERR_ADSERRS)); /**< invalid parameter value(s) */
define("ADSERR_DEVICE_NOTFOUND",(0x0C + ERR_ADSERRS)); /**< not found (files, ...) */
define("ADSERR_DEVICE_SYNTAX",(0x0D + ERR_ADSERRS)); /**< syntax error in comand or file */
define("ADSERR_DEVICE_INCOMPATIBLE",(0x0E + ERR_ADSERRS)); /**< objects do not match */
define("ADSERR_DEVICE_EXISTS",(0x0F + ERR_ADSERRS) );/**< object already exists */
define("ADSERR_DEVICE_SYMBOLNOTFOUND",(0x10 + ERR_ADSERRS)); /**< symbol not found */
define("ADSERR_DEVICE_SYMBOLVERSIONINVALID",(0x11 + ERR_ADSERRS)); /**< symbol version invalid, possibly caused by an 'onlinechange' -> try to release handle and get a new one */
define("ADSERR_DEVICE_INVALIDSTATE",(0x12 + ERR_ADSERRS) );/**< server is in invalid state */
define("ADSERR_DEVICE_TRANSMODENOTSUPP",(0x13 + ERR_ADSERRS)); /**< AdsTransMode not supported */
define("ADSERR_DEVICE_NOTIFYHNDINVALID",(0x14 + ERR_ADSERRS)); /**< Notification handle is invalid, possibly caussed by an 'onlinechange' -> try to release handle and get a new one */
define("ADSERR_DEVICE_CLIENTUNKNOWN",(0x15 + ERR_ADSERRS)); /**< Notification client not registered */
define("ADSERR_DEVICE_NOMOREHDLS",(0x16 + ERR_ADSERRS)); /**< no more notification handles */
define("ADSERR_DEVICE_INVALIDWATCHSIZE",(0x17 + ERR_ADSERRS)); /**< size for watch to big */
define("ADSERR_DEVICE_NOTINIT",(0x18 + ERR_ADSERRS)); /**< device not initialized */
define("ADSERR_DEVICE_TIMEOUT",(0x19 + ERR_ADSERRS)); /**< device has a timeout */
define("ADSERR_DEVICE_NOINTERFACE",(0x1A + ERR_ADSERRS) );/**< query interface failed */
define("ADSERR_DEVICE_INVALIDINTERFACE",(0x1B + ERR_ADSERRS)); /**< wrong interface required */
define("ADSERR_DEVICE_INVALIDCLSID",(0x1C + ERR_ADSERRS) );/**< class ID is invalid */
define("ADSERR_DEVICE_INVALIDOBJID",(0x1D + ERR_ADSERRS)); /**< object ID is invalid */
define("ADSERR_DEVICE_PENDING",(0x1E + ERR_ADSERRS)); /**< request is pending */
define("ADSERR_DEVICE_ABORTED",(0x1F + ERR_ADSERRS) );/**< request is aborted */
define("ADSERR_DEVICE_WARNING",(0x20 + ERR_ADSERRS) );/**< signal warning */
define("ADSERR_DEVICE_INVALIDARRAYIDX",(0x21 + ERR_ADSERRS)); /**< invalid array index */
define("ADSERR_DEVICE_SYMBOLNOTACTIVE",(0x22 + ERR_ADSERRS)); /**< symbol not active, possibly caussed by an 'onlinechange' -> try to release handle and get a new one */
define("ADSERR_DEVICE_ACCESSDENIED",(0x23 + ERR_ADSERRS) );/**< access denied */
define("ADSERR_DEVICE_LICENSENOTFOUND",(0x24 + ERR_ADSERRS)); /**< no license found -> Activate license for TwinCAT 3 function*/
define("ADSERR_DEVICE_LICENSEEXPIRED",(0x25 + ERR_ADSERRS)); /**< license expired */
define("ADSERR_DEVICE_LICENSEEXCEEDED",(0x26 + ERR_ADSERRS)); /**< license exceeded */
define("ADSERR_DEVICE_LICENSEINVALID",(0x27 + ERR_ADSERRS)); /**< license invalid */
define("ADSERR_DEVICE_LICENSESYSTEMID",(0x28 + ERR_ADSERRS)); /**< license invalid system id */
define("ADSERR_DEVICE_LICENSENOTIMELIMIT",(0x29 + ERR_ADSERRS)); /**< license not time limited */
define("ADSERR_DEVICE_LICENSEFUTUREISSUE",(0x2A + ERR_ADSERRS)); /**< license issue time in the future */
define("ADSERR_DEVICE_LICENSETIMETOLONG",(0x2B + ERR_ADSERRS)); /**< license time period to long */
define("ADSERR_DEVICE_EXCEPTION",(0x2C + ERR_ADSERRS)); /**< exception in device specific code -> Check each device transistions */
define("ADSERR_DEVICE_LICENSEDUPLICATED",(0x2D + ERR_ADSERRS)); /**< license file read twice */
define("ADSERR_DEVICE_SIGNATUREINVALID",(0x2E + ERR_ADSERRS)); /**< invalid signature */
define("ADSERR_DEVICE_CERTIFICATEINVALID",(0x2F + ERR_ADSERRS));/**< public key certificate */
define("ADSERR_CLIENT_ERROR",(0x40 + ERR_ADSERRS)); /**< Error class < client error > */
define("ADSERR_CLIENT_INVALIDPARM",(0x41 + ERR_ADSERRS) );/**< invalid parameter at service call */
define("ADSERR_CLIENT_LISTEMPTY",(0x42 + ERR_ADSERRS)); /**< polling list	is empty */
define("ADSERR_CLIENT_VARUSED",(0x43 + ERR_ADSERRS)); /**< var connection already in use */
define("ADSERR_CLIENT_DUPLINVOKEID",(0x44 + ERR_ADSERRS)); /**< invoke id in use */
define("ADSERR_CLIENT_SYNCTIMEOUT",(0x45 + ERR_ADSERRS)); /**< timeout elapsed -> Check ADS routes of sender and receiver and your [firewall setting](http://infosys.beckhoff.com/content/1033/tcremoteaccess/html/tcremoteaccess_firewall.html?id=12027) */
define("ADSERR_CLIENT_W32ERROR",(0x46 + ERR_ADSERRS)); /**< error in win32 subsystem */
define("ADSERR_CLIENT_TIMEOUTINVALID",(0x47 + ERR_ADSERRS)); /**< Invalid client timeout value */
define("ADSERR_CLIENT_PORTNOTOPEN",(0x48 + ERR_ADSERRS)); /**< ads dll */
define("ADSERR_CLIENT_NOAMSADDR",(0x49 + ERR_ADSERRS)); /**< ads dll */
define("ADSERR_CLIENT_SYNCINTERNAL",(0x50 + ERR_ADSERRS)); /**< internal error in ads sync */
define("ADSERR_CLIENT_ADDHASH",(0x51 + ERR_ADSERRS)); /**< hash table overflow */
define("ADSERR_CLIENT_REMOVEHASH",(0x52 + ERR_ADSERRS)); /**< key not found in hash table */
define("ADSERR_CLIENT_NOMORESYM",(0x53 + ERR_ADSERRS)); /**< no more symbols in cache */
define("ADSERR_CLIENT_SYNCRESINVALID",(0x54 + ERR_ADSERRS) );/**< invalid response received */
define("ADSERR_CLIENT_SYNCPORTLOCKED",(0x55 + ERR_ADSERRS)); /**< sync port is locked */

define("ADS_MAX_DATA_SIZE",1024);
define("SIZEOF_AMS_TCP_HEADER",6);
define("SIZEOF_AMS_HEADER",32);

define("IDX_GRP_RW_COE",0xF302);
define("IDX_GRP_RW_PLC_VAR_BY_NAME",0xF004);


abstract class ADSTRANSMODE {
    const ADSTRANS_NOTRANS = 0;
    const ADSTRANS_CLIENTCYCLE = 1;
    const ADSTRANS_CLIENTONCHA = 2;
    const ADSTRANS_SERVERCYCLE = 3;
    const ADSTRANS_SERVERONCHA = 4;
    const ADSTRANS_SERVERCYCLE2 = 5;
    const ADSTRANS_SERVERONCHA2 = 6;
    const ADSTRANS_CLIENT1REQ = 10;
    const ADSTRANS_MAXMODES = 11;
};

abstract class ADSSTATE {
    const ADSSTATE_INVALID = 0;
    const ADSSTATE_IDLE = 1;
    const ADSSTATE_RESET = 2;
    const ADSSTATE_INIT = 3;
    const ADSSTATE_START = 4;
    const ADSSTATE_RUN = 5;
    const ADSSTATE_STOP = 6;
    const ADSSTATE_SAVECFG = 7;
    const ADSSTATE_LOADCFG = 8;
    const ADSSTATE_POWERFAILURE = 9;
    const ADSSTATE_POWERGOOD = 10;
    const ADSSTATE_ERROR = 11;
    const ADSSTATE_SHUTDOWN = 12;
    const ADSSTATE_SUSPEND = 13;
    const ADSSTATE_RESUME = 14;
    const ADSSTATE_CONFIG = 15;
    const ADSSTATE_RECONFIG = 16;
    const ADSSTATE_STOPPING = 17;
    const ADSSTATE_INCOMPATIBLE = 18;
    const ADSSTATE_EXCEPTION = 19;
    const ADSSTATE_MAXSTATES = 20;
};

class AmsNetId
{
    private $b;
    public function __construct()
    {
    $this->b =  array(0,0,0,0,0,0);   
    }
    public function ToStream()
    {
        return pack("CCCCCC", $this->b[0],$this->b[1],$this->b[2],$this->b[3],$this->b[4],$this->b[5]);
    }

    function Size()
    {
       return 6;
    }
    function SetId($b0,$b1,$b2,$b3,$b4,$b5)
    {
        $this->b = array($b0,$b1,$b2,$b3,$b4,$b5);
    }
};

class AmsAddr
{
	public  $netId;
    public  $u16port;

    public function __construct($b0,$b1,$b2,$b3,$b4,$b5, $port)
    {
        $this->netId = new AmsNetId();
        $this->netId->SetId($b0,$b1,$b2,$b3,$b4,$b5);
        $this->u16port = $port;
    }

    public function ToStream()
    {
        return $this->netId->ToStream() . pack("S", $this->u16port);
    }

    function Size()
    {
        return 8;
    }

    function SetAddr($b0,$b1,$b2,$b3,$b4,$b5, $port)
    {
        $this->netId->SetId($b0,$b1,$b2,$b3,$b4,$b5);
        $this->u16port = $port;
    }
    
};

class tAMS_TCP_HEADER
{
   public $u16reserved;
   public $u32Length;

   function ToStream()
   {
       return pack("SL", $this->u16reserved, $this->u32Length);
   }

   function Size()
   {
       return 6;
   }
};

class tADS_RESP_DEVICE_INFO
{
   public $u32Result;
   public $u8MajorVersion;
   public $u8MinorVersion;
   public $u16VersionBuild;
   public $DeviceName;

   function ToStream()
   {
       return pack("LCCSC*", $this->u32Result, $this->u8MajorVersion,$this->u8MinorVersion, $this->u16VersionBuild, $this->DeviceName);
   }
   
   function Size()
   {
       return 8 + sizeof($DeviceName);
   }
};

class tADS_REQ_READ
{
   public $u32IndexGroup;
   public $u32IndexOffset;
   public $u32Length;

   public function __construct()
   {
       $this->u32IndexGroup   = 0;
       $this->u32IndexOffset = 0;
       $this->u32Length = 0;
   }

   function ToStream()
   {
       return pack("LLL", $this->u32IndexGroup, $this->u32IndexOffset,$this->u32Length);
   }
   
   static function Size()
   {
       return 12;
   }
};

class tADS_RESP_READ
{
   public $u32Result;
   public $u32Length;
   public $Data;

   function ToStream()
   {
       return pack("LLC*", $this->u32Result, $this->u32Length, $this->Data);
   }

   function Size()
   {
       return 8 + sizeof($this->Data);;
   }
};




class tADS_REQ_WRITE
{
   public $u32IndexGroup;
   public $u32IndexOffset;
   public $u32Length;
   public $Data;

   function ToStream()
   {
       return pack("LLLC*", $u32IndexGroup, $u32IndexOffset,$u32Length, $Data);
   }
   
   function Size()
   {
       return 12 + strlen($this->Data);
   }

};

class tADS_REQ_READ_WRITE
{
    public $u32IndexGroup;
    public $u32IndexOffset;
    public $u32ReadLength;
    public $u32WriteLength;
    public $Data;

    function ToStream()
    {
       return pack("LLLL", $this->u32IndexGroup, $this->u32IndexOffset,$this->u32ReadLength,$this->u32WriteLength) . "Stting" .$this->Data;
    } 

    function Size()
    {
       return 16 + sizeof($this->Data);
    }
};

abstract class tAMS_PACKET{
    public $TmsTcpHeader;
    public $TargetAmsAddr;
    public $SourceAmsAddr;
    public $u16CommandId;
    public $u16StateFlags;
    public $u32Length;
    public $u32ErrorCode;
    public $u32InvokeId;
   
    public function __construct()
    {
        $this->TmsTcpHeader = new tAMS_TCP_HEADER; 
        $this->TargetAmsAddr = new AmsAddr(0,0,0,0,0,0,0);  
        $this->SourceAmsAddr = new AmsAddr(0,0,0,0,0,0,0);
    }
	protected function SubStream()
	{
		return $this->TmsTcpHeader->ToStream() . $this->TargetAmsAddr->ToStream() . $this->SourceAmsAddr->netId->ToStream() . pack("S",$this->SourceAmsAddr->u16port) . pack("SSLLL", $this->u16CommandId, $this->u16StateFlags, $this->u32Length, $this->u32ErrorCode, $this->u32InvokeId );
	}

   function SubSize()
   {
       return $this->TmsTcpHeader->Size() + $this->TargetAmsAddr->Size() + $this->SourceAmsAddr->Size() + 16;
   }
}

class tAMS_PACKET_REQ_RW extends tAMS_PACKET
{
	public $ReadWriteRequest;
	
	public function __construct()
    {
        parent::__construct();
        $this->ReadWriteRequest = new tADS_REQ_READ_WRITE;   
    }

    public function ToStream()
    {
        return $this->SubStream() . $this->ReadWriteRequest->ToStream();
    } 

    function Size()
    {
       return $this->SubSize() + $this->ReadWriteRequest->Size();
    }
}

class tAMS_PACKET_REQ_R  extends tAMS_PACKET
{
	public $ReadRequest;
	
	public function __construct()
    {
        parent::__construct();
        $this->ReadRequest = new tADS_REQ_READ;   
    }

    public function ToStream()
    {
        return $this->SubStream() . $this->ReadRequest->ToStream();
    } 
    
    function Size()
    {
       return $this->SubSize() + $this->ReadRequest->Size();
    }

}

class tAMS_PACKET_REQ_W  extends tAMS_PACKET
{
	public $WriteRequest;
	
	public function __construct()
    {
        parent::__construct();
        $this->WriteRequest = new tADS_REQ_WRITE;   
    }

    public function ToStream()
    {
        return SubStream() . $WriteRequest->ToStream();
    }

    function Size()
    {
       return SubSize() + $WriteRequest->Size();
    }
}

class tAMS_PACKET_RESP_R extends tAMS_PACKET
{
	public $ReadResponse;
	
	public function __construct()
    {
        parent::__construct();
        $this->ReadResponse = new tADS_RESP_READ;   
    }

    public function ToStream()
    {
        return $this->SubStream() . $this->ReadResponse->ToStream();
    } 
    
    function Size()
    {
       return $this->SubSize() + $this->ReadResponse->Size();
    }

    function ToStruct($input)
    {
        $data = unpack("Sa/Lb/Cc/Cd/Ce/Cf/Cg/Ch/Si/Cj/Ck/Cl/Cm/Cn/Co/Sp/Sq/Sr/Ls/Lt/Lu/Lv/Lw/C*x",$input);
        $this->TmsTcpHeader->u16reserved = $data["a"];
        $this->TmsTcpHeader->u32Length   = $data["b"];
        $this->TargetAmsAddr->SetAddr($data["c"],$data["d"],$data["e"],$data["f"],$data["g"],$data["h"],$data["i"]);
        $this->SourceAmsAddr->SetAddr($data["j"],$data["k"],$data["l"],$data["m"],$data["n"],$data["o"],$data["p"]);
        $this->u16CommandId = $data["q"];
        $this->u16StateFlags = $data["r"];
        $this->u32Length = $data["s"];
        $this->u32ErrorCode = $data["t"];
        $this->u32InvokeId = $data["u"];
        $this->ReadResponse->u32Result = $data["v"];
        $this->ReadResponse->u32Length = $data["w"];
        $this->ReadResponse->Data = array_slice($data,array_search('x1', array_keys($data)),$data["w"]);
    }
}

class tAMS_PACKET_RESP_RW extends tAMS_PACKET
{
	public $ReadWriteResponse;
	
	public function __construct()
    {
        parent::__construct();
        $this->ReadWriteResponse = new tADS_RESP_READ;   
    }

    public function ToStream()
    {
        return $this->SubStream() . $ReadWriteResponse->ToStream();
    }

    function Size()
    {
       return $this->SubSize() + $this->ReadWriteResponse->Size();
    }
	
    function ToStruct($data)
    {
        
    }
}

class tAMS_PACKET_RESP_DevInfo extends tAMS_PACKET
{
	public $DevInfoResponse;
	
	public function __construct()
    {
        parent::__construct();
        $this->DevInfoResponse = new tADS_RESP_DEVICE_INFO;   
    }

    public function ToStream()
    {
        return SubStream() . $DevInfoResponse->ToStream();
    }

    function Size()
    {
       return SubSize() + $DevInfoResponse->Size();
    }
}

class tAMS_PACKET_RESP_W extends tAMS_PACKET
{
	public $u32WrResponse;

	public function __construct()
    {
        parent::__construct();
        $this->u32WrResponse = 0;   
    }

    public function ToStream()
    {
        return SubStream() . pack("L", $u32WrResponse);
    }
    
    function Size()
    {
       return SubSize() + $u32WrResponse;
    }
}

?>
