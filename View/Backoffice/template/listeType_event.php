<?php
// Inclure le fichier du contrôleur
include ('C:\xampp\htdocs\fitness-gym-web\Controller\Type_eventC.php');

// Créer une instance du contrôleur
$type_eventController = new Type_eventC();

// Fetch type events and convert to array
$type_eventsStmt = $type_eventController->listeType_event();
$type_events = $type_eventsStmt->fetchAll(PDO::FETCH_ASSOC);

// Custom sorting function to sort by the first character of "Nom" alphabetically
usort($type_events, function ($a, $b) {
    return strcmp($a['nom'][0], $b['nom'][0]);
});
?>



<html lang="en"><head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png">
<style type="text/css" id="operaUserStyle"></style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">:root [href^="//x4pollyxxpush.com/"], :root zeus-ad, :root topadblock, :root span[id^="ezoic-pub-ad-placeholder-"], :root guj-ad, :root gpt-ad, :root div[id^="zergnet-widget"], :root div[id^="vuukle-ad-"], :root div[id^="sticky_ad_"], :root div[id^="rc-widget-"], :root div[id^="optidigital-adslot"], :root div[id^="gpt_ad_"], :root div[id^="ezoic-pub-ad-"], :root div[id^="div-gpt-"], :root div[id^="dfp-ad-"], :root div[id^="advads_ad_"], :root div[id^="adspot-"], :root div[id^="ads300_250-widget-"], :root div[id^="ads300_100-widget-"], :root div[id^="ads250_250-widget-"], :root div[id^="adrotate_widgets-"], :root div[id^="_vdo_ads_player_ai_"], :root div[id*="ScriptRoot"], :root div[id*="MarketGid"], :root div[data-native_ad], :root div[data-mini-ad-unit], :root div[data-insertion], :root div[data-id-advertdfpconf], :root div[data-google-query-id], :root hl-adsense, :root div[data-contentexchange-widget], :root div[data-content="Advertisement"], :root div[data-alias="300x250 Ad 2"], :root div[data-alias="300x250 Ad 1"], :root div[data-adzone], :root div[data-adunit-path], :root div[data-ad-wrapper], :root div[data-ad-placeholder], :root div[class^="native-ad-"], :root div[data-dfp-id], :root div[class^="kiwi-ad-wrapper"], :root div[class^="Adstyled__AdWrapper-"], :root div[aria-label="Ads"], :root display-ads, :root display-ad-component, :root atf-ad-slot, :root aside[id^="adrotate_widgets-"], :root article.ad, :root ark-top-ad, :root app-advertisement, :root app-ad, :root amp-fx-flying-carpet, :root amp-embed[type="taboola"], :root amp-connatix-player, :root amp-ad-custom, :root amp-ad, :root a[style="width:100%;height:100%;z-index:10000000000000000;position:absolute;top:0;left:0;"], :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[href^="https://yogacomplyfuel.com/"], :root a[href^="https://www.sugarinstant.com/?partner_id="], :root a[href^="https://www.privateinternetaccess.com/"] > img, :root a[href^="https://www.onlineusershielder.com/"], :root a[href^="https://www.nutaku.net/signup/landing/"], :root a[href^="https://www.nudeidols.com/cams/"], :root a[href^="https://www.mypornstarcams.com/landing/click/"], :root a[href^="https://www.kingsoffetish.com/tour?partner_id="], :root a[href^="https://www.infowarsstore.com/"] > img, :root a[href^="https://www.highcpmrevenuenetwork.com/"], :root a[href^="https://www.googleadservices.com/pagead/aclk?"], :root a[href^="https://www.goldenfrog.com/vyprvpn?offer_id="][href*="&aff_id="], :root a[href^="https://www.get-express-vpn.com/offer/"], :root a[href^="https://www.financeads.net/tc.php?"], :root a[href^="https://www.brazzersnetwork.com/landing/"], :root div[class^="Display_displayAd"], :root a[href^="https://www.sheetmusicplus.com/?aff_id="], :root a[href^="https://www.bang.com/?aff="], :root a[href^="https://www.adxsrve.com/"], :root a[href^="https://www.5mno3.com/"], :root a[href^="https://wirewar.website/"], :root a[href^="https://visit-website.com/"], :root a[href^="https://twinrdsyn.com/"], :root a[href^="https://twinrdsrv.com/"], :root a[href^="https://tsartech.g2afse.com/"], :root a[href^="https://trk.sportsflix4k.club/"], :root a[href^="https://trk.nfl-online-streams.club/"], :root a[href^="https://traffdaq.com/"], :root a[href^="https://tracking.avapartner.com/"], :root a[href^="https://track.wg-aff.com"], :root a[href^="https://track.ultravpn.com/"], :root a[href^="https://track.totalav.com/"], :root a[href^="https://track.afcpatrk.com/"], :root a[href^="https://torguard.net/aff.php"] > img, :root a[href^="https://taghaugh.com/"], :root a[href^="https://click.candyoffers.com/"], :root [href^="https://zstacklife.com/"] img, :root a[href^="https://t.aslnk.link/"], :root a[href^="https://t.adating.link/"], :root a[href^="https://go.trackitalltheway.com/"], :root [href^="https://track.fiverr.com/visit/"] > img, :root a[href^="https://syndication.exoclick.com/"], :root a[href^="https://syndication.dynsrvtbg.com/"], :root a[href^="https://streamate.com/landing/click/"], :root a[href^="https://ad.doubleclick.net/"], :root a[href^="https://static.fleshlight.com/images/banners/"], :root a[href^="https://slkmis.com/"], :root a[href^="https://sTaRtGAMing.net/tienda/"], :root citrus-ad-wrapper, :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"], :root a[href^="https://sTaRTgamInG.net/tienda/"], :root [data-adblockkey], :root a[href^="https://sTARtgamIng.net/tienda/"], :root .OUTBRAIN[data-widget-id^="FMS_REELD_"], :root [data-role="tile-ads-module"], :root a[href^="https://adsrv4k.com/"], :root a[href^="https://go.xlviirdr.com"], :root a[href^="https://thaudray.com/"], :root bottomadblock, :root a[href^="https://s.zlinkd.com/"], :root a[href^="https://aweptjmp.com/"], :root a[href^="https://s.zlinkc.com/"], :root a[href^="https://www.mrskin.com/account/"], :root a[href^="https://s.optzsrv.com/"], :root a[data-obtrack^="http://paid.outbrain.com/network/redir?"], :root a[href^="https://reinstandpointdumbest.com/"], :root a[href^="https://go.strpjmp.com/"], :root a[href^="https://refpa4903566.top/"], :root a[href^="https://pubads.g.doubleclick.net/"], :root a[href^="https://prf.hn/click/"][href*="/camref:"] > img, :root a[href^="https://serve.awmdelivery.com/"], :root a[href^="https://prf.hn/click/"][href*="/adref:"] > img, :root a[href^="https://pb-track.com/"], :root a[href^="https://paid.outbrain.com/network/redir?"], :root ps-connatix-module, :root div[id^="ad_position_"], :root a[href^="https://ovb.im/"], :root div[id^="ad-div-"], :root a[href^="https://newbinotracs.com/"], :root a[href^="https://natour.naughtyamerica.com/track/"], :root [href^="https://stvkr.com/"], :root a[href^="https://mediaserver.entainpartners.com/renderBanner.do?"], :root a[href^="https://loboclick.com"], :root .nya-slot[style], :root a[href^="https://a.bestcontentweb.top/"], :root a[href^="https://lobimax.com/"], :root a[href^="https://lead1.pl/"], :root a[href^="https://refpa.top/"], :root a[href^="https://landing.brazzersnetwork.com/"], :root a[href^="https://safesurfingtoday.com/"][href*="?skip="], :root a[href^="https://ads.leovegas.com/redirect.aspx?"], :root a[href^="https://land.brazzersnetwork.com/landing/"], :root a[href^="https://track.adform.net/"], :root [data-css-class="dfp-inarticle"], :root .card-captioned.crd > .crd--cnt > .s2nPlayer, :root a[href^="https://go.tmrjmp.com"], :root a[href^="https://startgamIng.Net/tienda/"], :root a[href^="https://l.hyenadata.com/"], :root a[href^="https://juicyads.in/"], :root a[href^="https://mediaserver.gvcaffiliates.com/renderBanner.do?"], :root a[href^="https://join.dreamsexworld.com/"], :root a[href^="https://itubego.com/video-downloader/?affid="], :root a[href^="https://iqbroker.com/"][href*="?aff="], :root a[href^="https://incisivetrk.cvtr.io/click?"], :root [href^="https://www.herbanomic.com/"] > img, :root a[href^="https://maymooth-stopic.com/"], :root div[data-ad-targeting], :root a[href^="https://hotplaystime.life/"], :root a[href^="https://hot-growngames.life/"], :root [data-revive-zoneid], :root a[href^="https://googleads.g.doubleclick.net/pcs/click"], :root a[href^="https://clk.wrenchsound.store/"], :root a[href^="https://go.zybrdr.com"], :root [href^="http://join.michelle-austin.com/"], :root [class^="tile-picker__CitrusBannerContainer-sc-"], :root a[href^="https://go.xxxiijmp.com"], :root a[href^="https://go.xtbaffiliates.com/"], :root a[href^="https://ismlks.com/"], :root a[href^="//a.bestcontentfare.top/"], :root [href^="https://www.mypillow.com/"] > img, :root a[href^="https://azpresearch.club/"], :root a[href^="https://go.xlirdr.com"], :root a[href^="https://go.skinstrip.net"][href*="?campaignId="], :root a[href^="https://go.markets.com/visit/?bta="], :root a[href^="https://billing.purevpn.com/aff.php"] > img, :root a[href^="https://go.hpyrdr.com/"], :root a[href^="https://go.goaserv.com/"], :root a[href^="https://go.dmzjmp.com"], :root a[href^="https://go.admjmp.com/"], :root [href^="https://kingered-banctours.com/"], :root a[href^="https://get.surfshark.net/aff_c?"][href*="&aff_id="] > img, :root a-ad, :root a[href^="https://affiliate.rusvpn.com/click.php?"], :root a[href^="https://geniusdexchange.com/"], :root a[href^="https://frameworkdeserve.com/"], :root a[href^="https://flirtandsweets.life/"], :root a[href^="https://www.mrskin.com/tour"], :root a[href^="https://financeads.net/tc.php?"], :root div[data-native-ad], :root a[href^="https://engine.trackingdesks.com/"], :root a[data-redirect^="https://paid.outbrain.com/network/redir?"], :root [href^="https://www.reimageplus.com/"], :root a[href^="https://engine.phn.doublepimp.com/"], :root a[href^="https://engine.blueistheneworanges.com/"], :root a[href^="https://dl-protect.net/"], :root [href="//jjgirls.com/sex/ChaturbateCams"], :root a[href^="https://datingoffers30.info/"], :root a[href^="https://clixtrac.com/"], :root a[href^="https://click.linksynergy.com/fs-bin/"] > img, :root ad-shield-ads, :root a[href^="https://sTartGAMinG.net/tienda/"], :root AD-TRIPLE-BOX, :root a[href^="https://click.hoolig.app/"], :root img[src^="https://images.purevpnaffiliates.com"], :root a[href^="https://porntubemate.com/"], :root a[href^="http://www.gfrevenge.com/landing/"], :root a[href^="https://clickadilla.com/"], :root a[href^="https://click.dtiserv2.com/"], :root a[href^="https://go.xlvirdr.com"], :root a[href^="http://www.iyalc.com/"], :root a[href^="https://claring-loccelkin.com/"], :root [class^="s2nPlayer"], :root a[href^="https://chaturbate.jjgirls.com/?track="], :root a[href^="https://chaturbate.com/in/?track="], :root a[href^="https://chaturbate.com/in/?tour="], :root a[href^="https://cams.imagetwist.com/in/?track="], :root a[href^="https://go.gldrdr.com/"], :root a[href^="https://buqkrzbrucz.com/"], :root a[href^="https://affcpatrk.com/"], :root a[href^="https://bongacams2.com/track?"], :root a[href^="https://www.sheetmusicplus.com/"][href*="?aff_id="], :root a[href^="https://bngpt.com/"], :root a[href^="https://bluedelivery.pro/"], :root a[href^="https://black77854.com/"], :root a[href^="https://bc.game/"], :root a[href^="https://ndt5.net/"], :root a[href^="https://batheunits.com/"], :root a[target="_blank"][onmousedown="this.href^='http://paid.outbrain.com/network/redir?"], :root a[href^="https://banners.livepartners.com/"], :root a[href^="//whulsaux.com/"], :root a[href^="https://m.do.co/c/"] > img, :root [href="https://masstortfinancing.com"] img, :root a[href^="https://bongacams10.com/track?"], :root a[href^="https://albionsoftwares.com/"], :root a[href^="https://t.hrtye.com/"], :root a[href^="https://go.etoro.com/"] > img, :root a[href^="https://convertmb.com/"], :root a[href^="https://join.sexworld3d.com/track/"], :root a[href^="https://intenseaffiliates.com/redirect/"], :root a[href^="https://ads.ad4game.com/"], :root [id^="google_ads_iframe"], :root a[href^="https://syndication.optimizesrv.com/"], :root a[href^="https://affpa.top/"], :root a[href^="https://adnetwrk.com/"], :root a[href^="https://adjoincomprise.com/"], :root [href^="http://misslinkvocation.com/"], :root a[href^="https://adclick.g.doubleclick.net/"], :root a[href^="https://www.bet365.com/"][href*="affiliate="], :root [href^="https://r.kraken.com/"], :root a[href^="https://mmwebhandler.aff-online.com/"], :root a[href^="https://go.nordvpn.net/aff"] > img, :root [href^="http://clicks.totemcash.com/"], :root a[href^="https://misspkl.com/"], :root a[href^="https://ad.zanox.com/ppc/"] > img, :root a[href^="https://ad.kubiccomps.icu/"], :root div[data-adname], :root a[href^="https://thechleads.pro/"], :root a[href^="https://ab.advertiserurl.com/aff/"], :root a[href^="https://a2.adform.net/"], :root a[href^="https://iactrivago.ampxdirect.com/"], :root a[href^="https://a.medfoodhome.com/"], :root a[href^="https://adultfriendfinder.com/go/"], :root a[href^="https://a.bestcontentoperation.top/"], :root a[href^="http://static.fleshlight.com/images/banners/"], :root a[href^="https://a.adtng.com/"], :root [data-m-ad-id], :root a[href^="https://sTartgAminG.net/tienda/"], :root a[href^="https://a-ads.com/"], :root a[href^="https://join.virtualtaboo.com/track/"], :root a[href^="https://StarTGAminG.net/tienda/"], :root a[href^="https://STaRTgamINg.net/tienda/"], :root a[href^="https://cpmspace.com/"], :root [href^="https://freecourseweb.com/"] > .sitefriend, :root a[href^="https://prf.hn/click/"][href*="/creativeref:"] > img, :root a[href^="http://www.adultempire.com/unlimited/promo?"][href*="&partner_id="], :root a[href^="https://1betandgonow.com/"], :root [href="https://ourgoldguy.com/contact/"] img, :root a[href^="https://brightadnetwork.com/"], :root [href^="https://www.avantlink.com/click.php"] img, :root a[href^="http://www.onwebcam.com/random?t_link="], :root a[href^="http://www.mrskin.com/tour"], :root a[href^="https://agacelebir.com/"], :root a[href^="https://spygasm.com/track?"], :root ins.adsbygoogle, :root a[href^="https://1startfiledownload1.com/"], :root a[href^="https://s.zlinkb.com/"], :root a[href^="http://d2.zedo.com/"], :root a[href^="http://www.friendlyduck.com/AF_"], :root a[href^="http://trk.globwo.online/"], :root a[href^="http://traffic.tc-clicks.com/"], :root a[href^="http://tour.mrskin.com/"], :root [href^="https://wct.link/"], :root [data-desktop-ad-id], :root a[href^="https://www.purevpn.com/"][href*="&utm_source=aff-"], :root a[href^="http://m.hue2m.com/"], :root a[href^="https://funkydaters.com/"], :root [id^="ad_sky"], :root a[href^="http://https://www.get-express-vpn.com/offer/"], :root div[id^="google_dfp_"], :root a[href^="http://googleads.g.doubleclick.net/pcs/click"], :root [href^="http://go.cm-trk2.com/"], :root a[href^="http://click.payserve.com/"], :root a[href^="https://porngames.adult/?SID="], :root a[href^="https://landing1.brazzersnetwork.com"], :root #slashboxes > .deals-rail, :root [href^="http://globsads.com/"], :root [href^="https://www.brighteonstore.com/products/"] img, :root a[href^="http://bc.vc/?r="], :root a[href^="https://mityneedn.com/"], :root [href^="http://homemoviestube.com/"], :root a[href^="http://ad.doubleclick.net/"], :root a[href^="//zunsoach.com/"], :root a[href^="//s.st1net.com/splash.php"], :root a[href^="//pubads.g.doubleclick.net/"], :root a[href^="https://femglobal.app/"], :root a[href^="//go.eabids.com/"], :root a[data-url^="http://paid.outbrain.com/network/redir?"] + .author, :root [href^="https://join.playboyplus.com/track/"], :root a[href^="//ardslediana.com/"], :root [data-d-ad-id], :root a[href*=".engine.adglare.net/"], :root #kt_player > a[target="_blank"], :root a[href*=".cfm?fp="][href*="&maxads="], :root [data-ad-width], :root a[href^="http://bodelen.com/"], :root a[data-oburl^="https://paid.outbrain.com/network/redir?"], :root [href^="https://cpa.10kfreesilver.com/"], :root a[href^="https://a.bestcontentfood.top/"], :root a[href^="http://wct.link/"], :root [href^="https://goldforyourfuture.com/clk.trk"] img, :root [onclick^="location.href='http://www.reimageplus.com"], :root [id^="section-ad-banner"], :root a[href^="https://go.julrdr.com/"], :root .trc_rbox_div .syndicatedItemUB, :root [href^="https://zone.gotrackier.com/"], :root [href^="https://detachedbates.com/"], :root [href^="https://www.targetingpartner.com/"], :root a[href^="https://fourwhenstatistics.com/"], :root [href^="https://www.restoro.com/"], :root a[href^="https://yourperfectdating.life/"], :root a[href^="https://join.virtuallust3d.com/"], :root .section-subheader > .section-hotel-prices-header, :root [href^="https://go.affiliatexe.com/"], :root [href^="https://www.hostg.xyz/"] > img, :root a[href^="http://adultfriendfinder.com/go/"], :root a[href^="https://fastestvpn.com/lifetime-special-deal?a_aid="], :root a[href^="https://tour.mrskin.com/"], :root div[id^="ad-position-"], :root a[href^="http://affiliate.glbtracker.com/"], :root a[href^="https://leg.xyz/?track="], :root div[id^="crt-"][style], :root a[href^="http://adultgames.xxx/"], :root [href^="https://shiftnetwork.infusionsoft.com/go/"] > img, :root a[href^="https://trk.softonixs.xyz/"], :root [href^="https://www.mypatriotsupply.com/"] > img, :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"], :root [href^="https://secure.bmtmicro.com/servlets/"], :root a[href^="https://losingoldfry.com/"], :root .scroll-fixable.rail-right > .deals-rail, :root [href^="https://routewebtk.com/"], :root a[href^="https://oackoubs.com/"], :root a[href^="https://ak.psaltauw.net/"], :root a[href^="https://go.cmtaffiliates.com/"], :root [data-name="adaptiveConstructorAd"], :root [href^="https://optimizedelite.com/"] > img, :root a[href^="https://awptjmp.com/"], :root a[href^="https://go.goasrv.com/"], :root [href^="http://mypillow.com/"] > img, :root a[href^="http://bongacams.com/track?"], :root a[href^="https://fleshlight.sjv.io/"], :root [data-ad-manager-id], :root a[href^="https://promo-bc.com/"], :root a[href^="https://clicks.pipaffiliates.com/"], :root [href^="https://noqreport.com/"] > img, :root a[href^="https://www.highperformancecpmgate.com/"], :root a[href^="https://t.grtyi.com/"], :root [href^="https://mylead.global/stl/"] > img, :root [href^="https://mypatriotsupply.com/"] > img, :root [data-freestar-ad], :root a[href^="https://fc.lc/ref/"], :root .vid-present > .van_vid_carousel__padding, :root span[data-ez-ph-id], :root [href^="https://track.aftrk1.com/"], :root div[id^="adngin-"], :root [data-rc-widget], :root a[href^="https://go.xxxijmp.com"], :root [href^="https://istlnkcl.com/"], :root a[href^="https://staRTgaming.net/tienda/"], :root a[href^="https://STaRtgAmInG.net/tienda/"], :root [href^="https://ilovemyfreedoms.com/landing-"], :root [href^="https://go.xlrdr.com"], :root [href^="https://go.4rabettraff.com/"], :root a[href^="https://tm-offers.gamingadult.com/"], :root [href^="https://charmingdatings.life/"], :root [href^="https://glersakr.com/"], :root .trc_rbox_border_elm .syndicatedItem, :root div[id^="pa_sticky_ad_box_middle_"], :root a[href^="http://www.onclickmega.com/jump/next.php?"], :root a[href^="https://italarizege.xyz/"], :root a[href^="https://wittered-mainging.com/"], :root [href^="https://engine.gettopple.com/"], :root [data-id^="div-gpt-ad"], :root a[href^="https://tracker.loropartners.com/"], :root [href^="https://awbbjmp.com/"], :root a[href^="https://k2s.cc/pr/"], :root [href^="https://affect3dnetwork.com/track/"], :root a[href^="https://camfapr.com/landing/click/"], :root [href="//sexcams.plus/"], :root a[href^="https://go.currency.com/"], :root .resultsList > div > div > div.G-5c[role="tab"][tabindex="0"], :root [href^="http://www.mypillow.com/"] > img, :root div[id^="div-ads-"], :root [href^="https://rapidgator.net/article/premium/ref/"], :root [href^="https://join3.bannedsextapes.com"], :root div[data-spotim-slot], :root [href^="https://antiagingbed.com/discount/"] > img, :root a[href^="https://go.247traffic.com/"], :root [href^="https://join.girlsoutwest.com/"], :root [href^="http://trafficare.net/"], :root a[href^="https://tc.tradetracker.net/"] > img, :root a[href^="https://adserver.adreactor.com/"], :root [href^="http://join.shemalesfromhell.com/"], :root [id^="ad_slider"], :root #searchResultsList > div > div[onclick$="'inline.ad'});"], :root [data-adbridg-ad-class], :root a[href^="http://www.adultdvdempire.com/?partner_id="][href*="&utm_"], :root [href^="http://join.shemale.xxx/"], :root a[href^="https://ads.betfair.com/redirect.aspx?"], :root [href^="http://www.fleshlightgirls.com/"], :root [href^="http://join.trannies-fuck.com/"], :root .trc_rbox .syndicatedItem, :root a[href^="http://cam4com.go2cloud.org/aff_c?"], :root a[href^="https://thefacux.com/"], :root a[href^="https://ads.planetwin365affiliate.com/redirect.aspx?"], :root [href^="http://join.rodneymoore.com/"], :root [href^="https://shrugartisticelder.com"], :root a[href^="https://staRTgamIng.net/tienda/"], :root div[id^="lazyad-"], :root a[href^="http://com-1.pro/"], :root [name^="google_ads_iframe"], :root [href="https://www.masstortfinancing.com/"] > img, :root .ob_container .item-container-obpd, :root [id^="div-gpt-ad"], :root a[href^="https://www.geekbuying.com/dynamic-ads/"], :root a[href^="https://lnkxt.bannerator.com/"], :root [href="https://jdrucker.com/gold"] > img, :root [href^="https://v.investologic.co.uk/"], :root [href^="https://cipledecline.buzz/"], :root a[href^="https://go.xxxjmp.com"], :root #leader-companion > a[href], :root a[href^="https://jaxofuna.com/"], :root div[recirculation-ad-container], :root [href^="https://traffserve.com/"], :root [data-type="ad-vertical"], :root a[href^="https://u.expresstech.io/"], :root [href^="https://mypillow.com/"] > img, :root [href^="https://ad.admitad.com/"], :root [data-testid="ad_testID"], :root [href^="https://goldcometals.com/clk.trk"], :root a[href^="https://bodelen.com/"], :root [data-ad-name], :root a[href*=".g2afse.com/"], :root a[href^="https://go.hpyjmp.com"], :root [href^="https://mystore.com/"] > img, :root [data-mobile-ad-id], :root a[href^="http://tc.tradetracker.net/"] > img, :root a[href^="http://affiliates.thrixxx.com/"], :root div[id^="yandex_ad"], :root a[href^="https://pb-imc.com/"], :root a[href^="https://www.adultempire.com/"][href*="?partner_id="], :root [data-template-type="nativead"], :root [data-ez-name], :root a[data-widget-outbrain-redirect^="http://paid.outbrain.com/network/redir?"], :root [data-dynamic-ads], :root a[href^="http://go.xtbaffiliates.com/"], :root a[href^="https://consali.com/"], :root .grid > .container > #aside-promotion, :root DFP-AD, :root .trc_related_container div[data-item-syndicated="true"], :root a[href^="https://www.liquidfire.mobi/"], :root [href^="https://click2cvs.com/"], :root [href^="//mage98rquewz.com/"], :root a[href^="https://webroutetrk.com/"], :root a[href^="https://mercurybest.com/"], :root a[href^="https://startgAming.net/tienda/"], :root [href^="https://safer-redirection.com"], :root [onclick*="content.ad/"], :root AMP-AD, :root a[href^="https://sTartGAMiNG.net/tienda/"], :root [data-ad-cls], :root [id^="ad-wrap-"], :root div[id^="taboola-stream-"], :root [href^="https://go.astutelinks.com/"], :root [class^="amp-ad-"], :root [href^="https://affiliate.fastcomet.com/"] > img, :root [class^="adDisplay-module"], :root AD-SLOT, :root .ob_dual_right > .ob_ads_header ~ .odb_div, :root [href^="http://join.shemalepornstar.com/"], :root a[href^="https://go.xlviiirdr.com"], :root .trc_rbox_div .syndicatedItem, :root div[data-adunit], :root app-large-ad, :root [href^="https://turtlebids.irauctions.com/"] img, :root a[href^="https://www.adskeeper.com"], :root [href^="https://totlnkcl.com/"], :root [data-ad-module], :root .plistaList > .itemLinkPET, :root [href^="https://gmxvmvptfm.com/"], :root [href^="https://trackfin.asia/"], :root .plistaList > .plista_widget_underArticle_item[data-type="pet"], :root a[href*="//lkstrck2.com/"], :root a[href^="https://bs.serving-sys.com"], :root [href^="http://residenceseeingstanding.com/"], :root [class^="div-gpt-ad"], :root a[href^="https://ggbetpromo.com/"], :root a[href^="http://partners.etoro.com/"], :root [data-advadstrackid], :root a[href^="https://refpazkjixes.top/"], :root #mgb-container > #mgb, :root [href^="https://www.cloudways.com/en/?id"], :root a[href^="https://tweakostensibleinstaller.com/"], :root a[href^="https://go.xlivrdr.com"], :root a[href^="https://cam4com.go2cloud.org/"], :root a[href^="http://li.blogtrottr.com/click?"] { display: none !important; }</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
<body class="">
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner d-none d-flex" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
              <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&amp;utm_medium=banner&amp;utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo"></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo"></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                <span>Gold Member</span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar-today text-success"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items active">
          <a class="nav-link" href="index.html">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Gestion Cours
