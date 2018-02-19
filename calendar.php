<? 	
	
class Calendar { 	
	var $bgColor = "#FFFFFF"; 	
	var $mouseOverColor = "#f4f4f4"; 	
	var $lineColor = "#cccccc"; 	
	var $fontColor = "#555555"; 	
	var $eventBgColor = "#f1f1f1"; 	
	var $eventStyle = ""; 	
	var $nowDateStyle = "bold"; 	
	var $tableWidth = 100; 	
	 	
	var $day; 	
	var $month; 	
	var $monthName; 	
	var $year; 	
	 	
	var $events = array(); 	
	var $links = array(); 	
	 	
	function Calendar($d = 0, $m = 0, $y = 0) { 	
	$this->day = (int) $d ? (int) $d : date("j"); 	
	$this->month = (int) $m ? (int) $m : date("n"); 	
 $this->monthName = date("M - Y"); 	
	$this->year = (int) $y ? (int) $y : date("Y"); 	
	} 	
	 	
	function setEvent($d, $link) { 	
	$this->events[] = $d; 	
 $this->links[] = $link; 	
	} 	
	 	
	function defineEvents($listEvents) { 	
	$this->events = $listEvents; 	
	} 	
	
	function defineLinks($listLinks) { 	
	$this->links = $listLinks; 	
	} 	
	
	function show($write = true) { 	
 $return = ""; 	
	$return .= "<table width='" . $this->tableWidth . "' cellspacing='1' cellpadding='2' bgcolor='" . $this->lineColor . "' style='font-family: Small Fonts, Verdana; font-size: 9px;'>\r\n"; 	
	$return .= "\t<tr>\r\n"; 	
 $return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "' colspan=\"7\"><b>".$this->monthName."</b></td>\r\n"; 	
 $return .= "\t</tr>\r\n"; 	
 $return .= "\t<tr>\r\n"; 	
	$return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "'><b>D</b></td>\r\n"; 	
	$return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "'><b>S</b></td>\r\n"; 	
	$return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "'><b>T</b></td>\r\n"; 	
	$return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "'><b>Q</b></td>\r\n"; 	
	$return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "'><b>Q</b></td>\r\n"; 	
	$return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "'><b>S</b></td>\r\n"; 	
	$return .= "\t\t<td align='center' bgcolor='" . $this->bgColor . "'><b>S</b></td>\r\n"; 	
	$return .= "\t</tr>\r\n"; 	
	$return .= "\t<tr>\r\n"; 	
	 	
	$tempo = mktime(0, 0, 0, $this->month, 1, $this->year); 	
	 	
	$fwd = date("w", $tempo); 	
	$td = date("t", $tempo); 	
	 	
	$iDay = 1; 	
	$iTmp = 0; 	
 $contLinks = 0;	
	 	
	for($i = 0; $i < $fwd; $i++) { 	
	$return .= "\t\t<td bgcolor='" . $this->bgColor . "'><span></span></td>\r\n"; 	
	$iTmp++; 	
	} 	
	 	
	while($iDay <= $td) { 	
	$tmp = $iTmp % 7; 	
	 	
	if($tmp == 0 && $iTmp != 0) 	
	$return .= "\t</tr>\r\n\t<tr>\r\n"; 	
	 	
	if(in_array($iDay, $this->events)) { 	
	$thisBg = $this->eventBgColor; 	
	 	
	switch($this->eventStyle) { 	
	case "bold": 	
	$aDay = "<b>{$iDay}</b>"; 	
	break; 	
	case "italic": 	
	$aDay = "<i>{$iDay}</i>"; 	
	break; 	
	case "bold-italic": 	
	$aDay = "<b><i>{$iDay}</i></b>"; 	
	break; 	
	default: 	
	$aDay = "<a href=\"".$this->links[$contLinks]."\">".$iDay."</a>"; 	
	$contLinks++;	
	} 	
	} else { 	
	$thisBg = $this->bgColor; 	
	$aDay = $iDay; 	
	} 	
	 	
	if($iDay == $this->day) { 	
	switch($this->nowDateStyle) { 	
	case "bold": 	
	$aDay = "<b>{$iDay}</b>"; 	
	break; 	
	case "italic": 	
	$aDay = "<i>{$iDay}</i>"; 	
	break; 	
	case "bold-italic": 	
	$aDay = "<b><i>{$iDay}</i></b>"; 	
	break; 	
	default: 	
	$aDay = $iDay; 	
	} 	
	} 	
	 	
	$return .= "\t\t<td "; 	
	$return .= "align='center' "; 	
	$return .= "bgcolor='" . $thisBg . "' "; 	
	$return .= "style='cursor: pointer; color: " . $this->fontColor . ";' "; 	
	$return .= "onmouseover=\"this.bgColor = '" . $this->mouseOverColor . "'\" "; 	
	$return .= "onmouseout=\"this.bgColor = '" . $thisBg . "'\">"; 	
	$return .= $aDay; 	
	$return .= "</td>\r\n"; 	
	 	
	$iDay++; 	
	$iTmp++; 	
	} 	
	 	
	while(($iTmp % 7) > 0) { 	
	$return .= "\t\t<td bgcolor='" . $this->bgColor . "'><span></span></td>\r\n"; 	
	$iTmp++; 	
	} 	
	 	
	$return .= "\t</tr>\r\n</table>\r\n"; 	
	 	
	if($write) { 	
	echo $return; 	
	} else { 	
	return $return;
	}
		}
	}
	
	?>