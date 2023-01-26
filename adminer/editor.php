<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.9
*/function
adminer_errors($bc,$cc){return!!preg_match('~^(Trying to access array offset on value of type null|Undefined array key)~',$cc);}error_reporting(6135);set_error_handler('adminer_errors',2);$vc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($vc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Og=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Og)$$X=$Og;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($t){$Gd=substr($t,-1);return
str_replace($Gd.$Gd,$Gd,substr($t,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Ye,$vc=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($x,$X)=each($Ye)){foreach($X
as$xd=>$W){unset($Ye[$x][$xd]);if(is_array($W)){$Ye[$x][stripslashes($xd)]=$W;$Ye[]=&$Ye[$x][stripslashes($xd)];}else$Ye[$x][stripslashes($xd)]=($vc?$W:stripslashes($W));}}}}function
bracket_escape($t,$Ia=false){static$_g=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($t,($Ia?array_flip($_g):$_g));}function
min_version($bh,$Sd="",$i=null){global$h;if(!$i)$i=$h;$Hf=$i->server_info;if($Sd&&preg_match('~([\d.]+)-MariaDB~',$Hf,$_)){$Hf=$_[1];$bh=$Sd;}return(version_compare($Hf,$bh)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Qf,$zg="\n"){return"<script".nonce().">$Qf</script>$zg";}function
script_src($Tg){return"<script src='".h($Tg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($A,$Y,$Xa,$Cd="",$ue="",$bb="",$Dd=""){$I="<input type='checkbox' name='$A' value='".h($Y)."'".($Xa?" checked":"").($Dd?" aria-labelledby='$Dd'":"").">".($ue?script("qsl('input').onclick = function () { $ue };",""):"");return($Cd!=""||$bb?"<label".($bb?" class='$bb'":"").">$I".h($Cd)."</label>":$I);}function
optionlist($B,$Bf=null,$Xg=false){$I="";foreach($B
as$xd=>$W){$ze=array($xd=>$W);if(is_array($W)){$I.='<optgroup label="'.h($xd).'">';$ze=$W;}foreach($ze
as$x=>$X)$I.='<option'.($Xg||is_string($x)?' value="'.h($x).'"':'').(($Xg||is_string($x)?(string)$x:$X)===$Bf?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($A,$B,$Y="",$te=true,$Dd=""){if($te)return"<select name='".h($A)."'".($Dd?" aria-labelledby='$Dd'":"").">".optionlist($B,$Y)."</select>".(is_string($te)?script("qsl('select').onchange = function () { $te };",""):"");$I="";foreach($B
as$x=>$X)$I.="<label><input type='radio' name='".h($A)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Da,$B,$Y="",$te="",$Pe=""){$ig=($B?"select":"input");return"<$ig$Da".($B?"><option value=''>$Pe".optionlist($B,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Pe'>").($te?script("qsl('$ig').onchange = $te;",""):"");}function
confirm($ae="",$Cf="qsl('input')"){return
script("$Cf.onclick = function () { return confirm('".($ae?js_escape($ae):lang(0))."'); };","");}function
print_fieldset($s,$Id,$eh=false){echo"<fieldset><legend>","<a href='#fieldset-$s'>$Id</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$s');",""),"</legend>","<div id='fieldset-$s'".($eh?"":" class='hidden'").">\n";}function
bold($Qa,$bb=""){return($Qa?" class='active $bb'":($bb?" class='$bb'":""));}function
odd($I=' class="odd"'){static$r=0;if(!$I)$r=-1;return($r++%2?$I:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($x,$X=null){static$wc=true;if($wc)echo"{";if($x!=""){echo($wc?"":",")."\n\t\"".addcslashes($x,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$wc=false;}else{echo"\n}\n";$wc=true;}}function
ini_bool($nd){$X=ini_get($nd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($ah,$N,$V,$E){$_SESSION["pwds"][$ah][$N][$V]=($_COOKIE["adminer_key"]&&is_string($E)?array(encrypt_string($E,$_COOKIE["adminer_key"])):$E);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($Q){global$h;return$h->quote($Q);}function
get_vals($F,$e=0){global$h;$I=array();$H=$h->query($F);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$e];}return$I;}function
get_key_vals($F,$i=null,$Kf=true){global$h;if(!is_object($i))$i=$h;$I=array();$H=$i->query($F);if(is_object($H)){while($J=$H->fetch_row()){if($Kf)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($F,$i=null,$o="<p class='error'>"){global$h;$mb=(is_object($i)?$i:$h);$I=array();$H=$mb->query($F);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($i)&&$o&&defined("PAGE_HEADER"))echo$o.error()."\n";return$I;}function
unique_array($J,$v){foreach($v
as$u){if(preg_match("~PRIMARY|UNIQUE~",$u["type"])){$I=array();foreach($u["columns"]as$x){if(!isset($J[$x]))continue
2;$I[$x]=$J[$x];}return$I;}}}function
escape_key($x){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$x,$_))return$_[1].idf_escape(idf_unescape($_[2])).$_[3];return
idf_escape($x);}function
where($Z,$q=array()){global$h,$w;$I=array();foreach((array)$Z["where"]as$x=>$X){$x=bracket_escape($x,1);$e=escape_key($x);$I[]=$e.($w=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($w=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($q[$x],q($X))));if($w=="sql"&&preg_match('~char|text~',$q[$x]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$x)$I[]=escape_key($x)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$q=array()){parse_str($X,$Va);remove_slashes(array(&$Va));return
where($Va,$q);}function
where_link($r,$e,$Y,$we="="){return"&where%5B$r%5D%5Bcol%5D=".urlencode($e)."&where%5B$r%5D%5Bop%5D=".urlencode(($Y!==null?$we:"IS NULL"))."&where%5B$r%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$q,$L=array()){$I="";foreach($f
as$x=>$X){if($L&&!in_array(idf_escape($x),$L))continue;$_a=convert_field($q[$x]);if($_a)$I.=", $_a AS ".idf_escape($x);}return$I;}function
cookie($A,$Y,$Ld=2592000){global$aa;return
header("Set-Cookie: $A=".urlencode($Y).($Ld?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ld)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($Ac=false){$Wg=ini_bool("session.use_cookies");if(!$Wg||$Ac){session_write_close();if($Wg&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($ah,$N,$V,$m=null){global$Mb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Mb))."|username|".($m!==null?"db|":"").session_name()),$_);return"$_[1]?".(sid()?SID."&":"").($ah!="server"||$N!=""?urlencode($ah)."=".urlencode($N)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($_[2]?"&$_[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Nd,$ae=null){if($ae!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Nd!==null?$Nd:$_SERVER["REQUEST_URI"]))][]=$ae;}if($Nd!==null){if($Nd=="")$Nd=".";header("Location: $Nd");exit;}}function
query_redirect($F,$Nd,$ae,$if=true,$gc=true,$nc=false,$pg=""){global$h,$o,$b;if($gc){$Wf=microtime(true);$nc=!$h->query($F);$pg=format_time($Wf);}$Tf="";if($F)$Tf=$b->messageQuery($F,$pg,$nc);if($nc){$o=error().$Tf.script("messagesPrint();");return
false;}if($if)redirect($Nd,$ae.$Tf);return
true;}function
queries($F){global$h;static$cf=array();static$Wf;if(!$Wf)$Wf=microtime(true);if($F===null)return
array(implode("\n",$cf),format_time($Wf));$cf[]=(preg_match('~;$~',$F)?"DELIMITER ;;\n$F;\nDELIMITER ":$F).";";return$h->query($F);}function
apply_queries($F,$T,$dc='table'){foreach($T
as$R){if(!queries("$F ".$dc($R)))return
false;}return
true;}function
queries_redirect($Nd,$ae,$if){list($cf,$pg)=queries(null);return
query_redirect($cf,$Nd,$ae,$if,false,!$if,$pg);}function
format_time($Wf){return
lang(1,max(0,microtime(true)-$Wf));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($Ge=""){return
substr(preg_replace("~(?<=[?&])($Ge".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($C,$zb){return" ".($C==$zb?$C+1:'<a href="'.h(remove_from_uri("page").($C?"&page=$C".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($C+1)."</a>");}function
get_file($x,$Cb=false){$sc=$_FILES[$x];if(!$sc)return
null;foreach($sc
as$x=>$X)$sc[$x]=(array)$X;$I='';foreach($sc["error"]as$x=>$o){if($o)return$o;$A=$sc["name"][$x];$wg=$sc["tmp_name"][$x];$sb=file_get_contents($Cb&&preg_match('~\.gz$~',$A)?"compress.zlib://$wg":$wg);if($Cb){$Wf=substr($sb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Wf,$jf))$sb=iconv("utf-16","utf-8",$sb);elseif($Wf=="\xEF\xBB\xBF")$sb=substr($sb,3);$I.=$sb."\n\n";}else$I.=$sb;}return$I;}function
upload_error($o){$Xd=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($o?lang(2).($Xd?" ".lang(3,$Xd):""):lang(4));}function
repeat_pattern($Me,$Jd){return
str_repeat("$Me{0,65535}",$Jd/65535)."$Me{0,".($Jd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($Q,$Jd=80,$cg=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Jd).")($)?)u",$Q,$_))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Jd).")($)?)",$Q,$_);return
h($_[1]).$cg.(isset($_[2])?"":"<i>â€¦</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Ye,$ed=array(),$Te=''){$I=false;foreach($Ye
as$x=>$X){if(!in_array($x,$ed)){if(is_array($X))hidden_fields($X,array(),$x);else{$I=true;echo'<input type="hidden" name="'.h($Te?$Te."[$x]":$x).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$oc=false){$I=table_status($R,$oc);return($I?$I:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$I=array();foreach($b->foreignKeys($R)as$Ec){foreach($Ec["source"]as$X)$I[$X][]=$Ec;}return$I;}function
enum_input($U,$Da,$p,$Y,$Xb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Ud);$I=($Xb!==null?"<label><input type='$U'$Da value='$Xb'".((is_array($Y)?in_array($Xb,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Ud[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Xa=(is_int($Y)?$Y==$r+1:(is_array($Y)?in_array($r+1,$Y):$Y===$X));$I.=" <label><input type='$U'$Da value='".($r+1)."'".($Xa?' checked':'').'>'.h($b->editVal($X,$p)).'</label>';}return$I;}function
input($p,$Y,$Kc){global$Jg,$b,$w;$A=h(bracket_escape($p["field"]));echo"<td class='function'>";if(is_array($Y)&&!$Kc){$ya=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$ya[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$ya);$Kc="json";}$of=($w=="mssql"&&$p["auto_increment"]);if($of&&!$_POST["save"])$Kc=null;$Lc=(isset($_GET["select"])||$of?array("orig"=>lang(8)):array())+$b->editFunctions($p);$Da=" name='fields[$A]'";if($p["type"]=="enum")echo
h($Lc[""])."<td>".$b->editInput($_GET["edit"],$p,$Da,$Y);else{$Sc=(in_array($Kc,$Lc)||isset($Lc[$Kc]));echo(count($Lc)>1?"<select name='function[$A]'>".optionlist($Lc,$Kc===null||$Sc?$Kc:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Lc))).'<td>';$pd=$b->editInput($_GET["edit"],$p,$Da,$Y);if($pd!="")echo$pd;elseif(preg_match('~bool~',$p["type"]))echo"<input type='hidden'$Da value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Da value='1'>";elseif($p["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Ud);foreach($Ud[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Xa=(is_int($Y)?($Y>>$r)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$A][$r]' value='".(1<<$r)."'".($Xa?' checked':'').">".h($b->editVal($X,$p)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$A'>";elseif(($mg=preg_match('~text|lob|memo~i',$p["type"]))||preg_match("~\n~",$Y)){if($mg&&$w!="sqlite")$Da.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Da.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Da>".h($Y).'</textarea>';}elseif($Kc=="json"||preg_match('~^jsonb?$~',$p["type"]))echo"<textarea$Da cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Zd=(!preg_match('~int~',$p["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$p["length"],$_)?((preg_match("~binary~",$p["type"])?2:1)*$_[1]+($_[3]?1:0)+($_[2]&&!$p["unsigned"]?1:0)):($Jg[$p["type"]]?$Jg[$p["type"]]+($p["unsigned"]?0:1):0));if($w=='sql'&&min_version(5.6)&&preg_match('~time~',$p["type"]))$Zd+=7;echo"<input".((!$Sc||$Kc==="")&&preg_match('~(?<!o)int(?!er)~',$p["type"])&&!preg_match('~\[\]~',$p["full_type"])?" type='number'":"")." value='".h($Y)."'".($Zd?" data-maxlength='$Zd'":"").(preg_match('~char|binary~',$p["type"])&&$Zd>20?" size='40'":"")."$Da>";}echo$b->editHint($_GET["edit"],$p,$Y);$wc=0;foreach($Lc
as$x=>$X){if($x===""||!$X)break;$wc++;}if($wc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $wc), oninput: function () { this.onchange(); }});");}}function
process_input($p){global$b,$n;$t=bracket_escape($p["field"]);$Kc=$_POST["function"][$t];$Y=$_POST["fields"][$t];if($p["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($p["auto_increment"]&&$Y=="")return
null;if($Kc=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?idf_escape($p["field"]):false);if($Kc=="NULL")return"NULL";if($p["type"]=="set")return
array_sum((array)$Y);if($Kc=="json"){$Kc="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads")){$sc=get_file("fields-$t");if(!is_string($sc))return
false;return$n->quoteBinary($sc);}return$b->processInput($p,$Y,$Kc);}function
fields_from_edit(){global$n;$I=array();foreach((array)$_POST["field_keys"]as$x=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$x];$_POST["fields"][$X]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$X){$A=bracket_escape($x,1);$I[$A]=array("field"=>$A,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$n->primary),);}return$I;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$Ef="<ul>\n";foreach(table_status('',true)as$R=>$S){$A=$b->tableName($S);if(isset($S["Engine"])&&$A!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$H=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$H||$H->fetch_row()){$We="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$A</a>";echo"$Ef<li>".($H?$We:"<p class='error'>$We: ".error())."\n";$Ef="";}}}echo($Ef?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($bd,$fe=false){global$b;$I=$b->dumpHeaders($bd,$fe);$De=$_POST["output"];if($De!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($bd).".$I".($De!="file"&&preg_match('~^[0-9a-z]+$~',$De)?".$De":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$x=>$X){if(preg_match('~["\n,;\t]|^0|\.\d*0$~',$X)||$X==="")$J[$x]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($Kc,$e){return($Kc?($Kc=="unixepoch"?"DATETIME($e, '$Kc')":($Kc=="count distinct"?"COUNT(DISTINCT ":strtoupper("$Kc("))."$e)"):$e);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$tc=@tempnam("","");if(!$tc)return
false;$I=dirname($tc);unlink($tc);}}return$I;}function
file_open_lock($tc){$Ic=@fopen($tc,"r+");if(!$Ic){$Ic=@fopen($tc,"w");if(!$Ic)return;chmod($tc,0660);}flock($Ic,LOCK_EX);return$Ic;}function
file_write_unlock($Ic,$_b){rewind($Ic);fwrite($Ic,$_b);ftruncate($Ic,strlen($_b));flock($Ic,LOCK_UN);fclose($Ic);}function
password_file($vb){$tc=get_temp_dir()."/adminer.key";$I=@file_get_contents($tc);if($I||!$vb)return$I;$Ic=@fopen($tc,"w");if($Ic){chmod($tc,0660);$I=rand_string();fwrite($Ic,$I);fclose($Ic);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$z,$p,$ng){global$b;if(is_array($X)){$I="";foreach($X
as$xd=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($xd):"")."<td>".select_value($W,$z,$p,$ng);return"<table cellspacing='0'>$I</table>";}if(!$z)$z=$b->selectLink($X,$p);if($z===null){if(is_mail($X))$z="mailto:$X";if(is_url($X))$z=$X;}$I=$b->editVal($X,$p);if($I!==null){if(!is_utf8($I))$I="\0";elseif($ng!=""&&is_shortable($p))$I=shorten_utf8($I,max(0,+$ng));else$I=h($I);}return$b->selectVal($I,$z,$p,$X);}function
is_mail($Ub){$Aa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Me="$Aa+(\\.$Aa+)*@($Lb?\\.)+$Lb";return
is_string($Ub)&&preg_match("(^$Me(,\\s*$Me)*\$)i",$Ub);}function
is_url($Q){$Lb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Lb?\\.)+$Lb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($p){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$p["type"]);}function
count_rows($R,$Z,$ud,$Mc){global$w;$F=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($ud&&($w=="sql"||count($Mc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Mc).")$F":"SELECT COUNT(*)".($ud?" FROM (SELECT 1$F GROUP BY ".implode(", ",$Mc).") x":$F));}function
slow_query($F){global$b,$yg,$n;$m=$b->database();$qg=$b->queryTimeout();$Nf=$n->slowQuery($F,$qg);if(!$Nf&&support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$Bd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$Bd,'&token=',$yg,'\');
}, ',1000*$qg,');
</script>
';}else$i=null;ob_flush();flush();$I=@get_key_vals(($Nf?$Nf:$F),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$ef=rand(1,1e6);return($ef^$_SESSION["token"]).":$ef";}function
verify_token(){list($yg,$ef)=explode(":",$_POST["token"]);return($ef^$_SESSION["token"])==$yg;}function
lzw_decompress($Na){$Jb=256;$Oa=8;$db=array();$qf=0;$rf=0;for($r=0;$r<strlen($Na);$r++){$qf=($qf<<8)+ord($Na[$r]);$rf+=8;if($rf>=$Oa){$rf-=$Oa;$db[]=$qf>>$rf;$qf&=(1<<$rf)-1;$Jb++;if($Jb>>$Oa)$Oa++;}}$Ib=range("\0","\xFF");$I="";foreach($db
as$r=>$cb){$Tb=$Ib[$cb];if(!isset($Tb))$Tb=$nh.$nh[0];$I.=$Tb;if($r)$Ib[]=$nh.$Tb[0];$nh=$Tb;}return$I;}function
on_help($ib,$Lf=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $ib, $Lf) }, onmouseout: helpMouseout});","");}function
edit_form($a,$q,$J,$Rg){global$b,$w,$yg,$o;$gg=$b->tableName(table_status1($a,true));page_header(($Rg?lang(10):lang(11)),$o,array("select"=>array($a,$gg)),$gg);if($J===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$q)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($q
as$A=>$p){echo"<tr><th>".$b->fieldName($p);$Db=$_GET["set"][bracket_escape($A)];if($Db===null){$Db=$p["default"];if($p["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Db,$jf))$Db=$jf[1];}$Y=($J!==null?($J[$A]!=""&&$w=="sql"&&preg_match("~enum|set~",$p["type"])?(is_array($J[$A])?array_sum($J[$A]):+$J[$A]):$J[$A]):(!$Rg&&$p["auto_increment"]?"":(isset($_GET["select"])?false:$Db)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$p);$Kc=($_POST["save"]?(string)$_POST["function"][$A]:($Rg&&preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$p["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$Kc="now";}input($p,$Y,$Kc);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($q){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Rg?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Rg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."â€¦', this); };"):"");}}echo($Rg?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$q?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$yg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³¹¤Èt4…¦ÓyèZf4°i–AT«VVéf:Ï¦,:1¦Qİ¼ñb2`Ç#ş>:7Gï—1ÑØÒs°™L—XD*bv<ÜŒ#£e@Ö:4ç§!fo·Æt:<¥Üå’¾™oâÜ\niÃÅğ',é»a_¤:¹iï…´ÁBvø|Nû4.5Nfi¢vpĞh¸°l¨ê¡ÖšÜO¦‰î= £OFQĞÄk\$¥Óiõ™ÀÂd2Tã¡pàÊ6„‹ş‡¡-ØZ€ƒ Ş6½£€ğh:¬aÌ,£ëî2#8Ğ±#’˜6nâî†ñJˆ¢h«t…Œ±Šä4O42ô½okŞ¾*r ©€@p@†!Ä¾ÏÃôş?Ğ6À‰r[ğLÁğ‹:2Bˆj§!HbóÃPä=!1V‰\"ˆ²0…¿\nSÆÆÏD7ÃìDÚ›ÃC!†!›à¦GÊŒ§ È+’=tCæ©.C¤À:+ÈÊ=ªªº²¡±å%ªcí1MR/”EÈ’4„© 2°ä± ã`Â8(áÓ¹[WäÑ=‰ySb°=Ö-Ü¹BS+É¯ÈÜı¥ø@pL4Ydã„qŠøã¦ğê¢6£3Ä¬¯¸AcÜŒèÎ¨Œk‚[&>ö•¨ZÁpkm]—u-c:Ø¸ˆNtæÎ´pÒŒŠ8è=¿#˜á[.ğÜŞ¯~ mËy‡PPá|IÖ›ùÀìQª9v[–Q•„\n–Ùrô'g‡+áTÑ2…­VÁõzä4£8÷(	¾Ey*#j¬2]­•RÒÁ‘¥)ƒÀ[N­R\$Š<>:ó­>\$;–> Ì\r»„ÎHÍÃTÈ\nw¡N åwØ£¦ì<ïËGwàöö¹\\Yó_ Rt^Œ>\r}ŒÙS\rzé4=µ\nL”%Jã‹\",Z 8¸™i÷0u©?¨ûÑô¡s3#¨Ù‰ :ó¦ûã½–ÈŞE]xİÒs^8£K^É÷*0ÑŞwŞàÈŞ~ãö:íÑiØşv2w½ÿ±û^7ãò7£cİÑu+U%{PÜ*4Ì¼éLX./!¼‰1CÅßqx!H¹ãFdù­L¨¤¨Ä Ï`6ëè5®™f€¸Ä†¨=Høl ŒV1“›\0a2×;Ô6†àöş_Ù‡Ä\0&ôZÜS d)KE'’€nµ[X©³\0ZÉŠÔF[P‘Ş˜@àß!‰ñYÂ,`É\"Ú·Â0Ee9yF>ËÔ9bº–ŒæF5:üˆ”\0}Ä´Š‡(\$Ó‡ë€37Hö£è M¾A°²6R•ú{Mqİ7G ÚC™Cêm2¢(ŒCt>[ì-tÀ/&C›]êetGôÌ¬4@r>ÇÂå<šSq•/åú”QëhmšÀĞÆôãôLÀÜ#èôKË|®™„6fKPİ\r%tÔÓV=\" SH\$} ¸)w¡,W\0F³ªu@Øb¦9‚\rr°2Ã#¬DŒ”Xƒ³ÚyOIù>»…n†Ç¢%ãù'‹İ_Á€t\rÏ„zÄ\\1˜hl¼]Q5Mp6k†ĞÄqhÃ\$£H~Í|Òİ!*4ŒñòÛ`Sëı²S tíPP\\g±è7‡\n-Š:è¢ªp´•”ˆl‹B¦î”7Ó¨cƒ(wO0\\:•Ğw”Áp4ˆ“ò{TÚújO¤6HÃŠ¶rÕ¥q\n¦É%%¶y']\$‚”a‘ZÓ.fcÕq*-êFWºúk„zƒ°µj‘°lgáŒ:‡\$\"ŞN¼\r#ÉdâÃ‚ÂÿĞscá¬Ì „ƒ\"jª\rÀ¶–¦ˆÕ’¼Ph‹1/‚œDA) ²İ[ÀknÁp76ÁY´‰R{áM¤Pû°ò@\n-¸a·6şß[»zJH,–dl B£ho³ìò¬+‡#Dr^µ^µÙeš¼E½½– ÄœaP‰ôõJG£zàñtñ 2ÇXÙ¢´Á¿V¶×ßàŞÈ³‰ÑB_%K=E©¸bå¼¾ßÂ§kU(.!Ü®8¸œüÉI.@KÍxnş¬ü:ÃPó32«”míH		C*ì:vâTÅ\nR¹ƒ•µ‹0uÂíƒæîÒ§]Î¯˜Š”P/µJQd¥{L–Ş³:YÁ2b¼œT ñÊ3Ó4†—äcê¥V=¿†L4ÎĞrÄ!ßBğY³6Í­MeLŠªÜçœöùiÀoĞ9< G”¤Æ•Ğ™Mhm^¯UÛNÀŒ·òTr5HiM”/¬nƒí³T [-<__î3/Xr(<‡¯Š†®Éô“ÌuÒ–GNX20å\r\$^‡:'9è¶O…í;×k¼†µf –N'a¶”Ç­bÅ,ËV¤ô…«1µïHI!%6@úÏ\$ÒEGÚœ¬1(mUªå…rÕ½ïßå`¡ĞiN+Ãœñ)šœä0lØÒf0Ã½[UâøVÊè-:I^ ˜\$Øs«b\re‡‘ugÉhª~9Ûßˆb˜µôÂÈfä+0¬Ô hXrİ¬©!\$—e,±w+„÷ŒëŒ3†Ì_âA…kšù\nkÃrõÊ›cuWdYÿ\\×={.óÄ˜¢g»‰p8œt\rRZ¿vJ:²>ş£Y|+Å@À‡ƒÛCt\r€jt½6²ğ%Â?àôÇñ’>ù/¥ÍÇğÎ9F`×•äòv~K¤áöÑRĞW‹ğz‘êlmªwLÇ9Y•*q¬xÄzñèSe®İ›³è÷£~šDàÍá–÷x˜¾ëÉŸi7•2ÄøÑOİ»’û_{ñú53âút˜›_ŸõzÔ3ùd)‹C¯Â\$?KÓªP%ÏÏT&ş˜&\0P×NA^­~¢ƒ pÆ öÏœ“Ôõ\r\$ŞïĞÖìb*+D6ê¶¦ÏˆŞíJ\$(ÈolŞÍh&”ìKBS>¸‹ö;z¶¦xÅoz>íœÚoÄZğ\nÊ‹[Ïvõ‚ËÈœµ°2õOxÙVø0fû€ú¯Ş2BlÉbkĞ6ZkµhXcdê0*ÂKTâ¯H=­•Ï€‘p0ŠlVéõèâ\r¼Œ¥nm¦ï)( ú");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ3)°Ë7œ…†81ĞÊx:\nOg#)Ğêr7\n\"†è´`ø|2ÌgSi–H)N¦S‘ä§\r‡\"0¹Ä@ä)Ÿ`(\$s6O!ÓèœV/=Œ' T4æ=„˜iS˜6IO G#ÒX·VCÆs¡ Z1.Ğhp8,³[¦Häµ~Cz§Éå2¹l¾c3šÍés£‘ÙI†bâ4\néF8Tà†I˜İ©U*fz¹är0EÆÀØy¸ñfY.:æƒIŒÊ(Øc·áÎ‹!_l™í^·^(¶šN{S–“)rËqÁY“–lÙ¦3Š3Ú\n˜+G¥Óêyºí†Ëi¶ÂîxV3w³uhã^rØÀº´aÛ”ú¹cØè\r“¨ë(.ÂˆºChÒ<\r)èÑ£¡`æ7£íò43'm5Œ£È\nPÜ:2£P»ª‹q òÿÅC“}Ä«ˆúÊÁê38‹BØ0hR‰Èr(œ0¥¡b\\0ŒHr44ŒÁB!¡pÇ\$rZZË2Ü‰.Éƒ(\\5Ã|\nC(Î\"€P…ğø.ĞNÌRTÊÎ“Àæ>HN…8HPá\\¬7Jp~„Üû2%¡ĞOC¨1ã.ƒ§C8Î‡HÈò*ˆj°…á÷S(¹/¡ì¬6KUœÊ‡¡<2‰pOI„ôÕ`Ôäâ³ˆdOH Ş5-üÆ4ŒãpX25-Ò¢òÛˆ°z7£¸\"(°P \\32:]UÚèíâß…!]¸<·AÛÛ¤’ĞßiÚ°‹l\rÔ\0v²Î#J8«ÏwmíÉ¤¨<ŠÉ æü%m;p#ã`XDŒø÷iZøN0Œ•È9ø¨å Áè`…wJD¿¾2Ò9tŒ¢*øÎyìËNiIh\\9ÆÕèĞ:ƒ€æáxï­µyl*šÈˆÎæY Ü‡øê8’W³â?µŞ›3ÙğÊ!\"6å›n[¬Ê\r­*\$¶Æ§¾nzxÆ9\rì|*3×£pŞï»¶:(p\\;ÔËmz¢ü§9óĞÑÂŒü8N…Áj2½«Î\rÉHîH&Œ²(Ãz„Á7iÛk£ ‹Š¤‚c¤‹eòı§tœÌÌ2:SHóÈ Ã/)–xŞ@éåt‰ri9¥½õëœ8ÏÀËïyÒ·½°VÄ+^WÚ¦­¬kZæY—l·Ê£Œ4ÖÈÆ‹ª¶À¬‚ğ\\EÈ{î7\0¹p†€•D€„i”-TæşÚû0l°%=Á ĞËƒ9(„5ğ\n\n€n,4‡\0èa}Üƒ.°öRsï‚ª\02B\\Ûb1ŸS±\0003,ÔXPHJspåd“Kƒ CA!°2*WŸÔñÚ2\$ä+Âf^\n„1Œ´òzEƒ Iv¤\\äœ2É .*A°™”E(d±á°ÃbêÂÜ„Æ9‡‚â€ÁDh&­ª?ÄH°sQ˜2’x~nÃJ‹T2ù&ãàeRœ½™GÒQTwêİ‘»õPˆâã\\ )6¦ôâœÂòsh\\3¨\0R	À'\r+*;RğHà.“!Ñ[Í'~­%t< çpÜK#Â‘æ!ñlßÌğLeŒ³œÙ,ÄÀ®&á\$	Á½`”–CXš‰Ó†0Ö­å¼û³Ä:Méh	çÚœGäÑ!&3 D<!è23„Ã?h¤J©e Úğhá\r¡m•˜ğNi¸£´’†ÊNØHl7¡®v‚êWIå.´Á-Ó5Ö§ey\rEJ\ni*¼\$@ÚRU0,\$U¿E†¦ÔÔÂªu)@(tÎSJkáp!€~­‚àd`Ì>¯•\nÃ;#\rp9†jÉ¹Ü]&Nc(r€ˆ•TQUª½S·Ú\08n`«—y•b¤ÅLÜO5‚î,¤ò‘>‚†xââ±fä´’âØ+–\"ÑI€{kMÈ[\r%Æ[	¤eôaÔ1! èÿí³Ô®©F@«b)RŸ£72ˆî0¡\nW¨™±L²ÜœÒ®tdÕ+íÜ0wglø0n@òêÉ¢ÕiíM«ƒ\nA§M5nì\$E³×±NÛál©İŸ×ì%ª1 AÜûºú÷İkñrîiFB÷Ïùol,muNx-Í_ Ö¤C( fél\r1p[9x(i´BÒ–²ÛzQlüº8CÔ	´©XU Tb£İIİ`•p+V\0î‹Ñ;‹CbÎÀXñ+Ï’sïü]H÷Ò[ák‹x¬G*ô†]·awnú!Å6‚òâÛĞmSí¾“IŞÍKË~/Ó¥7ŞùeeNÉòªS«/;dåA†>}l~Ïê ¨%^´fçØ¢pÚœDEîÃa·‚t\nx=ÃkĞ„*dºêğT—ºüûj2ŸÉjœ\n‘ É ,˜e=‘†M84ôûÔa•j@îTÃsÔänf©İ\nî6ª\rdœ¼0ŞíôYŠ'%Ô“íŞ~	Ò¨†<ÖË–Aî‹–H¿G‚8ñ¿Îƒ\$z«ğ{¶»²u2*†àa–À>»(wŒK.bP‚{…ƒoı”Â´«zµ#ë2ö8=É8>ª¤³A,°e°À…+ìCè§xõ*ÃáÒ-b=m‡™Ÿ,‹a’Ãlzkï\$Wõ,mJiæÊ§á÷+‹èı0°[¯ÿ.RÊsKùÇäXçİZLËç2`Ì(ïCàvZ¡ÜİÀ¶è\$×¹,åD?H±ÖNxXôó)’îM¨‰\$ó,Í*\nÑ£\$<qÿÅŸh!¿¹S“âƒÀŸxsA!˜:´K¥Á}Á²“ù¬£œRşšA2k·Xp\n<÷ş¦ıëlì§Ù3¯ø¦È•VV¬}£g&Yİ!†+ó;<¸YÇóŸYE3r³Ùñ›Cío5¦Åù¢Õ³Ïkkş…ø°ÖÛ£«Ït÷’Uø…­)û[ıßÁî}ïØu´«lç¢:DŸø+Ï _oãäh140ÖáÊ0ø¯bäK˜ã¬’ öşé»lGª„#ªš©ê†¦©ì|Udæ¶IK«êÂ7à^ìà¸@º®O\0HÅğHiŠ6\r‡Û©Ü\\cg\0öãë2BÄ*eà\n€š	…zr!nWz& {H–ğ'\$X  w@Ò8ëDGr*ëÄİHå'p#Ä®€¦Ô\ndü€÷,ô¥—,ü;g~¯\0Ğ#€Ì²EÂ\rÖI`œî'ƒğ%EÒ. ]`ÊĞ›…î%&Ğîm°ı\râŞ%4S„vğ#\n fH\$%ë-Â#­ÆÑqBâíæ ÀÂQ-ôc2Š§‚&ÂÀÌ]à™ èqh\rñl]à®s ĞÑhä7±n#±‚‚Ú-àjE¯Frç¤l&dÀØÙåzìF6¸ˆÁ\" “|¿§¢s@ß±®åz)0rpÚ\0‚X\0¤Ùè|DL<!°ôo„*‡D¶{.B<Eª‹‹0nB(ï |\r\nì^©à h³!‚Öêr\$§’(^ª~èŞÂ/pq²ÌB¨ÅOšˆğú,\\µ¨#RRÎ%ëäÍdĞHjÄ`Â ô®Ì­ Vå bS’d§iE‚øïoh´r<i/k\$-Ÿ\$o”¼+ÆÅ‹ÎúlÒŞO³&evÆ’¼iÒjMPA'u'Î’( M(h/+«òWD¾So·.n·.ğn¸ìê(œ(\"­À§hö&p†¨/Ë/1DÌŠçjå¨¸EèŞ&â¦€,'l\$/.,Äd¨…‚W€bbO3óB³sH :J`!“.€ª‚‡Àû¥ ,FÀÑ7(‡ÈÔ¿³û1Šlås ÖÒ‘²—Å¢q¢X\rÀš®ƒ~Ré°±`®Òó®Y*ä:R¨ùrJ´·%LÏ+n¸\"ˆø\r¦ÎÍ‡H!qb¾2âLi±%ÓŞÎ¨Wj#9ÓÔObE.I:…6Á7\0Ë6+¤%°.È…Ş³a7E8VSå?(DG¨Ó³Bë%;ò¬ùÔ/<’´ú¥À\r ì´>ûMÀ°@¶¾€H DsĞ°Z[tH£Enx(ğŒ©R xñû@¯şGkjW”>ÌÂÚ#T/8®c8éQ0Ëè_ÔIIGII’!¥ğŠYEdËE´^tdéthÂ`DV!Cæ8¥\r­´Ÿb“3©!3â@Ù33N}âZBó3	Ï3ä30ÚÜM(ê>‚Ê}ä\\Ñtê‚f fŒËâI\r®€ó337 XÔ\"tdÎ,\nbtNO`Pâ;­Ü•Ò­ÀÔ¯\$\n‚ßäZÑ­5U5WUµ^hoıàætÙPM/5K4Ej³KQ&53GX“Xx)Ò<5D…\rûVô\nßr¢5bÜ€\\J\">§è1S\r[-¦ÊDuÀ\rÒâ§Ã)00óYõÈË¢·k{\nµÄ#µŞ\r³^·‹|èuÜ»Uå_nïU4ÉUŠ~YtÓ\rIšÃ@ä³™R ó3:ÒuePMSè0TµwW¯XÈòòD¨ò¤KOUÜà•‡;Uõ\n OYéYÍQ,M[\0÷_ªDšÍÈW ¾J*ì\rg(]à¨\r\"ZC‰©6uê+µYóˆY6Ã´0ªqõ(Ùó8}ó3AX3T h9j¶jàfõMtåPJbqMP5>ğÈø¶©Y‡k%&\\‚1d¢ØE4À µYnÊí\$<¥U]Ó‰1‰mbÖ¶^Òõš ê\"NVéßp¶ëpõ±eMÚŞ×WéÜ¢î\\ä)\n Ë\nf7\n×2´õr8‹—=Ek7tVš‡µ7P¦¶LÉía6òòv@'‚6iàïj&>±â;­ã`Òÿa	\0pÚ¨(µJÑë)«\\¿ªnûòÄ¬m\0¼¨2€ôeqJö­PôtŒë±fjüÂ\"[\0¨·†¢X,<\\Œî¶×â÷æ·+md†å~âàš…Ñs%o°´mn×),×„æÔ‡²\r4¶Â8\r±Î¸×mE‚H]‚¦˜üÖHW­M0Dïß€—å~Ë˜K˜îE}ø¸´à|fØ^“Ü×\r>Ô-z]2s‚xD˜d[s‡tS¢¶\0Qf-K`­¢‚tàØ„wT¯9€æZ€à	ø\nB£9 Nb–ã<ÚBşI5o×oJñpÀÏJNdåË\rhŞÃ2\"àxæHCàİ–:øı9Yn16Æôzr+z±ùş\\’÷•œôm Ş±T öò ÷@Y2lQ<2O+¥%“Í.Óƒhù0AŞñ¸ŠÃZ‹2R¦À1£Š/¯hH\r¨X…ÈaNB&§ ÄM@Ö[xŒ‡Ê®¥ê–â8&LÚVÍœvà±*šj¤ÛšGHåÈ\\Ù®	™²¶&sÛ\0Qš \\\"èb °	àÄ\rBs›Éw‚	ÙáBN`š7§Co(ÙÃà¨\nÃ¨“¨1š9Ì*E˜ ñS…ÓU0Uº tš'|”m™°Ş?h[¢\$.#É5	 å	p„àyBà@Rô]£…ê@|„§{™ÀÊP\0xô/¦ w¢%¤EsBd¿§šCUš~O×·àPà@Xâ]Ô…¨Z3¨¥1¦¥{©eLY‰¡ŒÚ¢\\’(*R` 	à¦\n…ŠàºÌQCFÈ*¹¹àéœ¬Úp†X|`N¨‚¾\$€[†‰’@ÍU¢àğ¦¶àZ¥`Zd\"\\\"…‚¢£)«‡Iˆ:ètšìoDæ\0[²¨à±‚-©“ gí³‰™®*`hu%£,€”¬ãIµ7Ä«²Hóµm¤6Ş}®ºNÖÍ³\$»MµUYf&1ùÀ›e]pz¥§ÚI¤Åm¶G/£ ºw Ü!•\\#5¥4I¥d¹EÂhq€å¦÷Ñ¬kçx|Úk¥qDšb…z?§º‰>úƒ¾:†“[èLÒÆ¬Z°Xš®:¹„·ÚÇjßw5	¶Y¾0 ©Â“­¯\$\0C¢†dSg¸ë‚ {@”\n`	ÀÃüC ¢·»Mºµâ»²# t}xÎN„÷º‡{ºÛ°)êûCƒÊFKZŞj™Â\0PFY”BäpFk–›0<Ú>ÊD<JE™šg\rõ.“2–ü8éU@*Î5fkªÌJDìÈÉ4•TDU76É/´è¯@·‚K+„ÃöJ®ºÃÂí@Ó=ŒÜWIOD³85MšNº\$Rô\0ø5¨\ràù_ğªœìEœñÏI«Ï³Nçl£Òåy\\ô‘ˆÇqU€ĞQû ª\n@’¨€ÛºÃpš¬¨PÛ±«7Ô½N\rıR{*qmİ\$\0R”×Ô“ŠÅåqĞÃˆ+U@ŞB¤çOf*†CË¬ºMCä`_ èüò½ËµNêæTâ5Ù¦C×»© ¸à\\WÃe&_XŒ_Øhå—ÂÆBœ3ÀŒÛ%ÜFW£û|™GŞ›'Å[¯Å‚À°ÙÕV Ğ#^\rç¦GR€¾˜€P±İFg¢ûî¯ÀYi û¥Çz\nâ¨Ş+ß^/“¨€‚¼¥½\\•6èßb¼dmh×â@qíÕAhÖ),J­×W–Çcm÷em]ÓeÏkZb0ßåşYñ]ymŠè‡fØe¹B;¹ÓêOÉÀwŸapDWûŒÉÜÓ{›\0˜À-2/bN¬sÖ½Ş¾Ra“Ï®h&qt\n\"ÕiöRmühzÏeø†àÜFS7µĞPPòä–¤âÜ:B§ˆâÕsm¶­Y düŞò7}3?*‚túòéÏlTÚ}˜~€„€ä=cı¬ÖŞÇ	Ú3…;T²LŞ5*	ñ~#µA•¾ƒ‘sx-7÷f5`Ø#\"NÓb÷¯G˜Ÿ‹õ@Üeü[ïø¤Ìs‘˜€¸-§˜M6§£qqš h€e5…\0Ò¢À±ú*àbøISÜÉÜFÎ®9}ıpÓ-øı`{ı±É–kP˜0T<„©Z9ä0<Õš\r­€;!Ãˆgº\r\nKÔ\n•‡\0Á°*½\nb7(À_¸@,îe2\rÀ]–K…+\0Éÿp C\\Ñ¢,0¬^îMĞ§šº©“@Š;X\r•ğ?\$\r‡j’+ö/´¬BöæP ½‰ù¨J{\"aÍ6˜ä‰œ¹|å£\n\0»à\\5“Ğ	156ÿ† .İ[ÂUØ¯\0dè²8Yç:!Ñ²‘=ºÀX.²uCªŠŒö!Sº¸‡o…pÓBİüÛ7¸­Å¯¡Rh­\\h‹E=úy:< :u³ó2µ80“si¦ŸTsBÛ@\$ Íé@Çu	ÈQº¦.ô‚T0M\\/ê€d+Æƒ\n‘¡=Ô°dŒÅëA¢¸¢)\r@@Âh3€–Ù8.eZa|.â7YkĞcÀ˜ñ–'D#‡¨Yò@Xq–=M¡ï44šB AM¤¯dU\"‹Hw4î(>‚¬8¨²ÃC¸?e_`ĞÅX:ÄA9Ã¸™ôp«GĞä‡Gy6½ÃF“Xr‰¡l÷1¡½Ø»B¢Ã…9Rz©õhB„{€™\0ëå^‚Ã-â0©%Dœ5F\"\"àÚÜÊÂ™úiÄ`ËÙnAf¨ \"tDZ\"_àV\$Ÿª!/…D€áš†ğ¿µ‹´ˆÙ¦¡Ì€F,25Éj›Tëá—y\0…N¼x\rçYl¦#‘ÆEq\nÍÈB2œ\nìà6·…Ä4Ó×”!/Â\nóƒ‰Q¸½*®;)bR¸Z0\0ÄCDoŒË48À•´µ‡Ğe‘\nã¦S%\\úPIk‡(0ÁŒu/™‹G²Æ¹ŠŒ¼\\Ë} 4Fp‘Gû_÷G?)gÈotº[vÖ\0°¸?bÀ;ªË`(•ÛŒà¶NS)\nãx=èĞ+@êÜ7ƒjú0—,ğ1Ã…z™“­>0ˆ‰GcğãL…VXôƒ±ÛğÊ%À…Á„Q+øéoÆFõÈéÜ¶Ğ>Q-ãc‘ÚÇl‰¡³¤wàÌz5G‘ê‚@(h‘cÓHõÇr?ˆšNbş@É¨öÇø°îlx3‹U`„rwª©ÔUÃÔôtØ8Ô=Àl#òõlÿä¨‰8¥E\"Œƒ˜™O6\n˜Â1e£`\\hKf—V/Ğ·PaYKçOÌı éàx‘	‰Oj„ór7¥F;´êB»‘ê£íÌ’‡¼>æĞ¦²V\rÄ–Ä|©'Jµz«¼š”#’PBä’Y5\0NC¤^\n~LrR’Ô[ÌŸRÃ¬ñgÀeZ\0x›^»i<Qã/)Ó%@Ê’™fB²HfÊ{%Pà\"\"½ø@ªş)ò’‘“DE(iM2‚S’*ƒyòSÁ\"âñÊeÌ’1Œ«×˜\n4`Ê©>¦Q*¦Üy°n”’¥TäuÔâä”Ñ~%+W²XK‹Œ£Q¡[Ê”àlPYy#DÙ¬D<«FLú³Õ@Á6']Æ‹‡û\rFÄ`±!•%\n0cĞôÀË©%c8WrpGƒ.TœDo¾UL2Ø*é|\$¬:èœr˜½@æñè&Ò4‹HŠ> ‘ %0*ŒZc(@Ü]óÌQ:*¬“â(&\"x'JO³1¹º`>7	#Ù\"O4PXü±”|B4»é‰[Ê˜éÙ˜\$nïˆ1`ôêGSAõÖËAH» \"†)ğà©ãS¨ûf”É¦Áº-\"ËWú+É–º\0s-[”foÙ§ÍD«ğxóæ¸õ¾=Cš.õ“9³­ÎfïÀcÁ\0Â‹7¡?Ã“95´Ö¦ZÇ0­îfì­¨àøëH?R'q>oÚÊ@aDŸùG[;G´D¹BBdÄ¡—q –¥2¤|1¹ìq™²äÀÎå²w<Ü#ª§EY½^š§ ­Q\\ë[XñåèÅ>?vï[ ‡æŠIÉÍÑ „™œÌg\0Ç)´…®g…uŒĞg42jÃº'óTä„‹Ívy,u’ÛD†=pH\\ƒ”^bäìqØ„ÄitÃÅğX…À£FPÉ@Pú¥TŠ¾i2#°g€—Dá®™ñ%9™@‚");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Ic=file_open_lock(get_temp_dir()."/adminer.version");if($Ic)file_write_unlock($Ic,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$n,$Mb,$Rb,$Zb,$o,$Lc,$Pc,$aa,$od,$w,$ba,$Fd,$se,$Oe,$Zf,$Tc,$yg,$Bg,$Jg,$Qg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$D=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$D[]=true;call_user_func_array('session_set_cookie_params',$D);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$vc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$Fd=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bg'=>'Ğ‘ÑŠĞ»Ğ³Ğ°Ñ€ÑĞºĞ¸','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','bs'=>'Bosanski','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','el'=>'Î•Î»Î»Î·Î½Î¹ÎºÎ¬','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fi'=>'Suomi','fr'=>'FranÃ§ais','gl'=>'Galego','he'=>'×¢×‘×¨×™×ª','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èª','ka'=>'áƒ¥áƒáƒ áƒ—áƒ£áƒšáƒ˜','ko'=>'í•œêµ­ì–´','lt'=>'LietuviÅ³','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ğ ÑƒÑÑĞºĞ¸Ğ¹','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ğ¡Ñ€Ğ¿ÑĞºĞ¸','sv'=>'Svenska','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ğ£ĞºÑ€Ğ°Ñ—Ğ½ÑÑŒĞºĞ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ba;return$ba;}function
lang($t,$oe=null){if(is_string($t)){$Re=array_search($t,get_translations("en"));if($Re!==false)$t=$Re;}global$ba,$Bg;$Ag=($Bg[$t]?$Bg[$t]:$t);if(is_array($Ag)){$Re=($oe==1?0:($ba=='cs'||$ba=='sk'?($oe&&$oe<5?1:2):($ba=='fr'?(!$oe?0:1):($ba=='pl'?($oe%10>1&&$oe%10<5&&$oe/10%10!=1?1:2):($ba=='sl'?($oe%100==1?0:($oe%100==2?1:($oe%100==3||$oe%100==4?2:3))):($ba=='lt'?($oe%10==1&&$oe%100!=11?0:($oe%10>1&&$oe/10%10!=1?1:2)):($ba=='bs'||$ba=='ru'||$ba=='sr'||$ba=='uk'?($oe%10==1&&$oe%100!=11?0:($oe%10>1&&$oe%10<5&&$oe/10%10!=1?1:2)):1)))))));$Ag=$Ag[$Re];}$ya=func_get_args();array_shift($ya);$Gc=str_replace("%d","%s",$Ag);if($Gc!=$Ag)$ya[0]=format_number($oe);return
vsprintf($Gc,$ya);}function
switch_lang(){global$ba,$Fd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$Fd,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($Fd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($Fd[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$qa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Ud,PREG_SET_ORDER);foreach($Ud
as$_)$qa[$_[1]]=(isset($_[3])?$_[3]:1);arsort($qa);foreach($qa
as$x=>$bf){if(isset($Fd[$x])){$ba=$x;break;}$x=preg_replace('~-.*~','',$x);if(!isset($qa[$x])&&isset($Fd[$x])){$ba=$x;break;}}}$Bg=$_SESSION["translations"];if($_SESSION["translations_version"]!=294525227){$Bg=array();$_SESSION["translations_version"]=294525227;}function
get_translations($Ed){switch($Ed){case"en":$g="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Şa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Şr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ĞY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚0Ê\nÒãdFé	ŒŞn:ZÎ°)­ãQ¦ÕÈmwÛø€İO¼êmfpQËÎ‚‰†qœêaÊÄ¯±#q®–w7SX3” ‰œŠ˜o¢\n>Z—M„ziÃÄs;ÙÌ’‚„_Å:øõğ#|@è46ƒÃ:¾\r-z| (j*œ¨Œ0¦:-hæé/Ì¸ò8)+r^1/Ğ›¾Î·,ºZÓˆKXÂ9,¢pÊ:>#Öã(Ş6ÅqBô7ÃØ4µ¨È2¶LtÃ‰ëDŸ§Ë:œŠ\"È€IR{ p*ø”	‰ì.ËÂÏ\nH¤h\n|Z29CzÔ7L‹ğÚæH\nj=5­Ã(î/\nŒCË:„³äı0Ê–ˆZtXjÔ±8Æ4N`ò;ÀPö9Ikl Œm‹_H\"õ¸Íé0#0ckP:ŒCPËS#¢ãIÆ„&)ÈE§U\nLÅ<A9  óˆ]@\$#-‚“'Ì[Uc»+ë`”:àP\$Bhš\nb˜-7(ò.ÕhZ2MåJ¦³kˆ6B;¿ƒ0Í·í\"üÆSHÎ‚¯\" ŞMãpò¯ƒ¨Æ1©#˜Ì:æİ…Œ¼P‘ö²µ§éÚÙ3¶^\r„RØb‡â8+‹¯˜Ì!…ºôğì×ùÜ:³¬0™5`ˆ>ˆx–(”\nŒ[ªŸÒSòá„É/ØË]Gã@\$cB3¡Ñ[˜t…ã¾Ô\$£º³Œá|€¨è¥D7á}º³xŒ!õı¢ÊĞXà4ÇØÊ;H¼y†9%	R£\n½Ú,ÏÃq	¨]­ëºşÃ±›.Ï´í{jÖ¿Û†å¼Jp#_¼¨ğ’±\"õÈé¿ğ2@A?ãzBÌMãZxöÍÓ…¯Hp~„õ=Ûò¦Ã’[DùZJ0Ô<(î“b¾Œ09i£”hŒ#3;­ez&—ÍY¶ÿ²ğ0Æ\0ÇN2ØÃ0=lª¨Ëy¿Jùù“Ö_É¨ \n ( ´ÿËà \0’\"H‘É&4D !šó~öNi—#FD4™2.eIA©à¥ÂbLÜÓÕS\$ğŸ0æ{˜ƒ7~\$ğ7xd1ò\n`4©7vZ[Æ3Ä1†òhÑº9Gd„!…0¤¡Â\rÎm^ÈvI90f¥­È’²ZKÍòB§ö˜HIN8d'Å=ˆW5±ã-oİÆ\$ãH ÅÜu“ù  !ÄÙ•H«Z‹Stíhÿ¬€ÆG‰'Ç¸Ê´†±‹L\n	áL*CÀæÂ‘5aÑ.S Ö£Ù>ñ}'µrJsƒ“}yEÜ€½“JA‰§dâ@H¥\0gL(„ÂH‚Œ™#ÁRœÃtXix‘èÍd‡&\0JI&,Ÿ-CÈqÑ\\1œ%…bNPÊ²âñS‰'ÎH”²\rÙ~3¯Q_§™Æ±g3åÊÎ}¬¹û8–‰¸ +ê‚C†„`+’ñ5¥²Hâ‘³„NíßÌÂËÂ	'ºG=@B F á%šâîsIB¿0iŞ{Nb[\nœÒÌ0F„­9ŞÇæÄz„M#™‚ú»âùqI¤¦ÑğÃ›5‡JÙ.‹á`.åä*3jœ‹]x5…É AFbƒ?˜á´³”cÀšITL§F«•Ã@o'„/D÷NÃ½:¦jît*j‚7ép<B¢õPN\n‘Qx’6AR‹›Õ4UVWù_˜YOVlò„ğ—A‰\rŸ-ZÑ;HHm0.";break;case"ar":$g="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„0Se\\¶\r…ŒbÙ@¶0´,\nQ,l)ÅÀ¦Âµ°¬†Aòéj_1CĞM…«e€¢S™\ng@ŸOgë¨ô’XÙDMë)˜°0Œ†cA¨Øn8Çe*y#au4¡ ´Ir*;rSÁUµdJ	}‰ÎÑ*zªU@¦ŠX;ai1l(nóÕòıÃ[Óy™dŞu'c(€ÜoF“±¤Øe3™Nb¦ êp2NšS¡ Ó³:LZúz¶PØ\\bæ¼uÄ.•[¶Q`u	!Š­Jyµˆ&2¶(gTÍÔSÑšMÆxì5g5¸K®K¦Â¦àØ÷á—0Ê€(ª7\rm8î7(ä9\rã’f\"7NÂ9´£ ŞÙ4Ãxè¶ã„xæ;Á#\"¸¿…Š´¥2É°W\"J\nî¦¬Bê'hkÀÅ«b¦Diâ\\@ªêÊp¬•êyf ­’9ÊÚV¨?‘TXW¡‰¡FÃÇ{â¹3)\"ªW9Ï|Á¨eRhU±¬Òªû1ÆÁPˆ>¨ê„\"o|Ù7£éÚLQi\\¬ H\"¨¤ª#¨›0[~á5ê[gÀ£uÒ©!JŒ£Ãv7cHßN&fÉè4«(!©´LX¾ò<_T?t§*¢	ãë1DªİX‡=éÃ®é®3õ%×ŠÕ~‚\"sûéÇ1\nš?hAj«&î²\$‹ˆ!P #ó0òÙM8¡xHÜÁŠim¦ÅZÔ<dR®ˆÏI£\r/hùPš&ÒÓ¨RÚ±3ÂûÅ—Ë!]Ø6ÚN•óëŸ\"7½&®Èb-âÊÉm'=±û …W\$\rDú©øL÷®7²rldÕŠâ¥Û+nP Ñ2Ù°Qbâ@	¢ht)Š`PÔ5ãhÚ‹c”0‹¶‚Ú[O³Â=¡ Pä:\r€S<Ğ#“J7ŒÃ0Øõ±êå-’¥Ÿb×Ô©\$ò*\rí@Ú0ÃÈ@:Óƒ¨Æ1¶C˜Ì:\0Ø7ŒïPæ6ƒ–ô0ŒãÔra-²6½C«vaK•°Õë`(;‚ùm1«êØV¦b£E\0006c5 :Ó¯X@ ŒœÀİqƒ?NŒ0@-¼3¡Ğ:ƒ€æáxïé…Ãs²APHÎŒ£p_	RC¥=ïA÷Àİ=C8xŒ!öJÌ Lúœ.S±°F*ä2”ãx‚•É\rm>¬•†LÂj7aÈÔ¡ä@–Ê™¥¯\"'†ñCCÇy/-æ¼÷¢ôÃ»Õzîíì‡'¶÷^âš{ªuO‚ğDSğI\r¡À×†×º[íQÀ‚ĞŞ¶M¬<!¬Ò†”8›»»\rÁĞ§Ÿ²|uÄ•%'íc˜Ñp‹Ÿ™Ae%Ö†ƒJCâSà€;šç\n(p@ÎÈ9Ce²C4C\rıÀ¸7\náÜJŒ¦ôÚEâ6a° pV†Âš=FÈä¿âªIXÊ'Zì°ş#s Pp\rÁ\\Ò&~Ì\r*\nG¤\$DÙ¨CSîî0¾“hj\rQ¬5ÆÀ2­”4ÕÍ™¿B¨^C¸pï-bêˆ¦Íâ‡4:à¢7±75CšD1ß0ÑHgy`‚4GÓJÃ´l¤Ğ“ÑdS\nAR(B´Ö¬“¥µ!£NTêI!'ğ¶\"iF‰U¹stÂ%P“â‡\0Œ3ª+bÉùH#V	(e£Ÿ#–¨ÖX.!j­#5‚Iâ›ùQÄÌ\$‘ ògÁ\0d\r+dÓ¡t ¢¾6mx8‡Sd…Ã2\r®Ş¼)–‡Bö]!Ób¨HlNP5>\0Â¡\"-JôsF•+[eíQÄòˆA	±8Uè’¤’éBÇßùÜ«*½m‹\"ªÚU½Y:òŠ’…àŠëymO“à(€ giDà@†İÃ½`@ñCÙL(„À@¥˜ 5¯#@¡aéƒ”†hmÊSŠtFĞ1¤AL©W“a`OÖ\nÑPÂÅÏªóôu›u©1«NÖZD`DØ7O¶ªÚDÔ[\0­“T¶“Î\0³Bw±3aĞ9ÀWPCHc\rjY<Pí!é´¯‡ü4†fõ‰˜F²!µÚ!yºäÂ¨TÀ´)}J]­'JÅƒ[–åˆ!ïõè­ÓHÔ)l`µç\0”\0°ÀPM»—y•5JİÖ‚Hdhé{%‡F«It…ÊÜ­±nÕJŠü´¹…¢¨‡\$D\\*:æÉ\0PL\rö6 ”\"ƒq3¾°º•Í’º£‡Ùøòû?×¦N7à¹ß¢HyÃ)¯Œ2Õ&+]…V#Éè¦}ÑÆÒºÑˆ«uİ`˜€²É¦ÍQ+äåwkñ±%Â\0";break;case"bg":$g="ĞP´\r›EÑ@4°!Awh Z(&‚Ô~\n‹†faÌĞNÅ`Ñ‚şDˆ…4ĞÕü\"Ğ]4\r;Ae2”­a°µ€¢„œ.aÂèúrpº’@×“ˆ|.W.X4òå«FPµ”Ìâ“Ø\$ªhRàsÉÜÊ}@¨Ğ—pÙĞ”æB¢4”sE²Î¢7fŠ&EŠ, Ói•X\nFC1 Ôl7còØMEo)_G×ÒèÎ_<‡GÓ­}†Íœ,kë†ŠqPX”}F³+9¤¬7i†£Zè´šiíQ¡³_a·–—ZŠË*¨n^¹ÉÕS¦Ü9¾ÿ£YŸVÚ¨~³]ĞX\\Ró‰6±õÔ}±jâ}	¬lê4v±ø=ˆè†3	´\0ù@D|ÜÂ¤‰³[€’ª’^]#ğs.Õ3d\0*ÃXÜ7ãp@2CŞ9(‚ Â:#Â9Œ¡\0È7Œ£˜Aˆèê8\\z8Fc˜ïŒ‹ŠŒä—m XúÂÉ4™;¦rÔ'HS†˜¹2Ë6A>éÂ¦”6Ëÿ5	êÜ¸®kJ¾®&êªj½\"Kºüª°Ùß9‰{.äÎ-Ê^ä:‰*U?Š+*>SÁ3z>J&SKêŸ&©›ŞhR‰»’Ö&³:ŠãÉ’>I¬J–ªLãHÑ,«Êã¥/µ\r/¸ÍSYF.°Rc[?ILÏ#œb6F«pAÄãudÇVe”2 Ê7cHßl.(ç:µ¨>Ø¿-¢)£äıVÑ5Ô°ĞšRf„ÊeƒrhªñiĞÊW4²¬&+Å’Ø¯«\\´A#\"Õ-(˜áÔV\"­£ïÒ?	„ˆZxøj”Ká\0’+@Á\"M*EV\nCäè¤ÊïfW%i@\"´šÁ+Ï)º™]NJbËBYèŠ£Ò6#äò'’,}Óèé¤ÍqA²Š ¾§(–R*ZWE*ª¼ Ë²”­x§Ø+o¸˜{I|,ÓòK¯ííx”+·±¡HáÑ £œ2PBÚºÏrèZÓœ›g}Ş*ö*l.úÉZ;ÕØ:T†ŸO2ò7ÊÈU»“;k¼=®ªwË“Ìî76‡å)R¥»LöÎà\$pRM´Ö¨k’ùæÎ®òÁvÎ<¯yŠ±²?}Fã„L±¤jŞãx÷Jf·³ø\n÷„¼ø´7‘3ùT5w:Èo¡}z~]ëQÂ`öãÜ{Å‰-vl\\PÑ«BÌàÔ6rôAŞ1'3*€ÂˆQĞfYÕl†àÎd\r¡¤7\"„ÖÚÙˆ ÀÂ@r¡˜‚ Ğ p`è‚ğïÁpa„P‘äVÁz×èİgE´x\"Ñ1Â@ÎxaËt¿ !¥ù*jğ˜ñ`İù^I¢=é“xÎú_@ªx¸ªˆÌa	ä`\$ËÎ5<òDœËayAjÌÙ“À]a|1†pÖÃ˜waøwˆ1¢Èb‚ÔZËb'ÅÜ£h*‰b,E§º2¬8®¢|#Ë)ò:m	ë«rö¹ÎË¥}ro+Y+rÅí'‚^}”AÃ5Gt†Êã¢tÊ™ø*Ílô€¨*Cc‰Ëlv\0bF¡ÁA äC+!™k\$|Ã9a˜:Î\0ØÃ<\$›¡¤:€A?QªÆ\0€1Ã(V¢pa\rÌæ3˜L´ÓL®õ¡«—#‰xVêĞZ;JwŸ™:\n (Q™2g4€€àR^d	Y5mi¸\0 †¶á,ÚŠÓü7‚\0àƒHviá”3Îš|‘ÒÅGa½Ğ©îçL\r¡Ô¨^Ò\$ñê€U°ÜªCH©90àîHcŸĞŒ3ÃyÂjèc0p2§Ò°¬”f'Ô BæxLÄI\rŒ£DGIæ^Y¼)¤‰ş HÄŞÌªXzî­›´÷ÊƒÊ5j:Sh‚ŠSæ¥RÀñ×ä¬Ùœª+‰e¶×tUİq\rIeÖ6äöœišszé¬‰zğæ{©mvA·óÊxSôR¬Ş•ËZT¡”„Ò°Ô)éFÿSJ™\0éÒ£Ïõ‘o·m¼Ü÷vùãKÁwÎaòHWóæ•Iy´7SÁ{%ÓûK\$ã˜;pyZÕó”öÚâÜw©~=5(’Í“å9*—:¤Bhº•&´„†¼+hXA\0S\n!0³—BÖM0·*RT	3ŸY/)iJ_³fùFS{vNÄ¨+\0XP½Œ©ä_´»^>{y!Á+èvX*fÉY3U•ibúùNí˜óØkÊŒ¦dI¦–N³€3Ù}¸½åÕr¬ÃË\rà®f”V3]Å!º@Ø\nËéÓ&,ï°inWŠN–é¥é¿\\-Jî\"ªkt…6bcN»&Q¾Á–­Ô\0ª0-\n^¦VxÑÊ#c8ÂÑ‡ää¡ŒÙ¡µ»¹µ‡j¶ò,[¾ZÕòÙšà×;ÕU‚ºi”ëQs\\ã8˜—dò #ÎšZºô7f”1´üŞ»w/Ædh{±’‡O\"á¿¨•‚\"òJ1ôË¥T®ÿA¶?k„ÿ)Y…Êğ¼—-åÏ¬ó¥:¤¿zòåäw÷òµà*%Rğ–d(TF¿\\. ¨lÙKWf^¦°Tìºijz«s7.<è7R»¤|Mó“J»B¥\"¡Ö¦×u‡6aƒA’»'\0p&'~Úäšy¯ÓTèÔÌó®3eÁ¶ùßeqÏ´#";break;case"bn":$g="àS)\nt]\0_ˆ 	XD)L¨„@Ğ4l5€ÁBQpÌÌ 9‚ \n¸ú\0‡€,¡ÈhªSEÀ0èb™a%‡. ÑH¶\0¬‡.bÓÅ2n‡‡DÒe*’D¦M¨ŠÉ,OJÃ°„v§˜©”Ñ…\$:IK“Êg5U4¡Lœ	Nd!u>Ï&¶ËÔöå„Òa\\­@'Jx¬ÉS¤Ñí4ĞP²D§±©êêzê¦.SÉõE<ùOS«éékbÊOÌafêhb\0§Bïğør¦ª)—öªå²QŒÁWğ²ëE‹{K§ÔPP~Í9\\§ël*‹_W	ãŞ7ôâÉ¼ê 4NÆQ¸Ş 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Üº¸%3–©5Š!n€nJµmk”Åü©,qŸÁî«@á­‹œ(n+Lİ9ˆx£¡ÎkŠIÁĞ2ÁL\0I¡Î#VÜ¦ì#`¬æ¬‡B›Ä4Ã:Ğ ª,X‘¶í2À§§Î,(_)ìã7*¬\n£pÖóãp@2CŞ9.¢#ó\0Œ#›È2\rï‹Ê7‰ì8Móèá:c¼Ş2@LŠÚ ÜS6Ê\\4ÙGÊ‚\0Û/n:&Ú.Ht½·Ä¼/­”0˜¸2î´”ÉTgPEtÌ¥LÕ,L5HÁ§­ÄLŒ¶G«ãjß%±ŒÒR±t¹ºÈÁ-IÔ04=XK¶\$Gf·Jzº·R\$a`(„ªçÙ+b0ÖÊzÊ5qLâ/\n¼SÒ5\"ˆPœ`ˆÿ@/râùMóXİ~¼”îNŒ£Ãô7cHß†Q(L¬\$±Œ>–Ä(]x€WË}ÁYT¶ºğW5eäŞµ}*P©ñ9/Vu*Rª·¤€‡eÙ…µ«Ôe¢İ”Ğ^mhÖÙáŒ”õ¬O!.“8¶ä\nĞ@åÈ<¾ SÌ°\\šøbÑ¶r‰8§ÈŠE(é­yšÙmÆ+Ä¼+¤^d@'nE)\\İtW½ZúzÂ·+Â/\$DÄ¬\$8Z¯­Ëqd§æ•“ZCÚ·F„OØÑN{	Y…şJâ”da§!ËsAÈ­AB—ç±9~Ç+gJâîª\r¿Y(Õ¡I¦éëÉMÕÕ‰W\\SvjÚc&Ş˜wE6üÛ÷®ÚŸG4’@\$Bhš\nb˜:Ãh\\-_HÔ.©ø—+/±7G¨pÑµîÃ`è9Në¾C‘ä\rá˜3Ä˜TIQ^ÊU,ªFZëÈ,ÌuÎ@ŞyÃha\rÁäVCc>!Ì3PØ`oé09‚Ãæ àaá…&jêjL§è0R¢YÈ¦‚PQi©SˆWL)ÔTL¡ê£\nf>A™€‡V“A\0Aä7&È\\Ø{\r‰°ÀÂx f ˆ4@è˜:à¼;ÇP\\bÜN	¼3‚ğÊzx`aÑ‡H\0D¤ùIœğÂ I·SmĞÛ²ˆô‘R!!ÄMYw¢ôİáG…ĞEú#6qJ~ë°Ş˜ÀšOĞr=\nC&’ÂC€i€*\"2ÆpÑc\\mñÆ9ÇPïãÌ]aÊ>ÇøüÂ£û\raà¼ |Chp=Á¶?‡I#×ø ›‡ğ7´“é8ƒk<¥A&È3CsäfE¹MÊ¢¢¹ß˜¦fŒø¨ºĞò5bø•µ	8—Í”O\r0†9ÃÁ\0w=°œ1@à›\" r›\$0†ibŸ¡#„°Â´ÕDáó¡d€0ÍÀ@åÜİ\r!„65tŸ²ŸÅELâ•\$ß±J;GDÙ@ ‚ÓC}´Ê£[Ú§ªhÀ‚äó{¦‰ŠIPeèüNÒù)Á\r‡ÅÚ\"Ï™ç='¬öğÊÒT\0r‡Èÿ'´ûM!Hw­åÖ(&ÉÖ|£8sPpŠ&£ù:Ãpp‡rÌ9¨UDOèc\rˆ4†xÚ(­*<Œ0ÅhSÊÚ¡â «\0†ÂFXj-ËÊÚª™Q…ÔhªGjó‘}b´õšÂˆªqf#	XÂ“: M¬ùp¥X¬\$\"\0²(E\\Ö…‰4	üjíš¦X\$9Øç«XŒ\n#g®Á¾&#0„\n™œ(p×\"aJ¹º R±˜À’GÃÉŞ4´“ÌŸS°nœÇôù@âOŠ}É¸6Å™“,:jp¥;Rªê Ï‚‰Y	D 5ğ)…à \n<)…B‡ËÃ))¸œ¶/[œ¢™5&Âù¡’hgÛ…½j<¥v€ËÖj²¯ÅÁC#=Uí8ÊVø‰V•ßõ/ƒPvmøğ#8b² €)…˜5m²3„`©R`ÓI\r3e@Ãlƒ	l<iÁÌ´6Ô)† „9(«p•’' ‘-›J}Hwh…g¹IVE2øVB~ùİ\"…¡nôN6,ÿDÕ³stjQä\rªâôˆXR<ª&´\rİiŒı¦šBÃ¾MC;iã‚¥uµR¦®ëLi¡*š³s\rı†ÀW„ÃHc\r`‚ˆFpíM0EiœS”4†h9;¨FÌA¶+'Û3\rB¨TÀ´0(Áiuu\n\\† Uí|>£íV¬:¦0¢çÎ”»HSi}ƒwÊkÀÖY:*ıàÔõ\"¢Ş­äÌó¥tı‰šënÅdnZî)YJÜ±LáõWÑ­ªéÕ‚A€PMÚ›Z¢k¶ó¥ÛâñbÅ.g˜Ë\"zäŸ>6ûnuÚ„ùbKnS+ûÄü8G88¨Š¡JuĞ&WIº)…`cUPS‚fVi!µ7§tæºÌx‘l—%4#\níÖZ–©tÛ‹~nˆ7±A—	V–ÂÎä÷_jİâÿnî\rÁ\nûUI!”÷PêßËL*V:|ï ^Ü”ƒx{ß‡G9Å‹w/\\‘dÍÕŠ~ÁóJµ¸÷ôbMWvòD,ìõ`";break;case"bs":$g="D0ˆ\r†‘Ìèe‚šLçS‘¸Ò?	EÃ34S6MÆ¨AÂt7ÁÍpˆtp@u9œ¦Ãx¸N0šÆV\"d7Æódpİ™ÀØˆÓLüAH¡a)Ì….€RL¦¸	ºp7Áæ£L¸X\nFC1 Ôl7AG‘„ôn7‚ç(UÂlŒ§¡ĞÂb•˜eÄ“Ñ´Ó>4‚Š¦Ó)Òy½ˆFYÁÛ\n,›Î¢A†f ¸-†“±¤Øe3™NwÓ|œáH„\r]øÅ§—Ì43®XÕİ£w³ÏA!“D‰–6eào7ÜY>9‚àqÃ\$ÑĞİiMÆpVÅtb¨q\$«Ù¤Ö\n%Üö‡LITÜk¸ÍÂ)Èä¹ªúş0hèŞÕ4	\n\n:\nÀä:4P æ;®c\"\\&§ƒHÚ\ro’4 á¸xÈĞ@‹ó,ª\nl©E‰šjÑ+)¸—\nŠšøCÈr†5 ¢°Ò¯/û~¨°Ú;.ˆã¼®Èjâ&²f)|0B8Ê7±ƒ¤›,	Ã+-+;Ğ2tªƒh¿´ñkV¹¿‰ûn„)±(å7?ƒÂ7cHß>%Âcæè\n¬™ˆH´xºqñ¸²x˜œ¨ª (Kì°*-£RŒÑLôÀ7²È,UK±8Ä˜€MRUcRıWUUeI,#ÀR¬¨\\uøb—SjÚ3ËLÖŒã\"9K®nbc,­¨pÇ,#XÆÃË\"şş±\"(ØFJü	ã\"_%ƒµ.º%ƒÓ(\rïJî®\"1<:Å‰]È¬\\ÊZ®¬£+ğ]ZFƒ•ø„_×)ClÚ°í#óN}ß·¤Ø\n–C˜Ãu	@t&‰¡Ğ¦)C\$,6¡p¶<æƒÈºÁVúé)	6KÌÃ4,œJ3È¬Ü¿©˜åtYÕ67µ£j4<¤óàê1ŒmPæ3£b7Œê(æ/£–°0Ù\n+ŠıÕì0Ü: á@æ¥ÂªR2½*4MP²ÑÃ:ûµc4à”(£8@ Œ›“û´süúîÎáâ42c0z\r è8aĞ^ı(]‘ñÃ\\¹Œá{œ§	ûé?…á}Ø£üHxŒ!ò\\+7²\nÕ[‘AhÎÑP98†¸'p¼RşÂ#œ'\nÏ#€ÒÉÂÁ,Îs<ß;Ïô=J;ôüjŠşõc—[×Œ³Ó>öš	#hàÓ±ƒpèîİêxK¡¡À@Õ‰ÅB¨95b¬ÿ¹sb¨”6¶@êMQ+9ÖfÙËÃO¤qÁ€Âİ™ûæ™±D\\4\r23tîÄZã^l\rˆ–6XTˆA}\r!‘À@ŞáÎ>…Ü9’âô_	ÁH*X's(‰ ,ƒ©\\‡D GDÈ	TAa%Á\r?•hPâ`1£4¦œÔ¯¢æ\rY´A(@»’Àîe!+FD”Âw~Í”‡\rÑê½pä‰Ã¹³qÃw:¬\rŒCˆá„”&’^˜¾;Ä!…0¤â&\\Ša‚E`Èˆz¤5°Ä6‡UˆdÚ±é9ÏÅ4úÕƒaV	1&rzsƒLA+ôÁ0@ĞÙ½;Ê±:DÓÊECËC•èœ¸!\n‘9²FL8‡ST„1ÿCn1ÔÄ)vÉbˆQè86É<±J	î @'…0¨Ï#\"äCµ‘âŠâ!ƒqâ4hŒ‰²²!	2W\r*Cpf!D2§â¬QŞÙS>†}4#6µÏÚ%Œ¢+˜Q	€‚&ÓJ@B0TŒ\$i¡¤„4O94ãr©È	&\r!èó¦²QÌò,©F+úEêBx\$Ò]Uu^rµR„ÉX†=²4`˜E`,E¢VBèµXµ_Tä“JÊµY\0CKÁ°¼“ÜŠ;”YB–ut¶AÓ‰kEásn\n¡P#Ğpœ\\Œ¯<d¹W½Éy4“ n`öv+ ²NLí\rh´†V¤‹A(‹.L0rRÙĞeCfØ•‡SÊaIñĞ\róÔ¨.wÚ…16ª˜“â£¥/p‚ÛÕB|fÕ%I¦RÂÓPÑ¢Ca©zŠ\0_”°U¼¨0†Ú°µRÃ¢ª„4¶d®›@#ëæüF÷\rÿ2ŠŞß—úğ‚%*¬ÆüÂ°ôb°rïXÒ†\rF0éLİ¼#-YM­ò2‚–SA·`²úC€";break;case"ca":$g="E9j˜€æe3NCğP”\\33AD“iÀŞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvÖÄ±ØÓ3ĞñÃ©Âpt0Y\$lË1\"Pò ƒ„ådøé\$ŒÄš`o9>UÃ^yÅ==äÎ\n)ínÔ+OoŸŠ§M|°õ*›u³¹ºNr9]xé†ƒ{d­ˆ3j‹P(àÿcºê2&\"›: £ƒ:…\0êö\rrh‘(¨ê8‚Œ£ÃpÉ\r#{\$¨j¢¬¤«#Ri*úÂ˜ˆhû´¡B Ò8BDÂƒªJ4²ãhÄÊn{øè°K« !/28,\$£Ã #Œ¯@Ê:.Ì€†Ê(ÃpÆ4¯h*ò; pèÉ¹ñ¨ÂßEê“¯S¢£;\$ÓÜK£1Tà&Cªüš\"¹‹¬“\0HƒœŒ»BU0?ÎĞòÈ	#pÓ3¦ŒZ¡£&fğTMDÕ¨#ÜíŒ»J”ªœŒ\0Ä<·\0Mi[Wàó+`PH…á gb†4Š^ÂI ã#\rˆ8ì7¥#`Ø7Œ`P9L¬€˜a•©µZ Œs=ER#—,R½R+«)Wİ3†YSVË‚(ÀêŠ·Â@‘Lô\"Ís )„ìÓµƒ@µØÇw·€Ê1ŞW¥68CûasFZáïÆ#^#•çzÎ	+ \$	Ğš&‡B˜¦ƒ ^6¡x¶0çƒ»tbx\nõ\0GRhÙ0MJ’££xÌ3Cµ\\\"—µĞäç¨xxİUâŒ€¨7«‰ğÜ<ÃLërÔ3ZëÃ%Ì Â3Œ+ËŒûWi°İ\rŒ¡@æ¸ÌUU§•>BÊk©ˆ©h(Í;Âğ@ Œ›Ò_ëHÊŒ“‰ ĞÊÁèD4ƒ à9‡Ax^;õr?Ë&¨Î»A|½=‘P^İ»øïxÂ&)>ŒTÅ›L®Häşn®†èŞ³@äÕ{+	¯óp“AhÄnypËëĞt]'MÔu]`ï×r«Ê^v] İÚDÎÕşÁQÄQ+Xğ^u(Fè7«PèØCk#¤±T&Ä«Á{<”3ØBL	@‚ÃTPØ£RÇéÁÅ‘ĞÂÅX æ¼”†\";œ||äx3=ôÚÃjZ¡½·C\"X@h#¥¡´È«BÑƒ&?¿ç’eÌ™0†¢2º Y\n (`Ş‚yF   ¨‚”\0H²š7ÈáÁ±3Øƒ9³5f´×ˆv‚¢j ¨-`Şß;Š‰FPãRhĞXc‚gØİI4€‚cãV¡ÜÀ8Mƒ;¤VÆæ%°Â…\rú=\rğHû0¦‚3wM‚7à@×Ã“ÓO“xrLRGB,\$š Å©\n9[IR0\nxaI…\"¨´)Æe‘\$E„Ä\$‘òi#zµ„7@ãv¤ \$¨üÍ(ì\"IÚ3k\\ÿ›¤jjÛœ©	†ÈœF @xS\n„Qb|F	 gyæJ['ÎNT^Ÿ¦È®™¯‰(¯šdBfÑQ+!/=s<¢¢h§…>ÆÕk‘ò<­‹¸ \naD&‚80 ÁR2ª¥jOdÆ@¡šv©ğäj	à˜ˆÖ.&Ø	Õ„Ù˜fj‡E ‡,'ª0b¥£¦KÉ%YªrlÒzºN`hi%f’zÉÌÄ Õ¦µŸÂ ­jÙ#NÙ @Ó\0la†:__¨ò×|d6×E6IAj×&!>“T(a³wT*`ZÃ1Ñâ©*]k\rw!¦\\XÙÆ´è&»+³=kRdÜ´ï!:uÒĞ‰+l&†\$Å½ÊèY£Y;I•VĞãĞ’kç1ç©!êv–°abF]*KI­0¤˜0Î¤bOÑ2\rôºÆÈÃn·¯]£;á@Å®ÂpÈ|ª5¸‚¤ÃXRm¶µ†€2«¥kmğ\"M\njÁŠ>u\"µ×`EL[2H²ƒ‘…h“úyEëˆ¤§¸¶Q°3˜Ahh+<:\0";break;case"cs":$g="O8Œ'c!Ô~\n‹†faÌN2œ\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ği6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤»7ã÷»ó¶òI61T7r©¬Ù{‘FÁE3i„õ­¼Ç“^0òbbâ©îp@c4{Ì2²&·\0¶£ƒr\"‰¢JZœ\r(æŒ¥b€ä¢¦£k€:ºCPè)Ëz˜=\n Ü1µc(Ö*\nšª99*Ó^®¯ÀÊ:4ƒĞÆ2¹î“Yƒ˜Öa¯£ ò8 QˆF&°XÂ?­|\$ß¸ƒ\n!\r)èäÓ<i©ŠRB8Ê7±xä4Æˆ€à65«‚n‹\r#DÈí8ÃjeÒ)CÖŠ—Ğ¼H9ªéC€œ“Ò³ÃÒŸ>@SôJñŒ¯ Â6È\"+RØQ«!¨ P‘# P¡4MIæŞq ¨95úú8TùBí'‹¸œÕ¼(“q;¡ @10°×Uä,<×ö\rz:.`PÂ7\ràT°\\–˜b÷MMCĞ5Œ‘t4Ôb,0Ò`P˜˜2\"×½Ã€æô¡kÊŒB}º9¦³\$qO\"Í@ÚÒ1tù3|ïÍë{ß@P„<'N\$CtI]·ÂŒÀN68vˆã¶“‹#.5†#X|ˆ£Y+y»%zW˜„}4\$Bhš\nb˜2Ãh\\-Z(ä.İ·{®ÿT\r*%(ÌğÌ3(P¦2ÕÆP”5Ë•ª´\r¶`Ğ\"CXê9®xtÎ‹ë•ƒLÖÕ¨¯ÈÓèÕÃmşD6Ê-ƒlàWÈÓ±ì¸.Ğàí{nÑV¤[’kºnÛ\\ôØî¶`í¾â{'c<.ÃÃ§ÜNÎànüvß4ÕÜ‘[Ênü¾õÍs›ÿ>•ŞÛ‰CX¦ÈŞ14“R4;8»)µ?‰«	º·è”(ÜÍâÉÀ@J^è7é\0Ê3¡Ğ:—pt…ã¿Ì\\¦°%#8^1axÈ7£Ã Óúá}V\"ã˜ài°e€¼0ƒâ:u½'!©«‡5Fı	ú?JÁ27Gøë©#dİ¯Z„›Û›A«éfd™\r5tè%#AØ { 9=·º÷ßs|o•ó¾”¢úßkï~*@ğÜşJ€>	!µ1†Tº‘Z€p²\"ò&S\nƒt0u1šÒ0FŠ12°6#AÄ¸irf\r­­7†(I	Á:V\"¤•®¤f®ÃªİŒÅn‘ã€œÓş4‡h¸!(.îäj!¨š×\0êÓTM¨D4ÈæIYy/i™‡£´•„Ë¼!ò%ù•°à™Œ|›GÔàD\nq¤iø@\$\0A'dø­_¦˜‚ \nPjh\"A©Z\nxˆÈ\nà#”3Ë!‰JÈèIKÈâNÖb\rAá‰U! Ú\\ÌyÂô:7IÂSHãÄ<äRB …8Gê† FhˆÂHŞCY<)… Œö§h§ ÌJc[­.e¾¶6ÛÑ8“èò’ó8LÓ|×V\"ôàQ8àN‰­\0AØ<¤ôï òQaAÆ+ ÔŞ#˜\"F=r4DUÈ’F(R±é>¢İú#5î`£ŒÚ`v_¨^`°7FØÊƒ<!@'…0¨¡¤Q=X'ª²oÔKz¤”˜6rŞÍz~˜4†pêpÄl¼50Ô5¿jHÉXV((î0¢	)'*Ó|WÎôG‰\"£á´7¦âl‚¤¶7äÁ›n‚ÑT­d¥ ÒttEòwWl0ß‡3Ê˜‰ûSÖ|ÇÚ Åi\rõu¡„¡©ŠG¬ò·%BÑ¦B~n	åª¡æ¬¡(Ğçm@¡QÍ	“±ÆuW£4¬…]\\›–É˜Û)ºÒ²Ûª[Hõ„%a: Ø\nÎñCºVæÒZq\n#t®­bUŸ„fƒÒÿ4¦)X\$Qàò»ç!‹7æ˜Šo\n¡P#ĞqC˜` ²“FÛÜ‹À£ØËc¸L9YfA…®Uá»£	DÌ)‚&5Şn¸^ñJ2\$EAƒt‘wsf`›P\nWè7K)®‘ŒEıƒSŒˆK#—æ4BüÅfYˆù	¡TôDÓºÈÄ\$C4Gê3K;'l›Uò˜	(<ANò±qNIÙv (!”ï‚ê5‰\\™feÅÏÆab2'ŒZÉ	ê:‰—\0ÈËš^âÊ€¨—¥B°y[5f¬ã‘ê¡?\0(*p‘Æ(˜3&–dËök‘ø";break;case"da":$g="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"©ÀØo0™#cI°\\\n&˜MpciÔÚ :IM’¤Js:0×#‘”ØsŒB„S™\nNF’™MÂ,¬Ó8…P£FY8€0Œ†cA¨Øn8‚†óh(Şr4™Í&ã	°I7éS	Š|l…IÊFS%¦o7l51Ór¥œ°‹È(‰6˜n7ˆôé13š/”)‰°@a:0˜ì\n•º]—ƒtœe²ëåæó8€Íg:`ğ¢	íöåh¸‚¶B\r¤gºĞ›°•ÀÛ)Ş0Å3Ëh\n!¦pQTÜk7Îô¸WXå'\"h.¦Şe9ˆ<:œtá¸=‡3½œÈ“».Ø@;)CbÒœ)ŠXÂˆ¤bDŸ¡MBˆ£©*ZHÀ¾	8¦:'«ˆÊì;Møè<øœ—9ã“Ğ\rî#j˜ŒÂÖÂEBpÊ:Ñ Öæ¬‘ºĞîŒãÈØß#ûjµŒ\"<<crÖß½\nzê¼(oŠÏÊhÂˆâ 2ØÊ<&£r7ÌI8˜§¦±R÷\"8äß­ƒ°Ü‰éü	,\nS\"‹ÍŒµBpòĞ¶º\$ŒT8Ê„´e9CPÂ\"ãPÁxH b\niÓ¸4Ë8æ²3Iû¦Ü/ó8Ú4°ÂC\$2@Î¬Â\ràŠ²)(#T¸©Z'ÀP¬¾\r Ìé©Q\"¦X,ò€Àu!\$¶\nn‚Ú6Í0:B@	¢ht)Š`PÈ¥âÙ†RŞw©J.ÙUãj2=@PÙBÈŞ‚-(Ş3ÕÊ©R!P\$U<¶£¬b*\rñlş<£“ê1Œo€æ3¬õ1‰€åŒ#=¼¥­j“YÃªjaLÌâÁpî<±—¨42I[m+¨2â#&`…d£Èƒ\$Hx0„Bz3¡ĞË˜t…ã¾Ä\$:[Î³Œáz”Œ“#@4ÌxDm«bb¸‡xÂCXöá@)ˆ\$6'K³B„†t7@Ã<\$#,BN”ªZ5Î£+ığ(åqÂÆápA©êº¾³­šî¿°ì{*Ö¼íPİµL\nTÇÙ„J |\$¨ó`¥M;Î÷„zÆ‘hrëâÛ -\0@3§M*DĞÄ£”ÿào£Ÿn‚¾ÏÀæ5­°hŒ|!KÎ3©>~Œ#c2ºd.ÏÊæ9òL4û˜æ<È´e¯È:‚`fˆ(a9à€1›×€Khs\$åÀÄ9àìPy@0åÍœ¼‚*ÔIÁ:2æl\0k‚ğd¡‚ˆ\n\\éz™8ÖÓ!}É<˜\"Óª`¹x.I\$û‡#rFO‰ó3æ¬ñÇÔf)O3äı1ÓÈÁkÈüŸ³ú’Hw\r¤1ÀeffMõ€¤`1†ŠÂÂªAHe¤Ğ„0¦‚0-,d\$¥¸ƒ^“:Ñy'<Ö’‚TK	qŸP/„3àèœM@oaÏ~8sD.\rªqˆĞ¡2ŞDCË P`ùóé  ,R'¡Ä:ŸB±/i-š,°ÆGÏl©>'è¹99	BxS\n„õ9Ù\$B¤¡›[ 5±²„Mg\$H(ˆ¯ÀèÕ¹BTÄœ“²z„bUré’pê±_z€=ğ²:GÉ	A)dá+…0¢j\r@p@`¨qwªÁé9`Õ\n\0raÅ(“„PÚEÔA|¨Üš®*D&0pšÅF‹PğÊ—¨“ÎIi¨’0œD%l­µ¨EÈ\r(´ª–p†‡`+\rh5Ÿ•æñÈ¦Œ¥ä™óBhÃ%¥ ÖWÀgªQT*`qƒ(g;éÕ'ÒD’b…1Œs¡¦Äj8¶–`1„©VTÒèH™’#5Š «Ò15ÍQ¬CCD>‹lÓ\$@(½“9Ò_Íé~EI¼ŞËUÍ=y•ÑCJ’F&™#D¾Á3á1ñE6a~—?hN„Cí@æ‚|F	éõ_æ¨³xbÈM.­D%bÚÌ0K#éÌ\"’¸ŠaåÇ:nk5J‰^&Ê*\n…Õd…)âŠ«å~&2€";break;case"de":$g="S4›Œ‚”@s4˜ÍSü%ÌĞpQ ß\n6L†Sp€ìo‘'C)¤@f2š\r†s)Î0a–…À¢i„ği6˜M‚ddêb’\$RCIœäÃ[0ÓğcIÌè œÈS:–y7§a”ót\$Ğt™ˆCˆÈf4†ãÈ(Øe†‰ç*,t\n%ÉMĞb¡„Äe6[æ@¢”Âr¿šd†àQfa¯&7‹Ôªn9°Ô‡CÑ–g/ÑÁ¯* )aRA`€êm+G;æ=DYĞë:¦ÖQÌùÂK\n†c\n|j÷']ä²C‚ÿ‡ÄâÁ\\¾<,å:ô\rÙ¨U;IzÈd£¾g#‡7%ÿ_,äaäa#‡\\ç„Î\n£pÖ7\rãº:†Cxäª\$kğÂÚ6#zZ@Šxæ:„§xæ;ÁC\"f!1J*£nªªÅ.2:¨ºÏÛ8âQZ®¦,…\$	˜´î£0èí0£søÎHØÌ€ÇKäZõ‹C\nTõ¨m{ÇìS€³C'¬ã¤9\r`P2ãlÂº°\0Ü3²#dr–İ5\rˆØZ\$Ã4œÇ)h\")«òŞ¨a\rÔ2\rQq€Ê<1hB@9¦bdpõˆ­é?R4g/\nô@9€P˜7ŒèRpü6ƒ½®ó0¨b„‘£ƒšF=!è„<¤€HKaX‰h5 R÷W°\\–˜bí®C¿ŠĞÄ¢®RJöÆ0ª28ÜÍàP‚Ş)k^#¬êŠÒ#ì`Š¦£HØ\n×s\n:8c0Íu\rÃC57Í¢Ä—\rKLÆXáï|§kòY†aËŒâc\rõDâÉjŒ¦cTÂ=U\"@	¢ht)Š`RÀ6…ÂØÕ›BíŞÅ·c¬>ÍJldå/4C 7àVêöÏ¡ƒ²ã…OÛ-7C²µC¡“òV6\rğ…WVÁh¬†Bî@\\D’8A6úÒ4š¨ bjş Ğ\" )ÈØ:¢=« ÚÈß­ë¨6¾€ì[%²…ìûJƒ¶\rûs†î4NçˆîÕI½\räî&zƒ\0002?Éàå­\\Êô­hÉ ŠÔê2\r¨\rt˜Èê{D¿¦A\0x0´8z+ã à9‡Ax^;úr5Ü¯p\\3…èß²\$whÜ„Aó¸4ƒ½ô6\rsLÔ7!à^0‡ÎÛtãŸg\\º¹\n|”\rÍm¾ÚQ{?†í;ºuƒÁ5<ÁÈ«dª87aˆ–?³ˆğ hxÏ!!¼·šóŞ‹ÓwOX9=‡´¤Ô«Ş|DÚ{ëG-¼7>çàíH1²Qê\$&¦ĞÈÙ­JÈLã\"r¸Êy¹åm4u\nq‘~„œÈP €-\ndµKˆ–Ï™ìjÅlƒ—¢fY»j¾cŒAEOÑ20Â¡[!.`êNÚã`:&)Ğ‡HÒ¯“P g\r©#’t¦£ºbAÈé¢!)Äén•¹\"^ÍŠº<1@:8Ï\"¼Y²PéÉvGAAQ0D§ähŸ!ƒd€½Æ²ÁŸ%Ñ«òX@ĞÒ¨sJ%\n›³c¬g;Å1+CğSì†›Â¡Õb©Èwa­íÜ†r¿&ÔŠ,øÏ\0 †ÂFP7°óœâr(®EÃ—l“ü0îÍË\0Ëól<ª;brMÛóª'Å\0ƒ'`ô”‰Ú)X\$dKøra…Ñµ<%İSÄ,Á…r8æ´:B	Ø3tèWM\\¶#¡ÜB0@ÅÈáwÆşr0VŠSp¦&ÌƒE¹,LÂ€O\naP™r@HJ(Á¼¥6sRêÑÂ©SøƒrRJZŠ£M:Öz’wáÄ¡#´º#çF‚Y Iaœ:ŸxØgİ°k)¹qº\"\rVêI\n!2ª«ÂMhØT\n„‹’¢4i	vv[¶«d…èn±3.¯ŒáÑ¯¤nŸ˜Ã;WªşÕ\$›X:)¶6_£\0ïjÜ,¿§¤3Û\"U@i4Äì¿°ÿ	˜C`°„µ»BÁ¹6ìJÔP„ë¡\$’\nËXè¾¬A\0U\nƒƒKÔe \$ÍˆÛËSoíµ¢™0ÍT8ê¼É›3¶Õ©_«HVİ+>ôbPRú·9(%L\\—™1†!!ßT\$¢ÈI‡¬ë˜‹¼¨R=c®@M +²•®æ&’È¢¦(›ÂKIœ=ƒJí–¤ª¬¹Û•¥¹“’DÌKCm:„°1Ğæ°qå³3Œo(™ƒ4Œ×S>%İ '\$Ûu”öîÒ€¨]™!¢Ø9Dàó\0`€Vn6öË+`\$ÚÄAx ";break;case"el":$g="ÎJ³•ìô=ÎZˆ &rÍœ¿g¡Yè{=;	EÃ30€æ\ng%!åè‚F¯’3–,åÌ™i”¬`Ìôd’L½•I¥s…«9e'…A×ó¨›='‡‹¤\nH|™xÎVÃeH56Ï@TĞ‘:ºhÎ§Ïg;B¥=\\EPTD\r‘d‡.g2©MF2AÙV2iì¢q+–‰Nd*S:™d™[h÷Ú²ÒG%ˆÖÊÊ..YJ¥#!˜Ğj62Ö>h\n¬QQ34dÎ%Y_Èìı\\RkÉ_®šU¬[\n•ÉOWÕx¤:ñXÈ +˜\\­g´©+¶[JæŞyó\"Šİô‚Eb“w1uXK;rÒÊàh›ÔŞs3ŠD6%ü±œ®…ï`şY”J¶F((zlÜ¦&sÒÂ’/¡œ´•Ğ2®‰/%ºA¶[ï7°œ[¤ÏJXë¦	ÃÄ‘®KÚº‘¸mëŠ•!iBdABpT20Œ:º%±#š†ºq\\¾5)ªÂ”¢*@I¡‰âªÀ\$Ğ¤·‘¬6ï>Îr¸™Ï¼gfyª/.JŒ®?ˆ*ÃXÜ7ãp@2CŞ9)B Â:#Â9Œ¡\0È7Œ£˜A5ˆğê8\n8Oc˜ï9ŒŒ)A\"‰\\=.‘ÈQ®èZä§¾Pä¾ªÚ*¨Šô\0ª¹‹\\N—J«(ì*k[Â°ëbÜÆ(lŠ²Ê1Q#\nM)Æ¥™äl–Ìh¤ÊªÂFtŠ.KM@\$ºË@Jyn”ÅÑ¼™/Jîò`•¼ğ3N¡•Š¶B¡òÛzö,/ƒå*’ÊV]¬ªŠş“\$Q+\$æ ¯Û\"ƒ¿¢U:#œò6O¬A9ÍãvˆĞX¦\$2 Ê7cHß0¤ÚRªñ‚\0à™ÑJ¸ãeÆTš¬oiœÙÙÙE¢M:MbÖåE’”±ÍìÌgŠúqOÃi6„FèŠ¾N¬Ñ2z‡9ô©Ÿ,ºA(ÈCÎ<ëÛÅ@¤úXÔ5ª9r¨^{˜c	À¥³ïh!p“\$ª¨¥®ä^«ööú5¸Sb€.¹|H•_\nÊå~>±ğ\"…£hÂ4‘T2ä™Úàœ[êzŸr–“é”>·æ»¯Œ¼ï>6U:•e.xÈ]²w×AŞèİıù~S³\nH¥&rı*&qRÙ17ì\$D¢Ao–ázÊ^âÚFıï*û_Š‰|ò%Éúõéˆ6ƒ’@I:¨\\¢ÁHA|]Gü‹\" N+};«± çèTà2tDT‚ÀsÌÔ’›++\$í\r¼Z¿II½UĞpŞ¹c\\®Ù9¸+ÇÄª+ô,vYLj-\r‘`XüO©¥iŠÍø2ÒèNa×€,Iàš“şğàÔ?ƒ¯1ñ–d•á„æXë˜XAaqi†Š@ˆ0§D7‚ğäûøx©¡ôˆ'äDEù	U’vdÕÁrĞ…ÏL=,).òÜ‹ŠPT\r…4¨ ÌÅ«!\rÁœÈCHnNÜ1²6B€ „€äC0=A :@àÁĞ/áŞVàÃ#äŠpÉÌ3‚ö>ÓûŒˆ7ğD¥Êw’!œğÂŒ(—DÔ’ól\\ÊŒLE0İ¿¥t¾ÒôË†p½“Æƒ‡Œ(ˆx'Ù’bÈÏS€£9Æ|M\rôš“’zPJ)I)¥Dª•ŞWK	\$%¤¶—¬q2	y/Œ>r	)ªê\\–yû˜³\0¡È@ZO«óª©\"SÜ^Ü	6AÂ²(ÆxÒ£)I\$€®Â²vhü7I0ÇœB¥C´vY+è(UXLäi¥Rfb¸ssÏR	>†Ç.Ù îŞ\$ú„‡A´2µğÂ˜ğrPÁŒ1¨æƒ«¼\r¼3É¤C hÅ>°ê¸Ÿ“º]†ØÌ)³6°¤“\n_\0Ì™ùV¤b²¸Qbª@*´…ú~AÔë\nÎ&šÅÅ_bš:-a@\$\0@\n)~'€¤6¤rºIYi;…å¦r”Ù’©ó¹†ğ@iÎ€2†z»oÔR‚aª7¨ZıZÃ½]!¡8'Û—'šŒ¬ ‚·WK¸ƒ€uQj5G‡&¾Ã@iuÊHyHØíŞa†D†S\n–U‰>(İ\"¤RKBS\nA4ãÈCê¦Z(CO(éÉ4ß%\"°ÂŠS\$w¡woªœ¨—hDcáZ+‘Á!STŠ[²Ö\"¢4…XszŞy&Rf\$İ—E0QÃ¢1À7‚K‘ûÁ²4ÓX€LDİƒ¸BÈ“L‘#gô“(3Â4XŞÉàü`çŞŠÄ\"z¿	A*I<³'jã _á@'…0©ZA':™e\0Ò\n_QÊº›Ä¥ˆ¹£ôY[ŞtZ‚2z2áEj©‚4ÕnHIó\"Š’4/ø”OIı¡?P'4†C©#˜WQP¦…0¢0áT €#KM5Ğù1Éèè¼ÒB¦òÕ’p/ÆšXÁ*É€Ma+µ¼¹àkY±)eo›Í„Hö#Zk	Ö-²‹RKNÍ!=«£Í¤}â!Ù!gà£í“‹n“±0m–Ë´6ò,k‘\"Ã=ÒHã<CÄ—wíİ”–\n„ReÊÙ¿\0†şC`+a²õ¼¼©èò¬,¹ø¸—5ÿ Ì[…‡Í\nÑòyÁV10 ”+ØWÀl:9ÒÈ˜.©Ü}µò\n%5¦…P¨h8)@‘¯Ø£µ™õ£{Ü¨má¶^}Kg^â/;‘sBvaNı\"1–¸—\"‰±è´%}ˆ	bÔ“]@¤+”;™CV)±º¿©„:¢©¡´\r¢\$háSf`^QqÓ\"œÑ¦S= Š]Ä-Pbê·;¹È\$ÜUq~4Exâ¢î:âŠ =ÄÌ(¦ÁÄÌÕ£du\n\\:ı¢æ—êâ`½\$ ˆÒ·RIãku\$0AtÅ£~[=NÄšê-wdH©š0aÓ‘z­9ø¬x™{{pU½\\¾ğôîÅb9„‰Ùy¢Ñ 8HçÇ4ä4jVûÉii7–÷f0ÜvôÑ;Ñä*D¡W_RÌ¦•ÿ)®E»j:;àÃv7fB®fÃbfYCæ ";break;case"es":$g="Â_‘NgF„@s2™Î§#xü%ÌĞpQ8Ş 2œÄyÌÒb6D“lpät0œ£Á¤Æh4âàQY(6˜Xk¹¶\nx’EÌ’)tÂe	Nd)¤\nˆr—Ìbæè¹–2Í\0¡€Äd3\rFÃqÀän4›¡U@Q¼äi3ÚL&È­V®t2›„‰„ç4&›Ì†“1¤Ç)Lç(N\"-»ŞDËŒMçQ Âv‘U#vó±¦BgŒŞâçSÃx½Ì#WÉĞu”ë@­¾æR <ˆfóqÒÓ¸•prƒqß¼än£3t\"O¿B7›À(§Ÿ´™æ¦É%ËvIÁ›ç ¢©ÏU7ê‡{Ñ”å9Mšó	Šü‘9ÍJ¨: íbMğæ;­Ã\"h(-Á\0ÌÏ­Á`@:¡¸Ü0„\n@6/Ì‚ğê.#R¥)°ÊŠ©8â¬4«	 †0¨pØ*\r(â4¡°«Cœ\$É\\.9¹**a—CkìB0Ê—ÃĞ· P„óHÂ“”Ş¯PÊ:F[*½²*.<…è¸Ç4êˆ1ŒhÊ.´¸o¼”?Qƒú„\nPA¯3ÚE?B3ò­£Î#0&F	@æš¹ksÙ\"%20†âLúw*‰ƒzâ7:\ròTá¸£•4XÊ¢pê2¨òÓ+09á(ÈCÊğÖU¥lŒCÍx¶¨^vbRîk4˜e@ç9©*‰ã”jÄQƒhÒîˆ3…™gL,Ä©ËLƒ+\"8®x‚2\rC­ÛGˆ£sJÄW#-Ì–/7»œWô0´ÈÕú4Æˆêh0Êu0\$	Ğš&‡B˜¦ƒ ^6¡x¶0äº\nÑƒpòMıI.p6LË6–±“øÌ3<ƒr²ï>Í+œİˆoµL•!õ›P\nƒzz0Î\rå\"NÈæ3©`ÙO-#œ-08#Ï‚/KLûYÛCpê¼˜Rš\nhÍ¾½G«˜Ó”µÎˆeJ€:&q»<ø£C4#<!ß²¾ĞµH(iPy\r`Ì„C@è:˜t…ã¿<FœCò·ázòÚ\r|J7á}Ô¸ËPxŒ!öÙ·hîh:°ít- Âi“’9Œk{ı¸Sd\0ĞÕi“\0¿/	T9Ápk 8\r,dqìï%ÊrÜÇ5ÎsÃ¿@2tAwIÓu”:óDõ”	)*C%8½Ÿk>£RPè”Õ›|ä5’%¶FÏ±9gGıPÄdˆÉ(%Fx1e¶\n #MÕ‘’hBo8ÍÜ;šbYà@rpAÉ%+0ÂŠj/Qª5f°^¡+ÿ6+H0¤£„öã\r†`Ç™ã‚û‘#G\"§…y!Ä=‘ïƒ¤h(€ AÃzƒh RR!0aÌ‚@ÎÖK:nÄ3š£FLM1	9Dl·B4Œ%¡±«‡s•á5r2âu!ÙÔ\rœ ¤µ\0w&¾—,­	ÿ\$F3¶“KĞC\naH#@ìAO\"ÿYU†Àì‡röa©«£³^GSq,…aµª©VúCÂq0mÕ;£ŠËQ¤'ä’'I¸z¡JÚ8Èü J\n!ÕüP‚I,ÎaÇŞAÍ61àÆV@Ğ‘\r®ô“íËÒk#²dÙHÓPƒÂxS\nˆtş&ârG˜H 1m0¡ÍT´¨z0éœ¢xŸÉlÜ;„Šb˜3ÉŒÍnÁ¸Â¥LÛ{ü&†hÎrôk¼ÉCV6…0¢”qÜ`©èa#\$±Ô‘ @Í<ˆ;=>ÄÑW(ÒJÏ*_à*¦™bz`Œ!†a50„ÔàŞŸšÉö%M|¿s¸Eázw«l•¯ªÎF«Lka&`!¦\0Ø\nÓY†‹‰š†RY+Ú»Ò%(¸å’–®M5:—“Â6 ª0-`73Z‰¢¹2•z¡E¥ÿ[,İVõëÍBêR#¡Œõ\$­ãˆoæ)´J¦Á†`òÆÊqYTnªWé\rÀPm«Ã›°ªq\$‡¯ÖQHt<r–[¹A*˜É†VäÊU=‚¬()Ù“p™©®%t7£CÂ‚SéU\$3ƒoR#0¡'\rû%õb¬í\n°´vÑ3ËZ^\"ÈjèlİÌ´yí\$JÈbâĞFøÁ‹Õ²QáQ=¥Zª¬¥…%Mñ€";break;case"et":$g="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ| ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €é:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp­Æ÷Aßš¸'#<{ËĞ›Œà¢]§†îa½È	×ÀU7ó§sp€Êr9Zf¤CÆ)2ô¹Ó¤WR•Oèà€cºÒ½Š	êö±jx²¿©Ò2¡nóv)\nZ€Ş£~2§,X÷#j*D(Ò2<pÂß,…â<1E`Pœ:£Ô  Îâ†88#(ìç!jD0´`P„¶Œ#+%ãÖ	èéJAH#Œ£xÚñ‹Rş\"ÃÃZÒ9D£ƒ±ƒ\$¾½ˆŒä‚ÃÒ÷\rÓšR¤ c”ê÷\r`Ü\rôj&DQ¨¤ƒ'\r<œ€EÍğÜ“,ğKâ‚B`Ş¶\"¬	Nxë òú†S3’4CPÊˆ ğò¤„µŠ2:,ãË3 PHÁ i`† PŸ5,ìĞ2ÀIc\0´ÄkP(\r5bÿ4ƒ²2@PŠ¥nP—#!£¥¦2¦HM¤›Ê4zÚ¤ÊIf*•]Z:‡PÂö7#ÈôX\$	Ğš&‡B˜¦*£h\\-8hò.Ééy6Ëñ¨Ù0L«/&¥#xÌ3#iëh÷³ru5N%Å Øß.{<6±ƒÈA¨CÆÂc0ê6/Ú9…0å™#:2ö¡WÓŠ…<Ã(P9…)¬¡•7Ãf|ë%)xÜ°ª4NÌ½(Í;¨ÈPÎ3rP9h#\n!“ğxß@Ì„C@è:˜t…ã¿\$šÀä-#8_\nïÌó\\P¡xDqÏ®Ìã}‘±#N\\öĞ¡3Áj¦ƒ^z¶4™˜êİ£‰Ó2¦©»\n÷¥P\$°»…XƒÁæÌnÛÆõ¾oÜ;ğ›R{Ãñ<XİÅĞ0¥	é„J@|\$£‚/Ã§1ÍOòû\\7 í;Šœ%*’T÷æ	ïÃÎP”,W÷³I\"ï¹ğëêUù)!ÈĞîF™ás}áÉ±‡\$Şèƒ1¬OÌÕ›˜–tÏ±l€ÅH4e–EC\n_4ÇÂIs&¡¨òô^Ê‡xÀ2DH@‰ZtBŒu˜ÿÈ8P	B!4*íÌ*T)\rD5\nO`#f4Æx8Di:\0M@€ÁøèƒcVï\0¸,´Ñ¿h\r›ÅÃÚkŸhn™Ü˜—v¹fpt“†vô Tp„a…w@ŞS)… ŒéĞQí\\*àÃ:ĞìZCk®vÔœ¦`O	iÁekÍÑ\$†Gˆ)†/Oº“ÚPŠ\$2h©î\0 ’EÉ–”ƒÅóBàô]MÅ×ÄÌ|dËipĞy\nB6¬`æ8–dÔ(ğ¦kY„¥˜G÷BFáC?ÅVI@ÊVY–nˆ…±RK‰„ãM©Ö§Àà€-0kÌ:ItÌc3{Á½ıôhÙÂ˜Q	€€3)Ï\n\0F\n‘6ÅÇº´\"áı˜éxŠÃgšé†ktZµ³v×€PUuóª‘µ¦¸Tå¨KUŠ¹>:L\\â:¬›ğÔy¢öUÈ­|«V¤pN0›‡ä¢™˜C`+\rdÍØ®@ØRèqÆ‰0)¤…P¨h8O\r¸’¢j÷%W\r(µäN\\ˆi2Dn‘†T=K©9	¯ 4†`òŒ[`HDÉs4ºšÀQÆ*…ı©Ô•Üqja‚©È6 YÌrY		PôR–“ğ}Kúš\$™L†U–åAÛ4\$Äë…C‚„Éšõ*o}w\"Åj+i‡.„¶¬¡Vñ9­%´ rÎ±ÉÑSlnv×bFì—1q.e¼)\"°ê_,Y%á¤„€";break;case"fa":$g="ÙB¶ğÂ™²†6Pí…›aTÛF6í„ø(J.™„0SeØSÄ›aQ\n’ª\$6ÔMa+XÄ!(A²„„¡¢Ètí^.§2•[\"S¶•-…\\J§ƒÒ)Cfh§›!(iª2o	D6›\n¾sRXÄ¨\0Sm`Û˜¬›k6ÚÑ¶µm­›kvÚá¶¹6Ò	¼C!ZáQ˜dJÉŠ°X¬‘+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#™dìv\\¬Â%ZAôüö#—°g+­…¥>m±c‘ùƒ[—ŸPõvræsö\r¦ZUÍÄs³½/ÒêH´r–Âæ%†)˜NÆ“qŸGXU°+)6\r‡*«’<ª7\rcpŞ;Á\0Ê9Cxä ƒè0ŒCæ2„ Ş2a:#c¨à8APàá	c¼2+d\"ı„‚”™%e’_!ŒyÇ!m›‹*¹TÚ¤%BrÙ ©ò„9«jº²„­S&³%hiTå-%¢ªÇ,:É¤%È@¥5ÉQbü<Ì³^‡&	Ù\\ğªˆzĞÉë\" Ã7‰2”ç¡JŠ&Y¹é[Í¥MÄk•Ln¨ 3ûêXÁƒHç\r¢†AP0İHRPÍ+IŒ£Àè2Ã˜Ò7Ô1Jw)!I4İ3ÍâZ‘£´:/©l½ÃNä#®é¼©3'1×ò{4‘Éé,Ìƒ¬	D¿D*JÆ•éò,2<•iT„¶£ëk0)=tC°.k´ˆZw8jÆ?,‘¡eŒÀÆ”èê´Ğ£Šş¾è\"ş¬¶c\\ºä\"v•RÔ} \$Èìi))é¼Á–1´\\T£©¢ÓTFïíÀë¬%³&À%òl°âMê×!ª	i·Êñ%åŒ\"q:§öÅ´Ï ¥m–¸’²~ÃÎä4l	@t&‰¡Ğ¦)BØó©\"èZ6¡hÈ2aSC ØÉ^<C ØØ6I)D«&êê&Fxä´¶\"Ã1¶¸ªÂÒX+.UC0’k†@£ÉK¸ÚFFÅşlŠ´şI±”<äe^’JñRBŞËstæˆç;ìp®¬ôCÂ\\3?Ä(ÉlØÈ÷%ÊZ<³D’¿\\Óy!óÄfémÉ?dˆ•I.¾â•‰.…º\nƒ@Ã\0C#5*:ÔOh@ ŒƒkÙ…\0ÇRTC\$ƒ@4C(Ì„C@è:˜t…ã¿ì>Ï·ÁC8^¨zRáÑQ†à^ôAÇ°3ƒÀ^Añ[FéY”£EZQi·+‡è…¸ÖÚ@Ê»±,-ÉŠ4¸¾ŞRrt	P‚8“dÚ+fí	Ê¤‰+zwjM¾GÌúSì}ÏÁù?GìßÃú\rÈ?×ÿ”êŸT0”0|ÉX:8\$¬´©‘Ñ˜rˆı6³€g[	!YÂ.(VÃ“©\"*ƒ£BŒŠŒ!ËUS›bf¯Yr_4D‰¡¼Ô(CT€€;†Ø\0bBÁ½ äC*Ô!™O‡\$:Ãa˜:É\0ØÃ9ì‘¤:€A+P¢“yô¾ İlIÁ>6:éH\"ŠLKÁ„Àu–r1b\$ĞªKä°é€H\nÎ8“¸èNœk8%\0 ¡‚—‚ŞÖ+n\$¬Ø±Ò€Õ\$K‘02W†ğ@i=jD3É™ŞˆPÊCA½K™NäÉ@Ï¤O§ÌÑ¡ ¨XP°àQ\$DÁÉjpĞC®{A÷I)CCaz–s…0¤§hkTD¦„Äm!¼\"†0–-RdÑ]û‹)%,¦¹„~™[3+.ŒÏ\$ÃƒÍ¢VnIyœCˆ>‹!äh0“0İ›ÔpİI!¼:¡PÒµÙTRVÏ§ÒCªC™†×¯Ÿ°@¡S¡9_EĞÊ#§(£–9’™˜ñ´clÚq–‘dKi‡(ÉWöÄJP!uY\$bÉN1×#é˜’UŒx‘›8¤Çb¸}m”!NüØ¦æá6OÑaG¶Y%âpÂˆLuª™C›?R¨+Î¤#I§LÕ}¨¸G†à7¨ØİŠt'3ğ®»õ–ñŒ>\"å¥”³.Êb2n&ÁÛ9²ĞŠ<ºé^Ç:šÌÅëYµ2ÂSYÓj¼8‚_Z{wZ‹t©¸uaSÁ³dÁï@ä]t£­ZGXŞW©x§íš(ŒB F áj·8Şì	á§\$—HÊ_ŒPi®²…¼6+îIÕâ=kÄ­!\0Wğ±ùZXí™õbTÌ{1hìú8L–r%U?ã%r”nNÕU<™,`WVÛˆEš-\$ıxµN#}È\"w(˜Í’B@İÑæaª8«Ac\$j*i§%˜’h+Sè¢o&<¤ØLÂÕi¤Å÷XßœS±Ò?xøö.˜Yœ?	I¼’¶ùŒ®š`ŒGÜàéÃVŒ,´¾ëC\$®Ì~Ëô|%UYFÔ¤2Â.@";break;case"fi":$g="O6N†³x€ìa9L#ğP”\\33`¢¡¤Êd7œÎ†ó€ÊiƒÍ&Hé°Ã\$:GNaØÊl4›eğp(¦u:œ&è”²`t:DH´b4o‚Aùà”æBšÅbñ˜Üv?Kš…€¡€Äd3\rFÃqÀät<š\rL5 *Xk:œ§+dìÊnd“©°êj0ÍI§ZA¬Âa\r';e²ó K­jI©Nw}“G¤ø\r,Òk2h«©ØÓ@Æ©(vÃ¥²†a¾p1IõÜİˆ*mMÛqzaÇM¸C^ÂmÅÊv†Èî;¾˜cšã„å‡ƒòù¦èğP‘F±¸´ÀK¶u¶Ò¡ÔÜt2Â£sÍ1ÈĞe¨Å£xo}Zö:Œ©êL9Œ-»fôS\\5\réJv)ÁjL0M°ê5nKf©(ÈÚ–3ˆÂ9ÀŒæâ0`İ¼ïKPR2iâĞ<\r8'©å\n\r+Ò9·á\0ÂÏ±vÔ§Nâğ+Dè #Œ£zd:'L@¬4¾Ã*fÅ A\0×,0\rrä¨°jjğCRô\\a–ÈÓ\\§5ìÚS5A-Am6'œ*İ²áBšj&@\n_£#N7§QlêõÆ)ˆÒ›%‘\nñÌ\r€È:BBXÙ'ƒ€ò9-t¾9L*¸»±¬ú½¿P25ã°ê„µ¢S[1Xòæ1Èø¡pHØÁ:0Œ SÏËéc”&B;à€B”(Ü\$IİŒ–h¬–4îªl\n¥&&-¼^ÉBÒû±#M­-ŒMÚ1Á*%vseÒ\r-0Ë‚5Ãeöø(È]\\_å Ñ€–Ø‰ƒa\rV‰ HĞšÏU:\$Bhš\nb˜8sŠc¶d; UÆŸº¡PÄ\r’ €K£xÌ3&àZ¢@q((%‰vŠóÓ#­6/¨Íê4À¡\0Ú¦Nc(à¶)ƒs’÷4Sœ2é-ƒuOTÌu\"t´MÅ Y/)û:œ\\/³\\ëL»E®ò€ÙaìV°koê=¯”›Æ7l¨îÎÔíZŠ‚ämÍ=FõîjNí\0ï:S½ÖG!¿§œËÂB¨ØŒím‡.»D\rŞÆ4¦¯%9ó¯téƒ @ Œ2æ4­›˜ì‘xAâ:4C(Ì„CB€8aĞ^şè\\“øÃ]Fázî£\rºˆ¦á|ø\r&0­^d.êÆKfâã|MBI=Èxƒ†ãî{Û ts­E©º˜–ƒq‚DgÀ9Ô€Ô¹š+»š’BLQ%8=¤õ°t{iî=çÀ]Ÿä|Á¹óƒàËìE8DhIKüÊ¥0Ş¢ˆ‘w(a”Ğ9ˆ˜†A¢TØ¶!‡p \nª#e/¡ò°®Í!Ó‹\0ÊEºNĞğs0¼îµ—ğoK`l4İŞ»T>Ø ƒKÎYâzÖÃIÌ#¬G–Ã&ªœ„VMQ©:#¼MKĞ OHXñ\0 šiÜ¡CP¡Õ4…\0‘‡Or%³§0PSLD.ı†³L‰a5/X2‡•Âğˆ„3ñIÀĞƒ×HrPËÍ‘ø¨ğ`Ú'åÀPòCq®yfnEªDØÃÒ@JXÛ¢B:ˆH92R‹cßÒºYKi(0¦‚0- ç‰\"€\\c=rI)A#.îä»”,O ¼Ë(EÜ˜†Òêètb.†©_šv<Ã\0KDd9‡–GJq5	Fp€¼&6»[!xG®ˆÅ{ÓcÃx°Á\r78Ô©«”µ«e½£q8'@€(ğ¦k;¢%²‰Ïp¡AÍ±®gdu@`çGí#ŠºàÌC99\$Sœ¢27‰¨Vy’H“œ%P¢PS\n!1£¦RO0T\n\0éÔ»\$æoŠGrQ)¨eBÓIy1%ä¤üË”ºNK^ĞDŠ+ihµ'v4 †TàtMaD³gœ7¿n„Õ–`ğA‡„»J¢  o•–ÎÚº‚T\r€¬Û½‡eVC•kDàÑÏãª†lj)”èõLò°fB¨T â\"˜BŒÒ›á‘?è6É°û²Á^Aª°6ŠÊ“b ùA Ëå3Db	aw³Ì¢`ë-\n8fÃ¨çpïàaBDíã†än3/f°×U£fµ’1pz©˜šÚèËÁ–VÀ(ÓX§ii\nQAuäNïšep­.ÑfæœÑw^S/êW ªLöµÅ&§\rS5æÅ\rCb¶ox†\rYØ¢jfµâ?E!á€A HUR¨9Ó€È))Q5ÓB7ô^›Õzïeí½Ğî÷é™Ü†!Éò¾rV‰ºŒ¶¸âzâÿ";break;case"fr":$g="ÃE§1iØŞu9ˆfS‘ĞÂi7\n¢‘\0ü%ÌÂ˜(’m8Îg3IˆØeæ™¾IÄcIŒĞi†DÃ‚i6L¦Ä°Ã22@æsY¼2:JeS™\ntL”M&Óƒ‚  ˆPs±†LeCˆÈf4†ãÈ(ìi¤‚¥Æ“<B\n LgSt¢gMæCLÒ7Øj“–?ƒ7Y3™ÔÙ:NŠĞxI¸Na;OB†'„™,f“¤&Bu®›L§K¡†  õØ^ó\rf“Îˆ¦ì­ôç½9¹g!uz¢c7›‘¬Ã'Œíöz\\Î®îÁ‘Éåk§ÚnñóM<ü®ëµÒ3Œ0¾ŒğÜ3» Pªí›*ÃXÜ7ìÊ±º€Pˆ0°írP2\rêT¨³£‚B†µpæ;¥Ã#D2ªNÕ°\$®;	©C(ğ2#K²„ªŠº²¦+ŠòŠç­\0P†4&\\Â£¢ ò8)Qj€ùÂ‘C¢'\rãhÄÊ£°šëD¬2Bü4Ë€P¤Î£êìœ²É¬IÃÌNÓšÂ‘Ó2É¦È;'\"ˆ’¢Î*\\¯\rÎB¦„ÑtLm\$‘Ú®ù Hé†D¼´r«p1JŠ“¤s#:O.Úµ>¼U][=Œuƒ3(J\níL’ÀêÔ&62o°è‹Œ”PÆ€HKdö[v ãH¾ j„¸ÍC*l†\\n‹L–CòøŞa— P¨9+‰ÚXÚUV\\ü\nvÄğÌ+¢!¸w€Ê6BS ¦:MØ(\r&P…¡.Â¼h0òÇÙát‘Œ#:PÎŒ‹2audãu=H;VR:dC(İ’#št¡âtkî\$	Ğš&‡B˜¦\rCP^6¡x¶0éƒºÀ?*b`Ø%.ÈİA£¬û¢Ñ¡ULÌ)s^¾0©Ğ¦†55‰@jÑµïwã‚¤…mª,w—P#®°+Øæ.Õ·á_Í£ªR0²4FPî Y6á¹TîÅû·nô\0ÑA(øÔ;ı„àpmLİÃñ8ÈÛÆ iÓÍ¨4Ğ7t‘¡#5„\"8@ Œ=ı¾rI\"’®‡‰èĞÊŒÁèD47ƒ€æáxïé…Ãzˆ')pÎæA|1FßxD{óëşã}³s“ô„8Mù´ÅMP@ƒk³uY™UÒè\\*>cA½SƒZªA=FÏÀÍŠ“ªñSÈyO0:<ç ô£ÖwÏd9=·º¤Ù’•\rÏˆªâ> ©XÆ©ô>¢bOCjtrêD†hfU922¡¸Ù@b®Ÿâ'E%û³¶jQJoµK;&>½È è¨(|²¹«&\"ºgCa˜ÏŞ_LÌSU„ù1ÀÂnˆQ•))è£³c¤áî,%_¨äîf¡Oå»…\0àuCÄ¹˜9’\n\n¡4Å|Æ2B‰)ÉHÍµ{ò|Íbğ.ä,•ÒBO›‚€\$  È¶N‚¢b2¥€„“Ù,~ÉA’ä7Zª%ŠDÜ›1¢øó\"©†ªÔ„\$P¨Ã[2)… ŒyË*)'T+\"‡êjáÛjed—Ó<CÌ¬AijY”2‹9ƒks=Ä€§œòRdà9’À‚nÄ4WC¨g…eu¯€ÒıÍ#‚4æ¤ÕÀvFÃË\"8©|Ê‡ô×Ñ¤¾•.ò\r‡&øQÛ3‡ïÚ‰Àf:¡³X@'…0¨O‹ráÉÄ–lX©ˆ¦%š°ØOIüD*FÆ”Èåá“uÚŸ¿r•›š‰ ×“×\$M4_ÎCEBM½(6÷¬L  ¦dˆ¥•²`ÂˆLD%t#Iy¡\n)KèÅtHÂ`RhÑ¯%,96”\":ÃX¯ò²é\"Pòğ†08Ø‘S\nV5d\"¦˜ÂhÉl­Š…OòØæDD'Ô\r'LfÑY–@ËÙm1ií’²v]fã,*6nÎÛFjN‚b\r€¬1 Z,ıŒé]Fu8“›ƒXpá}½1Ö¥¢šª i5,´aµùfÌÀd3Š0P¨h8µk%†sf­…œ¯¤5A²f3{RbŠ»—Ä°Ûé#‰Ô'\$D‘CªyôIâƒ“F?«<Ÿà\n¼B¤1›68}Â“VÄvÙ`ô¨*a(@³HaÔöCÏ¹Øšé£v—æÊV¸	\"“P×U;ßjò9#cF<±˜]'ÂD2L0ã*šŒá4\n0í±‹ØÙ-¶¿Q|ÙuöŸ±ØeÌ¤jÊ¿£ºé1ø—2¹W+¤°D\$Ã›İ‚fP#¡Z§ÜãZWp™úE ";break;case"gl":$g="E9jÌÊg:œãğP”\\33AADãy¸@ÃTˆó™¤Äl2ˆ\r&ØÙÈèa9\râ1¤Æh2šaBàQ<A'6˜XkY¶x‘ÊÌ’l¾c\nNFÓIĞÒd•Æ1\0”æBšM¨³	”¬İh,Ğ@\nFC1 Ôl7AF#‚º\n7œ4uÖ&e7B\rÆƒŞb7˜f„S%6P\n\$› ×£•ÿÃ]EFS™ÔÙ'¨M\"‘c¦r5z;däjQ…0˜Î‡[©¤õ(°Àp°% Â\n#Ê˜ş	Ë‡)ƒA`çY•‡'7T8N6âBiÉR¹°hGcKÀáz&ğQ\nòrÇ“;ùTç*›uó¼Z•\n9M†=Ó’¨4Êøè‚£‚Kæ9ëÈÈš\nÊX0Ğêä¬\nákğÒ²CI†Y²J¨æ¬¥‰r¸¤*Ä4¬‰ †0¨mø¨4£pê†–Ê{Z‰\\.ê\r/ œÌ\rªR8?i:Â\rË~!;	DŠ\nC*†(ß\$ƒ‘†V·â6¡ÃÒ0Æ\0Q!ÊÉXÊã¨@1¢³*JD7ÈÙDòd`0£é\n¬•%,DÔe\"±Dê+B½MĞæ1Šjò=Ò#È!Ï/B:¾€UH7­“()IÍX1©Sº+V´0ß\n¬)’7 J2òÒ6‹c³€R:+ãp¡xHÚÁ‹ËŒlz*ª ÑjjãQÌ¨™1©ø‚1ÍQ¤)Œ©Ù\"¯¬¨ŠœµR`Ê,í€ò# ñØ4Ø‹@Ml­”2ßbÃ„Fƒx]dØ˜dØ6C¬SˆĞ£Ï)B@	¢ht)Š`PÈ2ãhÚ‹cd0‹ UáyMH«páà S>Ê´i»M<UŠİ›)MJ ÊÖ	{pƒ#º8‰‹#¸äÿ`ªšC¢E÷pY«°	:„«õã\0ªØŠ`Ü:Ø N¦œêª„:ïl-j©®hÑ&¿ºXÆl³’-em[d—¦Ê0ºBÂêI[\"ÈÂ`¦‚£ùC£4-SŒáµ)Zşˆ¨iHxÂØÌ„C@è:˜t…ã¿lFò¼Œá{\0ªêœŠ…á}à¿XxŒ!ôe³ÄíÆ3œpİ¯¤°œ*”¶5£‡­pŞ\$šòÕNº´îÄÕáÖèÉèÎ¡pAÓÊWY×v—iÛıÀÈîs¼wÁ¹ß!ó\0¥  \"*Àø\$’E|ØCËy¤¨áR°J‚‘A'¡	«D‚RJYâl%•~!×»‘ĞeMœÎrRaª1ÈqÊ“\0@l^æ©‡B¸@æŠZZ†á˜Òœ‡¢­Xf3À †s°!Øt\rŞô’Ó;aMl`Ñ@‡”«Ö\"g­˜B¦‚£zÈt(€ ACzF‘ dıHSFl‘â@Œˆª³)Æ›’°àj\rQˆH¹¡Ô\rÃbAéj”£®‡\\b	V‰ş*pÜa®Ah4ãE\0ĞŠ ¨iî¹b’¤ÖÃŠr¡¼5¶p†ÂFOêP¨3B:¤„ª8Tãv%q\0006™äâbÃÃŞ)æ¯\$„•IùA|t’#õbST#òB\$¤3!D%,Uù¥DÄÑx>ìÄ\n37E\$§.×š\n¡+sçaZ¶ÜRZq¹IÁÂl—Ô™2c`O\naQ­7×C9è:&qù%—Şmæ<gk)Ö‡YÒâãÑ›6A¤;!¶¶EIi=ÙÁ¨T\"Pá0u†\$¥¢’ŒWA\0S\n!1ğQÄMÃ	9'd®aPŒ#y×›¤˜º¶:'›JSáA¶¤êrS”_äĞ&†óQj¹!«,1º“C\"dÓŠ‚‹Æ²/ò¬M]ZX1\r\\1'\\kkY!šº·\$d˜C`+j1Ç\0Äfà¥%H\$¦\r¢ãŸSQA[(ä®/‡êHai¸O|—1 ¨TÀ´ÕˆKCa…\$qÈá×{Nj£E«/&EÒ.FQÌ~\$\$œ/CpnÌ9‰UvÎ-Ó+L¥Xí,Ú”Ôd€RZ1ÆT÷RÃzŸåRéRÃ]m^\r%ë@Ab‹ËÏW`”“áB›YâKFw¬ñ ¡AMù˜3å,Ã<®U´«Ó\"›RÅ02\niõ£„4‚½TàxFVá5¶î55­œŞå6.	¿ÖÁM£0Øæpr";break;case"he":$g="×J5Ò\rtè‚×U@ Éºa®•k¥Çà¡(¸ffÁPº‰®œƒª Ğ<=¯RÁ”\rtÛ]S€FÒRdœ~kÉT-tË^q ¦`Òz\0§2nI&”A¨-yZV\r%ÏS ¡`(`1ÆƒQ°Üp9ª'“˜ÜâKµ&cu4ü£ÄQ¸õª š§K*u\rÎ×u—I¯ĞŒ4÷ MHã–©|õ’œBjsŒ¼Â=5–â.ó¤-ËóuF¦}ŠƒD 3‰~G=¬“`1:µFÆ9´kí¨˜)\\÷‰ˆN5ºô½³¤˜Ç%ğ (ªn5›çsp€Êr9ÎBàQÂt0˜Œ'3(€Èo2œÄ£¤dêp8x¾§YÌîñ\"O¤©{Jé!\ryR… îi&›£ˆJ º\nÒ”'*®”Ã*Ê¶¢-Â Ó¯HÚvˆ&j¸\nÔA\n7t®.|—£Ä¢6†'©\\h-,JökÅ(;’†Æ.‹ µ!ÑR„¹¨c‘1)š!+b Ò9½#cÚ¥„¼7K²ûå1L(ğ:£pæ4ótÊ-m\\†.\\‚Ån¢]-iÚqB1¤“Hr}Ö(f¹L×§°“kÉkY0ƒAÓøJ2AˆLdĞ£j\0!hHÔÁª6æºLvÁ‚ßÒ;™¯Û¡<&,æ¹iª HHúÚ#j«H#i*GÂÍ}<Âµ¢^è¥8\"	­y*XH‹X°v¼BJ£ij<½‰@t&‰¡Ğ¦)BØó{\"èZ6¡hÈ2UöU¢,>9ƒcÆÉ!Y\$È>×-TL•¡%:6¯TejšÅIZw0lê[ƒ'p:V–ÜÄ¨X©0x{” ÕäM É­g‹QRŒD„2Tz@¹´%\$šÀğ4…!ahÂ2\r£HÜïæò—Öuˆx0„@ä2ŒÁèD4ƒ à9‡Ax^;ívŸ¨êoÄ3…óh^÷Ìƒ¤à7á|˜!,Y:ã}!3ãNœ1\n]´™z«P¹ózä\$ôŒ×Êš¡Ü» ™´ºŞ»¯ì;Ë³í;^Û·êNø]¹î»äÕ6MÛŞú¥ïôRJÄRIÙGÂpÙªl×ãoÜæ£O¤ò{Up× r	íÉé0P:¥ø˜¨4=£Ç½N!\0î4ƒ`@1=£ƒ¾3<ChËN#4Ø9>ÃÆ|C˜f¯¸6ğÎÔŸPi @³Ú—° m|2&ÖôC`s@EĞƒ<®(ÍqOxQ‚\0 € ,šejÄÂqjo©xÁ\0pA¤;>ÀÊß¼9?GÉ-Ÿ0Ş}`ÄïÜò>3¾{b+\\gñÿ‚¢°nÔıŸÓş”àw\r¤1ÀÆ¢Û#ï=±`1†ê{,xä0ÂsR£\$ÌN¹%Ì%Ë±&:…«•nGZ0'ÁË^¸\\é¯-Hğ ÂHQ&dÕr2DRÌ2|(6LÇù%ÌKĞ¡¨;øGa¶'¤´ˆ.B@NÒ³9¤‰BåN™ Òl“.I€5Ùí4(ğ¦\$©\$¤8ÄIçšfZŞ2KÉLG£5äÔÈgîtÊ¤F¹‘òD¬åZÓà‘¡*B’L@Ä²8ı˜1Ôø ÌK0*T©sNk{	&ƒ3cÄèZ5Rén\rsNbahH…3…)C'„Û9ò!tšJ_8r}À­FœÒz£Ò¡%©IF—×™\"Q¶yåñã”ò TM!k3²¢`­ĞA0-jB§“:É#¡¨Wå­Š™#FQr(”ğÅ›¢vMdm/æL#R·N\rÉ:m1²^\\•6–rd†ôxñÉ/YIRkÊlnˆq1é‚ÒJa(ú2!ÄBÁSÃV\$Ì2À\$Ô@–®EDy–1”z·Î5“Të1®%§@N1¹Ş³\\tzªµLDƒ*ºFRvÅBYÔ¦õIí ";break;case"hu":$g="B4†ó˜€Äe7Œ£ğP”\\33\r¬5	ÌŞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dŞu'c-LŞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6şA»•«ÁpØ<W>do6N›è¡ÌÂ\næõº\"a«}Åc1Å=]ÜÎ\n*JÎUn\\tó(;‰1º(6B¨Ü5Ãxî73ãä7I¸ˆß8ãZ’7*”9·c„¥àæ;Áƒ\"nı¿¯ûÌ˜ĞR¥ £XÒ¬L«çŠzdš\rè¬«jèÀ¥mcŞ#%\rTJŸ˜eš^•£€ê·ÈÚˆ¢D<cHÈÎ±º(Ù-âCÿ\$Mğ#Œ©*’Ù;æ9Ê»F¬¶Ğ@ÂŞ qğˆ ¸´XAŒøİ>µªe\09Oã(ğ¬Ã˜Ò7Ñ©¸˜ »qû90‘œ¹\"\r’0ôÿI˜%%4’Ä%\n¸àèB(Úú0ƒĞôH¤¦a“CRB«ÎˆhÈƒ&ƒ ×ãƒaØ¶û­ğ(ÁpHZAˆ%®#Yc#ĞìGğ`Ä˜©ræÅ¾£\\«#£Àb–-cmw	m›şş NíZ£jS“½NøÛ£8ònò6'Í®¶\rƒ%Yb3÷åı¥^ 25u‘Šß­«>6cEæ#ãã.-‘c8Ş:\r¨%İ\$É!Ğà8Cl¦-9èò.…Ãh\\2>äí‰(”±Í3Q£5£xÌ3(SKµŒuêúUo¨¨7µ÷ëF´hê1Œl(æ3±Î’3®ã˜XCÊ`3ßĞBî¥×ãjî:«!@æ°\nå²EÚã¢›ŠT¡P2{Ü-\nînc!G.t@x˜\n@Ì„C@è:˜t…ã¿\\NûòÁƒ8^„é%:Qãp^İÓ|÷xÂ8û(Ö0²HR”Û\rRøé¹²³¨éXÖh;È]\rC’şğ?‘ƒaD•EJ‘ûSÑt7QÕupïØrİ˜]Úöıõ£rwå0Ú\r³Íã§ó\$fˆ¹¹'F\"ó`F›ÉFÁµå<ÂRC*„ Á6§zŠÈ@g.E\\ì•£Xâ	Cn!¸4œcàfÉ€cwŠ@sj^ÑA™%~C3âC\r¡µ6ÆÜÛ‚‡ÆhàÓ¼d\0c}g\$4†ØÉ¸N.ååÄ\"ò4Œ—ÉõŒF@Ï°fFUÖñœ3Åí˜·‚éÁ\0P	B2£ĞuALEaÌ“p†¤T:rdØ#hm¡R¿CM‚œ\$,LcIåÉÆ²‘H)1hu´ÁTfiwIÈqò\"zpCh\"A¤3ºcÑbÈaIğÙ7'ävŒ²aL)b`”3¨Y‚à@ØÚ¿<¯zc‚à|Ã\nF¤àÂ|P‰Z3ª™)ò”ªJ9Y}9 ’†údÌù‚0Ğ\"ÂnHˆy4à€2%£\\…ÈB¿3G¤êaJPfAdÊ»\"5P@ci2à\$;\nœaŒG\$X5“òÂ˜T&	à‚JÃY„9ÁÎ#«4îyÊ1H9OL`Ãğ¶^Q?sşUŒÉİ›m:\\ ƒvÒS½RĞ0¢	‘µ5¦Ğ˜„`©\næ‚°\rÁZBÁ„NiS2P®Å²µ%Œ¼œÖdsBŠ\nÚ3,½CVãĞ©Œm6&ìR»GîV];¯Šò³×ãœRQ«¯¥¿Ø‰˜+¢A¤1ÑØxLi°l ğI˜ÏĞÌİ‘y7ÕH‰\$ò”ö›ØU\nƒ…æ§ènõí_‘eOd™{\r•éÛj·nOı¼b–úÜ!»‚÷Èñ \$D\"äâO×ÁÛ†”x½—Ô¬x¸i³à(¼ÒŠT—’©!Œ4ªs¦¦©ú_\nˆÑëÎ¦cI84Ùë†óEg9‚AÀåQÒ&,É%r/khP­ğô¤ƒ}If2}<ğ™‚m‰ï;õ\08°¶•ÃÁÌéS@hÕ¥;xïÜ4oq>&=fZ%®U…šJ´<[®H\"«]l2cuW`k\\a¸øBúwÂš\rá¬µá¼;XT½ğ9á”";break;case"id":$g="A7\"É„Öi7ÁBQpÌÌ 9‚Š†˜¬A8N‚i”Üg:ÇÌæ@€Äe9Ì'1p(„e9˜NRiD¨ç0Çâæ“Iê*70#d@%9¥²ùL¬@tŠA¨P)l´`1ÆƒQ°Üp9Íç3||+6bUµt0ÉÍ’Òœ†¡f)šNf“…×©ÀÌS+Ô´²o:ˆ\r±”@n7ˆ#IØÒl2™æü‰Ôá:c†‹Õ>ã˜ºM±“p*ó«œÅö4Sq¨ë›7hAŸ]ªÖl¨7»İ÷c'Êöû£»½'¬D…\$•óHò4äU7òz äo9KH‘«Œ¯d7æò³xáèÆNg3¿ È–ºC“¦\$sºáŒ**J˜ŒHÊ5mÜ½¨éb\\š©Ïª’­Ë èÊ,ÂR<ÒğÏ¹¨\0Î•\"IÌO¸A\0îƒA©rÂBS»Â8Ê7£°úÔ ÂÚ À&#CÔ½4ìr==&Â²‚g'Œ£Ä\$½¬°³Ö3.\"ŒƒHèôB„M9È\nÔ&¥c¨ÖNª-CjrLct„“&Cª2\$Ó3š<¦\0S ˆZtxjqÄÊ'(¨ÖŠ£“n¿:ë‚\"‰ 0<ÒË#C\\:C(Ø=l¤r:Œƒ­^&-XÓ5¢]vÕPh…YW&ƒ“½‰ÚÊ\r©kÆè‰Ğš&‡B˜¦cÍ´<‹¡hÚ6…£ ÉS­)+@æøÃ±)“7ŒÃ2Ò7«¢PÆÌB]\\:¦HŞÈÏMĞ@¾£Æ˜c5l\rƒxÎ„ab9*F„ÀKB\r¨Cn2…˜R¥¥;.\rwÚd–ŠŒ[Â›ŒÒ‹ªŞ„ÉŞƒ–\$1Ë¨¢PˆÑVŒÁèD4ƒ à9‡Ax^;êr‡œ%sĞ3…èğ^ø@Ê‚Ê„Aö¸7¡à^0‡×´(ÅŒKÖ%d@ôÄí†8z[:´)›ôş?Òğ8Wc+ÿ hZ&¤iZf¨ú–n„jº¾²7k2Ò=.r	-[0Ü›6Ñ*È#@ßBLôÆSŒ¿)FTä¤n`4±T\no\r#6X41ÃÇ¯(#»/d¤ì’Q˜Ï<…0gø.ıáVN‡ø³2JÑ±ÉŠ:uhÉØ\r0L,\"Âßq#ªKtÇôòıÀ \$\n	Âu2Ö®Rt)J[	-e•z<6hêL™•2æeçpä	¹¥>e60Ğîàù(1Æ”‡22ÁØÉA{„ê’Vß’„æ1’V:ÚA4)ïğª½Wó)(!)… ŒÿÒA\$À_,Æm8 yµ[+²è­\n1˜m«˜:†ÔñNOH@ÕEWíS)='äæ! ƒHk(T–„’LA;PL9‘çPi	º­!Ô˜°ÌyÃk5qìæ‘çÀÃc¬3DÖ²à€O\naP§’‚ŠI'&'¦\"*Ä\\î9B.%<I¢dNÕhk*<±àÌIB… ÃGÆlLó\r(e	BÄ¦BdJ`€Ë0Œ©9P‡\0ü:È• ‚÷j©õ?œ†L²S)‹:?E‹5ÉÜ¥P!¤–„YºR|Ö%l2œBøP	kJSJ‡\$JòJRˆ|6°ÆZC,²ğ; ˜øgã§w¬U3Ğ0âb†L`*…@ŒAÄóg‰”Ï`Ì¡7K ÌÃÒ‚;uFu®SL\\“¥\nÁä•XH@PRUÓ¬TütÚfML”U…OÑáA.ÉÈ\"`ê`É(n2á…Ü‰È‚`o—a´ôóÙV*Õ7ÇH¢°ŞH1¤LAM}Ï—r²\r /F¹WW†à©DÊTÏ¢&‡;”¡„6R<¢+š^«‘m0:ô„ïÕ\0@‘s";break;case"it":$g="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†ZY7Dƒ	ÚC#\"'j	¢ ‹ˆ§!†© 4NzØS¶¯ÛfÊ  1É–³®Ïc0ÚÎx-T«E%¶ šü­¬Î\n\"›&V»ñ3½Nwâ©¸×#;ÉpPC”´‰¦¹Î¤&C~~Ft†hÎÂts;Ú’ŞÔÃ˜#Cbš¨ª‰¢l7\r*(æ¤©j\n ©4ëQ†P%¢›”ç\r(*\r#„#ĞCvŒ­£`N:Àª¢Ş:¢ˆˆó®MºĞ¿N¤\\)±P2è¤.¿cÊ\rÃĞÒ¶Á)JÙ:HÓÌÕ5©\nŒ-\n‚Ø1)²œ«)Œ£Ä\nš¤Z\\ÕEB*ô‹NÌS\r\n»ò9€Pƒ\"­Úû#&épŞµ\$£ƒœÓ¬4',ƒ²0Œ©šÌŒ\0Ä<ª€MGR\nˆ<ÒÉ¡xHÓÁŠÁ/«:Æ7#¬4'Î¤Æ6¥pĞƒ<P-}Z/Â(Zœ£ñzü'Œìğè³0ÊÆ·køÜÎ/Ô˜Ë]Œ(ø@µÙ‹]IQ¶}xZ’:¨–Œ(Òv7B@	¢ht)Š`PÈ2ãhÚ‹cÍì<‹ P¬Õ7®ô=@\r3\n69@S É\"	Ş3Î•\n°L´Ò\"°ØŞŒPËÄc3¨àÙ=¸Ac@9cCµÚi-'X\rÓ P9…/ã	Œ¸dr:7±‹r’ã˜õÆ–ŠŒ£¼ÕŒÒªPçÉ˜0Y6~š£C@&D„3¡Ña˜t…ã¾Ì\\:ƒÊ´áz*½‹cv’á}¸àCpÎã}ˆ'p:B”Ü1@Ã“3¢,‰Iªb‘P£zî*š³ìÍöÈñHOŞ¯¬ëzî¾:l;Ë³í+[m›pİ·KÈ¬Á×„J0|\$£‚AEo›ôGÃBòĞcÖà¾³øÃ@¢Éh™Á°ğ<>2ĞÌÃÁ\$+š>•´Ê¬7„Ç¹¤£º>.ŒË¤H¥0ŒÜ«ããùA‘ÏÌ:\r\rGDÉcs©Õ#†ÄÄÅûÒ)Éõ!7a‰Ùÿ'ËÀ’H‚B€H\nÄ80ä\\8((À¤˜‡3æ‚A%¡’(ÆÓ\r	š\r&påƒ¡«5E8ø\"PŞÒDC)	iš²a	ŸÁ\$¯ò%PfSqúF¤1¿Õ`Úú\$10Ü8“†Ñ{Ç\$¡)… ÁL\r'°p·I€l&F*†”cÙƒ¨\$¾»ÓB‚#¦T´=”XXJ\n)\$,<™b£Oy\"ª5şC´„ªP! µ¦´÷TÕ¢a%lŒášˆv}ŒóDHy\"5˜€O\naR6…(Ö@â\"`IQğÈr-\"c‘1HK øIğg a…Z%\$ÄÁâé%4lp¾c\0S\n!0 Ù^‚¤yj4™C…¦|4›’AÉ‰Ó¢¢Sª‡:LÀÓ9# îç‹áX\$Ø97)í;ÔPoJgâÂşG!„a©¦H”QVÌø\"ÎH”£b\$õ7	†‡2Ú T(‘»%¡h‚\0†rƒ`+”d5ŸKl…}MX6—’öã#AÁ´”ÒË¨TÀ´%cr^›Ñ-Re¤˜NSèz½K1‚§A÷ºÄ	Í‚s¹DLQ‹%¨¹\0¢ğ^ƒ0y]ÇI¨ #’´0´Ö´#²vÖ›\"-t¶ºSrûLŞ6/’&L20“\$+Î\róVšÄCKYBe‹©=6§ÂıB‰‘~0TŒPš2¢ÔmL[.,! ¦¢C!ÌŒ¶MSËû¹¶\rRVëË·Cvæ¯Öú¦†«=~&ña†ğ";break;case"ja":$g="åW'İ\nc—ƒ/ É˜2-Ş¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ĞT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Ş 8'cI°Êg2œÄMyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼ş†¦s­“=”×O¡\\‡£İõë• ït\\‹…måŠt¦T™¥BĞªOsW«÷:QP\n£pÖ×ãp@2CŞ99‚#‚äŒ#›X2\ríËZ7\0æß\\28B#˜ïŒbB ÄÒ>Âh1\\se	Ê^§1ReêLr?h1Fë ÄzP ÈñB*š¨*Ê;@‘‡1.”%[¢¯,;L§¤±­’ç)Kª…2şAÉ‚\0MåñRr“ÄZzJ–zK”§12Ç#„‚®ÄeR¨›iYD#…|Î­N(Ù\\#åR8ĞèáU8NOYs±ùI%Èù`«–`Pˆã9-´’Ap8İTµŠX9Uc(ğá\rÃ˜Ò7×15—(áG,Çä2Ìå±ÊHª¡#`Q+ùDª‰yQÉÄJsÃ¸s“QDª[Vâ‘R%\ns“et]‡1H\"C A>ªö³£r<NƒXa b§¥!8s–…š]—g1GÑÑÑ˜ĞëÉ[b\"òE’· t%ÁÌE?4¬U¯%¹\\råÑÈ]/J	gÚ'1n]œ…Ù0IŠ2‘˜\$ç7ÍöAÒ˜â”Ii:Y~ËM²ˆœäy},EÒ”ó=§³Øu1ÁÒ0cÎÜ<‹¡pÚ6…Ã ÈªXøÚ?eƒ äÒ4Á\0Â95ƒxÌ3\rƒHÜ2ÄÊ]­|]PÌØè¨7µãhÂ7!\0ë\\£ÆÜc0ê6`Ş3ñC˜Xİ\\èÂ3Œ<PAÛ·ĞÛÅ®P9…5õÓÉ\\­†*50t3U£­t7á\0‚2w|Xå×Œuåt2A\0x0µ Ì„C@è:˜t…ã¿Ü>§ĞXÎŒ£p_\nUã¥vş>‡ÅpxÃ>q¢ì•ñnG\n³l\"pOŸ ˜–8‚ ¦5È­µHXW€´:Â3„ R HÌˆ&¡„­\0sDH‘‡€à\\\"%{Ï€4>'ÈùŸCê}¸;¿äõŸ¨r~ïåü+wò®•à/EDÚ\r°m!ÒÀ•W o_Fğ9 ÖkJAiÅ†àéàh‚â’b|\"O2Á\\ífÂxS\nÀSÈ5„1¿åx¹µuˆÖó”Z_A„3Bô4è]2tÎ¡Õ:Ä\r\"N!»\r°9†´9‹a¤0†Àæs‚2FˆÙ#¤ AŒñ ,…˜\0\n1FhÕ„rCÄAQ!äÎ[ˆ(¡V“š±\$Ã		W4»4a\r^8¹MÙ¯6&ÌÚ›pÊ¾èr†èã!t3+]Pwœç2A8GnnŸ\0sDÛ c‰ppw¦Á¢0ä¾ƒ¹Åa¢2†ÎùŒ”F°1†œãh¸Sjtƒ\n †ÂFš-èA(¥¼cåÂ5ª´ÈGRE`	­6¦ñ+æ4¶Dø &ˆ²y2ÉĞ“lhCZ,B~”+\"L9EK˜±SQL˜A\$‹—Jú5Èe	èÆqMÓ„!ÔÜ¡Ì‚ƒkÒˆïv `Æê”¢¨€ÜÀ Â˜T#ä˜¬£PI¨&â†–éEƒLâü”Äœ …ÕO#Br ‘hj¬t\nZšê}>±I—ÚÊ¯\n˜¥4ôUçTü\\¡À€)…˜4åÑğ`¨fvñ];zİ\\Ò5h1“®åà¼„’§¼ø’6²Y*]Õ]ëÆ;	±h9„²£»ğŒˆ•ÛxîÀ’ÆXÌB;ÀA¯jú¼·ôßkØ‚~\r€®»†ÆÕb|ÚVÖÉÃciÎv4œÀpƒkÎC4IÛP¨h8UÏf°=˜îA›\$Ğ|A‰Õ­RK÷\$Dæô Ì	X»,¡•2ÂhMŒL¼:h½N²q3K”\"XQã9Ì’2ŠXA*JI²‘2d,§#¹.É÷%â_|Ls!šY2ær/ÏYí#ˆª’‚zOÇ8µ1ÅèTg‘ 9„ğœiÆm“²–V'‡0¸_Ù]PãuJGËWKâõºÈæ.ÆëùcY8ìÃ˜‚T³éË­lrÌİC	ÜQ&±Ê  ";break;case"ka":$g="áA§ 	n\0“€%`	ˆj‚„¢á™˜@s@ô1ˆ#Š		€(¡0¸‚\0—ÉT0¤¶Vƒš åÈ4´Ğ]AÆäÒÈıC%ƒPĞjXÎPƒ¤Éä\n9´†=A§`³h€Js!Oã”éÌÂ­AG¤	‰,I#¦Í 	itA¨gâ\0PÀb2£a¸às@U\\)ó›]'V@ôh]ñ'¬IÕ¹.%®ªÚ³˜©:BÄƒÍÎ èUM@TØëzøÆ•¥duS­*w¥ÓÉÓyØƒyOµÓd©(æâOÆNoê<©h×t¦2>\\r˜ƒÖ¥ôú™Ï;‹7HP<6Ñ%„I¸m£s£wi\\Î:®äì¿\r£Pÿ½®3ZH>Úòó¾Š{ªA¶É:œ¨½P\"9 jtÍ>°Ë±M²s¨»<Ü.ÎšJõlóâ»*-;.«£JØÒAJKŒ· èáZÿ§mÎO1K²ÖÓ¿ê¢2mÛp²¤©ÊvK…²^ŞÉ(Ó³.ÎÓä¯´êO!Fä®L¦ä¢Úª¬R¦´íkÿºj“AŠŠ«/9+Êe¿ó|Ï#Êw/\nâ“°Kå+·Ê!LÊÉn=,ÔJ\0ïÍ­u4A¿‰Ìğİ¥N:<ôÇYİ.Ò\n‘JÇMœxİ¯šÎ““‰,‰H«0é1\$#”Êêğç5 ),\"ª¬Ò‚¿dW6z,»œ¹: m:S¨<z¥;õ-[J*„òÅKÕµ?]Ör5É)ÍjATUN¢RÿÏPÎøÖqÙ)Qİ}e9¨ãu)2¡(È’Æj}KOÍêY½! j0¨õiÀR|{\\¬Z[d>/ä…	QHåçiÛ±IÁµ?;ÓmšrøË×¥úÿÄù4\$ªì§T¹òoq4!ÒfÖS²‰|¿–òîë`rÒ•!Q\n¨ş3)»¯-9‚x5®r½… ;C_80eæÇ%áÖÛºîê†ZA’au ñ{ËuÁ‹¸š«f PØ:\\2tı\$ùRo>¤ö.Ñ{×µ4h¥P–Îèİ§s“C²)WŒ;zcÊ’‰\\ašªWÈ[ÿPØyuƒWó5KYİ:Îù]Š­Üè‹ŒZg‰~Ö’·NºÍX\nVp÷A¹Ú‰Ë^¾5Jœ©(õøö4÷ËâPP“ô8Ï0# Ú4Ã(å*©şÃªöš»]KøË3Zuc[ç<ÿ¼‘öÁI:ä€£ƒÀÂ@r¡˜‚ Ğ p`è‚ğïÁpa}ÏÁùàŞƒ8/¡¸†@Şƒt\r0¼‚ |íMÛÓ7DxÀµ*eÁà/ ùmõ¶~M™v;å%ë1ô£”bÈzdyæ•Q!\0[2c])+hR‹ZÈ5­1Í6w8êÍ;‡]ä+¤Š‡Pz€p	3w¼¶A‚J\nAh1 ä„‰÷¿å	¡D*…”<HVáœ,E~ª9Ì’7b^ Ä7pYT«êXÑ`ã¹TuÁ×>/v;GFïÜÉâ6	m¬)âJuÍÂü\$¤y&´tşnâ9&|*V%ÀVb‚!Á9)ĞõÀc/.Û1NNáQœeòÕ‹Â}{lª¯—¶€aò·ijU ¹²Nçb|É6pI=N˜–b•g« ß°f*’Œñ,îéY½ñİöKrxu¯¦A¾š…%æÔ\n\nø)4êîr Ö¹4SÜà!±¹Ì“µJYcy5¨½Y(âNuÍK¢K©Ï‚¥ê6‘\"K=%+)Q—”ˆ°1ãîş¨LÊ\$³€ÓJ)ĞëÜ,fœë½:‰ThC\naH#?HÈÄPûÄh³ÙÊ‚\0Äc¹»³æƒEÚ7[3aA§:a”öhÛ£ªASú”³Â™iU?:g)Y3—²îĞé×UÑZPÉ§Ë)¥j'pb¦P¢J8ÅÙ´ ¢ÌwéR¹RzGG%MkU•ko)öÈWäı+\n¸”“øãX#şö,‚ÕdÁ^b~xS\n“B¢…Ç`9O¡.¥_ÕXU;Å_Då%\\×&É)XTt&ÓS0b 1G·êŞ†7Häè«ÑšéÑÆ(ÎœÄØ(“ùh‡3Nú–úe ©’[²	tG+ÿ*±‘b„`¨¢™¤ÎÊ­òr\$£¢gµêUìâ’®íû—ì!ê¶ù`®\r:Ë·¦A+y¸SÍKª˜RÌÛ°l:™V¢™´µ0Ss‰Ö–-)VÑ~3şGc¶Kí³+ŒM@^\"˜…É´(ÛZ)v—’i(7Zr1Ú¾6hÊêùL-–[KYs)äË™AìD»_ÏaÁl\n¡Rªƒ‹ß—0}\\j–]0¢KEYQ§3ÇŠ§ÛÙwZÕ¿_3¢„Ò¢ß’r ƒÂ	§!œrk—£¯O\"¤?TK>ˆö æ]nÌeÀæ.{=qÇÙ›‚=]mê¶‰úu*©Ï‘MÛ/o‘ÒL4›VR‚La1äY£×˜Âu´œá\"‰w³–ƒ(—\r_’ˆ”ÏF\$\$û8§íÙ´5ñ2ÊUò9ù™—n^š\$Kg…ÈÏÍİw(IJêj3P,}~)Ú,ã°òƒ©vrŞÆ­gÖcLˆ\r@-~=MüÄ°³*Ûe(Ì€";break;case"ko":$g="ìE©©dHÚ•L@¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJĞĞøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØVAá*zc±*ŠD‘ú°0Œ†cA¨Øn8‚k”#±-^O\"\$ÈÀS±6u¬×\$-ahë\\%+S«LúAv£—Å:G\n‚^×Ğ²(&MØ—Ä-VÌ*v¶íÆÖ²\$ì«O-F¬+NÔRâ6u-‘tæ›Q•µåğª}KËæ§”¶'RÏ€³¾¡‘°lÖq#Ô¨ô9İN°‚ƒÓ¤#Ëd£©`€Ì'cI¸ÏŸV»	Ì*[6¿³åaØM Pª7\rcpŞ;Á\0Ê9Cxä ˆƒè0ŒCæ2„ Ş2a:˜ê8”H8CC˜ï	ŒÁ2J¹ÊœBv„ŠhLdxR—ˆñ@‹\0ü‘n)0 *ê#L×eyp0.CXu•ŒÙ<H4å¤\r\rA\0è<\nDjù ÂÉ/qÖ«Å<ŞuˆzÃ8jrL R X,SÜú¯Ç…Qvu’	š\\…–ìÙ:ÅˆƒHç\râ¨BPpİJRÑ\r3KŒ£Àè2Ã˜Ò7Ôª	ÖU)q:Â’ìA(J¤!a\0ÀeLÔÙÓšøu½çYdD¤ÃETjLÅ„Áu°@@„áyE¼É}“G1h9[U•/1NF&%\$şŒŒ1`Úå:PP!hHŞÁ¬üY9¤½EBbP9d©ÖP[ŠJ—³b‚0¤!@vuyÖT¶…âôY±ä¦vHgY<Â?I…XÂ–Xl¦\$jÆ4Äã¥¥ÎŒuŒIÍ«ÍdÕ2ÒeŠ¾¬ôÚXMèPtu–Ä t¤\"Øó©\"èZ6¡hÈ2/MËw[r=‰b„ìŒEÉT˜6ƒ“%¤¡u«4{DÕ¹Ga˜Sµe«é6AB Ş7„hÂ7!\0ëR£Çc0ê6`Ş3¾£˜Y1\\hÂ3Œ/¨AÓfœKê:Ôa@æÕ[û7À°ÄS±–.©jçéë“&\nƒG5Ä#52:ÔÏ°@ ŒƒkëóãQSx@!\0Ğ9£0z\r è8aĞ^ÿH\\0ù¾|'	á}HÃÔØéSÁxD~°³êÁà/ ø ·£6!HI®\\KQ®A BD»½o\0ó¶TbÜlí¥f¤Àš†•aEÍ#€i{ˆÅë½—¶÷^ûá|o•ó¾îúßhnAà¹ø?'ò¨U¥èªà’C‚•\rª:@œHe 7®èâPkC¥ ÷ƒpt€¢”rÈa’ã:d	Tr¼%Vºã&Šµ ”‚‡c~ê pÒÀbC‰”9<`å×HaĞ…¹'	³˜sNqÇè¦˜ƒBRq,8WHa\rÍ#C¤qK¾5@\$ŒÎp(*€¤Ó'QØ.Qä/Ål¯˜\"ÈG‹:V9A\rTC¨ôÿÓˆÈ4ŸE*Ã*éE!È:\"\$ˆƒz\$”Nh;Íí&^ã§D/d9¢Ç&éĞlS‹a¸8:ÀAá(r]!Ü4ÆPg| ‚AI„8ÃÈ°O(U¢A\0C\naH#aÄÄ	ºÄ¶:ÁQIÙ‚=+ÂŒ”6‚`( F…á\0:ÄQÓ¤Ì¤¦XàI,'\r… µª/äÂ‚…PSM0ŠG‚™Qä“H\0PI#¡ä7‡T:WJ#Dª’+OTB÷ˆuD3!ÚòáËÖH41¹¤7&&º,š(ğ¦3^5ÊÔXRcÌ!X¬5â^Á0]\\MÕsVÅ4§•€é®BÄX#Òr¥ÛÕ¤NŞ”T:‹Y˜¢ €)…˜AŠu)*\n€;D3»!œV²ZKéŠFöµ½7Âú¬m­%=çèÍ‰‹hN¤¤ˆJ­õXíÙù?tå ;ó1qW·=ÂÄ€11-p®qD+zèÆ£@h®dª9LÑ›KŒ®™ÕÓº·†¿\0 †ÛC`+¬³Ø5©„öC´¢«S%ÄÅPÒœl\\(!?¡ÀÚò\$ıtÁT*`ZÓÒü ŞA`LÈ‰ºVìP1ñ2d®i¬68ÙÜ†ÈÅMù7(ç·’p~”—?\" ş¡h ªo3&lÎ§t\$®F/¤E‰ƒŠF.kÎé\\Bv”ëÕÌ£öe®‰EÄ#‰1LuÉvØ6™IÅ+2<9}°˜ñ•‘Á30%8ŸÖ)åõ'ëıU°!&p•ulka† Ş˜›Q¡‹VJ^„gš%sÒkxG’ZçÄfÈÈm`ùR!‹õé4 dM\"ÿ0ÂæÚ¬\"TËJ\"6";break;case"lt":$g="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©Ui0‚ç#IœÒn–P!ÌD¼@l2›‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€İ8YÆ›œË/:E§İÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPVãuµâo¢êü^<k49`¢Ÿ\$Üg,—#H(—,1XIÛ3&ğU7òçsp€Êr9Xä„C	ÓX 2¯k>Ë6ÈcF8,c @ˆc˜î±Œ‰#Ö:½®ÃLÍ®.X@º”0XØ¶#£rêY§#šzŸ¥ê\"Œá©*ZH*©Cü†ŠÃäĞ´#RìÓ(‹Ê)h\"¼°<¯ãı\r·ãb	 ¡¢ ì2C+ü³¦Ï\nÎ5ÉHh2ãl¤²)ht¤2¦Ë:Í¬‰HÔ:»éRd¤ËÃpóB\"lÖ.(@±¾ËCZÊ§SÛ@Œ£Âæ7%#}’\nn[‚KÊö5´+\"\\F±»l¥-Bœ”8?Æ)|7¦¨h¡43[¾¿Š\nB;%ÓDËU,ÉZ	©i{0«‹PJ2K² 5ı‚‚è%‹`XC¢ì,øËA b„°¹£*¸Š¯ìØæ:TŠ4¯Ï(˜•Xq¤È”VÀP‚:<t£Ê\"t^1š¤ŞK“íàUN4¸ñüFá¼®v§6•Ip‡.Øf\"· –ú	‹c›†0ãx¾ÆKÛÓr‰@t&‰¡Ğ¦)BØó›\"èZ6¡hÈ2^W¤®â“‚ã*£—+ÈÆÌ¨Ş3ÃbÎ2Ñ¼Ÿ4è3TØ3¯â Ş‹%sA6\\cÆÏc0ê6-ãzÍD8ä<„BÏ\r¾¶0Ú³«˜P9…) ”b•i{û­;ñ*7)(b2£|è*2oŠ^3O‰tÌ#&ö¡[ˆÇE%##î™ ĞãÁèD4ƒ à9‡Ax^;÷pÃÏjc\\±Œázâ½«B;Eá}â¿³0xŒ!ö«5rA“©)IRc¬«bS}`üD,ÊÃŒ³f5\$i-]ÓÁt ûƒ|½_]K%Öuİ‡eÚvİÀîîã wáÉà¼5\n¡ÔHny\$èÚ‚q=è§¤¼j!§lò  à}Û	qMT£²\"ÄÃXyVÆràÄá!VˆÍ†ƒ*CÇ>¡ÜÎ6ÀÄe`ørsÉ/,\0Â‹™¿l­¶¦ØH›x ‡† ÓÃbRğ gÓBX9mdAÒË\\b2É!ƒ.†Êâû…	u…\0ôeDHì§‚Š(PåÍšdfÌézAh\$—š£.‚‰a\"ïĞğÃcŒ†Ü1\"-¼EWÈƒƒ}_h5‡%€ÍHc\r\0½†w`°L©¨2¡ŒÙ‡6¨˜‹še;ïl!…0¤ Ñ-˜ Â‰›ãqÌdâD7\"KÚ*]hóA‚ÎY\$\nÆøÂ1VJÑ-%åÀ4†EDXj;E²µ\$vv‰6|îr¥s²  I!aäÈj°\$y.+\0Ô£ŒC©ŸAA˜ü†×9\0]<²>¡Œ‘Khªjˆ‰\$AÓ—³h€O\naR4`ÜcA\0S¤®sŸïIf•'D“À5‘†êJûŸóØÓPÜ‹+„ aT½WÈÃ¤*CDèÇOÙh}M\"wmÕ`–ZRBa3†TÍ²@Œ#ÄÇX©#t7BèmM\\’#JãB.E¶˜%øöÈ‰(õĞÀWezÔ\nã\rk’0h9^ÉzÆWuı‹*ÚôÆ¬QÔ®á¦ÆØvGbV‹1…Ş@/@Ø\nè ia­=ŸVH‰e	ƒR±RÌİÉ=«r°— ¨'B¨TÀ´'×FMNù\$²5¼é‘¢8SYÓQäxŒ\\b:Å®üGw4Ÿä\$HÃaK¬ş¯Sˆ\\‘{Ä–ÖÚğKñl\rI¸ÓÚ€äTˆy+‰EÂøºHqc-…í½œS_Måş %p6œÌ…|Ê¾Ë\$Í¹,ROÈd› (&ú¦äd¹¥,8VzöK”úUA–\r¥Y¶l‰yÆM¬ÿ/ë£_îMšYX¾ÍÂ6aÉz<Ä‰ÆàŠJ+*şÙµ•¼(Wš)ÅŞæ‡Ä¼¶ÂŠñ0ZİdÏ2dcDt8°";break;case"ms":$g="A7\"„æt4ÁBQpÌÌ 9‚‰§S	Ğ@n0šMb4dØ 3˜d&Áp(§=G#Âi„Ös4›N¦ÑäÂn3ˆ†“–0r5ÍÄ°Âh	Nd))WFÎçSQÔÉ%†Ìh5\rÇQ¬Şs7ÎPca¤T4Ñ fª\$RH\n*˜¨ñ(1Ô×A7[î0!èäi9É`J„ºXe6œ¦é±¤@k2â!Ó)ÜÃBÉ/ØùÆBk4›²×C%ØA©4ÉJs.g‘¡@Ñ	´Å“œoF‰6ÓsB–œïØ”èe9NyCJ|yã`J#h(…GƒuHù>©TÜk7Îû¾ÈŞr’‘\"¦ÑÌË:7™Nqs|[”8z,‚c˜î÷ªî*Œ<âŒ¤h¨êŞ7Î„¥)©Z¦ªÁ\"˜èÃ­BR|Ä ‰ğÎ3¼€Pœ7·ÏzŞ0°ãZİ%¼ÔÆp¤›Œê\nâÀˆã,Xç0àP‚—¿AÂ#CâÄ>ƒcî¥x@ŸJ2›÷+Jƒ(ğçÉ‚ÒÄ¤ÒÀäŒB*v:EÂsz4PŒB[æ(Ãb(À‰ƒzrä¯ÀTû?¯¨Û0 €P’ç¦Œ0ê…ŒŒ(òç!-\"1RoĞ›RX!hHÔA¨!Ç Rw£j[:\nn“&	\n\$Œ—­Â€Ò¶¸‚+9D¾R-b1\rC(×A7£€Ó3°5¨Ü:F„¯_ÉC,\r#Boh>\0Sì Ùƒ=h\$Bhš\nb˜-7hò.ÕÃhZ2€Uu^'O˜6Cò2¾ÍÒr7ŒÃ2Ú7©(¡k)´ù?2ö²(9-î„ó	¯N¢78C„Ï·cf!@#xrr¤ab!] xòõ<\$L²ŠŞÆ°Š“H­€è’ĞxŒõ0®‚è›\$¢£ ˜ j\n`¤3bÎ'š\\¡#&s„YV8Íã1ëAg´aâ4C(Ì„C@è:˜t…ã¾ä(š» =ã8^Ÿã\"ÒŠ+H^Ú€Èè%¡à^0‡Í“ôË9ö¼ôÉ™RaäT#•C2ÒÚ’ÎÖ†aŸ·c­ –Ú¼ëÊÁÄl›6Ñµm›vá¹û¦¬ÔîûÎö7orú}1x”<hÃÅq\0Ç r£BÑê=Œ0Œ¨Ù\rë2p¡>É„J9OVÂ\\„ÌŠ4>ãÆ„-!\0ï]£éïÆ3=ìå\"0ŒÎxäD¨cgè9†`êGÜÉ©~A¤:ˆ}Ğ‰œyÍ•Ã¬òâ!p.HPß½ólo`é!7a@\$j\0()@¥l‡¼NR[ò*…Y…x@…Ù˜ ˆ\n“ƒ^AÉ‰ pÄ“Ò~ú‹{ìl°ü¡‘\0Íy»ñEÊBCò\r¤1”†rÛSAIO±ç¤ÂK{İ'À€!…0¤’Pi*&ñ'f‚ÖÒÏhˆ÷Â…¾ö±FæÅ”h<cÑ£‘(æ=)%²e–Ò‘dËb##Õ™dq':Ä0‚Q dÜÆG#õcÊÜ|m]h#`¾L8 j­Ùÿ¹x†é[°{	¼İ›âÂ€O\naQj¾G°ÆÒ0u¡,2†5vs¢>hL„I²*szĞ6¥%2²”^\"„XŒ¢T®ã°Q	ôœ“Ô\"ÿÕüÇ2Á*Bdhm!äñOFY8”fITYu2,RbE&’)‘£LÍAª \n1*PÅ°É\"B–5ê2Àæ„K¢dh|6°Æ[Cƒf¨£g¦FÌãW HftÈ€¾J14N&”³#@ª0-–dIE‰ÜøLí{v¶J¬5ĞÄ‡&†uUÒÿM@:šp¡À\ncçä§Ì´)Ã¼ÇÓ\"KÌQ‰ô¢'€Ë#‘šú®„ìµ+ZrMËZ2YiÔ2¹C¤PŒÁöOGF<­*ŒDZ0rYJñ:²#Iz©j(È %NWË¢fdÒ©=‰@]m1ß0äD¼ÈµŠjƒ˜";break;case"nl":$g="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ĞÂn2†X!ÀØo0™¦áp(ša<M§Sl¨Şe2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMĞ`(¢É¤fË”ĞY;ÃM`¢¤şÃ@™ß°¹ªÈ\n,›à¦ƒ	ÚXn7ˆs±¦å©4'S’‡,:*R£	Šå5'œt)<_u¼¢ÌÄã”ÈåFÄœ¡†íöìÃ'5Æ‘¸Ã>2ããœÂvõt+CNñş6D©Ï¾ßÌG#©§U7ô~	Ê˜rš‘({S	ÎX2'ê›@m`à» cƒú9ë°Èš½OcÜ.Náãc¶™(ğ¢jğæ*ƒš°­%\n2Jç c’2DÌb’²O[Ú†JPÊ™ËĞÒa•hl8:#‚HÉ\$Ì#\"ı‰ä:À¼Œ:ô01p@,	š,' NK¿ãj»Œ¨¸Ü Œ‹ÂX—¯3; Ï\rÑˆˆ©6«”J.Ò|ê–*³Ã>ÃÑ\0Ò±F\"b>’²\",ÒÕQ¬%n°Â6B¸Â1¤BHİ6;l:<5\"|İ1\rƒ '+Ã¨î¨¥t J”ŒCÊVÖim#2;@¨ZvbIû–º¸ƒ\nú)Ák\"¬ÈÎP Œc¤D	vØŠ²¢ú+7¨ÃŒäÔ¡T/ä…,ner2Ü††KdšW	Mép´Ê›‰|Ş)¨Ü:B@	¢ht)Š`PÈ2\\hZ-XÈÔ.²RÌâŠ££-³i9ƒ`éF³(+¨–\rã0Ì/i¨¦†¸€Pª4•Ì¦„Ü< “ˆê1Œi æ3£`A6/C›£“èÏ*(«Ò¨”«Ğê•…˜RšæùÊ6íÊé#x3Áìc8øªc4ò:Ä38@ ŒšÊö9:#4¸Á\0xëpÌ„TÈèİAx^;ñrc»!¡rì3…é˜_\0:ÖÒÄ„A÷0¡»áà^0‡Û^ÿq\nXÙ¸‰|Œšú<ìåƒ‚º2ÕÊ‹5ìlºoD8ğWS¸°èğ8J±Ø]¿p	ÃqW;ñÛªõÈò|¨İÊÃòÕí„J¨|\$©pË1\rÃ§EÒNób7¥-Vz0¡•ƒD†çÉ˜é™hÑzOÊ#eRëhÏ\$\"GÌ0T à‚½ğ@xÌ!F~áÉ·\$ÄJCf%g´FŒÒSL(§ŒØ’¨Ô™,h¹}­¥œŒKùÂP/y2ÃŠšP \n (<eIR˜=ÁˆçœpPUZø\neˆ½­“¾O¤4Æ@” pä\n™³@p0ÂóÚ`RÒ*%Lë‡4Ñ]Ô&ua¸85³D‚Ş!)æÉL3Òğ¦`‘±…A…¸Sp›•Ix)… ŒO[Ë]Ä”:‡SAÈ'nÌã†÷l«^¡6'é'*d’½ÕIÂ\$h¸÷?°@»ƒAMè”š„’(LÑÒo€‚-ŸäRlMš.!Ô£‚\0ÌS	ëtr=PÆKÏô&6h(P Â˜T¦¸“F2TK\nYM”Ë¸5—&¬‡%K´#¤YÍC®ËW¸r•\$lé'Â¦Şƒr=ò9ĞGã1,C5„¼˜ÀÂE ‚˜Q	’ú)œ0ÒuÂ0T‡¥l¨¾Tı¥úadÈâJÕc:Oj8Í¤\$ÑuLGûSªÅ>š¤ŞOÛA5W,áóÀÂOHëû_ªÁóÆJ^i	5lœ6¹º„ä²8AŞ\"¡Ê\$LˆT×9(Ë„j\nNÉ,jÁT*`Z{zM)•“+à1b¾‡ErqAu32µ\r!*ÅY\"±+HQü>HL©Gø¹24\\skğ\r!˜<­v_%‰šª\nDvz‘bF—”r7­,½EcÌP\"Oö¤Êˆu#áé5`˜LÁv?çìZrbwÀPPjIL¸¢Å‚².I¦U¢ä\nÉ‘a«Ä~µó\"Ìëé+UA}†–ŠC@PExëF¿©ÚËÌŠÉ!g\noŸ¸ˆŒaµ# ()\\c˜RQS³(™€";break;case"no":$g="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"a„ætŒÎ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KĞ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ğ*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸İjÍûŞ	ÓL‹Ôw;iñËy›`N-1¬B9{ÅSq¬Üo;Ó!G+D¤ˆa:]£Ñƒ!¼Ë¢óógY£œ8#Ã˜î´‰H¬Ö‹R>OÖÔìœ6Lb€Í¨ƒš¥)‰2,û¥\"˜èĞ8îü…ƒÈàÀ	É€ÚÀ=ë @å¦CHÈï­†LÜ	Ìè;!Nğ2¬¬Ò\n£8ò6/Ë“69k[B¶ËC\"9C{fÇ*²óÆh\n—/#\n,Ã0£Â@7 ÒÔ4Üª	¬¾8ÈRØ3ÄÏ¶Ãp(@0#s(¹óúÈ¢ãs(J@Pœ<¸ŒZ2AƒÊ@„´ ÅK>àPÔ0H¸Ò°^\0H°)Û¼4ËC:6³*\0èÀ¿Ì\0¦5±O(Ê	É®@T6O(Z8\rèø#1@P¨4¦ÉıŒ¾¯#<ğÁ54š›fAjR:ÔÅ(2Ü’\n¥Œ—%BÓX@t&‰¡Ğ¦)C ^˜‹m5üR´Âí¯d O…A M‘Ê¦c`Z4'cËp,è ÂåÃ5ˆª°(T€ë	” ë[ŠƒxŞQ‚*ıŒcî9ŒÃ¨Ø9k`æ3ôƒl0­Œ*‰J\r«fF2…˜R”Š£¥)7²b<¡R*\r’Zßª\r'#&‚‹YÀÇ7FÊx0„B|3¡Ğ›˜t…ã¾ì1zúô´áz–¾«jg-á}À¾¸xŒ!òRa“[‘‰Øàç¡7A#<¥¹á\0àáÔµÜ•ª#•—@W:Êr× A³í;^Û·›çºîûÊÙ½[îÿ4ÍshİÂ¨¡ğ’6Ì_E!\\_Eë#¬LÒªáŒãRvÕ±ıÉ)ww!É©Ñqjåí5cx:Œ”§FRêlÌ\"1ğj`îMaEaÉí\"õ(C2êeŒ¸9³dÍ áĞ4'ôÃ\n/Œâ¾PÒ[“yq.e1‘‡fÊ…Ì<#B(Më¾¥ªõÂ€H\n\0¶ÂuÄFAE%4€°×ºRË›c\r-wøÉ“';a¦-’úèñ¢*\0€ü¡bzëù*DdÑ6€æ€s>‚„`¶Fè\nu°H4ÇZgmğ€ÆZÓI)-&›Ğ†ÂFa¼„”Ç2·¡l)È5S\"`ÈÌ?Kd¬§’òbd‰±\$¤ü:'Â˜Øûòƒ®aÍ·:‚Õr%!\$ˆ‡–*@‘´T\rçévAh¦Oƒˆu>ç83Âb×[Ô=3%01¥ƒ-\0.e ÒóH3Ïï\\4P×#d{²N‘ä€Íã4Œ`ngà¡Ê—ÔOIúâtG¢‚ĞÖ–‰0g¦),&âüOœ”LjF8‚³\$Gñ7\$DºLâÂˆL¤™™ÂfĞ‚ PFfô4¼Årø¤½‹Ìx©%°¤bË¡Cg`.ê?8aâ3\$sy³™©ğ9Ò(”©•\"ı4&D%r.jnPß½:§„¤!¢0Ø\nÃZ	!¬Ó—F>_šÁÃ]”a-”“dûM;ïGqP¨Ã¡œò†øûMT¡ŠuÄf‹ú[O«QC*uµ9.à—?Ê¤¥Y`ø›d‚)©7\r~B˜À_ìõl\0(â—ó¬xÄ/¶8›)¦FÑ¥©¶úÓ]SÃIK6””9¼¨\r«©0-”c¤	ù'Çì6J·«Up¤X+àÎ­ÂZPOÁ–¬Ã~\\+¢º•6œŒšùÈu‚¡v/İØ8L‘Pe";break;case"pl":$g="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9‚Šæs‘„İ…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚X1”b2„£i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑFFÌï6ÆÕ§éŞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ŞĞçrÔèñZÊ–pÜók'“¼z\n*œÎº\0Q+—5Æ&(yÈõà7ÍÆü÷är7œ¦ÄC\rğÄ0c+D7 ©`Ş:#ØàüÁ„\09ïÈÈ©¿{–<eàò¤ m(Ü2ŒéZäüNxÊ÷! t*\nšªÃ-ò´‡«€P¨È Ï¢Ü*#‚°j3<‘Œ Pœ:±;’=Cì;ú µ#õ\0/J€9I¢š¤B8Ê7É# ä»HÈ{80¡Ã\"S4Hô6\rñºŒ/Ú²¾ ?.:€1O1`ç>T< ãpæ4ôRl&+.À°oËÀ˜È/¢>ô‰ÖİÎ;E¹nhÂº¹kãY\0cUJ'>ˆ Éˆ˜È“1c ÖïøÔáWuírÊàRøô¥ PHÁ if† P¦=£[ã ô‡¨Ãb†ôŠpc\nR¨è æ„Ë]¬˜Òajz4’0ÂÅã‹§·;d”˜„,¥M¶ºPM¤L69¥(òŸ[Œ·ÃzÀN†¾qf!‰^‰®,<á„8øâD› èëŞ\$	Ğš&‡B˜¦Bch\\-¾ï¸º\n}Ş^M²hÙ1<¨*„Ïƒ0Ì‘Cé°§¦ƒ“ÕPÜm“E¥ihêÅ7#Ğ…L¨ÄT/£¼0…ˆÃ9±8Ğ[ç!ÀRHº¸ƒ£—ŠêÃ&°«ŒºÚ<äëûYg±ì³ší´|Å¶Ñ´ÒA¹Wè:¸[Âƒ½&:Ê¿k¼ÃÁì“Í:qW·¥«šƒÈòc¢mƒp¹6àéúıÛnZH‚vT1LpĞ‚2n‘>ĞÇãÓº˜ì|,L„â‚420z\r è8aĞ^ÿ]{ø¯Óò3…ã€Ø´j\0éF\rÁxD4kã”L‡xÂiÈ(ÔPC¸yêy‘6”¦ÕXiBí¹ÇR4IŠë)(4@B‚ÉJÄCè„¡@(,‹Óz¯]ì½·º÷ß	—|‰Y‚çÎú_XeQAE¨×äTñ²\r!µõâ aSùe	†‡0ÜÀ\\e)Á‘•Ò_QùM(¥BXPb‘)ÌÀ2€‡H2|L„:À20ÿHw@\$lB!÷¨Ò„½a&@D09cò’U¸aÌ¥†0ÆAC˜f±åP¥hîü@AÍS  Æd\$?.Á°9™‚ôò(zDò‰:\0¡Š.×º.r\"ƒAãj%äÄ™—e\\Àœ&	€¥\" H#Ğ.Gü=D†¹.AAP-ò0 ƒFu„ÉØÃ@ËÙHH\rºAÑb!ƒ8@Hry\rN\\HÂKMÊ\réÁ¦£hâd ‹:C›àÜj£Œö-h5¡&Pƒ@ikÎH4†w³§Ä–%²äÌgCJj%PÕ3â S\nA7Lk !(r? Û\"Ã	î—N¡Û³ÄPÏÂRq®Hœ“²zOâA\"JAŠ™RşÑwG=A`”Bá¯™°Ø´Ò\rYLJ4'†ù^:S\r§È4šÂœŸoB’Š‘1ôIæs{˜íz ÚVê oJ¸L”åØR«[_\rÕ±¼¨&IÑ¶.¤B#ˆP@p5¤t1‡Õaj)¯ö=•SRÂˆLrDÂ¤Ô@îG)J‹è95u7Ëˆ ÁP(6	D­Òœ;AsmÑöl‚‘‘BEÍçÂR†U!ä›[•io\"È‚uA¬ÂàÒ§%Å·FM=İ’€æ96­Ä<Ó7\"¬Ğ“x°wuŒİû¦`¯Ü~<ÇŞuˆM‚b\r€¬5•R?H)Mv‚q<“8r\nqİ)\$Ø%˜›keJc’-†¤“¡ÂØ_r@Q|*…@ŒAÁ6¼×ë[ë•laâº+ö«J«o`€‚ª¬OÛDæÇ°Ú›¸w¢,Ylğ­‰•7äÖF+üºDuW™Vy±°g’›†YnÃ}¸(‘Ì‚\0¬\0¸Âª˜50’sLj'•ı6òı7g wm¥wuéHÁ˜¸îrä9¬¯\$k6'‚´ª™@X :óÔ{%B9ì€:³¿ŒL\$¼L<è«ÜeÚLwA&„C6UWE'XàœZ¹ØZÔZÔ}A´5É²9†„lkµbä Uœ è³)¤.Ú)5Hô";break;case"pt":$g="T2›DŒÊr:OFø(J.™„0Q9†£7ˆj‘ÀŞs9°Õ§c)°@e7&‚2f4˜ÍSIÈŞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔ»	&))„ç8&›Ì†™X\n\$›py­ò1~4× \"‘–ï^Î&ó¨€Ğa’V#'¬¨Ù2œÄHÉÔàd0ÂvfŒÎÏ¯œÎ²ÍÁÈÂâK\$ğSy¸éxáË`†\\[\rOZãôx¼»ÆNë-Ò&À¢¢ğgM”[Æ<“‹7ÏES<ªn5›çstœä›IÀˆÜ°l0Ê)\r‹T:\"m²<„#¬0æ;®ƒ\"p(.\0ÌÔC#«&©äÃ/ÈK\$a–°R ©ªª`@5(LÃ4œcÈš)ÈÒ6Qº`7\r*Cd8\$­«õ¡jCŒ‹CjPå§ã”r!/\nê¹\nN ÊãŒ¯ˆÊñ%l„nç1‰ˆÂë/«Àì¡=mÄÌ·ğ: —%©Dê§¶PÌî®DÃšâÉ'c2Á\"‚+ÚIs²8Ó\$®\"PÓ½.t¬ã	¨\néI¹H#&ŸG\"pŞ;#2ë>Ú!Ã @1(HÕÕ‚Š-ˆıA j„€B‚l1´Ø8¸ce˜ƒ„`ŞÇ/bxå3±ô0Ú4¡ Pƒ6#³^1ĞlxŠ§ƒJö\"Kâ\n@:¹Ë‚7+’€Š”¥n5h“İ)2P•FÉ½gW #\rÔÙ_é\\„œ#:é‰@t&‰¡Ğ¦)C È£h^-Œ9Â.ÜC-Èæ¹MÄ„\rÑ´©d7ŒÃ3×z'š•IIÊm¯)k&; Ş '£Ì@É£ÃªMi.ìXÙZVƒ?«ÂŸWhˆÊaNrØ¤,º9h²1¾0n9¦éËNü6C4;A\rÃ8@ Œš«î”ƒhˆ ĞÎŒÁèD4ƒ à9‡Ax^;ótmÁ@+ Î¥z¼¹îh^İró‡xÂlú#.®	®İ«ÁğÔ9<ÓP<nÕUC\rµÂ))k¯İ«;KMÆqÜ‡%ÊrÜÀïÍp+Âsİ\0İĞ\rÓªğ’6\r|œçu½|øIÃ¢W6Ÿ€Â5Àöâ;Ÿ§©@èNqm¡#rH@‰‚:G<·vìÃct§ô;®¢LaØroM°ê0Ìñ›MnmE©†öª «ò7hú¤â\nòßñ+\r8‹pĞŒT(m%È')tBA\rÃ|0ê  ‚\rAæ\n ‚\0PTI'+ÈÄÅ‡2<	 lF‡5zA#ÎlÍY­]FÁWD³doOÒ/KH;Bp	™õQ\"şOëòÁH¼T&…aA¼&OÀ»9^ãÑ(x2ÆğŞşèC\naH#G2Rœ	7İ€4]kR%…Åà·ı#@PQ8i¡• r‚PÊ,@@æ9ôø2¶ÎzB/ÄÅ°°@†	jUIÊtøNI&‘\$\0ƒsô7†ÈÎ¬ò¼†‰±prŸĞÆ´ûò7±Ø3Ê€ Â˜TDiM“ÅÀA\0gJÓFF‚º©%Æøâ33\$[ë7Q\0š¦0Ò[”yÌ\rÄÀ3¬”ÖuÌº+eó0ÇÓl´‘±UåØ0¢Ôc\0`©Iê®(±.9 ÀÍ6`r\$ˆ*¥VÏ[m)â›àb“I§tÔÏStîwL¥C_kpÍ†Ì˜Ø.`t¶Aê ÂÀPC<A°ÍğÒ³é\nAMĞ1G\"2[–‘-ÉX“¨°ÂV’,5ïÁ È0×‚¨TÀ´pÜÜ[}'ìÎª²3JË¤L`V¢šÏ-HC†…ô§#Å`ã\\§H£É‰1a˜<±–LgC™9É}.ÚØŠH¡F´i¨ãU\$™šÑ/®ŸÛ3Z‰a/M¬–(PßFJ4r7Ë`O@P(MUŒ1tËJ*\\6-JÅÇĞkÕeŒ°ÕNÂÓr(Î—	•ei4Ò\"Yî²)b›˜	k*–ÅäÙYã\nE/õ ¨–D‡5ˆ“t˜§`";break;case"pt-br":$g="V7˜Øj¡ĞÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhXjÁ¤Û2LSI´pá6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RğQ\$Üs…šNXHŞÓfƒˆF[ı˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\¾i”A€Ì_f³¦Ÿ·¯ÀÁDIA—›\$äóĞQTç”*›fãyÜÜ•M8äœˆóÇ;ÊKnØˆ³v¡‰9ëàÈœŠà@35ğĞêÌªz7­ÂÈƒ2æk«\nÚº¦„R†Ï43Êô¢â Ò· Ê30\n¢D%\rĞæ:¨kêôŒ—Cj‘=p3œ C!0Jò\nC,|ã+æ÷/²³â•ªr\0Æ0˜e;\nÀÊØª0#>â;ÊÂb˜%sÀA=CSÔN•kË.œ‰Œû‹²*’øúÈòÒô)¥mp\"º2«6&\rëûş§Ièİ4¨ÀŞ¯Ë­+Ê½£ @1(0VÕõ‹n5»ø¨^uøb\n\r8Æ:Ó@RhÁ&ˆX@6 ,'QóM¨Ê•J Í«¶öŒt3(\"…©èÒÁ½€P‚‘®Šô ÔcÄ¡L%¬¥hƒŒ7<67)RX—)!ugW_;p3/‰åız©,x0ŒøH\$	Ğš&‡B˜¦ƒ ^6¡x¶0äƒ»o¶· ê·¸h6< STÖ%îğŞ3ÓFã!ij’å_,Ø¨7¨)ğó²ã¨Æ…\$c0ê”Úğæ £–ˆ_/û?ÕÊ‹¦ƒ˜RãM…k{W´2:É7©È¨×?X<=BÃ8@ Œšòªn…&àÂÖ´c0z\r è8aĞ^üˆ\\0ï,/ƒ8^•…êK©ºxDsÍóÒã}\$l*È83\\ ÃªBÜ:˜j#¨ÊÄâí':#*r&±È2`8Bp­ªÃv\r.p\\\$Ãñ<_Çò#¿'ÊÔp3ÍÜØñP½D¬ÂHÚ86¾\0éÔuSûq'Š\\:h£[¼©H•\n|š1»/†ıÁ™‡ZŠÑèe6Ü÷šÓ¹Ì›'A ïÆèøw\\ä¤Æ?Ö¨Rğ !™ã æ–mÃ›Nj\nu­Á§êpñ÷IÄ%ç&‚\\q3¡¡¨3.¡ˆÂ•DN\r˜gÈŠXP	A!AAX\$¨³#3\$É	a\$Ä œ„3 ¨à¹é7\$€Ù®sl«¢q¸8Gñ˜% Òón‚†Œï›ˆ\nòQß?ïÕı†ààPkÈ\$o)Ws‚Ã@ *!Ä¶ˆ`BC\nxDè7¿£şÂ˜RÑé8ŠæÀAô%Ç}ª¤‹¿T„ä(C¢ôŠ(eËÖúÒ *%M†˜fÖŒx C\$Ára\$_ryaÁ\$Š‡“V‰\n¢\"Ä­ûœphÖifCfœ„7†ôL#áÿkA?S„ò<“\n<)…DH”‘ñ=P®Ptªv^ K¡:âbpÕ@&,Ñ*HE4\rS.Èï7ĞÜ:ÈM‰¸Î¢Öe3ÓYÿ7kAÊPpÄ_\0S\n!1\rÆ`@½A\0F\n‘0Ÿ*âú\rÓri‡\"N€Öœú4Š(Ó¯µú¬O'åTÓÂ8Âé¾:‰Ì‡A ŸN•Q§OU\"=„NU¢Ú!RéèÀªËä”¬*®Ô&Ï(lsŒ4¬Ò,Ãt#…Ùh<r^àÒñ“«@œ„jLPú\rƒ­l*…@ŒAÂşo¦IºÕ…\\hêG_‡~\\Ê¾ÀÍ;4É°ª_\0ç¤90¤x\"IÉI˜e+Šc‚vcbV	¡¼É`òÇ(c4aÌ…<¸cVìUä÷ŸR§S²Ï0¬ë:ì•dU´\r)¨êÀÃ½]âˆ\rôt£ÇCzb€Rœr‡¥b5<•†ºf½%ÔÌ'¡Ï}uVXû4ªìÅ¨Ä]J2’\0PCZ]K‡ˆœeV3a	¦²`ËR7¼Æ£“cmı‘QÍf¢4àœª¸";break;case"ro":$g="S:›†VBlÒ 9šLçS¡ˆƒÁBQpÌÍ¢	´@p:\$\"¸Üc‡œŒf˜ÒÈLšL§#©²>e„LÎÓ1p(/˜Ìæ¢i„ğiL†ÓIÌ@-	NdùéÆe9%´	‘È@n™hõ˜|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ†7FÔ°É82`uøÙÎZ:LFSa–zE2`xHx(’n9ÌÌ¹Äg’If;ÌÌÓ=,›ãfƒî¾oŞNÆœ©° :n§N,èh¦ğ2YYéNû;Ò¹ÆÎê ˜AÌføìë×2ær'-KŸ£ë û!†{Ğù:<íÙ¸Î\nd& g-ğ(˜¤0`P‚ŞŒ Pª7\rcpŞ;°)˜ä¼'¢#É-@2\ríü­1Ã€à¼+C„*9ëÀÈˆË¨Ş„ ¨:Ã/a6¡îÂò2¡Ä´J©E\nâ„›,Jhèë°ãPÂ¿#Jh¼ÂéÂV9#÷ŠƒJA(0ñèŞ\r,+‚¼´Ñ¡9P“\"õ òøÚ.ÒÈàÁ/q¸) „ÛÊ#Œ£xÚ2lÊÊ1	ÂC0LKÂ0£q6%ŠÃ3¼ÌAÂ*k–œ*A2¯ƒsNÑTìwP!.àæ¿êÌ\nÌ3KÅ(ËÔCY\nºê0³ÈäÎ‰ƒxÏ§‚f¢Õ./íX®§S¾Ò„£%=+P\0M«k qh<«\0T¨\\w8bhzCb.ëÊÃºQàÿ©ƒ¤1Å¨\n)Ğ–Ã¢(\ré„×€Ğ.àÒ”4¢\"qHB…”š'ÒÈ2)ƒ,/7Ì\n ¥±[!¹6ÚŠŞÀH‚ŒÙ’BÙ3Ü6¨c^J£¨Ú	@t&‰¡Ğ¦)C\$N6¡p¶<éƒÈºéaC:6P SbØ”ğÌ3\r‹Û-¨IÜĞ\$ ‰‹È\nƒ{qd1“@:Œj¸æ9ŒÊÙa>f_¶Œ6cäÎòaJ«„	•,m>â¬'¢£i)Ùj¼:¡/°@ ©zğå½;që¯‰`ĞòÁèD4ƒ à9‡Ax^;ör”¦Y#\\¼á}@Ãä¾îá}à±KØÎã}È©‚r„ 1ò9„œÅoPxÎ„:ã³¯ĞŒ²°ÃÄ3,\r¤‰°«öÄq(åk,^ÓÉ„(AÓŒ½OVë]{±vnÕÛ¹çvğnwÁá*˜Š>	)¼Ê§òóqQ)Éüã†õ¬pOhk'h›‡%²iX\r/U¨Êƒ©2|¨—,RğŒÓ_rDá*¼3Íá62p•Ë'õ¬C3ï1Î=¹·RlİÃ:1ˆà‚pÈêR~ë(4—ÕVi‘Ò®{4™F%\rÙ’7‡^2n:=Šç\r{)p@\n\n“†]‡qd¥g”p\rÀp7Fğ2›å¬‡Ãt)Ç%\r‘ÀØİÃ¹ár1Y‹œ’XÑWq&ãÂ0ÜHñDÀ€;œ€Æ\n!\nu†œI×£\r	=aL)iŒÑEa¤12€@	H‡,†\$´ÊJJE(äy.’UœkRáMCğâ^£’XËJË>\0¸>ĞÔ^9ƒDô\$‘pòl¸iZÒ4Ğ†è>r\nqä!ÕIÔGœã¸&qUP8Æî…9ÉDFùö€ÂŠP	áL*F í<“p*2E»8™9¨µd¡v6¢ÈÚf/.!GE•Pİ	.!iQ†RfO\$~'hş/µy^`Nw)O^^½ğ¦Ba[G1¤`¨äîq)½8’´§¹9l\$ñfÉJÊTbó]—0cFƒ™eª¡º«¤jµÙ™È(ÍV%›YjÊÄ*v®M“àLÌUbd`­Ø<Iq+Ëng¹ e™S,eÕøÌØ?a\rRÏ5ÒÉ@†ÀVÚèc\rdİO\0ì_C{YXÊù¬YÛ`\\Æ'èä6¹‚µÑˆU\nƒ„tIëùö'«l9Lå­.¤IŠe6òß3j—\"‰'¤hé@HÍ	•|ÔxÅ¾“”dË°M¯á˜<´R°k.ú5VIáH\"ĞÒ	š^ZĞZ+BbÉqD»v¦;8Ò9BC†°Èb«´ö‡Œ!v«-\nÖ¯Ì\\â«Å‚RSo©ÔTÜ¯IZ<ë¢jDÖµ…²G‘mb#4/;\0ºD2.Æî²NˆE{(€ÏTÉgBŒÓ:ë¨FĞdŒ¥c°Åvó«6zd\0t";break;case"ru":$g="ĞI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hĞX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ğ&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)û‰\0”	Nd*;AEJ’K¤–©îF°Ç\$ĞVŠ&…'AAæ0¤@\nFC1 Ôl7c+ü&\"IšIĞ·˜ü>Ä¹Œ¤¥K,q¡Ï´Í.ÄÈu’9¢ê †ì¼LÒ¾¢,&²NsDšM‘‘˜ŞŞe!_Ìé‹Z­ÕG*„r;i¬«9Xƒàpdû‘‘÷'ËŒ6ky«}÷VÍì\nêP¤¢†Ø»N’3\0\$¤,°:)ºfó(nB>ä\$e´\n›«mz”û¸ËËÃ!0<=›–”ÁìS<¡lP…*ôEÁióä¦–°;î´(P1 W¥j¡tæ¬EŒºˆkè–!S<Ÿ9DzT’‘\nkX]\$ª¾¬§ğÔÙ¶«jó4Ôy>û¬ì¹N:D”.¤Â˜ìÂŠ’´ƒ1Ü§\r=ÉT–‚>Î+h²<FŒ«Æï¢¬¹.¥\"Ö]£¦„-1°d\nÃ¾å“š¿î\\İ,Êîú3ˆ¡:Mäbd÷¤ÚØî5Ní(+ú2JU­ÌüğC%á¢GÖê#šë\nÇTñæšä,ôóµ`#HkÎ–ÅµJÀäLjm})TëÊ£U%•c”Ä»ŠÀú7“\$ÛqN\0Pˆ4cÄ6«ˆæ\rã@2×µñ}_—òå¦\09#xÜ9¿÷Bá¦hË€î8N\$@#\$Â_Ì“­ÉW(mÔŒ“õlİqµ/Ä8Œ“Îu±\\¥ÀY(¥\\³É76@ëâL¦ŒZtš:&Œ¾¿ZNŠh5šc÷Ø%„’ÆA j¸åÎ'!½3y¨/%âUh³ÑÉ¡&ÜğÉ7o@¶\ra™[;r\"ÈññZ‘Ù	¢C¿Y‚kQ!ª~¬hêè¥¡ã²¨«í’©J'+ìŞEì)-kš:f\"ª\$eô¦ûÚñe_m®:{²ĞªJy|=7P½À,OZ¢>=†• ¤õWÜwKSÕ÷Ğ[à†Ï¾fí©Ê?©<Ø¯3Y”áÑ ¤“ô\0P£(ùh)Ş¨¶½`»\"j˜6ƒ”ˆÛW‹P‘¾oåxhĞ“G‰4…¿òqQ¼PÌQh6µ¶^Rb&&ÁÃ–¸NB¥>ç ]?ôÊ,+/+\\ä\$dğŠaî9\$b£Ã¸-İŒ>„=Kaò\nJ©b¾˜Tû`Š6‚jµb¦B©È8py	%’TÊ`Ê~0t3˜TxaaE!°Áá”øfa	°‹‡òÃÂ¡û¼ˆDz\"AdÂª ÓS‰f*\0%èC\"Bn„ÅV®Oà¬.%pÅôÅøj][ùNe	*§Ø0Å\$3ş)Ñt1ønˆ“d“mD–¶&şÓ³\$@‡Ñ1„ÈCHn¡È(CP]²Ò:&¸„‚Ì^P±î9ÄÜ@eÀô€è€s@¼‡yœƒ§•2¬/ĞÎØ\0/Œ80‡Fx\"Ò=I·„rPb¿€¼0ƒå:§ÉQofy²·+Êh¸OÒì¯‹©ZTÈ4¹/p¦Q\\qO9’4‚—R’¡WA«…w²)öb\nñÃp²ö_Ì‡1f<É™s6gÍQ*ƒ”ÕS^l†VÂæüá.S‹•šãâès¶ÃH¾¥k‡‰I”Éä[:;‘ÃâJ#Ë¦z«*|Iô†¢’,&®\$*–\nˆ%„º«‰æ¦QÅ\\‡YM?¥Ä˜„)‡ÆE²W }L~„É6dwğƒ(áÆ¢•'\"¡i÷ªQzx’×4X¢ñu:§•#’u†_ê±:µb]c³#š{4¥æ¦YX¢'Jër=óE¤Ñ:,I6  ¹’ëı`5Š¢»cÉM[/ö¡ÕÍTJ£j®B\0ıFtÅcbŠ–()`¬²N#äEI©šÜ©2ÊÍrNDèB=2j‚ ]ã¶«GZ¢^;‚±\nlºÖHàÔó=+&*UH«0¦‚0-‰I`ùBbóODõŠ£Dœ’R`IR0+Ê•ÖTg£í†n–PO£[P©n’Ä¡Xßí¿­÷Âñ˜±g(ÅÑà‹˜B(Ê\"é;N F'¥FD­sE5µüW\"Nò©´ú7 ’ˆ\"U'n¢OÒSRyW?òƒ” çÔåØ)v‰NĞ†¡°\$íC¶ÒÑ™9Xö\rãA\0P	áL*Q3…cÍ¤w@)VEWÒ|™ª‡,y´EQ›•ñ™M]¤ÆíÀ¬x¨¢Z\$Ø´ÀÂ¦NpÉ„+DCÓlÅµi4%õ\"53é9—?e˜ÛRQA¬Í)W5‚\0¦Bfs¥TA€@‚ PWg]å2'5Æ97º¥Ğ3Ç=Èd+ÔK’×¦ñT‰Âx)CjmftŠ!,yèŞªv6û~9 õ©¤Vğ‚Y#.Ÿve9n÷\$„Ê]8;èÿ©¾®›}mæ&.Fÿy|³ğ2öğ÷Ú´¾Ú¢·U”MBõ\r€¬h\n›ô±`ãk‰%wˆæC“ËÊ·¨˜GTª&‚Ûquâ4sR`¶)2W]îgXì¢\0U\n˜'Ó².cr”\\¦åòóuCØìmE\$>ôZ/Vƒ„Ï¬ôş¹Ô®?`(J_E)	©hXĞÂ,T]cRû›ŞÖıÀ¬ÄèƒŞó¥'E#Q'G,qF&]%U¯ÀRc=u¹ºF:L¸o6%9/,OÊëNª«Iô“DybŒy/kÈå±P„*øfñEÃ]íÒBKîa%Ü¡##Ş.AbmÛœ—tÅx¡ZRN7…İy¥Wş@€)6åR	\\géÅ´®ÅòwkÒ\\™ş¾ÙûñÌI·	¢Ù§Î×•ÖeÁáû–âüfÁßâ<6:ú9ãvÌ%Z§ï°ù.Ø8`Ê©¦_Ëµ„Ì(k^MCÊÆºTâT¸¢&EºÑŒm^]È¤]IZ£‰€˜Iˆ˜É™I˜™Àîš	¤¥\nT¥‰À\0Â`æåúŠdiÆÖEReº‹ì(gùª¬§iÜ";break;case"sk":$g="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØŞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êp/ÆƒN®şbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜Í\0­ñ¿!À‹·ôF\"<Âlb¨XjØv&êg¦0•ì<šñ§“—zn5èÎæá”ä9\"iHˆ0¶ãæ¦ƒ{T‹ã¢×£C”8@Ã˜î‰Œ‰H¡\0oÚ>ód¥«z’=\nÜ1¹HÊ5©£š¢£*Š»j­+€P¤2¤ï`Æ2ºŒƒÆä¶Iøæ5˜eKX<Èbæ6 Pˆ˜+Pú,ã@ÀP„º¦’à)ÅÌ`2ãhÊ:3 PœŒÊƒ¢u%4£D¨9¹Ç9¥Ò9ˆ«\0œF!j™·\nbC\"”Z®Ù\rÃ˜Ò7Ò)H´&clœ\"ŒƒKZ9Bƒ=!²\"|_BCTT(ôì˜RJ ç*Šƒ“’6I!ë\\08İMÎBv7c\\ªŒ\0Ä‚€M‘eYƒÍdÙcSZ;CËT4`PHÁ ip†/˜ĞŸ¯P5Œ‘xŞŸ§¯•/6EÔë&%Ôğ sÜª+I’•Ô\"…¯Z>	ğM\$2Î5=[ÍC¥Zñ¤D„¨R£!&ô6*'Eê›dŒ¸(Â…ÀN86\r8ö20Îyû“#ì.T›¤(Ş_ºY–Kƒ\$²RÙ\$£ÕR\$Bhš\nb˜¡p¶ÿ¿âëæ8`J É,J£dØ3ªJ:¦\rã0Í–#\n‹üÔM_^²@P¨7¤/XÜ<„­\":Œqøæ9ŒÃ¨Ø\$¥\"5ƒ–ğ0Œù;øºæCjê:¶A@æ¥;uy_O‹XÊ1³²B;WK“4:¥\"£@ü5c2¨:ÒCpÎ#'\$Œ\\DYH7j(\"É Ê3¡Ğ:ƒ€æáxïç…ËçnÿÈ˜Î§!|™”˜Ü„A÷·<áà^0‡ÛVÿïD[ÂïŒ<EwXDuuCÁ\0ôÑ¹)JVVOòºB¨\\92@ğHrD ¸<\0@ğ#Æy)æ<ç ô‹«ÔzÏaï¨òr¤”£à)Àø\$†ĞàNPn™ô(V\"Ù¬n¡„5”Å<®óv'!ÑõBøç¡K1\r®À½¬ òQ	©7')%Ô†‚˜ê”Ü¸7A“®I©d†ÌÑ{}5NÁ8@Şá¢š\r²'TÔ\n]°¨½†ÄdeÙ}3ğ8¯Ò\0NO…,0¢´‰×2Å1 È„SË<h\0=GÑ[Ï 9Ì\0 †¥Àc{®Ê?sLGÃ)©Y(D:³jƒqß\$Ş·(¯\"ÁÍ\n#ùr¤m.¡ÁÊ@&ÿHw6ŒõÉw²™La…ØRR›á:d0ÊŸÀ†ÂFŒ`ğ²ÄG¢¼\"í<’–VıÑz\08Ñ-‘²ZKÉ‹wt³Í	œˆ•\$*¸°0-zxQk(Oä§’BÃÉ®öXÂr²f¯AÄ:š¤v¯LŠLs	’½\n”4[k,<\$ñS¤„”xS\n’®PHRxTòk‡œ'õA¨AL†½””T‹˜u8¢42†ª'ƒXtHmâ†¶\n%4Ïá¯\$ğà¬¢æ˜Q	€‚¨(CE‚0T\n7,’]+%Í¤4Y[=EBÎ‚ÆYDÜì‡“Ö@Ë²°\0‹\$¨pjÈu;á¤=Iab–(aQv8ì›¸–(IJÏX‡XÈ¢ûH0v„áä;‰\$JBl\r€¬5²ÃóPI<g ¸Š²DÕÉÒGèŒ=B“\$JB4¨¬Í	~¨TÀ´ÔVFÏ<îcµÜ‰­v`0ÙÏEµL²–VËnâ²É*ñ^@Â¦¯38—0šîÙazÏoh¡w¼ä:“\0`ŠI~ÄbGÒ>èØ­Vf0&İ€Ì“¬©Y5åÀ+IQJHÒq¯\$¦(Æ!¹\nJI²ZÄ†¥š0èŞĞu:èŒ¬dQ†1'%!07Ö@ÚDĞBJ¸Ğ¾r›	øJ¤i)¢VC'˜eà'—ƒ\" “ä³ÌÎNZfb<˜L§”J\nØ\nl02Ê\$J‚Y ŒİĞ	ebæ]q­T7HmğH'I¹_ó•B–UIÆ\rœ\0ìxSYA";break;case"sl":$g="S:D‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rğY”]0šÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ğj6 ¨!„ôn7‚£F“9¦<l‹I†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz67Q ­†»fnœ_îT9÷n3‚‰'£QŠ¡¾Œ§©Ø(ªp]/…Sq®ĞwäNG(Õ.St0œàFC~k#?9çü)ùÃâ9èĞÈ—Š`æ4¡c<ı¼MÊ¨é¸Ş2\$ğšRÁ÷%Jp@©*‰²^Á;ô1!¸Ö¹\r#‚øb”,0J`è:£¢øBÜ0H`& ©„#Œ£xÚ2ƒ’!\"éÊl;*›1¥Ñ«Jº2ğÓ6|¸£Ëã”½0İó[Tí£ÃkÆßŒ£²>†\rq3Ã\r1S% T9¤\0T\n4Êi3ä\nhÔ2tC	Ã|2‚£\$–:!ğ Ä˜€HKOT\rER\rI-NSõM,,Ğ´A l¥pºNº¾\rj0ä'N\"4’ÑÀP™\$‘ ˆ2¸\n3¤ê=KàŠ£Ò¸	ã -6Ó¬iC¼-(\$%p¾]\"¢¨ğ Ël[K¸vˆZnªCW•émª×º{|¶C›%QÌ7út`Wr4^îlÛt²^=%P\$	Ğš&‡B˜¦@ch\\-½oX»i®¬¢‰h6I SÆH\nˆÌ3'JƒU&Œ²3»nÑ(¥*\rì•²7,ôÖ:ŒrÀæ9ŒÃ¨Ø\$l×IºhÃ¶¦9\rÃªaLÊJi¸ê9	B%â£ò³c4Á·º\0ƒM-ÏT1Í°8ÈõânÖ£0z\r è8aĞ^üÈ\\ÛlP\\á|¾ˆòK6…á}Ò¥.€xŒ!ôŞ›b/Y|…Á\nÁ|rÒËFHÑ(\n^&¾(ÌÿjpåyrõÜñLjÇr—)Ës×9À\\øåĞôc,ÓÍƒwR¤ÂHÚ82òXÜ:uıŒÏM›9¥*\"H@ÏSKAáÑ!4oÚĞ#…VBL’ƒxg\rä%17PĞ@ƒctç ;­¶®]`\0roAÉ%¡@ÂQj\rIª5f±M¤ŒB æRX eê†’>ÉxB ¦ôú0EŠ’CèPğBIX„EBêZ; \0()\0¤’e ƒy¸\rä¼!¦Ò¡›é æXÌ)–^Ù¥>à€’\0î¦`±ê QÉ}Ÿä°qÍ{\rÁÁ³3şó w4ˆ' ÎäUa†°è0¶ô²”K²S‰D¨–œ€†ÂFw+ ë®³EÃkVH\0€ë\$Íl&ÈšÒ+\n2b¨V0„Xà—ÎÔ‚Ÿ\"Dƒãº@Îõß©ij¨!/	\$L<˜²NP¡h?=\nC8äACˆu3Dü3Â8ßÜêf†§ 1’ähã‘ş3-­:—bvd¢lSC!è›…\0Â£¹M,5y¡.%Ñ eñ*òLx	š;U\$¤ePÛ6šÁw™ò@m£¤\rà€)…˜2Û F\0›„`©ZAìŸ¿ùÊ’š0r&o…C¥6ÄCIÔ2Ü7OE4“©=BeJ_TZz¦TÙHb!Ø¿ÔÓT¦‘F9İ„)Š\0HS«>­/²æÄªò›`5ˆÖI~E<L§É04°ÊØjÌ¿br¹U˜Å€PCI¡°†²tÍ©8/E ŸEPêoÈYF%á•	Sca´\n¡P#Ğp˜Cs„/a¸3—ˆÁ1Ô…|±F0À«iÅõo_Œ ÂZÊêmy!¶)Uƒ1+jIRÅ®¶éˆÛCp#fÎ¡:Ó8]²	¨L4†`òY\r±1‚b5@…\"íT@sE`*Ç©“Æ‰É!¼«DQ¶cÈü\"•`·^Ã9JìY=\$¤¼&ú@FH)@.k*ÿZ3¢@\rŠß6Ç2ì\rhzjÅÍN\\kX©°µÀ\r*®ß˜pË‡.9‡8—F\r)ÉY'N0\"[r‰BJ¾»”-ŞÓ\$iîøhQ—A|—ÜBÎ%c6D”8\0";break;case"sr":$g="ĞJ4‚í ¸4P-Ak	@ÁÚ6Š\r¢€h/`ãğP”\\33`¦‚†h¦¡ĞE¤¢¾†Cš©\\fÑLJâ°¦‚şe_¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”jQŸÍĞñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰R×Ò”=q0ø!/kVÖ è‚NÚ)\nSü)·ãHÜ3¤<Å‰ÓšÚÆ¨2EÒH•2	»è×Š£pÖáãp@2CŞ9(B#¬ï#›‚2\rîs„7‰¦8Frác¼f2-dâš“²EâšD°ÌN·¡+1 –³¥ê§ˆ\"¬…&,ën² kBÖ€«ëÂÅ4 Š;XM ‰ò`ú&	Épµ”I‘u2QÜÈ§sÖ²>èk%;+\ry H±SÊI6!,¥ª,RÆÕ¶”ÆŒ#Lq NSFl\$„šd§@ä0¼–\ne3ÔóšjÚ±Š”»nó–-gÕóƒ`ØvÊ<:ãpæ4örÖ¥JË{QM?H“nõĞR­\n­,…óàÕ!É\"”§D	²â’õzs3UDÅ<ï”ëw>·ŠˆÛ)tóu„£\"Ï¼è`€àj,ËƒàLö—¼É\$¸’.`PH…Á gŒ†+]ÚüÕÈÃ:YŞ,û\$  ™\"Zÿı¤?o=Sz&ĞÉ\rx’	™£›Ã7|*Æ3¬ûXÈ¤„ª\nN«q2¤„ô·Y>i;mvC“GeÉ„6¯ª~º²*â‚,eŞ‘°CRÂòºNÉâ\r6 Av¤ì/jhºl»>Û¥¬H‚+ºmËik¹kûi±)işõ¥mK7\0ˆíë„3¥ \$	Ğš&‡B˜¦’`Ú6…ÂØóÓ\"ëE aÚ1FK‰î\rƒ äÜ·a\0Â98#xÌ3\rÊğ©Ää‹é²İaˆŠƒ{ˆ6Œ#pò¶pê1Œnpæ3£`@6\rã<\$9…€åéŒ#8Ã	f6ÂC«®aJÖQ§‰óY\r«²yhòÍ¹B\n†ùğÌ°ÃªÏB`€ †Gà‘ƒåkEg†D`àa7®ğ3ĞD tÌğ^á@.09á#DfÁxe\rÀ½,Pè´!˜\"ĞÔë! ÎxaÅ­˜¡¥úDMag«õÇ\"bŞY{å'«áx!–úObOT%` € šN¸r8©!%&²Ã€iw‰2A Ñ ô „P’B€ï\n¡d…ÁÊC(b³!’ÏZ ¼€|Chp9a¶H–Ï‘‡d7°#¢€k8!¥##¡ptI¬½¸EX“È¡Z„Äø»/“øƒ …@Å‚yÜ\n€g0†8n´A\0w9Ox1àŒ 8r‘Œ0†hÂÃÚ{yğ>\$]0ÉĞ\r9†k‘¡¤0†ÀæZÌÂ)‰€¶™ÕÖ4\n\$¸Kf-/?æèòˆÂ§K¤ÜB‚\0 „ëmÂw8•\rMª€<¤ù.” †´`„¾‡Ç@âcr`e`I9CvÑúAœ¯€;Ñ¨6İãí9ğh9¤w²ûQqÙ“a¸8?(ÆÒJK˜'h1†‰0C< mÆ`KÃVEZ ÔÂ˜RÉMÿ6v>]\\óŠÄÕFE²¤BD#/„U*SJWĞñK\$Ö³³¨”¹é5Ì\rHùæº\"àÑ*…COÖĞU\r	IÅ8ƒ%\nV³o©¨’B]Èd\r,á¤t¤±Ú9îğ8‡SœC22\r°2<Ázd‹ƒàGSj\$s›YMˆJ\n\"ğ¦'»±3„Í³Ø5è–(\n¬ä¤›·ÖÁ@Ó)3\\v{¼r•b‰¨²T¤µP¨\n¨S…èÑ¬&JTÛöy•¹7¶)ıEX‰\"PÑ¼¨è¸é¾Vîª@L(„À@¨À 90h#JôXi‘)öÚDH‘ÀF‡¦ä”vÆÚ×P*¼ˆÏ³pIpjpÂHÒÃM…Å.+\r«‹tÜHë_ËÃÄÕÉ	û¯Å¹â²°İÛô²¸øÁlã7O¦,A8o–ìdchs¶\r€®(!t˜œMÒ¶7P»ÉfâL–¯•kò`JA¨°*…@ŒAÂÄ‚vI	”&tëY<©ÉSW	Š²œGoùÌ™+SåÍ‘2Wß8Ø|éŸ•	k(…ĞÒ”éRW°‰‹hU˜Íé\"~Ebô•\r!˜<˜òêåXTª\\£A§eDî‡2ÊäÆj9aIXœLËhDÕ‘d¿¦RĞF5'µ®VêÚğ3©H¼µ«s;SF¿¸«çaàÆC=‹mr\nâ+ )•^Cç”]¦RŠvÒ[Æ¹äXn=v¿ˆS§._Q¥'BÒ…¿=A+¡nj\"áOjŒš*yZÿ‹n8Ïví¡}†¼SëA4Pnv\"4ÆyQ\$H_€";break;case"sv":$g="ÃB„C¨€æÃRÌ§!ø(J.™ À¢!”è 3°Ô°#I¸èeL†A²Dd0ˆ§€€Ìi6MÂàQ!†¶3œÎ’“¤ÀÙ:¥3£yÊbkB BS™\nhF˜L¥ÑÓqÌAÍ€¡€Äd3\rFÃqÀät7›ATSI:a6‰&ã<ğÂb2›&')¡HÊd¶ÂÌ7#q˜ßuÂ]D).hD‚š1Ë¤¤àr4ª6è\\ºo0\"ò³„¢?ŒÔ¡îñz™M\nggµÌf‰uéRh¤<#•ÿŒmõ­äw\rŠ7B'[m¦0ä\n*JL[îN^4kMÇhA¸È\n'šü±s5ç¡»˜Nu)ÔÜÉ¬H'ëo™ºŠ2&‚³Ê60#rBñ¼©\"¤0Êš~R<ËËæ9(A˜§ª02^7*¬Zş0¦nHè9<««®ñ<‚P9ƒÈà…Bpê6±€ˆĞÆmËvÖ/8„©C¤b„ƒ²ğã*Ò‹3BÜ6'¬R:60ã8Ü§-\"Ü34íé¤0j˜/+Ú\r\"\"ã‚5*Ó+;1§«Ò3Œíˆ&\r*#®¿0«¬2¼0DTÉ¨Chİ;¦ïëÿ;Ê©J:\nXÛ&H¼§*Êë¤b< ÃÀ¤ƒò5\0AQ#ã˜50cpÊ5A b„h¹)»À›ÈÌbõ!\nmóC(ÏB23F\n:#% äóÀE ÙX´š`Ñ!KC 5¤Ã:ŠäcHÆ5°u0Ëm\r\$P#4‹wMÖĞ…Õ,x^LO{\r7Åõv>é Ü:¦¢@t&‰¡Ğ¦)CÎ,<…± Z‘V­®¾\0T ë²\nM¤ÜŒÃ4	W6H]{FN‰Hë!Ìø@6£L®o<c`ó}¾ê¸İ*N–[&3Å°äƒ–ÊD\nÜ°²H6£¹ûšéY¾rÅjƒ{Ÿá	/¢Ë>“¥×J¼ë-:–w…Ë¨¢\nÖaiPé¢.°°0İ{;†‹ <S BÉªUÃ–‘ÁÀ›Z\\:ğ‰MxÎ´(¸x”(Ì„CCD8aĞ^ı(\\‘qrŠ3…é^2\rê{Ø…á}Øq#xŒ!ö[¯\r=?cƒGÅfŸ¼QĞ4\nš	¨ì:Œİi¢ŞJ›øÛ°\\r÷—5ÎsÃ§AÑt7PõC—Y×£Â>ªø#wj¦ÂHÚ8&1ª<`Û½M‰‘#RĞI36r¤`Ï’“îšT’”#ÆÈÒæü|Ş±3¬àR“¢@Âj¤Ñg-”}Ğ0k-(ÔĞ&gZQòL‰pÎ•&|ĞxYlÜ¿©ÔhóaÒXih4ÃBøb^ÊqAéĞÄ’”jA\0P	@Ä¤æãƒ›m>¢Ø2`PSK& Q)h—GI¡âg¬ÎÄ @eÌÉ›\r&	 ‡|ÀaùG‰ÈR‘ğècŞÊC¤X‹£Rôˆèaå]íŸÂdÈ³‹&(‹®Ä\r\rB &!‘e§`“Òˆ aL)hªÈQ3Mƒ’“ƒhuAçK6· MÉÉ;-Ø­P¬	ZÄ\\Ö96–ÌÄ{ëU¡´óV-ƒRl&=¨¸ô¾WSa€œ3-âê†–òpÎ¤qJ\$± §Õ¨P¼`sG¨€š\0Â£>ÖC	ÊZà 	¤u|Àç²›ˆÏš%1†“ŠÉêFíÊt\"JIÙ‘,›iêU…˜Izñ3D¤#@ kûXF¢’éÂA™qD!5<ö‰Ùn7êœßJh§JBódÇ˜Æód§“B ¦Ò£âIMª^±Äöôcş¨v¡U5îÙê¹&\r†ÀVĞ\"ûé®B<˜NH'ó¨a’–d0™ äy&à4‚\0ª%08¤IÑ5MVĞi¥H°ÁTjµV*ã±QÚÆTPæM[h1é­rìkÉŠà•Á„bàIˆ\n/Ä™Ù¸qSêÃE%[0]éå•-úÖÜ´¦Rw£ğc(Á×\nsÌO\"tMKÉ)8±\r(-SŒY\"±æ4ë…bàyÂZT(@(\"‡‹(iÌú¼ë)¶›#\ruov‚Õ]Å›hë¡<EÀ";break;case"ta":$g="àW* øiÀ¯FÁ\\Hd_†«•Ğô+ÁBQpÌÌ 9‚¢Ğt\\U„«¤êô@‚W¡à(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ğa;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êü¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	&°BÎá%0dB•‘ªBÊ³­(BÖ¶nK‚æ*Îªä9QÜÄB›À4Ã:¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n*Ã[È;Á\0Ê9Cxä¯³ü0oÈ7½ïŞ:\$\ná5O„à9óPÈàEÈŠ ˆ¯ŒR’ƒ´äZÄ©’\0éBnzŞéAêÄ¥¬J<>ãpæ4ãr€K)T¶±Bğ|%(D‹ëFF¸“\r,t©]T–jrõ¹°¢«DÉø¦:=KW-D4:\0´•È©]_¢4¤bçÂ-Ê,«W¨B¾G \rÃz‹Ä6ìO&ËrÌ¤Ê²pŞİñÕŠ€I‰´GÄÎ=´´:2½éF6JrùZÒ{<¹­î„CM,ös|Ÿ8Ê7£-Õ@×ìªZ6|†Y–ª¬L©×\"#s*MãìB#öÿ=‹ûá5LÃv`ñSÙ¥<2Ô-ERTN6ˆ¶iJéµéB¿Âõ”2”¬¶•{iY\n«Z•û¬â9Yk„BOÖ1Ò””©P³aéÒ²Y%Òê´™ØwÂ)mª;du·¾ê°Ìuua°mSJGUÅU±Êá(É_z(Çr	fŞÇ;ÆO¥/xòA j„ŸHéqI]ÛèIqîêzßŞ\\\rIØ‹T³ÓşŞèŒM\\ÊJU¤Û×E'R.Ùy26§*±<ºù9\\Öö•Î¡ZµôáùzuÌ¯¦×û§øœÒóÀûÇä#||Ugú·±±±¿ğÓŸ™qaa˜\\äß³ÒFå½sz]Ÿã%[éøÀÈ\\`»Œ€ˆ…êÃ€MŸšT \r¹Á¤@ĞM	 è)…0 /\r¡´…°ó\rÃÈ]ihDÛAHòš¡½Q%!ãÕ¼@\n;gt0‡#ÄÃ0f\r‰ 2œDE£#d¤\rc&sÂØóÏjl5Õ/yå\r¡„7@UuaŒ÷‡0ÌC` (a\$0X|C”n!œ0¤€A!œ mIÔû‚€æ\nb³Ï]ä¤œ*æêğŠ)}÷±¸Ê[ØâÒc…I“¨\rÎúa>™šUF’A\0A’(7&xşÕ*£‰œÀÂw¢pf ˆ4@è˜:à¼;ÌĞ\\Qe¢gÉ¨3‚ö|Ó›6\0‚ }6O²Hàğ†|€^x·kè°±Ö;¢¹Ë“Óºv‹ù6[Ú* \"+vtœ+—FpÙ½B5öÃ”J³+Á58päy“úN=\0Ó”½—á¢`Ì9‹1æLË™¡ŞgË8¨šæ¤Ö\rÓY³õK7L\0>	&œö1PÜ'\$æf@ŠŸŞãÏ•<!¬ñ”ú™ã\\µ¦ó ¥	ÕÑ vè‰²²’¶WCEÍºªåİ©+ÁP4 ÂæÚ¥ÜõÇÄxƒ‚g•ÉŠ¸ğÂ¨ryqÖ;Ç˜÷!«aù>5”*gÓl0†Àç\$P{½RÈL3ÅBÍØ®RE ”*s¬Êá-A@\$‘T¤½“QLª)”0ÉŸ{\\0xë›Ó~‚¥–µ¢qÊyÏIë=¡•Ç§°äûNÉâÆ”0ïq+e‰ÒøKğæŸ£¤‡L§æ¢†àá#(€sP\n\nµŸ Æ)àióVûxƒa•ÑVÜ0¤ŠA³0Ê½÷YÊ¢êk¶ÎÆ~5gVÂ`*C‡éM&®œæpb×{oıÄÁ•@Õ¡±¿ËÊªè\$‹ğ³—hÈ4Ö¸KúĞñ\no-5[˜†l›³wK‚€ãq‡†&üâ\n·±À€ÈQ-ÕW€Tr\n/Êx—®âœ¼U;ˆÇW–üadšj°oí9à’GÃÉÜ4¸óÈˆn¨èøDàâOzxÉ¤6ËM-h}ÜL¡Œ¡§r“ñî8³²güä³vĞtF\0 Â˜TÈˆ‡O­4™Ò¯ ê¥Lå²Íı¡8GC˜Ò«L*ì!L»AM (—¸3^ ê§\rjÌ‘:Ş<”¥Bn°á˜—b#do(E»^ÛÔ˜Q	€ƒZ³Õ/Â0T´Ñ±Ç†“NŸ\$>rÎ„‚/M\$°ùpª`+­¶OûøØˆŒÈë%ü±İ%=âÇ2Öñß3åÕà‘½·Fşqm.€’}Ãm@ñ(aşødŸrÊ*û8^ëÈ#`äõ‰\0ß[sKï¸Ç\"¿¬£’iù)Éà×)Gpˆà†²`+Ï¤1†°AZ¥øv±¹ÂßSÊ~C4n¨Åx#\\*y+“ÅîÁT*`Z¬¸Ì‰\$¯qİVğ™¹ªØ÷ME¼¹‡g·Û÷‰<ü“UñóP€y—ØÙ´¶X:œÍİnØ“Ò\níÈK¯¹\\`éİrANaÛËŒĞ%ù°×lŒ,ÛĞ~Õ)Wy¸Fù\$LÓGp­ıêl\"\0PMéıEô¨µk\n:ÆÍÏ°ğ¾/‚mp)PÙ®Uai‰GÚw£ro‹,ğ…éã§c°»dAH[Or‘UŸW\nFoüêªœPô/ŞVâÖª…\0 ™³:uÓ>§÷÷lÉÄqêÇVe7Ö Ä\n4fö gÖ”/zúõ&H\0cBÎ:Z[ĞAïŞbDà¦øÀÊ­ˆIhx‚/b†–¦ÂîlÓì8úOšğíBi°Rão¦oùP>Q\r8Ğï4‡¢\"ü'dõ§t8Blu‚ğÀî5Pv7'~Z®ÒÔ`|ğ†S„Qí@KŠBˆEÀ";break;case"th":$g="à\\! ˆMÀ¹@À0tD\0†Â \nX:&\0§€*à\n8Ş\0­	EÃ30‚/\0ZB (^\0µAàK…2\0ª•À&«‰bâ8¸KGàn‚ŒÄà	I”?J\\£)«Šbå.˜®)ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ğj65˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©7;ZÁá4	=j„¸´Ş.óùê°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€èù£€È0xè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$\rü6¹ÃĞ¼J±¶+šçº.º6»”Qó„Ÿ¨1ÚÚå`P¦ö#pÎ¬¢ª²P.åJVİ!ëó\0ğ0@Pª7\roˆî7(ä9\rã’°\"@`Â9½ã Şş>xèpá8Ïã„î9óˆÉ»iúØƒ+ÅÌÂ¿¶)Ã¤Œ6MJÔŸ¥1lY\$ºO*U @¤ÅÅ,ÇÓ£šœ8nƒx\\5²T(¢6/\n5’Œ8ç» ©BNÍH\\I1rlãH¼àÃ”ÄY;rò|¬¨ÕŒIMä&€‹3I £hğ§¤Ë_ÈQÒB1£·,Ûnm1,µÈ;›,«dƒµE„;˜€&iüdÇà(UZÙb­§©!N’ªÌTÚE‰Ü^±º«„›»m†0´NpLü×Áã6Ù;ŞÄeC–R2(Ü9#~o¼•,””jÍÃe9.Û‹9W}ÊÇÄäÒsĞ…+)ıwV\rCª_XTÆÖ;¤ŸÄ„´ˆ+õ¢\0Yçò=¹‹®û\ná²GPÓƒ,ÅŠªg(Èî’íèívë\$#\"LåCIr¢/àøA j„Ÿ(«(b®×wÍ¾ºDÎÚ4é`ZíbìÙ`\\m‹lœÜíd•ŠÊ™Ù[Ší:®ğŞ,°±d0ïØÎjvÊ«8g†\\jîîà¸ºŠu‡«½…T¸t±ijÃğŞ'Mã äeSÉU_UxQüÆSÙîúº®ØÄH\$	Ğš&‡B˜§xIÊì(±„@/tÎİà ^ÍX¸¡uß´Ââ’{\\EˆÀè€Qè=A„9ğŞƒ0lJ¡”âœÑP–âÒmÂ0¬¾„”ò›ëeCFä*óäCn €:³pêÃüa˜:†À@xgJ¡ÌàåÃg)TE@JáƒjU¨0Rƒár mG	FdoÖá?u%\rÅ¨›ë+Pö&ƒú™Xug	XÉCrn‰¡3€È›\0<'®†`zƒ@tÀ9ƒ ^Ã¼™Á†?Â4äœC8/¡¸§¦ZÌ¤@úS DªÁà/ ø¬8…*UKƒm(°¬’³Z©Œ®HÆŞ×ËSb1íÑ³eÈó\ráÒE í°Sn®JÀMNè™(`æ¢RmÀ4ÁÕ\"dXh‘²>HÉ9+%äÈw“rv@Éğå(e¢f²œ3 ^Œ@>	!´8Û(Ã¤±–l¦ƒ pŞáø ‡¬÷†•\n›¡Ä\rÁÑö¬sPsVÊ*­E\\˜ A-¦ü©a ÷†Ç*Ğ çâ##ŞtxTÃÍ7?ˆ3~\"Dh‘“e3@çú–(\0ÃAÁ\0cœÔ 4†Ø¯Ş‰:G=\r>ap«]2°S„ê¬efê*õ`[•ˆ”+2¶ÀA\0P	@ƒ\nUKÿ.\nÀ“·w&zæuK¤©•R®‚:4¾WŸãä}±ø?A•Ã(0äê	O©ş«D€ïe)Zn¢§öE‡5\rbªl@ôT7¶|Ô:‰N; €Æ(iòDSj˜{ÃaP‘‡MapÁÎúºVrô0¦‚3‡c§IòF&ErUM^<0EY±·4XAoŒW\\.tcİi]¬]e&KØ[½ouE…N¥’ª±a]-…ØáÂèÚAÍ;nîa7ÕNVâD.îi¡u|VI%'¤@ÒáŠOºˆ ƒûCˆu?‰ü3'\0Ûg¤ˆµi°1Ä„ñS,Ò†?h>î\"Û¼çàet™ç×ÛÄVÊé=¤e\$\\cL·0\nU\$ÏŞÌ|’È\0–pé¶!BQñ.y\nÂ¦:ôc™Kme©\\óÂïUŠĞjY‰P|)pSb‰pH°Ån©8Q	€€3Y @}äXF\n•Ò¸`ÓA\$UÄ˜™@&ãÜœšªHmªÆêÇ!0\r‹ì[\rõ!¥²£S=u1‰Àé„‚°	{0o²÷IŠ7ÇÎFTVYYõiQâ©ÔMüñå`Ú[c¹­¨K4Fèã­ŠÉÛW¡†ÀW‹CHc\ryL€û‘Î3G*emÍÒ°³ğmIşßE@ª0-²Bad¬V\"»‡;i5LiRç°Nn=Öº²×²ï_›éA[\0ï²zpA3°À(&ĞğÒƒÉYà™½ª6FÃs_ßå©Öœô8WDÃá7Mq¢„ÀÒÍŠYS§…Í>\$K¶šNÔ9Í2i@’§]2ÙK8çQ˜2áa Q+07ç@ÚœSÊu]NJò²®Ñ¡´sÅ†+á¤xÒ-hb•Âï-}WÒe?4¾Ê”(ëa9±efí÷„VJîøkÆÅÏ9£hç0Ba+§¿U×”8G#ëâŸÁ\"fŠr;¤³A^\0";break;case"tr":$g="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥Ğßv§‡K…Ês¼ŒfSd†˜kXjyaäÊt5ÁÏXlFó:´Ú‰i–£x½²Æ\\õFša6ˆ3ú¬²]7›F	¸Óº¿™AE=é”É 4É\\¹KªK:åL&àQTÜk7Îğ8ñÊKH0ãFºfe9ˆ<8S™Ôàp’áNÃ™ŞJ2\$ê(@:NØèŸ\rƒ\n„ŸŒÚl4£î0@5»0J€Ÿ©	¢/‰Š¦©ã¢„îS°íBã†:/’B¹l-ĞPÒ45¡\n6»iA`ĞƒH ª`P2ê`éHìÚ<ƒ4mÛ ³@3¦üF9±­t’·Ctº¢>32èÜƒ8#šN&\r#œ;¢M‚öÚ\r#…ÂÉôTXB„7Á24 4¬¬JbãJƒB‹4\\'-HJ2&ÌèÒôÈòÔ©­İÁ–.˜HÁ iT†2†\rÑO+K¢<¹j\nØ0S‚Ô¥++,åŒ¬Úú¿•x#£Hâ<˜µNê¾¹.˜£®:2Ù£È[	xØç…Ôå00µ–å“o£7\n?q):Ê4®{–)‡B ˆhˆ¶<àÈºŒ#Z3ŒàP¬—¢)N\r’Xaêj?z§Ë*|9§Ğ¸ô“Šc¨Ü:©ø™Ÿ\rxÊÍŠ0á\0Ì0PH@7§cêÜŒ,ÜxÛ\rÉàã¢Ã„2'×-:\"8ƒHÖ‹n†C£[‡Z£¹èòÑ\$â~k›Ó+,Ÿ9–šÙ;z!b“ˆ#\"Ö°¤Q³*xê|ÑÖId:²Œ£X×·VÊˆ¸Ğ9£0z\r è8aĞ^üˆ]tmhğ\\’Œázb¦sè4¸!xD={‰b²®ƒáTyx²²,ˆxŒ!ö³­·#œ[Ÿª4 È:…\0Ø¼ƒ4=¨êhÅÔh8îÑ1˜ÍÂ8Èt^pˆ7{q¡p@À“ò‡BG˜ábÌ³igp|/Äñ|oÈüÔrÜÇ47sSJb›à\"( ùÂfïÙ³v¨M\n·œšĞufÆä§ ÊTÎ9Ÿ8¬Ì6#ÇÂ,[1&GË‘<…ĞšôJˆ<6%„^tI]í|X¶.Í “\\g\"¡²ƒõšqD¡É'’Êç×xe2a®\$pªCr|åÔ‰¢HYé\n (ˆ°çázÎ ` ¢‚—Ø¬•¡Ç)…8¨\"¨@yAaŒ¶2ˆ>¦JšŠGÈÃ˜Ä‚Şƒ¥èYÖrK	rï\$gœ·…fO‹L?fLÌ0é#¤¨p*í~Ÿàä¦º±hà€†wMt—5ÑĞ:ÒN“E:Ooà !…0¤£0j3ëIïbJL[yy\$írRJÈ‰&²öbEÕÛÖR˜4,WE1â<b€£qŒ'E)\0IÌTC°`6—*;U\\89@c¢{N1£Dñ.–^ëZYûŠA¸“²Äª^Éx3@'…0¨kHùx3)«ÍT\nÄXë©*\$]\$]iD¤	PòÙAGÔ´)°ÙJÁR.ÌJLÌƒ¡H=Z…0¢éJš”\$^“<•’\nµ7çÕ‘”ô@Õ‘®8†0áÔ„!IA'4Æˆ8¼Mâ¤0¤d^#)%a0‰œäÕô¦]b7F‚e®EÍ5Meq«jºÖ\0„„\r±Sa‘¹D	øeßAœ iÙšà†’Ã`+ŠEıJPB\$†\0U\nƒ„&Ã\"	|¬uÁÈ<O¡\roRuÊ¨‘ù«!¤ÙlõİtûWW-lä¶.ÙrŞ\\K™í}&Í{DìlPA¢èô”¤Êğ\n—¾H.'ì×°¶¼Ø’YtËÊw)‘âA f6ÜŸ;nO¨`‰Ë™ƒ2™T‚¢—À³B¢ÁÑ\$¨Æ+ÆÆ[‹Ã¹ZKN×¥+m+Ê”5!M‡ìÃxp\"Ê\"2¨i;mÚ>IÖ¸ á›~\\£ı¥¾t­Ü\nÔ¥cş\0{âÀ•H„\0";break;case"uk":$g="ĞI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”CˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌĞÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZk€Àé7*¦M)4â/ñ55”CBµh¥à´¹æ	 †È ÒHT6\\›hîœt¾vc ’lüV¾–ƒ¡Y…j¦ˆ×¶‰øÔ®pNUf@¦;I“fù«\r:bÕib’ï¾¦ƒÜü’jˆ iš%l»ôh%.Ê\n§Á°{à™;¨y×\$­CC Ië,•#DôÄ–\r£5·ĞŠX?ŠjªĞ²¥‚ÖH¦)Lxİ¦(kfB®Køç‰{–ª)æ‰)Æ¯óªFHm\\¢F ‰\$j¡H!d*’²¬B²ÙÂéƒ´Õ—.C¯\$.)D\næ‰™ÄlbÌ9­kjÄ·«ª\\»´­ÌÊ¾†D’¡Òå¶\rZ\rîqdéš…1#D£&Ï?l‹&@Ô1Á M1Ä\\÷¡É`hr@:¼®Äíªş¦,¼¶‡’Î¢[\nCä*›(iàˆ4cÄ6³ø@7A\0Ê7ZV¥­lZÃ(ğ:[c˜Ò7Ô4P ôñ¡F#M2(r¼L„×JÁ4»\"ìœ´£ˆÑGUN/\0˜—;s?K«¡®„s3ªÉBcH¨(˜È‚4^„¸üœÃ&MÕr“}MÃz4—ÀPH…Á gœ†8[D5eÒ4XËÊ8[\$·]õ)_µZhFMqAmÍC^E\nˆ¬Æ¸PŠ£Ò65Ò„Ô©©\$hF…Dÿé×ƒj•Ê+¥?§Q¤‹WµI»¥\nĞ¥ªVKÍñÌ|çê¤x\\­;Ú”¤ïÛ·\0¤¤üÛÂÉ¿ï7<_ïœƒw¿Ì\\¢Í“0õTt;ˆ|¸HÑ¤9Z˜th½Çov(Ò˜ZÎ)xuÙãºÌg®CqVh\rƒ å¬ºé¿&«]ÙX Ï•„éî—¿MÙ§\$î=&Œ˜ºØ	c\nıÖZ —gãÁ?ˆ‡L±O&ÆIX¡néÉ²ÊXG¤»9çÄè’‹ådí¡®¸òâúÉ‹í}å	ı¿5’ı–kù)Éi¢?Ôä‡¢,ªš¡Èı`Y%IP9\$“\"ãÙ`³}	4…gØLàÜ#)°xæ¬£şıáN\0&øW„ppÀ’ÀÇ²õ ÁEqë	8§³Ò‹ªl9\\³nŠw8¢ù3\rãÔšûM©Tã“&QÁ\0A´4†àÊ“3—th\$¢2Øì“Ïğ „€äC0=A :@àÁĞ/áŞNàÃãìË`3‚õ¶Ã\"è!Ñs†à^ñ.%Õ¶À^AóÚ>ìPëB‚VoHy’*iˆ¨ˆÉ	]`pÕ2“eús‰ÓuJS(Yb…£²T,°¡ÕšF”z°+†ø^”²ºyQÛ-M§Ü¯®Ô²Úeê?PæşEHÉ\$\$””’ÒbMIÀï'¥~RŒ9JYN¸—\"é•²¼³ËåNry„ÑÚ[K‚®	¡ÿOñ¶7¿\"Pb_‘3@Š¬¦Ã§ÒaÔ©¾{]Gré:JÂs‹ş<Ò´IœÙŒÊñ%äœl—yMkøù•ÀSœ‘F<	VÔö‡©3ôˆÒ\r\nÍe=ÊäÛ€åJ2AlœÏAÎU«ª¬b’TÊ©kFær!ÄôŸqŒ#Fù¸'X\\@Pµµ<§³fŸcÀ(,à¦8ó”R’k›CDGM: k²\0_‹´¸–±>”*	F±°ÄJN”Îi¾u¤é\0¸–áÚºeìhÏ¯ª…\\HùkuJÌ!ê²–+iFX©ZDD3œ.ãlh\$¥^5¢JzT)À6s	ÊXÊÔiæuIJ¬0¦‚1æm•Åü77F]\"ñ]WIë&©´M£yrvBŞ3.n¡Ò‡C\\ŸÆÒÁ˜àŞ©Y•d£š	!	)÷8CªËîëzA)}0ªz‚,\$	)h–ˆ£§«Å9kë¾7E²jpíD×rq|hˆbq2í@iÚ=GÊ„o­ŠÇ†ÆMj2®ç&›ãB×É‡ˆTQ—R!°åD/\0P	áL*4w.éÒjd¹ KÇX21T –µôá+…r¬Ó·\rpâ«’¼u+ù^¤”Ë­j‚v±SAÓÎs‡Èñ \$JæŸâ•.CÍ‰\"E‡	î¢º‚Æ^²ƒ`€)…™\0ça€á*Ìq¥]4Ø*p­\"qõl¡=Í\"›>*(7Ğ¾•…Ñ(¾=ŒmOjÇBVÎt;:Ì•±ÁYõ´[6ÍÛ5‚µkœo¨ìÀ‰}ª„Ùİ*cc³±N¾ [IÇeİ«³&Û5_\0 †ôƒ`+³5‰bf+ó7œ¦w¢!ì­sH°ş¡¤Ê·h¹L«ÇCsW7È4¼Â¨TÀ´È¦ñÍÒ:[“é—/jQ{ÖL¨ÜqÅ™ÅÓtgƒÛ8®øôÀà“!¾qnF›¹.²bælÅhb\r«‰+[o]“¾ÓFÅ±æßÀŒ)ËÕbİ!©.èHY0ãtJW‚EH ÖtCƒ›Ô¤ë‰ÒŸÒŒDé\\åK£¨;{cxsë…'^pvc ˜é¬Ï? ¡”“Ûí‚‡¼|rHÑˆn½ïyKl@A1î:æW'â\n,y%oÓÊçKšòÚ‹·UiâWAÆ—ãF†&Ó^K7‚4*;Irª³Ğh˜x…œçUz(<¾eèÅÌ\"êûO˜";break;case"vi":$g="Bp®”&á†³‚š *ó(J.™„0Q,ĞÃZŒâ¤)vƒ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj[—J;±ºŠo—ç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XŞ8@q:g!ÏC½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ğ›­Àƒ}FÊÍ¼S06ÂÁ½†¡Œ÷\\İÅv¯ëàÄN5°ªn5›çx!”är7œ¥ÄC	ĞÂ1#˜Êõã(æÍã¢&:ƒóæ;¿#\"\\! %:8!KÚHÈ+°Úœ0RĞ7±®úwC(\$F]“áÒ]“+°æ0¡Ò9©jjP ˜eî„Fdš²c@êœãJ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹Âñ”È@3Êè&È!\0Úï3ZŒì0ß9Ê¤ŒHÃ(©\"Ÿ;¯mhÃ#ˆƒLn1\r?!\0Ê7?ôLwFT˜Ê<”xæ4ÅàşK(œT43ãJV« %há>%*lœ°ù‡Î¢mS)è	RÜ˜„ˆA¯°íTòƒ, ×ö\rR”Eñ*iX\$“@Â70ÌCŒ‹ÈóL…˜R1ÀSF¨A b„ĞÏ…c¦5¸%û½°PÆœ3É†Q7,tW¥Ã«UØ©Á6’C¨\$(µ­;ƒ+^Êêdœ4pÛA“^]Ö3;'I)ÁO<µ`Uz˜T#Y†T1B>F‡[(êm}HO1[#T+X	¢ht)Š`P¶<éƒÈº£hZ2€P±‰=l«.ÌCbĞ#{40PŞ3Ãc¶2¥ÓaC3båÙOj»ÅèÏÎk†Z¢t9>„úŞÓ®û7µlĞÙ….QÌÈëÕÅ«ë5lá†]ACs*0¥Ù\\„î°PñêXÑip8ÍF´Úì ŒƒnÖ9q£:4Œ°@(cFÊ3¡Ğ:ƒ€æáxïç…ÃkÛ…ÏÈÎÑáxÉ?´àÜ„A÷·HØÎã|—\níN¢›´¦§r…—ã§ÇÌÖE€lÖ(r‚…#«at+UÂWláÇTÂIk¿x/\râ¼w’òŞkÏïEé†ãìõC“×{*]L†å6ŠHÆõaBLŸ€m}©”ôÎ±ˆ)j†©`4!tZæPé#/*Ü‰ hNKVª!ò¢€@ÃHl\r…å‡ìëÃm«d0†e2¥C˜ua#`ëÃ`oM(Òh€Ñ¼Z ­•Ş†çÊCb.…E!Ä~‹ÑŠ3F©ÔĞÂî(\nzBİ\0	¢ñ3DxK‘Äf‰oGh]Aè˜ùˆäšÈ4¥âÛ™AèC „#Hw‹n¨û 9ZPÃšŒ€€íÆùxƒ€uBI\n%²Ùì0vÁãÅI|ÑÂm©µxtËACaL)fú_ÚALÉee’”æIPfi‹¡V]RñANQU)5î.ÑY%Ikà@\nÎcâ&†ÂÌ:-|N—cŠOÓË\rˆ‹Š“ˆ~\$AS¦kNÂ;ÁI.	\$H<¶#Öï%tE\rÌÕ vÊj2\nÇàé»Gm”©Qä4 )\"ĞŒ¨?miµ’B‡Š!,á@'…0¨á3‹'0E†9nH—y0†Ø›“’vqIí \"Ş¯Ï¸r.…,“b±P‚‡IšGt…¼úä¡±WˆU‚>ô@]‚0T’=ÃÎSŸ&ƒÆ\$Lœ#Øeª)&¨H&×Nwİ\r•“–r@péfSiÑ1% —9„Y>#ö&…ş§¡v%R8NC¢”‚2Ñì\"ô~Eş¸bĞ•á© 9&’bQiâo~íÖ!‹¡bcRRº T*`Z-B³³Ô³\"dê#>²qî‡â@ÅkvHôœ£A‹ÙÓ2– ê´ài&WÂ„Ef_\\Ú\n¿—ÕÚÒql-í‹·âìE™²ŠmZ³X´WÊğµÅz´ÍšsUsd¶4–˜RpT;Â€‚ähà`s„\$D9™\$Y(»«PìXŠ*ªÂÂK­\rŞÙNUr.•Úí]ëÇ\n{Ö!Ò•4¨ªæ›*ë““\0‘»Ø¾ö˜G:ŒÕê²9 ";break;case"zh":$g="æA*ês•\\šr¤îõâ|%ÌÂ:\$\nr.®„ö2Šr/d²È»[8Ğ S™8€r©!T¡\\¸s¦’I4¢b§r¬ñ•Ğ€Js!J¥“É:Ú2r«STâ¢”\n†Ìh5\rÇSRº9QÉ÷*-Y(eÈ—B†­+²¯Î…òFZI9PªYj^F•X9‘ªê¼Pæ¸ÜÜÉÔ¥2s&Ö’Eƒ¡~™Œª®·yc‘~¨¦#}K•r¶s®Ôûkõ|¿iµ-rÙÍ€Á)c(¸ÊC«İ¦#*ÛJ!A–R\nõk¡P€Œ/Wît¢¢ZœU9ÓêWJQ3ÓWãq¨*é'Os%îdbÊ¯C9Ô¿Mnr;NáPÁ)ÅÁZâ´'1Tœ¥‰*†J;’©§)nY5ªª®¨’ç9XS#%’ÊîœÄAns–%ÙÊO-ç30¥*\\OœÄ¹lt’å¢0]Œñ6r‘²Ê^’-‰8´å\0Jœ¤Ù|r—¥\nÃ‘)V½Š¹ÎS0Œ9„),„•òò0‘´¿0Ápi+\r‘»F¼¯kéÊL»ĞJ[¡\$jÒü?D\nÊLÅEé*ä>’í	(PìáÊ]—QsÅ¡ã AR–LëI SA bH¥¤8s–’’N]œÄ\"†^‘§9zW%¤s]î‘AÉ±ÑÊEtIÌE•1j¨’IW)©i:R9TŒÙÒQ5L±	jœ¤y#dPA-, 6•¨ŸB÷-Î@?‹ÁÎG\n£¼\$	Ğš&‡B˜¦cÎ<‹¡pÚ6…Ã ÈYU™I=€PØ:Ij-—g9t_œ…ÑÆ“ŠPÎóÍC­=C&%‰ĞZFEbäÄ3Ä:bM!‘é^[¨×YC\$’ØHÇI•ózñ’?—EYcBçA`Q@Ûº ŒƒhÒ7£–zÿt\$Š‰íÅÙX!\0Ğ9£0z\r è8aĞ^ü(\\0ì;Ê\rãÎŒ£p^2\rãpÂ:\r<¨^ÌS0VÈateŠxt”%©ÒN”Haã|#á4éµ¾sìùş”F³š¥«£1U\0ıÂÅ—vNêVé»oÖù¿p	ÃqÈ9qœw!É£ÀéÈ|Ï\$(áóıAwaÙMi!rsdªmÄÌX!r!G(ŒÈl_ˆWPŠ„‚e;¤…ÛŠñ:|O™õ1¢´Ra&#V1AËé¨5&º€‡8›\$F‘•’Á‹xLÁ¤ ¡N]Da2\"qe&Ô\\”4‚\n&\0 ‚l}©0GÀ¡PèŠ;®x„hÁRng„ğæÂ• Î\"_™”â¬W®QFcH	|gsò~ÎYsAàğ–qÌ(ãg3ë”W‘Áz9”á÷‹dZ#\\·ÄÄe-i4PÓ‹„@ aL)`@IÅ\$W†\$¬ÿ;õ¹—A£¢5§ÁĞ-„+Ë&Ê&“bpNàæÂÕI4¡RğåByaŠ¾†Å0‚ÂxNãzd!È‰\$â9°=¦Ê¼¤Ë?ÂÄA;Ôø!Eš8KQÔ:§XUÂ€O\naQ0³LEQ?–ı+ò‚\$X¡‹LM¦\0K9jšÇH…VªÜr‰<.Å\$`@q“A\0íÅø‡ÁP(òB(	ú+aL(„Â˜O|Ã%Ì™”'ˆôpPÚñ9ÇAÔ˜BcÃÉ3&lK\n;GèÈ²7æÁÒq6+‘x]R>6Râ\n#Ä¼UJÄrÁs#&½á\rŒÃ{&Ò`‡V|HÊ #Ø¿pÀÓ\nãâ.P™=Ã–Àx>wB¨TÀ´a, J½3†&‹˜8–FÈëYb¤é­‚ìjê°”,@L•xZf€è\"PÓ!§k1¸;-xrú:D˜¾ŠG_×‘s]jx¼Cb(P{ÌÓ;*âZÙâ<˜ƒ©uiH—KDH€.fÄIË´Z…Œ-(]ˆœ²Ò)\n‚AOâñ+ŠÚaÑ£*©V\n+Ft«¼0RUâ«¢„T‹\0";break;case"zh-tw":$g="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÂ:\$\ns¡.ešUÈ¸E9PK72©(æP¢h)Ê…@º:i	%“Êcè§Je åR)Ü«{º	Nd TâPˆ£\\ªÔÃ•8¨CˆÈf4†ãÌaS@/%Èäû•N‹¦¬’Ndâ%Ğ³C¹’É—B…Q+–¹Öê‡Bñ_MK,ª\$õÆçu»ŞowÔfš‚T9®WK´ÍÊW¹•ˆ§2mizX:P	—*‘½_/Ùg*eSLK¶Ûˆú™Î¹^9×HÌ\rºÛÕ7ºŒZz>‹ êÔ0)È¿Nï\nÙr!U=R\n¤ôÉÖ^¯ÜéJÅÑTçO©](ÅI–Ø^Ü«¥]EÌJ4\$yhr•ä2^?[ ô½eCr‘º^[#åk¢Ö‘g1'¤)ÌT'9jB)#›,§%')näªª»hV’èùdô=OaĞ@§IBO¤òàs¥Â¦K©¤¹Jºç12A\$±&ë8mQd€¨ÁlY»r—%ò\0J£Ô€D&©¹HiËå1Ä¡ÌDÇ)*OÎ\nTå:N0Ô9DÚB+ê°â°¥yÊL«)pYÊ@ÅÔs“%Ú^R©¥pr\$-1M´ã˜Æ%DM•ÈxÈCÈè2…˜R¦“Ù SA b€©¤8¡®!v]œÄ!*åíZsÄ“öGIê~ƒ¥ÄZ<^“–É\\CD=²MÓEi te­”[:ÅñtåS¬\\Y„º°—z\\W‡)]%Ñ\\	€àjM^¡7eÜ]–Óa_*ÊÀ\$Bhš\nb˜-9ò.…ÃhÚƒ%Ård;òLC`è92åAÒM”L4rD3,r…Òè©QˆÅ3`•ç€”…Œ€K´HÜ‚t\$r€M!„aÑaA C\$‚ª_‡IFIM‘	ù<høNBçAXN ©P ŒƒhÒ7£–³­µäs¥r¡‹ZH‡ƒ@4C(Ì„C@è:˜t…ã¿D;îÿÀ…Ãxä3…ã(ÜŒƒxÜ0ƒOd„AñÌF’\r|†A§Ä9Ï+Õ\$\nD‡xÂÀP¦2cŸl7kÑ^¨GI³­EGMç÷Å)ÅE—·\$0'ÊòüÏ7ÎóıGÒïÜ\0åÔõ}o^CÂ³\rÏYÛ‚\"”œ\"~¢ÄJ¼×ŸD°¹#‚Tt\ná&Aœ:TrˆÁ,e›Õzíx_£‘@ğE«NÉàö\"qZ)Ğ Xv*œÛpŸo(4s‰´„\$!6É\r	¦”#d¢|[™DØ˜Ù/P…˜ã8²…Ú_?èZ&P@@PNQE¡ø¨!Jyo”©d,MP£Z‚•Î\"`‘£‰b™ƒ\n•*e|êY\nÅqp Àç,ã˜PÆ²ja ^erPÄrô@bTG£¨‚ÀK`åqğ–&¤™	° aL)`@xkuÆÂ>Ä&Eáª&%ør‰a\\~²9j¤¼˜“9Œ0®©\0\\6b‹„äˆ(&µÇsG(Š”Ú\na9„ğœÆ`å™²ê9EğoåÀ©‰r 	Š\nÂÄA=á:D¸œI¢\$sB÷’:Dè¢2Á@'…0¨y@E\0S˜Ì.ÙCMàØ§1,àáŒ›3m=&Rd+H1-1ôTñ^²€Ol#@ NÉ³¡ˆôE…0¢	Á½9 ´5IEƒVT§àT¾¥UEsé¥ñ2x_I¥4æ%Tª¹)j‰‰9µV¤MÉJ	XY®«Š°Ï¡!b…ìpâıˆÁ@xCfa°åÖã¢sÇ0Ÿ'æºj%#(uÅqÿ(œ“XJªJ‚=T*`Z*6Œú)¶»¥)#duª2Æ]QYz†:ÂşÀ‰Ar¶DÉRÂ¨†¨'¨x›VóàNaÔAÇ‡g²ÜŠøâˆ„€ä^VÁx\"TİRjì¼ñ\\u6…VÈ %6hÎt^IM\"\0Î\\	À¸k\"1‚¾¥Çt@¤eÂŒ^’ë*ÀïrŠT¤¸«Ğ“ø9–2È<TPÉ—ãÅxæe£´¢å#Ä|";break;}$Bg=array();foreach(explode("\n",lzw_decompress($g))as$X)$Bg[]=(strpos($X,"\t")?explode("\t",$X):$X);return$Bg;}if(!$Bg){$Bg=get_translations($ba);$_SESSION["translations"]=$Bg;}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$Re=array_search("SQL",$b->operators);if($Re!==false)unset($b->operators[$Re]);}function
dsn($Pb,$V,$E,$B=array()){try{$this->pdo=new
PDO($Pb,$V,$E,$B);}catch(Exception$ec){auth_error(h($ec->getMessage()));}$this->pdo->setAttribute(3,1);$this->pdo->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->pdo->getAttribute(4);}function
quote($Q){return$this->pdo->quote($Q);}function
query($F,$Kg=false){$H=$this->pdo->query($F);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($H);return$H;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($F,$p=0){$H=$this->query($F);if(!$H)return
false;$J=$H->fetch();return$J[$p];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$Mb=array();class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$b,$w;$ud=(count($Mc)<count($L));$F=$b->selectQueryBuild($L,$Z,$Mc,$_e,$y,$C);if(!$F)$F="SELECT".limit(($_GET["page"]!="last"&&$y!=""&&$Mc&&$ud&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Mc&&$ud?"\nGROUP BY ".implode(", ",$Mc):"").($_e?"\nORDER BY ".implode(", ",$_e):""),($y!=""?+$y:null),($C?$y*$C:0),"\n");$Wf=microtime(true);$I=$this->_conn->query($F);if($We)echo$b->selectQuery($F,$Wf,!$I);return$I;}function
delete($R,$G,$y=0){$F="FROM ".table($R);return
queries("DELETE".($y?limit1($R,$F,$G):" $F$G"));}function
update($R,$O,$G,$y=0,$M="\n"){$Zg=array();foreach($O
as$x=>$X)$Zg[]="$x = $X";$F=table($R)." SET$M".implode(",$M",$Zg);return
queries("UPDATE".($y?limit1($R,$F,$G,$M):" $F$G"));}function
insert($R,$O){return
queries("INSERT INTO ".table($R).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($R,$K,$Ue){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($F,$qg){}function
convertSearch($t,$X,$p){return$t;}function
value($X,$p){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$p):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($wf){return
q($wf);}function
warnings(){return'';}function
tableHelp($A){}}$Mb["sqlite"]="SQLite 3";$Mb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Se=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($tc){$this->_link=new
SQLite3($tc);$bh=$this->_link->version();$this->server_info=$bh["versionString"];}function
query($F){$H=@$this->_link->query($F);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($tc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($tc);}function
query($F,$Kg=false){$de=($Kg?"unbufferedQuery":"query");$H=@$this->_link->$de($F,SQLITE_BOTH,$o);$this->error="";if(!$H){$this->error=$o;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$x=>$X)$I[($x[0]=='"'?idf_unescape($x):$x)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$A=$this->_result->fieldName($this->_offset++);$Me='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Me\\.)?$Me\$~",$A,$_)){$R=($_[3]!=""?$_[3]:idf_unescape($_[2]));$A=($_[5]!=""?$_[5]:idf_unescape($_[4]));}return(object)array("name"=>$A,"orgname"=>$A,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($tc){$this->dsn(DRIVER.":$tc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($tc){if(is_readable($tc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$tc)?$tc:dirname($_SERVER["SCRIPT_FILENAME"])."/$tc")." AS a")){parent::__construct($tc);$this->query("PRAGMA foreign_keys = 1");$this->query("PRAGMA busy_timeout = 500");return
true;}return
false;}function
multi_query($F){return$this->_result=$this->query($F);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$Ue){$Zg=array();foreach($K
as$O)$Zg[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Zg));}function
tableHelp($A){if($A=="sqlite_sequence")return"fileformat2.html#seqtab";if($A=="sqlite_master")return"fileformat2.html#$A";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?" OFFSET $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){global$h;return(preg_match('~^INTO~',$F)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($F,$Z,1,0,$M):" $F WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$M."LIMIT 1)");}function
db_collation($m,$fb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($l){return
array();}function
table_status($A=""){global$h;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$J){$J["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($A!=""?$I[$A]:$I);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$h;$I=array();$Ue="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$J){$A=$J["name"];$U=strtolower($J["type"]);$Db=$J["dflt_value"];$I[$A]=array("field"=>$A,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Db,$_)?str_replace("''","'",$_[1]):($Db=="NULL"?null:$Db)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($Ue!="")$I[$Ue]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$I[$A]["auto_increment"]=true;$Ue=$A;}}$Tf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Tf,$Ud,PREG_SET_ORDER);foreach($Ud
as$_){$A=str_replace('""','"',preg_replace('~^"|"$~','',$_[1]));if($I[$A])$I[$A]["collation"]=trim($_[3],"'");}return$I;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$I=array();$Tf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Tf,$_)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$_[1],$Ud,PREG_SET_ORDER);foreach($Ud
as$_){$I[""]["columns"][]=idf_unescape($_[2]).$_[4];$I[""]["descs"][]=(preg_match('~DESC~i',$_[5])?'1':null);}}if(!$I){foreach(fields($R)as$A=>$p){if($p["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($A),"lengths"=>array(),"descs"=>array(null));}}$Uf=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$J){$A=$J["name"];$u=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$u["lengths"]=array();$u["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($A).")",$i)as$vf){$u["columns"][]=$vf["name"];$u["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($A).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Uf[$A],$jf)){preg_match_all('/("[^"]*+")+( DESC)?/',$jf[2],$Ud);foreach($Ud[2]as$x=>$X){if($X)$u["descs"][$x]='1';}}if(!$I[""]||$u["type"]!="UNIQUE"||$u["columns"]!=$I[""]["columns"]||$u["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$A))$I[$A]=$u;}return$I;}function
foreign_keys($R){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$J){$Ec=&$I[$J["id"]];if(!$Ec)$Ec=$J;$Ec["source"][]=$J["from"];$Ec["target"][]=$J["to"];}return$I;}function
view($A){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($A))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($A){global$h;$lc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($lc)\$~",$A)){$h->error=lang(23,str_replace("|",", ",$lc));return
false;}return
true;}function
create_database($m,$d){global$h;if(file_exists($m)){$h->error=lang(24);return
false;}if(!check_sqlite_name($m))return
false;try{$z=new
Min_SQLite($m);}catch(Exception$ec){$h->error=$ec->getMessage();return
false;}$z->query('PRAGMA encoding = "UTF-8"');$z->query('CREATE TABLE adminer (i)');$z->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->__construct(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error=lang(24);return
false;}}return
true;}function
rename_database($A,$d){global$h;if(!check_sqlite_name($A))return
false;$h->__construct(":memory:");$h->error=lang(24);return@rename(DB,$A);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){global$h;$Vg=($R==""||$Bc);foreach($q
as$p){if($p[0]!=""||!$p[1]||$p[2]){$Vg=true;break;}}$c=array();$Ce=array();foreach($q
as$p){if($p[1]){$c[]=($Vg?$p[1]:"ADD ".implode($p[1]));if($p[0]!="")$Ce[$p[0]]=$p[1][0];}}if(!$Vg){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$A&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)))return
false;}elseif(!recreate_table($R,$A,$c,$Ce,$Bc,$Ga))return
false;if($Ga){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ga WHERE name = ".q($A));if(!$h->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($A).", $Ga)");queries("COMMIT");}return
true;}function
recreate_table($R,$A,$q,$Ce,$Bc,$Ga,$v=array()){global$h;if($R!=""){if(!$q){foreach(fields($R)as$x=>$p){if($v)$p["auto_increment"]=0;$q[]=process_field($p,$p);$Ce[$x]=idf_escape($x);}}$Ve=false;foreach($q
as$p){if($p[6])$Ve=true;}$Ob=array();foreach($v
as$x=>$X){if($X[2]=="DROP"){$Ob[$X[1]]=true;unset($v[$x]);}}foreach(indexes($R)as$_d=>$u){$f=array();foreach($u["columns"]as$x=>$e){if(!$Ce[$e])continue
2;$f[]=$Ce[$e].($u["descs"][$x]?" DESC":"");}if(!$Ob[$_d]){if($u["type"]!="PRIMARY"||!$Ve)$v[]=array($u["type"],$_d,$f);}}foreach($v
as$x=>$X){if($X[0]=="PRIMARY"){unset($v[$x]);$Bc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$_d=>$Ec){foreach($Ec["source"]as$x=>$e){if(!$Ce[$e])continue
2;$Ec["source"][$x]=idf_unescape($Ce[$e]);}if(!isset($Bc[" $_d"]))$Bc[]=" ".format_foreign_key($Ec);}queries("BEGIN");}foreach($q
as$x=>$p)$q[$x]="  ".implode($p);$q=array_merge($q,array_filter($Bc));$kg=($R==$A?"adminer_$A":$A);if(!queries("CREATE TABLE ".table($kg)." (\n".implode(",\n",$q)."\n)"))return
false;if($R!=""){if($Ce&&!queries("INSERT INTO ".table($kg)." (".implode(", ",$Ce).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Ce)))." FROM ".table($R)))return
false;$Hg=array();foreach(triggers($R)as$Fg=>$rg){$Eg=trigger($Fg);$Hg[]="CREATE TRIGGER ".idf_escape($Fg)." ".implode(" ",$rg)." ON ".table($A)."\n$Eg[Statement]";}$Ga=$Ga?0:$h->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($R));if(!queries("DROP TABLE ".table($R))||($R==$A&&!queries("ALTER TABLE ".table($kg)." RENAME TO ".table($A)))||!alter_indexes($A,$v))return
false;if($Ga)queries("UPDATE sqlite_sequence SET seq = $Ga WHERE name = ".q($A));foreach($Hg
as$Eg){if(!queries($Eg))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$A,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($A!=""?$A:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$Ue){if($Ue[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($dh){return
apply_queries("DROP VIEW",$dh);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$dh,$jg){return
false;}function
trigger($A){global$h;if($A=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$t='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Gg=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$t\\s*(".implode("|",$Gg["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($t))?\\s+ON\\s*$t\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($A)),$_);$pe=$_[3];return
array("Timing"=>strtoupper($_[1]),"Event"=>strtoupper($_[2]).($pe?" OF":""),"Of"=>($pe[0]=='`'||$pe[0]=='"'?idf_unescape($pe):$pe),"Trigger"=>$A,"Statement"=>$_[4],);}function
triggers($R){$I=array();$Gg=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$J){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Gg["Timing"]).')\s*(.*?)\s+ON\b~i',$J["sql"],$_);$I[$J["name"]]=array($_[1],$_[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$F){return$h->query("EXPLAIN QUERY PLAN $F");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($yf){return
true;}function
create_sql($R,$Ga,$ag){global$h;$I=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$A=>$u){if($A=='')continue;$I.=";\n\n".index_sql($R,$u['type'],$A,"(".implode(", ",array_map('idf_escape',$u['columns'])).")");}return$I;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$x)$I[$x]=$h->result("PRAGMA $x");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$ye){list($x,$X)=explode("=",$ye,2);$I[$x]=$X;}return$I;}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$pc);}$w="sqlite";$Jg=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Zf=array_keys($Jg);$Qg=array();$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Lc=array("hex","length","lower","round","unixepoch","upper");$Pc=array("avg","count","count distinct","group_concat","max","min","sum");$Rb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Mb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Se=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($bc,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($N,$V,$E){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($E,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$bh=pg_version($this->_link);$this->server_info=$bh["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$p){return($p["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($F,$Kg=false){$H=@pg_query($this->_link,$F);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);$I=false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);$I=true;}else$I=new
Min_Result($H);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$I;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$p);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$e);$I->name=pg_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$e);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($N,$V,$E){global$b;$m=$b->database();$this->dsn("pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' client_encoding=utf8 dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$E);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
quoteBinary($wf){return
q($wf);}function
query($F,$Kg=false){$I=parent::query($F,$Kg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$I;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$Ue){global$h;foreach($K
as$O){$Rg=array();$Z=array();foreach($O
as$x=>$X){$Rg[]="$x = $X";if(isset($Ue[idf_unescape($x)]))$Z[]="$x = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Rg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}function
slowQuery($F,$qg){$this->_conn->query("SET statement_timeout = ".(1000*$qg));$this->_conn->timeout=1000*$qg;return$F;}function
convertSearch($t,$X,$p){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$p["type"])?$t:"CAST($t AS text)");}function
quoteBinary($wf){return$this->_conn->quoteBinary($wf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($A){$Md=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$z=$Md[$_GET["ns"]];if($z)return"$z-".str_replace("_","-",$A).".html";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Jg,$Zf;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Zf[lang(25)][]="json";$Jg["json"]=4294967295;if(min_version(9.4,0,$h)){$Zf[lang(25)][]="jsonb";$Jg["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?" OFFSET $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){return(preg_match('~^INTO~',$F)?limit($F,$Z,1,0,$M):" $F".(is_view(table_status1($R))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$M."LIMIT 1)"));}function
db_collation($m,$fb){global$h;return$h->result("SELECT datcollate FROM pg_database WHERE datname = ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$F="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$F.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$F.="
ORDER BY 1";return
get_key_vals($F);}function
count_tables($l){return
array();}function
table_status($A=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f', 'p')
".($A!=""?"AND relname = ".q($A):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($A!=""?$I[$A]:$I);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$I=array();$xa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$cd=min_version(10)?'a.attidentity':'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $cd AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$_);list(,$U,$Jd,$J["length"],$sa,$za)=$_;$J["length"].=$za;$Wa=$U.$sa;if(isset($xa[$Wa])){$J["type"]=$xa[$Wa];$J["full_type"]=$J["type"].$Jd.$za;}else{$J["type"]=$U;$J["full_type"]=$J["type"].$Jd.$sa.$za;}if(in_array($J['identity'],array('a','d')))$J['default']='GENERATED '.($J['identity']=='d'?'BY DEFAULT':'ALWAYS').' AS IDENTITY';$J["null"]=!$J["attnotnull"];$J["auto_increment"]=$J['identity']||preg_match('~^nextval\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$J["default"],$_))$J["default"]=($_[1]=="NULL"?null:(($_[1][0]=="'"?idf_unescape($_[1]):$_[1]).$_[2]));$I[$J["field"]]=$J;}return$I;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$I=array();$hg=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $hg AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $hg AND ci.oid = i.indexrelid",$i)as$J){$kf=$J["relname"];$I[$kf]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$kf]["columns"]=array();foreach(explode(" ",$J["indkey"])as$kd)$I[$kf]["columns"][]=$f[$kd];$I[$kf]["descs"]=array();foreach(explode(" ",$J["indoption"])as$ld)$I[$kf]["descs"][]=($ld&1?'1':null);$I[$kf]["lengths"]=array();}return$I;}function
foreign_keys($R){global$se;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$_)){$J['source']=array_map('trim',explode(',',$_[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$_[2],$Td)){$J['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Td[2]));$J['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Td[4]));}$J['target']=array_map('trim',explode(',',$_[3]));$J['on_delete']=(preg_match("~ON DELETE ($se)~",$_[4],$Td)?$Td[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($se)~",$_[4],$Td)?$Td[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
constraints($R){global$se;$I=array();foreach(get_rows("SELECT conname, consrc
FROM pg_catalog.pg_constraint
INNER JOIN pg_catalog.pg_namespace ON pg_constraint.connamespace = pg_namespace.oid
INNER JOIN pg_catalog.pg_class ON pg_constraint.conrelid = pg_class.oid AND pg_constraint.connamespace = pg_class.relnamespace
WHERE pg_constraint.contype = 'c'
AND conrelid != 0 -- handle only CONSTRAINTs here, not TYPES
AND nspname = current_schema()
AND relname = ".q($R)."
ORDER BY connamespace, conname")as$J)$I[$J['conname']]=$J['consrc'];return$I;}function
view($A){global$h;return
array("select"=>trim($h->result("SELECT pg_get_viewdef(".$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($A)).")")));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$I=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$I,$_))$I=$_[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($_[3]).'})(.*)~','\1<b>\2</b>',$_[2]).$_[4];return
nl_br($I);}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($A,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($A));}function
auto_increment(){return(min_version(11)?" PRIMARY KEY":"");}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=array();$cf=array();if($R!=""&&$R!=$A)$cf[]="ALTER TABLE ".table($R)." RENAME TO ".table($A);foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c[]="DROP $e";else{$Yg=$X[5];unset($X[5]);if(isset($X[6])&&$p[0]=="")$X[1]=($X[1]==" bigint"?" big":($X[1]==" smallint"?" small":" "))."serial";if($p[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$cf[]="ALTER TABLE ".table($A)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($p[0]!=""||$Yg!="")$cf[]="COMMENT ON COLUMN ".table($A).".$X[0] IS ".($Yg!=""?substr($Yg,9):"''");}}$c=array_merge($c,$Bc);if($R=="")array_unshift($cf,"CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($cf,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""||$jb!="")$cf[]="COMMENT ON TABLE ".table($A)." IS ".q($jb);if($Ga!=""){}foreach($cf
as$F){if(!queries($F))return
false;}return
true;}function
alter_indexes($R,$c){$vb=array();$Nb=array();$cf=array();foreach($c
as$X){if($X[0]!="INDEX")$vb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Nb[]=idf_escape($X[1]);else$cf[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($vb)array_unshift($cf,"ALTER TABLE ".table($R).implode(",",$vb));if($Nb)array_unshift($cf,"DROP INDEX ".implode(", ",$Nb));foreach($cf
as$F){if(!queries($F))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($dh){return
drop_tables($dh);}function
drop_tables($T){foreach($T
as$R){$P=table_status($R);if(!queries("DROP ".strtoupper($P["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$dh,$jg){foreach(array_merge($T,$dh)as$R){$P=table_status($R);if(!queries("ALTER ".strtoupper($P["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($jg)))return
false;}return
true;}function
trigger($A,$R=null){if($A=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$K=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($A));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$J)$I[$J["trigger_name"]]=array($J["action_timing"],$J["event_manipulation"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($A,$U){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($A));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($A).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($A,$J){$I=array();foreach($J["fields"]as$p)$I[]=$p["type"];return
idf_escape($A)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($h,$F){return$h->query("EXPLAIN $F");}function
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$jf))return$jf[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($xf,$i=null){global$h,$Jg,$Zf;if(!$i)$i=$h;$I=$i->query("SET search_path TO ".idf_escape($xf));foreach(types()as$U){if(!isset($Jg[$U])){$Jg[$U]=0;$Zf[lang(26)][]=$U;}}return$I;}function
foreign_keys_sql($R){$I="";$P=table_status($R);$zc=foreign_keys($R);ksort($zc);foreach($zc
as$yc=>$xc)$I.="ALTER TABLE ONLY ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." ADD CONSTRAINT ".idf_escape($yc)." $xc[definition] ".($xc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE').";\n";return($I?"$I\n":$I);}function
create_sql($R,$Ga,$ag){global$h;$I='';$tf=array();$Gf=array();$P=table_status($R);if(is_view($P)){$ch=view($R);return
rtrim("CREATE VIEW ".idf_escape($R)." AS $ch[select]",";");}$q=fields($R);$v=indexes($R);ksort($v);$rb=constraints($R);if(!$P||empty($q))return
false;$I="CREATE TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." (\n    ";foreach($q
as$qc=>$p){$Ie=idf_escape($p['field']).' '.$p['full_type'].default_value($p).($p['attnotnull']?" NOT NULL":"");$tf[]=$Ie;if(preg_match('~nextval\(\'([^\']+)\'\)~',$p['default'],$Ud)){$Ff=$Ud[1];$Sf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($Ff):"SELECT * FROM $Ff"));$Gf[]=($ag=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $Ff;\n":"")."CREATE SEQUENCE $Ff INCREMENT $Sf[increment_by] MINVALUE $Sf[min_value] MAXVALUE $Sf[max_value] START ".($Ga?$Sf['last_value']:1)." CACHE $Sf[cache_value];";}}if(!empty($Gf))$I=implode("\n\n",$Gf)."\n\n$I";foreach($v
as$fd=>$u){switch($u['type']){case'UNIQUE':$tf[]="CONSTRAINT ".idf_escape($fd)." UNIQUE (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;case'PRIMARY':$tf[]="CONSTRAINT ".idf_escape($fd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;}}foreach($rb
as$nb=>$pb)$tf[]="CONSTRAINT ".idf_escape($nb)." CHECK $pb";$I.=implode(",\n    ",$tf)."\n) WITH (oids = ".($P['Oid']?'true':'false').");";foreach($v
as$fd=>$u){if($u['type']=='INDEX'){$f=array();foreach($u['columns']as$x=>$X)$f[]=idf_escape($X).($u['descs'][$x]?" DESC":"");$I.="\n\nCREATE INDEX ".idf_escape($fd)." ON ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." USING btree (".implode(', ',$f).");";}}if($P['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." IS ".q($P['Comment']).";";foreach($q
as$qc=>$p){if($p['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($P['nspname']).".".idf_escape($P['Name']).".".idf_escape($qc)." IS ".q($p['comment']).";";}return
rtrim($I,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$P=table_status($R);$I="";foreach(triggers($R)as$Dg=>$Cg){$Eg=trigger($Dg,$P['Name']);$I.="\nCREATE TRIGGER ".idf_escape($Eg['Trigger'])." $Eg[Timing] $Eg[Events] ON ".idf_escape($P["nspname"]).".".idf_escape($P['Name'])." $Eg[Type] $Eg[Statement];;\n";}return$I;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$pc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}$w="pgsql";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Lc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Mb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Se=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($bc,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($N,$V,$E){$this->_link=@oci_new_connect($V,$E,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$o=oci_error();$this->error=$o["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($F,$Kg=false){$H=oci_parse($this->_link,$F);$this->error="";if(!$H){$o=oci_error($this->_link);$this->errno=$o["code"];$this->error=$o["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);}return$I;}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=1){$H=$this->query($F);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$p);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$x=>$X){if(is_a($X,'OCI-Lob'))$J[$x]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$e);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$E){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$E);return
true;}function
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($F,$Z,$y,$qe=0,$M=" "){return($qe?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $F$Z) t WHERE rownum <= ".($y+$qe).") WHERE rnum > $qe":($y!==null?" * FROM (SELECT $F$Z) WHERE rownum <= ".($y+$qe):" $F$Z"));}function
limit1($R,$F,$Z,$M="\n"){return" $F$Z";}function
db_collation($m,$fb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($A=""){$I=array();$zf=q($A);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($A!=""?" AND table_name = $zf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($A!=""?" WHERE view_name = $zf":"")."
ORDER BY 1")as$J){if($A!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$J){$U=$J["DATA_TYPE"];$Jd="$J[DATA_PRECISION],$J[DATA_SCALE]";if($Jd==",")$Jd=$J["DATA_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$U.($Jd?"($Jd)":""),"type"=>strtolower($U),"length"=>$Jd,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($R,$i=null){$I=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$J){$fd=$J["INDEX_NAME"];$I[$fd]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$fd]["columns"][]=$J["COLUMN_NAME"];$I[$fd]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$fd]["descs"][]=($J["DESCEND"]?'1':null);}return$I;}function
view($A){$K=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($A));return
reset($K);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$F){$h->query("EXPLAIN PLAN FOR $F");return$h->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=$Nb=array();foreach($q
as$p){$X=$p[1];if($X&&$p[0]!=""&&idf_escape($p[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($p[0])." TO $X[0]");if($X)$c[]=($R!=""?($p[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Nb[]=idf_escape($p[0]);}if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Nb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Nb).")"))&&($R==$A||queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)));}function
foreign_keys($R){$I=array();$F="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($F)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
apply_queries("DROP VIEW",$dh);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($yf,$i=null){global$h;if(!$i)$i=$h;return$i->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($yf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$pc);}$w="oracle";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Lc=array("length","lower","round","upper");$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Mb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Se=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$o){$this->errno=$o["code"];$this->error.="$o[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$E){global$b;$m=$b->database();$ob=array("UID"=>$V,"PWD"=>$E,"CharacterSet"=>"UTF-8");if($m!="")$ob["Database"]=$m;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$N),$ob);if($this->_link){$md=sqlsrv_server_info($this->_link);$this->server_info=$md['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($F,$Kg=false){$H=sqlsrv_query($this->_link,$F);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($F){$this->_result=sqlsrv_query($this->_link,$F);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$p];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$x=>$X){if(is_a($X,'DateTime'))$J[$x]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$p=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$p["Name"];$I->orgname=$p["Name"];$I->type=($p["Type"]==1?254:0);return$I;}function
seek($qe){for($r=0;$r<$qe;$r++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$E){$this->_link=@mssql_connect($N,$V,$E);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($H){$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($F,$Kg=false){$H=@mssql_query($F,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($F,$p=0){$H=$this->query($F);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($qe){mssql_data_seek($this->_result,$qe);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($N,$V,$E){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$E);return
true;}function
select_db($k){return$this->query("USE ".idf_escape($k));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$Ue){foreach($K
as$O){$Rg=array();$Z=array();foreach($O
as$x=>$X){$Rg[]="$x = $X";if(isset($Ue[idf_unescape($x)]))$Z[]="$x = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Rg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($t){return"[".str_replace("]","]]",$t)."]";}function
table($t){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($F,$Z,$y,$qe=0,$M=" "){return($y!==null?" TOP (".($y+$qe).")":"")." $F$Z";}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$I=array();foreach($l
as$m){$h->select_db($m);$I[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($A=""){$I=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$J){if($A!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$kb=get_key_vals("SELECT objname, cast(value as varchar(max)) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($R).", 'column', NULL)");$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$J){$U=$J["type"];$Jd=(preg_match("~char|binary~",$U)?$J["max_length"]:($U=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$U.($Jd?"($Jd)":""),"type"=>$U,"length"=>$Jd,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],"comment"=>$kb[$J["name"]],);}return$I;}function
indexes($R,$i=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$i)as$J){$A=$J["name"];$I[$A]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$A]["lengths"]=array();$I[$A]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$A]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($A){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($A))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$I[preg_replace('~_.*~','',$d)][]=$d;return$I;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($A,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($A));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=array();$kb=array();foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$kb[$p[0]]=$X[5];unset($X[5]);if($p[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($Bc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($A)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$A)queries("EXEC sp_rename ".q(table($R)).", ".q($A));if($Bc)$c[""]=$Bc;foreach($c
as$x=>$X){if(!queries("ALTER TABLE ".idf_escape($A)." $x".implode(",",$X)))return
false;}foreach($kb
as$x=>$X){$jb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$jb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));}return
true;}function
alter_indexes($R,$c){$u=array();$Nb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Nb[]=idf_escape($X[1]);else$u[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$u||queries("DROP INDEX ".implode(", ",$u)))&&(!$Nb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Nb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$F){$h->query("SET SHOWPLAN_ALL ON");$I=$h->query($F);$h->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($S,$Z){}function
foreign_keys($R){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$J){$Ec=&$I[$J["FK_NAME"]];$Ec["db"]=$J["PKTABLE_QUALIFIER"];$Ec["table"]=$J["PKTABLE_NAME"];$Ec["source"][]=$J["FKCOLUMN_NAME"];$Ec["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
queries("DROP VIEW ".implode(", ",array_map('table',$dh)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$dh,$jg){return
apply_queries("ALTER SCHEMA ".idf_escape($jg)." TRANSFER",array_merge($T,$dh));}function
trigger($A){if($A=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($A));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$I["text"]);return$I;}function
triggers($R){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($xf){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
support($pc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$pc);}$w="mssql";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Lc=array("len","lower","round","upper");$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Mb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Se=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$E){$this->_link=ibase_connect($N,$V,$E);if($this->_link){$Ug=explode(':',$N);$this->service_link=ibase_service_attach($Ug[0],$V,$E);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return($k=="domain");}function
query($F,$Kg=false){$H=ibase_query($F,$this->_link);if(!$H){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($H===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);if(!$H||!$H->num_rows)return
false;$J=$H->fetch_row();return$J[$p];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$p=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$p['name'],'orgname'=>$p['name'],'type'=>$p['type'],'charsetnr'=>$p['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($_c){return
array("domain");}function
limit($F,$Z,$y,$qe=0,$M=" "){$I='';$I.=($y!==null?$M."FIRST $y".($qe?" SKIP $qe":""):"");$I.=" $F$Z";return$I;}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){}function
engines(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){global$h;$F='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$H=ibase_query($h->_link,$F);$I=array();while($J=ibase_fetch_assoc($H))$I[$J['RDB$RELATION_NAME']]='table';ksort($I);return$I;}function
count_tables($l){return
array();}function
table_status($A="",$oc=false){global$h;$I=array();$_b=tables_list();foreach($_b
as$u=>$X){$u=trim($u);$I[$u]=array('Name'=>$u,'Engine'=>'standard',);if($A==$u)return$I[$u];}return$I;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$h;$I=array();$F='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$H=ibase_query($h->_link,$F);while($J=ibase_fetch_assoc($H))$I[trim($J['FIELD_NAME'])]=array("field"=>trim($J["FIELD_NAME"]),"full_type"=>trim($J["FIELD_TYPE"]),"type"=>trim($J["FIELD_SUB_TYPE"]),"default"=>trim($J['FIELD_DEFAULT_VALUE']),"null"=>(trim($J["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($J["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($J["FIELD_DESCRIPTION"]),);return$I;}function
indexes($R,$i=null){$I=array();return$I;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($xf){return
true;}function
support($pc){return
preg_match("~^(columns|sql|status|table)$~",$pc);}$w="firebird";$xe=array("=");$Lc=array();$Pc=array();$Rb=array();}$Mb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Se=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($F,$Kg=false){$D=array('SelectExpression'=>$F,'ConsistentRead'=>'true');if($this->next)$D['NextToken']=$this->next;$H=sdb_request_all('Select','Item',$D,$this->timeout);$this->timeout=0;if($H===false)return$H;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$F)){$dg=0;foreach($H
as$wd)$dg+=$wd->Attribute->Value;$H=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$dg,))));}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($H){foreach($H
as$wd){$J=array();if($wd->Name!='')$J['itemName()']=(string)$wd->Name;foreach($wd->Attribute
as$Ca){$A=$this->_processValue($Ca->Name);$Y=$this->_processValue($Ca->Value);if(isset($J[$A])){$J[$A]=(array)$J[$A];$J[$A][]=$Y;}else$J[$A]=$Y;}$this->_rows[]=$J;foreach($J
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Tb){return(is_object($Tb)&&$Tb['encoding']=='base64'?base64_decode($Tb):(string)$Tb);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$x=>$X)$I[$x]=$J[$x];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$Ad=array_keys($this->_rows[0]);return(object)array('name'=>$Ad[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Ue="itemName()";function
_chunkRequest($dd,$ra,$D,$hc=array()){global$h;foreach(array_chunk($dd,25)as$Za){$He=$D;foreach($Za
as$r=>$s){$He["Item.$r.ItemName"]=$s;foreach($hc
as$x=>$X)$He["Item.$r.$x"]=$X;}if(!sdb_request($ra,$He))return
false;}$h->affected_rows=count($dd);return
true;}function
_extractIds($R,$G,$y){$I=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$G,$Ud))$I=array_map('idf_unescape',$Ud[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$G.($y?" LIMIT 1":"")))as$wd)$I[]=$wd->Name;}return$I;}function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$h;$h->next=$_GET["next"];$I=parent::select($R,$L,$Z,$Mc,$_e,$y,$C,$We);$h->next=0;return$I;}function
delete($R,$G,$y=0){return$this->_chunkRequest($this->_extractIds($R,$G,$y),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$O,$G,$y=0,$M="\n"){$Eb=array();$qd=array();$r=0;$dd=$this->_extractIds($R,$G,$y);$s=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$x=>$X){$x=idf_unescape($x);if($X=="NULL"||($s!=""&&array($s)!=$dd))$Eb["Attribute.".count($Eb).".Name"]=$x;if($X!="NULL"){foreach((array)$X
as$xd=>$W){$qd["Attribute.$r.Name"]=$x;$qd["Attribute.$r.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$xd)$qd["Attribute.$r.Replace"]="true";$r++;}}}$D=array('DomainName'=>$R);return(!$qd||$this->_chunkRequest(($s!=""?array($s):$dd),'BatchPutAttributes',$D,$qd))&&(!$Eb||$this->_chunkRequest($dd,'BatchDeleteAttributes',$D,$Eb));}function
insert($R,$O){$D=array("DomainName"=>$R);$r=0;foreach($O
as$A=>$Y){if($Y!="NULL"){$A=idf_unescape($A);if($A=="itemName()")$D["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$D["Attribute.$r.Name"]=$A;$D["Attribute.$r.Value"]=(is_array($Y)?$X:idf_unescape($Y));$r++;}}}}return
sdb_request('PutAttributes',$D);}function
insertUpdate($R,$K,$Ue){foreach($K
as$O){if(!$this->update($R,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($F,$qg){$this->_conn->timeout=$qg;return$F;}}function
connect(){global$b;list(,,$E)=$b->credentials();if($E!="")return
lang(22);return
new
Min_DB;}function
support($pc){return
preg_match('~sql~',$pc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$fb){}function
tables_list(){global$h;$I=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$I[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$I;}function
table_status($A="",$oc=false){$I=array();foreach(($A!=""?array($A=>true):tables_list())as$R=>$U){$J=array("Name"=>$R,"Auto_increment"=>"");if(!$oc){$ce=sdb_request('DomainMetadata',array('DomainName'=>$R));if($ce){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$x=>$X)$J[$x]=(string)$ce->$X;}}if($A!="")return$J;$I[$R]=$J;}return$I;}function
explain($h,$F){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($t){return
idf_escape($t);}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y":"");}function
unconvert_field($p,$I){return$I;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$A)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($wa,$_b,$x,$gf=false){$Pa=64;if(strlen($x)>$Pa)$x=pack("H*",$wa($x));$x=str_pad($x,$Pa,"\0");$yd=$x^str_repeat("\x36",$Pa);$zd=$x^str_repeat("\x5C",$Pa);$I=$wa($zd.pack("H*",$wa($yd.$_b)));if($gf)$I=pack("H*",$I);return$I;}function
sdb_request($ra,$D=array()){global$b,$h;list($Zc,$D['AWSAccessKeyId'],$_f)=$b->credentials();$D['Action']=$ra;$D['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$D['Version']='2009-04-15';$D['SignatureVersion']=2;$D['SignatureMethod']='HmacSHA1';ksort($D);$F='';foreach($D
as$x=>$X)$F.='&'.rawurlencode($x).'='.rawurlencode($X);$F=str_replace('%7E','~',substr($F,1));$F.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Zc)."\n/\n$F",$_f,true)));@ini_set('track_errors',1);$sc=@file_get_contents((preg_match('~^https?://~',$Zc)?$Zc:"http://$Zc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$F,'ignore_errors'=>1,))));if(!$sc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$oh=simplexml_load_string($sc);if(!$oh){$o=libxml_get_last_error();$h->error=$o->message;return
false;}if($oh->Errors){$o=$oh->Errors->Error;$h->error="$o->Message ($o->Code)";return
false;}$h->error='';$ig=$ra."Result";return($oh->$ig?$oh->$ig:true);}function
sdb_request_all($ra,$ig,$D=array(),$qg=0){$I=array();$Wf=($qg?microtime(true):0);$y=(preg_match('~LIMIT\s+(\d+)\s*$~i',$D['SelectExpression'],$_)?$_[1]:0);do{$oh=sdb_request($ra,$D);if(!$oh)break;foreach($oh->$ig
as$Tb)$I[]=$Tb;if($y&&count($I)>=$y){$_GET["next"]=$oh->NextToken;break;}if($qg&&microtime(true)-$Wf>$qg)return
false;$D['NextToken']=$oh->NextToken;if($y)$D['SelectExpression']=preg_replace('~\d+\s*$~',$y-count($I),$D['SelectExpression']);}while($oh->NextToken);return$I;}$w="simpledb";$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Lc=array();$Pc=array("count");$Rb=array(array("json"));}$Mb["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Se=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Sg,$B){$bb='MongoDB\Driver\Manager';return
new$bb($Sg,$B);}function
query($F){return
false;}function
select_db($k){$this->_db_name=$k;return
true;}function
quote($Q){return$Q;}function
ping($z){$bb='MongoDB\Driver\Command';$z->executeCommand('admin',new$bb(array('ping'=>1)));}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$wd){$J=array();foreach($wd
as$x=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$x]=63;$J[$x]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=$H->count;}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$x=>$X)$I[$x]=$J[$x];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$Ad=array_keys($this->_rows[0]);$A=$Ad[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Ue="_id";function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$h;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$Pf=array();foreach($_e
as$X){$X=preg_replace('~ DESC$~','',$X,1,$ub);$Pf[$X]=($ub?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$y=$_GET['limit'];$y=min(200,max(1,(int)$y));$Mf=$C*$y;$bb='MongoDB\Driver\Query';$F=new$bb($Z,array('projection'=>$L,'limit'=>$y,'skip'=>$Mf,'sort'=>$Pf));$sf=$h->_link->executeQuery("$h->_db_name.$R",$F);return
new
Min_Result($sf);}function
update($R,$O,$G,$y=0,$M="\n"){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($G);$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());if(isset($O['_id']))unset($O['_id']);$lf=array();foreach($O
as$x=>$Y){if($Y=='NULL'){$lf[$x]=1;unset($O[$x]);}}$Rg=array('$set'=>$O);if(count($lf))$Rg['$unset']=$lf;$Ta->update($Z,$Rg,array('upsert'=>false));$sf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$sf->getModifiedCount();return
true;}function
delete($R,$G,$y=0){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($G);$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());$Ta->delete($Z,array('limit'=>$y));$sf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$sf->getDeletedCount();return
true;}function
insert($R,$O){global$h;$m=$h->_db_name;$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());if(isset($O['_id'])&&empty($O['_id']))unset($O['_id']);$Ta->insert($O);$sf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$sf->getInsertedCount();return
true;}}function
get_databases($_c){global$h;$I=array();$bb='MongoDB\Driver\Command';$ib=new$bb(array('listDatabases'=>1));$sf=$h->_link->executeCommand('admin',$ib);foreach($sf
as$Bb){foreach($Bb->databases
as$m)$I[]=$m->name;}return$I;}function
count_tables($l){$I=array();return$I;}function
tables_list(){global$h;$bb='MongoDB\Driver\Command';$ib=new$bb(array('listCollections'=>1));$sf=$h->_link->executeCommand($h->_db_name,$ib);$gb=array();foreach($sf
as$H)$gb[$H->name]='table';return$gb;}function
drop_databases($l){return
false;}function
indexes($R,$i=null){global$h;$I=array();$bb='MongoDB\Driver\Command';$ib=new$bb(array('listIndexes'=>$R));$sf=$h->_link->executeCommand($h->_db_name,$ib);foreach($sf
as$u){$Hb=array();$f=array();foreach(get_object_vars($u->key)as$e=>$U){$Hb[]=($U==-1?'1':null);$f[]=$e;}$I[$u->name]=array("type"=>($u->name=="_id_"?"PRIMARY":(isset($u->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Hb,);}return$I;}function
fields($R){$q=fields_from_edit();if(!count($q)){global$n;$H=$n->select($R,array("*"),null,null,array(),10);while($J=$H->fetch_assoc()){foreach($J
as$x=>$X){$J[$x]=null;$q[$x]=array("field"=>$x,"type"=>"string","null"=>($x!=$n->primary),"auto_increment"=>($x==$n->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$q;}function
found_rows($S,$Z){global$h;$Z=where_to_query($Z);$bb='MongoDB\Driver\Command';$ib=new$bb(array('count'=>$S['Name'],'query'=>$Z));$sf=$h->_link->executeCommand($h->_db_name,$ib);$xg=$sf->toArray();return$xg[0]->n;}function
sql_query_where_parser($G){$G=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$G));$G=preg_replace('/\)\)\)$/',')',$G);$lh=explode(' AND ',$G);$mh=explode(') OR (',$G);$Z=array();foreach($lh
as$jh)$Z[]=trim($jh);if(count($mh)==1)$mh=array();elseif(count($mh)>1)$Z=array();return
where_to_query($Z,$mh);}function
where_to_query($hh=array(),$ih=array()){global$b;$_b=array();foreach(array('and'=>$hh,'or'=>$ih)as$U=>$Z){if(is_array($Z)){foreach($Z
as$ic){list($eb,$ve,$X)=explode(" ",$ic,3);if($eb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$bb='MongoDB\BSON\ObjectID';$X=new$bb($X);}if(!in_array($ve,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$ve,$_)){$X=(float)$X;$ve=$_[1];}elseif(preg_match('~^\(date\)(.+)~',$ve,$_)){$Ab=new
DateTime($X);$bb='MongoDB\BSON\UTCDatetime';$X=new$bb($Ab->getTimestamp()*1000);$ve=$_[1];}switch($ve){case'=':$ve='$eq';break;case'!=':$ve='$ne';break;case'>':$ve='$gt';break;case'<':$ve='$lt';break;case'>=':$ve='$gte';break;case'<=':$ve='$lte';break;case'regex':$ve='$regex';break;default:continue
2;}if($U=='and')$_b['$and'][]=array($eb=>array($ve=>$X));elseif($U=='or')$_b['$or'][]=array($eb=>array($ve=>$X));}}}return$_b;}$xe=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}elseif(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Sg,$B){return@new
MongoClient($Sg,$B);}function
query($F){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$ec){$this->error=$ec->getMessage();return
false;}}function
quote($Q){return$Q;}function
ping($z){}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$wd){$J=array();foreach($wd
as$x=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$x]=63;$J[$x]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$x=>$X)$I[$x]=$J[$x];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$Ad=array_keys($this->_rows[0]);$A=$Ad[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Ue="_id";function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){$L=($L==array("*")?array():array_fill_keys($L,true));$Pf=array();foreach($_e
as$X){$X=preg_replace('~ DESC$~','',$X,1,$ub);$Pf[$X]=($ub?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$L)->sort($Pf)->limit($y!=""?+$y:0)->skip($C*$y));}function
insert($R,$O){try{$I=$this->_conn->_db->selectCollection($R)->insert($O);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$O['_id'];return!$I['err'];}catch(Exception$ec){$this->_conn->error=$ec->getMessage();return
false;}}}function
get_databases($_c){global$h;$I=array();$Bb=$h->_link->listDBs();foreach($Bb['databases']as$m)$I[]=$m['name'];return$I;}function
count_tables($l){global$h;$I=array();foreach($l
as$m)$I[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$I;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($l){global$h;foreach($l
as$m){$pf=$h->_link->selectDB($m)->drop();if(!$pf['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$I=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$u){$Hb=array();foreach($u["key"]as$e=>$U)$Hb[]=($U==-1?'1':null);$I[$u["name"]]=array("type"=>($u["name"]=="_id_"?"PRIMARY":($u["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($u["key"]),"lengths"=>array(),"descs"=>$Hb,);}return$I;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$xe=array("=");}function
table($t){return$t;}function
idf_escape($t){return$t;}function
table_status($A="",$oc=false){$I=array();foreach(tables_list()as$R=>$U){$I[$R]=array("Name"=>$R);if($A==$R)return$I[$R];}return$I;}function
create_database($m,$d){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
connect(){global$b;$h=new
Min_DB;list($N,$V,$E)=$b->credentials();$B=array();if($V.$E!=""){$B["username"]=$V;$B["password"]=$E;}$m=$b->database();if($m!="")$B["db"]=$m;if(($Fa=getenv("MONGO_AUTH_SOURCE")))$B["authSource"]=$Fa;try{$h->_link=$h->connect("mongodb://$N",$B);if($E!=""){$B["password"]="";try{$h->ping($h->connect("mongodb://$N",$B));return
lang(22);}catch(Exception$ec){}}return$h;}catch(Exception$ec){return$ec->getMessage();}}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$A,$O)=$X;if($O=="DROP")$I=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$A));else{$f=array();foreach($O
as$e){$e=preg_replace('~ DESC$~','',$e,1,$ub);$f[$e]=($ub?-1:1);}$I=$h->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$A,));}if($I['errmsg']){$h->error=$I['errmsg'];return
false;}}return
true;}function
support($pc){return
preg_match("~database|indexes|descidx~",$pc);}function
db_collation($m,$fb){}function
information_schema(){}function
is_view($S){}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){global$h;if($R==""){$h->_db->createCollection($A);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$pf=$h->_db->selectCollection($R)->drop();if(!$pf['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$pf=$h->_db->selectCollection($R)->remove();if(!$pf['ok'])return
false;}return
true;}$w="mongo";$Lc=array();$Pc=array();$Rb=array(array("json"));}$Mb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Se=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url,$_db;function
rootQuery($Le,$sb=array(),$de='GET'){@ini_set('track_errors',1);$sc=@file_get_contents("$this->_url/".ltrim($Le,'/'),false,stream_context_create(array('http'=>array('method'=>$de,'content'=>$sb===null?$sb:json_encode($sb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$sc){$this->error=$php_errormsg;return$sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$I=json_decode($sc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$qb=get_defined_constants(true);foreach($qb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return$I;}function
query($Le,$sb=array(),$de='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Le,'/'),$sb,$de);}function
connect($N,$V,$E){preg_match('~^(https?://)?(.*)~',$N,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$E@$_[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($K);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$L,$Z,$Mc,$_e=array(),$y=1,$C=0,$We=false){global$b;$_b=array();$F="$R/_search";if($L!=array("*"))$_b["fields"]=$L;if($_e){$Pf=array();foreach($_e
as$eb){$eb=preg_replace('~ DESC$~','',$eb,1,$ub);$Pf[]=($ub?array($eb=>"desc"):$eb);}$_b["sort"]=$Pf;}if($y){$_b["size"]=+$y;if($C)$_b["from"]=($C*$y);}foreach($Z
as$X){list($eb,$ve,$X)=explode(" ",$X,3);if($eb=="_id")$_b["query"]["ids"]["values"][]=$X;elseif($eb.$X!=""){$lg=array("term"=>array(($eb!=""?$eb:"_all")=>$X));if($ve=="=")$_b["query"]["filtered"]["filter"]["and"][]=$lg;else$_b["query"]["filtered"]["query"]["bool"]["must"][]=$lg;}}if($_b["query"]&&!$_b["query"]["filtered"]["query"]&&!$_b["query"]["ids"])$_b["query"]["filtered"]["query"]=array("match_all"=>array());$Wf=microtime(true);$zf=$this->_conn->query($F,$_b);if($We)echo$b->selectQuery("$F: ".json_encode($_b),$Wf,!$zf);if(!$zf)return
false;$I=array();foreach($zf['hits']['hits']as$Yc){$J=array();if($L==array("*"))$J["_id"]=$Yc["_id"];$q=$Yc['_source'];if($L!=array("*")){$q=array();foreach($L
as$x)$q[$x]=$Yc['fields'][$x];}foreach($q
as$x=>$X){if($_b["fields"])$X=$X[0];$J[$x]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($U,$hf,$G,$y=0,$M="\n"){$Ke=preg_split('~ *= *~',$G);if(count($Ke)==2){$s=trim($Ke[1]);$F="$U/$s";return$this->_conn->query($F,$hf,'POST');}return
false;}function
insert($U,$hf){$s="";$F="$U/$s";$pf=$this->_conn->query($F,$hf,'POST');$this->_conn->last_id=$pf['_id'];return$pf['created'];}function
delete($U,$G,$y=0){$dd=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$dd[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Va){$Ke=preg_split('~ *= *~',$Va);if(count($Ke)==2)$dd[]=trim($Ke[1]);}}$this->_conn->affected_rows=0;foreach($dd
as$s){$F="{$U}/{$s}";$pf=$this->_conn->query($F,'{}','DELETE');if(is_array($pf)&&$pf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($N,$V,$E)=$b->credentials();if($E!=""&&$h->connect($N,$V,""))return
lang(22);if($h->connect($N,$V,$E))return$h;return$h->error;}function
support($pc){return
preg_match("~database|table|columns~",$pc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$I=$h->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($m,$fb){}function
engines(){return
array();}function
count_tables($l){global$h;$I=array();$H=$h->query('_stats');if($H&&$H['indices']){$jd=$H['indices'];foreach($jd
as$id=>$Xf){$hd=$Xf['total']['indexing'];$I[$id]=$hd['index_total'];}}return$I;}function
tables_list(){global$h;if(min_version(6))return
array('_doc'=>'table');$I=$h->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$h->_db]["mappings"]),'table');return$I;}function
table_status($A="",$oc=false){global$h;$zf=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($zf){$T=$zf["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$I[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($A!=""&&$A==$R["key"])return$I[$A];}}return$I;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$Qd=array();if(min_version(6)){$H=$h->query("_mapping");if($H)$Qd=$H[$h->_db]['mappings']['properties'];}else{$H=$h->query("$R/_mapping");if($H){$Qd=$H[$R]['properties'];if(!$Qd)$Qd=$H[$h->_db]['mappings'][$R]['properties'];}}$I=array();if($Qd){foreach($Qd
as$A=>$p){$I[$A]=array("field"=>$A,"full_type"=>$p["type"],"type"=>$p["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($p["properties"]){unset($I[$A]["privileges"]["insert"]);unset($I[$A]["privileges"]["update"]);}}}return$I;}function
foreign_keys($R){return
array();}function
table($t){return$t;}function
idf_escape($t){return$t;}function
convert_field($p){}function
unconvert_field($p,$I){return$I;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),null,'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){global$h;$Ze=array();foreach($q
as$mc){$qc=trim($mc[1][0]);$rc=trim($mc[1][1]?$mc[1][1]:"text");$Ze[$qc]=array('type'=>$rc);}if(!empty($Ze))$Ze=array('properties'=>$Ze);return$h->query("_mapping/{$A}",$Ze,'PUT');}function
drop_tables($T){global$h;$I=true;foreach($T
as$R)$I=$I&&$h->query(urlencode($R),array(),'DELETE');return$I;}function
last_id(){global$h;return$h->last_id;}$w="elastic";$xe=array("=","query");$Lc=array();$Pc=array();$Rb=array(array("json"));$Jg=array();$Zf=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}}$Mb["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($m,$F){@ini_set('track_errors',1);$sc=@file_get_contents("$this->_url/?database=$m",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($F)?"$F FORMAT JSONCompact":$F,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($sc===false){$this->error=$php_errormsg;return$sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=lang(32)." $http_response_header[0]";return
false;}$I=json_decode($sc,true);if($I===null){if(!$this->isQuerySelectLike($F)&&$sc==='')return
true;$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$qb=get_defined_constants(true);foreach($qb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return
new
Min_Result($I);}function
isQuerySelectLike($F){return(bool)preg_match('~^(select|show)~i',$F);}function
query($F){return$this->rootQuery($this->_db,$F);}function
connect($N,$V,$E){preg_match('~^(https?://)?(.*)~',$N,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$E@$_[2]";$I=$this->query('SELECT 1');return(bool)$I;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return"'".addcslashes($Q,"\\'")."'";}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);return$H['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($H){$this->num_rows=$H['rows'];$this->_rows=$H['data'];$this->meta=$H['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J===false?false:array_combine($this->columns,$J);}function
fetch_row(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if($e<count($this->columns)){$I->name=$this->meta[$e]['name'];$I->orgname=$I->name;$I->type=$this->meta[$e]['type'];}return$I;}}class
Min_Driver
extends
Min_SQL{function
delete($R,$G,$y=0){if($G==='')$G='WHERE 1=1';return
queries("ALTER TABLE ".table($R)." DELETE $G");}function
update($R,$O,$G,$y=0,$M="\n"){$Zg=array();foreach($O
as$x=>$X)$Zg[]="$x = $X";$F=$M.implode(",$M",$Zg);return
queries("ALTER TABLE ".table($R)." UPDATE $F$G");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
explain($h,$F){return'';}function
found_rows($S,$Z){$K=get_vals("SELECT COUNT(*) FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($K)?false:$K[0];}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=$_e=array();foreach($q
as$p){if($p[1][2]===" NULL")$p[1][1]=" Nullable({$p[1][1]})";elseif($p[1][2]===' NOT NULL')$p[1][2]='';if($p[1][3])$p[1][3]='';$c[]=($p[1]?($R!=""?($p[0]!=""?"MODIFY COLUMN ":"ADD COLUMN "):" ").implode($p[1]):"DROP COLUMN ".idf_escape($p[0]));$_e[]=$p[1][0];}$c=array_merge($c,$Bc);$P=($Yb?" ENGINE ".$Yb:"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$P$Je".' ORDER BY ('.implode(',',$_e).')');if($R!=$A){$H=queries("RENAME TABLE ".table($R)." TO ".table($A));if($c)$R=$A;else
return$H;}if($P)$c[]=ltrim($P);return($c||$Je?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Je):true);}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
drop_tables($dh);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($_c){global$h;$H=get_rows('SHOW DATABASES');$I=array();foreach($H
as$J)$I[]=$J['name'];sort($I);return$I;}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?", $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){$H=get_rows('SHOW TABLES');$I=array();foreach($H
as$J)$I[$J['name']]='table';ksort($I);return$I;}function
count_tables($l){return
array();}function
table_status($A="",$oc=false){global$h;$I=array();$T=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($h->_db));foreach($T
as$R){$I[$R['name']]=array('Name'=>$R['name'],'Engine'=>$R['engine'],);if($A===$R['name'])return$I[$R['name']];}return$I;}function
is_view($S){return
false;}function
fk_support($S){return
false;}function
convert_field($p){}function
unconvert_field($p,$I){if(in_array($p['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$p[type]($I)";return$I;}function
fields($R){$I=array();$H=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($R));foreach($H
as$J){$U=trim($J['type']);$me=strpos($U,'Nullable(')===0;$I[trim($J['name'])]=array("field"=>trim($J['name']),"full_type"=>$U,"type"=>$U,"default"=>trim($J['default_expression']),"null"=>$me,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$I;}function
indexes($R,$i=null){return
array();}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($xf){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($pc){return
preg_match("~^(columns|sql|status|table|drop_col)$~",$pc);}$w="clickhouse";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),lang(28)=>array("Date"=>13,"DateTime"=>20),lang(25)=>array("String"=>0),lang(29)=>array("FixedString"=>0),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array();$xe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Lc=array();$Pc=array("avg","count","count distinct","max","min","sum");$Rb=array();}$Mb=array("server"=>"MySQL")+$Mb;if(!defined("DRIVER")){$Se=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N="",$V="",$E="",$k=null,$Qe=null,$Of=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Zc,$Qe)=explode(":",$N,2);$Vf=$b->connectSsl();if($Vf)$this->ssl_set($Vf['key'],$Vf['cert'],$Vf['ca'],'','');$I=@$this->real_connect(($N!=""?$Zc:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$E!=""?$E:ini_get("mysqli.default_pw")),$k,(is_numeric($Qe)?$Qe:ini_get("mysqli.default_port")),(!is_numeric($Qe)?$Qe:$Of),($Vf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$I;}function
set_charset($Ua){if(parent::set_charset($Ua))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ua");}function
result($F,$p=0){$H=$this->query($F);if(!$H)return
false;$J=$H->fetch_array();return$J[$p];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$E){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(33,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$E"!=""?$E:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ua){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ua,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ua");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($F,$Kg=false){$H=@($Kg?mysql_unbuffered_query($F,$this->_link):mysql_query($F,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($F){return$this->_result=$this->query($F);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($F,$p=0){$H=$this->query($F);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$p);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$E){global$b;$B=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Vf=$b->connectSsl();if($Vf){if(!empty($Vf['key']))$B[PDO::MYSQL_ATTR_SSL_KEY]=$Vf['key'];if(!empty($Vf['cert']))$B[PDO::MYSQL_ATTR_SSL_CERT]=$Vf['cert'];if(!empty($Vf['ca']))$B[PDO::MYSQL_ATTR_SSL_CA]=$Vf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$E,$B);return
true;}function
set_charset($Ua){$this->query("SET NAMES $Ua");}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($F,$Kg=false){$this->pdo->setAttribute(1000,!$Kg);return
parent::query($F,$Kg);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$O){return($O?parent::insert($R,$O):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$K,$Ue){$f=array_keys(reset($K));$Te="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Zg=array();foreach($f
as$x)$Zg[$x]="$x = VALUES($x)";$cg="\nON DUPLICATE KEY UPDATE ".implode(", ",$Zg);$Zg=array();$Jd=0;foreach($K
as$O){$Y="(".implode(", ",$O).")";if($Zg&&(strlen($Te)+$Jd+strlen($Y)+strlen($cg)>1e6)){if(!queries($Te.implode(",\n",$Zg).$cg))return
false;$Zg=array();$Jd=0;}$Zg[]=$Y;$Jd+=strlen($Y)+2;}return
queries($Te.implode(",\n",$Zg).$cg);}function
slowQuery($F,$qg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$qg FOR $F";elseif(preg_match('~^(SELECT\b)(.+)~is',$F,$_))return"$_[1] /*+ MAX_EXECUTION_TIME(".($qg*1000).") */ $_[2]";}}function
convertSearch($t,$X,$p){return(preg_match('~char|text|enum|set~',$p["type"])&&!preg_match("~^utf8~",$p["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($t USING ".charset($this->_conn).")":$t);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($A){$Rd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Rd?"information-schema-$A-table/":str_replace("_","-",$A)."-table.html"));if(DB=="mysql")return($Rd?"mysql$A-table/":"system-database.html");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Jg,$Zf;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Zf[lang(25)][]="json";$Jg["json"]=4294967295;}return$h;}$I=$h->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($wf=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$wf;return$I;}function
get_databases($_c){$I=get_session("dbs");if($I===null){$F=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$I=($_c?slow_query($F):get_vals($F));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($F,$Z,$y,$qe=0,$M=" "){return" $F$Z".($y!==null?$M."LIMIT $y".($qe?" OFFSET $qe":""):"");}function
limit1($R,$F,$Z,$M="\n"){return
limit($F,$Z,1,0,$M);}function
db_collation($m,$fb){global$h;$I=null;$vb=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$vb,$_))$I=$_[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$vb,$_))$I=$fb[$_[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$I=array();foreach($l
as$m)$I[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$I;}function
table_status($A="",$oc=false){$I=array();foreach(get_rows($oc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($A!=""?"AND TABLE_NAME = ".q($A):"ORDER BY Name"):"SHOW TABLE STATUS".($A!=""?" LIKE ".q(addcslashes($A,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($A!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$J){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$J["Type"],$_);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$_[1],"length"=>$_[2],"unsigned"=>ltrim($_[3].$_[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$_[1])?(preg_match('~text~',$_[1])?stripslashes(preg_replace("~^'(.*)'\$~",'\1',$J["Default"])):$J["Default"]):null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$_)?$_[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$J["Extra"]),);}return$I;}function
indexes($R,$i=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$J){$A=$J["Key_name"];$I[$A]["type"]=($A=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$A]["columns"][]=$J["Column_name"];$I[$A]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$A]["descs"][]=null;}return$I;}function
foreign_keys($R){global$h,$se;static$Me='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$I=array();$wb=$h->result("SHOW CREATE TABLE ".table($R),1);if($wb){preg_match_all("~CONSTRAINT ($Me) FOREIGN KEY ?\\(((?:$Me,? ?)+)\\) REFERENCES ($Me)(?:\\.($Me))? \\(((?:$Me,? ?)+)\\)(?: ON DELETE ($se))?(?: ON UPDATE ($se))?~",$wb,$Ud,PREG_SET_ORDER);foreach($Ud
as$_){preg_match_all("~$Me~",$_[2],$Qf);preg_match_all("~$Me~",$_[5],$jg);$I[idf_unescape($_[1])]=array("db"=>idf_unescape($_[4]!=""?$_[3]:$_[4]),"table"=>idf_unescape($_[4]!=""?$_[4]:$_[3]),"source"=>array_map('idf_unescape',$Qf[0]),"target"=>array_map('idf_unescape',$jg[0]),"on_delete"=>($_[6]?$_[6]:"RESTRICT"),"on_update"=>($_[7]?$_[7]:"RESTRICT"),);}}return$I;}function
view($A){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($A),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$x=>$X)asort($I[$x]);return$I;}function
information_schema($m){return(min_version(5)&&$m=="information_schema")||(min_version(5.5)&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){$I=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($A,$d){$I=false;if(create_database($A,$d)){$mf=array();foreach(tables_list()as$R=>$U)$mf[]=table($R)." TO ".idf_escape($A).".".table($R);$I=(!$mf||queries("RENAME TABLE ".implode(", ",$mf)));if($I)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$I;}function
auto_increment(){$Ha=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$u){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$u["columns"],true)){$Ha="";break;}if($u["type"]=="PRIMARY")$Ha=" UNIQUE";}}return" AUTO_INCREMENT$Ha";}function
alter_table($R,$A,$q,$Bc,$jb,$Yb,$d,$Ga,$Je){$c=array();foreach($q
as$p)$c[]=($p[1]?($R!=""?($p[0]!=""?"CHANGE ".idf_escape($p[0]):"ADD"):" ")." ".implode($p[1]).($R!=""?$p[2]:""):"DROP ".idf_escape($p[0]));$c=array_merge($c,$Bc);$P=($jb!==null?" COMMENT=".q($jb):"").($Yb?" ENGINE=".q($Yb):"").($d?" COLLATE ".q($d):"").($Ga!=""?" AUTO_INCREMENT=$Ga":"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$P$Je");if($R!=$A)$c[]="RENAME TO ".table($A);if($P)$c[]=ltrim($P);return($c||$Je?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Je):true);}function
alter_indexes($R,$c){foreach($c
as$x=>$X)$c[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($dh){return
queries("DROP VIEW ".implode(", ",array_map('table',$dh)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$dh,$jg){$mf=array();foreach(array_merge($T,$dh)as$R)$mf[]=table($R)." TO ".idf_escape($jg).".".table($R);return
queries("RENAME TABLE ".implode(", ",$mf));}function
copy_tables($T,$dh,$jg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$A=($jg==DB?table("copy_$R"):idf_escape($jg).".".table($R));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $A"))||!queries("CREATE TABLE $A LIKE ".table($R))||!queries("INSERT INTO $A SELECT * FROM ".table($R)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J){$Eg=$J["Trigger"];if(!queries("CREATE TRIGGER ".($jg==DB?idf_escape("copy_$Eg"):idf_escape($jg).".".idf_escape($Eg))." $J[Timing] $J[Event] ON $A FOR EACH ROW\n$J[Statement];"))return
false;}}foreach($dh
as$R){$A=($jg==DB?table("copy_$R"):idf_escape($jg).".".table($R));$ch=view($R);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $A"))||!queries("CREATE VIEW $A AS $ch[select]"))return
false;}return
true;}function
trigger($A){if($A=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($A));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($A,$U){global$h,$Zb,$od,$Jg;$xa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Rf="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ig="((".implode("|",array_merge(array_keys($Jg),$xa)).")\\b(?:\\s*\\(((?:[^'\")]|$Zb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Me="$Rf*(".($U=="FUNCTION"?"":$od).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Ig";$vb=$h->result("SHOW CREATE $U ".idf_escape($A),2);preg_match("~\\(((?:$Me\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Ig\\s+":"")."(.*)~is",$vb,$_);$q=array();preg_match_all("~$Me\\s*,?~is",$_[1],$Ud,PREG_SET_ORDER);foreach($Ud
as$Ge)$q[]=array("field"=>str_replace("``","`",$Ge[2]).$Ge[3],"type"=>strtolower($Ge[5]),"length"=>preg_replace_callback("~$Zb~s",'normalize_enum',$Ge[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Ge[8] $Ge[7]"))),"null"=>1,"full_type"=>$Ge[4],"inout"=>strtoupper($Ge[1]),"collation"=>strtolower($Ge[9]),);if($U!="FUNCTION")return
array("fields"=>$q,"definition"=>$_[11]);return
array("fields"=>$q,"returns"=>array("type"=>$_[12],"length"=>$_[13],"unsigned"=>$_[15],"collation"=>$_[16]),"definition"=>$_[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($A,$J){return
idf_escape($A);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$F){return$h->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$F);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($xf,$i=null){return
true;}function
create_sql($R,$Ga,$ag){global$h;$I=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Ga)$I=preg_replace('~ AUTO_INCREMENT=\d+~','',$I);return$I;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($p){if(preg_match("~binary~",$p["type"]))return"HEX(".idf_escape($p["field"]).")";if($p["type"]=="bit")return"BIN(".idf_escape($p["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($p["field"]).")";}function
unconvert_field($p,$I){if(preg_match("~binary~",$p["type"]))$I="UNHEX($I)";if($p["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I, SRID($p[field]))";return$I;}function
support($pc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$pc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}$w="sql";$Jg=array();$Zf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(34)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$X){$Jg+=$X;$Zf[$x]=array_keys($X);}$Qg=array("unsigned","zerofill","unsigned zerofill");$xe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Lc=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Pc=array("avg","count","count distinct","group_concat","max","min","sum");$Rb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.7.9";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".lang(35)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($vb=false){return
password_file($vb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($N){}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($_c=true){return
get_databases($_c);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$tc="adminer.css";if(file_exists($tc))$I[]=$tc;return$I;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.lang(36).'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.lang(37).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".lang(38)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(39))."\n";}function
loginFormField($A,$Wc,$Y){return$Wc.$Y;}function
login($Od,$E){return
true;}function
tableName($fg){return
h($fg["Comment"]!=""?$fg["Comment"]:$fg["Name"]);}function
fieldName($p,$_e=0){return
h(preg_replace('~\s+\[.*\]$~','',($p["comment"]!=""?$p["comment"]:$p["field"])));}function
selectLinks($fg,$O=""){$a=$fg["Name"];if($O!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$O).'">'.lang(40)."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$eg){$I=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$J)$I[$J["TABLE_NAME"]]["keys"][$J["CONSTRAINT_NAME"]][$J["COLUMN_NAME"]]=$J["REFERENCED_COLUMN_NAME"];foreach($I
as$x=>$X){$A=$this->tableName(table_status($x,true));if($A!=""){$zf=preg_quote($eg);$M="(:|\\s*-)?\\s+";$I[$x]["name"]=(preg_match("(^$zf$M(.+)|^(.+?)$M$zf\$)iu",$A,$_)?$_[2].$_[3]:$A);}else
unset($I[$x]);}return$I;}function
backwardKeysPrint($Ka,$J){foreach($Ka
as$R=>$Ja){foreach($Ja["keys"]as$hb){$z=ME.'select='.urlencode($R);$r=0;foreach($hb
as$e=>$X)$z.=where_link($r++,$e,$J[$X]);echo"<a href='".h($z)."'>".h($Ja["name"])."</a>";$z=ME.'edit='.urlencode($R);foreach($hb
as$e=>$X)$z.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($J[$X]);echo"<a href='".h($z)."' title='".lang(40)."'>+</a> ";}}}function
selectQuery($F,$Wf,$nc=false){return"<!--\n".str_replace("--","--><!-- ",$F)."\n(".format_time($Wf).")\n-->\n";}function
rowDescription($R){foreach(fields($R)as$p){if(preg_match("~varchar|character varying~",$p["type"]))return
idf_escape($p["field"]);}return"";}function
rowDescriptions($K,$Dc){$I=$K;foreach($K[0]as$x=>$X){if(list($R,$s,$A)=$this->_foreignColumn($Dc,$x)){$dd=array();foreach($K
as$J)$dd[$J[$x]]=q($J[$x]);$Gb=$this->_values[$R];if(!$Gb)$Gb=get_key_vals("SELECT $s, $A FROM ".table($R)." WHERE $s IN (".implode(", ",$dd).")");foreach($K
as$he=>$J){if(isset($J[$x]))$I[$he][$x]=(string)$Gb[$J[$x]];}}}return$I;}function
selectLink($X,$p){}function
selectVal($X,$z,$p,$Be){$I=$X;$z=h($z);if(preg_match('~blob|bytea~',$p["type"])&&!is_utf8($X)){$I=lang(41,strlen($Be));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$Be))$I="<img src='$z' alt='$I'>";}if(like_bool($p)&&$I!="")$I=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?lang(42):lang(43));if($z)$I="<a href='$z'".(is_url($z)?target_blank():"").">$I</a>";if(!$z&&!like_bool($p)&&preg_match(number_type(),$p["type"]))$I="<div class='number'>$I</div>";elseif(preg_match('~date~',$p["type"]))$I="<div class='datetime'>$I</div>";return$I;}function
editVal($X,$p){if(preg_match('~date|timestamp~',$p["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~',lang(44),$X);return$X;}function
selectColumnsPrint($L,$f){}function
selectSearchPrint($Z,$f,$v){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(45)."</legend><div>\n";$Ad=array();foreach($Z
as$x=>$X)$Ad[$X["col"]]=$x;$r=0;$q=fields($_GET["select"]);foreach($f
as$A=>$Fb){$p=$q[$A];if(preg_match("~enum~",$p["type"])||like_bool($p)){$x=$Ad[$A];$r--;echo"<div>".h($Fb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'>:",(like_bool($p)?" <select name='where[$r][val]'>".optionlist(array(""=>"",lang(43),lang(42)),$Z[$x]["val"],true)."</select>":enum_input("checkbox"," name='where[$r][val][]'",$p,(array)$Z[$x]["val"],($p["null"]?0:null))),"</div>\n";unset($f[$A]);}elseif(is_array($B=$this->_foreignKeyOptions($_GET["select"],$A))){if($q[$A]["null"])$B[0]='('.lang(7).')';$x=$Ad[$A];$r--;echo"<div>".h($Fb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'><input type='hidden' name='where[$r][op]' value='='>: <select name='where[$r][val]'>".optionlist($B,$Z[$x]["val"],true)."</select></div>\n";unset($f[$A]);}}$r=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$r][col]'><option value=''>(".lang(46).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$r][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$r][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$r++;}}echo"<div><select name='where[$r][col]'><option value=''>(".lang(46).")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$r][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$r][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($_e,$f,$v){$Ae=array();foreach($v
as$x=>$u){$_e=array();foreach($u["columns"]as$X)$_e[]=$f[$X];if(count(array_filter($_e,'strlen'))>1&&$x!="PRIMARY")$Ae[$x]=implode(", ",$_e);}if($Ae){echo'<fieldset><legend>'.lang(47)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Ae,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($y){echo"<fieldset><legend>".lang(48)."</legend><div>";echo
html_select("limit",array("","50","100"),$y),"</div></fieldset>\n";}function
selectLengthPrint($ng){}function
selectActionPrint($v){echo"<fieldset><legend>".lang(49)."</legend><div>","<input type='submit' value='".lang(50)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Vb,$f){if($Vb){print_fieldset("email",lang(51),$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".lang(52).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(53).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(54).": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Vb)==1?'<input type="hidden" name="email_field" value="'.h(key($Vb)).'">':html_select("email_field",$Vb)),"<input type='submit' name='email' value='".lang(55)."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$v){return
array(array(),array());}function
selectSearchProcess($q,$v){global$n;$I=array();foreach((array)$_GET["where"]as$x=>$Z){$eb=$Z["col"];$ve=$Z["op"];$X=$Z["val"];if(($x<0?"":$eb).$X!=""){$lb=array();foreach(($eb!=""?array($eb=>$q[$eb]):$q)as$A=>$p){if($eb!=""||is_numeric($X)||!preg_match(number_type(),$p["type"])){$A=idf_escape($A);if($eb!=""&&$p["type"]=="enum")$lb[]=(in_array(0,$X)?"$A IS NULL OR ":"")."$A IN (".implode(", ",array_map('intval',$X)).")";else{$og=preg_match('~char|text|enum|set~',$p["type"]);$Y=$this->processInput($p,(!$ve&&$og&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$lb[]=$n->convertSearch($A,$X,$p).($Y=="NULL"?" IS".($ve==">="?" NOT":"")." $Y":(in_array($ve,$this->operators)||$ve=="="?" $ve $Y":($og?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($x<0&&$X=="0")$lb[]="$A IS NULL";}}}$I[]=($lb?"(".implode(" OR ",$lb).")":"1 = 0");}}return$I;}function
selectOrderProcess($q,$v){$gd=$_GET["index_order"];if($gd!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($gd!=""?array($v[$gd]):$v)as$u){if($gd!=""||$u["type"]=="INDEX"){$Rc=array_filter($u["descs"]);$Fb=false;foreach($u["columns"]as$X){if(preg_match('~date|timestamp~',$q[$X]["type"])){$Fb=true;break;}}$I=array();foreach($u["columns"]as$x=>$X)$I[]=idf_escape($X).(($Rc?$u["descs"][$x]:$Fb)?" DESC":"");return$I;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Dc){if($_POST["email_append"])return
true;if($_POST["email"]){$Df=0;if($_POST["all"]||$_POST["check"]){$p=idf_escape($_POST["email_field"]);$bg=$_POST["email_subject"];$ae=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$bg.$ae",$Ud);$K=get_rows("SELECT DISTINCT $p".($Ud[1]?", ".implode(", ",array_map('idf_escape',array_unique($Ud[1]))):"")." FROM ".table($_GET["select"])." WHERE $p IS NOT NULL AND $p != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$q=fields($_GET["select"]);foreach($this->rowDescriptions($K,$Dc)as$J){$nf=array('{\\'=>'{');foreach($Ud[1]as$X)$nf['{$'."$X}"]=$this->editVal($J[$X],$q[$X]);$Ub=$J[$_POST["email_field"]];if(is_mail($Ub)&&send_mail($Ub,strtr($bg,$nf),strtr($ae,$nf),$_POST["email_from"],$_FILES["email_files"]))$Df++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(56,$Df));}return
false;}function
selectQueryBuild($L,$Z,$Mc,$_e,$y,$C){return"";}function
messageQuery($F,$pg,$nc=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$F)."\n".($pg?"($pg)\n":"")."-->";}function
editFunctions($p){$I=array();if($p["null"]&&preg_match('~blob~',$p["type"]))$I["NULL"]=lang(7);$I[""]=($p["null"]||$p["auto_increment"]||like_bool($p)?"":"*");if(preg_match('~date|time~',$p["type"]))$I["now"]=lang(57);if(preg_match('~_(md5|sha1)$~i',$p["field"],$_))$I[]=strtolower($_[1]);return$I;}function
editInput($R,$p,$Da,$Y){if($p["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Da value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Da,$p,($Y||isset($_GET["select"])?$Y:0),($p["null"]?"":null));$B=$this->_foreignKeyOptions($R,$p["field"],$Y);if($B!==null)return(is_array($B)?"<select$Da>".optionlist($B,$Y,true)."</select>":"<input value='".h($Y)."'$Da class='hidden'>"."<input value='".h($B)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($R)."&field=".urlencode($p["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($p))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Da>";$Xc="";if(preg_match('~time~',$p["type"]))$Xc=lang(58);if(preg_match('~date|timestamp~',$p["type"]))$Xc=lang(59).($Xc?" [$Xc]":"");if($Xc)return"<input value='".h($Y)."'$Da> ($Xc)";if(preg_match('~_(md5|sha1)$~i',$p["field"]))return"<input type='password' value='".h($Y)."'$Da>";return'';}function
editHint($R,$p,$Y){return(preg_match('~\s+(\[.*\])$~',($p["comment"]!=""?$p["comment"]:$p["field"]),$_)?h(" $_[1]"):'');}function
processInput($p,$Y,$Kc=""){if($Kc=="now")return"$Kc()";$I=$Y;if(preg_match('~date|timestamp~',$p["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote(lang(44)))).'(.*))',$Y,$_))$I=($_["p1"]!=""?$_["p1"]:($_["p2"]!=""?($_["p2"]<70?20:19).$_["p2"]:gmdate("Y")))."-$_[p3]$_[p4]-$_[p5]$_[p6]".end($_);$I=($p["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$I:q($I));if($Y==""&&like_bool($p))$I="'0'";elseif($Y==""&&($p["null"]||!preg_match('~char|text~',$p["type"])))$I="NULL";elseif(preg_match('~^(md5|sha1)$~',$Kc))$I="$Kc($I)";return
unconvert_field($p,$I);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable($R,$ag,$vd=0){echo"\xef\xbb\xbf";}function
dumpData($R,$ag,$F){global$h;$H=$h->query($F,1);if($H){while($J=$H->fetch_assoc()){if($ag=="table"){dump_csv(array_keys($J));$ag="INSERT";}dump_csv($J);}}}function
dumpFilename($bd){return
friendly_url($bd);}function
dumpHeaders($bd,$fe=false){$jc="csv";header("Content-Type: text/csv; charset=utf-8");return$jc;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($ee){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($ee=="auth"){$wc=true;foreach((array)$_SESSION["pwds"]as$ah=>$If){foreach($If[""]as$V=>$E){if($E!==null){if($wc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$wc=false;}echo"<li><a href='".h(auth_url($ah,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a>\n";}}}}else{$this->databasesPrint($ee);if($ee!="db"&&$ee!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($ee){}function
tablesPrint($T){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$J){echo'<li>';$A=$this->tableName($J);if(isset($J["Engine"])&&$A!="")echo"<a href='".h(ME).'select='.urlencode($J["Name"])."'".bold($_GET["select"]==$J["Name"]||$_GET["edit"]==$J["Name"],"select")." title='".lang(60)."'>$A</a>\n";}echo"</ul>\n";}function
_foreignColumn($Dc,$e){foreach((array)$Dc[$e]as$Cc){if(count($Cc["source"])==1){$A=$this->rowDescription($Cc["table"]);if($A!=""){$s=idf_escape($Cc["target"][0]);return
array($Cc["table"],$s,$A);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$h;if(list($jg,$s,$A)=$this->_foreignColumn(column_foreign_keys($R),$e)){$I=&$this->_values[$jg];if($I===null){$S=table_status($jg);$I=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $s, $A FROM ".table($jg)." ORDER BY 2"));}if(!$I&&$Y!==null)return$h->result("SELECT $A FROM ".table($jg)." WHERE $s = ".q($Y));return$I;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($sg,$o="",$Sa=array(),$tg=""){global$ba,$ca,$b,$Mb,$w;page_headers();if(is_ajax()&&$o){page_messages($o);exit;}$ug=$sg.($tg!=""?": $tg":"");$vg=strip_tags($ug.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(61),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$vg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.9"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.9");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.9"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.9"),'">
';foreach($b->css()as$yb){echo'<link rel="stylesheet" type="text/css" href="',h($yb),'">
';}}echo'
<body class="',lang(61),' nojs">
';$tc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($tc)&&filemtime($tc)+86400>time()){$bh=unserialize(file_get_contents($tc));$af="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($bh["version"],base64_decode($bh["signature"]),$af)==1)$_COOKIE["adminer_version"]=$bh["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(62)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$w,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Sa!==null){$z=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($z?$z:".").'">'.$Mb[DRIVER].'</a> &raquo; ';$z=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=$b->serverName(SERVER);$N=($N!=""?$N:lang(63));if($Sa===false)echo"$N\n";else{echo"<a href='".h($z)."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Sa)))echo'<a href="'.h($z."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Sa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Sa
as$x=>$X){$Fb=(is_array($X)?$X[1]:h($X));if($Fb!="")echo"<a href='".h(ME."$x=").urlencode(is_array($X)?$X[0]:$X)."'>$Fb</a> &raquo; ";}}echo"$sg\n";}}echo"<h2>$ug</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($o);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$xb){$Uc=array();foreach($xb
as$x=>$X)$Uc[]="$x $X";header("Content-Security-Policy: ".implode("; ",$Uc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$le;if(!$le)$le=base64_encode(rand_string());return$le;}function
page_messages($o){$Sg=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$be=$_SESSION["messages"][$Sg];if($be){echo"<div class='message'>".implode("</div>\n<div class='message'>",$be)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Sg]);}if($o)echo"<div class='error'>$o</div>\n";}function
page_footer($ee=""){global$b,$yg;echo'</div>

';switch_lang();if($ee!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(64),'" id="logout">
<input type="hidden" name="token" value="',$yg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($ee);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($he){while($he>=2147483648)$he-=4294967296;while($he<=-2147483649)$he+=4294967296;return(int)$he;}function
long2str($W,$fh){$wf='';foreach($W
as$X)$wf.=pack('V',$X);if($fh)return
substr($wf,0,end($W));return$wf;}function
str2long($wf,$fh){$W=array_values(unpack('V*',str_pad($wf,4*ceil(strlen($wf)/4),"\0")));if($fh)$W[]=strlen($wf);return$W;}function
xxtea_mx($qh,$ph,$dg,$xd){return
int32((($qh>>5&0x7FFFFFF)^$ph<<2)+(($ph>>3&0x1FFFFFFF)^$qh<<4))^int32(($dg^$ph)+($xd^$qh));}function
encrypt_string($Yf,$x){if($Yf=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Yf,true);$he=count($W)-1;$qh=$W[$he];$ph=$W[0];$bf=floor(6+52/($he+1));$dg=0;while($bf-->0){$dg=int32($dg+0x9E3779B9);$Qb=$dg>>2&3;for($Ee=0;$Ee<$he;$Ee++){$ph=$W[$Ee+1];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$qh=int32($W[$Ee]+$ge);$W[$Ee]=$qh;}$ph=$W[0];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$qh=int32($W[$he]+$ge);$W[$he]=$qh;}return
long2str($W,false);}function
decrypt_string($Yf,$x){if($Yf=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Yf,false);$he=count($W)-1;$qh=$W[$he];$ph=$W[0];$bf=floor(6+52/($he+1));$dg=int32($bf*0x9E3779B9);while($dg){$Qb=$dg>>2&3;for($Ee=$he;$Ee>0;$Ee--){$qh=$W[$Ee-1];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$ph=int32($W[$Ee]-$ge);$W[$Ee]=$ph;}$qh=$W[$he];$ge=xxtea_mx($qh,$ph,$dg,$x[$Ee&3^$Qb]);$ph=int32($W[0]-$ge);$W[0]=$ph;$dg=int32($dg-0x9E3779B9);}return
long2str($W,true);}$h='';$Tc=$_SESSION["token"];if(!$Tc)$_SESSION["token"]=rand(1,1e6);$yg=get_token();$Oe=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$Oe[$x]=$X;}}function
add_invalid_login(){global$b;$Ic=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Ic)return;$sd=unserialize(stream_get_contents($Ic));$pg=time();if($sd){foreach($sd
as$td=>$X){if($X[0]<$pg)unset($sd[$td]);}}$rd=&$sd[$b->bruteForceKey()];if(!$rd)$rd=array($pg+30*60,0);$rd[1]++;file_write_unlock($Ic,serialize($sd));}function
check_invalid_login(){global$b;$sd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$rd=$sd[$b->bruteForceKey()];$ke=($rd[1]>29?$rd[0]-time():0);if($ke>0)auth_error(lang(65,ceil($ke/60)));}$Ea=$_POST["auth"];if($Ea){session_regenerate_id();$ah=$Ea["driver"];$N=$Ea["server"];$V=$Ea["username"];$E=(string)$Ea["password"];$m=$Ea["db"];set_password($ah,$N,$V,$E);$_SESSION["db"][$ah][$N][$V][$m]=true;if($Ea["permanent"]){$x=base64_encode($ah)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($m);$Xe=$b->permanentLogin(true);$Oe[$x]="$x:".base64_encode($Xe?encrypt_string($E,$Xe):"");cookie("adminer_permanent",implode(" ",$Oe));}if(count($_POST)==1||DRIVER!=$ah||SERVER!=$N||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($ah,$N,$V,$m));}elseif($_POST["logout"]&&(!$Tc||verify_token())){foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(66).' '.lang(67));}elseif($Oe&&!$_SESSION["pwds"]){session_regenerate_id();$Xe=$b->permanentLogin();foreach($Oe
as$x=>$X){list(,$ab)=explode(":",$X);list($ah,$N,$V,$m)=array_map('base64_decode',explode("-",$x));set_password($ah,$N,$V,decrypt_string(base64_decode($ab),$Xe));$_SESSION["db"][$ah][$N][$V][$m]=true;}}function
unset_permanent(){global$Oe;foreach($Oe
as$x=>$X){list($ah,$N,$V,$m)=array_map('base64_decode',explode("-",$x));if($ah==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$m==DB)unset($Oe[$x]);}cookie("adminer_permanent",implode(" ",$Oe));}function
auth_error($o){global$b,$Tc;$Jf=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Jf]||$_GET[$Jf])&&!$Tc)$o=lang(68);else{restart_session();add_invalid_login();$E=get_password();if($E!==null){if($E===false)$o.='<br>'.lang(69,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Jf]&&$_GET[$Jf]&&ini_bool("session.use_only_cookies"))$o=lang(70);$D=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$D["lifetime"]);page_header(lang(38),$o,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(71)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(72),lang(73,implode(", ",$Se)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Zc,$Qe)=explode(":",SERVER,2);if(preg_match('~^\s*([-+]?\d+)~',$Qe,$_)&&($_[1]<1024||$_[1]>65535))auth_error(lang(74));check_invalid_login();$h=connect();$n=new
Min_Driver($h);}$Od=null;if(!is_object($h)||($Od=$b->login($_GET["username"],get_password()))!==true){$o=(is_string($h)?h($h):(is_string($Od)?$Od:lang(32)));auth_error($o.(preg_match('~^ | $~',get_password())?'<br>'.lang(75):''));}if($_POST["logout"]&&$Tc&&!verify_token()){page_header(lang(64),lang(76));page_footer("db");exit;}if($Ea&&$_POST["token"])$_POST["token"]=$yg;$o='';if($_POST){if(!verify_token()){$nd="max_input_vars";$Yd=ini_get($nd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$X=ini_get($x);if($X&&(!$Yd||$X<$Yd)){$nd=$x;$Yd=$X;}}}$o=(!$_POST["token"]&&$Yd?lang(77,"'$nd'"):lang(76).' '.lang(78));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$o=lang(79,"'post_max_size'");if(isset($_GET["sql"]))$o.=' '.lang(80);}function
email_header($Uc){return"=?UTF-8?B?".base64_encode($Uc)."?=";}function
send_mail($Ub,$bg,$ae,$Jc="",$uc=array()){$ac=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$ae=str_replace("\n",$ac,wordwrap(str_replace("\r","","$ae\n")));$Ra=uniqid("boundary");$Ba="";foreach((array)$uc["error"]as$x=>$X){if(!$X)$Ba.="--$Ra$ac"."Content-Type: ".str_replace("\n","",$uc["type"][$x]).$ac."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$uc["name"][$x])."\"$ac"."Content-Transfer-Encoding: base64$ac$ac".chunk_split(base64_encode(file_get_contents($uc["tmp_name"][$x])),76,$ac).$ac;}$Ma="";$Vc="Content-Type: text/plain; charset=utf-8$ac"."Content-Transfer-Encoding: 8bit";if($Ba){$Ba.="--$Ra--$ac";$Ma="--$Ra$ac$Vc$ac$ac";$Vc="Content-Type: multipart/mixed; boundary=\"$Ra\"";}$Vc.=$ac."MIME-Version: 1.0$ac"."X-Mailer: Adminer Editor".($Jc?$ac."From: ".str_replace("\n","",$Jc):"");return
mail($Ub,email_header($bg),$Ma.$ae.$Ba,$Vc);}function
like_bool($p){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$p["full_type"]);}$h->select_db($b->database());$se="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Mb[DRIVER]=lang(38);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$q=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$n->select($a,$L,array(where($_GET,$q)),$L);$J=($H?$H->fetch_row():array());echo$n->value($J[0],$q[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$q=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$q):""):where($_GET,$q));$Rg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($q
as$A=>$p){if(!isset($p["privileges"][$Rg?"update":"insert"])||$b->fieldName($p)==""||$p["generated"])unset($q[$A]);}if($_POST&&!$o&&!isset($_GET["select"])){$Nd=$_POST["referer"];if($_POST["insert"])$Nd=($Rg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Nd))$Nd=ME."select=".urlencode($a);$v=indexes($a);$Mg=unique_array($_GET["where"],$v);$df="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Nd,lang(81),$n->delete($a,$df,!$Mg));else{$O=array();foreach($q
as$A=>$p){$X=process_input($p);if($X!==false&&$X!==null)$O[idf_escape($A)]=$X;}if($Rg){if(!$O)redirect($Nd);queries_redirect($Nd,lang(82),$n->update($a,$O,$df,!$Mg));if(is_ajax()){page_headers();page_messages($o);exit;}}else{$H=$n->insert($a,$O);$Hd=($H?last_id():0);queries_redirect($Nd,lang(83,($Hd?" $Hd":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($q
as$A=>$p){if(isset($p["privileges"]["select"])){$_a=convert_field($p);if($_POST["clone"]&&$p["auto_increment"])$_a="''";if($w=="sql"&&preg_match("~enum|set~",$p["type"]))$_a="1*".idf_escape($A);$L[]=($_a?"$_a AS ":"").idf_escape($A);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$n->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$o=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$q){if(!$Z){$H=$n->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($n->primary=>"");}if($J){foreach($J
as$x=>$X){if(!$Z)$J[$x]=null;$q[$x]=array("field"=>$x,"null"=>($x!=$n->primary),"auto_increment"=>($x==$n->primary));}}}edit_form($a,$q,$J,$Rg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$v=indexes($a);$q=fields($a);$Fc=column_foreign_keys($a);$re=$S["Oid"];parse_str($_COOKIE["adminer_import"],$ta);$uf=array();$f=array();$ng=null;foreach($q
as$x=>$p){$A=$b->fieldName($p);if(isset($p["privileges"]["select"])&&$A!=""){$f[$x]=html_entity_decode(strip_tags($A),ENT_QUOTES);if(is_shortable($p))$ng=$b->selectLengthProcess();}$uf+=$p["privileges"];}list($L,$Mc)=$b->selectColumnsProcess($f,$v);$ud=count($Mc)<count($L);$Z=$b->selectSearchProcess($q,$v);$_e=$b->selectOrderProcess($q,$v);$y=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ng=>$J){$_a=convert_field($q[key($J)]);$L=array($_a?$_a:idf_escape(key($J)));$Z[]=where_check($Ng,$q);$I=$n->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$Ue=$Pg=null;foreach($v
as$u){if($u["type"]=="PRIMARY"){$Ue=array_flip($u["columns"]);$Pg=($L?$Ue:array());foreach($Pg
as$x=>$X){if(in_array(idf_escape($x),$L))unset($Pg[$x]);}break;}}if($re&&!$Ue){$Ue=$Pg=array($re=>0);$v[]=array("type"=>"PRIMARY","columns"=>array($re));}if($_POST&&!$o){$kh=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ya=array();foreach($_POST["check"]as$Va)$Ya[]=where_check($Va,$q);$kh[]="((".implode(") OR (",$Ya)."))";}$kh=($kh?"\nWHERE ".implode(" AND ",$kh):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Jc=($L?implode(", ",$L):"*").convert_fields($f,$q,$L)."\nFROM ".table($a);$Oc=($Mc&&$ud?"\nGROUP BY ".implode(", ",$Mc):"").($_e?"\nORDER BY ".implode(", ",$_e):"");if(!is_array($_POST["check"])||$Ue)$F="SELECT $Jc$kh$Oc";else{$Lg=array();foreach($_POST["check"]as$X)$Lg[]="(SELECT".limit($Jc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q).$Oc,1).")";$F=implode(" UNION ALL ",$Lg);}$b->dumpData($a,"table",$F);exit;}if(!$b->selectEmailProcess($Z,$Fc)){if($_POST["save"]||$_POST["delete"]){$H=true;$ua=0;$O=array();if(!$_POST["delete"]){foreach($f
as$A=>$X){$X=process_input($q[$A]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($A)]=($X!==false?$X:idf_escape($A));}}if($_POST["delete"]||$O){if($_POST["clone"])$F="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($Ue&&is_array($_POST["check"]))||$ud){$H=($_POST["delete"]?$n->delete($a,$kh):($_POST["clone"]?queries("INSERT $F$kh"):$n->update($a,$O,$kh)));$ua=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$gh="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q);$H=($_POST["delete"]?$n->delete($a,$gh,1):($_POST["clone"]?queries("INSERT".limit1($a,$F,$gh)):$n->update($a,$O,$gh,1)));if(!$H)break;$ua+=$h->affected_rows;}}}$ae=lang(84,$ua);if($_POST["clone"]&&$H&&$ua==1){$Hd=last_id();if($Hd)$ae=lang(83," $Hd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$ae,$H);if(!$_POST["delete"]){edit_form($a,$q,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$o=lang(85);else{$H=true;$ua=0;foreach($_POST["val"]as$Ng=>$J){$O=array();foreach($J
as$x=>$X){$x=bracket_escape($x,1);$O[idf_escape($x)]=(preg_match('~char|text~',$q[$x]["type"])||$X!=""?$b->processInput($q[$x],$X):"NULL");}$H=$n->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ng,$q),!$ud&&!$Ue," ");if(!$H)break;$ua+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(84,$ua),$H);}}elseif(!is_string($sc=get_file("csv_file",true)))$o=upload_error($sc);elseif(!preg_match('~~u',$sc))$o=lang(86);else{cookie("adminer_import","output=".urlencode($ta["output"])."&format=".urlencode($_POST["separator"]));$H=true;$hb=array_keys($q);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$sc,$Ud);$ua=count($Ud[0]);$n->begin();$M=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($Ud[0]as$x=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$M]*)$M~",$X.$M,$Vd);if(!$x&&!array_diff($Vd[1],$hb)){$hb=$Vd[1];$ua--;}else{$O=array();foreach($Vd[1]as$r=>$eb)$O[idf_escape($hb[$r])]=($eb==""&&$q[$hb[$r]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$eb))));$K[]=$O;}}$H=(!$K||$n->insertUpdate($a,$K,$Ue));if($H)$H=$n->commit();queries_redirect(remove_from_uri("page"),lang(87,$ua),$H);$n->rollback();}}}$gg=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(50).": $gg",$o);$O=null;if(isset($uf["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if($Fc[$X["col"]]&&count($Fc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$O);if(!$f&&support("table"))echo"<p class='error'>".lang(88).($q?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$f);$b->selectSearchPrint($Z,$f,$v);$b->selectOrderPrint($_e,$f,$v);$b->selectLimitPrint($y);$b->selectLengthPrint($ng);$b->selectActionPrint($v);echo"</form>\n";$C=$_GET["page"];if($C=="last"){$Hc=$h->result(count_rows($a,$Z,$ud,$Mc));$C=floor(max(0,$Hc-1)/$y);}$Af=$L;$Nc=$Mc;if(!$Af){$Af[]="*";$tb=convert_fields($f,$q,$L);if($tb)$Af[]=substr($tb,2);}foreach($L
as$x=>$X){$p=$q[idf_unescape($X)];if($p&&($_a=convert_field($p)))$Af[$x]="$_a AS $X";}if(!$ud&&$Pg){foreach($Pg
as$x=>$X){$Af[]=idf_escape($x);if($Nc)$Nc[]=idf_escape($x);}}$H=$n->select($a,$Af,$Z,$Nc,$_e,$y,$C,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$C)$H->seek($y*$C);$Wb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($C&&$w=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$y!=""&&$Mc&&$ud&&$w=="sql")$Hc=$h->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".lang(12)."\n";else{$La=$b->backwardKeys($a,$gg);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Mc&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(89)."</a>");$ie=array();$Lc=array();reset($L);$ff=1;foreach($K[0]as$x=>$X){if(!isset($Pg[$x])){$X=$_GET["columns"][key($L)];$p=$q[$L?($X?$X["col"]:current($L)):$x];$A=($p?$b->fieldName($p,$ff):($X["fun"]?"*":$x));if($A!=""){$ff++;$ie[$x]=$A;$e=idf_escape($x);$ad=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$Fb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($ad.($_e[0]==$e||$_e[0]==$x||(!$_e&&$ud&&$Mc[0]==$e)?$Fb:'')).'">';echo
apply_sql_function($X["fun"],$A)."</a>";echo"<span class='column hidden'>","<a href='".h($ad.$Fb)."' title='".lang(90)."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(45).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($x)."');");}echo"</span>";}$Lc[$x]=$X["fun"];next($L);}}$Kd=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$x=>$X)$Kd[$x]=max($Kd[$x],min(40,strlen(utf8_decode($X))));}}echo($La?"<th>".lang(91):"")."</thead>\n";if(is_ajax()){if($y%2==1&&$C%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$Fc)as$he=>$J){$Mg=unique_array($K[$he],$v);if(!$Mg){$Mg=array();foreach($K[$he]as$x=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$x))$Mg[$x]=$X;}}$Ng="";foreach($Mg
as$x=>$X){if(($w=="sql"||$w=="pgsql")&&preg_match('~char|text|enum|set~',$q[$x]["type"])&&strlen($X)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($w!='sql'||preg_match("~^utf8~",$q[$x]["collation"])?$x:"CONVERT($x USING ".charset($h).")").")";$X=md5($X);}$Ng.="&".($X!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$Mc&&$L?"":"<td>".checkbox("check[]",substr($Ng,1),in_array(substr($Ng,1),(array)$_POST["check"])).($ud||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ng)."' class='edit'>".lang(92)."</a>"));foreach($J
as$x=>$X){if(isset($ie[$x])){$p=$q[$x];$X=$n->value($X,$p);if($X!=""&&(!isset($Wb[$x])||$Wb[$x]!=""))$Wb[$x]=(is_mail($X)?$ie[$x]:"");$z="";if(preg_match('~blob|bytea|raw|file~',$p["type"])&&$X!="")$z=ME.'download='.urlencode($a).'&field='.urlencode($x).$Ng;if(!$z&&$X!==null){foreach((array)$Fc[$x]as$Ec){if(count($Fc[$x])==1||end($Ec["source"])==$x){$z="";foreach($Ec["source"]as$r=>$Qf)$z.=where_link($r,$Ec["target"][$r],$K[$he][$Qf]);$z=($Ec["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($Ec["db"]),ME):ME).'select='.urlencode($Ec["table"]).$z;if($Ec["ns"])$z=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($Ec["ns"]),$z);if(count($Ec["source"])==1)break;}}}if($x=="COUNT(*)"){$z=ME."select=".urlencode($a);$r=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Mg))$z.=where_link($r++,$W["col"],$W["val"],$W["op"]);}foreach($Mg
as$xd=>$W)$z.=where_link($r++,$xd,$W);}$X=select_value($X,$z,$p,$ng);$s=h("val[$Ng][".bracket_escape($x)."]");$Y=$_POST["val"][$Ng][bracket_escape($x)];$Sb=!is_array($J[$x])&&is_utf8($X)&&$K[$he][$x]==$J[$x]&&!$Lc[$x];$mg=preg_match('~text|lob~',$p["type"]);echo"<td id='$s'";if(($_GET["modify"]&&$Sb)||$Y!==null){$Qc=h($Y!==null?$Y:$J[$x]);echo">".($mg?"<textarea name='$s' cols='30' rows='".(substr_count($J[$x],"\n")+1)."'>$Qc</textarea>":"<input name='$s' value='$Qc' size='$Kd[$x]'>");}else{$Pd=strpos($X,"<i>â€¦</i>");echo" data-text='".($Pd?2:($mg?1:0))."'".($Sb?"":" data-warning='".h(lang(93))."'").">$X</td>";}}}if($La)echo"<td>";$b->backwardKeysPrint($La,$K[$he]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($K||$C){$fc=true;if($_GET["page"]!="last"){if($y==""||(count($K)<$y&&($K||!$C)))$Hc=($C?$C*$y:0)+count($K);elseif($w!="sql"||!$ud){$Hc=($ud?false:found_rows($S,$Z));if($Hc<max(1e4,2*($C+1)*$y))$Hc=reset(slow_query(count_rows($a,$Z,$ud,$Mc)));else$fc=false;}}$Fe=($y!=""&&($Hc===false||$Hc>$y||$C));if($Fe){echo(($Hc===false?count($K)+1:$Hc-$C*$y)>$y?'<p><a href="'.h(remove_from_uri("page")."&page=".($C+1)).'" class="loadmore">'.lang(94).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$y).", '".lang(95)."â€¦');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$C){if($Fe){$Wd=($Hc===false?$C+(count($K)>=$y?2:1):floor(($Hc-1)/$y));echo"<fieldset>";if($w!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(96)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(96)."', '".($C+1)."')); return false; };"),pagination(0,$C).($C>5?" â€¦":"");for($r=max(1,$C-4);$r<min($Wd,$C+5);$r++)echo
pagination($r,$C);if($Wd>0){echo($C+5<$Wd?" â€¦":""),($fc&&$Hc!==false?pagination($Wd,$C):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Wd'>".lang(97)."</a>");}}else{echo"<legend>".lang(96)."</legend>",pagination(0,$C).($C>1?" â€¦":""),($C?pagination($C,$C):""),($Wd>$C?pagination($C+1,$C).($Wd>$C+1?" â€¦":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(98)."</legend>";$Kb=($fc?"":"~ ").$Hc;echo
checkbox("all",1,0,($Hc!==false?($fc?"":"~ ").lang(99,$Hc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Kb' : checked); selectCount('selected2', this.checked || !checked ? '$Kb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(89),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(85).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(100),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(101),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$Gc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Gc['sql']);break;}}if($Gc){print_fieldset("export",lang(102)." <span id='selected2'></span>");$De=$b->dumpOutput();echo($De?html_select("output",$De,$ta["output"])." ":""),html_select("format",$Gc,$ta["format"])," <input type='submit' name='export' value='".lang(102)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Wb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(103)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ta["format"],1);echo" <input type='submit' name='import' value='".lang(103)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$yg'>\n","</form>\n",(!$Mc&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($R,$s,$A)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$y=11;$H=$h->query("SELECT $s, $A FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$s = $_GET[value] OR ":"")."$A LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $y");for($r=1;($J=$H->fetch_row())&&$r<$y;$r++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($s))."]")."=".urlencode($J[0]))."'>".h($J[1])."</a><br>\n";if($J)echo"...\n";}exit;}else{page_header(lang(63),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(104).": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(45)."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.lang(105),'<td>'.lang(106),"</thead>\n";foreach(table_status()as$R=>$J){$A=$b->tableName($J);if(isset($J["Engine"])&&$A!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($R)."'>$A</a>";$X=format_number($J["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($J["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();