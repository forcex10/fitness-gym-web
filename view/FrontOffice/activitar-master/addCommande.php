<?php
session_start();
    include_once "C:/xampp/htdocs/fitness-gym-web/Controller/CommandeC.php";
    include_once "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
    include_once "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
    include_once "C:/xampp/htdocs/fitness-gym-web/Model/Commande.php";

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require '../../PHPMailer-master/src/Exception.php';
        require '../../PHPMailer-master/src/PHPMailer.php';
        require '../../PHPMailer-master/src/SMTP.php';

    function confirmer_commande($id){
        $commandeC=new CommandeC();
        $panierC = new PanierC();
        $produitC = new produitC();
        $mail = new PHPMailer(true);
        
    try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                 //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rayanferjani55@gmail.com';                     //SMTP username
    $mail->Password   = 'mcdlprixsjszskqx';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rayanferjani55@gmail.com', 'Fitness_gym');
    $mail->addAddress($_SESSION['email']);     //Add a recipient            
    $mail->addReplyTo('rayanferjani55@gmail.com', 'Information');
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Confirmer Votre Commande';
    $commande=$commandeC->showCommande($id);
    $list = $panierC->showPanierClient($commande['id_client']);
    $bb = "<div class='commande-container'>
    <div class='commande-details'>";

if (isset($list) && !empty($list)) {
    $tot = 0;
    $quant = 0;
    $bb.="<h2> Merci pour votre Commande : <h2> <br/>";
    foreach ($list as $p) {
        $produit = $produitC->showproduit($p['id_produit']);
        $tot += $p['totale'];
        $quant += $p['quantite'];
        $bb .= "<h5>". $produit['nom'] . '   prix :  ' . $produit['prix'] . '   DT  ' . '  quantite :  ' . $p['quantite'] . '   totale produit :  ' . $p['totale'] . '  DT  ' . "</h5>";
    }
    
    $bb .= "<div class='total-section'>
        <h3 id='tot_commande'>Totale Commande : " .  $commande['prix_commande'] . " DT </h3>
        <a href='http://localhost/fitness-gym-web/View/Frontoffice/activitar-master/verifierCommande.php?id_commande=$id' class='btn btn-danger btn-fw'> Confirmer </a> 
    </div>";
} else {
    $bb .= "<p class='no-ps'>Votre panier est vide</p>";
}

$bb .= "</div></div>";

$mail->Body = $bb;


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    }



    //id du client a faire
    $id_client=$_GET['id_client'];
    $produitC=new produitC();
    $commandeC=new CommandeC();
    $panierC = new PanierC();
    $list = $panierC->showPanierClient($id_client);
    $quantii=0;
    foreach ($list as $p ) : 
        $quantii+=$p['quantite']; 
    endforeach;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['submit']) ) {
            $heureActuelle = date('Y-m-d');
            $commande=new Commande(null,$id_client,$heureActuelle,"NoConfirm",$_POST['prix_commande'],$_POST['methode_paiement'],$_POST['num'],$_POST['cvv'],$_POST['exp'],$_POST['titulaire'],$_POST['adresse'],$_POST['ville'],$_POST['code_postal'],$_POST['methode_livraison'],false);
            $commandeC->addCommande($commande);
            $commande=$commandeC->showLastCommande();
            confirmer_commande($commande['id_commande']);
            header('Location:index.php');
        }
      }
      
?>


