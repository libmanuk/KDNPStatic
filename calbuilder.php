<?php

// Report all PHP errors
error_reporting(-1);

//check for number of commandline arguments.  if there are 6, attempt to process the input, otherwise return error.
//abbreviation (3), ark(12), year(4), month(2), day(2), control (13)
//php calbuilder.php you xt71vh5ccj3c 1859 03 12 you1859031201
if (count($argv) == 8 && strlen($argv[1]) == 3 && strlen($argv[2]) == 12 && strlen($argv[3]) == 4 && strlen($argv[4]) == 2 && strlen($argv[5]) == 2 && strlen($argv[6]) == 13) {

//set 5 variables for input arguments; tla is the 3 letter title code; ark is the identifier for the newspaper issue; yr is the 4 number year; mon is the 2 number month; day is the 2 number day; cont is the 13 character local control number for the newspaper issue
$tla = "$argv[1]";
$ark = "$argv[2]";
$yr = "$argv[3]";
$mon = "$argv[4]";
$day = "$argv[5]";
$cont = "$argv[6]";
$coll = "$argv[7]";

//populate calendar for issue
$path_to_file = "/home/libmanuk/public_html/papervault/calendar/$tla/years/$yr.html";
$file_contents = file_get_contents($path_to_file);
$file_contents = str_replace("<td id=\"aaa$yr$mon$day\"><a href=\"catalog/aaa$yr$mon$day?\" class=\"noissue\">","<td id=\"$cont\"><a href=\"https://libmanuk.net/catalog/$ark?\" class=\"issue\" target=\"_parent\">",$file_contents);
file_put_contents($path_to_file,$file_contents);

//populate calendar title
$path_to_file_coll = "/home/libmanuk/public_html/papervault/calendar/$tla/years/$yr.html";
$file_contents_coll = file_get_contents($path_to_file_coll);
$file_contents_coll = str_replace("<h1>aaa ","<h1>$coll, ",$file_contents_coll);
file_put_contents($path_to_file_coll,$file_contents_coll);

$path_to_file_css = "/home/libmanuk/public_html/papervault/calendar/$tla/years/$yr.html";
$file_contents_css = file_get_contents($path_to_file_css);
$file_contents_css = str_replace("<link href='base_cal.css","<link href='https://libmanuk.net/papervault/calendar/base_cal.css",$file_contents_css);
file_put_contents($path_to_file_css,$file_contents_css);

//populate pull down menus for all calendars for the title
$path_to_file1700 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1700.html";
$file_contents1700 = file_get_contents($path_to_file1700);
$file_contents1700 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1700);
file_put_contents($path_to_file1700,$file_contents1700);

$path_to_file1701 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1701.html";
$file_contents1701 = file_get_contents($path_to_file1701);
$file_contents1701 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1701);
file_put_contents($path_to_file1701,$file_contents1701);

$path_to_file1702 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1702.html";
$file_contents1702 = file_get_contents($path_to_file1702);
$file_contents1702 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1702);
file_put_contents($path_to_file1702,$file_contents1702);

$path_to_file1703 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1703.html";
$file_contents1703 = file_get_contents($path_to_file1703);
$file_contents1703 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1703);
file_put_contents($path_to_file1703,$file_contents1703);

$path_to_file1704 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1704.html";
$file_contents1704 = file_get_contents($path_to_file1704);
$file_contents1704 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1704);
file_put_contents($path_to_file1704,$file_contents1704);

$path_to_file1705 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1705.html";
$file_contents1705 = file_get_contents($path_to_file1705);
$file_contents1705 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1705);
file_put_contents($path_to_file1705,$file_contents1705);

$path_to_file1706 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1706.html";
$file_contents1706 = file_get_contents($path_to_file1706);
$file_contents1706 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1706);
file_put_contents($path_to_file1706,$file_contents1706);

$path_to_file1707 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1707.html";
$file_contents1707 = file_get_contents($path_to_file1707);
$file_contents1707 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1707);
file_put_contents($path_to_file1707,$file_contents1707);

$path_to_file1708 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1708.html";
$file_contents1708 = file_get_contents($path_to_file1708);
$file_contents1708 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1708);
file_put_contents($path_to_file1708,$file_contents1708);

$path_to_file1709 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1709.html";
$file_contents1709 = file_get_contents($path_to_file1709);
$file_contents1709 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1709);
file_put_contents($path_to_file1709,$file_contents1709);

$path_to_file1710 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1710.html";
$file_contents1710 = file_get_contents($path_to_file1710);
$file_contents1710 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1710);
file_put_contents($path_to_file1710,$file_contents1710);

$path_to_file1711 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1711.html";
$file_contents1711 = file_get_contents($path_to_file1711);
$file_contents1711 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1711);
file_put_contents($path_to_file1711,$file_contents1711);

$path_to_file1712 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1712.html";
$file_contents1712 = file_get_contents($path_to_file1712);
$file_contents1712 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1712);
file_put_contents($path_to_file1712,$file_contents1712);

$path_to_file1713 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1713.html";
$file_contents1713 = file_get_contents($path_to_file1713);
$file_contents1713 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1713);
file_put_contents($path_to_file1713,$file_contents1713);

$path_to_file1714 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1714.html";
$file_contents1714 = file_get_contents($path_to_file1714);
$file_contents1714 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1714);
file_put_contents($path_to_file1714,$file_contents1714);

$path_to_file1715 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1715.html";
$file_contents1715 = file_get_contents($path_to_file1715);
$file_contents1715 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1715);
file_put_contents($path_to_file1715,$file_contents1715);

$path_to_file1716 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1716.html";
$file_contents1716 = file_get_contents($path_to_file1716);
$file_contents1716 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1716);
file_put_contents($path_to_file1716,$file_contents1716);

$path_to_file1717 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1717.html";
$file_contents1717 = file_get_contents($path_to_file1717);
$file_contents1717 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1717);
file_put_contents($path_to_file1717,$file_contents1717);

$path_to_file1718 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1718.html";
$file_contents1718 = file_get_contents($path_to_file1718);
$file_contents1718 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1718);
file_put_contents($path_to_file1718,$file_contents1718);

$path_to_file1719 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1719.html";
$file_contents1719 = file_get_contents($path_to_file1719);
$file_contents1719 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1719);
file_put_contents($path_to_file1719,$file_contents1719);

$path_to_file1720 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1720.html";
$file_contents1720 = file_get_contents($path_to_file1720);
$file_contents1720 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1720);
file_put_contents($path_to_file1720,$file_contents1720);

$path_to_file1721 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1721.html";
$file_contents1721 = file_get_contents($path_to_file1721);
$file_contents1721 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1721);
file_put_contents($path_to_file1721,$file_contents1721);

$path_to_file1722 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1722.html";
$file_contents1722 = file_get_contents($path_to_file1722);
$file_contents1722 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1722);
file_put_contents($path_to_file1722,$file_contents1722);

$path_to_file1723 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1723.html";
$file_contents1723 = file_get_contents($path_to_file1723);
$file_contents1723 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1723);
file_put_contents($path_to_file1723,$file_contents1723);

$path_to_file1724 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1724.html";
$file_contents1724 = file_get_contents($path_to_file1724);
$file_contents1724 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1724);
file_put_contents($path_to_file1724,$file_contents1724);

$path_to_file1725 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1725.html";
$file_contents1725 = file_get_contents($path_to_file1725);
$file_contents1725 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1725);
file_put_contents($path_to_file1725,$file_contents1725);

$path_to_file1726 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1726.html";
$file_contents1726 = file_get_contents($path_to_file1726);
$file_contents1726 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1726);
file_put_contents($path_to_file1726,$file_contents1726);

$path_to_file1727 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1727.html";
$file_contents1727 = file_get_contents($path_to_file1727);
$file_contents1727 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1727);
file_put_contents($path_to_file1727,$file_contents1727);

$path_to_file1728 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1728.html";
$file_contents1728 = file_get_contents($path_to_file1728);
$file_contents1728 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1728);
file_put_contents($path_to_file1728,$file_contents1728);

