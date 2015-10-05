<?php

function PrivatePageInit()
{
    session_start();
    if (!isset($_SESSION['user_id']) || !$_SESSION['user_id'])
    {
        header('Location: index.php');
    }
}

function WriteHead()
{
    echo '
    <head>
        <meta charset="utf-8">
        <title>LightIT</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel=\'stylesheet\' type="text/css" href="style/style.css">
        
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>';
}

function WriteHeader()
{
    WriteHead();
    echo '
    <header>
        <div id="menu">
            <a href="resume.php" class="btn btn-default">Главная</a>
            <a href="contacts.php" class="btn btn-default">Контакты</a>
            <a href="Cabinet.php" class="btn btn-default">Личный кабинет</a>
            
        </div> 

        <div id="userInfo">
            <p id="shortName">';
    echo $_SESSION['name'];
    echo ' ';
    echo $_SESSION['second_name'][0];
    echo '.</p>
            <div id="pic">
                <img id="iconSmall" src="photos/';
    echo $_SESSION['img'];
    echo '">
            </div> 
            <a href="index.php" class="btn btn-default">Log Out</a>
        </div>
    </header>';
}

function WriteFooter()
{
    echo '
    <footer>
        <p id="copyright">(C) Диденко Виктор Игоревич</p>
        <div id="footerMenu">
            <a href="contacts.php">Контакты</a>
            <a href="resume.php">Главная</a>
            <a href="Cabinet.php">Личный кабинет</a>
        </div> 
    </footer>';
}

function WriteHeaderNotLogIn()
{
    WriteHead();
    echo '
    <header>
        <div id="menu">
            <a href="index.php" class="btn btn-default">Главная</a>
        </div> 

    </header>';
}

function WriteFooterNotLogIn()
{
    echo '
    <footer>
        <p id="copyright">(C) Диденко Виктор Игоревич</p>
        <div id="footerMenu">
            
        </div> 
    </footer>';
}