<!DOCTYPE html>
<html lang="zxx"><head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activitar | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&amp;display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
<style type="text/css" id="operaUserStyle"></style><style type="text/css">:root [href^="//x4pollyxxpush.com/"], :root zeus-ad, :root topadblock, :root span[id^="ezoic-pub-ad-placeholder-"], :root guj-ad, :root gpt-ad, :root div[id^="zergnet-widget"], :root div[id^="vuukle-ad-"], :root div[id^="sticky_ad_"], :root div[id^="rc-widget-"], :root div[id^="gpt_ad_"], :root div[id^="ezoic-pub-ad-"], :root div[id^="div-gpt-"], :root div[id^="dfp-ad-"], :root div[id^="adspot-"], :root div[id^="ads300_250-widget-"], :root div[id^="ads300_100-widget-"], :root div[id^="ads250_250-widget-"], :root div[id^="adrotate_widgets-"], :root div[id^="_vdo_ads_player_ai_"], :root div[id*="ScriptRoot"], :root div[id*="MarketGid"], :root div[data-native_ad], :root div[data-mini-ad-unit], :root div[data-insertion], :root div[data-id-advertdfpconf], :root div[data-google-query-id], :root hl-adsense, :root div[data-contentexchange-widget], :root div[data-content="Advertisement"], :root div[data-alias="300x250 Ad 2"], :root div[data-alias="300x250 Ad 1"], :root div[data-adzone], :root div[data-adunit-path], :root div[data-ad-wrapper], :root div[data-ad-placeholder], :root div[class^="native-ad-"], :root div[data-dfp-id], :root div[class^="kiwi-ad-wrapper"], :root div[class^="Adstyled__AdWrapper-"], :root div[aria-label="Ads"], :root display-ads, :root display-ad-component, :root atf-ad-slot, :root aside[id^="adrotate_widgets-"], :root article.ad, :root ark-top-ad, :root app-advertisement, :root app-ad, :root amp-fx-flying-carpet, :root amp-embed[type="taboola"], :root amp-connatix-player, :root amp-ad-custom, :root amp-ad, :root a[style="width:100%;height:100%;z-index:10000000000000000;position:absolute;top:0;left:0;"], :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[href^="https://yogacomplyfuel.com/"], :root a[href^="https://www.sugarinstant.com/?partner_id="], :root a[href^="https://www.privateinternetaccess.com/"] > img, :root a[href^="https://www.onlineusershielder.com/"], :root a[href^="https://www.nutaku.net/signup/landing/"], :root a[href^="https://www.nudeidols.com/cams/"], :root a[href^="https://www.mypornstarcams.com/landing/click/"], :root a[href^="https://www.kingsoffetish.com/tour?partner_id="], :root a[href^="https://www.infowarsstore.com/"] > img, :root a[href^="https://www.highcpmrevenuenetwork.com/"], :root a[href^="https://www.googleadservices.com/pagead/aclk?"], :root a[href^="https://www.goldenfrog.com/vyprvpn?offer_id="][href*="&aff_id="], :root a[href^="https://www.get-express-vpn.com/offer/"], :root a[href^="https://www.financeads.net/tc.php?"], :root a[href^="https://www.brazzersnetwork.com/landing/"], :root div[class^="Display_displayAd"], :root a[href^="https://www.sheetmusicplus.com/?aff_id="], :root a[href^="https://www.bang.com/?aff="], :root a[href^="https://www.adxsrve.com/"], :root a[href^="https://wirewar.website/"], :root a[href^="https://visit-website.com/"], :root a[href^="https://twinrdsyn.com/"], :root a[href^="https://twinrdsrv.com/"], :root a[href^="https://tsartech.g2afse.com/"], :root a[href^="https://trk.sportsflix4k.club/"], :root a[href^="https://trk.nfl-online-streams.club/"], :root a[href^="https://traffdaq.com/"], :root a[href^="https://tracking.avapartner.com/"], :root a[href^="https://track.wg-aff.com"], :root a[href^="https://track.ultravpn.com/"], :root a[href^="https://track.totalav.com/"], :root a[href^="https://track.afcpatrk.com/"], :root a[href^="https://track.adform.net/"], :root a[href^="https://torguard.net/aff.php"] > img, :root a[href^="https://thefacux.com/"], :root div[data-adname], :root a[href^="https://thechleads.pro/"], :root a[href^="https://tc.tradetracker.net/"] > img, :root a[href^="https://taghaugh.com/"], :root a[href^="https://t.hrtye.com/"], :root a[href^="https://www.highperformancecpmgate.com/"], :root a[href^="https://t.grtyi.com/"], :root a[href^="https://t.adating.link/"], :root a[href^="https://go.trackitalltheway.com/"], :root [href^="https://track.fiverr.com/visit/"] > img, :root a[href^="https://syndication.exoclick.com/"], :root a[href^="https://syndication.dynsrvtbg.com/"], :root a[href^="https://streamate.com/landing/click/"], :root a[href^="https://ad.doubleclick.net/"], :root a[href^="https://static.fleshlight.com/images/banners/"], :root a[href^="https://slkmis.com/"], :root a[href^="https://sTaRtGAMing.net/tienda/"], :root citrus-ad-wrapper, :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"], :root a[href^="https://sTaRTgamInG.net/tienda/"], :root [data-adblockkey], :root a[href^="https://sTARtgamIng.net/tienda/"], :root bottomadblock, :root a[href^="https://s.zlinkd.com/"], :root a[href^="https://aweptjmp.com/"], :root a[href^="https://s.zlinkc.com/"], :root a[href^="https://www.mrskin.com/account/"], :root a[href^="https://s.optzsrv.com/"], :root a[data-obtrack^="http://paid.outbrain.com/network/redir?"], :root a[href^="https://reinstandpointdumbest.com/"], :root a[href^="https://go.strpjmp.com/"], :root a[href^="https://refpa4903566.top/"], :root a[href^="https://pubads.g.doubleclick.net/"], :root a[href^="https://prf.hn/click/"][href*="/camref:"] > img, :root a[href^="https://serve.awmdelivery.com/"], :root a[href^="https://prf.hn/click/"][href*="/adref:"] > img, :root a[href^="https://pb-track.com/"], :root a[href^="https://paid.outbrain.com/network/redir?"], :root ps-connatix-module, :root div[id^="ad_position_"], :root a[href^="https://ovb.im/"], :root div[id^="ad-div-"], :root a[href^="https://newbinotracs.com/"], :root a[href^="http://eighteenderived.com/"], :root a[href^="https://natour.naughtyamerica.com/track/"], :root [href^="https://stvkr.com/"], :root a[href^="https://mediaserver.entainpartners.com/renderBanner.do?"], :root a[href^="https://loboclick.com"], :root .nya-slot[style], :root a[href^="https://a.bestcontentweb.top/"], :root a[href^="https://lobimax.com/"], :root a[href^="https://lead1.pl/"], :root a[href^="https://refpa.top/"], :root a[href^="https://landing.brazzersnetwork.com/"], :root a[href^="https://safesurfingtoday.com/"][href*="?skip="], :root a[href^="https://t.acam.link/"], :root a[href^="https://ads.leovegas.com/redirect.aspx?"], :root a[href^="https://land.brazzersnetwork.com/landing/"], :root [data-css-class="dfp-inarticle"], :root .card-captioned.crd > .crd--cnt > .s2nPlayer, :root a[href^="https://go.tmrjmp.com"], :root a[href^="https://startgamIng.Net/tienda/"], :root a[href^="https://l.hyenadata.com/"], :root a[href^="https://yourperfectdating.life/"], :root a[href^="https://join.virtuallust3d.com/"], :root a[href^="https://kiksajex.com/"], :root a[href^="https://juicyads.in/"], :root a[href^="https://mediaserver.gvcaffiliates.com/renderBanner.do?"], :root a[href^="https://join.dreamsexworld.com/"], :root a[href^="https://itubego.com/video-downloader/?affid="], :root a[href^="https://iqbroker.com/"][href*="?aff="], :root a[href^="https://incisivetrk.cvtr.io/click?"], :root a[href^="https://hot-growngames.life/"], :root [data-revive-zoneid], :root a[href^="https://googleads.g.doubleclick.net/pcs/click"], :root a[href^="https://t.ajump1.com/"], :root a[href^="https://clk.wrenchsound.store/"], :root a[href^="https://go.zybrdr.com"], :root [href^="http://join.michelle-austin.com/"], :root [class^="tile-picker__CitrusBannerContainer-sc-"], :root a[href^="https://go.xxxiijmp.com"], :root a[href^="https://go.xtbaffiliates.com/"], :root a[href^="https://thaudray.com/"], :root .OUTBRAIN[data-widget-id^="FMS_REELD_"], :root [data-role="tile-ads-module"], :root a[href^="https://adsrv4k.com/"], :root a[href^="https://go.xlviirdr.com"], :root a[href^="https://ismlks.com/"], :root a[href^="//a.bestcontentfare.top/"], :root [href^="https://www.mypillow.com/"] > img, :root a[href^="https://azpresearch.club/"], :root a[href^="https://go.xlirdr.com"], :root a[href^="https://go.skinstrip.net"][href*="?campaignId="], :root a[href^="https://go.markets.com/visit/?bta="], :root a[href^="https://billing.purevpn.com/aff.php"] > img, :root a[href^="https://go.hpyrdr.com/"], :root a[href^="https://go.goaserv.com/"], :root a[href^="https://go.dmzjmp.com"], :root a[href^="https://go.admjmp.com/"], :root [href^="https://kingered-banctours.com/"], :root a[href^="https://get.surfshark.net/aff_c?"][href*="&aff_id="] > img, :root a-ad, :root a[href^="https://affiliate.rusvpn.com/click.php?"], :root a[href^="https://geniusdexchange.com/"], :root a[href^="https://frameworkdeserve.com/"], :root a[href^="https://flirtandsweets.life/"], :root a[href^="https://www.mrskin.com/tour"], :root a[href^="https://financeads.net/tc.php?"], :root div[data-native-ad], :root a[href^="https://engine.trackingdesks.com/"], :root a[data-redirect^="https://paid.outbrain.com/network/redir?"], :root [href^="https://www.reimageplus.com/"], :root a[href^="https://ak.hauchiwu.com/"], :root a[href^="https://engine.phn.doublepimp.com/"], :root a[href^="https://engine.blueistheneworanges.com/"], :root a[href^="https://dl-protect.net/"], :root [href="//jjgirls.com/sex/ChaturbateCams"], :root a[href^="https://datingoffers30.info/"], :root a[href^="https://ctosrd.com/"], :root a[href^="https://clixtrac.com/"], :root a[href^="https://click.linksynergy.com/fs-bin/"] > img, :root ad-shield-ads, :root a[href^="https://sTartGAMinG.net/tienda/"], :root AD-TRIPLE-BOX, :root a[href^="https://click.hoolig.app/"], :root img[src^="https://images.purevpnaffiliates.com"], :root a[href^="https://porntubemate.com/"], :root a[href^="http://www.gfrevenge.com/landing/"], :root a[href^="https://clickadilla.com/"], :root a[href^="https://click.dtiserv2.com/"], :root a[href^="https://go.xlvirdr.com"], :root a[href^="http://www.iyalc.com/"], :root a[href^="https://claring-loccelkin.com/"], :root a[href^="https://chaturbate.com/in/?track="], :root a[href^="https://chaturbate.com/in/?tour="], :root a[href^="https://cams.imagetwist.com/in/?track="], :root a[href^="https://go.gldrdr.com/"], :root a[href^="https://buqkrzbrucz.com/"], :root a[href^="https://affcpatrk.com/"], :root a[href^="https://bongacams2.com/track?"], :root a[href^="https://www.sheetmusicplus.com/"][href*="?aff_id="], :root a[href^="https://bngpt.com/"], :root a[href^="https://bluedelivery.pro/"], :root a[href^="https://black77854.com/"], :root a[href^="https://bc.game/"], :root a[href^="https://ndt5.net/"], :root a[href^="https://batheunits.com/"], :root a[target="_blank"][onmousedown="this.href^='http://paid.outbrain.com/network/redir?"], :root a[href^="https://banners.livepartners.com/"], :root a[href^="//whulsaux.com/"], :root a[href^="https://m.do.co/c/"] > img, :root [class^="s2nPlayer"], :root a[href^="https://chaturbate.jjgirls.com/?track="], :root a[href^="https://ausoafab.net/"], :root a[href^="https://t.ajrkm1.com/"], :root [href="https://masstortfinancing.com"] img, :root a[href^="https://bongacams10.com/track?"], :root a[href^="https://albionsoftwares.com/"], :root a[href^="https://go.etoro.com/"] > img, :root a[href^="https://convertmb.com/"], :root a[href^="https://spo-play.live/"], :root a[href^="https://join.sexworld3d.com/track/"], :root a[href^="https://intenseaffiliates.com/redirect/"], :root a[href^="https://ads.ad4game.com/"], :root [id^="google_ads_iframe"], :root a[href^="https://syndication.optimizesrv.com/"], :root a[href^="https://affpa.top/"], :root a[href^="https://adnetwrk.com/"], :root a[href^="https://adjoincomprise.com/"], :root [href^="http://misslinkvocation.com/"], :root a[href^="https://adclick.g.doubleclick.net/"], :root a[href^="https://www.bet365.com/"][href*="affiliate="], :root [href^="https://r.kraken.com/"], :root a[href^="https://mmwebhandler.aff-online.com/"], :root a[href^="https://go.nordvpn.net/aff"] > img, :root [href^="http://clicks.totemcash.com/"], :root a[href^="https://misspkl.com/"], :root a[href^="https://ad.zanox.com/ppc/"] > img, :root a[href^="https://ad.kubiccomps.icu/"], :root a[href^="https://ab.advertiserurl.com/aff/"], :root a[href^="https://a2.adform.net/"], :root a[href^="https://iactrivago.ampxdirect.com/"], :root a[href^="https://a.medfoodhome.com/"], :root a[href^="https://adultfriendfinder.com/go/"], :root a[href^="https://a.bestcontentoperation.top/"], :root a[href^="http://static.fleshlight.com/images/banners/"], :root a[href^="https://a.adtng.com/"], :root [data-m-ad-id], :root a[href^="https://sTartgAminG.net/tienda/"], :root a[href^="https://a-ads.com/"], :root a[href^="https://join.virtualtaboo.com/track/"], :root a[href^="https://StarTGAminG.net/tienda/"], :root a[href^="https://STaRTgamINg.net/tienda/"], :root a[href^="http://www.mrskin.com/tour"], :root a[href^="https://agacelebir.com/"], :root a[href^="https://spygasm.com/track?"], :root ins.adsbygoogle, :root a[href^="https://1startfiledownload1.com/"], :root a[href^="https://s.zlinkb.com/"], :root a[href^="http://d2.zedo.com/"], :root a[href^="http://www.friendlyduck.com/AF_"], :root a[href^="http://trk.globwo.online/"], :root a[href^="https://1betandgonow.com/"], :root a[href^="https://prf.hn/click/"][href*="/creativeref:"] > img, :root a[href^="http://www.adultempire.com/unlimited/promo?"][href*="&partner_id="], :root a[href^="http://traffic.tc-clicks.com/"], :root a[href^="http://tour.mrskin.com/"], :root [href^="https://wct.link/"], :root [data-desktop-ad-id], :root a[href^="https://www.purevpn.com/"][href*="&utm_source=aff-"], :root a[href^="http://m.hue2m.com/"], :root a[href^="https://funkydaters.com/"], :root [id^="ad_sky"], :root a[href^="http://https://www.get-express-vpn.com/offer/"], :root div[id^="google_dfp_"], :root a[href^="http://googleads.g.doubleclick.net/pcs/click"], :root [href^="http://go.cm-trk2.com/"], :root a[href^="http://click.payserve.com/"], :root a[href^="https://porngames.adult/?SID="], :root a[href^="https://landing1.brazzersnetwork.com"], :root #slashboxes > .deals-rail, :root [href^="http://globsads.com/"], :root [href^="https://www.brighteonstore.com/products/"] img, :root a[href^="http://bc.vc/?r="], :root a[href^="https://mityneedn.com/"], :root [href^="http://homemoviestube.com/"], :root a[href^="http://ad.doubleclick.net/"], :root a[href^="//zunsoach.com/"], :root a[href^="//s.st1net.com/splash.php"], :root a[href^="//pubads.g.doubleclick.net/"], :root a[href^="https://femglobal.app/"], :root a[href^="//go.eabids.com/"], :root [id^="div-gpt-ad"], :root .ob_container .item-container-obpd, :root div[id^="yandex_ad"], :root a[href^="https://pb-imc.com/"], :root a[href^="http://deskfrontfreely.com/"], :root a[data-url^="http://paid.outbrain.com/network/redir?"] + .author, :root [href^="https://join.playboyplus.com/track/"], :root a[href^="//ardslediana.com/"], :root [data-d-ad-id], :root a[href*=".engine.adglare.net/"], :root #kt_player > a[target="_blank"], :root a[href*=".cfm?fp="][href*="&maxads="], :root [data-ad-width], :root [href^="https://cpa.10kfreesilver.com/"], :root a[href^="https://a.bestcontentfood.top/"], :root a[href^="http://wct.link/"], :root [href^="https://goldforyourfuture.com/clk.trk"] img, :root [onclick^="location.href='http://www.reimageplus.com"], :root [id^="section-ad-banner"], :root a[href^="https://t.aslnk.link/"], :root a[href^="https://click.candyoffers.com/"], :root [href^="https://zstacklife.com/"] img, :root a[href^="https://go.julrdr.com/"], :root .trc_rbox_div .syndicatedItemUB, :root [href^="https://zone.gotrackier.com/"], :root a[href^="https://fourwhenstatistics.com/"], :root [href^="https://detachedbates.com/"], :root [href^="https://www.targetingpartner.com/"], :root .section-subheader > .section-hotel-prices-header, :root [href^="https://go.affiliatexe.com/"], :root [href^="https://www.hostg.xyz/"] > img, :root a[href^="http://adultfriendfinder.com/go/"], :root a[href^="https://maymooth-stopic.com/"], :root [href^="https://www.herbanomic.com/"] > img, :root div[id^="ad-position-"], :root a[href^="http://affiliate.glbtracker.com/"], :root a[href^="https://leg.xyz/?track="], :root div[id^="crt-"][style], :root a[href^="http://adultgames.xxx/"], :root a[href^="https://bngprm.com/"], :root [href^="https://shiftnetwork.infusionsoft.com/go/"] > img, :root a[href^="https://trk.softonixs.xyz/"], :root [href^="https://www.mypatriotsupply.com/"] > img, :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"], :root [href^="https://secure.bmtmicro.com/servlets/"], :root [href="https://ourgoldguy.com/contact/"] img, :root a[href^="https://brightadnetwork.com/"], :root a[href^="http://www.onwebcam.com/random?t_link="], :root [href^="https://www.avantlink.com/click.php"] img, :root a[href^="https://losingoldfry.com/"], :root [data-wpas-zoneid], :root .scroll-fixable.rail-right > .deals-rail, :root [href^="https://routewebtk.com/"], :root a[href^="https://oackoubs.com/"], :root a[href^="https://ak.psaltauw.net/"], :root a[href^="https://go.cmtaffiliates.com/"], :root [data-name="adaptiveConstructorAd"], :root [href^="https://optimizedelite.com/"] > img, :root a[href^="https://awptjmp.com/"], :root a[href^="https://go.goasrv.com/"], :root [href^="http://mypillow.com/"] > img, :root a[href^="http://bongacams.com/track?"], :root a[href^="https://fleshlight.sjv.io/"], :root [data-ad-manager-id], :root a[href^="https://promo-bc.com/"], :root a[href^="https://clicks.pipaffiliates.com/"], :root [href^="https://noqreport.com/"] > img, :root [href^="https://mylead.global/stl/"] > img, :root [href^="https://mypatriotsupply.com/"] > img, :root [data-freestar-ad], :root a[href^="https://fc.lc/ref/"], :root .vid-present > .van_vid_carousel__padding, :root span[data-ez-ph-id], :root [href^="https://track.aftrk1.com/"], :root div[id^="adngin-"], :root [data-rc-widget], :root a[href^="https://go.xxxijmp.com"], :root [href^="https://istlnkcl.com/"], :root a[href^="https://staRTgaming.net/tienda/"], :root a[href^="https://STaRtgAmInG.net/tienda/"], :root [href^="https://ilovemyfreedoms.com/landing-"], :root [href^="https://go.xlrdr.com"], :root [href^="https://go.4rabettraff.com/"], :root a[href^="https://tm-offers.gamingadult.com/"], :root [href^="https://charmingdatings.life/"], :root [href^="https://glersakr.com/"], :root a[href^="https://italarizege.xyz/"], :root a[href^="https://wittered-mainging.com/"], :root [href^="https://engine.gettopple.com/"], :root [data-id^="div-gpt-ad"], :root a[href^="https://tracker.loropartners.com/"], :root [href^="https://awbbjmp.com/"], :root a[href^="https://k2s.cc/pr/"], :root [href^="https://affect3dnetwork.com/track/"], :root a[href^="https://camfapr.com/landing/click/"], :root [href="//sexcams.plus/"], :root a[href^="https://go.currency.com/"], :root div[id^="advads_ad_"], :root .resultsList > div > div > div > div[data-resultid$="-sponsored"], :root [href^="http://www.mypillow.com/"] > img, :root a[href^="https://adserver.adreactor.com/"], :root [href^="http://join.shemalesfromhell.com/"], :root a[href^="https://ads.betfair.com/redirect.aspx?"], :root [href^="http://www.fleshlightgirls.com/"], :root [href^="http://join.trannies-fuck.com/"], :root .trc_rbox .syndicatedItem, :root a[href^="http://cam4com.go2cloud.org/aff_c?"], :root a[href^="https://cpmspace.com/"], :root [href^="https://freecourseweb.com/"] > .sitefriend, :root a[href^="https://ads.planetwin365affiliate.com/redirect.aspx?"], :root [href^="http://join.rodneymoore.com/"], :root [href^="https://shrugartisticelder.com"], :root a[href^="https://staRTgamIng.net/tienda/"], :root div[id^="lazyad-"], :root a[href^="http://com-1.pro/"], :root [name^="google_ads_iframe"], :root a[href^="http://bodelen.com/"], :root [href="https://www.masstortfinancing.com/"] > img, :root a[href^="https://www.geekbuying.com/dynamic-ads/"], :root a[href^="https://lnkxt.bannerator.com/"], :root [href="https://jdrucker.com/gold"] > img, :root [href^="https://v.investologic.co.uk/"], :root [href^="https://cipledecline.buzz/"], :root a[href^="https://go.xxxjmp.com"], :root #leader-companion > a[href], :root a[href^="https://jaxofuna.com/"], :root div[recirculation-ad-container], :root [href^="https://traffserve.com/"], :root [id^="ad_slider"], :root [data-adbridg-ad-class], :root a[href^="http://www.adultdvdempire.com/?partner_id="][href*="&utm_"], :root [href^="http://join.shemale.xxx/"], :root div[id^="div-ads-"], :root [href^="https://rapidgator.net/article/premium/ref/"], :root [href^="https://join3.bannedsextapes.com"], :root div[data-spotim-slot], :root [href^="https://antiagingbed.com/discount/"] > img, :root a[href^="https://go.247traffic.com/"], :root [href^="https://join.girlsoutwest.com/"], :root [href^="http://trafficare.net/"], :root [data-type="ad-vertical"], :root a[href^="https://u.expresstech.io/"], :root [href^="https://mypillow.com/"] > img, :root [href^="https://ad.admitad.com/"], :root [data-testid="ad_testID"], :root [href^="https://goldcometals.com/clk.trk"], :root a[href^="https://bodelen.com/"], :root [data-ad-name], :root a[href*=".g2afse.com/"], :root a[href^="https://go.hpyjmp.com"], :root a[href^="https://tour.mrskin.com/"], :root a[href^="https://fastestvpn.com/lifetime-special-deal?a_aid="], :root [href^="https://mystore.com/"] > img, :root [data-mobile-ad-id], :root [data-ez-name], :root a[data-widget-outbrain-redirect^="http://paid.outbrain.com/network/redir?"], :root [data-dynamic-ads], :root a[href^="http://go.xtbaffiliates.com/"], :root a[href^="https://consali.com/"], :root .grid > .container > #aside-promotion, :root DFP-AD, :root [onclick*="content.ad/"], :root AMP-AD, :root a[href^="https://sTartGAMiNG.net/tienda/"], :root [data-ad-cls], :root [id^="ad-wrap-"], :root div[id^="taboola-stream-"], :root [href^="https://go.astutelinks.com/"], :root a[href^="http://tc.tradetracker.net/"] > img, :root a[href^="http://affiliates.thrixxx.com/"], :root a[href^="https://www.adultempire.com/"][href*="?partner_id="], :root [data-template-type="nativead"], :root [class^="amp-ad-"], :root [href^="https://affiliate.fastcomet.com/"] > img, :root [class^="adDisplay-module"], :root AD-SLOT, :root .ob_dual_right > .ob_ads_header ~ .odb_div, :root a[href^="https://www.liquidfire.mobi/"], :root [href^="https://click2cvs.com/"], :root .trc_related_container div[data-item-syndicated="true"], :root [href^="http://join.shemalepornstar.com/"], :root a[href^="https://go.xlviiirdr.com"], :root .trc_rbox_div .syndicatedItem, :root .plistaList > .itemLinkPET, :root [href^="https://gmxvmvptfm.com/"], :root div[data-adunit], :root app-large-ad, :root [href^="https://turtlebids.irauctions.com/"] img, :root a[href^="https://www.adskeeper.com"], :root [href^="https://totlnkcl.com/"], :root [data-ad-module], :root a[data-oburl^="https://paid.outbrain.com/network/redir?"], :root div[data-ad-targeting], :root a[href^="https://hotplaystime.life/"], :root a[href^="http://www.h4trck.com/"], :root [href^="https://trackfin.asia/"], :root .plistaList > .plista_widget_underArticle_item[data-type="pet"], :root a[href^="https://bs.serving-sys.com"], :root [href^="http://residenceseeingstanding.com/"], :root div[id^="pa_sticky_ad_box_middle_"], :root a[href^="http://www.onclickmega.com/jump/next.php?"], :root .trc_rbox_border_elm .syndicatedItem, :root a[href*="//lkstrck2.com/"], :root [class^="div-gpt-ad"], :root a[href^="https://ggbetpromo.com/"], :root a[href^="http://partners.etoro.com/"], :root [data-advadstrackid], :root a[href^="https://refpazkjixes.top/"], :root #mgb-container > #mgb, :root [href^="https://www.cloudways.com/en/?id"], :root [href^="https://safer-redirection.com"], :root a[href^="https://startgAming.net/tienda/"], :root a[href^="https://tweakostensibleinstaller.com/"], :root a[href^="https://go.xlivrdr.com"], :root a[href^="https://cam4com.go2cloud.org/"], :root a[href^="http://li.blogtrottr.com/click?"], :root [href^="//mage98rquewz.com/"], :root a[href^="https://webroutetrk.com/"], :root a[href^="https://mercurybest.com/"], :root [href^="https://www.restoro.com/"], :root div[id^="optidigital-adslot"], :root .resultsList > div > div > div > div.G-5c[role="tab"][tabindex="0"] > .yuAt-pres-rounded { display: none !important; } 