$path_to_file1729 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1729.html";
$file_contents1729 = file_get_contents($path_to_file1729);
$file_contents1729 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1729);
file_put_contents($path_to_file1729,$file_contents1729);

$path_to_file1730 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1730.html";
$file_contents1730 = file_get_contents($path_to_file1730);
$file_contents1730 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1730);
file_put_contents($path_to_file1730,$file_contents1730);

$path_to_file1731 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1731.html";
$file_contents1731 = file_get_contents($path_to_file1731);
$file_contents1731 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1731);
file_put_contents($path_to_file1731,$file_contents1731);

$path_to_file1732 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1732.html";
$file_contents1732 = file_get_contents($path_to_file1732);
$file_contents1732 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1732);
file_put_contents($path_to_file1732,$file_contents1732);

$path_to_file1733 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1733.html";
$file_contents1733 = file_get_contents($path_to_file1733);
$file_contents1733 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1733);
file_put_contents($path_to_file1733,$file_contents1733);

$path_to_file1734 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1734.html";
$file_contents1734 = file_get_contents($path_to_file1734);
$file_contents1734 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1734);
file_put_contents($path_to_file1734,$file_contents1734);

$path_to_file1735 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1735.html";
$file_contents1735 = file_get_contents($path_to_file1735);
$file_contents1735 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1735);
file_put_contents($path_to_file1735,$file_contents1735);

$path_to_file1736 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1736.html";
$file_contents1736 = file_get_contents($path_to_file1736);
$file_contents1736 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1736);
file_put_contents($path_to_file1736,$file_contents1736);

$path_to_file1737 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1737.html";
$file_contents1737 = file_get_contents($path_to_file1737);
$file_contents1737 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1737);
file_put_contents($path_to_file1737,$file_contents1737);

$path_to_file1738 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1738.html";
$file_contents1738 = file_get_contents($path_to_file1738);
$file_contents1738 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1738);
file_put_contents($path_to_file1738,$file_contents1738);

$path_to_file1739 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1739.html";
$file_contents1739 = file_get_contents($path_to_file1739);
$file_contents1739 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1739);
file_put_contents($path_to_file1739,$file_contents1739);

$path_to_file1740 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1740.html";
$file_contents1740 = file_get_contents($path_to_file1740);
$file_contents1740 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1740);
file_put_contents($path_to_file1740,$file_contents1740);

$path_to_file1741 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1741.html";
$file_contents1741 = file_get_contents($path_to_file1741);
$file_contents1741 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1741);
file_put_contents($path_to_file1741,$file_contents1741);

$path_to_file1742 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1742.html";
$file_contents1742 = file_get_contents($path_to_file1742);
$file_contents1742 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1742);
file_put_contents($path_to_file1742,$file_contents1742);

$path_to_file1743 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1743.html";
$file_contents1743 = file_get_contents($path_to_file1743);
$file_contents1743 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1743);
file_put_contents($path_to_file1743,$file_contents1743);

$path_to_file1744 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1744.html";
$file_contents1744 = file_get_contents($path_to_file1744);
$file_contents1744 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1744);
file_put_contents($path_to_file1744,$file_contents1744);

$path_to_file1745 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1745.html";
$file_contents1745 = file_get_contents($path_to_file1745);
$file_contents1745 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1745);
file_put_contents($path_to_file1745,$file_contents1745);

$path_to_file1746 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1746.html";
$file_contents1746 = file_get_contents($path_to_file1746);
$file_contents1746 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1746);
file_put_contents($path_to_file1746,$file_contents1746);

$path_to_file1747 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1747.html";
$file_contents1747 = file_get_contents($path_to_file1747);
$file_contents1747 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1747);
file_put_contents($path_to_file1747,$file_contents1747);

$path_to_file1748 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1748.html";
$file_contents1748 = file_get_contents($path_to_file1748);
$file_contents1748 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1748);
file_put_contents($path_to_file1748,$file_contents1748);

$path_to_file1749 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1749.html";
$file_contents1749 = file_get_contents($path_to_file1749);
$file_contents1749 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1749);
file_put_contents($path_to_file1749,$file_contents1749);

$path_to_file1750 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1750.html";
$file_contents1750 = file_get_contents($path_to_file1750);
$file_contents1750 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1750);
file_put_contents($path_to_file1750,$file_contents1750);

$path_to_file1751 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1751.html";
$file_contents1751 = file_get_contents($path_to_file1751);
$file_contents1751 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1751);
file_put_contents($path_to_file1751,$file_contents1751);

$path_to_file1752 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1752.html";
$file_contents1752 = file_get_contents($path_to_file1752);
$file_contents1752 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1752);
file_put_contents($path_to_file1752,$file_contents1752);

$path_to_file1753 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1753.html";
$file_contents1753 = file_get_contents($path_to_file1753);
$file_contents1753 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1753);
file_put_contents($path_to_file1753,$file_contents1753);

$path_to_file1754 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1754.html";
$file_contents1754 = file_get_contents($path_to_file1754);
$file_contents1754 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1754);
file_put_contents($path_to_file1754,$file_contents1754);

$path_to_file1755 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1755.html";
$file_contents1755 = file_get_contents($path_to_file1755);
$file_contents1755 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1755);
file_put_contents($path_to_file1755,$file_contents1755);

$path_to_file1756 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1756.html";
$file_contents1756 = file_get_contents($path_to_file1756);
$file_contents1756 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1756);
file_put_contents($path_to_file1756,$file_contents1756);

$path_to_file1757 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1757.html";
$file_contents1757 = file_get_contents($path_to_file1757);
$file_contents1757 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1757);
file_put_contents($path_to_file1757,$file_contents1757);

$path_to_file1758 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1758.html";
$file_contents1758 = file_get_contents($path_to_file1758);
$file_contents1758 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1758);
file_put_contents($path_to_file1758,$file_contents1758);

$path_to_file1759 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1759.html";
$file_contents1759 = file_get_contents($path_to_file1759);
$file_contents1759 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1759);
file_put_contents($path_to_file1759,$file_contents1759);

$path_to_file1760 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1760.html";
$file_contents1760 = file_get_contents($path_to_file1760);
$file_contents1760 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1760);
file_put_contents($path_to_file1760,$file_contents1760);

$path_to_file1761 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1761.html";
$file_contents1761 = file_get_contents($path_to_file1761);
$file_contents1761 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1761);
file_put_contents($path_to_file1761,$file_contents1761);

$path_to_file1762 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1762.html";
$file_contents1762 = file_get_contents($path_to_file1762);
$file_contents1762 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1762);
file_put_contents($path_to_file1762,$file_contents1762);

$path_to_file1763 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1763.html";
$file_contents1763 = file_get_contents($path_to_file1763);
$file_contents1763 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1763);
file_put_contents($path_to_file1763,$file_contents1763);

$path_to_file1764 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1764.html";
$file_contents1764 = file_get_contents($path_to_file1764);
$file_contents1764 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1764);
file_put_contents($path_to_file1764,$file_contents1764);

$path_to_file1765 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1765.html";
$file_contents1765 = file_get_contents($path_to_file1765);
$file_contents1765 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1765);
file_put_contents($path_to_file1765,$file_contents1765);

$path_to_file1766 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1766.html";
$file_contents1766 = file_get_contents($path_to_file1766);
$file_contents1766 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1766);
file_put_contents($path_to_file1766,$file_contents1766);

$path_to_file1767 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1767.html";
$file_contents1767 = file_get_contents($path_to_file1767);
$file_contents1767 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1767);
file_put_contents($path_to_file1767,$file_contents1767);

$path_to_file1768 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1768.html";
$file_contents1768 = file_get_contents($path_to_file1768);
$file_contents1768 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1768);
file_put_contents($path_to_file1768,$file_contents1768);

$path_to_file1769 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1769.html";
$file_contents1769 = file_get_contents($path_to_file1769);
$file_contents1769 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1769);
file_put_contents($path_to_file1769,$file_contents1769);

$path_to_file1770 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1770.html";
$file_contents1770 = file_get_contents($path_to_file1770);
$file_contents1770 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1770);
file_put_contents($path_to_file1770,$file_contents1770);