</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Cours</a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Categorie Cours</a></li>
              
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-bs-toggle="collapse" href="#abonnement" aria-expanded="true">                
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Gestion <br> Abonnements</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse show" id="abonnement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="ll.php">Abonnements</a></li>
          
        </ul></div></li>
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#produit" aria-expanded="false">                
           <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Gestion <br> Produits</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="produit" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Produits</a></li>
          
        </ul></div>
<div class="collapse" id="produit" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Types Produits</a></li>
          
        </ul></div></li>
        
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#evennement" aria-expanded="false">                
           <span class="menu-icon">
              <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Gestion <br> Evenements</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="http://localhost/fitness-gym-web/View/Backoffice/template/listeEvent.php">Evenements</a></li>
          
        </ul></div>
<div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="http://localhost/fitness-gym-web/View/Backoffice/template/listeType_event.php">Type Evenements</a></li>
          
        </ul></div>
        <div class="collapse" id="evennement" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="http://localhost/fitness-gym-web/View/Backoffice/template/searchEvent.php">Rechercher un Evenement</a></li>
          
        </ul></div></li>
        
        <li class="nav-item menu-items">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#forum" aria-expanded="false">                
          <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
            </span>
            <span class="menu-title">Gestion <br> Forum</span>
   <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="forum" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Posts</a></li>
          
        </ul></div>