</style>

<style>
    .toti{
        color : white;
    }
    .toti2,.badge{
        color :#e4381C;
    }

    .toti:hover{
        color :white;
    }
    .hidden {
            display: none;
        }


.map-contact-detalis{
    position: absolute;
    top: 250px; /* Ajustez la valeur en fonction de votre mise en page */
    right: 100px; /* Ajustez la valeur en fonction de votre mise en page */
    z-index: 999; /* Assurez-vous que le bouton est au-dessus des autres éléments si nécessaire */
    

}
/* Styles pour le formulaire */
.form {
  max-width: 600px; /* Largeur maximale du formulaire */
  margin: 0 auto; /* Centrer le formulaire horizontalement */
  padding: 20px; /* Espace intérieur */
   border: 1px solid #000; /* Bordure autour du formulaire */
  border-radius: 6px; /* Coins arrondis */
}

/* Styles pour les labels */
label {
  display: block; /* Chaque label sur une ligne */
  margin-bottom: 5px; /* Marge en bas pour l'espacement */
  font-size: 16px; /* Taille de police */
  color: #000; /* Couleur du texte en noir */
}
.erreur {
  color:red; 
}

/* Styles pour les inputs */
input[type="text"],
textarea,
select {
  width: calc(100% - 20px); /* Largeur - marge */
  padding: 8px; /* Espace intérieur */
  margin-bottom: 10px; /* Marge en bas pour l'espacement */
  border: 1px solid #000; /* Bordure noire */
  border-radius: 4px; /* Coins arrondis */
  font-size: 16px; /* Taille de police */
  color: #000; /* Couleur du texte en noir */
}

