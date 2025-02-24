<?php //newOpSeqLive.php 
require '../vendor/autoload.php';?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>BENSENVILLE Op Seq Live</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!--<meta http-equiv="refresh" content="10">  removed refresh for testing purposes-->
    <link rel="shortcut icon" type="image/x-icon" href=/webpages/dev/bpowers/capacity_dashboard/images/favicon.ico />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="screen2.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
    <link rel="stylesheet" href="newOpSeqLive.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <?php include '../includes/return_button.php'?>

</head>
<body>
        <main>
          <section>
              <button onclick="goto_shift_supervisor()" type="button" id="goto_shift_supervisor">Shift Supervisor Page</button>
                 <button type="button" id="move_wo_button_inline" onclick="move_wo('1')">Move Work Orders Inline</button>
                 <button type="button" id="move_wo_button_outaline" onclick="move_wo('2')">Move Work Orders Across Lines</button>
                    <div id="tables_div" class="row" style="padding: 5px 0 0 5px">
                    </div>
          </section>
</main>
<div>
    <b id="boldE"><h9 class="opSeqEHeading" id="opSeqEHeading">Extrusion</h9></b> 
    <div class="opSeqGrid" id="opSeqGridE" style="background-color: rgba(255, 140, 0,.2);">
    </div>
    <b id="boldC"><h9 class="opSeqCHeading" id ="opSeqCHeading">Cabling</h9></b>
    <div class="opSeqGrid" id="opSeqGridC" style="background-color:rgba(255,105,180,.2);">
    </div>
    <b id="boldX"><h9 class="opSeqXHeading" id="opSeqXHeading">Others</h9></b>
    <div class="opSeqGrid" id="opSeqGridX" style="background-color:rgba(128, 0, 128,.2);">
    </div>
    <br><br><br>
<button onclick="topFunction()" id="topBtn" title="Go to top">Scroll to Top</button>

</div>
    <button id="openAllButton" class="openAllButton" onclick="openAll(0)" style="position:fixed; width:10%; height:5%; top:95%; left:90%;">Open First Three</button>
    <button id="extrusionBut" class="openAllButton" onclick="hideTable('extrusion','extrusionBut','opSeqEHeading')" style="position:fixed; width:10%; height:5%; top:95%; left:0%; background-color: white;">Hide Extrusion</button>
    <button id="cablingBut" class="openAllButton" onclick="hideTable('cabling','cablingBut','opSeqCHeading')" style="position:fixed; width:10%; height:5%; top:95%; left:10%; background-color: white;">Hide Cabling</button>
    <button id="othersBut" class="openAllButton" onclick="hideTable('others','othersBut','opSeqXHeading')" style="position:fixed; width:10%; height:5%; top:95%; left:20%; background-color: white;">Hide Others</button>