$path_to_file1771 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1771.html";
$file_contents1771 = file_get_contents($path_to_file1771);
$file_contents1771 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1771);
file_put_contents($path_to_file1771,$file_contents1771);

$path_to_file1772 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1772.html";
$file_contents1772 = file_get_contents($path_to_file1772);
$file_contents1772 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1772);
file_put_contents($path_to_file1772,$file_contents1772);

$path_to_file1773 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1773.html";
$file_contents1773 = file_get_contents($path_to_file1773);
$file_contents1773 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1773);
file_put_contents($path_to_file1773,$file_contents1773);

$path_to_file1774 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1774.html";
$file_contents1774 = file_get_contents($path_to_file1774);
$file_contents1774 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1774);
file_put_contents($path_to_file1774,$file_contents1774);

$path_to_file1775 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1775.html";
$file_contents1775 = file_get_contents($path_to_file1775);
$file_contents1775 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1775);
file_put_contents($path_to_file1775,$file_contents1775);

$path_to_file1776 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1776.html";
$file_contents1776 = file_get_contents($path_to_file1776);
$file_contents1776 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1776);
file_put_contents($path_to_file1776,$file_contents1776);

$path_to_file1777 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1777.html";
$file_contents1777 = file_get_contents($path_to_file1777);
$file_contents1777 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1777);
file_put_contents($path_to_file1777,$file_contents1777);

$path_to_file1778 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1778.html";
$file_contents1778 = file_get_contents($path_to_file1778);
$file_contents1778 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1778);
file_put_contents($path_to_file1778,$file_contents1778);

$path_to_file1779 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1779.html";
$file_contents1779 = file_get_contents($path_to_file1779);
$file_contents1779 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1779);
file_put_contents($path_to_file1779,$file_contents1779);

$path_to_file1780 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1780.html";
$file_contents1780 = file_get_contents($path_to_file1780);
$file_contents1780 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1780);
file_put_contents($path_to_file1780,$file_contents1780);

$path_to_file1781 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1781.html";
$file_contents1781 = file_get_contents($path_to_file1781);
$file_contents1781 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1781);
file_put_contents($path_to_file1781,$file_contents1781);

$path_to_file1782 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1782.html";
$file_contents1782 = file_get_contents($path_to_file1782);
$file_contents1782 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1782);
file_put_contents($path_to_file1782,$file_contents1782);

$path_to_file1783 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1783.html";
$file_contents1783 = file_get_contents($path_to_file1783);
$file_contents1783 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1783);
file_put_contents($path_to_file1783,$file_contents1783);

$path_to_file1784 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1784.html";
$file_contents1784 = file_get_contents($path_to_file1784);
$file_contents1784 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1784);
file_put_contents($path_to_file1784,$file_contents1784);

$path_to_file1785 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1785.html";
$file_contents1785 = file_get_contents($path_to_file1785);
$file_contents1785 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1785);
file_put_contents($path_to_file1785,$file_contents1785);

$path_to_file1786 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1786.html";
$file_contents1786 = file_get_contents($path_to_file1786);
$file_contents1786 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1786);
file_put_contents($path_to_file1786,$file_contents1786);

$path_to_file1787 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1787.html";
$file_contents1787 = file_get_contents($path_to_file1787);
$file_contents1787 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1787);
file_put_contents($path_to_file1787,$file_contents1787);

$path_to_file1788 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1788.html";
$file_contents1788 = file_get_contents($path_to_file1788);
$file_contents1788 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1788);
file_put_contents($path_to_file1788,$file_contents1788);

$path_to_file1789 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1789.html";
$file_contents1789 = file_get_contents($path_to_file1789);
$file_contents1789 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1789);
file_put_contents($path_to_file1789,$file_contents1789);

$path_to_file1790 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1790.html";
$file_contents1790 = file_get_contents($path_to_file1790);
$file_contents1790 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1790);
file_put_contents($path_to_file1790,$file_contents1790);

$path_to_file1791 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1791.html";
$file_contents1791 = file_get_contents($path_to_file1791);
$file_contents1791 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1791);
file_put_contents($path_to_file1791,$file_contents1791);

$path_to_file1792 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1792.html";
$file_contents1792 = file_get_contents($path_to_file1792);
$file_contents1792 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1792);
file_put_contents($path_to_file1792,$file_contents1792);

$path_to_file1793 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1793.html";
$file_contents1793 = file_get_contents($path_to_file1793);
$file_contents1793 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1793);
file_put_contents($path_to_file1793,$file_contents1793);

$path_to_file1794 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1794.html";
$file_contents1794 = file_get_contents($path_to_file1794);
$file_contents1794 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1794);
file_put_contents($path_to_file1794,$file_contents1794);

$path_to_file1795 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1795.html";
$file_contents1795 = file_get_contents($path_to_file1795);
$file_contents1795 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1795);
file_put_contents($path_to_file1795,$file_contents1795);

$path_to_file1796 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1796.html";
$file_contents1796 = file_get_contents($path_to_file1796);
$file_contents1796 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1796);
file_put_contents($path_to_file1796,$file_contents1796);

$path_to_file1797 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1797.html";
$file_contents1797 = file_get_contents($path_to_file1797);
$file_contents1797 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1797);
file_put_contents($path_to_file1797,$file_contents1797);

$path_to_file1798 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1798.html";
$file_contents1798 = file_get_contents($path_to_file1798);
$file_contents1798 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1798);
file_put_contents($path_to_file1798,$file_contents1798);

$path_to_file1799 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1799.html";
$file_contents1799 = file_get_contents($path_to_file1799);
$file_contents1799 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1799);
file_put_contents($path_to_file1799,$file_contents1799);

$path_to_file1800 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1800.html";
$file_contents1800 = file_get_contents($path_to_file1800);
$file_contents1800 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1800);
file_put_contents($path_to_file1800,$file_contents1800);

$path_to_file1801 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1801.html";
$file_contents1801 = file_get_contents($path_to_file1801);
$file_contents1801 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1801);
file_put_contents($path_to_file1801,$file_contents1801);

$path_to_file1802 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1802.html";
$file_contents1802 = file_get_contents($path_to_file1802);
$file_contents1802 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1802);
file_put_contents($path_to_file1802,$file_contents1802);

$path_to_file1803 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1803.html";
$file_contents1803 = file_get_contents($path_to_file1803);
$file_contents1803 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1803);
file_put_contents($path_to_file1803,$file_contents1803);

$path_to_file1804 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1804.html";
$file_contents1804 = file_get_contents($path_to_file1804);
$file_contents1804 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1804);
file_put_contents($path_to_file1804,$file_contents1804);

$path_to_file1805 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1805.html";
$file_contents1805 = file_get_contents($path_to_file1805);
$file_contents1805 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1805);
file_put_contents($path_to_file1805,$file_contents1805);

$path_to_file1806 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1806.html";
$file_contents1806 = file_get_contents($path_to_file1806);
$file_contents1806 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1806);
file_put_contents($path_to_file1806,$file_contents1806);

$path_to_file1807 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1807.html";
$file_contents1807 = file_get_contents($path_to_file1807);
$file_contents1807 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1807);
file_put_contents($path_to_file1807,$file_contents1807);

$path_to_file1808 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1808.html";
$file_contents1808 = file_get_contents($path_to_file1808);
$file_contents1808 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1808);
file_put_contents($path_to_file1808,$file_contents1808);

$path_to_file1809 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1809.html";
$file_contents1809 = file_get_contents($path_to_file1809);
$file_contents1809 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1809);
file_put_contents($path_to_file1809,$file_contents1809);

$path_to_file1810 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1810.html";
$file_contents1810 = file_get_contents($path_to_file1810);
$file_contents1810 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1810);
file_put_contents($path_to_file1810,$file_contents1810);

$path_to_file1811 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1811.html";
$file_contents1811 = file_get_contents($path_to_file1811);
$file_contents1811 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1811);
file_put_contents($path_to_file1811,$file_contents1811);

