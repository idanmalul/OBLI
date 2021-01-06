<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Website extends CI_Controller {
    
    function __construct() {

        parent::__construct();
         date_default_timezone_set('Asia/Jerusalem');
         
         error_reporting(0);
         
    }

    function pdf($html,$pdf_location){
        // $file_path = base_url() . "doc_sign/5de0fb3a5b6d21223182045.png";
        // echo $file_path; die();
        // $path = base_url(). 'webservices/vendor/autoload.php';
        $pdfData = array();
        require_once './webservices/vendor/autoload.php';
        // require_once(APPPATH.'../webservices/vendor/autoload.php');
        // echo $path; die();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetDirectionality('rtl');
        $mpdf->autoLangToFont = true;

        // Define a default Landscape page size/format by name
        // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        // $mpdf=new Mpdf('c','A4','',''); 
        // $mpdf->SetDisplayMode(90);
        $mpdf->SetDisplayMode('fullpage');
        // $mpdf->SetDisplayMode('fullwidth');


        // $date = $document_id = $amount = $name = $address = $document_number_id = $no_of_months = "";

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);


            // set auto page breaks
            // $mpdf->SetAutoPageBreak(true, 11);
            $mpdf->AddPage();
            // $mpdf->SetFont('times', '', 10.5);
            $mpdf->WriteHTML($html);
            // $mpdf->Output();
            // $location = __DIR__ .'/user_pdf/';
            $location_url = base_url(). $pdf_location;

            $location = $pdf_location;
            $pdf_file = 'user_pdf'.uniqid().time().'.pdf';
            $mpdf->Output($location . $pdf_file, \Mpdf\Output\Destination::FILE);
            $final_pdf_path = $location_url.$pdf_file;

            $pdfData = array('final_pdf_path' => $final_pdf_path, 'pdf_file' => $pdf_file);

            return $pdfData ;

            // echo $pdff =  base64_encode($pdf_file)."<br>";
            // echo base64_decode($pdff)."<br>";

            // $property_owner_email = "satendra.tectum@gmail.com";
            // $user_link = base_url()."business12/".$pdf_file."/".$property_owner_email ;
            // echo $final_pdf_path;

           
            

    }

    function test_pdf()
    {
        $date = date('Y-m-d');
        $document_id = 23423432;
        $amount = 25000;
        $document_number_id = 56546546;
        $no_of_months =23;
         $first_signature_file= '';
         $second_signature_file= "";
         $order_id_number = 1234567890000;
         $date_signature = date('Y-m-d');
        $name = "סטיאנדרה שוקלה";
        $address = "נהרו נגר, אינדור";
        $file_path = base_url() . "doc_sign/5de0fb3a5b6d21223182045.png";
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
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
         
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL">הסכם שיפוי חברה </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שנערך ונחתם '.$date_signature.' </SPAN></FONT></P>

             <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">בין גולדנרוד בע"מ ח.פ. 513578674 (להלן: "הערב")  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מרח  יד חרוצים 12, תל אביב  </SPAN></FONT></P>
        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לבין '.$name.' </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$address.' </SPAN></FONT></P>
            <BR>
            <BR>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <B>'.$order_id_number.'</B> (להלן: "כתב הערבות"), </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">לטובת המוטב, על סך '.$amount.' ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א להסכם זה; </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב. </SPAN></FONT></P>
             <BR>
            

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן:  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%, ">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1. מבוא ונספחים </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.1.  המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו (להלן: "ההסכם").   </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.2. כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.3. הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  </SPAN></FONT></P>
            
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2. ההתקשרות </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.1. במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> במבוא להסכם זה, לטובתו של המוטב, בו התחייבה להעביר לידי המוטב את סכום הערבות במקרה שבו יבקש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב לממש את כתב הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.2. במקרה של מימוש כתב הערבות ע"י המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>6%</B> מסכום הערבות. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.3. במקרה של מימוש כתב הערבות ע"י המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 6%. ההלוואה תעמוד לתקופה של 18 חודשים. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הענקת ההלוואה כפופה לאישור חיתום הלקוח בטריא. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.4. במקרה של אי קיום התחייבויות הלקוחה מצדה כאמור בהסכם, הערב/ה ללקוחה (כמוגדר בנספח ב להסכם) מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם למוסכם תחת ס עיף זה.</SPAN></FONT></P>                      

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.5. במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לא יעמדו בבדיקת הלקוח אותה תבצע טריא. </SPAN></FONT></P>

            
            <BR>
             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. תקופת ההסכם  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3.1. הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות; </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4. מצגים </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלקוח מצהיר בזאת, כדלקמן:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.1. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים   </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.2. לא התקבלה החלטה על פירוקה מרצון ו/או לא התחיל הליך פירוק החברה מרצון, כמשמעותם בחוק ה חברות, תשנ"ט 1999- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.3. לא מתקיימים לגביה הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי, ת שע"ח 2018- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.4. ספרי הערב ישמשו כראייה לסכום חובו לחברה. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5. התחייבויות הלקוח </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.1. הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.2. הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ימים ממועד העברת סכום הערבות למוטב. </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.3. הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.4. במקרה של אי קיום התחייבויות הלקוחה כאמור לעיל, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי ח וזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם לתנאים המוסכמים תחת סעיף זה.</SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6. כללי </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.1. הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מסורה לבתי המשפט המוסמכים בתל אביב. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.2. אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.</SPAN></FONT></P>
            

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.3. הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה. </SPAN></FONT></P>


            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

             
            </BODY>
            </HTML>';

            $pdf_location = "doc_sign/userPdf/";
            $final_pdf_path = $this->pdf($html, $pdf_location);
            echo '<pre>';
            print_r($final_pdf_path); die();
    }

    function index() 
    {
        $data = array();
        $footerdata = array();
        $sql1 = "SELECT * FROM banner ORDER BY id DESC LIMIT 1 ";
        $data['banner_detail'] = $this->project_model->get_query_result($sql1);

        // echo "<pre>"; print_r($data['banner_detail']); die();

        $sql2 = "SELECT * FROM content_section_2 ORDER BY id DESC LIMIT 1";
        $data['content_details'] = $this->project_model->get_query_result($sql2);

        $sql3 = "SELECT * FROM section_4 ORDER BY id DESC LIMIT 1";
        $data['section_4_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM section_5 ORDER BY id DESC LIMIT 1";
        $data['section_5_details'] = $this->project_model->get_query_result($sql4);

        // Footer records
        $sql5 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql6);

        $sql7 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql7);

        $sql8 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql8);

        $sql9 = "SELECT * FROM testmonial_section_3 where status = 1";
        $data['slider_details'] = $this->project_model->get_query_result($sql9);

        $this->load->view('website/header');
        $this->load->view('website/body_content', $data);
        $this->load->view('website/footer', $data);
       
    }

    function aboutus()
    {
        $sql1 = "SELECT * FROM aboutus ORDER BY id DESC LIMIT 1 ";
        $data['aboutus_detail'] = $this->project_model->get_query_result($sql1);

        $where_icon_logo = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($where_icon_logo);

        $sql2 = "SELECT * FROM aboutus INNER JOIN partner_icons_images ON aboutus.id = partner_icons_images.aboutus_id ORDER BY partner_icons_images.id ";
        $data['partner_icons_details'] = $this->project_model->get_query_result($sql2);

        // echo "<pre>"; print_r($data['partner_icons_details']); die();

        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        $this->load->view('website/header');
        $this->load->view('website/about_us', $data);
        $this->load->view('website/footer', $data);
    }

    function contactus()
    {
        $data = $this->input->post();
        if(!empty($data)){
            
            $insert_data['first_name'] = $data['input_1'];
            $insert_data['last_name'] = $data['input_31'];
            $insert_data['email'] = $data['input_28'];
            $insert_data['address'] = $data['input_18'];
            $insert_data['status'] = $data['input_27'];
            
            $insert_data['created_at'] = date('Y-m-d H:i:s');
            
            $admin_email = $insert_data['email'];
            
            $contact_id = $this->project_model->insert_data('contact_us', $insert_data);
            
            if($contact_id > 0){
                
                // email send for dealer

                $image_path=base_url();
                $message = '<html>
<head>
    <title>OBLI</title>

</head>

<body bgcolor="#f1f1f1">
<table cellpadding="0" cellspacing="0" width="600" style="background:#fff; border:1px solid #cbcbcb; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
<thead class="header">
        <tr>
            <td style="background:#f1e5e5  ; height:90px; width:100%; padding:5px; border-bottom:1px solid #DDD;text-align:center;" valign="middle">
              <h3 style="font-size: 2.17em; color: #4f81bd;">OBLI</h3> 
        </td>
    </tr>
    </thead>
<tbody style=" border-bottom:1px solid #ddd;">
<tr>
    <td style="padding:10px 15px;">
        <h1 style="margin-bottom:0px; color:#e36034;">Dear '.$insert_data['first_name'].' '.$insert_data['last_name'].'</h1>
        
        <p style="font-size:1em;">Email:' .$insert_data['email'].'</p>
        <p style="font-size:1em;">Address: '.$insert_data['address'].'</p>
        
        
    </td>
</tr>

<tr>
    <td style="padding:10px 15px;">
        <span><strong>Thanks & Regards:</strong></span><br/>
        <span><strong>Obli Team</strong></span>
        
    </td>
</tr>
<tr>
    <td style="background:#ddd; height:1px; width:100%;"></td>
</tr>
</tbody>

<tfoot style="background:#3d3d3d; text-align:center; color:#fff;">
<tr>
<td style="color:#fff;"><p>Copyright © 2020 Obli Team All right reserved</p></td>
<tr>
</tfoot>

</table>
</body>
</html>';
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'mail.obli.co.il',
                    'smtp_port' => 465,
                    'smtp_user' => 'idan@obli.co.il',
                    'smtp_pass' => 'idan@$123',
//                    'mailpath' => '/usr/sbin/sendmail',
//                    'mailtype'  => 'html', 
//                    'charset'   => 'iso-8859-1',
                    'charset'   => 'html',
                    'wordwrap' => TRUE,
                    'smtp_crypto' => 'ssl',
                    'newline' => '\r\n'
                    
//                    'ssl' => array(
//                        'verify_peer' => false,
//                        'verify_peer_name' => false,
//                        'allow_self_signed' => true
//                    )
                );
//                $config['mailpath'] = '/usr/sbin/sendmail';

               $cc_array = array('dani@obli.co.il', 'lena@obli.co.il', 'roei@obli.co.il');
               
               $message1 = "dfgds";
               
                $this->load->library('email', $config);
//                $this->email->initialize($config);
//                $this->email->set_newline("\r\n");
                $this->email->from('idan@obli.co.il', 'Obli Team');
                $this->email->to('info@obli.co.il');
                //$this->email->cc($cc_array);
//                $this->email->bcc('them@their-example.com');
                $this->email->subject('Obli');
                $this->email->message($message);
//                $this->email->subject('Email Test using CI');
//                $this->email->message('Testing the email class.');
                $this->email->set_mailtype("html");
               

                if($this->email->send()){
//                    echo "123_test"; die();
                    
                    $this->session->set_flashdata('success', 'User details saved successfully!');
                    redirect('contactus');
                }else{
//                    echo $this->email->print_debugger();die();
                    $this->session->set_flashdata('error', 'Server error, please try again!');
                    $this->contactus();
                }
                
            }
            else{
                $this->session->set_flashdata('error', 'Server error, please try again!');
                redirect('contactus');
            }
            
        }
        else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/contact_us');
            $this->load->view('website/footer', $data);
        }
        
    }

    function faq()
    {
         // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);
        
        $this->load->view('website/header');
        $this->load->view('website/faq');
        $this->load->view('website/footer', $data);
    }

    function policy()
    {
         // terms records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);
        
        $this->load->view('website/header');
        $this->load->view('website/policy');
        $this->load->view('website/footer', $data);
    }

    function terms()
    {
         // terms records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);
        
        $this->load->view('website/header');
        $this->load->view('website/terms');
        $this->load->view('website/footer', $data);
    }

    function saveImage()
    {
        $result = array();
        $imagedata = base64_decode($_POST['img_data']);
        $filename = md5(date("dmYhisA"));
        //Location to where you want to created sign image
        $file_name = base_url(). 'doc_sign/'.$filename.'.png';
        // echo $file_name; die();
        // chmod(base_url(). 'website_assets/signature/doc_signs/', 777);
        file_put_contents($file_name,$imagedata);
        $result['status'] = 1;
        $result['file_name'] = $file_name;
        die();
        echo json_encode($result);
    }

    // Find file type in base64 code
      function getBytesFromHexString($hexdata)
      {
        for($count = 0; $count < strlen($hexdata); $count+=2)
          $bytes[] = chr(hexdec(substr($hexdata, $count, 2)));

        return implode($bytes);
      }

      function getImageMimeType($imagedata)
      {
        $imagemimetypes = array( 
          "jpeg" => "FFD8", 
          "png" => "89504E470D0A1A0A", 
          "gif" => "474946",
          "bmp" => "424D", 
          "tiff" => "4949",
          "tiff" => "4D4D"
        );

        foreach ($imagemimetypes as $mime => $hexbytes)
        {
          $bytes = $this->getBytesFromHexString($hexbytes);
          if (substr($imagedata, 0, strlen($bytes)) == $bytes)
            return $mime;
        }

        return NULL;
      }
    // end function

    function tenant_payment_api(){

//         echo "<pre>"; print_r($_POST); die();

        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        if($this->input->post()){ 

            $form_detail = $this->input->post();

            $postData = $this->input->post();

            // echo "<pre>"; print_r($form_detail); print_r($_FILES['file-2']); die();

            $first_name = $postData['first_name'];
            $last_name = $postData['last_name'];
            $unique_id = $postData['unique_id'];
            $TZId = $postData['unique_id'];
            $client_hometown = $postData['hometown'];
            $client_street = $postData['street'];
            $client_home_no = $postData['home_no'];
//            $client_home_no = "5א";
            $client_phone = $postData['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $postData['client_email'];
            $client_gender = $postData['client_gender'];
            
            if(!empty($postData['client_gender'])){
                if($client_gender == "זכר"){
                    $client_gender = 1;
                }
                elseif($client_gender == "נקבה"){
                    $client_gender = 2;
                }
            }
            
            $client_date_of_birth = strtr($postData['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            
            $client_date_of_birth = explode('-', $client_date_of_birth);
            
            if(!empty($client_date_of_birth)){
                $client_year = $client_date_of_birth[0];
                $client_month = $client_date_of_birth[1];
                $client_day = $client_date_of_birth[2];
            }
            
            $req_gur_amt = $postData['req_gur_amt'];
//            $req_gur_amt = $req_gur_amt*0.06;

            // echo $req_gur_amt; die();

            $startDate = $postData['startDate'];
            $endDate = $postData['endDate'];

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            // echo $diff;

            // first file
            if(isset($_FILES["file-2"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["file-2"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-2', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                // $this->load->view('website/header');
                // $this->load->view('website/tenant', $form_data);
                // $this->load->view('website/footer', $data);
                // return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                $postFile = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end
            // echo $postFile; die();

            // api start

//            $tarya_data = array("amount"=> $req_gur_amt,"autoApprove"=> 1,"birthDate"=> "$client_date_of_birth","cellPhone"=> "$client_phone","city"=>"$client_hometown","countryCode"=> "IL","email"=> "$client_email","failureUrl"=> "http=>//ebay.com/sucess?orderId=14XA24F","firstName"=> "$first_name","gender"=> $client_gender,"houseNum"=> "$client_home_no","includeUi"=> 1,"lastName"=> "$last_name","localCountryId"=> "028117513","merchantId"=> 10069,"orderId"=> "14XA24F","period"=> $diff,"productTitle"=> "היזיולט","street"=> "$client_street","successUrl"=> "http=>//ebay.com/sucess?orderId=14XA24F");

//             echo "<pre>"; print_r($tarya_data); die();


            $curl = curl_init();

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://sparkorange.tarya.co.il:17373/spark/borrower_api.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 5000,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\"OrgId\" : 95,\n\"FirstName\" : \"$first_name\",\n\"LastName\" : \"$last_name\",\n\"TZ\" : \"$TZId\",\n\"Cell\" : \"$client_phone\",\n\"Email\": \"$client_email\",\n\"Street\" : \"$client_street\",\n\"HouseNum\": \"$client_home_no\",\n\"City\" : \"$client_hometown\",\n\"Sex\" : $client_gender,\n\"Birthdate_y\" : \"$client_year\",\n\"Birthdate_m\" : \"$client_month\",\n\"Birthdate_d\" : \"$client_day\",\n\"Amount\" : $req_gur_amt ,\n\"Duration\" : $diff,\n\"Product\" : \"New car\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"http://ebay.com/success?orderId=14XA24F\",\n\"FailureUrl\" : \"http://ebay.com/fail?orderId=14XA24F\",\n\"AutoApprove\": 0\n}",
              CURLOPT_HTTPHEADER => array(
                
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Postman-Token: 1effd8b2-2187-4b3b-aee8-91ad39e85888,a2ab8682-a93b-4675-8537-3c04c68a8979",
                "cache-control: no-cache"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            // if ($err) {
            //   // echo "cURL Error #:" . $err;
            //   $form_data['data'] = array('status' => 'false');
            // } else {
            //    echo $response;
            //   $res = json_decode($response);
            //   if(!empty($res->link)){
            //         // echo $res->link;
            //         $this->session->set_userdata(array(
            //           'payment_api_link' => $res->link
            //       ));
            //         // print_r($this->session->userdata('payment_api_link'));
            //   }else{
            //       $fieldErrors = @$res->fieldErrors;
            //       if(!empty($fieldErrors)){
            //           $str = "";
            //           foreach ($fieldErrors as $key => $value) {
            //               $field = $value->field;
            //               $errorMessage = $value->errorMessage;
            //               $str .= "field : ".$field." and message : ".$errorMessage."\n";
            //           }
            //           $string = "\nTarya API Error: \n".$str;
            //       }
            //   }
              
            //   die();
            //   $form_data['data'] = array('status' => 'true', 'api_url' => $response, 'form_detail' => $form_detail, 'first_file' => $postFile );

                
            // } 

            if ($err) {
              // echo "cURL Error #:" . $err;
              $form_data['data'] = array('status' => 'false');
            } else {
//               echo $response; die();
                
                $res = json_decode($response);
//                print_r($res);
                
                if(!empty($res->iframe->mpiHostedPageUrl)){
                    $this->session->set_userdata(array(
                      'payment_api_link' => $res->iframe->mpiHostedPageUrl
                    ));
                    $api_url = $this->session->userdata('payment_api_link');
                    
                    $form_data['data'] = array('status' => 'true', 'api_url' => $api_url, 'form_detail' => $form_detail, 'first_file' => $postFile );
                }
                else{
                    $api_url = "";
                    $form_data['data'] = array('status' => 'false');
                }

              

                $this->load->view('website/header');
                $this->load->view('website/new_form', $form_data);
                $this->load->view('website/footer', $data);
            } 
        // api end

            

        }
        else{
            $this->load->view('website/header');
            $this->load->view('website/new_form');
            $this->load->view('website/footer', $data);
        }

    }

    function submit_form_data()
    {
        if($this->input->post()){

            $client_file = $another_account_file = $order_file_name = $an_diff = $apartment_add = $landlord = $landlord_id = $property_phone = $sec_email = $sec_diff = '';
            $postData = $this->input->post();

            // client details
            $first_name = $postData['first_name'];
            $last_name = $postData['last_name'];
            $unique_id = $postData['unique_id'];
            $client_hometown = $postData['hometown']; // api check client add
            $client_street = $postData['street'];
            $client_home_no = $postData['home_no'];
            $client_phone = $postData['client_phone'];
            $client_email = $postData['client_email'];
            $client_gender = $postData['client_gender'];
            $client_first_file = $postData['first_file'];
            $client_date_of_birth = $postData['client_date_of_birth'];
            $client_date_of_birth = date("Y-m-d", strtotime($client_date_of_birth));

            $req_gur_amt = $postData['req_gur_amt'];

            // print_r($postData);

            $startDate = $postData['startDate'];
            $endDate = $postData['endDate'];

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $client_gur_month = $diff;

            // print_r($_FILES);
        
        // first signature image start
            define('UPLOAD_DIR', 'doc_sign/');
              $img1 = $_POST['first_base64_signature'];
              
              $img1 = str_replace('data:image/png;base64,', '', $img1);
              $img1 = str_replace(' ', '+', $img1);
              $data1 = base64_decode($img1);

              $encoded_string1 = $img1;
              $imgdata1 = base64_decode($encoded_string1);
              $mimetype1 = $this->getImageMimeType($imgdata1);
              // echo $imgdata; die();

              $file1 = UPLOAD_DIR . uniqid() . '.'.$mimetype1;
              // echo $file; die();
              $success1 = file_put_contents($file1, $data1);

              $file_path1 = base_url().$file1;
              // $file_path1 = "222";

        // end


        // second signature image start
            define('UPLOAD_SECOND_DIR', 'doc_sign/');
              $img2 = $_POST['second_base64_signature'];
              
              $img2 = str_replace('data:image/png;base64,', '', $img2);
              $img2 = str_replace(' ', '+', $img2);
              $data2 = base64_decode($img2);

              $encoded_string2 = $img2;
              $imgdata2 = base64_decode($encoded_string2);
              $mimetype2 = $this->getImageMimeType($imgdata2);
              // echo $imgdata2; die();

              $file2 = UPLOAD_SECOND_DIR . uniqid().rand() . '.'.$mimetype2;
              // echo $file; die();
              $success2 = file_put_contents($file2, $data2);

              $file_path2 = base_url().$file2;
              // $file_path2 = "123";

        // end

            // echo $file_path2; die();

            if(!empty($postData['req_gur_amt'])){

                if($postData['req_gur_amt'] > 25000){

                    $client_another_account_status = "1";

                    // $another_account_address = $postData['apartment_add'];
                    // $another_first_name = $postData['landlord'];
                    // $another_account_id_number = $postData['landlord_id'];
                    // $another_account_phone = $postData['property_phone'];
                    // $another_account_email = $postData['sec_email'];

                    // another details
                    $another_first_name = $postData['ant_first_name'];
                    $another_last_name = $postData['ant_last_name'];
                    $another_account_id_number = $postData['ant_unique_id'];
                    $another_account_email = $postData['ant_client_email'];
                    $another_account_phone = $postData['ant_client_phone'];   
                    $another_account_address = $postData['ant_client_add'];
                    $another_account_sum = $postData['ant_req_gur_amt'];
                    $another_account_gender = $postData['ant_client_gender'];
                    $another_account_dob = strtr($postData['antsec_date_of_birth'], '/', '-');
                    $another_account_dob = date("Y-m-d", strtotime($another_account_dob));
                    // $another_account_file = $postData['to_photo_id'];
                    $type_of_other_details = '1';

                    $another_startDate = strtr($postData['antstartDate'], '/', '-');
                    $another_startDate = date("Y-m-d", strtotime($another_startDate));
                    $another_endDate = strtr($postData['antendDate'], '/', '-');
                    $another_endDate = date("Y-m-d", strtotime($another_endDate));

                    $an_ts1 = strtotime($another_startDate);
                    $an_ts2 = strtotime($another_endDate);

                    $an_year1 = date('Y', $an_ts1);
                    $an_year2 = date('Y', $an_ts2);

                    $an_month1 = date('m', $an_ts1);
                    $an_month2 = date('m', $an_ts2);

                    $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);

                    $an_lease_period = $an_diff;

                    if (!empty($_FILES["file-2"]["name"])) {  

                        // $config = array();

                        // print_r($config['file_name']."sat"); echo "<br>";

                        $config['upload_path'] = './webservices/obli_profile_images/';

                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                        $config['overwrite'] = FALSE;

                        $config['max_size'] = '';

                        $config['min_width']  = '';

                        $config['min_height']  = '';

                        $config['max_width']  = '';

                        $config['max_height']  = '';

                        $file_extension1 = @end(explode(".", $_FILES["file-2"]["name"]));

                        $new_extension1 = strtolower($file_extension1);

                        $today1 = time();

                        $custom_name1 = "obli_" . $today1.rand(10,100);

                        $file_name1 = $custom_name1 . "." . $new_extension1;

                        $config['file_name'] = $file_name1;

                        $this->load->library('upload', $config);

                        // print_r($config['file_name']); echo "<br>";

                        if (!$this->upload->do_upload('file-2', $config)) {
                            
                        $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                       
                        
                        // $this->load->view('website/header');
                        // $this->load->view('website/tenant', $form_data);
                        // $this->load->view('website/footer', $data);
                        // return false;
                        }
                        $another_account_file = base_url().'webservices/obli_profile_images/'.$file_name1;
                        $ant_account_file = $another_account_file;
                        // $file_name1 = "";
                        // $custom_name = "";
                        // $config['file_name'] = "";
                        // $config = array();

                    }
                }
                else{

                    $client_another_account_status = "0";
                    $type_of_other_details = '2';
                    // another details (property details)
                    $another_account_address = $postData['apartment_add'];
                    $another_first_name = $postData['landlord'];
                    $another_account_id_number = $postData['landlord_id'];
                    $another_account_phone = $postData['property_phone'];
                    $another_account_email = $postData['sec_email'];
                    $another_account_dob = "";
                    $another_account_gender = "";
                    $another_account_sum = "";
                    $another_last_name = "";
                    $another_startDate = "";
                    $another_endDate = "";
                    
                    // $sec_StartDate = date('Y-m-d', strtotime($postData['sec_dateStartDate']));
                    // $sec_EndDate = $postData['sec_dateEndDate'];
                    // $sec_EndDate = date('Y-m-d', strtotime($sec_EndDate));

                    // echo $postData['sec_dateStartDate']."  ".$sec_StartDate."  "; echo $postData['sec_dateEndDate']."  "; echo $sec_EndDate."  ";

                    // $sec_ts1 = strtotime($sec_StartDate);
                    // $sec_ts2 = strtotime($sec_EndDate);

                    // $sec_year1 = date('Y', $sec_ts1);
                    // $sec_year2 = date('Y', $sec_ts2);

                    // $sec_month1 = date('m', $sec_ts1);
                    // $sec_month2 = date('m', $sec_ts2);

                    // $sec_diff = (($sec_year2 - $sec_year1) * 12) + ($sec_month2 - $sec_month1);

                    $an_lease_period = "1";

                // second file
                    if (!empty($_FILES["file-1"]["name"])) {

                        $config['upload_path'] = './webservices/obli_profile_images/';

                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                        $config['overwrite'] = FALSE;

                        $config['max_size'] = '';

                        $config['min_width']  = '';

                        $config['min_height']  = '';

                        $config['max_width']  = '';

                        $config['max_height']  = '';

                        $file_extension2 = @end(explode(".", $_FILES["file-1"]["name"]));

                        $new_extension2 = strtolower($file_extension2);

                        $today2 = time();

                        $custom_name2 = "obli_" . $today2.rand(10,100);

                        $file_name2 = $custom_name2 . "." . $new_extension2;

                        $config['file_name'] = $file_name2;

                        // print_r($config['file_name']); echo "<br>"; die();

                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('file-1', $config)) {
                            
                        $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                       
                        
                        // $this->load->view('website/header');
                        // $this->load->view('website/tenant', $form_data);
                        // $this->load->view('website/footer', $data);
                        // return false;
                        }
                        $order_file_name = base_url().'webservices/obli_profile_images/'.$file_name2;
                        $ant_account_file = $order_file_name;
                        // $data['slider_image'] = $file_name;
                        // $file_name2 = "";
                        // $custom_name = "";
                        // $config['file_name'] = "";
                        // $config = array();

                    }
                // end file

           
                // $property_phone = $postData['property_phone'];
                //["another_account_sum = $postData['fullname'];

                }
            }

        // user pdf and link generate (pdf details)
            $date = date("Y-m-d");
            $amount = $req_gur_amt;
            $name = $first_name." ".$last_name;
            $document_number_id = $unique_id;
            $address = $client_street.", ".$client_home_no.", ".$client_hometown;
            $no_of_months = $client_gur_month;
            $file_path = $file_path1;
            $document_id = "";
        

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
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    LI{
                        margin-right: -20px;
                    }
                    #pd{
                    margin-bottom:-10px;
                    }
                    #pd1{
                    margin-bottom:-15px;
                    }
                  

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; ">
            <img src="http://oblidev.malul.xyz/website_assets/img/logo.png" class="img-responsive" style="height: 40px; margin-left: 20px;">
            <img src="http://oblidev.malul.xyz/website_assets/img/gold.png" class="img-responsive" style="height: 40px; margin-right: 20px; margin-bottom: -10px;">
            </div>
            <DIV TYPE=HEADER>
                  <!--<P DIR="RTL" ALIGN=CENTER STYLE="margin-bottom: 0.47in; line-height: 100%">
                <FONT FACE="David"><SPAN LANG="he-IL">לוגו ופרטים של
                גולדן רוד</SPAN></FONT></P> -->
            </DIV>
            <!--<P DIR="LTR" CLASS="western" ALIGN=CENTER><FONT FACE="David"><SPAN LANG="he-IL"><U><FONT SIZE=4><B>כתב
            ערבות</B></FONT></U></SPAN></FONT></P>-->
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
            '.$date.'</P>
            <P DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.02in">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
            </B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$document_id.'</B></U></P>
            <OL>
                <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">אנו ערבים
                בזה כלפיך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                לתשלום כל סכום עד לסכום כולל של </SPAN></FONT><U>'.$amount.'</U><B>
                ₪ </B>(<FONT FACE="David"><SPAN LANG="he-IL">להלן</SPAN></FONT>:
                &quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>סכום הערבות</B></SPAN></FONT>&quot;)
                <FONT FACE="David"><SPAN LANG="he-IL">שתדרוש</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">תדרשו
                מ</SPAN></FONT>- <U><FONT FACE="David"><SPAN LANG="he-IL">'.$name.'</SPAN></FONT></U> (<FONT FACE="David"><SPAN LANG="he-IL">להלן
                וביחד</SPAN></FONT>: <B>&quot;</B><FONT FACE="David"><SPAN LANG="he-IL"><B>הנערב</B></SPAN></FONT><B>&quot;</B>)
                <FONT FACE="David"><SPAN LANG="he-IL">בקשר עם ההסכם מיום
                </SPAN></FONT> <U><FONT FACE="David"><SPAN LANG="he-IL">'.$address.'</SPAN></FONT></U>, <FONT FACE="David"><SPAN LANG="he-IL">על כל
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
            המדד שפורסם ביום </SPAN></FONT><U>'.$document_number_id.'</U> <FONT FACE="David"><SPAN LANG="he-IL">בגין
            חודש </SPAN></FONT><U>'.$no_of_months.'</U>.</P>
                <P DIR="RTL" STYLE="margin-left: 0.35in">&quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>המדד
            החדש</B></SPAN></FONT>&quot; <FONT FACE="David"><SPAN LANG="he-IL">לעניין
            ערבות זו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהא
            המדד שפורסם לאחרונה וקודם לקבלת דרישתכ  ם
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
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">לפי
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
                [<FONT FACE="David"><SPAN LANG="he-IL"><SPAN>דני</SPAN></SPAN></FONT><SPAN>,
                <FONT FACE="David"><SPAN LANG="he-IL">ערן – לדיון כיצד
                מודיעים על מימוש הערבות</SPAN></SPAN></FONT><SPAN>.
                <FONT FACE="David"><SPAN LANG="he-IL">האם אפשר להסתפק
                בשליחת מייל</SPAN></SPAN></FONT><SPAN>?
                <FONT FACE="David"><SPAN LANG="he-IL">החזרה של הערבות</SPAN></SPAN></FONT><SPAN>?</SPAN>]</P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
                תישאר בתוקפה עד ליום סיום ההסכם</SPAN></FONT>,
                <FONT FACE="David"><SPAN LANG="he-IL">ולאחר תאריך זה
                תהיה בטלה ומבוטלת</SPAN></FONT>. <FONT FACE="David"><SPAN LANG="he-IL">כל
                דרישה על פי ערבות זו צריכה להתקבל על
                ידינו בכתב ולא יאוחר מהתאריך הנ</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">ל</SPAN></FONT>.
                    </P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות
                זאת אינה ניתנת להעברה ו</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">או
                להסבה</SPAN></FONT>.</P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
                ניתנת למימוש לשיעורין</SPAN></FONT>.</P>
            </OL>
            <P DIR="RTL" ALIGN=LEFT STYLE="margin-left: 3.54in"><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</P>
            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">
                  <FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
            בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>
            <P DIR="LTR" CLASS="western"><img src="'.$file_path.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            </BODY>
            </HTML>';
           
            $location_url = 'doc_sign/userPdf/';

            $pdf_data = $this->pdf($html,$location_url);
            $final_pdf_path = $pdf_data['final_pdf_path'];
            $pdf_file = $pdf_data['pdf_file'];
            // echo "<pre>"; print_r($pdf_data)."<br>"; echo $final_pdf_path."<br>"; echo $pdf_file;
            // die();
            
            $property_owner_email = "satendra.tectum@gmail.com";
            $user_link = base_url()."business12/".base64_encode($pdf_file)."/".base64_encode($property_owner_email) ;
            $user_pdf = $final_pdf_path;
        // end

        // first document
            $html1 = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                 
                .check1{
                    position: absolute; 
                    width: 15px; 
                    height: 15px; 
                    right: 55px; 
                    top:390px; 
                    border: 1px solid #cccccc; 
                    border-radius: 3px; 
                    background-color: #428bca;
                    content: "\f00c" !important;
                }
                .check2{
                    position: absolute; 
                    width: 15px; 
                    height: 15px; 
                    right: 55px; 
                    top:500px; 
                    border: 1px solid #cccccc; 
                    border-radius: 3px; 
                    background-color: #428bca;
                    
                }
                    


                </STYLE>
                }
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
          
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני, החתום מטה, '.$first_name.' '. $last_name.' בעל ת.ז. מס  '.$unique_id.', מאשר ומצהיר כמפורט להלן:</SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">1. ידוע לי כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי בע"מ (ח.פ. 515024131 ) או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות.  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה כאמור. </SPAN></FONT></P>
        
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם </SPAN></FONT></P>
           

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> העמלה, לא יהוו עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. </SPAN></FONT></P>
            <BR>
                    <div class="check1"><span><img src="http://oblidev.malul.xyz/website_assets/img/Vector.png" class="img-responsive"  STYLE="padding-top:2px;"></span>
                    </div>
                                        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin: 0px 40px 0px 0px; font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%, ">
            <FONT FACE="David"><SPAN LANG="he-IL">אני מבין כי טריא אינה מאפשרת לקחת הלוואה עבור אחרים ואני מצהיר בזה כי אני מבקש לקבל הלוואה בעבור עצמי בלבד.  </SPAN></FONT></P>
             
            <P DIR="RTL" CLASS="western text_color" STYLE="margin: 0px 40px 0px 0px;  margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני מתחייב להודיע לטריא בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית.  </SPAN></FONT></P>
             <BR>
                 <div class="check2"><span  STYLE="color:white;"><span><img src="http://oblidev.malul.xyz/website_assets/img/Vector.png" class="img-responsive" STYLE="padding-top:2px;"></span>
                    </div>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin: 0px 40px 0px 0px; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 
צורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים במאגר. הפנייה ללשכת אשראי לצורך קבלת חיווי הינה בכל מקרה של בקשה לקבלת הלוואה באמצעות טריא. </SPAN></FONT></P>

          <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; ">
            <FONT FACE="David"><SPAN LANG="he-IL" > <B>שם הלקוח: </B>'.$first_name.' '. $last_name.' <B>חתימה דיגיטלית: </B></SPAN></FONT></P>

            <BR>

            <DIV CLASS="" style="text-align: center; ">

            
                                    
            <img src="'.$file_path1.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

             
            </BODY>
            </HTML>';

          
            $location_url1 = 'doc_sign/first_document/';

            $pdf_data1 = $this->pdf($html1,$location_url1);
            $first_document = $pdf_data1['final_pdf_path'];
            // $pdf_file = $pdf_data['pdf_file'];
        // end first

        // second document
            $date_signature = date('F d, Y');
            $html2 = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
         
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות  </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שנערך ונחתם ב'.$date_signature.' </SPAN></FONT></P>

             <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">בין      גולדנרוד  בע"מ ח.פ. 513578674 (להלן: "הערב")  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מרח יד חרוצים 12, תל אביב  </SPAN></FONT></P>
        
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לבין '.$name.' </SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$address.' </SPAN></FONT></P>
            <BR>
            <BR>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים 
            </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <B>'.$order_id_number.'</B> (להלן: "כתב הערבות"), </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">לטובת המוטב, על סך '.$amount.' ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א להסכם זה; </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב. </SPAN></FONT></P>
            <BR>
        

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן:  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%, ">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1. מבוא ונספחים </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.1. המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו.  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.2. כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.3. הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  </SPAN></FONT></P>
            
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2. ההתקשרות </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.1. במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> במבוא להסכם זה, לטובתו של המוטב, בו התחייבה להעביר לידי המוטב את סכום הערבות במקרה שבו יבקש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב לממש את כתב הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.2. במקרה של מימוש כתב הערבות ע"י המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>6 %</B> מסכום הערבות. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.3. במקרה של מימוש כתב הערבות ע"י המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 9%. ההלוואה תעמוד לתקופה של 18 חודשים. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הענקת ההלוואה כפופה לאישור חיתום הלקוח בטריא. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.4. במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לא יעמדו בבדיקת הלקוח אותה תבצע טריא. </SPAN></FONT></P>
            <BR>
             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. תקופת ההסכם  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3.1. הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות; </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4. מצגים </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלקוח מצהיר בזאת, כדלקמן:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.1. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים   </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.2. לא התקבלה החלטה על פירוקה מרצון ו/או לא התחיל הליך פירוק החברה מרצון, כמשמעותם בחוק ה חברות, תשנ"ט 1999- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.3. הוא אינו מוכר כחייב מוגבל באמצעים, כמשמעותו בסעיף 69ג לחוק ההוצאה לפועל, תשכ"ז.- ו/או  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> חייב המשתמט מתשלום חובו כמשמעותו בסעיף 66 א ....לחוק ...ואינו כלול במרשם החייבים המשתמטים </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> נשוא סעיף 66 ו לחוק... </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.4. הוא אינו מוכר כחייב אשר חשבונו הוגבל .......עפ"י סעיף 2 לחוק חוק שיקים ללא כיסוי, תשמ"א...-
ו/או אינו הוגדר כלקוח מוגבל חמור.בהתאם לסעיף 3 ... </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.5. ספרי הערב ישמשו כראייה לסכום חובו לחברה. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5. התחייבויות הלקוח </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.1. הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.2. הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ימים ממועד העברת סכום הערבות למוטב. </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.3. הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6. כללי </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.1. הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מסורה לבתי המשפט המוסמכים בתל אביב. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.2. אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף  </SPAN></FONT></P>
            
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.3. הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה. </SPAN></FONT></P>
            <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ולראיה באו הצדדים על החתום: </SPAN></FONT></P>
            <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$file_path2.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

             
            </BODY>
            </HTML>';

        
            $location_url2 = 'doc_sign/second_document/';

            $pdf_data2 = $this->pdf($html2,$location_url2);
            $second_document = $pdf_data2['final_pdf_path'];
        // end second

            $diff_data = array('diff' => $diff, 'an_diff' => $an_diff, 'sec_diff' => $sec_diff, 'client_file' => $client_first_file, 'another_account_file' => $another_account_file, 'order_file_name' => $order_file_name, 'file_path1' => $file_path1, 'file_path2' => $file_path2 );

        

            $client_account_type = "1";
            $order_name = "Rent guarantee";
            $deposit_status = "0";
            $order_type = "1";
            $approval_Status = '0';

            // client_account_type:1
            // order_name:Rent guarantee sat

            // deposit_status:0
            // order_type:1

            // echo $client_file."<br>"; echo $another_account_file."<br>"; echo $order_file_name; die();

            $fields = array('client_id_number' => $unique_id, 'client_first_name' => $first_name, 'client_last_name' => $last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_first_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status, 'guarantee_period_month' => $client_gur_month, 'requested_amount' => $req_gur_amt, 'first_signature_file' => $file_path1, 'second_signature_file' => $file_path2, 'ant_first_name' => $another_first_name, 'ant_last_name' => $another_last_name, 'ant_client_email' => $another_account_email, 'ant_unique_id' => $another_account_id_number, 'ant_client_file' => $ant_account_file, 'ant_client_phone' => $another_account_phone, 'ant_client_add' => $another_account_address, 'ant_client_gender' => $another_account_gender, 'ant_account_birth_date' => $another_account_dob, 'ant_req_gur_amt' => $another_account_sum, 'ant_lease_period' => $an_lease_period, 'user_pdf' => $user_pdf, 'user_link' => $user_link, 'first_document' => $first_document, 'second_document' => $second_document, 'guarantee_period_start_date' => $startDate, 'guarantee_period_end_date' => $endDate, 'another_guarantee_period_start_date' => $another_startDate, 'another_guarantee_period_end_date' => $another_endDate );

//            echo '<pre>'; 
//            print_r($fields); 
//            die();


            $url = 'https://obli-backend.herokuapp.com/webservices/client_details.php';

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);

            //execute post
            $result = curl_exec($ch);
            $err = curl_error($ch);
            //close connection
            curl_close($ch);

            if($err){
                // echo $err;
                $responsePostData = array('status'=>'false','msg'=>'Error in insertion!');
                echo json_encode($responsePostData);
            }
            else{
                // echo $result;
                $responsePostData = array('status'=>'true','msg'=>'Record added success fully');
                echo json_encode($responsePostData);
            }

            

            // $responsePostData = array('status'=>'true','msg'=>'Record added success fully', 'formData' => $postData, 'ddd' => $diff_data);
                // echo json_encode($responsePostData);
            
        }
        else {
            $responsePostData = array('status'=>'false','msg'=>'Something went wrong!');
            echo json_encode($responsePostData);
        }
        
    }


    function tenant()
    {
        if(!empty($_SESSION['error'])){
            unset($_SESSION['error']);
        }

        if(!empty($_SESSION['success'])){
            unset($_SESSION['success']);
        }
        
        
        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        if ($this->input->post()){ 

            // signature file generated
            define('UPLOAD_DIR', 'doc_sign/');
              $img = $_POST['base64_signature'];
              
              $img = str_replace('data:image/png;base64,', '', $img);
              $img = str_replace(' ', '+', $img);
              $data = base64_decode($img);

              $encoded_string = $img;
              $imgdata = base64_decode($encoded_string);
              $mimetype = $this->getImageMimeType($imgdata);
              // echo $imgdata; die();

              $file = UPLOAD_DIR . uniqid() . '.'.$mimetype;
              // echo $file; die();
              $success = file_put_contents($file, $data);

              $file_path = base_url().$file;

              // end

            // echo $file_path; die();

            $formdata = $this->input->post();
            unset($formdata['submit']);

            // client details
            $client_name = $formdata['fullname'];
            $client_id_number = $formdata['unique_id'];
            $client_email = $formdata['email'];
            $client_phone = $formdata['phone_number'];  
            $client_address = $formdata['current_residence'];
            $sum_amount = $formdata['guarantee_amount'];
            // $client_file = $formdata['photo_id'];

            if (isset($_FILES["photo_id"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["photo_id"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo_id', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('website/header');
                $this->load->view('website/tenant', $form_data);
                $this->load->view('website/footer', $data);
                return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 

            if (!empty($_FILES["landlord_photo_id"]["name"])) { 

                // print_r($config['file_name']."sat1"); echo "<br>";
                // echo "<pre>"; print_r($_FILES); echo "<br>";

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension2 = @end(explode(".", $_FILES["landlord_photo_id"]["name"]));

                $new_extension2 = strtolower($file_extension2);

                $today2 = time();

                $custom_name2 = "obli_" . $today2.rand(10,100);

                $file_name2 = $custom_name2 . "." . $new_extension2;

                $config['file_name'] = $file_name2;

                // print_r($config['file_name']); echo "<br>"; die();

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('landlord_photo_id', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
               
                
                $this->load->view('website/header');
                $this->load->view('website/tenant', $form_data);
                $this->load->view('website/footer', $data);
                return false;
                }
                $order_file_name = base_url().'webservices/obli_profile_images/'.$custom_name.'1.'.$new_extension;
                // $data['slider_image'] = $file_name;
                // $file_name2 = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

            }

            if(!empty($formdata['guarantee_amount'])){ 

                if($formdata['guarantee_amount'] > 25000){

                    $client_another_account_status = "1";

                    // another details
                    $another_account_name = $formdata['to_fullname'];
                    $another_account_id_number = $formdata['to_unique_id'];
                    $another_account_email = $formdata['to_email'];
                    $another_account_phone = $formdata['to_phone_number'];   
                    $another_account_address = $formdata['to_current_residence'];
                    $another_account_sum = $formdata['to_guarantee_amount'];
                    // $another_account_file = $formdata['to_photo_id'];

                    if (!empty($_FILES["to_photo_id"]["name"])) {  

                        // $config = array();

                        // print_r($config['file_name']."sat"); echo "<br>";

                        $config['upload_path'] = './webservices/obli_profile_images/';

                        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                        $config['overwrite'] = FALSE;

                        $config['max_size'] = '';

                        $config['min_width']  = '';

                        $config['min_height']  = '';

                        $config['max_width']  = '';

                        $config['max_height']  = '';

                        $file_extension1 = @end(explode(".", $_FILES["to_photo_id"]["name"]));

                        $new_extension1 = strtolower($file_extension1);

                        $today1 = time();

                        $custom_name1 = "obli_" . $today1.rand(10,100);

                        $file_name1 = $custom_name1 . "." . $new_extension1;

                        $config['file_name'] = $file_name1;

                        $this->load->library('upload', $config);

                        // print_r($config['file_name']); echo "<br>";

                        if (!$this->upload->do_upload('to_photo_id', $config)) {
                            
                        $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                       
                        
                        $this->load->view('website/header');
                        $this->load->view('website/tenant', $form_data);
                        $this->load->view('website/footer', $data);
                        return false;
                        }
                        $another_account_file = base_url().'webservices/obli_profile_images/'.$custom_name.'2.'.$new_extension;
                        // $file_name1 = "";
                        // $custom_name = "";
                        // $config['file_name'] = "";
                        // $config = array();

                    }
                }
                else{

                    $client_another_account_status = "0";
                    // another details
                    $another_account_name = "";
                    $another_account_id_number = "";
                    $another_account_email = "";
                    $another_account_phone = "";   
                    $another_account_address = "";
                    $another_account_sum = "";
                    $another_account_file = "";
                }
            }

            // property details
            $property_owner_name = $formdata['landlord'];
            $property_owner_id = $formdata['landlord_id'];
            $property_owner_email = $formdata['landlord_email'];
            $lease_period = $formdata['lease_period'];
            $order_address = $formdata['apartment_add'];
            // $property_phone = $formdata['property_phone'];
            //["another_account_sum = $formdata['fullname'];

            $client_account_type = "1";
            $order_name = "Rent guarantee";
            $deposit_status = "0";
            $order_type = "1";

            // client_account_type:1
            // order_name:Rent guarantee sat

            // deposit_status:0
            // order_type:1

            

            // echo $client_file."<br>"; echo $another_account_file."<br>"; echo $order_file_name; die();

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://obli-backend.herokuapp.com/webservices/client_details.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_id_number\"\r\n\r\n".$client_id_number."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_name\"\r\n\r\n".$client_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_email\"\r\n\r\n".$client_email."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_phone\"\r\n\r\n".$client_phone."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_address\"\r\n\r\n".$client_address."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_file\"\r\n\r\n".$client_file."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_account_type\"\r\n\r\n".$client_account_type."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sum_amount\"\r\n\r\n".$sum_amount."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"client_another_account_status\"\r\n\r\n".$client_another_account_status."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"order_name\"\r\n\r\n".$order_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_address\"\r\n\r\n".$order_address."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"order_file_name\"\r\n\r\n".$order_file_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"deposit_status\"\r\n\r\n".$deposit_status."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"order_type\"\r\n\r\n".$order_type."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_owner_name\"\r\n\r\n".$property_owner_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_owner_id\"\r\n\r\n".$property_owner_id."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"property_owner_email\"\r\n\r\n".$property_owner_email."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_id_number\"\r\n\r\n".$another_account_id_number."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_name\"\r\n\r\n".$another_account_name."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_phone\"\r\n\r\n".$another_account_phone."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"lease_period\"\r\n\r\n".$lease_period."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_email\"\r\n\r\n".$another_account_email."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_address\"\r\n\r\n".$another_account_address."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_file\"\r\n\r\n".$another_account_file."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"another_account_sum\"\r\n\r\n".$another_account_sum."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
              CURLOPT_HTTPHEADER => array(
                "Postman-Token: d80b3b60-4c77-4934-8e84-7fce9782923a",
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              // echo "cURL Error #:" . $err;
                $this->session->set_flashdata('error', 'שגיאה בהכנסה');
                
                $this->load->view('website/header');
                $this->load->view('website/tenant');
                $this->load->view('website/footer', $data);
            } else {
              // echo $response;
                // $this->session->set_flashdata('success', 'פרטים נשמרו בהצלחה.');
                // $this->payment_page($client_id_number, $sum_amount);

                // payment webservices
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://oblidev.malul.xyz/webservices/payment.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "",
                  CURLOPT_HTTPHEADER => array(
                    "Postman-Token: fa746230-d2fb-4688-be17-f8c3b08acae8",
                    "cache-control: no-cache"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  echo $response;
                }
            }

            

        }
        else {
            $this->load->view('website/header');
            $this->load->view('website/tenant');
            $this->load->view('website/footer', $data);
        }
        
        // $this->load->view('website/header');
        // $this->load->view('website/tenant');
        // $this->load->view('website/footer', $data);
    }

    function business_Form1(){
//        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
           // echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business1' => $data
            );

            $this->session->set_userdata($newdata);
//            echo 'hello';
           // print_r($this->session->userdata()); die();
            redirect('business2');
        }else{
            
            $session_array = array('business1', 'business2', 'business3', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
            $this->session->unset_userdata($session_array);
            
            $this->session->sess_destroy();
        
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_1_scr');
            $this->load->view('website/footer', $data);
        }
        
    }

    function business_Form2(){

        //        $this->session->sess_destroy();
        $data = $this->input->post();
        if(!empty($data)){
           // echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business2' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            $business1 = $this->session->userdata('business1');
            $business2 = $this->session->userdata('business2');
//            echo 'hello';
//            
           // print_r($this->session->userdata());
            // print_r($business1); print_r($business2);
           // die();

            if(!empty($business1) && !empty($business2)){
                
                // business 1/2 case
                if($business1['guarantee_type'] == 'ספקים ערבות לאשראי' && $business2['preferred_route'] == "מסלול ללא פיקדון" )
                {
                    redirect('business3');
                }
                // business 1/1 case
                elseif($business1['guarantee_type'] == 'ספקים ערבות לאשראי' && $business2['preferred_route'] == "מסלול ללא עמלה" )
                {
                    redirect('businessSec1');
                }
                // business 2/2 case
                elseif($business1['guarantee_type'] == "ערבות לשכר דירה" && $business2['preferred_route'] == "מסלול ללא פיקדון" )
                {
                    redirect('businessThird1');
                }
                // business 2/1 case
                elseif($business1['guarantee_type'] == "ערבות לשכר דירה" && $business2['preferred_route'] == "מסלול ללא עמלה" )
                {
                    redirect('businessFourth1');
                }
                else{
//                    redirect('business3');
                }
            }
            else{
                redirect('business1');
            }

            
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_2_scr');
            $this->load->view('website/footer', $data);
        }
    }

    function business_Form3(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            // first file
            if(isset($_FILES["file-2"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["file-2"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-2', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                // $this->load->view('website/header');
                // $this->load->view('website/tenant', $form_data);
                // $this->load->view('website/footer', $data);
                // return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                $data['user_first_file'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end
            $newdata = array(
                'business3' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
            
            /* API : Start */
            $business1 = $this->session->userdata('business1');
            $guarantee_type = $business1['guarantee_type'];
            
            $business2 = $this->session->userdata('business2');
            $preferred_route = $business2['preferred_route'];
            
            $business3 = $this->session->userdata('business3');
            $first_name = $business3['first_name'];
            $last_name = $business3['last_name'];
            $unique_id = $business3['unique_id'];
            $client_hometown = $business3['hometown'];
            $client_street = $business3['street'];
            $client_home_no = $business3['home_no'];
            $client_phone = $business3['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $business3['client_email'];
            $client_gender = $business3['client_gender'];
            $client_date_of_birth = strtr($business3['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $client_first_file = $business3['user_first_file'];
            
            $client_account_type = 1;
            $client_another_account_status = 0;
            
            $fields = array('client_id_number' => $unique_id, 'client_first_name' => $first_name, 'client_last_name' => $last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_first_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status );

//            echo '<pre>'; 
//            print_r($fields); 
//            die();


            $url = 'https://obli-backend.herokuapp.com/webservices/businessThirdClientDetails.php';

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);
            $err = curl_error($ch);
            //close connection
            curl_close($ch);

            if($err){
                // echo $err;
                //$session_array = array('business3');
               // $this->session->unset_userdata($session_array);
                echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('business3')."'; </script>";
                return FALSE;
//                redirect('businessThird1');
//                $responsePostData = array('status'=>'false','msg'=>'Error in order insertion!');
//                echo json_encode($responsePostData);
            }
            else{
//                print_r($result); die();
//                echo 1; die();
                 $clientData = json_decode($result);
//                 print_r($clientData);echo "<br>"; 
//                 print_r($clientData->client_reponse_data[1]->_hc_lastop); 
//                 die();
                 
                 if(!empty($clientData)){
                     if($clientData->status == "true"){
                         if(@$clientData->client_reponse_data[1]->_hc_lastop == "FAILED"){
                            
                          //  $session_array = array('business3');
                          //  $this->session->unset_userdata($session_array);
                            echo "<script type='text/javascript'>alert('Your record is rejected, Please try again!'); window.location.href = '".site_url('business3')."'; </script>";
//                            redirect('business1');
                            return FALSE;
                             
                        }else{
                             
//                           $session_array = array('businessThird1');
//                           $this->session->unset_userdata($session_array);

//                             alert('Your record successfully saved!');
                            $this->session->set_userdata('order_id_number', @$clientData->client_reponse_data[1]->order_id_number);
                            echo "<script type='text/javascript'>window.location.href = '".site_url('business4')."';</script>";
                            return FALSE;

//                            redirect('businessThird2');
                         }
                         
                     }
                     else{
                         
                      //  $session_array = array('business3');
                       // $this->session->unset_userdata($session_array);
                        echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('business3')."'; </script>";
                        return FALSE;
                        
//                         redirect('businessThird1');
                     }
                 }
//                 print_r($orderData->status);
//                 print_r($orderData); die();
                 
            }

            /* API : End */
            
//            print_r($this->session->userdata());die();
//            redirect('business4');
        }else{
        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        $this->load->view('website/header');
        $this->load->view('website/business_3_scr');
        $this->load->view('website/footer', $data);
        }
    }

    function business_Form4(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business4' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('business5');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_4_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_Form5(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business5' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            
            $business4 = $this->session->userdata('business4');
            
            if(!empty($business4)){
                $business_type = $business4['business_type'];
                
                if($this->input->post('value_check') == 1 ){
                    redirect('business6');
                }else{
                    redirect('business7');
                }
            }
            else{
                redirect('business1');
            }
            
            
            
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_5_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_Form6(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
           // print_r($data); print_r($_FILES); die();

            // second file
            if(isset($_FILES["file-2"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["file-2"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-2', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                // $this->load->view('website/header');
                // $this->load->view('website/tenant', $form_data);
                // $this->load->view('website/footer', $data);
                // return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                $data['another_user_file'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end

            $newdata = array(
                'business6' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();

            redirect('business7');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_6_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_Form7(){
//        echo "<pre>";
//        print_r($this->session->userdata());die();
        $form_data = array();
        // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $footer_data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $footer_data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $footer_data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $footer_data['logo_details'] = $this->project_model->get_query_result($sql6);
        // end footer

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
            // print_r($data); print_r($_FILES); die();
           
            // second file
            if(isset($_FILES["file-2"]["name"])) {

                $config['upload_path'] = './webservices/obli_profile_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["file-2"]["name"]));

                $new_extension = strtolower($file_extension);

                $today = time();

                $custom_name = "obli_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('file-2', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                // $this->load->view('website/header');
                // $this->load->view('website/tenant', $form_data);
                // $this->load->view('website/footer', $data);
                // return false;
                }
                $client_file = base_url().'webservices/obli_profile_images/'.$file_name;

                $data['gr_company_file'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";

                // $file_name = "";
                // $custom_name = "";
                // $config['file_name'] = "";
                // $config = array();

                // echo base_url().'/'.$client_file; die();

            } 
            // end

            $newdata = array(
                'business7' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            
            $company_name = $this->input->post('company_name');
            $cmp = explode("_", $company_name);
//            print_r($cmp[1]); die();
            
            if(!empty($cmp)){
                if(@$cmp[1] == 1){
                    $agent_id = $this->input->post('agent_id'); 
                    
                    if(!empty($this->input->post('main_company_contact_id'))){
                        $main_cmp_id = $this->input->post('main_company_contact_id');
                    }
                    else{
                        $main_cmp_id = 0;
                    }
                     
//                    $ch = array('company_id' => $this->input->post('agent_id'));
                    
                    $sql = "SELECT * FROM company_forms where FIND_IN_SET('".$agent_id."', company_id) AND id = '".$main_cmp_id."' ";
                    $rec = $this->project_model->get_query_result($sql);
//                    $rec = $this->project_model->get_data_where_condition('company_forms', $ch);
//                    echo "<pre>";
//                    print_r($sql); 
//                    die();

                    if(empty($rec)){
                        $form_data['bus7_param'] = $this->input->post();
                        $form_data['error'] =  "זיהוי איש הקשר אינו חוקי , אנא בדוק!";

                        $this->load->view('website/header');
                        $this->load->view('website/business_7_scr', $form_data);
                        $this->load->view('website/footer', $footer_data);
//                        redirect('business7');
                        return false;  
//                        die();
                    }else{
                        redirect('business8');
                    }
                }
                elseif(@$cmp[1] == 2){
                    redirect('business8');
                }
                else{
                    redirect('business8');
                }
            }
            
        }else{
//            echo 12; die();
            $this->load->view('website/header');
            $this->load->view('website/business_7_scr', $form_data);
            $this->load->view('website/footer', $footer_data);
        }
    }
    
    function business_Form8(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business8' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
            
            $business4 = $this->session->userdata('business4');
            
            if(!empty($business4)){
                $business_type = $business4['business_type'];
                
                if($business_type == 'חברה בע”מ'){
                    redirect('business10');
                }
                else{
                    $this->businessFirstAllFormSubmit();
//                    redirect('business9');
                }
            }
            else{
                redirect('business1');
            }
                    
//            
//            print_r($this->session->userdata());die();
//            redirect('business9');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_8_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_Form9(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business9' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            
            if(!empty($data['noneLtdCase'])){
                $paymentPageCase = $data['noneLtdCase'];
            
                if($paymentPageCase == 2){
                    redirect('business11');
                }
                else{
                    $this->session->unset_userdata('businessFirst_payment_api_link');
                    redirect('website');
                }
            }
            else{
                $this->session->unset_userdata('businessFirst_payment_api_link');
                redirect('website');
            }
            
//            redirect('business10');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_9_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function business_Form10(){

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
           // print_r($data);

//            print_r($_FILES); die();

           // first file
            if(isset($_FILES["b10_first_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_first_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bfirst1_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_first_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_articles_of_association'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // first end

            // second file
            if(isset($_FILES["b10_second_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_second_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bfirst2_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_second_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_certificate'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // second end

            // third file
            if(isset($_FILES["b10_third_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_third_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bfirst3_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_third_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_exemption_withholding_tax'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // third end

            // fourth file
            if(isset($_FILES["b10_fourth_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_fourth_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bfirst4_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_fourth_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_bookkeeping_authorization'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // fourth end

            // fifth file
            if(isset($_FILES["b10_fifth_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_fifth_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bfirst5_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_fifth_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_oval_attorney'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // fifth end
            
            // six file
            if(isset($_FILES["b10_sixth_file"]["name"])) {

                $config['upload_path'] = './uploads/business_images/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';

                $config['overwrite'] = FALSE;

                $config['max_size'] = '';

                $config['min_width']  = '';

                $config['min_height']  = '';

                $config['max_width']  = '';

                $config['max_height']  = '';

                $file_extension = @end(explode(".", $_FILES["b10_sixth_file"]["name"]));

                $new_extension = strtolower($file_extension);

                // $today = time();
                $today = (int) (microtime(true) * 1000000000000);

                $custom_name = "bfirst6_" . $today.rand(10,100);

                $file_name = $custom_name . "." . $new_extension;

                $config['file_name'] = $file_name;

                // print_r($config['file_name']); echo "<br>";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('b10_sixth_file', $config)) {
                    
                $form_data['error'] = 'Supported Media Type - gif, jpg, png, jpeg.';
                
                }

                $client_file = base_url().'uploads/business_images/'.$file_name;

                $data['gurantee_direct_debit_authorization'] = $client_file;

                // echo "<pre>"; print_r($_FILES); echo "<br>";
               
            } 
            // six end

            $newdata = array(
                'business10' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
//            redirect('business11');
            $this->businessFirstAllFormSubmit();
            
        }else{

            $business4 = $this->session->userdata('business4');

            if(!empty($business4)){

                $business_type = $business4['business_type'];

                if(!empty($business_type)){
                    if($business_type == 'חברה בע”מ'){

                        // footer records
                        $sql3 = "SELECT * FROM menu_section where status = 1";
                        $data['menu_details'] = $this->project_model->get_query_result($sql3);

                        $sql4 = "SELECT * FROM icons_section where status = 1";
                        $data['icons_details'] = $this->project_model->get_query_result($sql4);

                        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
                        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

                        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
                        $data['logo_details'] = $this->project_model->get_query_result($sql6);

                        $this->load->view('website/header');
                        $this->load->view('website/business_10_scr');
                        $this->load->view('website/footer', $data);

                    }else{
                        redirect('business11');
                    }
                }
                else{
                    redirect('business11');
                }

            }
            else{

            }
            
        }
    }
    
    function business_Form11(){

        
        $data = $this->input->post();
        if(!empty($data)){
//             echo '<pre>';
//            print_r($data);
//            $newdata = array(
//                'business11' => $data
//            );
           // print_r($this->session->userdata('business4'));
            // $this->session->set_userdata($newdata);
//            echo 'hello';
           
            if(!empty($data['noneLtdCase'])){
                $paymentPageCase = $data['noneLtdCase'];
            
                if($paymentPageCase == 2){
                    redirect('business11');
                }
                else{
//                    $this->session->unset_userdata('businessFirst_payment_api_link');
                    $this->session->sess_destroy();
                    redirect('website');
                }
            }
            else{
//                $this->session->unset_userdata('businessFirst_payment_api_link');
                $this->session->sess_destroy();
                redirect('website');
            }
            
            
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_11_scr');
            $this->load->view('website/footer', $data);
        }
    }
    
    function businessFirstBadResponse(){
        
        
//            echo "<pre>";        print_r($data); die;
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_first_bad_response',$data);
            $this->load->view('website/footer', $data);
        
        
    }
    
    function businessFirstAllFormSubmit(){

       
//             echo '<pre>';
//            print_r($data);

   
//             print_r($this->session->userdata());
//             die();
            $business1 = $this->session->userdata('business1');
            $guarantee_type = $business1['guarantee_type'];
            
            $business2 = $this->session->userdata('business2');
            $preferred_route = $business2['preferred_route'];
            
            $business3 = $this->session->userdata('business3');
            $first_name = $business3['first_name'];
            $last_name = $business3['last_name'];
            $unique_id = $business3['unique_id'];
            $hometown = $business3['hometown'];
            $street = $business3['street'];
            $home_no = $business3['home_no'];
            $client_phone = $business3['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);
            $client_email = $business3['client_email'];
            $client_gender = $business3['client_gender'];
            $client_date_of_birth = $business3['client_date_of_birth'];
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            $user_first_file = $business3['user_first_file'];

            // order id number
            $order_id_number = $this->session->userdata('order_id_number');
            
            $business4 = $this->session->userdata('business4');
            $company_name = $business4['company_name'];
            $business_type = $business4['business_type'];
            $company_id = $business4['company_id'];
            $company_address = $business4['company_address'];
            $contact_person_name = $business4['contact_person_name'];
            $contact_person_email = $business4['contact_person_email'];
            $contact_person_phone = $business4['contact_person_phone'];
            $contact_person_phone = str_replace(["-"], '', $contact_person_phone);
            
            $business5 = $this->session->userdata('business5');
            $first_base64_signature = $business5['first_base64_signature'];
            $second_base64_signature = $business5['second_base64_signature'];
            $third_base64_sign = $business5['third_base64_signature'];
            $req_gur_amt = $business5['req_gur_amt'];
            $gur_period_month = $business5['gur_period_month'];
            $startDate = $business5['startDate'];
            $endDate = $business5['endDate'];
            $checkbox2 = $business5['checkbox2'];
            $checkbox1 = $business5['checkbox1'];
            $btn3_checkbox = $business5['btn3_checkbox'];
            $value_check = $business5['value_check'];
            
            $business6 = $this->session->userdata('business6');
//            print_r($business6); 
            $ant_first_name = $business6['ant_first_name'];
            $ant_last_name = $business6['ant_last_name'];
            $ant_unique_id = $business6['ant_unique_id'];
            $ant_client_add = $business6['ant_client_add'];
            $ant_client_phone = $business6['ant_client_phone'];
            $ant_client_phone = str_replace(["-"], '', $ant_client_phone);
            $ant_client_email = $business6['ant_client_email'];
            $ant_client_gender = $business6['ant_client_gender'];
            $antsec_date_of_birth = strtr($business6['antsec_date_of_birth'], '/', '-');
            $antsec_date_of_birth = date('Y-m-d', strtotime($antsec_date_of_birth));
            $ant_req_gur_amt = $business6['ant_req_gur_amt'];
            $ant_gur_period_month = $business6['ant_gur_period_month'];
            
            $antstartDate = strtr($business6['antstartDate'], '/', '-');
            $antstartDate = date('Y-m-d', strtotime($antstartDate));
            
            $antendDate = strtr($business6['antendDate'], '/', '-');
            $antendDate = date('Y-m-d', strtotime($antendDate));
            
            $another_user_file = $business6['another_user_file'];
            
            $payment_api_link = $this->session->userdata('businessFirst_payment_api_link');
            
            $business7 = $this->session->userdata('business7');
            $b7_company_name = $business7['company_name'];
            $b7_company_address = $business7['company_address'];
            // $gur_period_date_range = $business7['gur_period_date_range'] ;
            // $cmpStartDate = $business7['cmpStartDate'] ;
            // $cmpSndDate = $business7['cmpSndDate'] ;
            $company_telephone = $business7['company_telephone'];
            $company_telephone = str_replace(["-"], '', $company_telephone);
            $company_email = $business7['company_email'];
            $gr_company_file = $business7['gr_company_file'];
            $b7_company_id = $business7['company_id'];
            $b7_contact_id = $business7['agent_id'];
            $b7_other_company_name = $business7['other_company_name'];

            $business10 = $this->session->userdata('business10');
            $gurantee_articles_of_association = $business10['gurantee_articles_of_association'];
            $gurantee_certificate = $business10['gurantee_certificate'];
            $gurantee_exemption_withholding_tax = $business10['gurantee_exemption_withholding_tax'];
            $gurantee_bookkeeping_authorization = $business10['gurantee_bookkeeping_authorization'];
            $gurantee_oval_attorney = $business10['gurantee_oval_attorney'];
            $gurantee_direct_debit_authorization = $business10['gurantee_direct_debit_authorization'];

            // first signature image start
            define('UPLOAD_DIR', 'doc_sign/');
              $img1 = $first_base64_signature;
              
              $img1 = str_replace('data:image/png;base64,', '', $img1);
              $img1 = str_replace(' ', '+', $img1);
              $data1 = base64_decode($img1);

              $encoded_string1 = $img1;
              $imgdata1 = base64_decode($encoded_string1);
              $mimetype1 = $this->getImageMimeType($imgdata1);
              // echo $imgdata; die();

              $file1 = UPLOAD_DIR . uniqid() . '.'.$mimetype1;
              // echo $file; die();
              $success1 = file_put_contents($file1, $data1);

              $first_signature_file = base_url().$file1;
              // $file_path1 = "222";

        // end


        // second signature image start
            define('UPLOAD_SECOND_DIR', 'doc_sign/');
              $img2 = $second_base64_signature;
              
              $img2 = str_replace('data:image/png;base64,', '', $img2);
              $img2 = str_replace(' ', '+', $img2);
              $data2 = base64_decode($img2);

              $encoded_string2 = $img2;
              $imgdata2 = base64_decode($encoded_string2);
              $mimetype2 = $this->getImageMimeType($imgdata2);
              // echo $imgdata2; die();

              $file2 = UPLOAD_SECOND_DIR . uniqid().rand() . '.'.$mimetype2;
              // echo $file; die();
              $success2 = file_put_contents($file2, $data2);

              $second_signature_file = base_url().$file2;
              // $file_path2 = "123";

        // end
              
        // third signature image start
            define('UPLOAD_THIRD_DIR', 'doc_sign/');
              $img3 = $third_base64_sign;
              
              $img3 = str_replace('data:image/png;base64,', '', $img3);
              $img3 = str_replace(' ', '+', $img3);
              $data3 = base64_decode($img3);

              $encoded_string3 = $img3;
              $imgdata3 = base64_decode($encoded_string3);
              $mimetype3 = $this->getImageMimeType($imgdata3);
              // echo $imgdata2; die();

              $file3 = UPLOAD_THIRD_DIR . uniqid().rand() . '.'.$mimetype3;
              // echo $file; die();
              $success3 = file_put_contents($file3, $data3);

              $third_signature_file = base_url().$file3;
              // $file_path2 = "123";

        // end

            // another lease period getting
            if(!empty($antstartDate) && !empty($antendDate)){

                $another_startDate = $antstartDate;
                $another_endDate = $antendDate;

                $an_ts1 = strtotime($another_startDate);
                $an_ts2 = strtotime($another_endDate);

                $an_year1 = date('Y', $an_ts1);
                $an_year2 = date('Y', $an_ts2);

                $an_month1 = date('m', $an_ts1);
                $an_month2 = date('m', $an_ts2);

                $an_diff = (($an_year2 - $an_year1) * 12) + ($an_month2 - $an_month1);

                $ant_lease_period = $an_diff;

            }
            else{
                $ant_lease_period = "";
            }
            // end

            // company gurantee lease period getting
            // $sec_ts1 = strtotime($cmpStartDate);
            // $sec_ts2 = strtotime($cmpSndDate);

            // $sec_year1 = date('Y', $sec_ts1);
            // $sec_year2 = date('Y', $sec_ts2);

            // $sec_month1 = date('m', $sec_ts1);
            // $sec_month2 = date('m', $sec_ts2);

            // $sec_diff = (($sec_year2 - $sec_year1) * 12) + ($sec_month2 - $sec_month1);

            // $gr_company_period_month = $sec_diff; // api check
            // end

            // gurantee lease period getting
            $sec_ts3 = strtotime($startDate);
            $sec_ts4 = strtotime($endDate);

            $sec_year3 = date('Y', $sec_ts3);
            $sec_year4 = date('Y', $sec_ts4);

            $sec_month3 = date('m', $sec_ts3);
            $sec_month4 = date('m', $sec_ts4);

            $sec_diff1 = (($sec_year4 - $sec_year3) * 12) + ($sec_month4 - $sec_month3);

            $gur_period_month = $sec_diff1; // api check
            // end

            // other details
            $client_account_type = 1;
            // $first_signature_file = "";
            // $second_signature_file = "";
            // $ant_lease_period = "";
            $ant_client_file = $another_user_file;
            // $gr_company_period_month = "";
            $gr_company_url = $gr_company_file;

            // check for empty data (another company details)
            // if(empty($ant_first_name) || empty($ant_last_name) || empty($ant_unique_id) || empty($ant_client_add) || empty($ant_client_phone) || empty($ant_client_gender) || empty($ant_req_gur_amt) || empty($ant_client_file) || empty($ant_lease_period)){

            //     $ant_first_name = $ant_last_name = $ant_client_add = $ant_client_file = "a";
            //     $ant_unique_id = $ant_client_phone = $ant_client_gender = $ant_req_gur_amt = $ant_lease_period = 1;
            // }

            // if($antsec_date_of_birth == "1970-01-01" ){
            //     $antsec_date_of_birth = "1970-01-01";
            // }

            // if(empty($ant_client_email)){
            //     $ant_client_email = "a@gmail.com";
            // }

            if(empty($ant_first_name) && empty($ant_last_name) && empty($ant_unique_id) && empty($ant_client_add) && empty($ant_client_phone) && empty($ant_client_gender) && empty($ant_req_gur_amt) && empty($ant_client_file)) {

                $client_another_account_status = 0;
            }
            else{
                $client_another_account_status = 1;
            }
            // end

        // user pdf and link generate (pdf details)
            $date = date("Y-m-d");
            $amount = $req_gur_amt;
            $name = $first_name." ".$last_name;
            $document_number_id = $unique_id;
            $address = $street.", ".$home_no.", ".$hometown;
            $no_of_months = $gur_period_month;
            $file_path = $first_signature_file;
            $document_id = "";

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
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    LI{
                        margin-right: -20px;
                    }
                    #pd{
                    margin-bottom:-10px;
                    }
                    #pd1{
                    margin-bottom:-15px;
                    }
                  

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; ">
            <img src="http://oblidev.malul.xyz/website_assets/img/logo.png" class="img-responsive" style="height: 40px; margin-left: 20px;">
            <img src="http://oblidev.malul.xyz/website_assets/img/gold.png" class="img-responsive" style="height: 40px; margin-right: 20px; margin-bottom: -10px;">
            </div>
            <DIV TYPE=HEADER>
                  <!--<P DIR="RTL" ALIGN=CENTER STYLE="margin-bottom: 0.47in; line-height: 100%">
                <FONT FACE="David"><SPAN LANG="he-IL">לוגו ופרטים של
                גולדן רוד</SPAN></FONT></P> -->
            </DIV>
            <!--<P DIR="LTR" CLASS="western" ALIGN=CENTER><FONT FACE="David"><SPAN LANG="he-IL"><U><FONT SIZE=4><B>כתב
            ערבות</B></FONT></U></SPAN></FONT></P>-->
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
            '.$date.'</P>
            <P DIR="RTL" CLASS="western" ALIGN=CENTER STYLE="margin-left: 0.02in">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>הנדון</B></SPAN></FONT><B>:
            </B><FONT FACE="David"><SPAN LANG="he-IL"><U><B>ערבות מס</B></U></SPAN></FONT><U><B> '.$document_id.'</B></U></P>
            <OL>
                <LI><P DIR="RTL"><FONT FACE="David"><SPAN LANG="he-IL">אנו ערבים
                בזה כלפיך</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">ם
                לתשלום כל סכום עד לסכום כולל של </SPAN></FONT><U>'.$amount.'</U><B>
                ₪ </B>(<FONT FACE="David"><SPAN LANG="he-IL">להלן</SPAN></FONT>:
                &quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>סכום הערבות</B></SPAN></FONT>&quot;)
                <FONT FACE="David"><SPAN LANG="he-IL">שתדרוש</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">תדרשו
                מ</SPAN></FONT>- <U><FONT FACE="David"><SPAN LANG="he-IL">'.$name.'</SPAN></FONT></U> (<FONT FACE="David"><SPAN LANG="he-IL">להלן
                וביחד</SPAN></FONT>: <B>&quot;</B><FONT FACE="David"><SPAN LANG="he-IL"><B>הנערב</B></SPAN></FONT><B>&quot;</B>)
                <FONT FACE="David"><SPAN LANG="he-IL">בקשר עם ההסכם מיום
                </SPAN></FONT> <U><FONT FACE="David"><SPAN LANG="he-IL">'.$address.'</SPAN></FONT></U>, <FONT FACE="David"><SPAN LANG="he-IL">על כל
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
            המדד שפורסם ביום </SPAN></FONT><U>'.$document_number_id.'</U> <FONT FACE="David"><SPAN LANG="he-IL">בגין
            חודש </SPAN></FONT><U>'.$no_of_months.'</U>.</P>
                <P DIR="RTL" STYLE="margin-left: 0.35in">&quot;<FONT FACE="David"><SPAN LANG="he-IL"><B>המדד
            החדש</B></SPAN></FONT>&quot; <FONT FACE="David"><SPAN LANG="he-IL">לעניין
            ערבות זו</SPAN></FONT>, <FONT FACE="David"><SPAN LANG="he-IL">יהא
            המדד שפורסם לאחרונה וקודם לקבלת דרישתכ  ם
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
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">לפי
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
                [<FONT FACE="David"><SPAN LANG="he-IL"><SPAN>דני</SPAN></SPAN></FONT><SPAN>,
                <FONT FACE="David"><SPAN LANG="he-IL">ערן – לדיון כיצד
                מודיעים על מימוש הערבות</SPAN></SPAN></FONT><SPAN>.
                <FONT FACE="David"><SPAN LANG="he-IL">האם אפשר להסתפק
                בשליחת מייל</SPAN></SPAN></FONT><SPAN>?
                <FONT FACE="David"><SPAN LANG="he-IL">החזרה של הערבות</SPAN></SPAN></FONT><SPAN>?</SPAN>]</P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
                תישאר בתוקפה עד ליום סיום ההסכם</SPAN></FONT>,
                <FONT FACE="David"><SPAN LANG="he-IL">ולאחר תאריך זה
                תהיה בטלה ומבוטלת</SPAN></FONT>. <FONT FACE="David"><SPAN LANG="he-IL">כל
                דרישה על פי ערבות זו צריכה להתקבל על
                ידינו בכתב ולא יאוחר מהתאריך הנ</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">ל</SPAN></FONT>.
                    </P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות
                זאת אינה ניתנת להעברה ו</SPAN></FONT>/<FONT FACE="David"><SPAN LANG="he-IL">או
                להסבה</SPAN></FONT>.</P>
                <LI><P DIR="RTL" id="pd"><FONT FACE="David"><SPAN LANG="he-IL">ערבות זו
                ניתנת למימוש לשיעורין</SPAN></FONT>.</P>
            </OL>
            <P DIR="RTL" ALIGN=LEFT STYLE="margin-left: 3.54in"><FONT FACE="David"><SPAN LANG="he-IL">בכבוד
            רב</SPAN></FONT>,</P>
            <P DIR="LTR" CLASS="western" STYLE="margin-left: 3.54in; text-indent: 4.39in">
                  <FONT FACE="David"><SPAN LANG="he-IL">גולדן</SPAN></FONT>-<FONT FACE="David"><SPAN LANG="he-IL">רוד
            בע</SPAN></FONT>&quot;<FONT FACE="David"><SPAN LANG="he-IL">מ</SPAN></FONT></P>
            <P DIR="LTR" CLASS="western"><img src="'.$file_path.'" width="200" height="" STYLE="margin:0 35%; color:red;">
            </P>
            </BODY>
            </HTML>';

           
            $location_url = 'doc_sign/userPdf/';

            $pdf_data = $this->pdf($html,$location_url);
            $final_pdf_path = $pdf_data['final_pdf_path'];
            $pdf_file = $pdf_data['pdf_file'];
            // echo "<pre>"; print_r($pdf_data)."<br>"; echo $final_pdf_path."<br>"; echo $pdf_file;
            // die();
            
            $property_owner_email = "satendra.tectum@gmail.com";
            $user_link = base_url()."business12/".base64_encode($pdf_file)."/".base64_encode($property_owner_email) ;
            $user_pdf = $final_pdf_path;
        // end

        // first document
            $html1 = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
         
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלוואה למימון עמלת ערבות לחברה</SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                 
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%"> 
            <FONT FACE="David"><SPAN LANG="he-IL"> אני, החתום מטה, '.$name.' בעל ת.ז. מס '.$document_number_id.' מאשר ומצהיר כמפורט להלן:</SPAN></FONT></P>

    
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">1. ידוע לי כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי בע"מ (ח.פ. 515024131 ) או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות.  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">  2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה כאמור.  </SPAN></FONT></P>
        
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. </SPAN></FONT></P>
            <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > שם החותם: '.$name.' חתימה דיגיטלית: </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$first_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>
 
             
            </BODY>
            </HTML>';

          
            $location_url1 = 'doc_sign/first_document/';

            $pdf_data1 = $this->pdf($html1,$location_url1);
            $first_document = $pdf_data1['final_pdf_path'];
            // $pdf_file = $pdf_data['pdf_file'];
        // end first

        // second document
            $date_signature = date('F d, Y');
            $html2 = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
                
                    @page { margin-left: 1.25in; margin-right: 1.25in; margin-top: 0.49in; margin-bottom: 1in }
                    P { margin-bottom: 0.08in; direction: RTL; line-height: 0.25in; text-align: justify; widows: 2; orphans: 2; margin-top: 0.08in;}
                    P.western { font-family: "Times New Roman", serif; font-size: 12pt; }
                    P.cjk { font-family: "Times New Roman"; font-size: 12pt; so-language: he-IL }
                    P.ctl { font-family: "David"; font-size: 12pt }
                    .text_color{
                        color: #323474
                    }

                  
                   

                </STYLE>
            </HEAD>
            <BODY LANG="en-US" DIR="RTL">
          
         
            <div style="text-align: center;border-bottom: 1px solid black; padding: 10px; margin-top: -150px;">
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center;">
            <FONT FACE="David"><SPAN LANG="he-IL">הסכם שיפוי חברה </SPAN></FONT></P>

            </div>
            <DIV TYPE=HEADER>
                  
            </DIV>
             <P DIR="RTL" CLASS="western"><A NAME="_GoBack"></A><BR><BR>
            </P>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שנערך ונחתם ב'.$date_signature.' </SPAN></FONT></P>

             <BR>
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">בין גולדנרוד בע"מ ח.פ. 513578674 (להלן: "הערב")  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מרח  יד חרוצים 12, תל אביב  </SPAN></FONT></P>
        
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לבין '.$name.' </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">'.$address.' </SPAN></FONT></P>
            <BR>
            <BR>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <B>'.$order_id_number.'</B> (להלן: "כתב הערבות"), </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL">לטובת המוטב, על סך '.$amount.' ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א להסכם זה; </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> והואיל וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב. </SPAN></FONT></P>
             <BR>
        

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן:  </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%, ">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1. מבוא ונספחים </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.1.  המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו (להלן: "ההסכם").   </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.2. כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 1.3. הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  </SPAN></FONT></P>
            
             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2. ההתקשרות </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.1. במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> במבוא להסכם זה, לטובתו של המוטב, בו התחייבה להעביר לידי המוטב את סכום הערבות במקרה שבו יבקש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> המוטב לממש את כתב הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.2. במקרה של מימוש כתב הערבות ע"י המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>6%</B> מסכום הערבות. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.3. במקרה של מימוש כתב הערבות ע"י המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 6%. ההלוואה תעמוד לתקופה של 18 חודשים. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הענקת ההלוואה כפופה לאישור חיתום הלקוח בטריא. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.4. במקרה של אי קיום התחייבויות הלקוחה מצדה כאמור בהסכם, הערב/ה ללקוחה (כמוגדר בנספח ב להסכם) מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם למוסכם תחת ס עיף זה.</SPAN></FONT></P>                      

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 2.5. במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לא יעמדו בבדיקת הלקוח אותה תבצע טריא. </SPAN></FONT></P>

            
            <BR>
             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3. תקופת ההסכם  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 3.1. הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות; </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4. מצגים </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> הלקוח מצהיר בזאת, כדלקמן:  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.1. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים   </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.2. לא התקבלה החלטה על פירוקה מרצון ו/או לא התחיל הליך פירוק החברה מרצון, כמשמעותם בחוק ה חברות, תשנ"ט 1999- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.3. לא מתקיימים לגביה הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי, ת שע"ח 2018- [נוסח מלא ומעודכן]. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 4.4. ספרי הערב ישמשו כראייה לסכום חובו לחברה. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5. התחייבויות הלקוח </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.1. הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.2. הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ימים ממועד העברת סכום הערבות למוטב. </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.3. הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 5.4. במקרה של אי קיום התחייבויות הלקוחה כאמור לעיל, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי ח וזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם לתנאים המוסכמים תחת סעיף זה.</SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="font-weight: bold; margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6. כללי </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.1. הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה  </SPAN></FONT></P>

              <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> מסורה לבתי המשפט המוסמכים בתל אביב. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.2. אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.</SPAN></FONT></P>
            

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> 6.3. הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם </SPAN></FONT></P>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה. </SPAN></FONT></P>


            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה) </SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.base_url().'website_assets/img/sign_1.png" class="img-responsive" style="margin-left: 20px;">

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית (הלקוחה)  </SPAN></FONT></P>
            <BR>
            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$second_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <BR>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>נספח ב </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> <B>שטר ערבות אישית בהתאם לסעיף 2 להסכם </B></SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"> אני הח"מ, מר/גברת: בוריס דוידוב ת.ז. 309224921 , מרח העצמאות 45 , תל אביב, (להלן: " לקוח" או "הח"מ") ערב/ה באופן אישי ובלתי חוזר ומאשר/ת בזה, כדלקמן:</SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>1.</B>ביום 01\12\2020 נכרת הסכם שיפוי (להלן: "ההסכם") בין חברה לקוח עסקי בע"מ, ח.פ 2538875 (להלן: \12\ 1. ביום 01 "הלקוח") לבין גולדנרוד בע"מ (להלן: "החברה"), במסגרתו התחייבה הלקוחה בסעיף 2, לשלם לחברה סכומים הנקובים בהסכם (להלן: "תשלום"), במקרה של מימוש כתב הערבות על ידי המוטב (כמוגדר בהסכם), ב התאם לתנאים המפורטים בסעיף 2 כאמור. </SPAN></FONT></P>
            
            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>2.</B>ככל שהלקוחה לא תקיים את התחייבותה כאמור בסעיף 2 להסכם, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום הלקוחה, כל תשלום שהלקוחה תידרש לשלם לחברה בהתאם למוסכם בין הצדדים ת חת ההסכם. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>3.</B>הערב/ה ללקוחה מתחייב/ת לשלם לחברה את התשלום כאמור, מיד עם דרישתה הראשונה של החברה ו ללא כל תנאי. </SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>4.</B>פירעון התשלום ייעשה מיד עם דרישת החברה בכתב ולא יאוחר משבעה (7) ימים מיום פניית המוטב ה חוקללו/או לחברה בדרישה לתשלום.</SPAN></FONT></P>

               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>5.</B>אני הח"מ מאשר/ת כי כל הרישומים בספרי הנהלת החשבונות של החברה לגבי התשלום לחברה, יחשבו נ כונים וישמשו הוכחה מכרעת כלפי וכלפי הלקוח.</SPAN></FONT></P>
               
               <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>6.</B>אני מתחייב/ת, כי אני בעל/ת עניין בלקוח (כמוגדר בחוק [ניירות ערך, תשכ"ח 1968- ]) ולא יראו בי ערב/ה מוגן/ת, ולא תחול עלי כל הגנה שהיא המפורטת בחוק הערבות, תשכ"ז 1967- או על פי כל דין וכי אני מוותר/ת ע ל כל תביעה ו/או טענה כלפי החברה.</SPAN></FONT></P>

             <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%">
            <FONT FACE="David"><SPAN LANG="he-IL"><B>7.</B>ידוע לי כי החברה תהא רשאית לצרף ערב/ים נוספים להתחייבות הלקוחה, אולם צירוף ערב/ים נוסף/ים לא י גרעו מתוקף התחייבויותיי כלפי הלקוחה.</SPAN></FONT></P>

            <BR><P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימת גולדנרוד (הערבה)</SPAN></FONT></P>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.base_url().'website_assets/img/sign_1.png" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>

            <P DIR="RTL" CLASS="western text_color" STYLE="margin-left: 0.02in; margin-bottom: 0in; line-height: 100%; text-align:center; font-weight: bold;">
            <FONT FACE="David"><SPAN LANG="he-IL" > חתימה דיגיטלית (הלקוחה)</SPAN></FONT></P>
            <BR>

            <DIV CLASS="" style="text-align: center; ">
                                    
            <img src="'.$third_signature_file.'" class="img-responsive" style="margin-left: 20px;">
                                      
            </DIV>
            
            </BODY>
            </HTML>';

        
            $location_url2 = 'doc_sign/second_document/';

            $pdf_data2 = $this->pdf($html2,$location_url2);
            $second_document = $pdf_data2['final_pdf_path'];
        // end second
           
            // echo "<pre>"; print_r($pdf_data); print_r($pdf_data1); print_r($pdf_data2);
            // echo $first_document."<br>"; echo $second_document."<br>";
            // die();

             $fields = array("client_id_number" => $unique_id, "guarantee_type" => $guarantee_type, "preferred_route" => $preferred_route, "client_first_name" => $first_name, "client_last_name" => $last_name, "guarantee_period_month" => $gur_period_month, "requested_amount" => $req_gur_amt, "first_signature_file" => $first_signature_file, "second_signature_file" => $second_signature_file, "amt_company_name" => $company_name, "amt_company_address" => $company_address, "amt_company_id" => $company_id, "amt_company_business_type" => $business_type, "amt_company_contact_person_email" => $contact_person_email, "amt_company_contact_person_name" => $contact_person_name, "amt_company_contact_person_phone" => $contact_person_phone, "ant_first_name" => $ant_first_name, "ant_last_name" => $ant_last_name, "ant_unique_id" => $ant_unique_id, "ant_client_email" => $ant_client_email, "ant_client_phone" => $ant_client_phone, "ant_client_add" => $ant_client_add, "ant_req_gur_amt" => $ant_req_gur_amt, "ant_client_gender" => $ant_client_gender, "ant_account_birth_date" => $antsec_date_of_birth, "ant_lease_period" => $ant_lease_period, "ant_client_file" => $ant_client_file, "gr_company_name" => $b7_company_name, "gr_company_address" => $b7_company_address, "gr_company_email" => $company_email, "user_pdf" => $user_pdf, "gr_company_phone" => $company_telephone, "gr_company_url" => $gr_company_url, "gurantee_articles_of_association" => $gurantee_articles_of_association, "gurantee_certificate" => $gurantee_certificate, "gurantee_exemption_withholding_tax" => $gurantee_exemption_withholding_tax, "gurantee_bookkeeping_authorization" => $gurantee_bookkeeping_authorization, "gurantee_oval_attorney" => $gurantee_oval_attorney, "user_link" => $user_link, "first_document" => $first_document, "second_document" => $second_document, "b7_company_id" => $b7_company_id, "b7_contact_id" => $b7_contact_id, "guarantee_period_start_date" => $startDate, "guarantee_period_end_date" => $endDate, "another_guarantee_period_start_date" => $antstartDate, "another_guarantee_period_end_date" => $antendDate, "gurantee_direct_debit_authorization" => $gurantee_direct_debit_authorization,"gr_other_company_name"=>$b7_other_company_name, 'order_id_number' => $order_id_number );

//             echo "<pre>"; print_r($fields); echo "<br><br><br>";
//             die();

            // api call
            $url = 'https://obli-backend.herokuapp.com/webservices/businessFirstOrderDetails.php';

            //open connection
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            

            //execute post
            $result = curl_exec($ch);
            $err = curl_error($ch);
            //close connection
            curl_close($ch);

//            if ($err) {
//              // echo "cURL Error #:" . $err; die();
//            } else {
////               echo $response; die();
//                $session_array = array('business1', 'business2', 'business3', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
//                $this->session->unset_userdata($session_array);
//
//                redirect('website');
//              // redirect('business12');
//            }
            
            if($err){
//                 echo $err;die();
                $session_array = array('business1', 'business2', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
                $this->session->unset_userdata($session_array);
                echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('business3')."'; </script>";
                return FALSE;
//                redirect('businessThird1');
//                $responsePostData = array('status'=>'false','msg'=>'Error in order insertion!');
//                echo json_encode($responsePostData);
            }
            else{
//                print_r($result); die();
//                echo 1; die();
                 $orderData = json_decode($result); 
//                 echo '<pre>';
//                 print_r($orderData);die();//echo "<br>"; 
//                 print_r($orderData->order_reponse_data->sfId); die();

                 if(!empty($orderData)){
                     if($orderData->status == "true"){
                         if(empty($orderData->order_reponse_data->sfId)){
                            
                            $session_array = array('business1', 'business2', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
                            $this->session->unset_userdata($session_array);
                            echo "<script type='text/javascript'>alert('Your record is rejected, Please try to fill all the forms again!'); window.location.href = '".site_url('business1')."'; </script>";
//                            redirect('business1');
                            return FALSE;
                             
                         }else{
                             
                           $business4 = $this->session->userdata('business4');

                            if(!empty($business4)){

                                $business_type = $business4['business_type'];

                                if(!empty($business_type)){
                                    if($business_type == 'חברה בע”מ'){
                                        
                                        $session_array = array('business1', 'business2', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
                                        $this->session->unset_userdata($session_array);

                                        echo "<script type='text/javascript'>alert('Your record successfully saved!');window.location.href = '".site_url('business11')."';</script>";
                                        return FALSE;

                                    }else{
                                        
                                        $session_array = array('business1', 'business2', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
                                        $this->session->unset_userdata($session_array);
                                        echo "<script type='text/javascript'>alert('Your record successfully saved!');window.location.href = '".site_url('businessFirstPaymentPage')."';</script>";
                                        return FALSE;
                                    }
                                }
                                else{
                                    
                                    $session_array = array('business1', 'business2', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
                                    $this->session->unset_userdata($session_array);
                                    redirect('business1');
                                }

                            }
                            else{
                                
                                $session_array = array('business1', 'business2', 'business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
                                $this->session->unset_userdata($session_array);
                                redirect('business1');
                            }

//                            redirect('business1');
                         }
                         
                     }
                     else{
                         
                         $session_array = array('business1', 'business2','business4', 'business5', 'business6', 'business7', 'business8', 'business9', 'business10', 'business11');
                        $this->session->unset_userdata($session_array);
                        echo "<script type='text/javascript'>alert('Error!'); window.location.href = '".site_url('business1')."'; </script>";
                        return FALSE;
                        
//                         redirect('businessThird1');
                     }
                 }
//                 print_r($orderData->status);
//                 print_r($orderData); die();
                 
            }
            
            // api end

    }
    
    function businessFirstPaymentPage(){
        
        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        $this->load->view('website/header');
        $this->load->view('website/business_9_scr');
        $this->load->view('website/footer', $data);
        
    }
    
    function business_Form12(){

        $pdf_url = $this->uri->segment(2);
        $email_url = $this->uri->segment(4);

        $pdf_url = base_url(). "doc_sign/userPdf/". base64_decode($pdf_url);
        // echo $pdf_url; die();
        $usr_data['user_data'] = array('pdf_url' => $pdf_url);

        $data = $this->input->post();
        if(!empty($data)){
//            echo '<pre>';
//            print_r($data);
            $newdata = array(
                'business12' => $data
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
//            echo 'hello';
//            
//            print_r($this->session->userdata());die();
            redirect('business13');
        }else{
            // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/business_12_scr', $usr_data);
            $this->load->view('website/footer', $data);
        }
    }

    // function submit_form_data1()
    // {
    //         $client_id_number = "01234544";
    //         $client_first_name = "Satendra";
    //         $client_last_name = "Shukla";
    //         $client_email = "satendra.tectum@gmail.com";
    //         $client_phone = "7894561230";
    //         $client_gender = "1";
    //         $client_hometown = "Indore";
    //         $client_street = "Nehru Nagar";
    //         $client_home_no = "8569";
    //         $client_file = "http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png";
    //         $client_date_of_birth = "2019-05-22";
    //         $client_account_type = "1";
    //         $client_another_account_status = "1";
    //         $guarantee_period_month = "6";
    //         $requested_amount = "2344556555";
    //         $first_signature_file = "1222";
    //         $second_signature_file = "1333";
    //         $ant_first_name = "qw1";
    //         $ant_last_name = "qw2";
    //         $ant_client_email = "qw@gmail.com";
    //         $ant_unique_id = "345678";
    //         $ant_client_file = "http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png";
    //         $ant_client_phone = "5236589325";
    //         $ant_client_add = "Indore";
    //         $ant_client_gender = "1";
    //         $ant_account_birth_date = "2019-09-19";
    //         $ant_req_gur_amt = "4000";
    //         $ant_lease_period = "550";
    //         // $approval_Status = '0';
    //         // $type_of_other_details = '1';

    //         /* API URL */
    //         $url = 'https://obli-backend.herokuapp.com/webservices/client_details.php';
       
    //         /* Init cURL resource */
    //         // $ch = curl_init($url);

 
    //         /* Array Parameter Data */
    //         // $data = ['name'=>'Hardik', 'email'=>'itsolutionstuff@gmail.com'];

    //         // $fields = array('client_id_number' => '01234544',
    //         //             'client_first_name' => 'Satendra',
    //         //             'client_last_name' => 'Shukla',
    //         //             'client_email' => 'satendra.tectum@gmail.com',
    //         //             'client_phone' => '7894561230',
    //         //             'client_gender' => '1',
    //         //             'client_hometown' => 'Indore',
    //         //             'client_street' => 'Nehru Nagar',
    //         //             'client_home_no' => '8569',
    //         //             'client_file' => 'http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png',
    //         //             'client_date_of_birth' => '2019-05-22',
    //         //             'client_account_type' => '1',
    //         //             'client_another_account_status' => '0',
    //         //             'guarantee_period_month' => '6',
    //         //             'requested_amount' => '234',
    //         //             'first_signature_file' => '1222',
    //         //             'second_signature_file' => '1333',
    //         //             'ant_first_name' => 'qw1',
    //         //             'ant_last_name' => 'qw2',
    //         //             'ant_client_email' => 'qw@gmail.com',
    //         //             'ant_unique_id' => '345678',
    //         //             'ant_client_file' => 'http://oblidev.malul.xyz/doc_sign/5d9611cb10b9c.png',
    //         //             'ant_client_phone' => '5236589325',
    //         //             'ant_client_add' => 'Indore',
    //         //             'ant_client_gender' => '1',
    //         //             'ant_account_birth_date' => '2019-09-19',
    //         //             'ant_req_gur_amt' => '4000',
    //         //             'ant_lease_period' => '550'
    //         //         );

    //         $fields = array('client_id_number' => $client_id_number, 'client_first_name' => $client_first_name, 'client_last_name' => $client_last_name, 'client_email' => $client_email, 'client_phone' => $client_phone, 'client_gender' => $client_gender, 'client_hometown' => $client_hometown, 'client_street' => $client_street, 'client_home_no' => $client_home_no, 'client_file' => $client_file, 'client_date_of_birth' => $client_date_of_birth, 'client_account_type' => $client_account_type, 'client_another_account_status' => $client_another_account_status, 'guarantee_period_month' => $guarantee_period_month, 'requested_amount' => $requested_amount, 'first_signature_file' => $first_signature_file, 'second_signature_file' => $second_signature_file, 'ant_first_name' => $ant_first_name, 'ant_last_name' => $ant_last_name, 'ant_client_email' => $ant_client_email, 'ant_unique_id' => $ant_unique_id, 'ant_client_file' => $ant_client_file, 'ant_client_phone' => $ant_client_phone, 'ant_client_add' => $ant_client_add, 'ant_client_gender' => $ant_client_gender, 'ant_account_birth_date' => $ant_account_birth_date, 'ant_req_gur_amt' => $ant_req_gur_amt, 'ant_lease_period' => $ant_lease_period);

    //         // echo "<pre>"; print_r($fields); die();
       
    //         //url-ify the data for the POST
    //         // foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    //         // rtrim($fields_string, '&');

    //         //open connection
    //         $ch = curl_init();

    //         //set the url, number of POST vars, POST data
    //         curl_setopt($ch,CURLOPT_URL, $url);
    //         curl_setopt($ch,CURLOPT_POST, true);
    //         curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);

    //         //execute post
    //         $result = curl_exec($ch);
    //         $err = curl_error($ch);
    //         //close connection
    //         curl_close($ch);

    //         if($err){
    //             echo $err;
    //         }
    //         else{
    //             echo $result;
    //         }

    // }
    
    function business_payment_api() {
        $postForm = $_POST;
        
        $postForm['req_gur_amt'] = str_replace(',', '', $postForm['req_gur_amt']);
        
// print_r($_POST);
// echo $amount = $_POST["req_gur_amt"];
            $amount = str_replace(',', '',$_POST["req_gur_amt"]);
            $amount = $amount*0.06;

            $startDate = strtr($_POST['startDate'], '/', '-');
            $startDate = date('Y-m-d', strtotime($startDate));
            
            $endDate = strtr($_POST['endDate'], '/', '-');
            $endDate = date('Y-m-d', strtotime($endDate));

            $ts1 = strtotime($startDate);
            $ts2 = strtotime($endDate);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = 12; //(($year2 - $year1) * 12) + ($month2 - $month1);
            $business3 = $this->session->userdata('business3');
            $first_name = $business3['first_name'];
            $last_name = $business3['last_name'];
            $TZId = $business3['unique_id'];
            $street = $business3['street'];
            $home_no = $business3['home_no'];
            $client_gender = $business3['client_gender'];
            
            if($client_gender == "זכר"){
                $client_gender = 1;
            }
            else{
                $client_gender = 2;
            }
                        
            $client_date_of_birth = strtr($business3['client_date_of_birth'], '/', '-');
            $client_date_of_birth = date('Y-m-d', strtotime($client_date_of_birth));
            
            $client_date_of_birth = explode('-', $client_date_of_birth);
            
            if(!empty($client_date_of_birth)){
                $client_year = $client_date_of_birth[0];
                $client_month = $client_date_of_birth[1];
                $client_day = $client_date_of_birth[2];
            }
            
            
            $client_phone = $business3['client_phone'];
            $client_phone = str_replace(["-"], '', $client_phone);

            $client_email = $business3['client_email'];
            //$client_date_of_birth = $business3['client_date_of_birth'];

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'business5' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);
            
            $api_data = array("OrgId" => 10069,"FirstName" => "$first_name","LastName" => "$last_name","TZ" => "$TZId","Cell" => "$client_phone","Email"=> "$client_email","Street" => "$street","HouseNum"=> "$home_no","City" => "תל אביב","Sex" => $client_gender,"Birthdate_y" => "$client_year","Birthdate_m" => "$client_month","Birthdate_d" => "$client_day","Amount" => $amount ,"Duration" => $diff,"Product" => "מימון הלוואה","OrderId" => "14XA24F","SuccessUrl" => "https://obli.co.il/business1PaymentSuccess","FailureUrl" => "https://obli.co.il/business1PaymentFailed","AutoApprove"=> 0);

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt_array($curl, array(
              CURLOPT_URL => $this->config->item('payment_url'),
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 5000,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "{\n\"OrgId\" : 10069,\n\"FirstName\" : \"$first_name\",\n\"LastName\" : \"$last_name\",\n\"TZ\" : \"$TZId\",\n\"Cell\" : \"$client_phone\",\n\"Email\": \"$client_email\",\n\"Street\" : \"$street\",\n\"HouseNum\": \"$home_no\",\n\"City\" : \"תל אביב\",\n\"Sex\" : $client_gender,\n\"Birthdate_y\" : \"$client_year\",\n\"Birthdate_m\" : \"$client_month\",\n\"Birthdate_d\" : \"$client_day\",\n\"Amount\" : $amount ,\n\"Duration\" : $diff,\n\"Product\" : \"מימון הלוואה\",\n\"OrderId\" : \"14XA24F\",\n\"SuccessUrl\" : \"https://obli.co.il/business1PaymentSuccess\",\n\"FailureUrl\" : \"https://obli.co.il/business1PaymentFailed\",\n\"AutoApprove\": 0\n}",
              CURLOPT_HTTPHEADER => array(
                
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Postman-Token: 1effd8b2-2187-4b3b-aee8-91ad39e85888,a2ab8682-a93b-4675-8537-3c04c68a8979",
                "cache-control: no-cache"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                
                // log error insert in table
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Business First', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'error_data' => $err, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
              // echo "cURL Error #:" . $err;
              //$responsePostData = array('status'=>'false','msg'=>'failed!');
                //echo json_encode($responsePostData);
                 
                 
              /* taraya failed
               * Another payment Gateway iframe url get
               * Payment Gateway : cardcomapi
               * Build By: Manikant
               */
                 
                $responsePostData = $this->cardcomapi($api_data);
                
                echo json_encode($responsePostData);
                
                 
               /*
                 End of cardcomapi
                */
                 
                
                 
            } else {
                
                // log error insert in table
                $log_data = array('tz_id' => $TZId, 'firstname' => $first_name, 'lastname' => $last_name, 'form_text' => 'Business First', 'payment_url' => $this->config->item('payment_url'), 'request_data' => json_encode($api_data), 'response_data' => $response, 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                // end 
                 
              $res = json_decode($response);
              
                if(!empty($res->iframe->mpiHostedPageUrl)){
                    $this->session->set_userdata(array(
                      'businessFirst_payment_api_link' => $res->iframe->mpiHostedPageUrl
                    ));
                   $responsePostData = array('status'=>'true', 'api_response' => $response, 'url_iframe' => $res->iframe->mpiHostedPageUrl );
                }
                else{
                    $responsePostData = $this->cardcomapi($api_data);
                }
                echo json_encode($responsePostData);
              
//              if(!empty($res->link)){
//                    // echo $res->link;
//                    $this->session->set_userdata(array(
//                      'businessFirst_payment_api_link' => $res->link
//                  ));
//                    // print_r($this->session->userdata('businessFirst_payment_api_link'));
//              }else{
//                  $fieldErrors = @$res->fieldErrors;
//                  if(!empty($fieldErrors)){
//                      $str = "";
//                      foreach ($fieldErrors as $key => $value) {
//                          $field = $value->field;
//                          $errorMessage = $value->errorMessage;
//                          $str .= "field : ".$field." and message : ".$errorMessage."\n";
//                      }
//                      $string = "\nTarya API Error: \n".$str;
//                  }
//              }
              
            } 
        // api end
    }
    
    function business_without_payment_api() {
        $postForm = $_POST;
        
        
        $postForm['req_gur_amt'] = str_replace(',', '', $postForm['req_gur_amt']);

            // print_r($this->session->userdata('business3'));
            // print_r($this->session->userdata('business4'));
            //die();
            $newdata = array(
                'business5' => $postForm
            );
//            print_r($this->session->userdata('business1'));
            $this->session->set_userdata($newdata);

            
    }
    
    function business1PaymentSuccess(){
        $data = array();
        if(!empty($_REQUEST)){
//        echo '<pre>';
//        print_r($_REQUEST);
            
            $data['success_data'] = json_encode($_REQUEST);
        } elseif(!empty($_GET)){
            $data['success_data'] = json_encode($_GET);
        }
        

        // $data['failed_data'] = json_encode($_REQUEST);
        
        if(!empty($data)){
            $this->project_model->insert_data('tarya_payment_api_response', $data);
        }
        
        redirect('business11');
    }
    
    function business1PaymentFailed(){
        $data = array();
        if(!empty($_REQUEST)){
//        echo '<pre>';
//        print_r($_REQUEST);
            $data['failed_data'] = json_encode($_REQUEST);
        } elseif(!empty($_GET)){
            $data['failed_data'] = json_encode($_GET);
        }
        

        // $data['failed_data'] = json_encode($_REQUEST);
        
        if(!empty($data)){
            $this->project_model->insert_data('tarya_payment_api_response', $data);
        }
        
        redirect('paymentBadResponse');
    }
    
    function paymentBadResponse(){
        
        //  echo "<pre>";        print_r($data); die;
        // footer records
        $sql3 = "SELECT * FROM menu_section where status = 1";
        $data['menu_details'] = $this->project_model->get_query_result($sql3);

        $sql4 = "SELECT * FROM icons_section where status = 1";
        $data['icons_details'] = $this->project_model->get_query_result($sql4);

        $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
        $data['application_url_details'] = $this->project_model->get_query_result($sql5);

        $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
        $data['logo_details'] = $this->project_model->get_query_result($sql6);

        $this->load->view('website/header');
        $this->load->view('website/businessThird/business_third_bad_response');
        $this->load->view('website/footer', $data);
        
    }
               
    
    function welcomeObli(){
        // footer records
            $sql3 = "SELECT * FROM menu_section where status = 1";
            $data['menu_details'] = $this->project_model->get_query_result($sql3);

            $sql4 = "SELECT * FROM icons_section where status = 1";
            $data['icons_details'] = $this->project_model->get_query_result($sql4);

            $sql5 = "SELECT * FROM application_url_section ORDER BY id DESC LIMIT 1";
            $data['application_url_details'] = $this->project_model->get_query_result($sql5);

            $sql6 = "SELECT * FROM banner INNER JOIN logo_image ON banner.id = logo_image.banner_id ORDER BY banner.id ";
            $data['logo_details'] = $this->project_model->get_query_result($sql6);

            $this->load->view('website/header');
            $this->load->view('website/welcome_obli');
            $this->load->view('website/footer', $data);
}
 
function cardcomapi($apiData)
{
        # Global Definetions :
    $TerminalNumber = 101575; # Company terminal 
    $UserName = 'PjNKpEQqtNCbC2G9NmeL';   # API User
    $CreateInvoice = false;  # to Create Invoice (Need permissions to create invoice )
    $IsIframe = true;   # Iframe or Redirect 
    $Operation = 1;  # = 1 - Bill Only , 2- Bill And Create Token , 3 - Token Only , 4 - Suspended Deal (Order).


    #Create Post Information
    // Account vars
    $vars =  array();
    $vars['TerminalNumber'] = $TerminalNumber;
    $vars['UserName'] = $UserName;
    $vars["APILevel"] = "10"; // req
    $vars['codepage'] = '65001'; // unicode
    $vars["Operation"] = $Operation;

    $vars["Language"] =  'he';   // page languge he- hebrew , en - english , ru , ar
    $vars["CoinID"] = '1'; // billing coin , 1- NIS , 2- USD other , article :  http://kb.cardcom.co.il/article/AA-00247/0
    $vars["SumToBill"] = $apiData['Amount'];// Sum To Bill 
    $vars['ProductName'] = $apiData['Product']; // Product Name , will how if no invoice will be created.


    $vars['SuccessRedirectUrl'] = $apiData['SuccessUrl']; // Success Page
    $vars['ErrorRedirectUrl'] = $apiData['FailureUrl']; // Error Page

    // Other Optional vars :

    // $vars["CancelType"] = "2"; # show Cancel button on start , 
    // $vars["CancelUrl"] ="http://www.yoursite.com/OrderCanceld";
    $vars['IndicatorUrl']  = $apiData['FailureUrl']; // Indicator Url \ Notify URL . after use -  http://kb.cardcom.co.il/article/AA-00240/0

    $vars["ReturnValue"] = "1234"; // Optional , ,recommended , value that will be return and save in CardCom system
    $vars["MaxNumOfPayments"] = "5"; // max num of payments to show  to the user

    $vars["ShowInvoiceHead"] = "true"; //  if show & edit Invoice Details on the page.
    $vars["InvoiceHeadOperation"] = "0"; //  0 = no create & show Invoice.  1 =(default)create Invoice.  2 = show Details Invoice but not create Invoice !	 
 
// Send Data To Bill Gold Server
            $r = $this->getiframeurl($vars,'https://secure.cardcom.solutions/Interface/LowProfile.aspx');
            parse_str($r,$responseArray);
            
            
            $log_data = array('tz_id' => $apiData['TZ'], 'firstname' => $apiData['FirstName'], 'lastname' => $apiData['LastName'], 'form_text' => 'Business First', 'payment_url' => "https://secure.cardcom.solutions/Interface/LowProfile.aspx", 'request_data' => json_encode($apiData), 'response_data' => json_encode($responseArray), 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);


            # Is Deal OK 
            if ($responseArray['ResponseCode'] == "0") 
            {
              # Iframe or  Redicet User :
                
                
                // end 
                 
                if(!empty($responseArray['url'])){
                    $this->session->set_userdata(array(
                      'businessFirst_payment_api_link' => $responseArray['url']
                    ));
                    
                   $responsePostData = array('status'=>'true', 'api_response' => $responseArray, 'url_iframe' => $responseArray['url'] );
                   
                }//End of if
                else{
                    $responsePostData = array('status'=>'false', 'api_response' => $responseArray );
                }
                
                return $responsePostData;
            
            }
            # Show Error to developer only
            else
            {
              
                $log_data = array('tz_id' => $apiData['TZ'], 'firstname' => $apiData['FirstName'], 'lastname' => $apiData['LastName'], 'form_text' => 'Business First', 'payment_url' => "https://secure.cardcom.solutions/Interface/LowProfile.aspx", 'request_data' => json_encode($apiData), 'error_data' => json_encode($r), 'created_at' => date('Y-m-d H:i:s') );
                 $this->project_model->insert_data('check_payment_api_response', $log_data);
                 
                 $responsePostData = array('status'=>'false', 'api_response' => $r );
                 
                 return $responsePostData;
            }

}
    
    
    
function getiframeurl($vars,$PostVarsURL)
{
  $urlencoded = http_build_query($vars);
  #init curl connection
    if( function_exists( "curl_init" )) 
    { 
        $CR = curl_init();
        curl_setopt($CR, CURLOPT_URL, $PostVarsURL);
        curl_setopt($CR, CURLOPT_POST, 1);
        curl_setopt($CR, CURLOPT_FAILONERROR, true);
        curl_setopt($CR, CURLOPT_POSTFIELDS, $urlencoded );
        curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($CR, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($CR, CURLOPT_FAILONERROR,true);
        #actual curl execution perfom
        $r = curl_exec( $CR );
        $error = curl_error ( $CR );
        # some error , send email to developer
        if( !empty( $error )) {

          return $error;

        }
       curl_close( $CR );
       return $r;
   }
   else
   {
    return "No curl_init" ;
   }
}

    
        
}