/* Style pour le bouton */
button {
  padding: 10px 20px; /* Espace intérieur */
  border: none; /* Supprime la bordure */
  border-radius: 4px; /* Coins arrondis */
  font-size: 16px; /* Taille de police */
  color: #fff; /* Couleur du texte en blanc */
  background-color: #000; /* Couleur de fond en noir */
  cursor: pointer; /* Curseur au survol */
}

/* Style pour les options du select */
select option {
  color: #000; /* Couleur du texte en noir */
}


    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder" style="display: none;">
        <div class="loader" style="display: none;"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.html">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <div class="top-social">
                <a href="listePanier2.php"><img src="img/panier2.png"></a>
                <label class="badge" id="badge"><?php  echo $quantii; ?></label>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="container">
                <div class="nav-menu">
                    <nav class="mainmenu mobile-menu">
                        <ul>
                        <li><a href="./index.php">Home</a></li>
                            <li><a href="./about-us.html">About us</a></li>
                            <li><a href="./schedule.html">Schedule</a></li>
                            <li ><a href="./gallery.php">Produits</a></li>
                            <li class="active"><a href="./forum.php">Forum</a></li>
                            <li><a href="./contact.html">Contacts</a></li>
                            <li><a href="./searchCours.php">Cours</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="map-contact-detalis">
                <div class="open-time">
                    <?php if (isset($list) && !empty($list)): $tot = 0;  $quant = 0; ?>
                            <center><h4>votre commande :</h4></center>
                            <br/>
                            <h5>Vos produit:</h5>
                            <br/>
                            <hr/>
                        
                            <?php foreach ($list as $p): $produit = $produitC->showproduit($p['id_produit']); $tot += $p['totale']; $quant += $p['quantite']; ?>
                                <h6> <?php echo $produit['nom'].'   *  '. $p['quantite'] . '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'.' prix : '. $produit['prix'] . ' DT '?> <h6> </br/>
                                <?php endforeach; ?>
                           
                            <br/>
                            <br/>
                            <br/>
                            <h3 id="tot_commande">Totale Commande : <?php echo $tot . ' DT '; ?></h3>
                            <?php else: ?>
                            <p class="no-ps">Votre panier est vide</p>
                            <?php endif; ?>
                    
                    </div>
                </div>
            </div>
            
            <div id="mobile-menu-wrap"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;"><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><nav class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
                        <ul>
                            <li><a href="./index.html" role="menuitem">Home</a></li>
                            <li><a href="./about-us.html" role="menuitem">About us</a></li>
                            <li class="active"><a href="./schedule.html" role="menuitem">Schedule</a></li>
                            <li><a href="./gallery.html" role="menuitem">Gallery</a></li>
                            <li class="slicknav_collapsed slicknav_parent"><a href="#" role="menuitem" aria-haspopup="true" tabindex="-1" class="slicknav_item slicknav_row" style="outline: none;"><a href="./blog.html">Blog</a>
                                <span class="slicknav_arrow">►</span></a><ul class="dropdown slicknav_hidden" role="menu" aria-hidden="true" style="display: none;">
                                    <li><a href="./about-us.html" role="menuitem" tabindex="-1">About Us</a></li>
                                    <li><a href="./blog-single.html" role="menuitem" tabindex="-1">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html" role="menuitem">Contacts</a></li>
                        </ul>
                    </nav></div></div>
        </div>
    </header>
    <center>
    <div class="form">
                         <h2>Formulaire de Commande</h2>
                         <br/>
                    <form action="" method="POST" onsubmit="return validerFormulaire()">
                            
                                    <div class="col-lg-6">
                                        <label for="ville">Ville :</label><br>
                                        <input type="text" id="ville" name="ville"><br><br>
                                        <label id="erreur_ville" class="erreur" ></label><br><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="code_postal">Code Postal :</label><br>
                                        <input type="text" id="code_postal" name="code_postal"><br><br>
                                        <label id="erreur_code_postal" class="erreur" ></label><br><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="adresse">Adresse :</label><br>
                                        <textarea id="adresse" name="adresse" rows="4" cols="50"></textarea><br><br>
                                        <label id="erreur_adresse" class="erreur"></label><br><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="methode_livraison">Méthode de Livraison :</label><br>
                                        <select id="methode_livraison" name="methode_livraison">
                                            <option value="retrait_salle">Retrait à la salle</option>
                                            <option value="transporteur">Transporteur (6 DT)</option>
                                        </select><br><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="methode_paiement">Methode de Paiement :</label><br>
                                        <select id="methode_paiement" name="methode_paiement" >
                                            <option value="sur_place">Sur Place</option>
                                            <option value="carte">Par Carte</option>
                                        </select><br><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="champsCarte" class="hidden" id="champsCarte">
                                            <label for="num" >Numéro de Carte :</label>
                                            <input type="text" id="num" name="num" >
                                            <label id="erreur_num" class="erreur" ></label><br><br>
                                            <label for="cvv" >Code CVV :</label>
                                            <input type="text" id="cvv" name="cvv" >
                                            <label id="erreur_cvv" class="erreur"></label><br><br>
                                            <label for="exp" >Date d'expiration :</label>
                                            <input type="text" id="exp" name="exp" >
                                            <label id="erreur_exp" class="erreur"></label><br><br>
                                            <label for="titulaire">Titulaire de la Carte:</label>
                                            <input type="text" id="titulaire" name="titulaire" >
                                            <label id="erreur_titulaire" class="erreur"></label><br><br>
                                        </div>
                                    </div>
                                    <input type="hidden" id="prix_commande" name="prix_commande" value="<?php echo $tot; ?>" >
                                    <div class="col-lg-12">
                                        <button type="submit" class="c-btn" name="submit">Valider La commande</button>
                                    </div>
                                
                    </form>
                </div><center>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    
    <!-- Breadcrumb End -->

    <!-- Class Time Section Begin -->
    <!-- Class Time Section End -->

    <!-- Classes Section Begin -->
    
    <!-- Classes Section End -->

    <!-- Choseus Section Begin -->
    
    <!-- Choseus Section End -->

    <!-- Cta Section Begin -->
    
    <!-- Cta Section End -->

    <!-- Footer Section Begin -->
    
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script>
        // Récupération de l'élément select pour la méthode de paiement
        var methodePaiement = document.getElementById("methode_paiement");
        var methodeLivraison = document.getElementById("methode_livraison");
        // Récupération de la div contenant les champs de la carte
        var champsCarte = document.getElementById("champsCarte");
        
        // Ajout d'un écouteur d'événement pour détecter les changements dans la sélection de la méthode de paiement
        methodePaiement.addEventListener("change", function() {
            // Si la méthode de paiement choisie est "Carte"
            if (methodePaiement.value === "carte") {
                // Afficher les champs de la carte
                champsCarte.classList.remove("hidden");
            } else {
                // Masquer les champs de la carte
                champsCarte.classList.add("hidden");
            }
        });

        methodeLivraison.addEventListener("change", function() {

            var totale=document.getElementById("prix_commande").value;
            var char="Totale Commande :";
            totale=parseInt(totale);
            if (methodeLivraison.value === "transporteur") {
                totale+=6;
                <?php $tot+=6 ;?>
                totale+=' DT ';
                char+=totale;
                document.getElementById("tot_commande").innerText=char; 
                document.getElementById("prix_commande").value=<?php echo $tot ; ?>;
            } else {
                totale-=6;
                <?php $tot-=6 ;?>
                totale+=' DT ';
                char+=totale;
                document.getElementById("tot_commande").innerText= char;
                document.getElementById("prix_commande").value=<?php echo $tot ; ?>;
            }
        });