$path_to_file1812 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1812.html";
$file_contents1812 = file_get_contents($path_to_file1812);
$file_contents1812 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1812);
file_put_contents($path_to_file1812,$file_contents1812);

$path_to_file1813 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1813.html";
$file_contents1813 = file_get_contents($path_to_file1813);
$file_contents1813 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1813);
file_put_contents($path_to_file1813,$file_contents1813);

$path_to_file1814 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1814.html";
$file_contents1814 = file_get_contents($path_to_file1814);
$file_contents1814 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1814);
file_put_contents($path_to_file1814,$file_contents1814);

$path_to_file1815 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1815.html";
$file_contents1815 = file_get_contents($path_to_file1815);
$file_contents1815 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1815);
file_put_contents($path_to_file1815,$file_contents1815);

$path_to_file1816 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1816.html";
$file_contents1816 = file_get_contents($path_to_file1816);
$file_contents1816 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1816);
file_put_contents($path_to_file1816,$file_contents1816);

$path_to_file1817 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1817.html";
$file_contents1817 = file_get_contents($path_to_file1817);
$file_contents1817 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1817);
file_put_contents($path_to_file1817,$file_contents1817);

$path_to_file1818 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1818.html";
$file_contents1818 = file_get_contents($path_to_file1818);
$file_contents1818 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1818);
file_put_contents($path_to_file1818,$file_contents1818);

$path_to_file1819 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1819.html";
$file_contents1819 = file_get_contents($path_to_file1819);
$file_contents1819 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1819);
file_put_contents($path_to_file1819,$file_contents1819);

$path_to_file1820 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1820.html";
$file_contents1820 = file_get_contents($path_to_file1820);
$file_contents1820 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1820);
file_put_contents($path_to_file1820,$file_contents1820);

$path_to_file1821 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1821.html";
$file_contents1821 = file_get_contents($path_to_file1821);
$file_contents1821 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1821);
file_put_contents($path_to_file1821,$file_contents1821);

$path_to_file1822 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1822.html";
$file_contents1822 = file_get_contents($path_to_file1822);
$file_contents1822 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1822);
file_put_contents($path_to_file1822,$file_contents1822);

$path_to_file1823 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1823.html";
$file_contents1823 = file_get_contents($path_to_file1823);
$file_contents1823 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1823);
file_put_contents($path_to_file1823,$file_contents1823);

$path_to_file1824 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1824.html";
$file_contents1824 = file_get_contents($path_to_file1824);
$file_contents1824 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1824);
file_put_contents($path_to_file1824,$file_contents1824);

$path_to_file1825 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1825.html";
$file_contents1825 = file_get_contents($path_to_file1825);
$file_contents1825 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1825);
file_put_contents($path_to_file1825,$file_contents1825);

$path_to_file1826 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1826.html";
$file_contents1826 = file_get_contents($path_to_file1826);
$file_contents1826 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1826);
file_put_contents($path_to_file1826,$file_contents1826);

$path_to_file1827 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1827.html";
$file_contents1827 = file_get_contents($path_to_file1827);
$file_contents1827 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1827);
file_put_contents($path_to_file1827,$file_contents1827);

$path_to_file1828 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1828.html";
$file_contents1828 = file_get_contents($path_to_file1828);
$file_contents1828 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1828);
file_put_contents($path_to_file1828,$file_contents1828);

$path_to_file1829 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1829.html";
$file_contents1829 = file_get_contents($path_to_file1829);
$file_contents1829 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1829);
file_put_contents($path_to_file1829,$file_contents1829);

$path_to_file1830 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1830.html";
$file_contents1830 = file_get_contents($path_to_file1830);
$file_contents1830 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1830);
file_put_contents($path_to_file1830,$file_contents1830);

$path_to_file1831 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1831.html";
$file_contents1831 = file_get_contents($path_to_file1831);
$file_contents1831 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1831);
file_put_contents($path_to_file1831,$file_contents1831);

$path_to_file1832 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1832.html";
$file_contents1832 = file_get_contents($path_to_file1832);
$file_contents1832 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1832);
file_put_contents($path_to_file1832,$file_contents1832);

$path_to_file1833 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1833.html";
$file_contents1833 = file_get_contents($path_to_file1833);
$file_contents1833 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1833);
file_put_contents($path_to_file1833,$file_contents1833);

$path_to_file1834 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1834.html";
$file_contents1834 = file_get_contents($path_to_file1834);
$file_contents1834 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1834);
file_put_contents($path_to_file1834,$file_contents1834);

$path_to_file1835 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1835.html";
$file_contents1835 = file_get_contents($path_to_file1835);
$file_contents1835 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1835);
file_put_contents($path_to_file1835,$file_contents1835);

$path_to_file1836 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1836.html";
$file_contents1836 = file_get_contents($path_to_file1836);
$file_contents1836 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1836);
file_put_contents($path_to_file1836,$file_contents1836);

$path_to_file1837 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1837.html";
$file_contents1837 = file_get_contents($path_to_file1837);
$file_contents1837 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1837);
file_put_contents($path_to_file1837,$file_contents1837);

$path_to_file1838 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1838.html";
$file_contents1838 = file_get_contents($path_to_file1838);
$file_contents1838 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1838);
file_put_contents($path_to_file1838,$file_contents1838);

$path_to_file1839 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1839.html";
$file_contents1839 = file_get_contents($path_to_file1839);
$file_contents1839 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1839);
file_put_contents($path_to_file1839,$file_contents1839);

$path_to_file1840 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1840.html";
$file_contents1840 = file_get_contents($path_to_file1840);
$file_contents1840 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1840);
file_put_contents($path_to_file1840,$file_contents1840);

$path_to_file1841 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1841.html";
$file_contents1841 = file_get_contents($path_to_file1841);
$file_contents1841 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1841);
file_put_contents($path_to_file1841,$file_contents1841);

$path_to_file1842 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1842.html";
$file_contents1842 = file_get_contents($path_to_file1842);
$file_contents1842 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1842);
file_put_contents($path_to_file1842,$file_contents1842);

$path_to_file1843 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1843.html";
$file_contents1843 = file_get_contents($path_to_file1843);
$file_contents1843 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1843);
file_put_contents($path_to_file1843,$file_contents1843);

$path_to_file1844 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1844.html";
$file_contents1844 = file_get_contents($path_to_file1844);
$file_contents1844 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1844);
file_put_contents($path_to_file1844,$file_contents1844);

$path_to_file1845 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1845.html";
$file_contents1845 = file_get_contents($path_to_file1845);
$file_contents1845 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1845);
file_put_contents($path_to_file1845,$file_contents1845);

$path_to_file1846 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1846.html";
$file_contents1846 = file_get_contents($path_to_file1846);
$file_contents1846 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1846);
file_put_contents($path_to_file1846,$file_contents1846);

$path_to_file1847 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1847.html";
$file_contents1847 = file_get_contents($path_to_file1847);
$file_contents1847 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1847);
file_put_contents($path_to_file1847,$file_contents1847);

$path_to_file1848 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1848.html";
$file_contents1848 = file_get_contents($path_to_file1848);
$file_contents1848 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1848);
file_put_contents($path_to_file1848,$file_contents1848);

$path_to_file1849 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1849.html";
$file_contents1849 = file_get_contents($path_to_file1849);
$file_contents1849 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1849);
file_put_contents($path_to_file1849,$file_contents1849);

$path_to_file1850 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1850.html";
$file_contents1850 = file_get_contents($path_to_file1850);
$file_contents1850 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1850);
file_put_contents($path_to_file1850,$file_contents1850);

$path_to_file1851 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1851.html";
$file_contents1851 = file_get_contents($path_to_file1851);
$file_contents1851 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1851);
file_put_contents($path_to_file1851,$file_contents1851);

$path_to_file1852 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1852.html";
$file_contents1852 = file_get_contents($path_to_file1852);
$file_contents1852 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1852);
file_put_contents($path_to_file1852,$file_contents1852);