<div class="collapse" id="forum" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Commentaires</a></li>
          
        </ul></div></li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo"></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
            
            
            
            
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">Advanced settings</p>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
   
          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title"><i class="text-danger">Type des Evénements</i></h4>
                  <div class="table-responsive">
                  <body>
                  <center><h2><a href="addType_event.php" class="text-warning">Liste des Types Evénements</a></h2></center>
                    
                    <table class="table table-hover">
                        <tr>
                            <th>Id Type_Evenement</th>
                            <th>Nom</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    
                    
                        <?php
                        // Afficher les joueurs dans le tableau
                        foreach ($type_events as $type_event) {
                        ?>
                            <tr>
                            <td><?php echo $type_event['idtype_event'] ?> </td>
                            <td><?php echo $type_event['nom'] ?> </td>
                            <td align="center">
                                    <form method="POST" action="updateType_event.php">
                                        <input type="submit" name="update" value="Update" class="btn btn-success btn-rounded btn-fw">
                                        <input type="hidden" value=<?PHP echo $type_event['idtype_event']; ?> name="idtype_event">
                                    </form>
                                </td>
                                <td>
                                <a class="btn btn-outline-danger btn-fw" href="deleteType_event.php?idtype_event=<?php echo $type_event['idtype_event']?>" > DELETE </a> 
                                </td>
                            </tr>
                            <?php
                              }
                            ?>
                        </table>
                  </body>
                  </div>
                </div>
              </div>
            </div>
          </div>
           
         
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->

<div class="jvectormap-tip"></div><div class="jvectormap-tip"></div><div class="jvectormap-tip"></div><div class="jvectormap-tip"></div><div class="jvectormap-tip"></div></body></html>