function WriteResume()
{
    echo '
        <img id="myPhoto" src="photos/my.jpg">
            <DIV id="page_1">
                <DIV id="id_1">
                    <P class="p0 ft3"><SPAN class="ft0">Діденко Віктор Ігорович, </SPAN><SPAN class="ft1">​</SPAN>Junior<SPAN class="ft2">​</SPAN><SPAN class="ft1">​</SPAN>Web­розробник, повна зайнятість</P>
                    <P class="p1 ft4">1986 р.н., м.Запоріжжя. Тел.: (095)688­46­13. Ел. пошта: viktor.didenko@gmail.com</P>
                    <P class="p2 ft5">Мета</P>
                    <P class="p3 ft4">Працевлаштуватися стажистом у галузі веб­розробки. Навчитися розробляти сайти різної складності, з використанням сучасних технологій, протоколів, баз даних. Стати кваліфікованим спеціалістом, що користується попитом.</P>
                    <P class="p4 ft5">Досвід роботи</P>
                    <P class="p5 ft3">Інженер­технолог</P>
                    <P class="p6 ft4">з 05.2014 по 02.2015</P>
                    <P class="p7 ft4">ТС АІК­ЕКО (Проектування, будівництво). Проектування систем аспірації та газоочистки промислових підприємств.</P>
                    <P class="p8 ft3">Approve manager</P>
                    <P class="p9 ft4">з 10.2011 по 12.2013</P>
                    <P class="p10 ft4">Cupid plc. Обробка особистих даних користувачів, модерування.</P>
                    <P class="p11 ft3">Инженер</P>
                    <P class="p9 ft4">з 02.2009 по 10.2011</P>
                    <P class="p12 ft6">ДП "ДІПРОПРОМ" (Проектування промислових підприємств). Розробка проектної документації в галузі опалення, вентиляції та кондиціонування.</P>
                    <P class="p13 ft4">з 08.2008 по 01.2009</P>
                    <P class="p14 ft6">ТОВ "ЕКОПРОН­Юг" (Проектування систем та підприємств в галузі екології). Розробка проектної документації в галузі проектування котельних установок.</P>
                    <P class="p2 ft5">Освіта</P>
                    <P class="p5 ft3">Вища</P>
                    <P class="p15 ft4">з 09.2003 по 06.2008 ПДАБтА, Технології життєзабезпечення, Дніпропетровськ. Магістр будівництва за спеціальністю "Опалення, вентиляція і кондиціонування"</P>
                    <P class="p16 ft3">Середня</P>
                    <P class="p17 ft4">з 07.2000 по 07.2003 МБЛ"Перспектива", м.Запоріжжя. Профіль навчання: Інформатика/математика.</P>
                    <P class="p16 ft3">Самостійне вивчення</P>
                    <P class="p18 ft4">Онлайн курси на www.codecademy.com (Make a website, Make an interactive website та ін.</P>
                    <P class="p19 ft4">по Web технологіям).</P>
                    <P class="p20 ft4">Фленаган Д. JavaScript. Подробное руководство, 6е издание.</P>
                    <P class="p4 ft5">Професійні навички</P>
                    <P class="p21 ft4">MSOffice, AutoCad (та інші САПР системы) ­ впевнений користувач.</P>
                    <P class="p22 ft4">Turbo Pascal ­ вивчення у школі, початкові знання.</P>
                    <P class="p22 ft4">html&css, PHP, jQuery, JavaScript ­ самостійне вивчення.</P>
                    <P class="p22 ft4">Bootstrap ­ самостійне вивчення, початкові знання.</P>
                    <P class="p4 ft5">Володіння мовами</P>
                    <P class="p23 ft3">Українська, російська<SPAN class="ft2">​</SPAN><SPAN class="ft4">— високий рівень.</SPAN></P>
                    <P class="p19 ft4"><SPAN class="ft3">Англійска</SPAN><SPAN class="ft2">​</SPAN>— середній рівень (5/9 по IELTC)</P>
                    <P class="p24 ft5">Про себе</P>
                </DIV>
                <DIV id="id_2">
                    <P class="p0 ft4">Комунікативний, легко навчаюся, відповідальний, командний гравець. Мотивований вдосконалюватися та розвиватися. Готовий до понаднормових годин роботи та самостійного вивчення необхідної літератури та матеріалів у вільний час.</P>
                </DIV>
            </DIV>
            <DIV id="page_2">
                <DIV id="id_1">
                    <P class="p0 ft3"><SPAN class="ft0">Victor Didenko, </SPAN><SPAN class="ft1">​</SPAN>Junior<SPAN class="ft2">​</SPAN><SPAN class="ft1">​</SPAN>Web­developer, full employment</P>
                    <P class="p25 ft4">1986 y.o.b., Zaporizhzhya. mob.: (095)688­46­13. email: viktor.didenko@gmail.com</P>
                    <P class="p26 ft5">Aims</P>
                    <P class="p27 ft4">Get a trainee in sphere of web development. Learn how to develop sites of varying complexity, using modern technologies, protocols and databases. Become skilled and demanded expert.</P>
                    <P class="p28 ft5">Work experience</P>
                    <P class="p29 ft3">Process Engineer</P>
                    <P class="p30 ft4">since 05.2014 to 02.2015</P>
                    <P class="p31 ft4">AIK­ECO Company (Developing, construction). Development and engineering of <SPAN class="ft7">​</SPAN>gas cleaning and aspiration.</P>
                    <P class="p32 ft3">Approve manager</P>
                    <P class="p33 ft4">since 10.2011 to 12.2013</P>
                    <P class="p34 ft4">Cupid plc. Processing of users personal data, moderation.</P>
                    <P class="p35 ft3">Engineer</P>
                    <P class="p36 ft4">since 02.2009 to 10.2011</P>
                    <P class="p37 ft6">GC "GIPROPROM" (designing of industrial enterprises). Development of project documentation in sphere of heating, ventilation and air conditioning.</P>
                    <P class="p38 ft4">since 08.2008 to 01.2009</P>
                    <P class="p39 ft6">"Ekopron­Yug" Ltd (design of systems and enterprises in sphere of ecology). Development of project documentation in sphere of designing of boiler plants.</P>
                    <P class="p26 ft5">Education</P>
                    <P class="p29 ft3">Higher</P>
                    <P class="p40 ft4">since 09.2003 to 06.2008 PSACA, Life Support technologies. Dnepropetrovsk. Master of construction, specialty "HVAC".</P>
                    <P class="p41 ft3">Secondary</P>
                    <P class="p42 ft4">since 07.2000 to 07.2003 SML "Perspective", Zaporizhzhya. Profile of study: Computer / Mathematics.</P>
                    <P class="p41 ft3">Self­taught</P>
                    <P class="p43 ft4">Online courses on www.codecademy.com (Make a website, Make an interactive website and other web technologies)</P>
                    <P class="p44 ft4">David Flanagan. JavaScript: The Definitive Guide, Sixth Edition.</P>
                    <P class="p28 ft5">Professional skills</P>
                    <P class="p45 ft4">MSOffice, AutoCad (and other CAD programs) ­ advanced user.</P>
                    <P class="p46 ft4">Turbo Pascal ­ learning in school, basic knowledge.</P>
                    <P class="p46 ft4">html & css, PHP, jQuery, JavaScript ­ self­study.</P>
                    <P class="p46 ft4">Bootstrap ­ self­study, basic knowledge.</P>
                    <P class="p28 ft5">Languages</P>
                    <P class="p47 ft3">Ukrainian, Russian ­ <SPAN class="ft2">​</SPAN><SPAN class="ft4">high level.</SPAN></P>
                    <P class="p48 ft4"><SPAN class="ft3">English</SPAN><SPAN class="ft2">​</SPAN>— average level (5/9 by IELTC).</P>
                    <P class="p49 ft5">About myself</P>
                </DIV>
            <DIV id="id_2">
                    <P class="p0 ft4">Communicative, easy to educate, responsible, team player. Motivated to improve myself and develop my skills. Ready for overtime hours and self­study of relevant literature and materials in my free time.</P>
            </DIV>
            </DIV>';
}