$path_to_file1853 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1853.html";
$file_contents1853 = file_get_contents($path_to_file1853);
$file_contents1853 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1853);
file_put_contents($path_to_file1853,$file_contents1853);

$path_to_file1854 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1854.html";
$file_contents1854 = file_get_contents($path_to_file1854);
$file_contents1854 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1854);
file_put_contents($path_to_file1854,$file_contents1854);

$path_to_file1855 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1855.html";
$file_contents1855 = file_get_contents($path_to_file1855);
$file_contents1855 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1855);
file_put_contents($path_to_file1855,$file_contents1855);

$path_to_file1856 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1856.html";
$file_contents1856 = file_get_contents($path_to_file1856);
$file_contents1856 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1856);
file_put_contents($path_to_file1856,$file_contents1856);

$path_to_file1857 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1857.html";
$file_contents1857 = file_get_contents($path_to_file1857);
$file_contents1857 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1857);
file_put_contents($path_to_file1857,$file_contents1857);

$path_to_file1858 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1858.html";
$file_contents1858 = file_get_contents($path_to_file1858);
$file_contents1858 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1858);
file_put_contents($path_to_file1858,$file_contents1858);

$path_to_file1859 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1859.html";
$file_contents1859 = file_get_contents($path_to_file1859);
$file_contents1859 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1859);
file_put_contents($path_to_file1859,$file_contents1859);

$path_to_file1860 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1860.html";
$file_contents1860 = file_get_contents($path_to_file1860);
$file_contents1860 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1860);
file_put_contents($path_to_file1860,$file_contents1860);

$path_to_file1861 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1861.html";
$file_contents1861 = file_get_contents($path_to_file1861);
$file_contents1861 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1861);
file_put_contents($path_to_file1861,$file_contents1861);

$path_to_file1862 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1862.html";
$file_contents1862 = file_get_contents($path_to_file1862);
$file_contents1862 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1862);
file_put_contents($path_to_file1862,$file_contents1862);

$path_to_file1863 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1863.html";
$file_contents1863 = file_get_contents($path_to_file1863);
$file_contents1863 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1863);
file_put_contents($path_to_file1863,$file_contents1863);

$path_to_file1864 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1864.html";
$file_contents1864 = file_get_contents($path_to_file1864);
$file_contents1864 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1864);
file_put_contents($path_to_file1864,$file_contents1864);

$path_to_file1865 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1865.html";
$file_contents1865 = file_get_contents($path_to_file1865);
$file_contents1865 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1865);
file_put_contents($path_to_file1865,$file_contents1865);

$path_to_file1866 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1866.html";
$file_contents1866 = file_get_contents($path_to_file1866);
$file_contents1866 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1866);
file_put_contents($path_to_file1866,$file_contents1866);

$path_to_file1867 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1867.html";
$file_contents1867 = file_get_contents($path_to_file1867);
$file_contents1867 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1867);
file_put_contents($path_to_file1867,$file_contents1867);

$path_to_file1868 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1868.html";
$file_contents1868 = file_get_contents($path_to_file1868);
$file_contents1868 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1868);
file_put_contents($path_to_file1868,$file_contents1868);

$path_to_file1869 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1869.html";
$file_contents1869 = file_get_contents($path_to_file1869);
$file_contents1869 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1869);
file_put_contents($path_to_file1869,$file_contents1869);

$path_to_file1870 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1870.html";
$file_contents1870 = file_get_contents($path_to_file1870);
$file_contents1870 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1870);
file_put_contents($path_to_file1870,$file_contents1870);

$path_to_file1871 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1871.html";
$file_contents1871 = file_get_contents($path_to_file1871);
$file_contents1871 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1871);
file_put_contents($path_to_file1871,$file_contents1871);

$path_to_file1872 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1872.html";
$file_contents1872 = file_get_contents($path_to_file1872);
$file_contents1872 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1872);
file_put_contents($path_to_file1872,$file_contents1872);

$path_to_file1873 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1873.html";
$file_contents1873 = file_get_contents($path_to_file1873);
$file_contents1873 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1873);
file_put_contents($path_to_file1873,$file_contents1873);

$path_to_file1874 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1874.html";
$file_contents1874 = file_get_contents($path_to_file1874);
$file_contents1874 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1874);
file_put_contents($path_to_file1874,$file_contents1874);

$path_to_file1875 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1875.html";
$file_contents1875 = file_get_contents($path_to_file1875);
$file_contents1875 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1875);
file_put_contents($path_to_file1875,$file_contents1875);

$path_to_file1876 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1876.html";
$file_contents1876 = file_get_contents($path_to_file1876);
$file_contents1876 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1876);
file_put_contents($path_to_file1876,$file_contents1876);

$path_to_file1877 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1877.html";
$file_contents1877 = file_get_contents($path_to_file1877);
$file_contents1877 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1877);
file_put_contents($path_to_file1877,$file_contents1877);

$path_to_file1878 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1878.html";
$file_contents1878 = file_get_contents($path_to_file1878);
$file_contents1878 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1878);
file_put_contents($path_to_file1878,$file_contents1878);

$path_to_file1879 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1879.html";
$file_contents1879 = file_get_contents($path_to_file1879);
$file_contents1879 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1879);
file_put_contents($path_to_file1879,$file_contents1879);

$path_to_file1880 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1880.html";
$file_contents1880 = file_get_contents($path_to_file1880);
$file_contents1880 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1880);
file_put_contents($path_to_file1880,$file_contents1880);

$path_to_file1881 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1881.html";
$file_contents1881 = file_get_contents($path_to_file1881);
$file_contents1881 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1881);
file_put_contents($path_to_file1881,$file_contents1881);

$path_to_file1882 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1882.html";
$file_contents1882 = file_get_contents($path_to_file1882);
$file_contents1882 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1882);
file_put_contents($path_to_file1882,$file_contents1882);

$path_to_file1883 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1883.html";
$file_contents1883 = file_get_contents($path_to_file1883);
$file_contents1883 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1883);
file_put_contents($path_to_file1883,$file_contents1883);

$path_to_file1884 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1884.html";
$file_contents1884 = file_get_contents($path_to_file1884);
$file_contents1884 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1884);
file_put_contents($path_to_file1884,$file_contents1884);

$path_to_file1885 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1885.html";
$file_contents1885 = file_get_contents($path_to_file1885);
$file_contents1885 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1885);
file_put_contents($path_to_file1885,$file_contents1885);

$path_to_file1886 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1886.html";
$file_contents1886 = file_get_contents($path_to_file1886);
$file_contents1886 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1886);
file_put_contents($path_to_file1886,$file_contents1886);

$path_to_file1887 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1887.html";
$file_contents1887 = file_get_contents($path_to_file1887);
$file_contents1887 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1887);
file_put_contents($path_to_file1887,$file_contents1887);

$path_to_file1888 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1888.html";
$file_contents1888 = file_get_contents($path_to_file1888);
$file_contents1888 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1888);
file_put_contents($path_to_file1888,$file_contents1888);

$path_to_file1889 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1889.html";
$file_contents1889 = file_get_contents($path_to_file1889);
$file_contents1889 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1889);
file_put_contents($path_to_file1889,$file_contents1889);

$path_to_file1890 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1890.html";
$file_contents1890 = file_get_contents($path_to_file1890);
$file_contents1890 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1890);
file_put_contents($path_to_file1890,$file_contents1890);

$path_to_file1891 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1891.html";
$file_contents1891 = file_get_contents($path_to_file1891);
$file_contents1891 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1891);
file_put_contents($path_to_file1891,$file_contents1891);

$path_to_file1892 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1892.html";
$file_contents1892 = file_get_contents($path_to_file1892);
$file_contents1892 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1892);
file_put_contents($path_to_file1892,$file_contents1892);

$path_to_file1893 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1893.html";
$file_contents1893 = file_get_contents($path_to_file1893);
$file_contents1893 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1893);
file_put_contents($path_to_file1893,$file_contents1893);

$path_to_file1894 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1894.html";
$file_contents1894 = file_get_contents($path_to_file1894);
$file_contents1894 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1894);
file_put_contents($path_to_file1894,$file_contents1894);

