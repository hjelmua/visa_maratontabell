<?php
/*
* Plugin Name: Visa Maratontabell
* Description: En plugin för att visa IFK Uppsalas maratontabell.
* Version: 1.01
* Author: Jonas
* Author URI: https://pentarex.se
*/

// Code : WP Shortcode to display IFK Uppsala Maratontabell on any page or post.
function ifktabell_creation(){
	/* klistra in koden nedan */
	$servername = "database server";
	$username = "my username";
	$password = "mypassword";
	$dbname = "database name";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$conn->set_charset('utf8');
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// functions

	$Mainselect = "SELECT player_id, Aktiv, allseriematcher, allgames, Fornamn, Efternamn, Fodelsear";
	
	$Seriematcher = "seriematcher_2018 + seriematcher_2017 + seriematcher_2016 + seriematcher_2015 + 
		seriematcher_2014 + 
		seriematcher_2013 + 
		seriematcher_2012 + 
		seriematcher_2011 + 
		seriematcher_2010 + 
		seriematcher_2009 + 
		seriematcher_2008 + 
		seriematcher_2007 + 
		seriematcher_2006 + 
		seriematcher_2005 + 
		seriematcher_2004 + 
		seriematcher_2003 + 
		seriematcher_2002 + 
		seriematcher_2001 + 
		seriematcher_2000 + 
		seriematcher_1999 + 
		seriematcher_1998 + 
		seriematcher_1997 + 
		seriematcher_1996 + 
		seriematcher_1995 + 
		seriematcher_1994 + 
		seriematcher_1993 + 
		seriematcher_1992 + 
		seriematcher_1991 + 
		seriematcher_1990 + 
		seriematcher_1989 + 
		seriematcher_1988 + 
		seriematcher_1987 + 
		seriematcher_1986 + 
		seriematcher_1985 + 
		seriematcher_1984 + 
		seriematcher_1983 + 
		seriematcher_1982 + 
		seriematcher_1981 + 
		seriematcher_1980 + 
		seriematcher_1979 + 
		seriematcher_1978 + 
		seriematcher_1977 + 
		seriematcher_1976 + 
		seriematcher_1975 + 
		seriematcher_1974 + 
		seriematcher_1973 + 
		seriematcher_1972 + 
		seriematcher_1971 + 
		seriematcher_1970 + 
		seriematcher_1969 + 
		seriematcher_1968 + 
		seriematcher_1967 + 
		seriematcher_1966 + 
		seriematcher_1965 + 
		seriematcher_1964 + 
		seriematcher_1963 + 
		seriematcher_1962 + 
		seriematcher_1961 + 
		seriematcher_1960 + 
		seriematcher_1959 + 
		seriematcher_1957_58";

	$Cupmatcher = "cupmatcher_2018 + cupmatcher_2011 + 
	cupmatcher_2010 + 
	cupmatcher_2009 + 
	cupmatcher_2008 + 
	cupmatcher_2007 + 
	cupmatcher_2006 + 
	cupmatcher_2005 + 
	cupmatcher_2004 + 
	cupmatcher_2003 + 
	cupmatcher_2002 + 
	cupmatcher_2001 + 
	cupmatcher_2000 + 
	cupmatcher_1999 + 
	cupmatcher_1998 + 
	cupmatcher_1997 + 
	cupmatcher_1994 + 
	cupmatcher_1992 + 
	cupmatcher_1991 + 
	cupmatcher_1990 + 
	cupmatcher_1989 + 
	cupmatcher_1988 + 
	cupmatcher_1987 + 
	cupmatcher_1986 + 
	cupmatcher_1985 + 
	cupmatcher_1984 + 
	cupmatcher_1983 + 
	cupmatcher_1982 + 
	cupmatcher_1981 + 
	cupmatcher_1980 + 
	cupmatcher_1979 + 
	cupmatcher_1978 + 
	cupmatcher_1964 + 
	cupmatcher_1963 + 
	cupmatcher_1962";

	$Sasonger = "IF(seriematcher_2018 > '0' OR cupmatcher_2018 > '0', 1, 0) + IF(seriematcher_2017 > '0', 1, 0) + 
	    IF(seriematcher_2016 > '0', 1, 0) + 
	    IF(seriematcher_2015 > '0', 1, 0) + 
	    IF(seriematcher_2014 > '0', 1, 0) + 
	    IF(seriematcher_2013 > '0', 1, 0) +
	    IF(seriematcher_2012 > '0', 1, 0) +
	    IF(seriematcher_2011 > '0' OR cupmatcher_2011 > '0', 1, 0) +
	    IF(seriematcher_2010 > '0' OR cupmatcher_2010 > '0', 1, 0) +
	IF(seriematcher_2009 > '0' OR cupmatcher_2009 > '0', 1, 0) + 
	IF(seriematcher_2008 > '0' OR cupmatcher_2008 > '0', 1, 0) + 
	IF(seriematcher_2007 > '0' OR cupmatcher_2007 > '0', 1, 0) + 
	IF(seriematcher_2006 > '0' OR cupmatcher_2006 > '0', 1, 0) + 
	IF(seriematcher_2005 > '0' OR cupmatcher_2005 > '0', 1, 0) + 
	IF(seriematcher_2004 > '0' OR cupmatcher_2004 > '0', 1, 0) + 
	IF(seriematcher_2003 > '0' OR cupmatcher_2003 > '0', 1, 0) + 
	IF(seriematcher_2002 > '0' OR cupmatcher_2002 > '0', 1, 0) + 
	IF(seriematcher_2001 > '0' OR cupmatcher_2001 > '0', 1, 0) + 
	IF(seriematcher_2000 > '0' OR cupmatcher_2000 > '0', 1, 0) + 
	IF(seriematcher_1999 > '0' OR cupmatcher_1999 > '0', 1, 0) + 
	IF(seriematcher_1998 > '0' OR cupmatcher_1998 > '0', 1, 0) + 
	IF(seriematcher_1997 > '0' OR cupmatcher_1997 > '0', 1, 0) + 
	IF(seriematcher_1996 > '0', 1, 0) + 
	IF(seriematcher_1995 > '0', 1, 0) + 
	IF(seriematcher_1994 > '0' OR cupmatcher_1994 > '0', 1, 0) + 
	IF(seriematcher_1993 > '0', 1, 0) + 
	IF(seriematcher_1992 > '0' OR cupmatcher_1992 > '0', 1, 0) + 
	IF(seriematcher_1991 > '0' OR cupmatcher_1991 > '0', 1, 0) + 
	IF(seriematcher_1990 > '0' OR cupmatcher_1990 > '0', 1, 0) + 
	IF(seriematcher_1989 > '0' OR cupmatcher_1989 > '0', 1, 0) + 
	IF(seriematcher_1988 > '0' OR cupmatcher_1988 > '0', 1, 0) + 
	IF(seriematcher_1987 > '0' OR cupmatcher_1987 > '0', 1, 0) + 
	IF(seriematcher_1986 > '0' OR cupmatcher_1986 > '0', 1, 0) + 
	IF(seriematcher_1985 > '0' OR cupmatcher_1985 > '0', 1, 0) + 
	IF(seriematcher_1984 > '0' OR cupmatcher_1984 > '0', 1, 0) + 
	IF(seriematcher_1983 > '0' OR cupmatcher_1983 > '0', 1, 0) + 
	IF(seriematcher_1982 > '0' OR cupmatcher_1982 > '0', 1, 0) + 
	IF(seriematcher_1981 > '0' OR cupmatcher_1981 > '0', 1, 0) + 
	IF(seriematcher_1980 > '0' OR cupmatcher_1980 > '0', 1, 0) + 
	IF(seriematcher_1979 > '0' OR cupmatcher_1979 > '0', 1, 0) + 
	IF(seriematcher_1978 > '0' OR cupmatcher_1978 > '0', 1, 0) + 
	IF(seriematcher_1977 > '0', 1, 0) + 
	IF(seriematcher_1976 > '0', 1, 0) + 
	IF(seriematcher_1975 > '0', 1, 0) + 
	IF(seriematcher_1974 > '0', 1, 0) + 
	IF(seriematcher_1973 > '0', 1, 0) + 
	IF(seriematcher_1972 > '0', 1, 0) + 
	IF(seriematcher_1971 > '0', 1, 0) + 
	IF(seriematcher_1970 > '0', 1, 0) + 
	IF(seriematcher_1969 > '0', 1, 0) + 
	IF(seriematcher_1968 > '0', 1, 0) + 
	IF(seriematcher_1967 > '0', 1, 0) + 
	IF(seriematcher_1966 > '0', 1, 0) + 
	IF(seriematcher_1965 > '0', 1, 0) + 
	IF(seriematcher_1964 > '0' OR cupmatcher_1964 > '0', 1, 0) + 
	IF(seriematcher_1963 > '0' OR cupmatcher_1963 > '0', 1, 0) + 
	IF(seriematcher_1962 > '0' OR cupmatcher_1962 > '0', 1, 0) + 
	IF(seriematcher_1961 > '0', 1, 0) + 
	IF(seriematcher_1960 > '0', 1, 0) + 
	IF(seriematcher_1959 > '0', 1, 0) + 
	IF(seriematcher_1957_58 > '0', 1, 0) AS SASONGER";


	// end functions




	// default svar

	if ($_GET["add"] == "1") {
		$sql = "$Mainselect, ($Seriematcher + $Cupmatcher) AS totalt, ($Seriematcher) AS seriematcher, ($Cupmatcher) AS cupmatcher, $Sasonger,
		 @curRank := IF(@prevRank = allgames, @curRank, @incRank) AS rank, 
		   	@incRank := @incRank + 1, 
		   	@prevRank := allgames
		FROM spelardatabas,  (SELECT @curRank :=0, @prevRank := NULL, @incRank := 1) r
		WHERE Aktiv='1'
		ORDER BY totalt DESC, seriematcher DESC, Fodelsear ASC, Efternamn ASC";
	}
	elseif ($_GET["add"] == "2") {
		$sql = "$Mainselect, ($Seriematcher + $Cupmatcher) AS totalt, ($Seriematcher) AS seriematcher, ($Cupmatcher) AS cupmatcher, $Sasonger,
		 @curRank := IF(@prevRank = allgames, @curRank, @incRank) AS rank, 
		   	@incRank := @incRank + 1, 
		   	@prevRank := allgames
		FROM spelardatabas,  (SELECT @curRank :=0, @prevRank := NULL, @incRank := 1) r
		WHERE Fodelsear>'1989'
		ORDER BY totalt DESC, seriematcher DESC, Fodelsear ASC, Efternamn ASC";
	}
	elseif ($_GET["add"] == "3") {
		$sql = "$Mainselect, seriematcher_2018 AS totalt, seriematcher_2018 as seriematcher, ($Cupmatcher) AS cupmatcher, $Sasonger,
		 @curRank := IF(@prevRank = allgames, @curRank, @incRank) AS rank, 
		   	@incRank := @incRank + 1, 
		   	@prevRank := allgames
		FROM spelardatabas,  (SELECT @curRank :=0, @prevRank := NULL, @incRank := 1) r
		WHERE seriematcher_2018>'0'
		ORDER BY totalt DESC, seriematcher DESC, Fodelsear ASC, Efternamn ASC";
	}
	else {
		$sql = "$Mainselect, ($Seriematcher + $Cupmatcher) AS totalt, ($Seriematcher) AS seriematcher, ($Cupmatcher) AS cupmatcher, $Sasonger,
		 @curRank := IF(@prevRank = allgames, @curRank, @incRank) AS rank, 
		   	@incRank := @incRank + 1, 
		   	@prevRank := allgames
		FROM spelardatabas,  (SELECT @curRank :=0, @prevRank := NULL, @incRank := 1) r
		ORDER BY totalt DESC, seriematcher DESC, Fodelsear ASC, Efternamn ASC";
	}






	$result = mysqli_query($conn, $sql);
	$num_rows = mysqli_num_rows($result);
	if ($result->num_rows > 0) {
	echo
	"<table><thead><tr><th>#</th><th>Efternamn</th><th>F&ouml;rnamn</th><th>Född</th><th>Matcher</th><th>Seriematcher</th><th>Cupmatcher</th><th>S&auml;songer</th></thead></tr><tbody>";
	echo "\n";
	//while($row = $result->fetch_assoc())
	while($row = mysqli_fetch_array($result)) {
	// de aktiva spelarena
	  if ($row['Aktiv'] == "1") {
	echo "<tr style=\"color: #006b2d;\"><td>".$row["rank"]."</td><td>".$row["Efternamn"]."</td><td>".$row["Fornamn"]."</td><td>".$row["Fodelsear"]."</td><td>".$row["totalt"]."</td><td>".$row["seriematcher"]."</td><td>".$row["cupmatcher"]."</td><td>".$row["SASONGER"]."</td></tr>";
	echo "\n";
	  }
	// de icke aktiva spelarna
	 else {
	echo "<tr><td>".$row["rank"]."</td><td>".$row["Efternamn"]."</td><td>".$row["Fornamn"]."</td><td>".$row["Fodelsear"]."</td><td>".$row["totalt"]."</td><td>".$row["seriematcher"]."</td><td>".$row["cupmatcher"]."</td><td>".$row["SASONGER"]."</td></tr>";
	echo "\n";
	  }
	}

	echo "<tbody></table> </br> Totalt antal spelare i databasen $num_rows";
	} else {
	    echo "0 results";
	}

	// slut default svar


	//updatera databas för ranking
	$sql2 ="UPDATE spelardatabas SET allgames = $Seriematcher + $Cupmatcher";
	$result = mysqli_query($conn, $sql2);


	$sql3 = "UPDATE spelardatabas SET allseriematcher = $Seriematcher";
			$result = mysqli_query($conn, $sql3);

	mysqli_close($conn);	
		
		

/* slut klistra in koden */
?>

<?php
}
add_shortcode('maratontabell', 'ifktabell_creation');
?>