</body>
<script>
    var lines = ["D1_B","D2_B","D3_B","D4_B","BL1_B","BL2_B","BL3_B","BL4_B","BL6_B","BL7_B","BL8_B","BL9_B","Braid","NH2_B","NH3_B","PT1_B","PT2_B","BL10_B","BL11_B","BL12_B","HOLD_B","Cook24A","Imach1_B","Taping_B","Cook36A_B","Cook36B_B","Cook36C_B","Braid_36_B","Braid_42_B","Testing_line","PRECESSIONTWNR"];
	var init_data = [["D1_B","1141191_60","S062923-36_20","1140516_20","1149208_30","1146812_30","1147047_30","1147047_60","1147047_90","786623-1-2_20","1148393_30","1141005_20"],["D2_B","S060723-07A_30","S060723-08A_30","1128505_40","1144839_50","1135423_30","1116000_30","1116007_30","1120278_50","1139070_100","785552-1-3_80","1149213_20","1141908_90","1146025_90","1148378_50","1147047_100","1146080_30","1138034_20","786623-1-2_90","1148393_40","1141005_50","1145815_20","1144010_20"],["D3_B","1137894_30","1142602_60","1141763_20","1123523_20","1141191_70","1147547_20","1139037_20","1146073_20","1140794_20","1149203_40","1144193_20"],["D4_B","1137030_20","1147171_20","1086199_40","1146101_20"],["BL1_B",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1147578","1144432_20"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148039","1136477_60"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151144","786623-1-2_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150935","1138034_10","786296-1-2_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150936","777901-2-3_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148376","1144422_20"],"786858-1-2_20","1131299_20",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151145","786623-1-2_50"]],["BL2_B",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150135","1111607_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150153","1111598_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150154","1144105_10","1144105_30","1144105_50","1144105_70","1144105_90","1144105_110","1144105_130","1144105_150","1144105_170","1144105_190","1144105_210","1144105_230","1144105_250","1144105_270","1144105_290"],"1149203_20","1149203_30",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1147539","1141552_320","1141552_340","1141552_360","1141552_380","1141552_400","1141552_420","1141552_440","1141552_460","1141552_480","1141552_500","1141552_520","1141552_540"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151184","784342-1-2_10","784342-1-2_30","784342-1-2_50","784342-1-2_70","784342-1-2_100","784342-1-2_120","784342-1-2_140","784342-1-2_160","784342-1-2_190","784342-1-2_210","784342-1-2_230","784342-1-2_250"]],["BL3_B",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150882","1141721_10","1143890_10","1143890_30","1141721_40","1143890_50","1141721_70"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150884","1145811_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150885","1141916_10","1145429_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150886","1147466_10","1147466_30"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150887","1143135_10"],"1141769_30","S063023-18_30","1146937_30","1149458_40","S062923-36_30","S060123-06_30"],["BL4_B",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1149833","1147171_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1149834","1149213_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1149835","1143452_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1149836","1143452_20"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150095","1139059_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150129","785552-1-3_30"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150881","787209-1-2_10","787209-1-2_30","787209-1-2_50","787209-1-2_70"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150730","1145972_20"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150729","1146073_10","1146101_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150727","1145424_10","1148102_10","1148107_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150894","1148378_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150732","1144530_10"]],["BL6_B","784971-1-2_40","784971-4-2_40","1122721_20","1143065_50","1135792_50","1145033_30","S060223-09_30","1134102_90","786161-00010-03_90","1143961_40","S069223-14B_40","1143373_50","1143788_30","1141763_30","1147171_30","1149213_30","1140516_30","1142062_60","1142319_60","1145935_30","1146711_30","1146724_30","1145424_30","1148102_30","1148107_30","1143890_80","1145811_30","1141916_30","1145429_30","1147466_50","1150519_40"],["BL7_B",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148702","1144803_10","1144810_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150096","1147547_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150097","1139037_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151326","1150967_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151327","1148393_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151334","1148393_20"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150121","1144817_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150122","1144817_20"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150123","1144817_30"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150759","1115549_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150758","1115549_20"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150755","1115549_30"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150756","1115549_40"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150757","1115549_50"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150872","1140794_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150754","1118326_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151537","1145815_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151666","1144010_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151667","1144193_10"]],["BL8_B",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148405","1116021_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148374","1116000_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148377","1116007_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150674","1144002_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148471","1141699_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1147457","1128380_60"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1149343","1120278_30"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150132","1141908_10","1146025_10","1141908_40","1146025_40","1141908_60","1146025_60"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150895","1149208_10","1148378_30"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150896","1146046_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150897","1146093_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150898","1146329_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150899","1146812_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150907","1147047_10","1147047_40","1147047_70"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150908","1145953_10","1145957_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150909","1146080_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151291","1146020_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151292","1150519_10"]],["BL9_B","S062323-13_60","S062723-03_60","1142332_40","S062023-06_40","1147557_30","1120909_100","1123523_30","782234-1-3_60","1116007_40","1116000_40","S060723-07A_40","S060723-08A_40","S069223-14B_30","1141191_90","1133446_80","1128505_50","1141908_100","1146025_100","1144105_320","1145972_50","1141721_130","1146329_40","1147047_110","S062023-01_30"],["Braid","1128380_40","1140513_30","1133446_60","1143961_30","1086199_50","1134102_80","786161-00010-03_80","1149458_30","1141721_110","1146093_40","786296-1-2_30","1144010_30"],["NH2_B","786161-00010-03_70","1134102_70","S069223-14B_20","1149458_20","1143373_20","1143373_40","1143788_20","1136477_20","1144105_20","1144105_40","1144105_60","1144105_80","1144105_120","1144105_140","1144105_160","1144105_180","1144105_200","1144105_220","1144105_240","1144105_260","1144105_280","1145424_20","1144105_100","1144105_300","1148102_20","1145811_20","1141916_20","1145429_20","1148378_20"],["NH3_B","S063023-18_20","S060123-06_20","1146937_20","1145935_20","1146711_20","1146724_20","1142319_50","1142062_50","1136477_40","787209-1-2_20","787209-1-2_40","787209-1-2_60","787209-1-2_80","1141721_30","1141721_60","1141721_90","1143890_20","1143890_40","1143890_60","1147466_20","1147466_40","1146093_30","1146329_30"],["PT1_B","1141552_310","1141552_560","1144803_40","1144810_40","1144817_40","1144002_30"],["PT2_B","1137278_80","1128380_100","784342-1-2_280"],["BL10_B","1140318_60","1137482_90","1117464_70","1142942_40","1144550_30","1140158_50","1136542_40","1132915_50","1122469_50","786511-1-2_60","1137356_50","1090924_360","1146224_40","1134672_60","1140816_60","1137278_90","1144583_30","1128380_120","1142326_40","1116014_40","1116028_40","1116021_40","1141552_570","1140842_90","1131479_50","1120278_60","1144803_50","1144810_50","1142602_70","1144839_60","1143452_40","1147472_30","1147547_30","1139037_40","1144817_50","1146073_40","1146101_30","1144530_40","1118326_40","1140794_30","1146046_40","1145953_50","1145957_50","1146080_50","1144002_40","1146020_50","1150967_40","1148393_60","1144193_30"],["BL11_B","1142168_30","784971-10-2_40","1111649_60","1141237_40","1141741_30","1141744_30","1141738_30","1113794_40","1141712_60","1143122_30","1146981_30","1139887_30","1144960_30","1135909_50","1143072_30","1139070_40","1139070_90","1142388_40","1143715_40","785552-1-2_90","1086199_60","S022323-02_40","1140499_50","1135423_40","1136252_70","787485-1-2_180","1140979_180","1136542_70","1137030_30","1137894_50","1139897_50","1141699_40","1140513_40","1139070_110","785552-1-3_90","1139059_30","787209-1-2_100","1143135_40","1148378_70","1149208_50","1146093_60","1146812_50","1138034_50","786296-1-2_50","777901-2-3_30","777901-2-3_40","1149203_50","786623-1-2_100","784342-1-2_290","1115549_70","1141005_70","1145815_30","1144010_40"],["BL12_B",["W18TC16/.0100-L1.000-RBS","C60061M-SA","1149838","1141546_10","1141549_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1150965","1149203_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148375","1144422_10"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151464","1141005_10","1141005_30"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1151536","1141005_40"],["W18TC16/.0100-L1.000-RBS","C60061M-SA","1148037","1136477_10","1136477_30","1136477_70"]],["HOLD_B"],["Cook24A","786623-1-2_40","786623-1-2_80","1141552_330","1141552_350","1141552_370","1141552_390","1141552_410","1141552_430","1141552_450","1141552_470","1141552_490","1141552_510","1141552_530","1141552_550","786296-1-2_20","777901-2-3_20","786623-1-2_60"],["Imach1_B","S062023-01_20","1143452_30","1111607_20","1144530_20","1115549_60","1118326_20","1146046_30","1136477_80","1144432_30"],["Taping_B","1140816_50","787485-1-2_170","1140979_170","1140499_40","1140842_80","1128380_50","1145953_40","1145957_40"],["Cook36A_B","1116014_30","1116028_30","1116021_30","1141699_30","1145953_30","1145957_30","784342-1-2_90","784342-1-2_180","784342-1-2_270","1146020_30","1150967_20"],["Cook36B_B"],["Cook36C_B","1141769_20","1147472_20","1137839_60","1142294_60","1139059_20","1111598_20","1144105_310","1148107_20","1145972_30","787209-1-2_90","1143890_70","1143135_20","1141721_100","1144422_30"],["Braid_36_B","1140842_70","S022323-02_30","1131479_30","1141191_80","1138034_30"],["Braid_42_B","1137482_80","1128380_110","1136542_50"],["Testing_line","1120909_90"],["PRECESSIONTWNR","784342-1-2_20","784342-1-2_40","784342-1-2_60","784342-1-2_80","784342-1-2_110","784342-1-2_130","784342-1-2_150","784342-1-2_170","784342-1-2_200","784342-1-2_220","784342-1-2_240","784342-1-2_260","1150519_30"]];
    var pwo_lakepart = [["1141191","SVXWB7C5ESTBRD"],["S062923-36","FF162LL5S"],["1140516","GXL162-18ANX"],["1149208","C164CN-2464"],["1146812","SV162(26)\/TPE-ASC"],["1147047","V163PRS\/X1"],["786623-1-2","C142222242PRLSZH-08"],["1148393","C83201PRS\/20327"],["1141005","CNB201P163201TXL\/TPU"],["S060723-07A","V184-QR"],["S060723-08A","V186S-QR"],["1128505","S162241PRS\/OASA"],["1144839","S142C222SJ-00"],["1135423","TXL182224S-00"],["1116000","V186S\/22DR"],["1116007","V186S\/22DR"],["1120278","C204201PNPVC-PEC"],["1139070","S6C4E-SANTO3"],["785552-1-3","S162243EPSTKV\/PU"],["1149213","S2213CT-X1-18"],["1141908","SB182SPOST-TURCK"],["1146025","SB182SPOST-548TK"],["1148378","C162C201PRT-2464"],["1146080","SVT165(65)-4TRK"],["1138034","FBX182STBZH-04TK"],["1145815","S183CST(16)-CON"],["1144010","S8001607OBS600V"],["1137894","GPT141164-00TPE"],["1142602","ST164C222EPS-CUST"],["1141763","AVLUT522S-09"],["1123523","AVP164OFC65-09AV"],["1147547","SEOOW168\/X"],["1139037","SEOOW184-09"],["1146073","SVT186(41)-TURCK"],["1140794","STOOW186-00CON"],["1149203","CNB181PRS16ROD\/TPR-IEWC"],["1144193","MMGF3(12)0500"],["1137030","STOOW164-04MEN"],["1147171","182CS\/K1-09AAON"],["1086199","AVB222MITP"],["1146101","SVT182(41)-TURCK"],["1144432","HW145184\/AKV68"],["1136477","HW15C4E\/AKV98"],["786296-1-2","S101552378-500M"],["777901-2-3","ZBH183ST"],["1144422","HW145184\/AKV68"],["786858-1-2","S244GSMD-FLAT2"],["1131299","S246GSM\/S-FTV"],["1111607","C2617T19\/15-NJ"],["1111598","C228T19\/1007-NJ"],["1144105","T2015PRS-EIS"],["1141552","Z3CAT6S2212PR\/600V"],["784342-1-2","S2424SCAT5FEP\/PUR"],["1141721","C223PRSTPN-NUL"],["1143890","C223EPSTPE-05RF"],["1145811","S202CSTP-2570"],["1141916","183CSTPE-00PEC"],["1145429","B182CSTP(16)-AWC"],["1147466","251PRS252ST\/NUL"],["1143135","S166STP26\/PUR-XACT"],["1141769","AVPLUT522S-98"],["S063023-18","FF182CST(19)-02"],["1146937","FF244CST-08"],["1149458","FF202CST-BRD02"],["S060123-06","FF183CST(19)-02"],["1143452","S20C2E-00CW"],["1139059","T208CST-09"],["787209-1-2","STE184PRS\/X22DR-JBT"],["1145972","C124182\/2586"],["1145424","C204CT-AWC"],["1148102","C204CT-ASC"],["1148107","C207CT-ASC"],["1144530","S1818T16-00\/NUL"],["784971-1-2","UL230306JMJ1"],["784971-4-2","UL230306JMJ4"],["1122721","202C-FLAT-09PEC"],["1143065","P242PR7-00FLAT"],["1135792","P242PR7-00FLAT"],["1145033","AV146CT41-00LIB"],["S060223-09","183CSP"],["1134102","C243PRSTFP\/BRD-ASC"],["786161-00010-03","C243PRSTFP\/BRD-ASC"],["1143961","C242CSTFPBRD-BLD"],["S069223-14B","C242CSTFPBRD-BLD"],["1143373","AV222ZEPS-00LIB"],["1143788","184FFP-18AI"],["1142062","S222PRSP-00CAI"],["1142319","S222PRSP-00CAI"],["1145935","184FFP-18AI"],["1146711","184FFP-18AI"],["1146724","184FFP-18AI"],["1150519","V144-QR"],["1144803","C82142182\/PEC"],["1144810","C82142182\/PEC"],["1150967","SEOOW184T\/X1-IP"],["1144817","C82142182\/PEC"],["1115549","GPT9C5E-45FS"],["1118326","S144C41-18"],["1116021","V186S\/22DR"],["1144002","V82SRV\/M4-FLAT"],["1141699","SVT123(65)\/FLX1-ER-JM"],["1128380","SVXLC1241810-INH"],["1146046","ST1819T-TRK"],["1146093","SVT182S41BRD-TRK"],["1146329","V182ST(19)-BLD-04"],["1145953","S123NC65-0TMC"],["1145957","S124NC65-0TMC"],["1146020","SV104(105)-TURCK"],["S062323-13","L142PRS"],["S062723-03","L142PR"],["1142332","162192FP-09ADT"],["S062023-06","SVG182-QR"],["1147557","SF222CP"],["1120909","MCT201181PS-8TRK"],["782234-1-3","S10151677-750M"],["1133446","DN181151SPOS-TRK"],["S062023-01","CXX124(65)\/X-07"],["1140513","AVB24MIC-VTG"],["1137278","CNB181PR143THWN187GXL"],["1140318","S0511161"],["1137482","SVLC124188181PR-PEC"],["1117464","S7C6E-4590"],["1142942","SJEOOW144ELEX-MCS"],["1144550","C167C65-20626\/CSA"],["1140158","VFDX144SBRD\/X-TK"],["1136542","C185BRD16\/CRU\/2586"],["1132915","ST184(16)\/ER"],["1122469","TWP142164-02LDPE"],["786511-1-2","DN161201SPOST-HAR"],["1137356","SV1812(16)\/TPE-ASC"],["1090924","S29C4E\/TPE"],["1146224","C163C\/TPE-MCS"],["1134672","S186TCAT6S\/BRD-IEWC"],["1140816","C202243CP-83MEN"],["1144583","SVC143ST\/X-FLASH"],["1142326","C185(41)-18"],["1116014","V186S\/22DR"],["1116028","V186S\/22DR"],["1140842","STNX2014202PRSBRD\/X-ER-CE"],["1131479","VFDX124STBRD-TRK"],["1147472","CIGXX123(65)\/X"],["1142168","T222CT(7)-TPE"],["784971-10-2","UL230306JMJ10"],["1111649","DN171201\/TPU-TRK"],["1141237","S1810C(41)-04MEN"],["1141741","S800182CSPU-06"],["1141744","S800182CSPU-06"],["1141738","S800182CSPU-06"],["1113794","AVB24MSQ"],["1141712","S242EPSTPP\/PUR"],["1143122","S800182CSPU-06"],["1146981","S183CT(16)A-00TJ"],["1139887","S206TPR-09PUR"],["1144960","SP184C(19)\/X2-00"],["1135909","S800041612"],["1143072","SP184C(19)\/X1-00"],["1142388","AVRG58AUDB\/TPU-04"],["1143715","C185CBRD-99"],["785552-1-2","S162243EPSTKV\/PU"],["S022323-02","AVPFFSRG8-LWC"],["1140499","MHLF3(20)SJ0400"],["1136252","S7C5E\/NUL"],["787485-1-2","S182T247PR\/TPU-04ANX"],["1140979","S182T247PR\/TPU-04ANX"],["1139897","TWP142164-02LDPE"],["1141546","S010906B\/X1"],["1141549","S010906B\/X"],["1137839","S5C2E\/AQG7"],["1142294","HW6C2E\/ZW48"]];
    var colors = [["D1_B","yellow","green","green","red","red","red","red","red","red","red","red"],["D2_B","green","green","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["D3_B","green","green","green","red","red","red","red","red","red","red","red"],["D4_B","green","red","red","red"],["BL1_B","green","green","green","green","green","green","green","green","green"],["BL2_B","green","green","green","green","green","green","green"],["BL3_B","green","green","green","green","green","red","red","red","red","red","red"],["BL4_B","green","green","green","green","green","green","green","green","green","green","green","green"],["BL6_B","green","green","green","green","green","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["BL7_B","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green"],["BL8_B","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green"],["BL9_B","green","green","green","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["Braid","green","green","green","green","red","red","red","red","red","red","red","red"],["NH2_B","green","green","green","green","green","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["NH3_B","green","green","green","green","green","green","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["PT1_B","green","red","red","red","red","red"],["PT2_B","green","red","red"],["BL10_B","green","green","green","green","green","green","green","green","green","green","green","green","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["BL11_B","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["BL12_B","green","green","green","green","green","green"],["HOLD_B"],["Cook24A","green","green","red","red","red","red","red","red","red","red","red","red","red","red","red","red","red"],["Imach1_B","green","red","red","red","red","red","red","red","red"],["Taping_B","green","green","green","green","red","red","red","red"],["Cook36A_B","green","green","red","red","red","red","red","red","red","red","red"],["Cook36B_B"],["Cook36C_B","green","green","green","green","red","red","red","red","red","red","red","red","red","red"],["Braid_36_B","green","red","red","red","red"],["Braid_42_B","green","red","red"],["Testing_line","green"],["PRECESSIONTWNR","red","red","red","red","red","red","red","red","red","red","red","red","red"]];
    var doable_ops = {"D1_B":{"mfg_line":"D1_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"D2_B":{"mfg_line":"D2_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"D3_B":{"mfg_line":"D3_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"D4_B":{"mfg_line":"D4_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL1_B":{"mfg_line":"BL1_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"1","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL2_B":{"mfg_line":"BL2_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"1","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL3_B":{"mfg_line":"BL3_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL4_B":{"mfg_line":"BL4_B","insulating":"1","cabling":"0","jacketing":"0","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL6_B":{"mfg_line":"BL6_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL7_B":{"mfg_line":"BL7_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL8_B":{"mfg_line":"BL8_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL9_B":{"mfg_line":"BL9_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Braid":{"mfg_line":"Braid","insulating":"0","cabling":"0","jacketing":"0","braiding":"1","taping":"0","braided_armor":"1","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"NH2_B":{"mfg_line":"NH2_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"NH3_B":{"mfg_line":"NH3_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"PT1_B":{"mfg_line":"PT1_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"PT2_B":{"mfg_line":"PT2_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL10_B":{"mfg_line":"BL10_B","insulating":"0","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL11_B":{"mfg_line":"BL11_B","insulating":"0","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"BL12_B":{"mfg_line":"BL12_B","insulating":"1","cabling":"0","jacketing":"1","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"HOLD_B":{"mfg_line":"HOLD_B","insulating":"0","cabling":"0","jacketing":"0","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Cook24A":{"mfg_line":"Cook24A","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Imach1_B":{"mfg_line":"Imach1_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Taping_B":{"mfg_line":"Taping_B","insulating":"0","cabling":"0","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Cook36A_B":{"mfg_line":"Cook36A_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Cook36B_B":{"mfg_line":"Cook36B_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Cook36C_B":{"mfg_line":"Cook36C_B","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Braid_36_B":{"mfg_line":"Braid_36_B","insulating":"0","cabling":"0","jacketing":"0","braiding":"1","taping":"0","braided_armor":"1","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Braid_42_B":{"mfg_line":"Braid_42_B","insulating":"0","cabling":"0","jacketing":"0","braiding":"1","taping":"0","braided_armor":"1","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"Testing_line":{"mfg_line":"Testing_line","insulating":"0","cabling":"0","jacketing":"0","braiding":"0","taping":"0","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"},"PRECESSIONTWNR":{"mfg_line":"PRECESSIONTWNR","insulating":"0","cabling":"1","jacketing":"0","braiding":"0","taping":"1","braided_armor":"0","corrugated_taping":"0","insulating_flat_cables":"0","interlock_armoring":"0","rod_insulating":"0","spiral_serve":"0","strander":"0","textile_braid":"0"}};


    document.onvisibilitychange = function() {
        if (document.visibilityState === 'hidden') {
            console.log("work")
        }
    };
    cablingT = ["cabling","braiding","taping","braided_armor","corrugated_taping","textile_braid"]
	extrusionT = ["insulating","jacketing","insulating_flat_cables","rod_insulating"]
    buttonHeadingHTML = ["","",""]
    splitTable = splitLineAndTotalToCAndE(doable_ops, cablingT, extrusionT) //returns a table in the format [cabling_machines, extrusion_machines, extra machines]
    makeGridArray(["opSeqGridC","opSeqGridE","opSeqGridX"],splitTable)

    function hideTable(typeOfTab, buttonId, headingId){ //hides the table (extrusion, cabling, others)
        button = document.getElementById(buttonId)
        if(typeOfTab == 'cabling'){ 
            opSeqGrid = document.getElementById("opSeqGridC")
        }
        if(typeOfTab == 'extrusion'){
            opSeqGrid = document.getElementById("opSeqGridE")
        }
        if(typeOfTab == 'others'){
            opSeqGrid = document.getElementById("opSeqGridX")
        }
        /*for(i = 0; i < opSeqGrid.children.length;i++){
            for(j=0; j<opSeqGrid.children[i].children.length;j++){
                opBut = opSeqGrid.children[i].children[j].children[0]
                console.log(opBut)
                if(opBut.name == "openAll"){
                    opBut.click()
                    opBut.click()
                }
                if(opBut.name == "closeAll"){
                    opBut.click()
                }
            }
        }*/
        if(typeOfTab == 'cabling'){ 
            bTag = document.getElementById("boldC")
            buttonHeadingHTML[0] = bTag.innerHTML
            opSeqGrid.style.display = "none"
            bTag.innerHTML = ""
            button.style.backgroundColor = "#A9A9A9"
            button.innerHTML = "Show Cabling"
        }
        if(typeOfTab == 'extrusion'){

            bTag = document.getElementById("boldE")
            buttonHeadingHTML[1] = bTag.innerHTML
            opSeqGrid.style.display = "none"
            bTag.innerHTML = ""
            button.style.backgroundColor = "#A9A9A9"
            button.innerHTML = "Show Extrusion"


        }
        if(typeOfTab == 'others'){
            bTag = document.getElementById("boldX")
            buttonHeadingHTML[2] = bTag.innerHTML
            opSeqGrid.style.display = "none"
            bTag.innerHTML = ""
            button.style.backgroundColor = "#A9A9A9"
            button.innerHTML = "Show Others"
        }
        button.setAttribute('onclick','showTable('+JSON.stringify(typeOfTab)+','+JSON.stringify(buttonId)+','+JSON.stringify(headingId)+')')
    }
    function showTable(typeOfTab,buttonId, headingId){//opens the table that was closed
        button = document.getElementById(buttonId)

        if(typeOfTab == 'cabling'){ 
            opSeqGrid = document.getElementById("opSeqGridC")
            button.innerHTML = "Hide Cabling"
            button.style.backgroundColor = "white"

            bTag = document.getElementById("boldC")
            bTag.innerHTML = buttonHeadingHTML[0]
            opSeqGrid.style.display = "grid"
        }
        if(typeOfTab == 'extrusion'){
            opSeqGrid = document.getElementById("opSeqGridE")
            button.innerHTML = "Hide Extrusion"
            button.style.backgroundColor = "white"

            bTag = document.getElementById("boldE")
            bTag.innerHTML = buttonHeadingHTML[1]
            opSeqGrid.style.display = "grid"

        }
        if(typeOfTab == 'others'){
            opSeqGrid = document.getElementById("opSeqGridX")
            button.innerHTML = "Hide Others"
            button.style.backgroundColor = "white"

            bTag = document.getElementById("boldX")
            bTag.innerHTML = buttonHeadingHTML[2]
            opSeqGrid.style.display = "grid"

        }
        heading = document.getElementById(headingId)
        heading.scrollIntoView({behavior: "smooth", block: "start"});
        button.setAttribute('onclick','hideTable('+JSON.stringify(typeOfTab)+','+JSON.stringify(buttonId)+','+JSON.stringify(headingId)+')')
    }
    function splitLineAndTotalToCAndE(doable_ops, cablingTable, extrusionTable){
		//splits line capacities and totals into their extrusion and cabling counterparts and returns an array of them
		cabling_line_items = []
		extrusion_line_items = []
        extra = []
		ranFunction = false
		for(i = 0; i <(lines.length); i++){ //loops through all the machines
			ranFunction = false;
			for(j=0; j<(cablingTable.length); j++){
				if ((doable_ops[lines[i]][cablingTable[j]] == "1") && (ranFunction==false)){ 
					//if any of the items in the cablingTable are equal to 1 for the machine, it stores that in the cabling line arrays
					cabling_line_items.push(lines[i])
					ranFunction=true
				}
			}
            for(j=0; j<(extrusionTable.length);j++){
                if((doable_ops[lines[i]][extrusionTable[j]] == "1" && (ranFunction==false))){
					//if any of the items in the extrusionTable are equal to 1 for the machine, it stores that in the extrusion line arrays
                    extrusion_line_items.push(lines[i])
					ranFunction = true
				}
            }
            if(ranFunction == false){
                extra.push(lines[i])
            }
        }
        return [cabling_line_items,extrusion_line_items,extra]
    }
    function makeGridArray(opSeqIds,splitTable){ //makes the grids that are used to separate the columns of the machines
        gridArrays = []
        for(j=0; j<opSeqIds.length; j++){
            opSeqGrid = document.getElementById(opSeqIds[j])
            numOfCol = 9
            gridArray = []
            for(i = 1;i<=numOfCol ;i++){
                newDiv = document.createElement('div')
                newDiv.setAttribute('id','sevenGrid' + i)
                newDiv.setAttribute('class', 'sevenGrid')
                newDiv.style.marginLeft = "2vw"
                newDiv.style.marginRight = "2vw"
                opSeqGrid.appendChild(newDiv)
                gridArray.push(newDiv)
            }
            gridArrays.push(gridArray)
        }
        console.log(gridArrays)
        buildOpSeq(gridArrays,splitTable)
    }
    function openAll(phase){ //opens the machines depending on which phase they choose
        if(phase == 0){ //phase 0 is opening three
            for (i=0; i<init_data.length;i++){
                opSeqButton2 = document.getElementById('opSeqButtonOther'+i)
                if(opSeqButton2 == null){
                    continue
                }
                console.log('running')
                if(opSeqButton2.name == "openThree"){
                    opSeqButton2.click()
                }
                else if(opSeqButton2.name == "closeAll"){
                    opSeqButton2.click()
                    opSeqButton2.click()

                }
            }
            openAllButton = document.getElementById("openAllButton")
            openAllButton.innerHTML = ""
            openAllButton.innerHTML = "Open Full Queue"
            openAllButton.setAttribute('onclick','openAll(1)')
        }
        if(phase == 1){ //phase 1 is opening all
            for (i=0; i<init_data.length;i++){
                opSeqButton2 = document.getElementById('opSeqButtonOther'+i)
                if(opSeqButton2 == null){
                    continue
                }
                if(opSeqButton2.name == "openThree"){
                    opSeqButton2.click()
                    opSeqButton2.click()
                }
                if(opSeqButton2.name == "openAll"){
                    opSeqButton2.click()
                }

            }
            openAllButton = document.getElementById("openAllButton")
            openAllButton.innerHTML = ""
            openAllButton.innerHTML = "Close"
            openAllButton.setAttribute('onclick','openAll(2)')
        }
        if(phase == 2){ //phase 2 is closing all
            for (i=0; i<init_data.length;i++){
                opSeqButton2 = document.getElementById('opSeqButtonOther'+i)
                if(opSeqButton2 == null){
                    continue
                }
                if(opSeqButton2.name == "openAll"){
                    opSeqButton2.click()
                    opSeqButton2.click()
                }
                if(opSeqButton2.name == "closeAll"){
                    opSeqButton2.click()
                }
            }
            openAllButton = document.getElementById("openAllButton")
            openAllButton.innerHTML = ""
            openAllButton.innerHTML = "Open First Three"
            openAllButton.setAttribute('onclick','openAll(0)')
        }
    }
    function buildOpSeq(gridArrays,splitTable){ //builds the site
        opSeqId = ""
        arrayNum = 10
        cabCount = 0
        extCount = 0
        xCount = 0
        for (i=0;i<init_data.length;i++){
            for(j=0; j<splitTable.length; j++){
                for(h=0;h<splitTable[j].length; h++){
                    if(j == 0){
                        nameId = "C"
                    }
                    if(j == 1){
                        nameId = "E"
                    }
                    if(j == 2){
                        nameId = "X"
                    }
                    if(lines[i] == splitTable[j][h]){
                        if(nameId == "C"){
                            orderNum = cabCount%9
                            cabCount += 1

                        }
                        if(nameId == "E"){
                            orderNum = extCount%9
                            extCount += 1

                        }
                        if(nameId == "X"){
                            orderNum = xCount%9
                            xCount += 1

                        }
                        opSeqId = "opSeqGrid"+nameId
                        arrayNum = j
                        break
                    }
                }
            }
            opSeqGrid = document.getElementById(opSeqId)
            opSeqMachineGrid = document.createElement("div")
            opSeqMachineGrid.setAttribute("class",'opSeqMachineGrid')
            opSeqMachineGrid.setAttribute("id",'opSeqMachineGrid'+i)
            opSeqName = document.createElement("div")
            opSeqNameLink = document.createElement("a")
            opSeqNameLink.setAttribute('href','youtube.com')
            opSeqName.setAttribute('class','opSeqNameClass')
            opSeqNameLink.appendChild(document.createTextNode(init_data[i][0]))
            opSeqName.appendChild(opSeqNameLink)
            opSeqNo = document.createElement("div")
            downArrow = document.createElement('i')
            downArrow.setAttribute('class','fa fa-angle-down')
            downArrow.setAttribute('id','downArrow'+i)
            opSeqNo.appendChild(downArrow)
            opSeqButton2 = document.createElement("button")
            opSeqButton2.setAttribute('class','opSeqButton')
            opSeqButton2.setAttribute('id','opSeqButtonOther'+i)
            opSeqButton2.appendChild(opSeqNo)
            opSeqButton = document.createElement("button")
            opSeqButton.setAttribute('class','opSeqButton')
            opSeqButton.setAttribute('onclick','openFirstLayer('+i+')')
            opSeqButton2.setAttribute('onclick','openFirstLayer('+i+')')
            opSeqButton.setAttribute('id','opSeqButton'+i)
            opSeqButton.appendChild(opSeqName)
            opSeqNo.setAttribute('class','opSeqNameClass')
            console.log("arrayNum" + arrayNum)
            console.log("orderNum" + orderNum)
            gridArrays[arrayNum][orderNum].appendChild(opSeqMachineGrid)
            opSeqMachineGrid.appendChild(opSeqButton2)
            opSeqMachineGrid.appendChild(opSeqButton)
            opSeqButton.name = "openThree"
            opSeqButton2.name = "openThree"
        }
        console.log(gridArrays)
    }
    function openFirstLayer(i){ //opens the first layer of the machine which shows three or less operations
        opSeqButton = document.getElementById('opSeqButton'+i)
        opSeqButton2 = document.getElementById('opSeqButtonOther'+i)
        opSeqMachineGrid = document.getElementById('opSeqMachineGrid'+i)
        downArrow = document.getElementById('downArrow'+i)
        downArrow.setAttribute('class','fa fa-angle-double-down')
        opTable = []
        for(j=0; j<3; j++){
            if(init_data[i][j+1] != undefined){
                opTable[j] = init_data[i][j+1]
            }
        }
        for(j = 0;j < opTable.length;j++){
            if(typeof opTable[j] != "string"){
                opTable[j] = opTable[j].slice(0,3)
            }
        }
        for(h = 0;h < opTable.length;h++){
            color = colors[i][h+1]
            newOpNum = document.createElement("div")
            newOpDiv = document.createElement("div")
            newOpNum.appendChild(document.createTextNode(JSON.stringify(h+1)))
            opSeqMachineGrid.appendChild(newOpNum)
            if(typeof opTable[h] != "string"){
                newOpNum.setAttribute('class',color+'opNum')
                newOpDiv.setAttribute('class',color+'mwoOpDiv')
                nameDiv = document.createElement('div')
                nameDiv.appendChild(document.createTextNode("MWO "+opTable[h][2]))
                nameDiv.setAttribute('class','mwoNameDiv')
                cncDiv = document.createElement('div')
                cncDiv.appendChild(document.createTextNode(opTable[h][0]))
                cncDiv.appendChild(document.createElement('br'))
                cncDiv.appendChild(document.createTextNode(opTable[h][1]))
                cncDiv.setAttribute('class','mwoCNC')
                opSeqMachineGrid.appendChild(newOpDiv)
                newOpDiv.appendChild(nameDiv)
                newOpDiv.appendChild(cncDiv)
            }
            else{
                newOpNum.setAttribute('class',color+'opNum')
                newOpDiv.appendChild(document.createTextNode(opTable[h]))
                opPart = opTable[h].split('_',1)
                neededLakePart = []
                newOpDiv.appendChild(document.createElement('br'))
                for (j=0;j<pwo_lakepart.length;j++){
                    if(pwo_lakepart[j][0] == opPart[0]){
                        neededLakePart = pwo_lakepart[j][1]
                    }
                }
                newOpDiv.setAttribute('class',color+'opDiv')
                newOpDiv.appendChild(document.createTextNode(neededLakePart))
                opSeqMachineGrid.appendChild(newOpDiv)
            }
        }
        opSeqButton.setAttribute('onclick','openAllLayer('+i+')')
        opSeqButton2.setAttribute('onclick','openAllLayer('+i+')')
        opSeqButton.name = "openAll"
        opSeqButton2.name = "openAll"
    }
    function openAllLayer(i){//opens all the machines operations
        opSeqMachineGrid = document.getElementById('opSeqMachineGrid'+i)
        opSeqMachineGrid.innerHTML = ""
        opSeqName = document.createElement("div")
        opSeqNameLink = document.createElement("a")
        opSeqNameLink.setAttribute('href','google.com')
        opSeqName.setAttribute('class','opSeqNameClass')
        opSeqNameLink.appendChild(document.createTextNode(init_data[i][0]))
        opSeqName.appendChild(opSeqNameLink)
        opSeqNo = document.createElement("div")
        downArrow = document.createElement('i')
        downArrow.setAttribute('class','fa fa-angle-up')
        downArrow.setAttribute('id','downArrow'+i)
        opSeqNo.appendChild(downArrow)
        opSeqButton2 = document.createElement("button")
        opSeqButton2.setAttribute('class','opSeqButton')
        opSeqButton2.setAttribute('id','opSeqButtonOther'+i)
        opSeqButton2.setAttribute('onclick','closeAllLayer('+i+')')
        opSeqButton2.appendChild(opSeqNo)
        opSeqButton = document.createElement("button")
        opSeqButton.setAttribute('class','opSeqButton')
        opSeqButton.setAttribute('id','opSeqButton'+i)
        opSeqButton.setAttribute('onclick','closeAllLayer('+i+')')
        opSeqButton.appendChild(opSeqName)
        opSeqNo.setAttribute('class','opSeqNameClass')
        opSeqMachineGrid.appendChild(opSeqButton2)
        opSeqMachineGrid.appendChild(opSeqButton)
        opSeqButton.name = "closeAll"
        opSeqButton2.name = "closeAll"
        for(h = 1; h< init_data[i].length; h++){
            if(typeof init_data[i][h] == "string"){
                color = colors[i][h]
                newOpNum = document.createElement("div")
                newOpDiv = document.createElement("div")
                newOpNum.appendChild(document.createTextNode(JSON.stringify(h)))
                opSeqMachineGrid.appendChild(newOpNum)
                newOpNum.setAttribute('class',color+'opNum')
                newOpDiv.appendChild(document.createTextNode(init_data[i][h]))
                opPart = init_data[i][h].split('_',1)
                neededLakePart = []
                newOpDiv.appendChild(document.createElement('br'))
                for (j=0;j<pwo_lakepart.length;j++){
                    if(pwo_lakepart[j][0] == opPart[0]){
                        neededLakePart = pwo_lakepart[j][1]
                    }
                }
                newOpDiv.setAttribute('class',color+'opDiv')
                newOpDiv.appendChild(document.createTextNode(neededLakePart))
                opSeqMachineGrid.appendChild(newOpDiv)
            }
            if(typeof init_data[i][h] == "object") {
                    color = colors[i][h]
                    newOpNum = document.createElement("div")
                    newOpDiv = document.createElement("div")
                    newOpNum.setAttribute('class',color+'opNum')
                    newOpDiv.setAttribute('class',color+'mwoOpDiv')
                    newOpNum.appendChild(document.createTextNode(JSON.stringify(h)))

                    opSeqMachineGrid.appendChild(newOpNum)
                    opSeqMachineGrid.appendChild(newOpDiv)


                    nameDiv = document.createElement('div')
                    nameDiv.appendChild(document.createTextNode("MWO "+init_data[i][h][2]))
                    nameDiv.setAttribute('class','mwoNameDiv')
                    cncDiv = document.createElement('div')
                    cncDiv.appendChild(document.createTextNode(init_data[i][h][0]))
                    cncDiv.appendChild(document.createElement('br'))
                    cncDiv.appendChild(document.createTextNode(init_data[i][h][1]))
                    cncDiv.setAttribute('class','mwoCNC')
                    opSeqMachineGrid.appendChild(newOpDiv)
                    newOpDiv.appendChild(nameDiv)
                    newOpDiv.appendChild(cncDiv)
            }
            if(typeof init_data[i][h] == "object") { //mwo
                for(j = 3; j < init_data[i][h].length; j++){
                    newDiv = document.createElement('div')
                    newDiv.appendChild(document.createTextNode(init_data[i][h][j]))
                    newDiv.appendChild(document.createElement('br'))
                    opPart = init_data[i][h][j].split('_',1)
                    for (f=0;f<pwo_lakepart.length;f++){
                        if(pwo_lakepart[f][0] == opPart[0]){
                            neededLakePart = pwo_lakepart[f][1]
                        }
                    }
                    newDiv.appendChild(document.createTextNode(neededLakePart))
                    newOpDiv.appendChild(newDiv)
                }

            }
        }
    }
    function closeAllLayer(i){ //closes all the machines operations
        opSeqMachineGrid = document.getElementById('opSeqMachineGrid'+i)
        opSeqMachineGrid.innerHTML = ""
        opSeqName = document.createElement("div")
        opSeqNameLink = document.createElement("a")
        opSeqNameLink.setAttribute('href','google.com')
        opSeqName.setAttribute('class','opSeqNameClass')
        opSeqNameLink.appendChild(document.createTextNode(init_data[i][0]))
        opSeqName.appendChild(opSeqNameLink)
        opSeqNo = document.createElement("div")
        downArrow = document.createElement('i')
        downArrow.setAttribute('class','fa fa-angle-down')
        downArrow.setAttribute('id','downArrow'+i)
        opSeqNo.appendChild(downArrow)
        opSeqButton2 = document.createElement("button")
        opSeqButton2.setAttribute('class','opSeqButton')
        opSeqButton2.setAttribute('id','opSeqButtonOther'+i)
        opSeqButton2.setAttribute('onclick','openFirstLayer('+i+')')
        opSeqButton2.appendChild(opSeqNo)
        opSeqButton = document.createElement("button")
        opSeqButton.setAttribute('class','opSeqButton')
        opSeqButton.setAttribute('id','opSeqButton'+i)
        opSeqButton.setAttribute('onclick','openFirstLayer('+i+')')
        opSeqButton.appendChild(opSeqName)
        opSeqNo.setAttribute('class','opSeqNameClass')
        opSeqMachineGrid.appendChild(opSeqButton2)
        opSeqMachineGrid.appendChild(opSeqButton)
        opSeqButton.name = "openThree"
        opSeqButton2.name = "openThree"
    }
    function topFunction(){
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
</script>
</html>