$path_to_file1895 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1895.html";
$file_contents1895 = file_get_contents($path_to_file1895);
$file_contents1895 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1895);
file_put_contents($path_to_file1895,$file_contents1895);

$path_to_file1896 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1896.html";
$file_contents1896 = file_get_contents($path_to_file1896);
$file_contents1896 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1896);
file_put_contents($path_to_file1896,$file_contents1896);

$path_to_file1897 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1897.html";
$file_contents1897 = file_get_contents($path_to_file1897);
$file_contents1897 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1897);
file_put_contents($path_to_file1897,$file_contents1897);

$path_to_file1898 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1898.html";
$file_contents1898 = file_get_contents($path_to_file1898);
$file_contents1898 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1898);
file_put_contents($path_to_file1898,$file_contents1898);

$path_to_file1899 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1899.html";
$file_contents1899 = file_get_contents($path_to_file1899);
$file_contents1899 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1899);
file_put_contents($path_to_file1899,$file_contents1899);

$path_to_file1900 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1900.html";
$file_contents1900 = file_get_contents($path_to_file1900);
$file_contents1900 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1900);
file_put_contents($path_to_file1900,$file_contents1900);

$path_to_file1901 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1901.html";
$file_contents1901 = file_get_contents($path_to_file1901);
$file_contents1901 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1901);
file_put_contents($path_to_file1901,$file_contents1901);

$path_to_file1902 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1902.html";
$file_contents1902 = file_get_contents($path_to_file1902);
$file_contents1902 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1902);
file_put_contents($path_to_file1902,$file_contents1902);

$path_to_file1903 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1903.html";
$file_contents1903 = file_get_contents($path_to_file1903);
$file_contents1903 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1903);
file_put_contents($path_to_file1903,$file_contents1903);

$path_to_file1904 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1904.html";
$file_contents1904 = file_get_contents($path_to_file1904);
$file_contents1904 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1904);
file_put_contents($path_to_file1904,$file_contents1904);

$path_to_file1905 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1905.html";
$file_contents1905 = file_get_contents($path_to_file1905);
$file_contents1905 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1905);
file_put_contents($path_to_file1905,$file_contents1905);

$path_to_file1906 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1906.html";
$file_contents1906 = file_get_contents($path_to_file1906);
$file_contents1906 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1906);
file_put_contents($path_to_file1906,$file_contents1906);

$path_to_file1907 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1907.html";
$file_contents1907 = file_get_contents($path_to_file1907);
$file_contents1907 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1907);
file_put_contents($path_to_file1907,$file_contents1907);

$path_to_file1908 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1908.html";
$file_contents1908 = file_get_contents($path_to_file1908);
$file_contents1908 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1908);
file_put_contents($path_to_file1908,$file_contents1908);

$path_to_file1909 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1909.html";
$file_contents1909 = file_get_contents($path_to_file1909);
$file_contents1909 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1909);
file_put_contents($path_to_file1909,$file_contents1909);

$path_to_file1910 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1910.html";
$file_contents1910 = file_get_contents($path_to_file1910);
$file_contents1910 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1910);
file_put_contents($path_to_file1910,$file_contents1910);

$path_to_file1911 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1911.html";
$file_contents1911 = file_get_contents($path_to_file1911);
$file_contents1911 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1911);
file_put_contents($path_to_file1911,$file_contents1911);

$path_to_file1912 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1912.html";
$file_contents1912 = file_get_contents($path_to_file1912);
$file_contents1912 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1912);
file_put_contents($path_to_file1912,$file_contents1912);

$path_to_file1913 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1913.html";
$file_contents1913 = file_get_contents($path_to_file1913);
$file_contents1913 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1913);
file_put_contents($path_to_file1913,$file_contents1913);

$path_to_file1914 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1914.html";
$file_contents1914 = file_get_contents($path_to_file1914);
$file_contents1914 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1914);
file_put_contents($path_to_file1914,$file_contents1914);

$path_to_file1915 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1915.html";
$file_contents1915 = file_get_contents($path_to_file1915);
$file_contents1915 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1915);
file_put_contents($path_to_file1915,$file_contents1915);

$path_to_file1916 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1916.html";
$file_contents1916 = file_get_contents($path_to_file1916);
$file_contents1916 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1916);
file_put_contents($path_to_file1916,$file_contents1916);

$path_to_file1917 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1917.html";
$file_contents1917 = file_get_contents($path_to_file1917);
$file_contents1917 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1917);
file_put_contents($path_to_file1917,$file_contents1917);

$path_to_file1918 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1918.html";
$file_contents1918 = file_get_contents($path_to_file1918);
$file_contents1918 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1918);
file_put_contents($path_to_file1918,$file_contents1918);

$path_to_file1919 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1919.html";
$file_contents1919 = file_get_contents($path_to_file1919);
$file_contents1919 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1919);
file_put_contents($path_to_file1919,$file_contents1919);

$path_to_file1920 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1920.html";
$file_contents1920 = file_get_contents($path_to_file1920);
$file_contents1920 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1920);
file_put_contents($path_to_file1920,$file_contents1920);

$path_to_file1921 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1921.html";
$file_contents1921 = file_get_contents($path_to_file1921);
$file_contents1921 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1921);
file_put_contents($path_to_file1921,$file_contents1921);

$path_to_file1922 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1922.html";
$file_contents1922 = file_get_contents($path_to_file1922);
$file_contents1922 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1922);
file_put_contents($path_to_file1922,$file_contents1922);

$path_to_file1923 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1923.html";
$file_contents1923 = file_get_contents($path_to_file1923);
$file_contents1923 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1923);
file_put_contents($path_to_file1923,$file_contents1923);

$path_to_file1924 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1924.html";
$file_contents1924 = file_get_contents($path_to_file1924);
$file_contents1924 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1924);
file_put_contents($path_to_file1924,$file_contents1924);

$path_to_file1925 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1925.html";
$file_contents1925 = file_get_contents($path_to_file1925);
$file_contents1925 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1925);
file_put_contents($path_to_file1925,$file_contents1925);

$path_to_file1926 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1926.html";
$file_contents1926 = file_get_contents($path_to_file1926);
$file_contents1926 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1926);
file_put_contents($path_to_file1926,$file_contents1926);

$path_to_file1927 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1927.html";
$file_contents1927 = file_get_contents($path_to_file1927);
$file_contents1927 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1927);
file_put_contents($path_to_file1927,$file_contents1927);

$path_to_file1928 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1928.html";
$file_contents1928 = file_get_contents($path_to_file1928);
$file_contents1928 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1928);
file_put_contents($path_to_file1928,$file_contents1928);

$path_to_file1929 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1929.html";
$file_contents1929 = file_get_contents($path_to_file1929);
$file_contents1929 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1929);
file_put_contents($path_to_file1929,$file_contents1929);

$path_to_file1930 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1930.html";
$file_contents1930 = file_get_contents($path_to_file1930);
$file_contents1930 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1930);
file_put_contents($path_to_file1930,$file_contents1930);

$path_to_file1931 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1931.html";
$file_contents1931 = file_get_contents($path_to_file1931);
$file_contents1931 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1931);
file_put_contents($path_to_file1931,$file_contents1931);

$path_to_file1932 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1932.html";
$file_contents1932 = file_get_contents($path_to_file1932);
$file_contents1932 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1932);
file_put_contents($path_to_file1932,$file_contents1932);

$path_to_file1933 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1933.html";
$file_contents1933 = file_get_contents($path_to_file1933);
$file_contents1933 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1933);
file_put_contents($path_to_file1933,$file_contents1933);

$path_to_file1934 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1934.html";
$file_contents1934 = file_get_contents($path_to_file1934);
$file_contents1934 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1934);
file_put_contents($path_to_file1934,$file_contents1934);

$path_to_file1935 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1935.html";
$file_contents1935 = file_get_contents($path_to_file1935);
$file_contents1935 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1935);
file_put_contents($path_to_file1935,$file_contents1935);