function WriteResumePdfStyle()
{
    echo '
        <STYLE type="text/css">
        body {margin-top: 0px;margin-left: 0px;}

        #page_1 {position:relative; overflow: hidden;margin: 70px 0px 89px 75px;padding: 0px;border: none;width: 718px;}
        #page_1 #id_1 {border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 718px;overflow: hidden;}
        #page_1 #id_2 {border:none;margin: 3px 0px 0px 67px;padding: 0px;border:none;width: 564px;overflow: hidden;}

        #page_2 {position:relative; overflow: hidden;margin: 70px 0px 110px 65px;padding: 0px;border: none;width: 728px;}
        #page_2 #id_1 {border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 728px;overflow: hidden;}
        #page_2 #id_2 {border:none;margin: 0px 0px 0px 77px;padding: 0px;border:none;width: 569px;overflow: hidden;}

        .ft0{font: bold 19px "Arial";line-height: 22px;}
        .ft1{font: 19px "Gautami";line-height: 36px;}
        .ft2{font: 13px "Gautami";line-height: 26px;}
        .ft3{font: bold 13px "Arial";line-height: 16px;}
        .ft4{font: 13px "Arial";line-height: 16px;}
        .ft5{font: bold 15px "Arial";line-height: 18px;}
        .ft6{font: 13px "Arial";line-height: 17px;}
        .ft7{font: 13px "Gautami";line-height: 16px;}
        .ft8{font: 13px "Gautami";line-height: 18px;}
        .ft9{font: 13px "Arial";color: #4a86e8;line-height: 16px;}
        .ft10{font: 13px "Gautami";color: #4a86e8;line-height: 18px;}
        .ft11{font: 13px "Gautami";color: #6b7886;line-height: 18px;}

        .p0{text-align: left;margin-top: 0px;margin-bottom: 0px;}
        .p1{text-align: left;padding-left: 48px;margin-top: 0px;margin-bottom: 0px;}
        .p2{text-align: left;padding-left: 48px;margin-top: 12px;margin-bottom: 0px;}
        .p3{text-align: left;padding-left: 67px;padding-right: 107px;margin-top: 3px;margin-bottom: 0px;}
        .p4{text-align: left;padding-left: 48px;margin-top: 14px;margin-bottom: 0px;}
        .p5{text-align: left;padding-left: 67px;margin-top: 2px;margin-bottom: 0px;}
        .p6{text-align: left;padding-left: 115px;margin-top: 9px;margin-bottom: 0px;}
        .p7{text-align: left;padding-left: 115px;padding-right: 145px;margin-top: 0px;margin-bottom: 0px;}
        .p8{text-align: left;padding-left: 67px;margin-top: 15px;margin-bottom: 0px;}
        .p9{text-align: left;padding-left: 115px;margin-top: 8px;margin-bottom: 0px;}
        .p10{text-align: left;padding-left: 115px;margin-top: 0px;margin-bottom: 0px;}
        .p11{text-align: left;padding-left: 67px;margin-top: 0px;margin-bottom: 0px;}
        .p12{text-align: left;padding-left: 115px;padding-right: 110px;margin-top: 0px;margin-bottom: 0px;}
        .p13{text-align: left;padding-left: 115px;margin-top: 6px;margin-bottom: 0px;}
        .p14{text-align: left;padding-left: 115px;padding-right: 79px;margin-top: 0px;margin-bottom: 0px;}
        .p15{text-align: left;padding-left: 96px;padding-right: 79px;margin-top: 9px;margin-bottom: 0px;}
        .p16{text-align: left;padding-left: 67px;margin-top: 7px;margin-bottom: 0px;}
        .p17{text-align: left;padding-left: 96px;padding-right: 288px;margin-top: 9px;margin-bottom: 0px;}
        .p18{text-align: left;padding-left: 96px;margin-top: 9px;margin-bottom: 0px;}
        .p19{text-align: left;padding-left: 96px;margin-top: 0px;margin-bottom: 0px;}
        .p20{text-align: left;padding-left: 96px;margin-top: 7px;margin-bottom: 0px;}
        .p21{text-align: left;padding-left: 96px;margin-top: 3px;margin-bottom: 0px;}
        .p22{text-align: left;padding-left: 96px;margin-top: 8px;margin-bottom: 0px;}
        .p23{text-align: left;padding-left: 96px;margin-top: 1px;margin-bottom: 0px;}
        .p24{text-align: left;padding-left: 48px;margin-top: 4px;margin-bottom: 0px;}
        .p25{text-align: left;padding-left: 58px;margin-top: 0px;margin-bottom: 0px;}
        .p26{text-align: left;padding-left: 58px;margin-top: 12px;margin-bottom: 0px;}
        .p27{text-align: left;padding-left: 77px;padding-right: 110px;margin-top: 3px;margin-bottom: 0px;}
        .p28{text-align: left;padding-left: 58px;margin-top: 14px;margin-bottom: 0px;}
        .p29{text-align: left;padding-left: 77px;margin-top: 2px;margin-bottom: 0px;}
        .p30{text-align: left;padding-left: 125px;margin-top: 9px;margin-bottom: 0px;}
        .p31{text-align: left;padding-left: 125px;padding-right: 118px;margin-top: 0px;margin-bottom: 0px;}
        .p32{text-align: left;padding-left: 77px;margin-top: 0px;margin-bottom: 0px;}
        .p33{text-align: left;padding-left: 125px;margin-top: 7px;margin-bottom: 0px;}
        .p34{text-align: left;padding-left: 125px;margin-top: 0px;margin-bottom: 0px;}
        .p35{text-align: left;padding-left: 77px;margin-top: 8px;margin-bottom: 0px;}
        .p36{text-align: left;padding-left: 125px;margin-top: 8px;margin-bottom: 0px;}
        .p37{text-align: left;padding-left: 125px;padding-right: 145px;margin-top: 0px;margin-bottom: 0px;}
        .p38{text-align: left;padding-left: 125px;margin-top: 6px;margin-bottom: 0px;}
        .p39{text-align: left;padding-left: 125px;padding-right: 85px;margin-top: 0px;margin-bottom: 0px;}
        .p40{text-align: left;padding-left: 106px;padding-right: 116px;margin-top: 9px;margin-bottom: 0px;}
        .p41{text-align: left;padding-left: 77px;margin-top: 7px;margin-bottom: 0px;}
        .p42{text-align: left;padding-left: 106px;padding-right: 277px;margin-top: 9px;margin-bottom: 0px;}
        .p43{text-align: left;padding-left: 106px;padding-right: 91px;margin-top: 9px;margin-bottom: 0px;}
        .p44{text-align: left;padding-left: 106px;margin-top: 7px;margin-bottom: 0px;}
        .p45{text-align: left;padding-left: 106px;margin-top: 3px;margin-bottom: 0px;}
        .p46{text-align: left;padding-left: 106px;margin-top: 8px;margin-bottom: 0px;}
        .p47{text-align: left;padding-left: 106px;margin-top: 1px;margin-bottom: 0px;}
        .p48{text-align: left;padding-left: 106px;margin-top: 0px;margin-bottom: 0px;}
        .p49{text-align: left;padding-left: 58px;margin-top: 4px;margin-bottom: 0px;}
        .p50{text-align: left;padding-left: 65px;margin-top: 0px;margin-bottom: 0px;}
        .p51{text-align: left;padding-left: 123px;margin-top: 0px;margin-bottom: 0px;}
        .p52{text-align: left;padding-left: 123px;margin-top: 12px;margin-bottom: 0px;}
        .p53{text-align: justify;padding-left: 142px;padding-right: 111px;margin-top: 3px;margin-bottom: 0px;}
        .p54{text-align: left;padding-left: 123px;margin-top: 14px;margin-bottom: 0px;}
        .p55{text-align: left;padding-left: 142px;margin-top: 2px;margin-bottom: 0px;}
        .p56{text-align: left;padding-left: 190px;margin-top: 9px;margin-bottom: 0px;}
        .p57{text-align: left;padding-left: 190px;padding-right: 87px;margin-top: 0px;margin-bottom: 0px;}
        .p58{text-align: left;padding-left: 142px;margin-top: 0px;margin-bottom: 0px;}
        .p59{text-align: left;padding-left: 190px;margin-top: 7px;margin-bottom: 0px;}
        .p60{text-align: left;padding-left: 190px;margin-top: 0px;margin-bottom: 0px;}
        .p61{text-align: left;padding-left: 142px;margin-top: 8px;margin-bottom: 0px;}
        .p62{text-align: left;padding-left: 190px;margin-top: 8px;margin-bottom: 0px;}
        .p63{text-align: left;padding-left: 190px;padding-right: 115px;margin-top: 0px;margin-bottom: 0px;}
        .p64{text-align: left;padding-left: 190px;margin-top: 6px;margin-bottom: 0px;}
        .p65{text-align: left;padding-left: 190px;padding-right: 91px;margin-top: 0px;margin-bottom: 0px;}
        .p66{text-align: left;padding-left: 171px;padding-right: 86px;margin-top: 9px;margin-bottom: 0px;}
        .p67{text-align: left;padding-left: 142px;margin-top: 7px;margin-bottom: 0px;}
        .p68{text-align: left;padding-left: 171px;padding-right: 286px;margin-top: 9px;margin-bottom: 0px;}
        .p69{text-align: right;padding-right: 85px;margin-top: 9px;margin-bottom: 0px;}
        .p70{text-align: left;padding-left: 171px;margin-top: 0px;margin-bottom: 0px;}
        .p71{text-align: left;padding-left: 171px;margin-top: 7px;margin-bottom: 0px;}
        .p72{text-align: left;padding-left: 171px;margin-top: 3px;margin-bottom: 0px;}
        .p73{text-align: left;padding-left: 171px;margin-top: 8px;margin-bottom: 0px;}
        .p74{text-align: left;padding-left: 171px;margin-top: 1px;margin-bottom: 0px;}
        .p75{text-align: left;padding-left: 123px;margin-top: 4px;margin-bottom: 0px;}
        </STYLE>';
}
?>