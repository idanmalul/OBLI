<?php 
require_once __DIR__ . '/vendor/autoload.php';



	    $mpdf = new \Mpdf\Mpdf();
		$mpdf->SetDirectionality('rtl');
		$mpdf->autoLangToFont = true;

		// Define a default Landscape page size/format by name
		// $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
		// $mpdf=new Mpdf('c','A4','',''); 
		$mpdf->SetDisplayMode('fullpage');

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);

		$a1 = "123";
		$a2 = "1234";
		$a3 = "12345";
		$a4 = "123456";
		$a5 = "1234567";
		$a6 = "12345678";
		$a7 = "123456789";
		$a8 = "12345657";

		$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
			<HTML>
			<HEAD>
				<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
				<TITLE>כתב ערבות</TITLE>
				<META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
				<META NAME="AUTHOR" CONTENT="Hen Choen">
				<META NAME="CREATED" CONTENT="20190430;154600000000000">
				<META NAME="CHANGEDBY" CONTENT="DANIEL">
				<META NAME="CHANGED" CONTENT="20190618;71200000000000">
				<META NAME="CLASSIFICATION" CONTENT="חן כהן">
				<META NAME="DESCRIPTION" CONTENT="90856\0\3">
				<META NAME="KEYWORDS" CONTENT="90856\0\3">
				<META NAME="AppVersion" CONTENT="16.0000">
				<META NAME="DocSecurity" CONTENT="0">
				<META NAME="HyperlinksChanged" CONTENT="false">
				<META NAME="LinksUpToDate" CONTENT="false">
				<META NAME="ScaleCrop" CONTENT="false">
				<META NAME="ShareDoc" CONTENT="false">
				<STYLE TYPE="text/css">
				<!--
					@page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
					P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2 }
					P.western { font-family: "Times New Roman", serif; font-size: 12pt }
					P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
					P.ctl { font-family: "David"; font-size: 12pt }
				-->
				</STYLE>
			</HEAD>
			<BODY LANG="en-US" DIR="RTL">
			<DIV TYPE=HEADER>
				<P DIR="RTL" ALIGN=CENTER STYLE="margin-bottom: 0.47in; line-height: 100%">
				<FONT FACE="David"><SPAN LANG="he-IL">לוגו ופרטים של
				גולדן רוד</SPAN></FONT></P>
			</DIV>
			<P DIR="LTR" CLASS="western" ALIGN=CENTER><FONT FACE="David"><SPAN LANG="he-IL"><U><FONT SIZE=4><B>כתב
			ערבות</B></FONT></U></SPAN></FONT></P>
			<P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
			</P>
			<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
			<FONT FACE="David"><SPAN LANG="he-IL">לכבוד</SPAN></FONT>:</P>
			<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
			<FONT FACE="David"><SPAN LANG="he-IL"><B>שם המשכיר</B><U> </U></SPAN></FONT>
			</P>
			<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
			<FONT FACE="David"><SPAN LANG="he-IL"><U>כתובת מלאה של
			המשכיר</U></SPAN></FONT></P>
			<P DIR="RTL" CLASS="western" STYLE="margin-left: 0.02in;float:left;"><FONT FACE="David"><SPAN LANG="he-IL">א</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">ג</SPAN></FONT>.<FONT FACE="David"><SPAN LANG="he-IL">נ</SPAN></FONT>.,<FONT FACE="David" ><SPAN LANG="he-IL" STYLE="" >תאריך</SPAN></FONT>:
			'.$a1.'</P>
			<P DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.02in">
			<FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
			</B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$a2.'</B></U></P>
			<OL>
				<LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">אנו ערבים
				בזה כלפיך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
				לתשלום כל סכום עד לסכום כולל של </SPAN></FONT><U>'.$a3.'</U><B>
				₪ </B>(<FONT FACE="David"><SPAN LANG="he-IL">להלן</SPAN></FONT>:
				&quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>סכום הערבות</B></SPAN></FONT>&quot;)
				<FONT FACE="David"><SPAN LANG="he-IL">שתדרוש</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">תדרשו
				מ</SPAN></FONT>- <U>'.$a4.'</U> (<FONT FACE="David"><SPAN LANG="he-IL">להלן
				וביחד</SPAN></FONT>: <B>&quot;</B><FONT FACE="David"><SPAN LANG="he-IL"><B>הנערב</B></SPAN></FONT><B>&quot;</B>)
				<FONT FACE="David"><SPAN LANG="he-IL">בקשר עם ההסכם מיום
				</SPAN></FONT> <U>'.$a5.'</U>, <FONT FACE="David"><SPAN LANG="he-IL">על כל
				תוספותיו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">ככל
				שיהיו מעת לעת </SPAN></FONT>(<FONT FACE="David"><SPAN LANG="he-IL">להלן</SPAN></FONT>:
				<B>&quot;</B><FONT FACE="David"><SPAN LANG="he-IL"><B>ההסכם</B></SPAN></FONT><B>&quot;</B>).</P>
				<LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">סכום
				הערבות יהיה צמוד למדד המחירים לצרכן
				כפי שהוא מתפרסם מפעם לפעם על ידי הלשכה
				המרכזית לסטטיסטיקה ולמחקר כלכלי</SPAN></FONT>,
				<FONT FACE="David"><SPAN LANG="he-IL">בתנאי ההצמדה שלהלן</SPAN></FONT>:</P>
				<P DIR="RTL" STYLE="margin-left: 0.35in">&quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>המדד
			היסודי</B></SPAN></FONT>&quot; <FONT FACE="David"><SPAN LANG="he-IL">לעניין
			ערבות זו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהא
			המדד שפורסם ביום </SPAN></FONT><U>'.$a6.'</U> <FONT FACE="David"><SPAN LANG="he-IL">בגין
			חודש </SPAN></FONT><U>'.$a7.'</U>.</P>
				<P DIR="RTL" STYLE="margin-left: 0.35in">&quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>המדד
			החדש</B></SPAN></FONT>&quot; <FONT FACE="David"><SPAN LANG="he-IL">לעניין
			ערבות זו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהא
			המדד שפורסם לאחרונה וקודם לקבלת דרישתכם
			על פי ערבות זו</SPAN></FONT>.</P>
			<P DIR="RTL" STYLE="margin-left: 0.35in"><FONT FACE="David"><SPAN LANG="he-IL">הפרשי
			ההצמדה לעניין ערבות זו יחושבו כדלהלן</SPAN></FONT>:
			<FONT FACE="David"><SPAN LANG="he-IL">אם יתברר כי המדד
			החדש עלה לעומת המדד היסודי</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהיו
			הפרשי ההצמדה </SPAN></FONT>- <FONT FACE="David"><SPAN LANG="he-IL">הסכום
			השווה למכפלת ההפרש בין המדד החדש למדד
			היסודי בסכום הדרישה</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">מחולק
			במדד היסודי</SPAN></FONT>. <FONT FACE="David"><SPAN LANG="he-IL">אם
			המדד החדש יהיה נמוך מהמדד היסודי</SPAN></FONT>,
			<FONT FACE="David"><SPAN LANG="he-IL">נשלם לך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
			את הסכום הנקוב בדרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
			עד לסכום הערבות</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">ללא
			כל הפרשי הצמדה</SPAN></FONT>.</P>

			</OL>
			<OL START=3>
				<LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">לפי
				דרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
				הראשונה בכתב</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">ולא
				יאוחר מארבעה עשר ימים מתאריך התקבל
				דרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
				על ידינו </SPAN></FONT>[<FONT FACE="David"><SPAN LANG="he-IL">באמצעות
				האתר או לפי כתובתנו המפורטת לעיל </SPAN></FONT>(<FONT FACE="David"><SPAN LANG="he-IL">בלוגו
				של המסמך</SPAN></FONT>)], <FONT FACE="David"><SPAN LANG="he-IL">אנו
				נשלם לך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
				כל סכום הנקוב בדרישה ובלבד שלא יעלה על
				סכום הערבות הצמוד למדד</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">מבלי
				להטיל עליך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
				חובה להוכיח או לבסס את דרישתך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
				ומבלי שתהיה</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ו
				חייב</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ים
				לדרוש את התשלום תחילה מאת הנערב</SPAN></FONT>.
				[<FONT FACE="David"><SPAN LANG="he-IL"><SPAN STYLE="background: #ffff00">דני</SPAN></SPAN></FONT><SPAN STYLE="background: #ffff00">,
				<FONT FACE="David"><SPAN LANG="he-IL">ערן – לדיון כיצד
				מודיעים על מימוש הערבות</SPAN></SPAN></FONT><SPAN STYLE="background: #ffff00">.
				<FONT FACE="David"><SPAN LANG="he-IL">האם אפשר להסתפק
				בשליחת מייל</SPAN></SPAN></FONT><SPAN STYLE="background: #ffff00">?
				<FONT FACE="David"><SPAN LANG="he-IL">החזרה של הערבות</SPAN></SPAN></FONT><SPAN STYLE="background: #ffff00">?</SPAN>]</P>
				<LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
				תישאר בתוקפה עד ליום סיום ההסכם</SPAN></FONT>,
				<FONT FACE="David"><SPAN LANG="he-IL">ולאחר תאריך זה
				תהיה בטלה ומבוטלת</SPAN></FONT>. <FONT FACE="David"><SPAN LANG="he-IL">כל
				דרישה על פי ערבות זו צריכה להתקבל על
				ידינו בכתב ולא יאוחר מהתאריך הנ</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">ל</SPAN></FONT>.
					</P>
				<LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">ערבות
				זאת אינה ניתנת להעברה ו</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">או
				להסבה</SPAN></FONT>.</P>
				<LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
				ניתנת למימוש לשיעורין</SPAN></FONT>.</P>
			</OL>
			<P DIR="RTL" ALIGN=LEFT STYLE="margin-left: 3.54in"><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
			רב</SPAN></FONT>,</P>
			<P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">
			      <FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
			בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>
			<P DIR="LTR" CLASS="western"><img src="02463c8e-99a9-11e9-9d71-0cc47a792c0a_id_02463c8e-99a9-11e9-9d71-0cc47a792c0a_files/sign.png" width="200" height="" STYLE="float:left;">
			</P>
			</BODY>
			</HTML>';

			// set auto page breaks
			// $mpdf->SetAutoPageBreak(true, 11);
			// $mpdf->AddPage();
			// $mpdf->SetFont('times', '', 10.5);
			$mpdf->WriteHTML($html);
			// $mpdf->Output();
			// define('UPLOAD_DIR', 'output/');
			// $file_path = UPLOAD_DIR;

			// $mpdf->setPaper('A4', 'portrait');

			// $pdf_file = 'user_pdf'.uniqid().time().'.pdf';
			// $success = file_put_contents($file_path, $pdf_file);
			// ob_clean();

			// $location = __DIR__ .'/user_pdf/';
			// echo $location; die();
			// $mpdf->Output($location . $pdf_file, \Mpdf\Output\Destination::FILE);

			$mpdf->Output();


	    