$path_to_file1936 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1936.html";
$file_contents1936 = file_get_contents($path_to_file1936);
$file_contents1936 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1936);
file_put_contents($path_to_file1936,$file_contents1936);

$path_to_file1937 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1937.html";
$file_contents1937 = file_get_contents($path_to_file1937);
$file_contents1937 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1937);
file_put_contents($path_to_file1937,$file_contents1937);

$path_to_file1938 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1938.html";
$file_contents1938 = file_get_contents($path_to_file1938);
$file_contents1938 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1938);
file_put_contents($path_to_file1938,$file_contents1938);

$path_to_file1939 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1939.html";
$file_contents1939 = file_get_contents($path_to_file1939);
$file_contents1939 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1939);
file_put_contents($path_to_file1939,$file_contents1939);

$path_to_file1940 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1940.html";
$file_contents1940 = file_get_contents($path_to_file1940);
$file_contents1940 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1940);
file_put_contents($path_to_file1940,$file_contents1940);

$path_to_file1941 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1941.html";
$file_contents1941 = file_get_contents($path_to_file1941);
$file_contents1941 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1941);
file_put_contents($path_to_file1941,$file_contents1941);

$path_to_file1942 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1942.html";
$file_contents1942 = file_get_contents($path_to_file1942);
$file_contents1942 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1942);
file_put_contents($path_to_file1942,$file_contents1942);

$path_to_file1943 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1943.html";
$file_contents1943 = file_get_contents($path_to_file1943);
$file_contents1943 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1943);
file_put_contents($path_to_file1943,$file_contents1943);

$path_to_file1944 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1944.html";
$file_contents1944 = file_get_contents($path_to_file1944);
$file_contents1944 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1944);
file_put_contents($path_to_file1944,$file_contents1944);

$path_to_file1945 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1945.html";
$file_contents1945 = file_get_contents($path_to_file1945);
$file_contents1945 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1945);
file_put_contents($path_to_file1945,$file_contents1945);

$path_to_file1946 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1946.html";
$file_contents1946 = file_get_contents($path_to_file1946);
$file_contents1946 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1946);
file_put_contents($path_to_file1946,$file_contents1946);

$path_to_file1947 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1947.html";
$file_contents1947 = file_get_contents($path_to_file1947);
$file_contents1947 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1947);
file_put_contents($path_to_file1947,$file_contents1947);

$path_to_file1948 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1948.html";
$file_contents1948 = file_get_contents($path_to_file1948);
$file_contents1948 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1948);
file_put_contents($path_to_file1948,$file_contents1948);

$path_to_file1949 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1949.html";
$file_contents1949 = file_get_contents($path_to_file1949);
$file_contents1949 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1949);
file_put_contents($path_to_file1949,$file_contents1949);

$path_to_file1950 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1950.html";
$file_contents1950 = file_get_contents($path_to_file1950);
$file_contents1950 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1950);
file_put_contents($path_to_file1950,$file_contents1950);

$path_to_file1951 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1951.html";
$file_contents1951 = file_get_contents($path_to_file1951);
$file_contents1951 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1951);
file_put_contents($path_to_file1951,$file_contents1951);

$path_to_file1952 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1952.html";
$file_contents1952 = file_get_contents($path_to_file1952);
$file_contents1952 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1952);
file_put_contents($path_to_file1952,$file_contents1952);

$path_to_file1953 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1953.html";
$file_contents1953 = file_get_contents($path_to_file1953);
$file_contents1953 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1953);
file_put_contents($path_to_file1953,$file_contents1953);

$path_to_file1954 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1954.html";
$file_contents1954 = file_get_contents($path_to_file1954);
$file_contents1954 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1954);
file_put_contents($path_to_file1954,$file_contents1954);

$path_to_file1955 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1955.html";
$file_contents1955 = file_get_contents($path_to_file1955);
$file_contents1955 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1955);
file_put_contents($path_to_file1955,$file_contents1955);

$path_to_file1956 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1956.html";
$file_contents1956 = file_get_contents($path_to_file1956);
$file_contents1956 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1956);
file_put_contents($path_to_file1956,$file_contents1956);

$path_to_file1957 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1957.html";
$file_contents1957 = file_get_contents($path_to_file1957);
$file_contents1957 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1957);
file_put_contents($path_to_file1957,$file_contents1957);

$path_to_file1958 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1958.html";
$file_contents1958 = file_get_contents($path_to_file1958);
$file_contents1958 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1958);
file_put_contents($path_to_file1958,$file_contents1958);

$path_to_file1959 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1959.html";
$file_contents1959 = file_get_contents($path_to_file1959);
$file_contents1959 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1959);
file_put_contents($path_to_file1959,$file_contents1959);

$path_to_file1960 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1960.html";
$file_contents1960 = file_get_contents($path_to_file1960);
$file_contents1960 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1960);
file_put_contents($path_to_file1960,$file_contents1960);

$path_to_file1961 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1961.html";
$file_contents1961 = file_get_contents($path_to_file1961);
$file_contents1961 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1961);
file_put_contents($path_to_file1961,$file_contents1961);

$path_to_file1962 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1962.html";
$file_contents1962 = file_get_contents($path_to_file1962);
$file_contents1962 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1962);
file_put_contents($path_to_file1962,$file_contents1962);

$path_to_file1963 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1963.html";
$file_contents1963 = file_get_contents($path_to_file1963);
$file_contents1963 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1963);
file_put_contents($path_to_file1963,$file_contents1963);

$path_to_file1964 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1964.html";
$file_contents1964 = file_get_contents($path_to_file1964);
$file_contents1964 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1964);
file_put_contents($path_to_file1964,$file_contents1964);

$path_to_file1965 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1965.html";
$file_contents1965 = file_get_contents($path_to_file1965);
$file_contents1965 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1965);
file_put_contents($path_to_file1965,$file_contents1965);

$path_to_file1966 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1966.html";
$file_contents1966 = file_get_contents($path_to_file1966);
$file_contents1966 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1966);
file_put_contents($path_to_file1966,$file_contents1966);

$path_to_file1967 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1967.html";
$file_contents1967 = file_get_contents($path_to_file1967);
$file_contents1967 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1967);
file_put_contents($path_to_file1967,$file_contents1967);

$path_to_file1968 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1968.html";
$file_contents1968 = file_get_contents($path_to_file1968);
$file_contents1968 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1968);
file_put_contents($path_to_file1968,$file_contents1968);

$path_to_file1969 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1969.html";
$file_contents1969 = file_get_contents($path_to_file1969);
$file_contents1969 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1969);
file_put_contents($path_to_file1969,$file_contents1969);

$path_to_file1970 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1970.html";
$file_contents1970 = file_get_contents($path_to_file1970);
$file_contents1970 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1970);
file_put_contents($path_to_file1970,$file_contents1970);

$path_to_file1971 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1971.html";
$file_contents1971 = file_get_contents($path_to_file1971);
$file_contents1971 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1971);
file_put_contents($path_to_file1971,$file_contents1971);

$path_to_file1972 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1972.html";
$file_contents1972 = file_get_contents($path_to_file1972);
$file_contents1972 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1972);
file_put_contents($path_to_file1972,$file_contents1972);

$path_to_file1973 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1973.html";
$file_contents1973 = file_get_contents($path_to_file1973);
$file_contents1973 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1973);
file_put_contents($path_to_file1973,$file_contents1973);

$path_to_file1974 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1974.html";
$file_contents1974 = file_get_contents($path_to_file1974);
$file_contents1974 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1974);
file_put_contents($path_to_file1974,$file_contents1974);

$path_to_file1975 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1975.html";
$file_contents1975 = file_get_contents($path_to_file1975);
$file_contents1975 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1975);
file_put_contents($path_to_file1975,$file_contents1975);

$path_to_file1976 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1976.html";
$file_contents1976 = file_get_contents($path_to_file1976);
$file_contents1976 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1976);
file_put_contents($path_to_file1976,$file_contents1976);

$path_to_file1977 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1977.html";
$file_contents1977 = file_get_contents($path_to_file1977);
$file_contents1977 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1977);
file_put_contents($path_to_file1977,$file_contents1977);