function validerFormulaire() {
    var ville=document.getElementById("ville").value;
    var code=document.getElementById("code_postal").value;
    var adresse=document.getElementById("adresse").value;
    var erreur_ville=document.getElementById("erreur_ville");
    var erreur_code=document.getElementById("erreur_code_postal");
    var erreur_adresse=document.getElementById("erreur_adresse");


if(ville=="" || estEntier(ville) ){
    erreur_ville.innerHTML="veuillez saisir une ville "; return false;

}
else 
    erreur_ville.innerHTML="";
if(code=="" || !estEntier(code) || code<1000 || code>9999 ){
    erreur_code.innerHTML="veuillez saisir un code postale correcte "; return false;

}
else 
    erreur_code.innerHTML="";

if(adresse==""){
    erreur_adresse.innerHTML="veuillez saisir une adresse "; return false;

}
else 
    erreur_adresse.innerHTML="";

var methode = document.getElementById("methode_paiement").value;
var champsCarte = document.getElementById("champsCarte");

// Vérification des champs selon la méthode de paiement sélectionnée
if (methode == "carte") {
    var num = document.getElementById("num").value;
    var titulaire = document.getElementById("titulaire").value;
    var exp= document.getElementById("exp").value;
    var cvv = document.getElementById("cvv").value;
    var erreur_num = document.getElementById("erreur_num");
    var erreur_titulaire = document.getElementById("erreur_titulaire");
    var erreur_exp= document.getElementById("erreur_exp");
    var erreur_cvv = document.getElementById("erreur_cvv");


    if (!estEntier(num) || num<1000000000000000 || num>9999999999999999 || !estEntier(cvv) || cvv<1000 || cvv>9999 || !estMoisAnnee(exp) || titulaire === "") {
        if(!estEntier(num) || num<1000000000000000 || num>9999999999999999){
            erreur_num.innerHTML="Veuillez saisir un numero de carte  correct (16 chiffres) Actuellement: " + num.length + " chiffres";return false;}
        else 
            erreur_num.innerHTML="";

        if(!estEntier(cvv) || cvv<1000 || cvv>9999 ){
            erreur_cvv.innerHTML="Veuillez saisir un code de carte  correct (4 chiffre )";return false;}
        else 
            erreur_cvv.innerHTML="";
        if(!estMoisAnnee(exp)){
            erreur_exp.innerHTML="Veuillez saisir une date d'expiration correct de la carte  (mm/aa) ";return false;}
        else 
            erreur_exp.innerHTML="";
        if(titulaire === ""){
            erreur_titulaire.innerHTML="Veuillez saisir un titulaire de la carte  ";return false;}
        else 
            erreur_titulaire.innerHTML="";

        return false;
    }
} 



return true; // Envoi du formulaire si tout est correct
}


function estEntier(chaine) {
return /^\d+$/.test(chaine);
}

function estMoisAnnee(chaine) {
return /^(0[1-9]|1[0-2])\/\d{2}$/.test(chaine);
}


    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>


</body></html>