$path_to_file1978 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1978.html";
$file_contents1978 = file_get_contents($path_to_file1978);
$file_contents1978 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1978);
file_put_contents($path_to_file1978,$file_contents1978);

$path_to_file1979 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1979.html";
$file_contents1979 = file_get_contents($path_to_file1979);
$file_contents1979 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1979);
file_put_contents($path_to_file1979,$file_contents1979);

$path_to_file1980 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1980.html";
$file_contents1980 = file_get_contents($path_to_file1980);
$file_contents1980 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1980);
file_put_contents($path_to_file1980,$file_contents1980);

$path_to_file1981 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1981.html";
$file_contents1981 = file_get_contents($path_to_file1981);
$file_contents1981 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1981);
file_put_contents($path_to_file1981,$file_contents1981);

$path_to_file1982 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1982.html";
$file_contents1982 = file_get_contents($path_to_file1982);
$file_contents1982 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1982);
file_put_contents($path_to_file1982,$file_contents1982);

$path_to_file1983 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1983.html";
$file_contents1983 = file_get_contents($path_to_file1983);
$file_contents1983 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1983);
file_put_contents($path_to_file1983,$file_contents1983);

$path_to_file1984 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1984.html";
$file_contents1984 = file_get_contents($path_to_file1984);
$file_contents1984 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1984);
file_put_contents($path_to_file1984,$file_contents1984);

$path_to_file1985 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1985.html";
$file_contents1985 = file_get_contents($path_to_file1985);
$file_contents1985 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1985);
file_put_contents($path_to_file1985,$file_contents1985);

$path_to_file1986 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1986.html";
$file_contents1986 = file_get_contents($path_to_file1986);
$file_contents1986 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1986);
file_put_contents($path_to_file1986,$file_contents1986);

$path_to_file1987 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1987.html";
$file_contents1987 = file_get_contents($path_to_file1987);
$file_contents1987 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1987);
file_put_contents($path_to_file1987,$file_contents1987);

$path_to_file1988 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1988.html";
$file_contents1988 = file_get_contents($path_to_file1988);
$file_contents1988 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1988);
file_put_contents($path_to_file1988,$file_contents1988);

$path_to_file1989 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1989.html";
$file_contents1989 = file_get_contents($path_to_file1989);
$file_contents1989 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1989);
file_put_contents($path_to_file1989,$file_contents1989);

$path_to_file1990 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1990.html";
$file_contents1990 = file_get_contents($path_to_file1990);
$file_contents1990 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1990);
file_put_contents($path_to_file1990,$file_contents1990);

$path_to_file1991 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1991.html";
$file_contents1991 = file_get_contents($path_to_file1991);
$file_contents1991 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1991);
file_put_contents($path_to_file1991,$file_contents1991);

$path_to_file1992 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1992.html";
$file_contents1992 = file_get_contents($path_to_file1992);
$file_contents1992 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1992);
file_put_contents($path_to_file1992,$file_contents1992);

$path_to_file1993 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1993.html";
$file_contents1993 = file_get_contents($path_to_file1993);
$file_contents1993 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1993);
file_put_contents($path_to_file1993,$file_contents1993);

$path_to_file1994 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1994.html";
$file_contents1994 = file_get_contents($path_to_file1994);
$file_contents1994 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1994);
file_put_contents($path_to_file1994,$file_contents1994);

$path_to_file1995 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1995.html";
$file_contents1995 = file_get_contents($path_to_file1995);
$file_contents1995 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1995);
file_put_contents($path_to_file1995,$file_contents1995);

$path_to_file1996 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1996.html";
$file_contents1996 = file_get_contents($path_to_file1996);
$file_contents1996 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1996);
file_put_contents($path_to_file1996,$file_contents1996);

$path_to_file1997 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1997.html";
$file_contents1997 = file_get_contents($path_to_file1997);
$file_contents1997 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1997);
file_put_contents($path_to_file1997,$file_contents1997);

$path_to_file1998 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1998.html";
$file_contents1998 = file_get_contents($path_to_file1998);
$file_contents1998 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1998);
file_put_contents($path_to_file1998,$file_contents1998);

$path_to_file1999 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/1999.html";
$file_contents1999 = file_get_contents($path_to_file1999);
$file_contents1999 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents1999);
file_put_contents($path_to_file1999,$file_contents1999);

$path_to_file2000 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2000.html";
$file_contents2000 = file_get_contents($path_to_file2000);
$file_contents2000 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2000);
file_put_contents($path_to_file2000,$file_contents2000);

$path_to_file2001 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2001.html";
$file_contents2001 = file_get_contents($path_to_file2001);
$file_contents2001 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2001);
file_put_contents($path_to_file2001,$file_contents2001);

$path_to_file2002 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2002.html";
$file_contents2002 = file_get_contents($path_to_file2002);
$file_contents2002 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2002);
file_put_contents($path_to_file2002,$file_contents2002);

$path_to_file2003 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2003.html";
$file_contents2003 = file_get_contents($path_to_file2003);
$file_contents2003 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2003);
file_put_contents($path_to_file2003,$file_contents2003);

$path_to_file2004 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2004.html";
$file_contents2004 = file_get_contents($path_to_file2004);
$file_contents2004 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2004);
file_put_contents($path_to_file2004,$file_contents2004);

$path_to_file2005 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2005.html";
$file_contents2005 = file_get_contents($path_to_file2005);
$file_contents2005 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2005);
file_put_contents($path_to_file2005,$file_contents2005);

$path_to_file2006 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2006.html";
$file_contents2006 = file_get_contents($path_to_file2006);
$file_contents2006 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2006);
file_put_contents($path_to_file2006,$file_contents2006);

$path_to_file2007 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2007.html";
$file_contents2007 = file_get_contents($path_to_file2007);
$file_contents2007 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2007);
file_put_contents($path_to_file2007,$file_contents2007);

$path_to_file2008 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2008.html";
$file_contents2008 = file_get_contents($path_to_file2008);
$file_contents2008 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2008);
file_put_contents($path_to_file2008,$file_contents2008);

$path_to_file2009 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2009.html";
$file_contents2009 = file_get_contents($path_to_file2009);
$file_contents2009 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2009);
file_put_contents($path_to_file2009,$file_contents2009);

$path_to_file2010 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2010.html";
$file_contents2010 = file_get_contents($path_to_file2010);
$file_contents2010 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2010);
file_put_contents($path_to_file2010,$file_contents2010);

$path_to_file2011 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2011.html";
$file_contents2011 = file_get_contents($path_to_file2011);
$file_contents2011 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2011);
file_put_contents($path_to_file2011,$file_contents2011);

$path_to_file2012 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2012.html";
$file_contents2012 = file_get_contents($path_to_file2012);
$file_contents2012 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2012);
file_put_contents($path_to_file2012,$file_contents2012);

$path_to_file2013 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2013.html";
$file_contents2013 = file_get_contents($path_to_file2013);
$file_contents2013 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2013);
file_put_contents($path_to_file2013,$file_contents2013);

$path_to_file2014 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2014.html";
$file_contents2014 = file_get_contents($path_to_file2014);
$file_contents2014 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2014);
file_put_contents($path_to_file2014,$file_contents2014);

$path_to_file2015 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2015.html";
$file_contents2015 = file_get_contents($path_to_file2015);
$file_contents2015 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2015);
file_put_contents($path_to_file2015,$file_contents2015);

$path_to_file2016 = "/home/libmanuk/public_html/papervault/calendar/$tla/years/2016.html";
$file_contents2016 = file_get_contents($path_to_file2016);
$file_contents2016 = str_replace("<option class=\"noyear\" value=\"https://libmanuk.net/papervault/calendar/aaa/$yr\">$yr</option>","<option class=\"year\" value=\"https://libmanuk.net/papervault/calendar/$tla/years/$yr\">$yr</option>",$file_contents2016);
file_put_contents($path_to_file2016,$file_contents2016);


echo "newspaper date $tla $ark processed successfully!";

} else {

echo "invalid input! Could not be processed.\n";

die;

}

?>

