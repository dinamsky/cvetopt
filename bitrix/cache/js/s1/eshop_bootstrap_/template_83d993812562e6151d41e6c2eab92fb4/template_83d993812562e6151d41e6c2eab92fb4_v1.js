
; /* Start:"a:4:{s:4:"full";s:67:"/bitrix/components/bitrix/search.title/script.min.js?16382887666443";s:6:"source";s:48:"/bitrix/components/bitrix/search.title/script.js";s:3:"min";s:52:"/bitrix/components/bitrix/search.title/script.min.js";s:3:"map";s:52:"/bitrix/components/bitrix/search.title/script.map.js";}"*/
function JCTitleSearch(t){var e=this;this.arParams={AJAX_PAGE:t.AJAX_PAGE,CONTAINER_ID:t.CONTAINER_ID,INPUT_ID:t.INPUT_ID,MIN_QUERY_LEN:parseInt(t.MIN_QUERY_LEN)};if(t.WAIT_IMAGE)this.arParams.WAIT_IMAGE=t.WAIT_IMAGE;if(t.MIN_QUERY_LEN<=0)t.MIN_QUERY_LEN=1;this.cache=[];this.cache_key=null;this.startText="";this.running=false;this.runningCall=false;this.currentRow=-1;this.RESULT=null;this.CONTAINER=null;this.INPUT=null;this.WAIT=null;this.ShowResult=function(t){if(BX.type.isString(t)){e.RESULT.innerHTML=t}e.RESULT.style.display=e.RESULT.innerHTML!==""?"block":"none";var s=e.adjustResultNode();var i;var n;var l=BX.findChild(e.RESULT,{tag:"table",class:"title-search-result"},true);if(l){n=BX.findChild(l,{tag:"th"},true)}if(n){var r=BX.pos(l);r.width=r.right-r.left;var a=BX.pos(n);a.width=a.right-a.left;n.style.width=a.width+"px";e.RESULT.style.width=s.width+a.width+"px";e.RESULT.style.left=s.left-a.width-1+"px";if(r.width-a.width>s.width)e.RESULT.style.width=s.width+a.width-1+"px";r=BX.pos(l);i=BX.pos(e.RESULT);if(i.right>r.right){e.RESULT.style.width=r.right-r.left+"px"}}var o;if(l)o=BX.findChild(e.RESULT,{class:"title-search-fader"},true);if(o&&n){i=BX.pos(e.RESULT);o.style.left=i.right-i.left-18+"px";o.style.width=18+"px";o.style.top=0+"px";o.style.height=i.bottom-i.top+"px";o.style.display="block"}};this.onKeyPress=function(t){var s=BX.findChild(e.RESULT,{tag:"table",class:"title-search-result"},true);if(!s)return false;var i;var n=s.rows.length;switch(t){case 27:e.RESULT.style.display="none";e.currentRow=-1;e.UnSelectAll();return true;case 40:if(e.RESULT.style.display=="none")e.RESULT.style.display="block";var l=-1;for(i=0;i<n;i++){if(!BX.findChild(s.rows[i],{class:"title-search-separator"},true)){if(l==-1)l=i;if(e.currentRow<i){e.currentRow=i;break}else if(s.rows[i].className=="title-search-selected"){s.rows[i].className=""}}}if(i==n&&e.currentRow!=i)e.currentRow=l;s.rows[e.currentRow].className="title-search-selected";return true;case 38:if(e.RESULT.style.display=="none")e.RESULT.style.display="block";var r=-1;for(i=n-1;i>=0;i--){if(!BX.findChild(s.rows[i],{class:"title-search-separator"},true)){if(r==-1)r=i;if(e.currentRow>i){e.currentRow=i;break}else if(s.rows[i].className=="title-search-selected"){s.rows[i].className=""}}}if(i<0&&e.currentRow!=i)e.currentRow=r;s.rows[e.currentRow].className="title-search-selected";return true;case 13:if(e.RESULT.style.display=="block"){for(i=0;i<n;i++){if(e.currentRow==i){if(!BX.findChild(s.rows[i],{class:"title-search-separator"},true)){var a=BX.findChild(s.rows[i],{tag:"a"},true);if(a){window.location=a.href;return true}}}}}return false}return false};this.onTimeout=function(){e.onChange(function(){setTimeout(e.onTimeout,500)})};this.onChange=function(t){if(e.running){e.runningCall=true;return}e.running=true;if(e.INPUT.value!=e.oldValue&&e.INPUT.value!=e.startText){e.oldValue=e.INPUT.value;if(e.INPUT.value.length>=e.arParams.MIN_QUERY_LEN){e.cache_key=e.arParams.INPUT_ID+"|"+e.INPUT.value;if(e.cache[e.cache_key]==null){if(e.WAIT){var s=BX.pos(e.INPUT);var i=s.bottom-s.top-2;e.WAIT.style.top=s.top+1+"px";e.WAIT.style.height=i+"px";e.WAIT.style.width=i+"px";e.WAIT.style.left=s.right-i+2+"px";e.WAIT.style.display="block"}BX.ajax.post(e.arParams.AJAX_PAGE,{ajax_call:"y",INPUT_ID:e.arParams.INPUT_ID,q:e.INPUT.value,l:e.arParams.MIN_QUERY_LEN},function(s){e.cache[e.cache_key]=s;e.ShowResult(s);e.currentRow=-1;e.EnableMouseEvents();if(e.WAIT)e.WAIT.style.display="none";if(!!t)t();e.running=false;if(e.runningCall){e.runningCall=false;e.onChange()}});return}else{e.ShowResult(e.cache[e.cache_key]);e.currentRow=-1;e.EnableMouseEvents()}}else{e.RESULT.style.display="none";e.currentRow=-1;e.UnSelectAll()}}if(!!t)t();e.running=false};this.onScroll=function(){if(BX.type.isElementNode(e.RESULT)&&e.RESULT.style.display!=="none"&&e.RESULT.innerHTML!==""){e.adjustResultNode()}};this.UnSelectAll=function(){var t=BX.findChild(e.RESULT,{tag:"table",class:"title-search-result"},true);if(t){var s=t.rows.length;for(var i=0;i<s;i++)t.rows[i].className=""}};this.EnableMouseEvents=function(){var t=BX.findChild(e.RESULT,{tag:"table",class:"title-search-result"},true);if(t){var s=t.rows.length;for(var i=0;i<s;i++)if(!BX.findChild(t.rows[i],{class:"title-search-separator"},true)){t.rows[i].id="row_"+i;t.rows[i].onmouseover=function(t){if(e.currentRow!=this.id.substr(4)){e.UnSelectAll();this.className="title-search-selected";e.currentRow=this.id.substr(4)}};t.rows[i].onmouseout=function(t){this.className="";e.currentRow=-1}}}};this.onFocusLost=function(t){setTimeout(function(){e.RESULT.style.display="none"},250)};this.onFocusGain=function(){if(e.RESULT.innerHTML.length)e.ShowResult()};this.onKeyDown=function(t){if(!t)t=window.event;if(e.RESULT.style.display=="block"){if(e.onKeyPress(t.keyCode))return BX.PreventDefault(t)}};this.adjustResultNode=function(){if(!(BX.type.isElementNode(e.RESULT)&&BX.type.isElementNode(e.CONTAINER))){return{top:0,right:0,bottom:0,left:0,width:0,height:0}}var t=BX.pos(e.CONTAINER);e.RESULT.style.position="absolute";e.RESULT.style.top=t.bottom+2+"px";e.RESULT.style.left=t.left+"px";e.RESULT.style.width=t.width+"px";return t};this._onContainerLayoutChange=function(){if(BX.type.isElementNode(e.RESULT)&&e.RESULT.style.display!=="none"&&e.RESULT.innerHTML!==""){e.adjustResultNode()}};this.Init=function(){this.CONTAINER=document.getElementById(this.arParams.CONTAINER_ID);BX.addCustomEvent(this.CONTAINER,"OnNodeLayoutChange",this._onContainerLayoutChange);this.RESULT=document.body.appendChild(document.createElement("DIV"));this.RESULT.className="title-search-result";this.INPUT=document.getElementById(this.arParams.INPUT_ID);this.startText=this.oldValue=this.INPUT.value;BX.bind(this.INPUT,"focus",function(){e.onFocusGain()});BX.bind(this.INPUT,"blur",function(){e.onFocusLost()});this.INPUT.onkeydown=this.onKeyDown;if(this.arParams.WAIT_IMAGE){this.WAIT=document.body.appendChild(document.createElement("DIV"));this.WAIT.style.backgroundImage="url('"+this.arParams.WAIT_IMAGE+"')";if(!BX.browser.IsIE())this.WAIT.style.backgroundRepeat="none";this.WAIT.style.display="none";this.WAIT.style.position="absolute";this.WAIT.style.zIndex="1100"}BX.bind(this.INPUT,"bxchange",function(){e.onChange()});var t=BX.findParent(this.CONTAINER,BX.is_fixed);if(BX.type.isElementNode(t)){BX.bind(window,"scroll",BX.throttle(this.onScroll,100,this))}};BX.ready(function(){e.Init(t)})}
/* End */
;
; /* Start:"a:4:{s:4:"full";s:92:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/mobile/script.min.js?1638297703409";s:6:"source";s:74:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/mobile/script.js";s:3:"min";s:78:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/mobile/script.min.js";s:3:"map";s:78:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/mobile/script.map.js";}"*/
var jsvhover=function(){var e=document.getElementById("vertical-multilevel-menu");if(!e)return;var t=e.getElementsByTagName("li");for(var n=0;n<t.length;n++){t[n].onmouseover=function(){this.className+=" jsvhover"};t[n].onmouseout=function(){this.className=this.className.replace(new RegExp(" jsvhover\\b"),"")}}};if(window.attachEvent)window.attachEvent("onload",jsvhover);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:98:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/catalog_left/script.min.js?1638297703409";s:6:"source";s:80:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/catalog_left/script.js";s:3:"min";s:84:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/catalog_left/script.min.js";s:3:"map";s:84:"/bitrix/templates/eshop_bootstrap_/components/bitrix/menu/catalog_left/script.map.js";}"*/
var jsvhover=function(){var e=document.getElementById("vertical-multilevel-menu");if(!e)return;var t=e.getElementsByTagName("li");for(var n=0;n<t.length;n++){t[n].onmouseover=function(){this.className+=" jsvhover"};t[n].onmouseout=function(){this.className=this.className.replace(new RegExp(" jsvhover\\b"),"")}}};if(window.attachEvent)window.attachEvent("onload",jsvhover);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:108:"/bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.element/index_one/script.min.js?163829770354375";s:6:"source";s:88:"/bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.element/index_one/script.js";s:3:"min";s:92:"/bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.element/index_one/script.min.js";s:3:"map";s:92:"/bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.element/index_one/script.map.js";}"*/
(function(t){if(!!t.JCCatalogElement){return}var i=function(t){i.superclass.constructor.apply(this,arguments);this.nameNode=BX.create("span",{props:{className:"bx_medium bx_bt_button",id:this.id},style:typeof t.style==="object"?t.style:{},text:t.text});this.buttonNode=BX.create("span",{attrs:{className:t.ownerClass},children:[this.nameNode],events:this.contextEvents});if(BX.browser.IsIE()){this.buttonNode.setAttribute("hideFocus","hidefocus")}};BX.extend(i,BX.PopupWindowButton);t.JCCatalogElement=function(t){this.productType=0;this.config={useCatalog:true,showQuantity:true,showPrice:true,showAbsent:true,showOldPrice:false,showPercent:false,showSkuProps:false,showOfferGroup:false,useCompare:false,useStickers:false,useSubscribe:false,mainPictureMode:"IMG",showBasisPrice:false,basketAction:["BUY"],showClosePopup:false};this.checkQuantity=false;this.maxQuantity=0;this.stepQuantity=1;this.isDblQuantity=false;this.canBuy=true;this.isGift=false;this.currentBasisPrice={};this.canSubscription=true;this.currentIsSet=false;this.updateViewedCount=false;this.precision=6;this.precisionFactor=Math.pow(10,this.precision);this.listID={main:["PICT_ID","BIG_SLIDER_ID","BIG_IMG_CONT_ID"],stickers:["STICKER_ID"],productSlider:["SLIDER_CONT","SLIDER_LIST","SLIDER_LEFT","SLIDER_RIGHT"],offerSlider:["SLIDER_CONT_OF_ID","SLIDER_LIST_OF_ID","SLIDER_LEFT_OF_ID","SLIDER_RIGHT_OF_ID"],offers:["TREE_ID","TREE_ITEM_ID","DISPLAY_PROP_DIV","OFFER_GROUP"],quantity:["QUANTITY_ID","QUANTITY_UP_ID","QUANTITY_DOWN_ID","QUANTITY_MEASURE","QUANTITY_LIMIT","BASIS_PRICE"],price:["PRICE_ID"],oldPrice:["OLD_PRICE_ID","DISCOUNT_VALUE_ID"],discountPerc:["DISCOUNT_PERC_ID"],basket:["BASKET_PROP_DIV","BUY_ID","ADD_BASKET_ID","BASKET_ACTIONS_ID","NOT_AVAILABLE_MESS"],magnifier:["MAGNIFIER_ID","MAGNIFIER_AREA_ID"],compare:["COMPARE_LINK_ID"],subscribe:["SUBSCRIBE_ID"]};this.visualPostfix={PICT_ID:"_pict",BIG_SLIDER_ID:"_big_slider",BIG_IMG_CONT_ID:"_bigimg_cont",STICKER_ID:"_sticker",SLIDER_CONT:"_slider_cont",SLIDER_LIST:"_slider_list",SLIDER_LEFT:"_slider_left",SLIDER_RIGHT:"_slider_right",SLIDER_CONT_OF_ID:"_slider_cont_",SLIDER_LIST_OF_ID:"_slider_list_",SLIDER_LEFT_OF_ID:"_slider_left_",SLIDER_RIGHT_OF_ID:"_slider_right_",TREE_ID:"_skudiv",TREE_ITEM_ID:"_prop_",DISPLAY_PROP_DIV:"_sku_prop",QUANTITY_ID:"_quantity",QUANTITY_UP_ID:"_quant_up",QUANTITY_DOWN_ID:"_quant_down",QUANTITY_MEASURE:"_quant_measure",QUANTITY_LIMIT:"_quant_limit",BASIS_PRICE:"_basis_price",PRICE_ID:"_price",OLD_PRICE_ID:"_old_price",DISCOUNT_VALUE_ID:"_price_discount",DISCOUNT_PERC_ID:"_dsc_pict",BASKET_PROP_DIV:"_basket_prop",BUY_ID:"_buy_link",ADD_BASKET_ID:"_add_basket_link",BASKET_ACTIONS_ID:"_basket_actions",NOT_AVAILABLE_MESS:"_not_avail",MAGNIFIER_ID:"_magnifier",MAGNIFIER_AREA_ID:"_magnifier_area",OFFER_GROUP:"_set_group_",COMPARE_LINK_ID:"_compare_link",SUBSCRIBE_ID:"_subscribe"};this.visual={};this.basketMode="";this.product={checkQuantity:false,maxQuantity:0,stepQuantity:1,startQuantity:1,isDblQuantity:false,canBuy:true,canSubscription:true,name:"",pict:{},id:0,addUrl:"",buyUrl:"",slider:{},sliderCount:0,useSlider:false,sliderPict:[]};this.mess={};this.basketData={useProps:false,emptyProps:false,quantity:"quantity",props:"prop",basketUrl:"",sku_props:"",sku_props_var:"basket_props",add_url:"",buy_url:""};this.compareData={compareUrl:"",comparePath:""};this.defaultPict={preview:null,detail:null};this.offers=[];this.offerNum=0;this.treeProps=[];this.obTreeRows=[];this.showCount=[];this.showStart=[];this.selectedValues={};this.sliders=[];this.obProduct=null;this.obQuantity=null;this.obQuantityUp=null;this.obQuantityDown=null;this.obBasisPrice=null;this.obPict=null;this.obPictAligner=null;this.obPrice={price:null,full:null,discount:null,percent:null};this.obTree=null;this.obBuyBtn=null;this.obAddToBasketBtn=null;this.obBasketActions=null;this.obNotAvail=null;this.obSubscribe=null;this.obSkuProps=null;this.obSlider=null;this.obMeasure=null;this.obQuantityLimit={all:null,value:null};this.obCompare=null;this.viewedCounter={path:"/bitrix/components/bitrix/catalog.element/ajax.php",params:{AJAX:"Y",SITE_ID:"",PRODUCT_ID:0,PARENT_ID:0}};this.currentImg={src:"",width:0,height:0,screenWidth:0,screenHeight:0,screenOffsetX:0,screenOffsetY:0,scale:1};this.obPopupWin=null;this.basketUrl="";this.basketParams={};this.obPopupPict=null;this.magnify={obMagnifier:null,obMagnifyPict:null,obMagnifyArea:null,obBigImg:null,obBigSlider:null,magnifyShow:false,areaParams:{width:100,height:130,left:0,top:0,scaleFactor:1,globalLeft:0,globalTop:0,globalRight:0,globalBottom:0},magnifierParams:{top:0,left:0,width:0,height:0,ratioX:10,ratioY:13,defaultScale:1},magnifyPictParams:{marginTop:0,marginLeft:0,width:0,height:0}};this.treeRowShowSize=5;this.treeEnableArrow={display:"",cursor:"pointer",opacity:1};this.treeDisableArrow={display:"",cursor:"default",opacity:.2};this.sliderRowShowSize=5;this.sliderEnableArrow={display:"",cursor:"pointer",opacity:1};this.sliderDisableArrow={display:"",cursor:"default",opacity:.2};this.errorCode=0;if(typeof t==="object"){this.params=t;this.initConfig();if(!!this.params.MESS){this.mess=this.params.MESS}switch(this.productType){case 0:case 1:case 2:this.initProductData();break;case 3:this.initOffersData();break;default:this.errorCode=-1}this.initBasketData();this.initCompareData()}if(0===this.errorCode){BX.ready(BX.delegate(this.Init,this))}this.params={};BX.addCustomEvent("onSaleProductIsGift",BX.delegate(this.onSaleProductIsGift,this));BX.addCustomEvent("onSaleProductIsNotGift",BX.delegate(this.onSaleProductIsNotGift,this))};t.JCCatalogElement.prototype.onSaleProductIsGift=function(t,i){var s=function(t,i){for(var s=0;s<t.length;s++){if(t[s]&&t[s].ID==i){return t[s]}}return null};if(!!i&&this.offers&&this.offers[this.offerNum].ID==i){this.setGift()}};t.JCCatalogElement.prototype.onSaleProductIsNotGift=function(t,i){if(!!i&&this.offers&&this.offers[this.offerNum].ID==i){this.restoreSticker();this.isGift=false;this.setPrice(BX.clone(this.offers[this.offerNum].PRICE,true))}};t.JCCatalogElement.prototype.reloadGiftInfo=function(){if(this.productType===3){this.checkQuantity=true;this.maxQuantity=1;this.setPrice(BX.clone(this.offers[this.offerNum].PRICE,true));BX.hide(this.obBasisPrice);this.redrawSticker({text:BX.message("PRODUCT_GIFT_LABEL")})}};t.JCCatalogElement.prototype.setGift=function(){if(this.productType===3){this.isGift=true}if(this.productType===1||this.productType===2){this.isGift=true}if(this.productType===0){this.isGift=false}this.reloadGiftInfo()};t.JCCatalogElement.prototype.Init=function(){var t=0,i=0,s="",e=null,a=null;this.obProduct=BX(this.visual.ID);if(!this.obProduct){this.errorCode=-1}this.obPict=BX(this.visual.PICT_ID);if(!this.obPict){this.errorCode=-2}else{this.obPictAligner=this.obPict.parentNode}if(this.config.showPrice){this.obPrice.price=BX(this.visual.PRICE_ID);if(!this.obPrice.price&&this.config.useCatalog){this.errorCode=-16}else{if(this.config.showOldPrice){this.obPrice.full=BX(this.visual.OLD_PRICE_ID);this.obPrice.discount=BX(this.visual.DISCOUNT_VALUE_ID);if(!this.obPrice.full||!this.obPrice.discount){this.config.showOldPrice=false}}if(this.config.showPercent){this.obPrice.percent=BX(this.visual.DISCOUNT_PERC_ID);if(!this.obPrice.percent){this.config.showPercent=false}}}this.obBasketActions=BX(this.visual.BASKET_ACTIONS_ID);if(!!this.obBasketActions){if(BX.util.in_array("BUY",this.config.basketAction)){this.obBuyBtn=BX(this.visual.BUY_ID)}if(BX.util.in_array("ADD",this.config.basketAction)){this.obAddToBasketBtn=BX(this.visual.ADD_BASKET_ID)}}this.obNotAvail=BX(this.visual.NOT_AVAILABLE_MESS)}if(this.config.showQuantity){this.obQuantity=BX(this.visual.QUANTITY_ID);if(!!this.visual.QUANTITY_UP_ID){this.obQuantityUp=BX(this.visual.QUANTITY_UP_ID)}if(!!this.visual.QUANTITY_DOWN_ID){this.obQuantityDown=BX(this.visual.QUANTITY_DOWN_ID)}if(this.config.showBasisPrice){this.obBasisPrice=BX(this.visual.BASIS_PRICE)}}if(3===this.productType){if(!!this.visual.TREE_ID){this.obTree=BX(this.visual.TREE_ID);if(!this.obTree){this.errorCode=-256}s=this.visual.TREE_ITEM_ID;for(t=0;t<this.treeProps.length;t++){this.obTreeRows[t]={LEFT:BX(s+this.treeProps[t].ID+"_left"),RIGHT:BX(s+this.treeProps[t].ID+"_right"),LIST:BX(s+this.treeProps[t].ID+"_list"),CONT:BX(s+this.treeProps[t].ID+"_cont")};if(!this.obTreeRows[t].LEFT||!this.obTreeRows[t].RIGHT||!this.obTreeRows[t].LIST||!this.obTreeRows[t].CONT){this.errorCode=-512;break}}}if(!!this.visual.QUANTITY_MEASURE){this.obMeasure=BX(this.visual.QUANTITY_MEASURE)}if(!!this.visual.QUANTITY_LIMIT){this.obQuantityLimit.all=BX(this.visual.QUANTITY_LIMIT);if(!!this.obQuantityLimit.all){this.obQuantityLimit.value=BX.findChild(this.obQuantityLimit.all,{tagName:"span"},false,false);if(!this.obQuantityLimit.value){this.obQuantityLimit.all=null}}}}if(this.config.showSkuProps){if(!!this.visual.DISPLAY_PROP_DIV){this.obSkuProps=BX(this.visual.DISPLAY_PROP_DIV)}}if(this.config.useCompare){this.obCompare=BX(this.visual.COMPARE_LINK_ID)}if(this.config.useSubscribe){this.obSubscribe=BX(this.visual.SUBSCRIBE_ID)}if(0===this.errorCode){if(this.config.showQuantity){if(!!this.obQuantityUp){BX.bind(this.obQuantityUp,"click",BX.delegate(this.QuantityUp,this))}if(!!this.obQuantityDown){BX.bind(this.obQuantityDown,"click",BX.delegate(this.QuantityDown,this))}if(!!this.obQuantity){BX.bind(this.obQuantity,"change",BX.delegate(this.QuantityChange,this))}}switch(this.productType){case 0:case 1:case 2:if(this.product.useSlider){this.product.slider={COUNT:this.product.sliderCount,ID:this.visual.SLIDER_CONT,CONT:BX(this.visual.SLIDER_CONT),LIST:BX(this.visual.SLIDER_LIST),LEFT:BX(this.visual.SLIDER_LEFT),RIGHT:BX(this.visual.SLIDER_RIGHT),START:0};e=BX.findChildren(this.product.slider.LIST,{tagName:"li"},true);if(!!e&&0<e.length){for(i=0;i<e.length;i++){BX.bind(e[i],"click",BX.delegate(this.ProductSelectSliderImg,this))}}if(!!this.product.slider.LEFT){BX.bind(this.product.slider.LEFT,"click",BX.delegate(this.ProductSliderRowLeft,this));BX.adjust(this.product.slider.LEFT,{style:this.sliderDisableArrow})}if(!!this.product.slider.RIGHT){BX.bind(this.product.slider.RIGHT,"click",BX.delegate(this.ProductSliderRowRight,this));BX.adjust(this.product.slider.RIGHT,{style:this.sliderEnableArrow})}this.setCurrentImg(this.product.sliderPict[0],true)}break;case 3:a=BX.findChildren(this.obTree,{tagName:"li"},true);if(!!a&&0<a.length){for(t=0;t<a.length;t++){BX.bind(a[t],"click",BX.delegate(this.SelectOfferProp,this))}}for(t=0;t<this.obTreeRows.length;t++){BX.bind(this.obTreeRows[t].LEFT,"click",BX.delegate(this.RowLeft,this));BX.bind(this.obTreeRows[t].RIGHT,"click",BX.delegate(this.RowRight,this))}for(t=0;t<this.offers.length;t++){this.offers[t].SLIDER_COUNT=parseInt(this.offers[t].SLIDER_COUNT,10);if(isNaN(this.offers[t].SLIDER_COUNT)){this.offers[t].SLIDER_COUNT=0}if(0===this.offers[t].SLIDER_COUNT){this.sliders[t]={COUNT:this.offers[t].SLIDER_COUNT,ID:""}}else{for(i=0;i<this.offers[t].SLIDER.length;i++){this.offers[t].SLIDER[i].WIDTH=parseInt(this.offers[t].SLIDER[i].WIDTH,10);this.offers[t].SLIDER[i].HEIGHT=parseInt(this.offers[t].SLIDER[i].HEIGHT,10)}this.sliders[t]={COUNT:this.offers[t].SLIDER_COUNT,OFFER_ID:this.offers[t].ID,ID:this.visual.SLIDER_CONT_OF_ID+this.offers[t].ID,CONT:BX(this.visual.SLIDER_CONT_OF_ID+this.offers[t].ID),LIST:BX(this.visual.SLIDER_LIST_OF_ID+this.offers[t].ID),LEFT:BX(this.visual.SLIDER_LEFT_OF_ID+this.offers[t].ID),RIGHT:BX(this.visual.SLIDER_RIGHT_OF_ID+this.offers[t].ID),START:0};e=BX.findChildren(this.sliders[t].LIST,{tagName:"li"},true);if(!!e&&0<e.length){for(i=0;i<e.length;i++){BX.bind(e[i],"click",BX.delegate(this.SelectSliderImg,this))}}if(!!this.sliders[t].LEFT){BX.bind(this.sliders[t].LEFT,"click",BX.delegate(this.SliderRowLeft,this))}if(!!this.sliders[t].RIGHT){BX.bind(this.sliders[t].RIGHT,"click",BX.delegate(this.SliderRowRight,this))}}}this.SetCurrent();break}if(!!this.obBuyBtn){BX.bind(this.obBuyBtn,"click",BX.proxy(this.BuyBasket,this))}if(!!this.obAddToBasketBtn){BX.bind(this.obAddToBasketBtn,"click",BX.proxy(this.Add2Basket,this))}if(!!this.obCompare){BX.bind(this.obCompare,"click",BX.proxy(this.Compare,this))}this.setMainPictHandler()}};t.JCCatalogElement.prototype.initConfig=function(){this.productType=parseInt(this.params.PRODUCT_TYPE,10);if(!!this.params.CONFIG&&typeof this.params.CONFIG==="object"){if(this.params.CONFIG.USE_CATALOG!=="undefined"&&BX.type.isBoolean(this.params.CONFIG.USE_CATALOG)){this.config.useCatalog=this.params.CONFIG.USE_CATALOG}this.config.showQuantity=!!this.params.CONFIG.SHOW_QUANTITY;this.config.showPrice=!!this.params.CONFIG.SHOW_PRICE;this.config.showPercent=!!this.params.CONFIG.SHOW_DISCOUNT_PERCENT;this.config.showOldPrice=!!this.params.CONFIG.SHOW_OLD_PRICE;this.config.showSkuProps=!!this.params.CONFIG.SHOW_SKU_PROPS;this.config.showOfferGroup=!!this.params.CONFIG.OFFER_GROUP;this.config.useCompare=!!this.params.CONFIG.DISPLAY_COMPARE;this.config.useStickers=!!this.params.CONFIG.USE_STICKERS;this.config.useSubscribe=!!this.params.CONFIG.USE_SUBSCRIBE;if(!!this.params.CONFIG.MAIN_PICTURE_MODE){this.config.mainPictureMode=this.params.CONFIG.MAIN_PICTURE_MODE}this.config.showBasisPrice=!!this.params.CONFIG.SHOW_BASIS_PRICE;if(!!this.params.CONFIG.ADD_TO_BASKET_ACTION){this.config.basketAction=this.params.CONFIG.ADD_TO_BASKET_ACTION}this.config.showClosePopup=!!this.params.CONFIG.SHOW_CLOSE_POPUP}else{if(this.params.USE_CATALOG!=="undefined"&&BX.type.isBoolean(this.params.USE_CATALOG)){this.config.useCatalog=this.params.USE_CATALOG}this.config.showQuantity=!!this.params.SHOW_QUANTITY;this.config.showPrice=!!this.params.SHOW_PRICE;this.config.showPercent=!!this.params.SHOW_DISCOUNT_PERCENT;this.config.showOldPrice=!!this.params.SHOW_OLD_PRICE;this.config.showSkuProps=!!this.params.SHOW_SKU_PROPS;this.config.showOfferGroup=!!this.params.OFFER_GROUP;this.config.useCompare=!!this.params.DISPLAY_COMPARE;if(!!this.params.MAIN_PICTURE_MODE){this.config.mainPictureMode=this.params.MAIN_PICTURE_MODE}this.config.showBasisPrice=!!this.params.SHOW_BASIS_PRICE;if(!!this.params.ADD_TO_BASKET_ACTION){this.config.basketAction=this.params.ADD_TO_BASKET_ACTION}this.config.showClosePopup=!!this.params.SHOW_CLOSE_POPUP}if(!this.params.VISUAL||typeof this.params.VISUAL!=="object"||!this.params.VISUAL.ID){this.errorCode=-1;return}this.visual.ID=this.params.VISUAL.ID;this.initVisualParams("main");if(this.config.showQuantity){this.initVisualParams("quantity")}if(this.config.showPrice){this.initVisualParams("price")}if(this.config.showOldPrice){this.initVisualParams("oldPrice")}if(this.config.showPercent){this.initVisualParams("discountPerc")}this.initVisualParams("basket");if(this.config.mainPictureMode==="MAGNIFIER"){this.initVisualParams("magnifier")}if(this.config.useCompare){this.initVisualParams("compare")}if(this.config.useStickers){this.initVisualParams("stickers")}if(this.config.useSubscribe){this.initVisualParams("subscribe")}};t.JCCatalogElement.prototype.initVisualParams=function(t){var i=0,s="";if(!this.listID[t]){this.errorCode=-1;return}for(i=0;i<this.listID[t].length;i++){s=this.listID[t][i];this.visual[s]=!!this.params.VISUAL[s]?this.params.VISUAL[s]:this.visual.ID+this.visualPostfix[s]}};t.JCCatalogElement.prototype.initProductData=function(){var t=0;this.initVisualParams("productSlider");if(!!this.params.PRODUCT&&"object"===typeof this.params.PRODUCT){if(this.config.showQuantity){this.product.checkQuantity=this.params.PRODUCT.CHECK_QUANTITY;this.product.isDblQuantity=this.params.PRODUCT.QUANTITY_FLOAT;if(this.product.checkQuantity){this.product.maxQuantity=this.product.isDblQuantity?parseFloat(this.params.PRODUCT.MAX_QUANTITY):parseInt(this.params.PRODUCT.MAX_QUANTITY,10)}this.product.stepQuantity=this.product.isDblQuantity?parseFloat(this.params.PRODUCT.STEP_QUANTITY):parseInt(this.params.PRODUCT.STEP_QUANTITY,10);this.checkQuantity=this.product.checkQuantity;this.isDblQuantity=this.product.isDblQuantity;this.maxQuantity=this.product.maxQuantity;this.stepQuantity=this.product.stepQuantity;if(this.isDblQuantity){this.stepQuantity=Math.round(this.stepQuantity*this.precisionFactor)/this.precisionFactor}}this.product.canBuy=this.params.PRODUCT.CAN_BUY;this.product.canSubscription=this.params.PRODUCT.SUBSCRIPTION;if(this.config.showPrice){this.currentBasisPrice=this.params.PRODUCT.BASIS_PRICE}this.canBuy=this.product.canBuy;this.canSubscription=this.product.canSubscription;this.product.name=this.params.PRODUCT.NAME;this.product.pict=this.params.PRODUCT.PICT;this.product.id=this.params.PRODUCT.ID;if(!!this.params.PRODUCT.ADD_URL){this.product.addUrl=this.params.PRODUCT.ADD_URL}if(!!this.params.PRODUCT.BUY_URL){this.product.buyUrl=this.params.PRODUCT.BUY_URL}if(!!this.params.PRODUCT.SLIDER_COUNT){this.product.sliderCount=parseInt(this.params.PRODUCT.SLIDER_COUNT,10);if(isNaN(this.product.sliderCount)){this.product.sliderCount=0}if(0<this.product.sliderCount&&!!this.params.PRODUCT.SLIDER.length&&0<this.params.PRODUCT.SLIDER.length){for(t=0;t<this.params.PRODUCT.SLIDER.length;t++){this.product.useSlider=true;this.params.PRODUCT.SLIDER[t].WIDTH=parseInt(this.params.PRODUCT.SLIDER[t].WIDTH,10);this.params.PRODUCT.SLIDER[t].HEIGHT=parseInt(this.params.PRODUCT.SLIDER[t].HEIGHT,10)}this.product.sliderPict=this.params.PRODUCT.SLIDER;this.setCurrentImg(this.product.sliderPict[0],false)}}this.currentIsSet=true}else{this.errorCode=-1}};t.JCCatalogElement.prototype.initOffersData=function(){this.initVisualParams("offerSlider");this.initVisualParams("offers");if(!!this.params.OFFERS&&BX.type.isArray(this.params.OFFERS)){this.offers=this.params.OFFERS;this.offerNum=0;if(!!this.params.OFFER_SELECTED){this.offerNum=parseInt(this.params.OFFER_SELECTED,10)}if(isNaN(this.offerNum)){this.offerNum=0}if(!!this.params.TREE_PROPS){this.treeProps=this.params.TREE_PROPS}if(!!this.params.DEFAULT_PICTURE){this.defaultPict.preview=this.params.DEFAULT_PICTURE.PREVIEW_PICTIRE;this.defaultPict.detail=this.params.DEFAULT_PICTURE.DETAIL_PICTURE}if(!!this.params.PRODUCT&&typeof this.params.PRODUCT==="object"){this.product.id=parseInt(this.params.PRODUCT.ID,10);this.product.name=this.params.PRODUCT.NAME}}else{this.errorCode=-1}};t.JCCatalogElement.prototype.initBasketData=function(){if(!!this.params.BASKET&&"object"===typeof this.params.BASKET){if(1===this.productType||2===this.productType){this.basketData.useProps=!!this.params.BASKET.ADD_PROPS;this.basketData.emptyProps=!!this.params.BASKET.EMPTY_PROPS}if(!!this.params.BASKET.QUANTITY){this.basketData.quantity=this.params.BASKET.QUANTITY}if(!!this.params.BASKET.PROPS){this.basketData.props=this.params.BASKET.PROPS}if(!!this.params.BASKET.BASKET_URL){this.basketData.basketUrl=this.params.BASKET.BASKET_URL}if(3===this.productType){if(!!this.params.BASKET.SKU_PROPS){this.basketData.sku_props=this.params.BASKET.SKU_PROPS}}if(!!this.params.BASKET.ADD_URL_TEMPLATE){this.basketData.add_url=this.params.BASKET.ADD_URL_TEMPLATE}if(!!this.params.BASKET.BUY_URL_TEMPLATE){this.basketData.buy_url=this.params.BASKET.BUY_URL_TEMPLATE}if(this.basketData.add_url===""&&this.basketData.buy_url===""){this.errorCode=-1024}}};t.JCCatalogElement.prototype.initCompareData=function(){if(this.config.useCompare){if(!!this.params.COMPARE&&typeof this.params.COMPARE==="object"){if(!!this.params.COMPARE.COMPARE_PATH){this.compareData.comparePath=this.params.COMPARE.COMPARE_PATH}if(!!this.params.COMPARE.COMPARE_URL_TEMPLATE){this.compareData.compareUrl=this.params.COMPARE.COMPARE_URL_TEMPLATE}else{this.config.useCompare=false}}else{this.config.useCompare=false}}};t.JCCatalogElement.prototype.setMainPictHandler=function(){switch(this.config.mainPictureMode){case"GALLERY":break;case"MAGNIFIER":this.magnify.obBigImg=BX(this.visual.BIG_IMG_CONT_ID);this.magnify.obBigSlider=BX(this.visual.BIG_SLIDER_ID);if(!!this.magnify.obBigImg&&!!this.magnify.obBigSlider){this.magnify.obMagnifyArea=this.obPictAligner.appendChild(BX.create("DIV",{props:{id:this.visual.MAGNIFIER_AREA_ID,className:"bx_item_slider_lupe_small"},style:{display:"none",top:0,left:0,width:"100px",height:"130px"},events:{mouseover:BX.delegate(this.onMagnifierArea,this),mouseout:BX.delegate(function(){this.outMagnifierArea();this.hideMagnifier()},this)}}));this.magnify.obMagnifier=this.magnify.obBigSlider.appendChild(BX.create("DIV",{props:{id:this.visual.MAGNIFIER_ID,className:"bx_item_slider_lupe"},style:{display:"none"}}));this.magnify.obMagnifyPict=this.magnify.obMagnifier.appendChild(BX.create("IMG",{props:{src:this.currentImg.src}}));BX.bind(this.obPict,"mouseover",BX.delegate(this.showMagnifier,this))}break;case"POPUP":this.obPopupPict=new BX.PopupWindow("CatalogElementPopup_"+this.visual.ID,null,{autoHide:false,offsetLeft:0,offsetTop:0,overlay:false,closeByEsc:true,titleBar:true,closeIcon:{top:"10px",right:"10px"}});BX.bind(this.obPict,"click",BX.delegate(this.showMainPictPopup,this));BX.adjust(this.obPict,{style:{cursor:"pointer"}});BX.addCustomEvent(this.obPopupPict,"onAfterPopupShow",BX.proxy(this.onPopupWindowShow,this));BX.addCustomEvent(this.obPopupPict,"onPopupClose",BX.proxy(this.onPopupWindowClose,this));break;default:break}};t.JCCatalogElement.prototype.setCurrentImg=function(t,i){i=!!i;this.currentImg.src=t.SRC;this.currentImg.width=t.WIDTH;this.currentImg.height=t.HEIGHT;if(i&&!!this.obPict){if(this.config.mainPictureMode==="MAGNIFIER"){this.outMagnifierArea();this.hideMagnifier()}BX.adjust(this.obPict,{props:{src:this.currentImg.src}});var s={width:parseInt(this.obPictAligner.offsetWidth,10),height:parseInt(this.obPictAligner.offsetHeight,10)},e,a;e=this.scaleImg(this.currentImg,s);a=e.height<s.height?s.height-e.height>>>1:0;if(a!==this.currentImg.screenOffsetY){BX.style(this.obPictAligner,"marginTop",a+"px");this.currentImg.screenOffsetY=a}this.currentImg.screenOffsetX=e.width<s.width?s.width-e.width>>>1:0;this.currentImg.screenWidth=e.width;this.currentImg.screenHeight=e.height}};t.JCCatalogElement.prototype.scaleImg=function(t,i){var s,e,a,r={};if(i.width>=t.width&&i.height>=t.height){r.width=t.width;r.height=t.height}else{s=i.width/t.width;e=i.height/t.height;a=Math.min(s,e);r.width=Math.max(1,parseInt(a*t.width,10));r.height=Math.max(1,parseInt(a*t.height,10))}return r};t.JCCatalogElement.prototype.showMagnifier=function(t){if(!this.magnify.magnifyShow){this.calcMagnifierParams();this.calcMagnifyAreaSize();this.calcMagnifyAreaPos(t);this.calcMagnifyPictSize();this.calcMagnifyPictPos();this.setMagnifyAreaParams(true);this.setMagnifyPictParams(true);this.setMagnifierParams(true);BX.bind(document,"mousemove",BX.proxy(this.moveMagnifierArea,this))}};t.JCCatalogElement.prototype.hideMagnifier=function(){if(!this.magnify.magnifyShow){if(!!this.magnify.obMagnifier){BX.adjust(this.magnify.obMagnifier,{style:{display:"none"}})}if(!!this.magnify.obMagnifyArea){BX.adjust(this.magnify.obMagnifyArea,{style:{display:"none"}})}BX.unbind(document,"mousemove",BX.proxy(this.moveMagnifierArea,this))}};t.JCCatalogElement.prototype.moveMagnifierArea=function(t){var i,s=BX.pos(this.obPict),e={},a={},r={};i=this.inRect(t,s);if(this.inBound(s,i)){e=this.intersectArea(i,s);switch(e.X){case-1:this.magnify.areaParams.left=this.currentImg.screenOffsetX;break;case 0:this.magnify.areaParams.left=this.currentImg.screenOffsetX+i.X-(this.magnify.areaParams.width>>>1);break;case 1:this.magnify.areaParams.left=this.currentImg.screenOffsetX+s.width-this.magnify.areaParams.width;break}switch(e.Y){case-1:this.magnify.areaParams.top=0;break;case 0:this.magnify.areaParams.top=i.Y-(this.magnify.areaParams.height>>>1);break;case 1:this.magnify.areaParams.top=s.height-this.magnify.areaParams.height;break}this.magnify.magnifyPictParams.marginLeft=-parseInt((this.magnify.areaParams.left-this.currentImg.screenOffsetX)*this.currentImg.scale,10);this.magnify.magnifyPictParams.marginTop=-parseInt(this.magnify.areaParams.top*this.currentImg.scale,10);a.left=this.magnify.areaParams.left+"px";a.top=this.magnify.areaParams.top+"px";BX.adjust(this.magnify.obMagnifyArea,{style:a});r.marginLeft=this.magnify.magnifyPictParams.marginLeft+"px";r.marginTop=this.magnify.magnifyPictParams.marginTop+"px";BX.adjust(this.magnify.obMagnifyPict,{style:r})}else{this.outMagnifierArea();this.hideMagnifier()}};t.JCCatalogElement.prototype.onMagnifierArea=function(){this.magnify.magnifyShow=true};t.JCCatalogElement.prototype.outMagnifierArea=function(){this.magnify.magnifyShow=false};t.JCCatalogElement.prototype.calcMagnifierParams=function(){if(!!this.magnify.obBigImg){var t=BX.pos(this.magnify.obBigImg,true);this.magnify.magnifierParams.width=t.width;this.magnify.magnifierParams.height=t.height;this.magnify.magnifierParams.top=t.top;this.magnify.magnifierParams.left=t.left+t.width+2}};t.JCCatalogElement.prototype.setMagnifierParams=function(t){if(!!this.magnify.obMagnifier){t=!!t;var i={top:this.magnify.magnifierParams.top+"px",left:this.magnify.magnifierParams.left+"px",width:this.magnify.magnifierParams.width+"px",height:this.magnify.magnifierParams.height+"px"};if(t){i.display=""}BX.adjust(this.magnify.obMagnifier,{style:i})}};t.JCCatalogElement.prototype.setMagnifyAreaParams=function(t){if(!!this.magnify.obMagnifier){t=!!t;var i={top:this.magnify.areaParams.top+"px",left:this.magnify.areaParams.left+"px",width:this.magnify.areaParams.width+"px",height:this.magnify.areaParams.height+"px"};if(t){i.display=""}BX.adjust(this.magnify.obMagnifyArea,{style:i})}};t.JCCatalogElement.prototype.calcMagnifyAreaPos=function(t){var i,s,e;s=BX.pos(this.obPict);i=this.inRect(t,s);if(this.inBound(s,i)){e=this.intersectArea(i,s);switch(e.X){case-1:this.magnify.areaParams.left=this.currentImg.screenOffsetX;break;case 0:this.magnify.areaParams.left=this.currentImg.screenOffsetX+i.X-(this.magnify.areaParams.width>>>1);break;case 1:this.magnify.areaParams.left=this.currentImg.screenOffsetX+s.width-this.magnify.areaParams.width;break}switch(e.Y){case-1:this.magnify.areaParams.top=0;break;case 0:this.magnify.areaParams.top=i.Y-(this.magnify.areaParams.height>>>1);break;case 1:this.magnify.areaParams.top=s.height-this.magnify.areaParams.height;break}}};t.JCCatalogElement.prototype.inBound=function(t,i){return 0<=i.Y&&t.height>=i.Y&&(0<=i.X&&t.width>=i.X)};t.JCCatalogElement.prototype.inRect=function(t,i){var s=BX.GetWindowSize(),e={X:0,Y:0,globalX:0,globalY:0};e.globalX=t.clientX+s.scrollLeft;if(t.offsetX&&t.offsetX<0)e.globalX-=t.offsetX;e.X=e.globalX-i.left;e.globalY=t.clientY+s.scrollTop;if(t.offsetY&&t.offsetY<0)e.globalY-=t.offsetY;e.Y=e.globalY-i.top;return e};t.JCCatalogElement.prototype.intersectArea=function(t,i){var s={X:0,Y:0},e=this.magnify.areaParams.width>>>1,a=this.magnify.areaParams.height>>>1;if(t.X<=e){s.X=-1}else if(t.X>=i.width-e){s.X=1}else{s.X=0}if(t.Y<=a){s.Y=-1}else if(t.Y>=i.height-a){s.Y=1}else{s.Y=0}return s};t.JCCatalogElement.prototype.calcMagnifyAreaSize=function(){var t,i,s;if(this.magnify.magnifierParams.width<this.currentImg.width&&this.magnify.magnifierParams.height<this.currentImg.height){t=this.magnify.obBigImg.offsetWidth/this.currentImg.width;i=this.magnify.obBigImg.offsetHeight/this.currentImg.height;s=Math.min(t,i);this.currentImg.scale=1/s;this.magnify.areaParams.width=Math.max(1,parseInt(s*this.magnify.magnifierParams.width,10));this.magnify.areaParams.height=Math.max(1,parseInt(s*this.magnify.magnifierParams.height,10));this.magnify.areaParams.scaleFactor=this.magnify.magnifierParams.defaultScale}else{t=this.obPict.offsetWidth/this.magnify.obBigImg.offsetWidth;i=this.obPict.offsetHeight/this.magnify.obBigImg.offsetHeight;s=Math.min(t,i);this.currentImg.scale=1/s;this.magnify.areaParams.width=Math.max(1,parseInt(s*this.magnify.magnifierParams.width,10));this.magnify.areaParams.height=Math.max(1,parseInt(s*this.magnify.magnifierParams.height,10));t=this.magnify.magnifierParams.width/this.currentImg.width;i=this.magnify.magnifierParams.height/this.currentImg.height;s=Math.max(t,i);this.magnify.areaParams.scaleFactor=s}};t.JCCatalogElement.prototype.calcMagnifyPictSize=function(){this.magnify.magnifyPictParams.width=this.currentImg.width*this.magnify.areaParams.scaleFactor;this.magnify.magnifyPictParams.height=this.currentImg.height*this.magnify.areaParams.scaleFactor};t.JCCatalogElement.prototype.calcMagnifyPictPos=function(){this.magnify.magnifyPictParams.marginLeft=-parseInt((this.magnify.areaParams.left-this.currentImg.screenOffsetX)*this.currentImg.scale,10);this.magnify.magnifyPictParams.marginTop=-parseInt(this.magnify.areaParams.top*this.currentImg.scale,10)};t.JCCatalogElement.prototype.setMagnifyPictParams=function(t){if(!!this.magnify.obMagnifier){t=!!t;var i={width:this.magnify.magnifyPictParams.width+"px",height:this.magnify.magnifyPictParams.height+"px",marginTop:this.magnify.magnifyPictParams.marginTop+"px",marginLeft:this.magnify.magnifyPictParams.marginLeft+"px"};if(t){i.display=""}BX.adjust(this.magnify.obMagnifyPict,{style:i,props:{src:this.currentImg.src}})}};t.JCCatalogElement.prototype.ProductSliderRowLeft=function(){var t=BX.proxy_context;if(!!t){if(this.sliderRowShowSize<this.product.slider.COUNT){if(0>this.product.slider.START){this.product.slider.START++;BX.adjust(this.product.slider.LIST,{style:{marginLeft:this.product.slider.START*20+"%"}});BX.adjust(this.product.slider.RIGHT,{style:this.sliderEnableArrow})}if(0<=this.product.slider.START){BX.adjust(this.product.slider.LEFT,{style:this.sliderDisableArrow})}}}};t.JCCatalogElement.prototype.ProductSliderRowRight=function(){var t=BX.proxy_context;if(!!t){if(this.sliderRowShowSize<this.product.slider.COUNT){if(this.sliderRowShowSize-this.product.slider.START<this.product.slider.COUNT){this.product.slider.START--;BX.adjust(this.product.slider.LIST,{style:{marginLeft:this.product.slider.START*20+"%"}});BX.adjust(this.product.slider.LEFT,{style:this.sliderEnableArrow})}if(this.sliderRowShowSize-this.product.slider.START>=this.product.slider.COUNT){BX.adjust(this.product.slider.RIGHT,{style:this.sliderDisableArrow})}}}};t.JCCatalogElement.prototype.ProductSelectSliderImg=function(){var t="",i=BX.proxy_context;if(!!i&&i.hasAttribute("data-value")){t=i.getAttribute("data-value");this.SetProductMainPict(t)}};t.JCCatalogElement.prototype.SetProductMainPict=function(t){var i=-1,s=0,e=0,a="",r="",o=null;if(0<this.product.sliderCount){for(e=0;e<this.product.sliderPict.length;e++){if(t===this.product.sliderPict[e].ID){i=e;break}}if(-1<i){if(!!this.product.sliderPict[i]){this.setCurrentImg(this.product.sliderPict[i],true)}o=BX.findChildren(this.product.slider.LIST,{tagName:"li"},false);if(!!o&&0<o.length){r=t;for(s=0;s<o.length;s++){a=o[s].getAttribute("data-value");if(a===r){BX.addClass(o[s],"bx_active")}else{BX.removeClass(o[s],"bx_active")}}}}}};t.JCCatalogElement.prototype.SliderRowLeft=function(){var t="",i=-1,s,e=BX.proxy_context;if(!!e&&e.hasAttribute("data-value")){t=e.getAttribute("data-value");for(s=0;s<this.sliders.length;s++){if(this.sliders[s].OFFER_ID===t){i=s;break}}if(-1<i&&this.sliderRowShowSize<this.sliders[i].COUNT){if(0>this.sliders[i].START){this.sliders[i].START++;BX.adjust(this.sliders[i].LIST,{style:{marginLeft:this.sliders[i].START*20+"%"}});BX.adjust(this.sliders[i].RIGHT,{style:this.sliderEnableArrow})}if(0<=this.sliders[i].START){BX.adjust(this.sliders[i].LEFT,{style:this.sliderDisableArrow})}}}};t.JCCatalogElement.prototype.SliderRowRight=function(){var t="",i=-1,s,e=BX.proxy_context;if(!!e&&e.hasAttribute("data-value")){t=e.getAttribute("data-value");for(s=0;s<this.sliders.length;s++){if(this.sliders[s].OFFER_ID===t){i=s;break}}if(-1<i&&this.sliderRowShowSize<this.sliders[i].COUNT){if(this.sliderRowShowSize-this.sliders[i].START<this.sliders[i].COUNT){this.sliders[i].START--;BX.adjust(this.sliders[i].LIST,{style:{marginLeft:this.sliders[i].START*20+"%"}});BX.adjust(this.sliders[i].LEFT,{style:this.sliderEnableArrow})}if(this.sliderRowShowSize-this.sliders[i].START>=this.sliders[i].COUNT){BX.adjust(this.sliders[i].RIGHT,{style:this.sliderDisableArrow})}}}};t.JCCatalogElement.prototype.SelectSliderImg=function(){var t="",i=[],s=BX.proxy_context;if(!!s&&s.hasAttribute("data-value")){
t=s.getAttribute("data-value");i=t.split("_");this.SetMainPict(i[0],i[1])}};t.JCCatalogElement.prototype.SetMainPict=function(t,i){var s=-1,e=-1,a,r,o="",h=null,n="";for(a=0;a<this.offers.length;a++){if(t===this.offers[a].ID){s=a;break}}if(-1<s){if(0<this.offers[s].SLIDER_COUNT){for(r=0;r<this.offers[s].SLIDER.length;r++){if(i===this.offers[s].SLIDER[r].ID){e=r;break}}if(-1<e){if(!!this.offers[s].SLIDER[e]){this.setCurrentImg(this.offers[s].SLIDER[e],true)}h=BX.findChildren(this.sliders[s].LIST,{tagName:"li"},false);if(!!h&&0<h.length){n=t+"_"+i;for(a=0;a<h.length;a++){o=h[a].getAttribute("data-value");if(o===n){BX.addClass(h[a],"bx_active")}else{BX.removeClass(h[a],"bx_active")}}}}}}};t.JCCatalogElement.prototype.SetMainPictFromItem=function(t){if(!!this.obPict){var i=false,s={};if(!!this.offers[t]){if(!!this.offers[t].DETAIL_PICTURE){s=this.offers[t].DETAIL_PICTURE;i=true}else if(!!this.offers[t].PREVIEW_PICTURE){s=this.offers[t].PREVIEW_PICTURE;i=true}}if(!i){if(!!this.defaultPict.detail){s=this.defaultPict.detail;i=true}else if(!!this.defaultPict.preview){s=this.defaultPict.preview;i=true}}if(i){this.setCurrentImg(s,true)}}};t.JCCatalogElement.prototype.showMainPictPopup=function(t){var i="";i='<div style="text-align: center;"><img src="'+this.currentImg.src+'" width="'+this.currentImg.width+'" height="'+this.currentImg.height+'" name=""></div>';this.obPopupPict.setContent(i);this.obPopupPict.show();return BX.PreventDefault(t)};t.JCCatalogElement.prototype.QuantityUp=function(){var t=0,i=true,s;if(0===this.errorCode&&this.config.showQuantity&&this.canBuy&&!this.isGift){t=this.isDblQuantity?parseFloat(this.obQuantity.value):parseInt(this.obQuantity.value,10);if(!isNaN(t)){t+=this.stepQuantity;if(this.checkQuantity){if(t>this.maxQuantity){i=false}}if(i){if(this.isDblQuantity){t=Math.round(t*this.precisionFactor)/this.precisionFactor}this.obQuantity.value=t;s={DISCOUNT_VALUE:this.currentBasisPrice.DISCOUNT_VALUE*t,VALUE:this.currentBasisPrice.VALUE*t,DISCOUNT_DIFF:this.currentBasisPrice.DISCOUNT_DIFF*t,DISCOUNT_DIFF_PERCENT:this.currentBasisPrice.DISCOUNT_DIFF_PERCENT,CURRENCY:this.currentBasisPrice.CURRENCY};this.setPrice(s)}}}};t.JCCatalogElement.prototype.QuantityDown=function(){var t=0,i=true,s;if(0===this.errorCode&&this.config.showQuantity&&this.canBuy&&!this.isGift){t=this.isDblQuantity?parseFloat(this.obQuantity.value):parseInt(this.obQuantity.value,10);if(!isNaN(t)){t-=this.stepQuantity;if(t<this.stepQuantity){i=false}if(i){if(this.isDblQuantity){t=Math.round(t*this.precisionFactor)/this.precisionFactor}this.obQuantity.value=t;s={DISCOUNT_VALUE:this.currentBasisPrice.DISCOUNT_VALUE*t,VALUE:this.currentBasisPrice.VALUE*t,DISCOUNT_DIFF:this.currentBasisPrice.DISCOUNT_DIFF*t,DISCOUNT_DIFF_PERCENT:this.currentBasisPrice.DISCOUNT_DIFF_PERCENT,CURRENCY:this.currentBasisPrice.CURRENCY};this.setPrice(s)}}}};t.JCCatalogElement.prototype.QuantityChange=function(){var t=0,i,s,e;if(0===this.errorCode&&this.config.showQuantity){if(this.canBuy){t=this.isDblQuantity?parseFloat(this.obQuantity.value):parseInt(this.obQuantity.value,10);if(!isNaN(t)){if(this.checkQuantity){if(t>this.maxQuantity){t=this.maxQuantity}}if(t<this.stepQuantity){t=this.stepQuantity}else{e=Math.round(t*this.precisionFactor/this.stepQuantity)/this.precisionFactor;s=parseInt(e,10);if(isNaN(s)){s=1;e=1.1}if(e>s){t=s<=1?this.stepQuantity:s*this.stepQuantity;t=Math.round(t*this.precisionFactor)/this.precisionFactor}}this.obQuantity.value=t}else{this.obQuantity.value=this.stepQuantity}}else{this.obQuantity.value=this.stepQuantity}i={DISCOUNT_VALUE:this.currentBasisPrice.DISCOUNT_VALUE*this.obQuantity.value,VALUE:this.currentBasisPrice.VALUE*this.obQuantity.value,DISCOUNT_DIFF:this.currentBasisPrice.DISCOUNT_DIFF*this.obQuantity.value,DISCOUNT_DIFF_PERCENT:this.currentBasisPrice.DISCOUNT_DIFF_PERCENT,CURRENCY:this.currentBasisPrice.CURRENCY};this.setPrice(i)}};t.JCCatalogElement.prototype.QuantitySet=function(t){var i="",s;if(this.errorCode===0){this.canBuy=this.offers[t].CAN_BUY;if(this.canBuy){if(!!this.obBasketActions){BX.style(this.obBasketActions,"display","")}if(!!this.obNotAvail){BX.style(this.obNotAvail,"display","none")}if(BX.proxy_context.parentNode&&!!this.obSubscribe){BX.style(this.obSubscribe,"display","none")}}else{if(!!this.obBasketActions){BX.style(this.obBasketActions,"display","none")}if(!!this.obNotAvail){BX.style(this.obNotAvail,"display","")}if(BX.proxy_context.parentNode&&!!this.obSubscribe){BX.style(this.obSubscribe,"display","");this.obSubscribe.setAttribute("data-item",this.offers[t].ID);BX(this.visual.SUBSCRIBE_ID+"_hidden").click()}}if(this.config.showQuantity){this.isDblQuantity=this.offers[t].QUANTITY_FLOAT;this.checkQuantity=this.offers[t].CHECK_QUANTITY;if(this.isDblQuantity){this.maxQuantity=parseFloat(this.offers[t].MAX_QUANTITY);this.stepQuantity=Math.round(parseFloat(this.offers[t].STEP_QUANTITY)*this.precisionFactor)/this.precisionFactor}else{this.maxQuantity=parseInt(this.offers[t].MAX_QUANTITY,10);this.stepQuantity=parseInt(this.offers[t].STEP_QUANTITY,10)}this.obQuantity.value=this.stepQuantity;this.obQuantity.disabled=!this.canBuy;if(!!this.obMeasure){if(!!this.offers[t].MEASURE){BX.adjust(this.obMeasure,{html:this.offers[t].MEASURE})}else{BX.adjust(this.obMeasure,{html:""})}}if(!!this.obQuantityLimit.all){if(!this.checkQuantity){BX.adjust(this.obQuantityLimit.value,{html:""});BX.adjust(this.obQuantityLimit.all,{style:{display:"none"}})}else{s=this.offers[t].MAX_QUANTITY;if(!!this.offers[t].MEASURE){s+=" "+this.offers[t].MEASURE}BX.adjust(this.obQuantityLimit.value,{html:s});BX.adjust(this.obQuantityLimit.all,{style:{display:""}})}}if(!!this.obBasisPrice){if(!!this.offers[t].BASIS_PRICE){i=BX.message("BASIS_PRICE_MESSAGE");i=i.replace("#PRICE#",BX.Currency.currencyFormat(this.offers[t].BASIS_PRICE.DISCOUNT_VALUE,this.offers[t].BASIS_PRICE.CURRENCY,true));i=i.replace("#MEASURE#",this.offers[t].MEASURE);BX.adjust(this.obBasisPrice,{style:{display:""},html:i})}else{BX.adjust(this.obBasisPrice,{style:{display:"none"},html:""})}}}this.currentBasisPrice=this.offers[t].BASIS_PRICE}};t.JCCatalogElement.prototype.SelectOfferProp=function(){var t=0,i="",s=[],e=null,a=BX.proxy_context;if(!!a&&a.hasAttribute("data-treevalue")){if(typeof document.activeElement==="object")document.activeElement.blur();i=a.getAttribute("data-treevalue");s=i.split("_");this.SearchOfferPropIndex(s[0],s[1]);e=BX.findChildren(a.parentNode,{tagName:"li"},false);if(!!e&&0<e.length){for(t=0;t<e.length;t++){BX.removeClass(e[t],"bx_active")}}BX.addClass(a,"bx_active")}};t.JCCatalogElement.prototype.SearchOfferPropIndex=function(t,i){var s="",e=false,a=[],r=[],o=-1,h,n,l={},f=[];for(h=0;h<this.treeProps.length;h++){if(this.treeProps[h].ID===t){o=h;break}}if(-1<o){for(h=0;h<o;h++){s="PROP_"+this.treeProps[h].ID;l[s]=this.selectedValues[s]}s="PROP_"+this.treeProps[o].ID;l[s]=i;for(h=o+1;h<this.treeProps.length;h++){s="PROP_"+this.treeProps[h].ID;e=this.GetRowValues(l,s);if(!e){break}r=[];if(this.config.showAbsent){a=[];f=[];f=BX.clone(l,true);for(n=0;n<e.length;n++){f[s]=e[n];r[r.length]=e[n];if(this.GetCanBuy(f))a[a.length]=e[n]}}else{a=e}if(!!this.selectedValues[s]&&BX.util.in_array(this.selectedValues[s],a)){l[s]=this.selectedValues[s]}else{if(this.config.showAbsent)l[s]=a.length>0?a[0]:r[0];else l[s]=a[0]}this.UpdateRow(h,l[s],e,a)}this.selectedValues=l;this.ChangeInfo()}};t.JCCatalogElement.prototype.RowLeft=function(){var t="",i=-1,s,e=BX.proxy_context;if(!!e&&e.hasAttribute("data-treevalue")){t=e.getAttribute("data-treevalue");for(s=0;s<this.treeProps.length;s++){if(this.treeProps[s].ID===t){i=s;break}}if(-1<i&&this.treeRowShowSize<this.showCount[i]){if(0>this.showStart[i]){this.showStart[i]++;BX.adjust(this.obTreeRows[i].LIST,{style:{marginLeft:this.showStart[i]*20+"%"}});BX.adjust(this.obTreeRows[i].RIGHT,{style:this.treeEnableArrow})}if(0<=this.showStart[i]){BX.adjust(this.obTreeRows[i].LEFT,{style:this.treeDisableArrow})}}}};t.JCCatalogElement.prototype.RowRight=function(){var t="",i=-1,s,e=BX.proxy_context;if(!!e&&e.hasAttribute("data-treevalue")){t=e.getAttribute("data-treevalue");for(s=0;s<this.treeProps.length;s++){if(this.treeProps[s].ID===t){i=s;break}}if(-1<i&&this.treeRowShowSize<this.showCount[i]){if(this.treeRowShowSize-this.showStart[i]<this.showCount[i]){this.showStart[i]--;BX.adjust(this.obTreeRows[i].LIST,{style:{marginLeft:this.showStart[i]*20+"%"}});BX.adjust(this.obTreeRows[i].LEFT,{style:this.treeEnableArrow})}if(this.treeRowShowSize-this.showStart[i]>=this.showCount[i]){BX.adjust(this.obTreeRows[i].RIGHT,{style:this.treeDisableArrow})}}}};t.JCCatalogElement.prototype.UpdateRow=function(t,i,s,e){var a=0,r=0,o="",h=0,n="",l={},f=null,u=false,c=false,p=false,d=0,m=this.treeEnableArrow,g=this.treeEnableArrow,I=0;if(-1<t&&t<this.obTreeRows.length){f=BX.findChildren(this.obTreeRows[t].LIST,{tagName:"li"},false);if(!!f&&0<f.length){u="PICT"===this.treeProps[t].SHOW_MODE;h=s.length;c=this.treeRowShowSize<h;n=this.treeRowShowSize<h?100/h+"%":"20%";l={props:{className:""},style:{width:n}};if(u){l.style.paddingTop=n}for(a=0;a<f.length;a++){o=f[a].getAttribute("data-onevalue");p=o===i;if(BX.util.in_array(o,e)){l.props.className=p?"bx_active":""}else{l.props.className=p?"bx_active bx_missing":"bx_missing"}l.style.display="none";if(BX.util.in_array(o,s)){l.style.display="";if(p){d=r}r++}BX.adjust(f[a],l)}l={style:{width:(c?20*h:100)+"%",marginLeft:"0%"}};if(u){BX.adjust(this.obTreeRows[t].CONT,{props:{className:c?"bx_item_detail_scu full":"bx_item_detail_scu"}})}else{BX.adjust(this.obTreeRows[t].CONT,{props:{className:c<h?"bx_item_detail_size full":"bx_item_detail_size"}})}if(c){if(d+1===h){g=this.treeDisableArrow}if(this.treeRowShowSize<=d){I=this.treeRowShowSize-d-1;l.style.marginLeft=I*20+"%"}if(0===I){m=this.treeDisableArrow}BX.adjust(this.obTreeRows[t].LEFT,{style:m});BX.adjust(this.obTreeRows[t].RIGHT,{style:g})}else{BX.adjust(this.obTreeRows[t].LEFT,{style:{display:"none"}});BX.adjust(this.obTreeRows[t].RIGHT,{style:{display:"none"}})}BX.adjust(this.obTreeRows[t].LIST,l);this.showCount[t]=h;this.showStart[t]=I}}};t.JCCatalogElement.prototype.GetRowValues=function(t,i){var s=[],e=0,a=0,r=false,o=true;if(0===t.length){for(e=0;e<this.offers.length;e++){if(!BX.util.in_array(this.offers[e].TREE[i],s)){s[s.length]=this.offers[e].TREE[i]}}r=true}else{for(e=0;e<this.offers.length;e++){o=true;for(a in t){if(t[a]!==this.offers[e].TREE[a]){o=false;break}}if(o){if(!BX.util.in_array(this.offers[e].TREE[i],s)){s[s.length]=this.offers[e].TREE[i]}r=true}}}return r?s:false};t.JCCatalogElement.prototype.GetCanBuy=function(t){var i=0,s=0,e=true,a=false;for(i=0;i<this.offers.length;i++){e=true;for(s in t){if(t[s]!==this.offers[i].TREE[s]){e=false;break}}if(e){if(this.offers[i].CAN_BUY){a=true;break}}}return a};t.JCCatalogElement.prototype.SetCurrent=function(){var t=0,i=0,s="",e=false,a=[],r={},o=[],h=this.offers[this.offerNum].TREE;for(t=0;t<this.treeProps.length;t++){s="PROP_"+this.treeProps[t].ID;e=this.GetRowValues(r,s);if(!e){break}if(BX.util.in_array(h[s],e)){r[s]=h[s]}else{r[s]=e[0];this.offerNum=0}if(this.config.showAbsent){a=[];o=[];o=BX.clone(r,true);for(i=0;i<e.length;i++){o[s]=e[i];if(this.GetCanBuy(o)){a[a.length]=e[i]}}}else{a=e}this.UpdateRow(t,r[s],e,a)}this.selectedValues=r;this.ChangeInfo()};t.JCCatalogElement.prototype.ChangeInfo=function(){var t=-1,i,s=0,e=true,a={currentId:this.offerNum>-1?this.offers[this.offerNum].ID:0,newId:0};for(i=0;i<this.offers.length;i++){e=true;for(s in this.selectedValues){if(this.selectedValues[s]!==this.offers[i].TREE[s]){e=false;break}}if(e){t=i;break}}if(-1<t){if(t!=this.offerNum){this.isGift=false}this.setPrice(this.offers[t].PRICE);for(i=0;i<this.offers.length;i++){if(this.config.showOfferGroup&&this.offers[i].OFFER_GROUP){if(i!==t){BX.adjust(BX(this.visual.OFFER_GROUP+this.offers[i].ID),{style:{display:"none"}})}}if(!!this.sliders[i].ID){if(i===t){this.sliders[i].START=0;BX.adjust(this.sliders[i].LIST,{style:{marginLeft:"0%"}});BX.adjust(this.sliders[i].CONT,{style:{display:""}});BX.adjust(this.sliders[i].LEFT,{style:this.sliderDisableArrow});BX.adjust(this.sliders[i].RIGHT,{style:this.sliderEnableArrow})}else{BX.adjust(this.sliders[i].CONT,{style:{display:"none"}})}}}if(this.config.showOfferGroup&&this.offers[t].OFFER_GROUP){BX.adjust(BX(this.visual.OFFER_GROUP+this.offers[t].ID),{style:{display:""}})}if(0<this.offers[t].SLIDER_COUNT){this.SetMainPict(this.offers[t].ID,this.offers[t].SLIDER[0].ID)}else{this.SetMainPictFromItem(t)}if(this.config.showSkuProps&&!!this.obSkuProps){if(!this.offers[t].DISPLAY_PROPERTIES||this.offers[t].DISPLAY_PROPERTIES.length===0){BX.adjust(this.obSkuProps,{style:{display:"none"},html:""})}else{BX.adjust(this.obSkuProps,{style:{display:""},html:this.offers[t].DISPLAY_PROPERTIES})}}this.offerNum=t;this.QuantitySet(this.offerNum);this.incViewedCounter();a.newId=this.offers[this.offerNum].ID;BX.onCustomEvent("onCatalogStoreProductChange",[this.offers[this.offerNum].ID]);BX.onCustomEvent("onCatalogElementChangeOffer",a);a=null}};t.JCCatalogElement.prototype.restoreSticker=function(){if(this.previousStickerText){this.redrawSticker({text:this.previousStickerText})}else{this.hideSticker()}};t.JCCatalogElement.prototype.hideSticker=function(){BX.hide(BX(this.visual.STICKER_ID))};t.JCCatalogElement.prototype.redrawSticker=function(t){t=t||{};var i=t.text||"";var s=BX(this.visual.STICKER_ID);if(!s){return}BX.show(BX(this.visual.STICKER_ID),"block");var e=s.getAttribute("title");if(e&&e!=i){this.previousStickerText=e}BX.adjust(s,{text:i,attrs:{title:i}})};t.JCCatalogElement.prototype.setPrice=function(t){var i="";if(this.isGift){t.DISCOUNT_VALUE=0;t.DISCOUNT_DIFF=t.VALUE;t.DISCOUNT_DIFF_PERCENT=-100}if(!!this.obPrice.price){BX.adjust(this.obPrice.price,{html:BX.Currency.currencyFormat(t.DISCOUNT_VALUE,t.CURRENCY,true)});if(t.DISCOUNT_VALUE!==t.VALUE){if(this.config.showOldPrice){if(!!this.obPrice.full){BX.adjust(this.obPrice.full,{style:{display:""},html:BX.Currency.currencyFormat(t.VALUE,t.CURRENCY,true)})}if(!!this.obPrice.discount){i=BX.message("ECONOMY_INFO_MESSAGE");i=i.replace("#ECONOMY#",BX.Currency.currencyFormat(t.DISCOUNT_DIFF,t.CURRENCY,true));BX.adjust(this.obPrice.discount,{style:{display:""},html:i})}}if(this.config.showPercent){if(!!this.obPrice.percent){BX.adjust(this.obPrice.percent,{style:{display:""},html:t.DISCOUNT_DIFF_PERCENT+"%"})}}}else{if(this.config.showOldPrice){if(!!this.obPrice.full){BX.adjust(this.obPrice.full,{style:{display:"none"},html:""})}if(!!this.obPrice.discount){BX.adjust(this.obPrice.discount,{style:{display:"none"},html:""})}}if(this.config.showPercent){if(!!this.obPrice.percent){BX.adjust(this.obPrice.percent,{style:{display:"none"},html:""})}}}}};t.JCCatalogElement.prototype.Compare=function(){var t,i;if(!!this.compareData.compareUrl){switch(this.productType){case 0:case 1:case 2:i=this.compareData.compareUrl.replace("#ID#",this.product.id.toString());break;case 3:i=this.compareData.compareUrl.replace("#ID#",this.offers[this.offerNum].ID);break}t={ajax_action:"Y"};BX.ajax.loadJSON(i,t,BX.proxy(this.CompareResult,this))}};t.JCCatalogElement.prototype.CompareResult=function(t){var s,e;if(!!this.obPopupWin)this.obPopupWin.close();if(!BX.type.isPlainObject(t))return;this.InitPopupWindow();if(t.STATUS==="OK"){BX.onCustomEvent("OnCompareChange");s='<div style="width: 100%; margin: 0; text-align: center;"><p>'+BX.message("COMPARE_MESSAGE_OK")+"</p></div>";if(this.config.showClosePopup){e=[new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_COMPARE_REDIRECT"),events:{click:BX.delegate(this.CompareRedirect,this)},style:{marginRight:"10px"}}),new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_CLOSE_POPUP"),events:{click:BX.delegate(this.obPopupWin.close,this.obPopupWin)}})]}else{e=[new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_COMPARE_REDIRECT"),events:{click:BX.delegate(this.CompareRedirect,this)}})]}}else{s='<div style="width: 100%; margin: 0; text-align: center;"><p>'+(!!t.MESSAGE?t.MESSAGE:BX.message("COMPARE_UNKNOWN_ERROR"))+"</p></div>";e=[new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_CLOSE"),events:{click:BX.delegate(this.obPopupWin.close,this.obPopupWin)}})]}this.obPopupWin.setTitleBar(BX.message("COMPARE_TITLE"));this.obPopupWin.setContent(s);this.obPopupWin.setButtons(e);this.obPopupWin.show()};t.JCCatalogElement.prototype.CompareRedirect=function(){if(!!this.compareData.comparePath)location.href=this.compareData.comparePath;else this.obPopupWin.close()};t.JCCatalogElement.prototype.InitBasketUrl=function(){this.basketUrl=this.basketMode==="ADD"?this.basketData.add_url:this.basketData.buy_url;switch(this.productType){case 1:case 2:this.basketUrl=this.basketUrl.replace("#ID#",this.product.id.toString());break;case 3:this.basketUrl=this.basketUrl.replace("#ID#",this.offers[this.offerNum].ID);break}this.basketParams={ajax_basket:"Y"};if(this.config.showQuantity){this.basketParams[this.basketData.quantity]=this.obQuantity.value}if(!!this.basketData.sku_props){this.basketParams[this.basketData.sku_props_var]=this.basketData.sku_props}};t.JCCatalogElement.prototype.FillBasketProps=function(){if(!this.visual.BASKET_PROP_DIV)return;var t=0,i=null,s=false,e=null;if(this.basketData.useProps&&!this.basketData.emptyProps){if(!!this.obPopupWin&&!!this.obPopupWin.contentContainer)e=this.obPopupWin.contentContainer}else{e=BX(this.visual.BASKET_PROP_DIV)}if(!!e){i=e.getElementsByTagName("select");if(!!i&&!!i.length){for(t=0;t<i.length;t++){if(!i[t].disabled){switch(i[t].type.toLowerCase()){case"select-one":this.basketParams[i[t].name]=i[t].value;s=true;break;default:break}}}}i=e.getElementsByTagName("input");if(!!i&&!!i.length){for(t=0;t<i.length;t++){if(!i[t].disabled){switch(i[t].type.toLowerCase()){case"hidden":this.basketParams[i[t].name]=i[t].value;s=true;break;case"radio":if(i[t].checked){this.basketParams[i[t].name]=i[t].value;s=true}break;default:break}}}}}if(!s){this.basketParams[this.basketData.props]=[];this.basketParams[this.basketData.props][0]=0}};t.JCCatalogElement.prototype.SendToBasket=function(){if(!this.canBuy)return;this.InitBasketUrl();this.FillBasketProps();BX.ajax.loadJSON(this.basketUrl,this.basketParams,BX.proxy(this.BasketResult,this))};t.JCCatalogElement.prototype.Add2Basket=function(){this.basketMode="ADD";this.Basket()};t.JCCatalogElement.prototype.BuyBasket=function(){this.basketMode="BUY";this.Basket()};t.JCCatalogElement.prototype.Basket=function(){var t="";if(!this.canBuy)return;switch(this.productType){case 1:case 2:if(this.basketData.useProps&&!this.basketData.emptyProps){this.InitPopupWindow();this.obPopupWin.setTitleBar(BX.message("TITLE_BASKET_PROPS"));if(BX(this.visual.BASKET_PROP_DIV)){t=BX(this.visual.BASKET_PROP_DIV).innerHTML}this.obPopupWin.setContent(t);this.obPopupWin.setButtons([new i({ownerClass:this.obProduct.className,text:BX.message("BTN_SEND_PROPS"),events:{click:BX.delegate(this.SendToBasket,this)}})]);this.obPopupWin.show()}else{this.SendToBasket()}break;case 3:this.SendToBasket();break}};t.JCCatalogElement.prototype.BasketResult=function(t){var s,e,a;if(!!this.obPopupWin)this.obPopupWin.close();if(!BX.type.isPlainObject(t))return;if(t.STATUS==="OK"&&this.basketMode==="BUY"){this.BasketRedirect()}else{this.InitPopupWindow();if(t.STATUS==="OK"){BX.onCustomEvent("OnBasketChange");switch(this.productType){case 1:case 2:a=this.product.pict.SRC;break;case 3:a=!!this.offers[this.offerNum].PREVIEW_PICTURE?this.offers[this.offerNum].PREVIEW_PICTURE.SRC:this.defaultPict.pict.SRC;break}s='<div style="width: 100%; margin: 0; text-align: center;"><img src="'+a+'" height="130" style="max-height:130px"><p>'+this.product.name+"</p></div>";if(this.config.showClosePopup){e=[new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_BASKET_REDIRECT"),events:{click:BX.delegate(this.BasketRedirect,this)},style:{marginRight:"10px"}}),new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_CLOSE_POPUP"),events:{click:BX.delegate(this.obPopupWin.close,this.obPopupWin)}})]}else{e=[new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_BASKET_REDIRECT"),events:{click:BX.delegate(this.BasketRedirect,this)}})]}}else{s='<div style="width: 100%; margin: 0; text-align: center;"><p>'+(!!t.MESSAGE?t.MESSAGE:BX.message("BASKET_UNKNOWN_ERROR"))+"</p></div>";e=[new i({ownerClass:this.obProduct.className,text:BX.message("BTN_MESSAGE_CLOSE"),events:{click:BX.delegate(this.obPopupWin.close,this.obPopupWin)}})]}this.obPopupWin.setTitleBar(t.STATUS==="OK"?BX.message("TITLE_SUCCESSFUL"):BX.message("TITLE_ERROR"));this.obPopupWin.setContent(s);this.obPopupWin.setButtons(e);this.obPopupWin.show()}};t.JCCatalogElement.prototype.BasketRedirect=function(){location.href=!!this.basketData.basketUrl?this.basketData.basketUrl:BX.message("BASKET_URL")};t.JCCatalogElement.prototype.InitPopupWindow=function(){if(!!this.obPopupWin)return;this.obPopupWin=BX.PopupWindowManager.create("CatalogElementBasket_"+this.visual.ID,null,{autoHide:false,offsetLeft:0,offsetTop:0,overlay:true,closeByEsc:true,titleBar:true,closeIcon:true,contentColor:"white"})};t.JCCatalogElement.prototype.onPopupWindowShow=function(t){BX.bind(document,"click",BX.proxy(this.popupWindowClick,this))};t.JCCatalogElement.prototype.onPopupWindowClose=function(t,i){BX.unbind(document,"click",BX.proxy(this.popupWindowClick,this))};t.JCCatalogElement.prototype.popupWindowClick=function(){if(!!this.obPopupPict&&typeof this.obPopupPict==="object"){if(this.obPopupPict.isShown())this.obPopupPict.close()}};t.JCCatalogElement.prototype.incViewedCounter=function(){if(this.currentIsSet&&!this.updateViewedCount){switch(this.productType){case 1:case 2:this.viewedCounter.params.PRODUCT_ID=this.product.id;this.viewedCounter.params.PARENT_ID=this.product.id;break;case 3:this.viewedCounter.params.PARENT_ID=this.product.id;this.viewedCounter.params.PRODUCT_ID=this.offers[this.offerNum].ID;break;default:return}this.viewedCounter.params.SITE_ID=BX.message("SITE_ID");this.updateViewedCount=true;BX.ajax.post(this.viewedCounter.path,this.viewedCounter.params,BX.delegate(function(){this.updateViewedCount=false},this))}};t.JCCatalogElement.prototype.allowViewedCount=function(t){t=!!t;this.currentIsSet=true;if(t)this.incViewedCounter()}})(window);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:106:"/bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.section/catalog_all/script.js?163829770339809";s:6:"source";s:90:"/bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.section/catalog_all/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
(function (window) {

if (!!window.JCCatalogSection)
{
	return;
}

var BasketButton = function(params)
{
	BasketButton.superclass.constructor.apply(this, arguments);
	this.nameNode = BX.create('span', {
		props : { className : 'bx_medium bx_bt_button', id : this.id },
		style: typeof(params.style) === 'object' ? params.style : {},
		text: params.text
	});
	this.buttonNode = BX.create('span', {
		attrs: { className: params.ownerClass },
		style: { marginBottom: '0', borderBottom: '0 none transparent' },
		children: [this.nameNode],
		events : this.contextEvents
	});
	if (BX.browser.IsIE())
	{
		this.buttonNode.setAttribute("hideFocus", "hidefocus");
	}
};
BX.extend(BasketButton, BX.PopupWindowButton);

window.JCCatalogSection = function (arParams)
{
	this.productType = 0;
	this.showQuantity = true;
	this.showAbsent = true;
	this.secondPict = false;
	this.showOldPrice = false;
	this.showPercent = false;
	this.showSkuProps = false;
	this.basketAction = 'ADD';
	this.showClosePopup = false;
	this.useCompare = false;
	this.visual = {
		ID: '',
		PICT_ID: '',
		SECOND_PICT_ID: '',
		QUANTITY_ID: '',
		QUANTITY_UP_ID: '',
		QUANTITY_DOWN_ID: '',
		PRICE_ID: '',
		DSC_PERC: '',
		SECOND_DSC_PERC: '',
		DISPLAY_PROP_DIV: '',
		BASKET_PROP_DIV: '',
		SUBSCRIBE_ID: ''
	};
	this.product = {
		checkQuantity: false,
		maxQuantity: 0,
		stepQuantity: 1,
		isDblQuantity: false,
		canBuy: true,
		canSubscription: true,
		name: '',
		pict: {},
		id: 0,
		addUrl: '',
		buyUrl: ''
	};

	this.basketMode = '';
	this.basketData = {
		useProps: false,
		emptyProps: false,
		quantity: 'quantity',
		props: 'prop',
		basketUrl: '',
		sku_props: '',
		sku_props_var: 'basket_props',
		add_url: '',
		buy_url: ''
	};

	this.compareData = {
		compareUrl: '',
		comparePath: ''
	};

	this.defaultPict = {
		pict: null,
		secondPict: null
	};

	this.checkQuantity = false;
	this.maxQuantity = 0;
	this.stepQuantity = 1;
	this.isDblQuantity = false;
	this.canBuy = true;
	this.currentBasisPrice = {};
	this.canSubscription = true;
	this.precision = 6;
	this.precisionFactor = Math.pow(10,this.precision);

	this.offers = [];
	this.offerNum = 0;
	this.treeProps = [];
	this.obTreeRows = [];
	this.showCount = [];
	this.showStart = [];
	this.selectedValues = {};

	this.obProduct = null;
	this.obQuantity = null;
	this.obQuantityUp = null;
	this.obQuantityDown = null;
	this.obPict = null;
	this.obSecondPict = null;
	this.obPrice = null;
	this.obTree = null;
	this.obBuyBtn = null;
	this.obBasketActions = null;
	this.obNotAvail = null;
	this.obSubscribe = null;
	this.obDscPerc = null;
	this.obSecondDscPerc = null;
	this.obSkuProps = null;
	this.obMeasure = null;
	this.obCompare = null;

	this.obPopupWin = null;
	this.basketUrl = '';
	this.basketParams = {};

	this.treeRowShowSize = 5;
	this.treeEnableArrow = { display: '', cursor: 'pointer', opacity: 1 };
	this.treeDisableArrow = { display: '', cursor: 'default', opacity:0.2 };

	this.lastElement = false;
	this.containerHeight = 0;

	this.errorCode = 0;

	if ('object' === typeof arParams)
	{
		this.productType = parseInt(arParams.PRODUCT_TYPE, 10);
		this.showQuantity = arParams.SHOW_QUANTITY;
		this.showAbsent = arParams.SHOW_ABSENT;
		this.secondPict = !!arParams.SECOND_PICT;
		this.showOldPrice = !!arParams.SHOW_OLD_PRICE;
		this.showPercent = !!arParams.SHOW_DISCOUNT_PERCENT;
		this.showSkuProps = !!arParams.SHOW_SKU_PROPS;
		if (!!arParams.ADD_TO_BASKET_ACTION)
		{
			this.basketAction = arParams.ADD_TO_BASKET_ACTION;
		}
		this.showClosePopup = !!arParams.SHOW_CLOSE_POPUP;
		this.useCompare = !!arParams.DISPLAY_COMPARE;

		this.visual = arParams.VISUAL;

		switch (this.productType)
		{
			case 0://no catalog
			case 1://product
			case 2://set
				if (!!arParams.PRODUCT && 'object' === typeof(arParams.PRODUCT))
				{
					if (this.showQuantity)
					{
						this.product.checkQuantity = arParams.PRODUCT.CHECK_QUANTITY;
						this.product.isDblQuantity = arParams.PRODUCT.QUANTITY_FLOAT;
						if (this.product.checkQuantity)
						{
							this.product.maxQuantity = (this.product.isDblQuantity ? parseFloat(arParams.PRODUCT.MAX_QUANTITY) : parseInt(arParams.PRODUCT.MAX_QUANTITY, 10));
						}
						this.product.stepQuantity = (this.product.isDblQuantity ? parseFloat(arParams.PRODUCT.STEP_QUANTITY) : parseInt(arParams.PRODUCT.STEP_QUANTITY, 10));

						this.checkQuantity = this.product.checkQuantity;
						this.isDblQuantity = this.product.isDblQuantity;
						this.maxQuantity = this.product.maxQuantity;
						this.stepQuantity = this.product.stepQuantity;
						if (this.isDblQuantity)
						{
							this.stepQuantity = Math.round(this.stepQuantity*this.precisionFactor)/this.precisionFactor;
						}
					}
					this.product.canBuy = arParams.PRODUCT.CAN_BUY;
					this.product.canSubscription = arParams.PRODUCT.SUBSCRIPTION;
					if (!!arParams.PRODUCT.BASIS_PRICE)
					{
						this.currentBasisPrice = arParams.PRODUCT.BASIS_PRICE;
					}

					this.canBuy = this.product.canBuy;
					this.canSubscription = this.product.canSubscription;

					this.product.name = arParams.PRODUCT.NAME;
					this.product.pict = arParams.PRODUCT.PICT;
					this.product.id = arParams.PRODUCT.ID;
					if (!!arParams.PRODUCT.ADD_URL)
					{
						this.product.addUrl = arParams.PRODUCT.ADD_URL;
					}
					if (!!arParams.PRODUCT.BUY_URL)
					{
						this.product.buyUrl = arParams.PRODUCT.BUY_URL;
					}
					if (!!arParams.BASKET && 'object' === typeof(arParams.BASKET))
					{
						this.basketData.useProps = !!arParams.BASKET.ADD_PROPS;
						this.basketData.emptyProps = !!arParams.BASKET.EMPTY_PROPS;
					}
				}
				else
				{
					this.errorCode = -1;
				}
				break;
			case 3://sku
				if (!!arParams.OFFERS && BX.type.isArray(arParams.OFFERS))
				{
					if (!!arParams.PRODUCT && 'object' === typeof(arParams.PRODUCT))
					{
						this.product.name = arParams.PRODUCT.NAME;
						this.product.id = arParams.PRODUCT.ID;
					}
					this.offers = arParams.OFFERS;
					this.offerNum = 0;
					if (!!arParams.OFFER_SELECTED)
					{
						this.offerNum = parseInt(arParams.OFFER_SELECTED, 10);
					}
					if (isNaN(this.offerNum))
					{
						this.offerNum = 0;
					}
					if (!!arParams.TREE_PROPS)
					{
						this.treeProps = arParams.TREE_PROPS;
					}
					if (!!arParams.DEFAULT_PICTURE)
					{
						this.defaultPict.pict = arParams.DEFAULT_PICTURE.PICTURE;
						this.defaultPict.secondPict = arParams.DEFAULT_PICTURE.PICTURE_SECOND;
					}
				}
				break;
			default:
				this.errorCode = -1;
		}
		if (!!arParams.BASKET && 'object' === typeof(arParams.BASKET))
		{
			if (!!arParams.BASKET.QUANTITY)
			{
				this.basketData.quantity = arParams.BASKET.QUANTITY;
			}
			if (!!arParams.BASKET.PROPS)
			{
				this.basketData.props = arParams.BASKET.PROPS;
			}
			if (!!arParams.BASKET.BASKET_URL)
			{
				this.basketData.basketUrl = arParams.BASKET.BASKET_URL;
			}
			if (3 === this.productType)
			{
				if (!!arParams.BASKET.SKU_PROPS)
				{
					this.basketData.sku_props = arParams.BASKET.SKU_PROPS;
				}
			}
			if (!!arParams.BASKET.ADD_URL_TEMPLATE)
			{
				this.basketData.add_url = arParams.BASKET.ADD_URL_TEMPLATE;
			}
			if (!!arParams.BASKET.BUY_URL_TEMPLATE)
			{
				this.basketData.buy_url = arParams.BASKET.BUY_URL_TEMPLATE;
			}
			if (this.basketData.add_url === '' && this.basketData.buy_url === '')
			{
				this.errorCode = -1024;
			}
		}
		if (this.useCompare)
		{
			if (!!arParams.COMPARE && typeof(arParams.COMPARE) === 'object')
			{
				if (!!arParams.COMPARE.COMPARE_PATH)
				{
					this.compareData.comparePath = arParams.COMPARE.COMPARE_PATH;
				}
				if (!!arParams.COMPARE.COMPARE_URL_TEMPLATE)
				{
					this.compareData.compareUrl = arParams.COMPARE.COMPARE_URL_TEMPLATE;
				}
				else
				{
					this.useCompare = false;
				}
			}
			else
			{
				this.useCompare = false;
			}
		}

		this.lastElement = (!!arParams.LAST_ELEMENT && 'Y' === arParams.LAST_ELEMENT);
	}
	if (0 === this.errorCode)
	{
		BX.ready(BX.delegate(this.Init,this));
	}
};

window.JCCatalogSection.prototype.Init = function()
{
	var i = 0,
		strPrefix = '',
		TreeItems = null;

	this.obProduct = BX(this.visual.ID);
	if (!this.obProduct)
	{
		this.errorCode = -1;
	}
	this.obPict = BX(this.visual.PICT_ID);
	if (!this.obPict)
	{
		this.errorCode = -2;
	}
	if (this.secondPict && !!this.visual.SECOND_PICT_ID)
	{
		this.obSecondPict = BX(this.visual.SECOND_PICT_ID);
	}
	this.obPrice = BX(this.visual.PRICE_ID);
	if (!this.obPrice)
	{
		this.errorCode = -16;
	}
	if (this.showQuantity && !!this.visual.QUANTITY_ID)
	{
		this.obQuantity = BX(this.visual.QUANTITY_ID);
		if (!!this.visual.QUANTITY_UP_ID)
		{
			this.obQuantityUp = BX(this.visual.QUANTITY_UP_ID);
		}
		if (!!this.visual.QUANTITY_DOWN_ID)
		{
			this.obQuantityDown = BX(this.visual.QUANTITY_DOWN_ID);
		}
	}
	if (3 === this.productType && this.offers.length > 0)
	{
		if (!!this.visual.TREE_ID)
		{
			this.obTree = BX(this.visual.TREE_ID);
			if (!this.obTree)
			{
				this.errorCode = -256;
			}
			strPrefix = this.visual.TREE_ITEM_ID;
			for (i = 0; i < this.treeProps.length; i++)
			{
				this.obTreeRows[i] = {
					LEFT: BX(strPrefix+this.treeProps[i].ID+'_left'),
					RIGHT: BX(strPrefix+this.treeProps[i].ID+'_right'),
					LIST: BX(strPrefix+this.treeProps[i].ID+'_list'),
					CONT: BX(strPrefix+this.treeProps[i].ID+'_cont')
				};
				if (!this.obTreeRows[i].LEFT || !this.obTreeRows[i].RIGHT || !this.obTreeRows[i].LIST || !this.obTreeRows[i].CONT)
				{
					this.errorCode = -512;
					break;
				}
			}
		}
		if (!!this.visual.QUANTITY_MEASURE)
		{
			this.obMeasure = BX(this.visual.QUANTITY_MEASURE);
		}
	}

	this.obBasketActions = BX(this.visual.BASKET_ACTIONS_ID);
	if (!!this.obBasketActions)
	{
		if (!!this.visual.BUY_ID)
		{
			this.obBuyBtn = BX(this.visual.BUY_ID);
		}
	}
	this.obNotAvail = BX(this.visual.NOT_AVAILABLE_MESS);

	this.obSubscribe = BX(this.visual.SUBSCRIBE_ID);

	if (this.showPercent)
	{
		if (!!this.visual.DSC_PERC)
		{
			this.obDscPerc = BX(this.visual.DSC_PERC);
		}
		if (this.secondPict && !!this.visual.SECOND_DSC_PERC)
		{
			this.obSecondDscPerc = BX(this.visual.SECOND_DSC_PERC);
		}
	}

	if (this.showSkuProps)
	{
		if (!!this.visual.DISPLAY_PROP_DIV)
		{
			this.obSkuProps = BX(this.visual.DISPLAY_PROP_DIV);
		}
	}

	if (0 === this.errorCode)
	{
		if (this.showQuantity)
		{
			if (!!this.obQuantityUp)
			{
				BX.bind(this.obQuantityUp, 'click', BX.delegate(this.QuantityUp, this));
			}
			if (!!this.obQuantityDown)
			{
				BX.bind(this.obQuantityDown, 'click', BX.delegate(this.QuantityDown, this));
			}
			if (!!this.obQuantity)
			{
				BX.bind(this.obQuantity, 'change', BX.delegate(this.QuantityChange, this));
			}
		}
		switch (this.productType)
		{
			case 1://product
				break;
			case 3://sku
				if (this.offers.length > 0)
				{
					TreeItems = BX.findChildren(this.obTree, {tagName: 'li'}, true);
					if (!!TreeItems && 0 < TreeItems.length)
					{
						for (i = 0; i < TreeItems.length; i++)
						{
							BX.bind(TreeItems[i], 'click', BX.delegate(this.SelectOfferProp, this));
						}
					}
					for (i = 0; i < this.obTreeRows.length; i++)
					{
						BX.bind(this.obTreeRows[i].LEFT, 'click', BX.delegate(this.RowLeft, this));
						BX.bind(this.obTreeRows[i].RIGHT, 'click', BX.delegate(this.RowRight, this));
					}
					this.SetCurrent();
				}
				break;
		}
		if (!!this.obBuyBtn)
		{
			if (this.basketAction === 'ADD')
				BX.bind(this.obBuyBtn, 'click', BX.delegate(this.Add2Basket, this));
			else
				BX.bind(this.obBuyBtn, 'click', BX.delegate(this.BuyBasket, this));
		}
		if (this.lastElement)
		{
			this.checkHeight();
			this.setHeight();
			BX.bind(window, 'resize', BX.delegate(this.checkHeight, this));
			BX.bind(this.obProduct.parentNode, 'mouseenter', BX.delegate(this.setHeight, this));
		}
		if (this.useCompare)
		{
			this.obCompare = BX(this.visual.COMPARE_LINK_ID);
			if (!!this.obCompare)
				BX.bind(this.obCompare, 'click', BX.proxy(this.Compare, this));
		}
	}
};

window.JCCatalogSection.prototype.checkHeight = function()
{
	BX.adjust(this.obProduct.parentNode, {style: { height: 'auto'}});
	this.containerHeight = parseInt(this.obProduct.parentNode.offsetHeight, 10);
	if (isNaN(this.containerHeight))
		this.containerHeight = 0;
};

window.JCCatalogSection.prototype.setHeight = function()
{
	if (0 < this.containerHeight)
		BX.adjust(this.obProduct.parentNode, {style: { height: this.containerHeight+'px'}});
};

window.JCCatalogSection.prototype.QuantityUp = function()
{
	var curValue = 0,
		boolSet = true,
		calcPrice;

	if (0 === this.errorCode && this.showQuantity && this.canBuy)
	{
		curValue = (this.isDblQuantity ? parseFloat(this.obQuantity.value) : parseInt(this.obQuantity.value, 10));
		if (!isNaN(curValue))
		{
			curValue += this.stepQuantity;
			if (this.checkQuantity)
			{
				if (curValue > this.maxQuantity)
				{
					boolSet = false;
				}
			}
			if (boolSet)
			{
				if (this.isDblQuantity)
				{
					curValue = Math.round(curValue*this.precisionFactor)/this.precisionFactor;
				}
				this.obQuantity.value = curValue;
				calcPrice = {
					DISCOUNT_VALUE: this.currentBasisPrice.DISCOUNT_VALUE * curValue,
					VALUE: this.currentBasisPrice.VALUE * curValue,
					DISCOUNT_DIFF: this.currentBasisPrice.DISCOUNT_DIFF * curValue,
					DISCOUNT_DIFF_PERCENT: this.currentBasisPrice.DISCOUNT_DIFF_PERCENT,
					CURRENCY: this.currentBasisPrice.CURRENCY
				};
				this.setPrice(calcPrice);
			}
		}
	}
};

window.JCCatalogSection.prototype.QuantityDown = function()
{
	var curValue = 0,
		boolSet = true,
		calcPrice;

	if (0 === this.errorCode && this.showQuantity && this.canBuy)
	{
		curValue = (this.isDblQuantity ? parseFloat(this.obQuantity.value): parseInt(this.obQuantity.value, 10));
		if (!isNaN(curValue))
		{
			curValue -= this.stepQuantity;
			if (curValue < this.stepQuantity)
			{
				boolSet = false;
			}
			if (boolSet)
			{
				if (this.isDblQuantity)
				{
					curValue = Math.round(curValue*this.precisionFactor)/this.precisionFactor;
				}
				this.obQuantity.value = curValue;
				calcPrice = {
					DISCOUNT_VALUE: this.currentBasisPrice.DISCOUNT_VALUE * curValue,
					VALUE: this.currentBasisPrice.VALUE * curValue,
					DISCOUNT_DIFF: this.currentBasisPrice.DISCOUNT_DIFF * curValue,
					DISCOUNT_DIFF_PERCENT: this.currentBasisPrice.DISCOUNT_DIFF_PERCENT,
					CURRENCY: this.currentBasisPrice.CURRENCY
				};
				this.setPrice(calcPrice);
			}
		}
	}
};

window.JCCatalogSection.prototype.QuantityChange = function()
{
	var curValue = 0,
		calcPrice,
		intCount,
		count;

	if (0 === this.errorCode && this.showQuantity)
	{
		if (this.canBuy)
		{
			curValue = (this.isDblQuantity ? parseFloat(this.obQuantity.value) : parseInt(this.obQuantity.value, 10));
			if (!isNaN(curValue))
			{
				if (this.checkQuantity)
				{
					if (curValue > this.maxQuantity)
					{
						curValue = this.maxQuantity;
					}
				}
				if (curValue < this.stepQuantity)
				{
					curValue = this.stepQuantity;
				}
				else
				{
					count = Math.round((curValue*this.precisionFactor)/this.stepQuantity)/this.precisionFactor;
					intCount = parseInt(count, 10);
					if (isNaN(intCount))
					{
						intCount = 1;
						count = 1.1;
					}
					if (count > intCount)
					{
						curValue = (intCount <= 1 ? this.stepQuantity : intCount*this.stepQuantity);
						curValue = Math.round(curValue*this.precisionFactor)/this.precisionFactor;
					}
				}
				this.obQuantity.value = curValue;
			}
			else
			{
				this.obQuantity.value = this.stepQuantity;
			}
		}
		else
		{
			this.obQuantity.value = this.stepQuantity;
		}
		calcPrice = {
			DISCOUNT_VALUE: this.currentBasisPrice.DISCOUNT_VALUE * this.obQuantity.value,
			VALUE: this.currentBasisPrice.VALUE * this.obQuantity.value,
			DISCOUNT_DIFF: this.currentBasisPrice.DISCOUNT_DIFF * this.obQuantity.value,
			DISCOUNT_DIFF_PERCENT: this.currentBasisPrice.DISCOUNT_DIFF_PERCENT,
			CURRENCY: this.currentBasisPrice.CURRENCY
		};
		this.setPrice(calcPrice);
	}
};

window.JCCatalogSection.prototype.QuantitySet = function(index)
{
	if (0 === this.errorCode)
	{
		this.canBuy = this.offers[index].CAN_BUY;
		if (this.canBuy)
		{
			if (!!this.obBasketActions)
			{
				BX.style(this.obBasketActions, 'display', '');
			}
			if (!!this.obNotAvail)
			{
				BX.style(this.obNotAvail, 'display', 'none');
			}
			if (BX.proxy_context.parentNode && !!this.obSubscribe)
			{
				BX.style(this.obSubscribe, 'display', 'none');
			}
		}
		else
		{
			if (!!this.obBasketActions)
			{
				BX.style(this.obBasketActions, 'display', 'none');
			}
			if (!!this.obNotAvail)
			{
				BX.style(this.obNotAvail, 'display', '');
			}
			if (BX.proxy_context.parentNode && !!this.obSubscribe)
			{
				BX.style(this.obSubscribe, 'display', '');
				this.obSubscribe.setAttribute('data-item', this.offers[index].ID);
				BX(this.visual.SUBSCRIBE_ID+'_hidden').click();
			}
		}
		if (this.showQuantity)
		{
			this.isDblQuantity = this.offers[index].QUANTITY_FLOAT;
			this.checkQuantity = this.offers[index].CHECK_QUANTITY;
			if (this.isDblQuantity)
			{
				this.maxQuantity = parseFloat(this.offers[index].MAX_QUANTITY);
				this.stepQuantity = Math.round(parseFloat(this.offers[index].STEP_QUANTITY)*this.precisionFactor)/this.precisionFactor;
			}
			else
			{
				this.maxQuantity = parseInt(this.offers[index].MAX_QUANTITY, 10);
				this.stepQuantity = parseInt(this.offers[index].STEP_QUANTITY, 10);
			}

			this.obQuantity.value = this.stepQuantity;
			this.obQuantity.disabled = !this.canBuy;
			if (!!this.obMeasure)
			{
				if (!!this.offers[index].MEASURE)
				{
					BX.adjust(this.obMeasure, { html : this.offers[index].MEASURE});
				}
				else
				{
					BX.adjust(this.obMeasure, { html : ''});
				}
			}
		}
		this.currentBasisPrice = this.offers[index].BASIS_PRICE;
	}
};

window.JCCatalogSection.prototype.SelectOfferProp = function()
{
	var i = 0,
		value = '',
		strTreeValue = '',
		arTreeItem = [],
		RowItems = null,
		target = BX.proxy_context;

	if (!!target && target.hasAttribute('data-treevalue'))
	{
		strTreeValue = target.getAttribute('data-treevalue');
		arTreeItem = strTreeValue.split('_');
		if (this.SearchOfferPropIndex(arTreeItem[0], arTreeItem[1]))
		{
			RowItems = BX.findChildren(target.parentNode, {tagName: 'li'}, false);
			if (!!RowItems && 0 < RowItems.length)
			{
				for (i = 0; i < RowItems.length; i++)
				{
					value = RowItems[i].getAttribute('data-onevalue');
					if (value === arTreeItem[1])
					{
						BX.addClass(RowItems[i], 'bx_active');
					}
					else
					{
						BX.removeClass(RowItems[i], 'bx_active');
					}
				}
			}
		}
	}
};

window.JCCatalogSection.prototype.SearchOfferPropIndex = function(strPropID, strPropValue)
{
	var strName = '',
		arShowValues = false,
		i, j,
		arCanBuyValues = [],
		allValues = [],
		index = -1,
		arFilter = {},
		tmpFilter = [];

	for (i = 0; i < this.treeProps.length; i++)
	{
		if (this.treeProps[i].ID === strPropID)
		{
			index = i;
			break;
		}
	}

	if (-1 < index)
	{
		for (i = 0; i < index; i++)
		{
			strName = 'PROP_'+this.treeProps[i].ID;
			arFilter[strName] = this.selectedValues[strName];
		}
		strName = 'PROP_'+this.treeProps[index].ID;
		arShowValues = this.GetRowValues(arFilter, strName);
		if (!arShowValues)
		{
			return false;
		}
		if (!BX.util.in_array(strPropValue, arShowValues))
		{
			return false;
		}
		arFilter[strName] = strPropValue;
		for (i = index+1; i < this.treeProps.length; i++)
		{
			strName = 'PROP_'+this.treeProps[i].ID;
			arShowValues = this.GetRowValues(arFilter, strName);
			if (!arShowValues)
			{
				return false;
			}
			allValues = [];
			if (this.showAbsent)
			{
				arCanBuyValues = [];
				tmpFilter = [];
				tmpFilter = BX.clone(arFilter, true);
				for (j = 0; j < arShowValues.length; j++)
				{
					tmpFilter[strName] = arShowValues[j];
					allValues[allValues.length] = arShowValues[j];
					if (this.GetCanBuy(tmpFilter))
						arCanBuyValues[arCanBuyValues.length] = arShowValues[j];
				}
			}
			else
			{
				arCanBuyValues = arShowValues;
			}
			if (!!this.selectedValues[strName] && BX.util.in_array(this.selectedValues[strName], arCanBuyValues))
			{
				arFilter[strName] = this.selectedValues[strName];
			}
			else
			{
				if (this.showAbsent)
					arFilter[strName] = (arCanBuyValues.length > 0 ? arCanBuyValues[0] : allValues[0]);
				else
					arFilter[strName] = arCanBuyValues[0];
			}
			this.UpdateRow(i, arFilter[strName], arShowValues, arCanBuyValues);
		}
		this.selectedValues = arFilter;
		this.ChangeInfo();
	}
	return true;
};

window.JCCatalogSection.prototype.RowLeft = function()
{
	var i = 0,
		strTreeValue = '',
		index = -1,
		target = BX.proxy_context;

	if (!!target && target.hasAttribute('data-treevalue'))
	{
		strTreeValue = target.getAttribute('data-treevalue');
		for (i = 0; i < this.treeProps.length; i++)
		{
			if (this.treeProps[i].ID === strTreeValue)
			{
				index = i;
				break;
			}
		}
		if (-1 < index && this.treeRowShowSize < this.showCount[index])
		{
			if (0 > this.showStart[index])
			{
				this.showStart[index]++;
				BX.adjust(this.obTreeRows[index].LIST, { style: { marginLeft: this.showStart[index]*20+'%' }});
				BX.adjust(this.obTreeRows[index].RIGHT, { style: this.treeEnableArrow });
			}

			if (0 <= this.showStart[index])
			{
				BX.adjust(this.obTreeRows[index].LEFT, { style: this.treeDisableArrow });
			}
		}
	}
};

window.JCCatalogSection.prototype.RowRight = function()
{
	var i = 0,
		strTreeValue = '',
		index = -1,
		target = BX.proxy_context;

	if (!!target && target.hasAttribute('data-treevalue'))
	{
		strTreeValue = target.getAttribute('data-treevalue');
		for (i = 0; i < this.treeProps.length; i++)
		{
			if (this.treeProps[i].ID === strTreeValue)
			{
				index = i;
				break;
			}
		}
		if (-1 < index && this.treeRowShowSize < this.showCount[index])
		{
			if ((this.treeRowShowSize - this.showStart[index]) < this.showCount[index])
			{
				this.showStart[index]--;
				BX.adjust(this.obTreeRows[index].LIST, { style: { marginLeft: this.showStart[index]*20+'%' }});
				BX.adjust(this.obTreeRows[index].LEFT, { style: this.treeEnableArrow });
			}

			if ((this.treeRowShowSize - this.showStart[index]) >= this.showCount[index])
			{
				BX.adjust(this.obTreeRows[index].RIGHT, { style: this.treeDisableArrow });
			}
		}
	}
};

window.JCCatalogSection.prototype.UpdateRow = function(intNumber, activeID, showID, canBuyID)
{
	var i = 0,
		showI = 0,
		value = '',
		countShow = 0,
		strNewLen = '',
		obData = {},
		pictMode = false,
		extShowMode = false,
		isCurrent = false,
		selectIndex = 0,
		obLeft = this.treeEnableArrow,
		obRight = this.treeEnableArrow,
		currentShowStart = 0,
		RowItems = null;

	if (-1 < intNumber && intNumber < this.obTreeRows.length)
	{
		RowItems = BX.findChildren(this.obTreeRows[intNumber].LIST, {tagName: 'li'}, false);
		if (!!RowItems && 0 < RowItems.length)
		{
			pictMode = ('PICT' === this.treeProps[intNumber].SHOW_MODE);
			countShow = showID.length;
			extShowMode = this.treeRowShowSize < countShow;
			strNewLen = (extShowMode ? (100/countShow)+'%' : '20%');
			obData = {
				props: { className: '' },
				style: {
					width: strNewLen
				}
			};
			if (pictMode)
			{
				obData.style.paddingTop = strNewLen;
			}
			for (i = 0; i < RowItems.length; i++)
			{
				value = RowItems[i].getAttribute('data-onevalue');
				isCurrent = (value === activeID);
				if (BX.util.in_array(value, canBuyID))
				{
					obData.props.className = (isCurrent ? 'bx_active' : '');
				}
				else
				{
					obData.props.className = (isCurrent ? 'bx_active bx_missing' : 'bx_missing');
				}
				obData.style.display = 'none';
				if (BX.util.in_array(value, showID))
				{
					obData.style.display = '';
					if (isCurrent)
					{
						selectIndex = showI;
					}
					showI++;
				}
				BX.adjust(RowItems[i], obData);
			}

			obData = {
				style: {
					width: (extShowMode ? 20*countShow : 100)+'%',
					marginLeft: '0%'
				}
			};
			if (pictMode)
			{
				BX.adjust(this.obTreeRows[intNumber].CONT, {props: {className: (extShowMode ? 'bx_item_detail_scu full' : 'bx_item_detail_scu')}});
			}
			else
			{
				BX.adjust(this.obTreeRows[intNumber].CONT, {props: {className: (extShowMode ? 'bx_item_detail_size full' : 'bx_item_detail_size')}});
			}
			if (extShowMode)
			{
				if (selectIndex +1 === countShow)
				{
					obRight = this.treeDisableArrow;
				}
				if (this.treeRowShowSize <= selectIndex)
				{
					currentShowStart = this.treeRowShowSize - selectIndex - 1;
					obData.style.marginLeft = currentShowStart*20+'%';
				}
				if (0 === currentShowStart)
				{
					obLeft = this.treeDisableArrow;
				}
				BX.adjust(this.obTreeRows[intNumber].LEFT, {style: obLeft });
				BX.adjust(this.obTreeRows[intNumber].RIGHT, {style: obRight });
			}
			else
			{
				BX.adjust(this.obTreeRows[intNumber].LEFT, {style: {display: 'none'}});
				BX.adjust(this.obTreeRows[intNumber].RIGHT, {style: {display: 'none'}});
			}
			BX.adjust(this.obTreeRows[intNumber].LIST, obData);
			this.showCount[intNumber] = countShow;
			this.showStart[intNumber] = currentShowStart;
		}
	}
};

window.JCCatalogSection.prototype.GetRowValues = function(arFilter, index)
{
	var i = 0,
		j,
		arValues = [],
		boolSearch = false,
		boolOneSearch = true;

	if (0 === arFilter.length)
	{
		for (i = 0; i < this.offers.length; i++)
		{
			if (!BX.util.in_array(this.offers[i].TREE[index], arValues))
			{
				arValues[arValues.length] = this.offers[i].TREE[index];
			}
		}
		boolSearch = true;
	}
	else
	{
		for (i = 0; i < this.offers.length; i++)
		{
			boolOneSearch = true;
			for (j in arFilter)
			{
				if (arFilter[j] !== this.offers[i].TREE[j])
				{
					boolOneSearch = false;
					break;
				}
			}
			if (boolOneSearch)
			{
				if (!BX.util.in_array(this.offers[i].TREE[index], arValues))
				{
					arValues[arValues.length] = this.offers[i].TREE[index];
				}
				boolSearch = true;
			}
		}
	}
	return (boolSearch ? arValues : false);
};

window.JCCatalogSection.prototype.GetCanBuy = function(arFilter)
{
	var i = 0,
		j,
		boolSearch = false,
		boolOneSearch = true;

	for (i = 0; i < this.offers.length; i++)
	{
		boolOneSearch = true;
		for (j in arFilter)
		{
			if (arFilter[j] !== this.offers[i].TREE[j])
			{
				boolOneSearch = false;
				break;
			}
		}
		if (boolOneSearch)
		{
			if (this.offers[i].CAN_BUY)
			{
				boolSearch = true;
				break;
			}
		}
	}
	return boolSearch;
};

window.JCCatalogSection.prototype.SetCurrent = function()
{
	var i = 0,
		j = 0,
		arCanBuyValues = [],
		strName = '',
		arShowValues = false,
		arFilter = {},
		tmpFilter = [],
		current = this.offers[this.offerNum].TREE;

	for (i = 0; i < this.treeProps.length; i++)
	{
		strName = 'PROP_'+this.treeProps[i].ID;
		arShowValues = this.GetRowValues(arFilter, strName);
		if (!arShowValues)
		{
			break;
		}
		if (BX.util.in_array(current[strName], arShowValues))
		{
			arFilter[strName] = current[strName];
		}
		else
		{
			arFilter[strName] = arShowValues[0];
			this.offerNum = 0;
		}
		if (this.showAbsent)
		{
			arCanBuyValues = [];
			tmpFilter = [];
			tmpFilter = BX.clone(arFilter, true);
			for (j = 0; j < arShowValues.length; j++)
			{
				tmpFilter[strName] = arShowValues[j];
				if (this.GetCanBuy(tmpFilter))
				{
					arCanBuyValues[arCanBuyValues.length] = arShowValues[j];
				}
			}
		}
		else
		{
			arCanBuyValues = arShowValues;
		}
		this.UpdateRow(i, arFilter[strName], arShowValues, arCanBuyValues);
	}
	this.selectedValues = arFilter;
	this.ChangeInfo();
};

window.JCCatalogSection.prototype.ChangeInfo = function()
{
	var i = 0,
		j,
		index = -1,
		boolOneSearch = true;

	for (i = 0; i < this.offers.length; i++)
	{
		boolOneSearch = true;
		for (j in this.selectedValues)
		{
			if (this.selectedValues[j] !== this.offers[i].TREE[j])
			{
				boolOneSearch = false;
				break;
			}
		}
		if (boolOneSearch)
		{
			index = i;
			break;
		}
	}
	if (-1 < index)
	{
		if (!!this.obPict)
		{
			if (!!this.offers[index].PREVIEW_PICTURE)
			{
				BX.adjust(this.obPict, {style: {backgroundImage: 'url('+this.offers[index].PREVIEW_PICTURE.SRC+')'}});
			}
			else
			{
				BX.adjust(this.obPict, {style: {backgroundImage: 'url('+this.defaultPict.pict.SRC+')'}});
			}
		}
		if (this.secondPict && !!this.obSecondPict)
		{
			if (!!this.offers[index].PREVIEW_PICTURE_SECOND)
			{
				BX.adjust(this.obSecondPict, {style: {backgroundImage: 'url('+this.offers[index].PREVIEW_PICTURE_SECOND.SRC+')'}});
			}
			else if (!!this.offers[index].PREVIEW_PICTURE.SRC)
			{
				BX.adjust(this.obSecondPict, {style: {backgroundImage: 'url('+this.offers[index].PREVIEW_PICTURE.SRC+')'}});
			}
			else if (!!this.defaultPict.secondPict)
			{
				BX.adjust(this.obSecondPict, {style: {backgroundImage: 'url('+this.defaultPict.secondPict.SRC+')'}});
			}
			else
			{
				BX.adjust(this.obSecondPict, {style: {backgroundImage: 'url('+this.defaultPict.pict.SRC+')'}});
			}
		}
		if (this.showSkuProps && !!this.obSkuProps)
		{
			if (0 === this.offers[index].DISPLAY_PROPERTIES.length)
			{
				BX.adjust(this.obSkuProps, {style: {display: 'none'}, html: ''});
			}
			else
			{
				BX.adjust(this.obSkuProps, {style: {display: ''}, html: this.offers[index].DISPLAY_PROPERTIES});
			}
		}
		this.setPrice(this.offers[index].PRICE);
		this.offerNum = index;
		this.QuantitySet(this.offerNum);
	}
};

window.JCCatalogSection.prototype.setPrice = function(price)
{
	var strPrice,
		obData;

	if (!!this.obPrice)
	{
		strPrice = BX.Currency.currencyFormat(price.DISCOUNT_VALUE, price.CURRENCY, true);
		if (this.showOldPrice && (price.DISCOUNT_VALUE !== price.VALUE))
		{
			strPrice += ' <span>'+BX.Currency.currencyFormat(price.VALUE, price.CURRENCY, true)+'</span>';
		}
		BX.adjust(this.obPrice, {html: strPrice});
		if (this.showPercent)
		{
			if (price.DISCOUNT_VALUE !== price.VALUE)
			{
				obData = {
					style: {
						display: ''
					},
					html: price.DISCOUNT_DIFF_PERCENT
				};
			}
			else
			{
				obData = {
					style: {
						display: 'none'
					},
					html: ''
				};
			}
			if (!!this.obDscPerc)
			{
				BX.adjust(this.obDscPerc, obData);
			}
			if (!!this.obSecondDscPerc)
			{
				BX.adjust(this.obSecondDscPerc, obData);
			}
		}
	}
};

window.JCCatalogSection.prototype.Compare = function()
{
	var compareParams, compareLink;
	if (!!this.compareData.compareUrl)
	{
		switch (this.productType)
		{
			case 0://no catalog
			case 1://product
			case 2://set
				compareLink = this.compareData.compareUrl.replace('#ID#', this.product.id.toString());
				break;
			case 3://sku
				compareLink = this.compareData.compareUrl.replace('#ID#', this.offers[this.offerNum].ID);
				break;
		}
		compareParams = {
			ajax_action: 'Y'
		};
		BX.ajax.loadJSON(
			compareLink,
			compareParams,
			BX.proxy(this.CompareResult, this)
		);
	}
};

window.JCCatalogSection.prototype.CompareResult = function(result)
{
	var popupContent, popupButtons;
	if (!!this.obPopupWin)
		this.obPopupWin.close();

	if (!BX.type.isPlainObject(result))
		return;

	this.InitPopupWindow();
	if (result.STATUS === 'OK')
	{
		BX.onCustomEvent('OnCompareChange');
		popupContent = '<div style="width: 100%; margin: 0; text-align: center;"><p>'+BX.message('COMPARE_MESSAGE_OK')+'</p></div>';
		if (this.showClosePopup)
		{
			popupButtons = [
				new BasketButton({
					ownerClass: this.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_COMPARE_REDIRECT'),
					events: {
						click: BX.delegate(this.CompareRedirect, this)
					},
					style: {marginRight: '10px'}
				}),
				new BasketButton({
					ownerClass: this.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_CLOSE_POPUP'),
					events: {
						click: BX.delegate(this.obPopupWin.close, this.obPopupWin)
					}
				})
			];
		}
		else
		{
			popupButtons = [
				new BasketButton({
					ownerClass: this.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_COMPARE_REDIRECT'),
					events: {
						click: BX.delegate(this.CompareRedirect, this)
					}
				})
			];
		}
	}
	else
	{
		popupContent = '<div style="width: 100%; margin: 0; text-align: center;"><p>'+(!!result.MESSAGE ? result.MESSAGE : BX.message('COMPARE_UNKNOWN_ERROR'))+'</p></div>';
		popupButtons = [
			new BasketButton({
				ownerClass: this.obProduct.parentNode.parentNode.className,
				text: BX.message('BTN_MESSAGE_CLOSE'),
				events: {
					click: BX.delegate(this.obPopupWin.close, this.obPopupWin)
				}

			})
		];
	}
	this.obPopupWin.setTitleBar(BX.message('COMPARE_TITLE'));
	this.obPopupWin.setContent(popupContent);
	this.obPopupWin.setButtons(popupButtons);
	// this.obPopupWin.show();
};

window.JCCatalogSection.prototype.CompareRedirect = function()
{
	if (!!this.compareData.comparePath)
	{
		location.href = this.compareData.comparePath;
	}
	else
	{
		this.obPopupWin.close();
	}
};

window.JCCatalogSection.prototype.InitBasketUrl = function()
{
	this.basketUrl = (this.basketMode === 'ADD' ? this.basketData.add_url : this.basketData.buy_url);
	switch (this.productType)
	{
		case 1://product
		case 2://set
			this.basketUrl = this.basketUrl.replace('#ID#', this.product.id.toString());
			break;
		case 3://sku
			this.basketUrl = this.basketUrl.replace('#ID#', this.offers[this.offerNum].ID);
			break;
	}
	this.basketParams = {
		'ajax_basket': 'Y'
	};
	if (this.showQuantity)
	{
		this.basketParams[this.basketData.quantity] = this.obQuantity.value;
	}
	if (!!this.basketData.sku_props)
	{
		this.basketParams[this.basketData.sku_props_var] = this.basketData.sku_props;
	}
};

window.JCCatalogSection.prototype.FillBasketProps = function()
{
	if (!this.visual.BASKET_PROP_DIV)
	{
		return;
	}
	var
		i = 0,
		propCollection = null,
		foundValues = false,
		obBasketProps = null;

	if (this.basketData.useProps && !this.basketData.emptyProps)
	{
		if (!!this.obPopupWin && !!this.obPopupWin.contentContainer)
		{
			obBasketProps = this.obPopupWin.contentContainer;
		}
	}
	else
	{
		obBasketProps = BX(this.visual.BASKET_PROP_DIV);
	}
	if (!!obBasketProps)
	{
		propCollection = obBasketProps.getElementsByTagName('select');
		if (!!propCollection && !!propCollection.length)
		{
			for (i = 0; i < propCollection.length; i++)
			{
				if (!propCollection[i].disabled)
				{
					switch(propCollection[i].type.toLowerCase())
					{
						case 'select-one':
							this.basketParams[propCollection[i].name] = propCollection[i].value;
							foundValues = true;
							break;
						default:
							break;
					}
				}
			}
		}
		propCollection = obBasketProps.getElementsByTagName('input');
		if (!!propCollection && !!propCollection.length)
		{
			for (i = 0; i < propCollection.length; i++)
			{
				if (!propCollection[i].disabled)
				{
					switch(propCollection[i].type.toLowerCase())
					{
						case 'hidden':
							this.basketParams[propCollection[i].name] = propCollection[i].value;
							foundValues = true;
							break;
						case 'radio':
							if (propCollection[i].checked)
							{
								this.basketParams[propCollection[i].name] = propCollection[i].value;
								foundValues = true;
							}
							break;
						default:
							break;
					}
				}
			}
		}
	}
	if (!foundValues)
	{
		this.basketParams[this.basketData.props] = [];
		this.basketParams[this.basketData.props][0] = 0;
	}
};

window.JCCatalogSection.prototype.Add2Basket = function()
{
	this.basketMode = 'ADD';
	this.Basket();
};

window.JCCatalogSection.prototype.BuyBasket = function()
{
	this.basketMode = 'BUY';
	this.Basket();
};

window.JCCatalogSection.prototype.SendToBasket = function()
{
	if (!this.canBuy)
	{
		return;
	}
	this.InitBasketUrl();
	this.FillBasketProps();
	BX.ajax.loadJSON(
		this.basketUrl,
		this.basketParams,
		BX.delegate(this.BasketResult, this)
	);
};

window.JCCatalogSection.prototype.Basket = function()
{
	var contentBasketProps = '';
	if (!this.canBuy)
	{
		return;
	}
	switch (this.productType)
	{
	case 1://product
	case 2://set
		if (this.basketData.useProps && !this.basketData.emptyProps)
		{
			this.InitPopupWindow();
			this.obPopupWin.setTitleBar(BX.message('TITLE_BASKET_PROPS'));
			if (BX(this.visual.BASKET_PROP_DIV))
			{
				contentBasketProps = BX(this.visual.BASKET_PROP_DIV).innerHTML;
			}
			this.obPopupWin.setContent(contentBasketProps);
			this.obPopupWin.setButtons([
				new BasketButton({
					ownerClass: this.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_SEND_PROPS'),
					events: {
						click: BX.delegate(this.SendToBasket, this)
					}
				})
			]);
			// this.obPopupWin.show();
		}
		else
		{
			this.SendToBasket();
		}
		break;
	case 3://sku
		this.SendToBasket();
		break;
	}
};

window.JCCatalogSection.prototype.BasketResult = function(arResult)
{
	var strContent = '',
		strPict = '',
		successful,
		buttons = [];

	if (!!this.obPopupWin)
		this.obPopupWin.close();

	if (!BX.type.isPlainObject(arResult))
		return;

	successful = (arResult.STATUS === 'OK');
	if (successful && this.basketAction === 'BUY')
	{
		this.BasketRedirect();
	}
	else
	{
		this.InitPopupWindow();
		if (successful)
		{
			BX.onCustomEvent('OnBasketChange');

			//todo crunch for gifts: Zhukov's idea.
			if(BX.findParent(this.obProduct, {className: 'bx_sale_gift_main_products'}, 10))
			{
				BX.onCustomEvent('onAddToBasketMainProduct', [this]);
			}

			switch(this.productType)
			{
			case 1://
			case 2://
				strPict = this.product.pict.SRC;
				break;
			case 3:
				strPict = (!!this.offers[this.offerNum].PREVIEW_PICTURE ?
					this.offers[this.offerNum].PREVIEW_PICTURE.SRC :
					this.defaultPict.pict.SRC
				);
				break;
			}
			strContent = '<div style="width: 100%; margin: 0; text-align: center;"><img src="'+strPict+'" height="130" style="max-height:130px"><p>'+this.product.name+'</p></div>';
			if (this.showClosePopup)
			{
				buttons = [
					new BasketButton({
						ownerClass: this.obProduct.parentNode.parentNode.className,
						text: BX.message("BTN_MESSAGE_BASKET_REDIRECT"),
						events: {
							click: BX.delegate(this.BasketRedirect, this)
						},
						style: {marginRight: '10px'}
					}),
					new BasketButton({
						ownerClass: this.obProduct.parentNode.parentNode.className,
						text: BX.message("BTN_MESSAGE_CLOSE_POPUP"),
						events: {
							click: BX.delegate(this.obPopupWin.close, this.obPopupWin)
						}
					})
				];
			}
			else
			{
				buttons = [
					new BasketButton({
						ownerClass: this.obProduct.parentNode.parentNode.className,
						text: BX.message("BTN_MESSAGE_BASKET_REDIRECT"),
						events: {
							click: BX.delegate(this.BasketRedirect, this)
						}
					})
				];
			}
		}
		else
		{
			strContent = '<div style="width: 100%; margin: 0; text-align: center;"><p>'+(!!arResult.MESSAGE ? arResult.MESSAGE : BX.message('BASKET_UNKNOWN_ERROR'))+'</p></div>';
			buttons = [
				new BasketButton({
					ownerClass: this.obProduct.parentNode.parentNode.className,
					text: BX.message('BTN_MESSAGE_CLOSE'),
					events: {
						click: BX.delegate(this.obPopupWin.close, this.obPopupWin)
					}
				})
			];
		}
		this.obPopupWin.setTitleBar(successful ? BX.message('TITLE_SUCCESSFUL') : BX.message('TITLE_ERROR'));
		this.obPopupWin.setContent(strContent);
		this.obPopupWin.setButtons(buttons);
		// this.obPopupWin.show();
	}
};

window.JCCatalogSection.prototype.BasketRedirect = function()
{
	location.href = (!!this.basketData.basketUrl ? this.basketData.basketUrl : BX.message('BASKET_URL'));
};

window.JCCatalogSection.prototype.InitPopupWindow = function()
{
	if (!!this.obPopupWin)
		return;

	this.obPopupWin = BX.PopupWindowManager.create('CatalogSectionBasket_'+this.visual.ID, null, {
		autoHide: false,
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		closeByEsc: true,
		titleBar: true,
		closeIcon: true,
		contentColor: 'white'
	});
};
})(window);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:100:"/bitrix/components/bitrix/catalog.product.subscribe/templates/.default/script.min.js?163828873611818";s:6:"source";s:80:"/bitrix/components/bitrix/catalog.product.subscribe/templates/.default/script.js";s:3:"min";s:84:"/bitrix/components/bitrix/catalog.product.subscribe/templates/.default/script.min.js";s:3:"map";s:84:"/bitrix/components/bitrix/catalog.product.subscribe/templates/.default/script.map.js";}"*/
(function(e){if(!!e.JCCatalogProductSubscribe){return}var t=function(e){t.superclass.constructor.apply(this,arguments);this.nameNode=BX.create("span",{props:{id:this.id},style:typeof e.style==="object"?e.style:{},text:e.text});this.buttonNode=BX.create("span",{attrs:{className:e.className},style:{marginBottom:"0",borderBottom:"0 none transparent"},children:[this.nameNode],events:this.contextEvents});if(BX.browser.IsIE()){this.buttonNode.setAttribute("hideFocus","hidefocus")}};BX.extend(t,BX.PopupWindowButton);e.JCCatalogProductSubscribe=function(e){this.buttonId=e.buttonId;this.buttonClass=e.buttonClass;this.jsObject=e.jsObject;this.ajaxUrl="/bitrix/components/bitrix/catalog.product.subscribe/ajax.php";this.alreadySubscribed=e.alreadySubscribed;this.listIdAlreadySubscribed=e.listIdAlreadySubscribed;this.urlListSubscriptions=e.urlListSubscriptions;this.listOldItemId={};this.landingId=e.landingId;this.elemButtonSubscribe=null;this.elemPopupWin=null;this.defaultButtonClass="bx-catalog-subscribe-button";this._elemButtonSubscribeClickHandler=BX.delegate(this.subscribe,this);this._elemHiddenClickHandler=BX.delegate(this.checkSubscribe,this);BX.ready(BX.delegate(this.init,this))};e.JCCatalogProductSubscribe.prototype.init=function(){if(!!this.buttonId){this.elemButtonSubscribe=BX(this.buttonId);this.elemHiddenSubscribe=BX(this.buttonId+"_hidden")}if(!!this.elemButtonSubscribe){BX.bind(this.elemButtonSubscribe,"click",this._elemButtonSubscribeClickHandler)}if(!!this.elemHiddenSubscribe){BX.bind(this.elemHiddenSubscribe,"click",this._elemHiddenClickHandler)}this.setButton(this.alreadySubscribed);this.setIdAlreadySubscribed(this.listIdAlreadySubscribed)};e.JCCatalogProductSubscribe.prototype.checkSubscribe=function(){if(!this.elemHiddenSubscribe||!this.elemButtonSubscribe)return;if(this.listOldItemId.hasOwnProperty(this.elemButtonSubscribe.dataset.item)){this.setButton(true)}else{BX.ajax({method:"POST",dataType:"json",url:this.ajaxUrl,data:{sessid:BX.bitrix_sessid(),checkSubscribe:"Y",itemId:this.elemButtonSubscribe.dataset.item},onsuccess:BX.delegate(function(e){if(e.subscribe){this.setButton(true);this.listOldItemId[this.elemButtonSubscribe.dataset.item]=true}else{this.setButton(false)}},this)})}};e.JCCatalogProductSubscribe.prototype.subscribe=function(){this.elemButtonSubscribe=BX.proxy_context;if(!this.elemButtonSubscribe)return false;BX.ajax({method:"POST",dataType:"json",url:this.ajaxUrl,data:{sessid:BX.bitrix_sessid(),subscribe:"Y",itemId:this.elemButtonSubscribe.dataset.item,siteId:BX.message("SITE_ID"),landingId:this.landingId},onsuccess:BX.delegate(function(e){if(e.success){this.createSuccessPopup(e);this.setButton(true);this.listOldItemId[this.elemButtonSubscribe.dataset.item]=true}else if(e.contactFormSubmit){this.initPopupWindow();this.elemPopupWin.setTitleBar(BX.message("CPST_SUBSCRIBE_POPUP_TITLE"));var s=this.createContentForPopup(e);this.elemPopupWin.setContent(s);this.elemPopupWin.setButtons([new t({text:BX.message("CPST_SUBSCRIBE_BUTTON_NAME"),className:"btn btn-primary",events:{click:BX.delegate(function(){if(!this.validateContactField(e.contactTypeData)){return false}BX.ajax.submitAjax(s,{method:"POST",url:this.ajaxUrl,processData:true,onsuccess:BX.delegate(function(e){e=BX.parseJSON(e,{});if(e.success){this.createSuccessPopup(e);this.setButton(true);this.listOldItemId[this.elemButtonSubscribe.dataset.item]=true}else if(e.error){if(e.hasOwnProperty("setButton")){this.listOldItemId[this.elemButtonSubscribe.dataset.item]=true;this.setButton(true)}var t=e.message;if(e.hasOwnProperty("typeName")){t=e.message.replace("USER_CONTACT",e.typeName)}BX("bx-catalog-subscribe-form-notify").style.color="red";BX("bx-catalog-subscribe-form-notify").innerHTML=t}},this)})},this)}}),new t({text:BX.message("CPST_SUBSCRIBE_BUTTON_CLOSE"),className:"btn",events:{click:BX.delegate(function(){this.elemPopupWin.destroy()},this)}})]);this.elemPopupWin.show()}else if(e.error){if(e.hasOwnProperty("setButton")){this.listOldItemId[this.elemButtonSubscribe.dataset.item]=true;this.setButton(true)}this.showWindowWithAnswer({status:"error",message:e.message})}},this)})};e.JCCatalogProductSubscribe.prototype.validateContactField=function(e){var t=BX.findChildren(BX("bx-catalog-subscribe-form"),{tag:"input",attribute:{id:"userContact"}},true);if(!t.length||typeof e!=="object"){BX("bx-catalog-subscribe-form-notify").style.color="red";BX("bx-catalog-subscribe-form-notify").innerHTML=BX.message("CPST_SUBSCRIBE_VALIDATE_UNKNOW_ERROR");return false}var s,a,i,r=[],o=[];for(var c=0;c<t.length;c++){s=t[c].getAttribute("data-id");a=t[c].value;i=BX("bx-contact-use-"+s);if(i&&i.value=="N"){o.push(true);continue}if(!a.length){r.push(BX.message("CPST_SUBSCRIBE_VALIDATE_ERROR_EMPTY_FIELD").replace("#FIELD#",e[s].contactLable))}}if(t.length==o.length){BX("bx-catalog-subscribe-form-notify").style.color="red";BX("bx-catalog-subscribe-form-notify").innerHTML=BX.message("CPST_SUBSCRIBE_VALIDATE_ERROR");return false}if(r.length){BX("bx-catalog-subscribe-form-notify").style.color="red";for(var n=0;n<r.length;n++){BX("bx-catalog-subscribe-form-notify").innerHTML=r[n]}return false}return true};e.JCCatalogProductSubscribe.prototype.reloadCaptcha=function(){BX.ajax.get(this.ajaxUrl+"?reloadCaptcha=Y","",function(e){BX("captcha_sid").value=e;BX("captcha_img").src="/bitrix/tools/captcha.php?captcha_sid="+e+""})};e.JCCatalogProductSubscribe.prototype.createContentForPopup=function(e){if(!e.hasOwnProperty("contactTypeData")){return null}var t=e.contactTypeData,s=Object.keys(t).length,a="",i="N",r=document.createDocumentFragment();if(s>1){i="Y";a="display:none;";r.appendChild(BX.create("p",{text:BX.message("CPST_SUBSCRIBE_MANY_CONTACT_NOTIFY")}))}r.appendChild(BX.create("p",{props:{id:"bx-catalog-subscribe-form-notify"}}));for(var o in t){if(s>1){r.appendChild(BX.create("div",{props:{className:"bx-catalog-subscribe-form-container"},children:[BX.create("div",{props:{className:"checkbox"},children:[BX.create("lable",{props:{className:"bx-filter-param-label"},attrs:{onclick:this.jsObject+".selectContactType("+o+", event);"},children:[BX.create("input",{props:{type:"hidden",id:"bx-contact-use-"+o,name:"contact["+o+"][use]",value:"N"}}),BX.create("input",{props:{id:"bx-contact-checkbox-"+o,type:"checkbox"}}),BX.create("span",{props:{className:"bx-filter-param-text"},text:t[o].contactLable})]})]})]}))}r.appendChild(BX.create("div",{props:{id:"bx-catalog-subscribe-form-container-"+o,className:"bx-catalog-subscribe-form-container",style:a},children:[BX.create("div",{props:{className:"bx-catalog-subscribe-form-container-label"},text:BX.message("CPST_SUBSCRIBE_LABLE_CONTACT_INPUT").replace("#CONTACT#",t[o].contactLable)}),BX.create("div",{props:{className:"bx-catalog-subscribe-form-container-input"},children:[BX.create("input",{props:{id:"userContact",className:"",type:"text",name:"contact["+o+"][user]"},attrs:{"data-id":o}})]})]}))}if(e.hasOwnProperty("captchaCode")){r.appendChild(BX.create("div",{props:{className:"bx-catalog-subscribe-form-container"},children:[BX.create("span",{props:{className:"bx-catalog-subscribe-form-star-required"},text:"*"}),BX.message("CPST_ENTER_WORD_PICTURE"),BX.create("div",{props:{className:"bx-captcha"},children:[BX.create("input",{props:{type:"hidden",id:"captcha_sid",name:"captcha_sid",value:e.captchaCode}}),BX.create("img",{props:{id:"captcha_img",src:"/bitrix/tools/captcha.php?captcha_sid="+e.captchaCode+""},attrs:{width:"180",height:"40",alt:"captcha",onclick:this.jsObject+".reloadCaptcha();"}})]}),BX.create("div",{props:{className:"bx-catalog-subscribe-form-container-input"},children:[BX.create("input",{props:{id:"captcha_word",className:"",type:"text",name:"captcha_word"},attrs:{maxlength:"50"}})]})]}))}var c=BX.create("form",{props:{id:"bx-catalog-subscribe-form"},children:[BX.create("input",{props:{type:"hidden",name:"manyContact",value:i}}),BX.create("input",{props:{type:"hidden",name:"sessid",value:BX.bitrix_sessid()}}),BX.create("input",{props:{type:"hidden",name:"itemId",value:this.elemButtonSubscribe.dataset.item}}),BX.create("input",{props:{type:"hidden",name:"landingId",value:this.landingId}}),BX.create("input",{props:{type:"hidden",name:"siteId",value:BX.message("SITE_ID")}}),BX.create("input",{props:{type:"hidden",name:"contactFormSubmit",value:"Y"}})]});c.appendChild(r);return c};e.JCCatalogProductSubscribe.prototype.selectContactType=function(t,s){var a=BX("bx-catalog-subscribe-form-container-"+t),i="",r=BX("bx-contact-checkbox-"+t);if(!a){return false}if(r!=s.target){if(r.checked){r.checked=false}else{r.checked=true}}if(a.currentStyle){i=a.currentStyle.display}else if(e.getComputedStyle){var o=e.getComputedStyle(a,null);i=o.getPropertyValue("display")}if(i==="none"){BX("bx-contact-use-"+t).value="Y";BX.style(a,"display","")}else{BX("bx-contact-use-"+t).value="N";BX.style(a,"display","none")}};e.JCCatalogProductSubscribe.prototype.createSuccessPopup=function(e){this.initPopupWindow();this.elemPopupWin.setTitleBar(BX.message("CPST_SUBSCRIBE_POPUP_TITLE"));var s=BX.create("div",{props:{className:"bx-catalog-popup-content"},children:[BX.create("p",{props:{className:"bx-catalog-popup-message"},text:e.message})]});this.elemPopupWin.setContent(s);this.elemPopupWin.setButtons([new t({text:BX.message("CPST_SUBSCRIBE_BUTTON_CLOSE"),className:"btn btn-primary",events:{click:BX.delegate(function(){this.elemPopupWin.destroy()},this)}})]);this.elemPopupWin.show()};e.JCCatalogProductSubscribe.prototype.initPopupWindow=function(){this.elemPopupWin=BX.PopupWindowManager.create("CatalogSubscribe_"+this.buttonId,null,{autoHide:false,offsetLeft:0,offsetTop:0,overlay:true,closeByEsc:true,titleBar:true,closeIcon:true,contentColor:"white"})};e.JCCatalogProductSubscribe.prototype.setButton=function(e){this.alreadySubscribed=Boolean(e);if(this.alreadySubscribed){this.elemButtonSubscribe.className=this.buttonClass+" "+this.defaultButtonClass+" disabled";this.elemButtonSubscribe.innerHTML="<span>"+BX.message("CPST_TITLE_ALREADY_SUBSCRIBED")+"</span>";BX.unbind(this.elemButtonSubscribe,"click",this._elemButtonSubscribeClickHandler)}else{this.elemButtonSubscribe.className=this.buttonClass+" "+this.defaultButtonClass;this.elemButtonSubscribe.innerHTML="<span>"+BX.message("CPST_SUBSCRIBE_BUTTON_NAME")+"</span>";BX.bind(this.elemButtonSubscribe,"click",this._elemButtonSubscribeClickHandler)}};e.JCCatalogProductSubscribe.prototype.setIdAlreadySubscribed=function(e){if(BX.type.isPlainObject(e)){this.listOldItemId=e}};e.JCCatalogProductSubscribe.prototype.showWindowWithAnswer=function(e){e=e||{};if(!e.message){if(e.status=="success"){e.message=BX.message("CPST_STATUS_SUCCESS")}else{e.message=BX.message("CPST_STATUS_ERROR")}}var t=BX.create("div",{props:{className:"bx-catalog-subscribe-alert"},children:[BX.create("span",{props:{className:"bx-catalog-subscribe-aligner"}}),BX.create("span",{props:{className:"bx-catalog-subscribe-alert-text"},text:e.message}),BX.create("div",{props:{className:"bx-catalog-subscribe-alert-footer"}})]});var s=BX.PopupWindowManager.getCurrentPopup();if(s){s.destroy()}var a=setTimeout(function(){var e=BX.PopupWindowManager.getCurrentPopup();if(!e||e.uniquePopupId!="bx-catalog-subscribe-status-action"){return}e.close();e.destroy()},3500);var i=BX.PopupWindowManager.create("bx-catalog-subscribe-status-action",null,{content:t,onPopupClose:function(){this.destroy();clearTimeout(a)},autoHide:true,zIndex:2e3,className:"bx-catalog-subscribe-alert-popup"});i.show();BX("bx-catalog-subscribe-status-action").onmouseover=function(e){clearTimeout(a)};BX("bx-catalog-subscribe-status-action").onmouseout=function(e){a=setTimeout(function(){var e=BX.PopupWindowManager.getCurrentPopup();if(!e||e.uniquePopupId!="bx-catalog-subscribe-status-action"){return}e.close();e.destroy()},3500)}}})(window);
/* End */
;
; /* Start:"a:4:{s:4:"full";s:106:"/bitrix/templates/eshop_bootstrap_/components/bitrix/sale.basket.basket.line/cart/script.js?16382977035292";s:6:"source";s:91:"/bitrix/templates/eshop_bootstrap_/components/bitrix/sale.basket.basket.line/cart/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
'use strict';

function BitrixSmallCart(){}

BitrixSmallCart.prototype = {

	activate: function ()
	{
		this.cartElement = BX(this.cartId);
		this.fixedPosition = this.arParams.POSITION_FIXED == 'Y';
		if (this.fixedPosition)
		{
			this.cartClosed = true;
			this.maxHeight = false;
			this.itemRemoved = false;
			this.verticalPosition = this.arParams.POSITION_VERTICAL;
			this.horizontalPosition = this.arParams.POSITION_HORIZONTAL;
			this.topPanelElement = BX("bx-panel");

			this.fixAfterRender(); // TODO onready
			this.fixAfterRenderClosure = this.closure('fixAfterRender');

			var fixCartClosure = this.closure('fixCart');
			this.fixCartClosure = fixCartClosure;

			if (this.topPanelElement && this.verticalPosition == 'top')
				BX.addCustomEvent(window, 'onTopPanelCollapse', fixCartClosure);

			var resizeTimer = null;
			BX.bind(window, 'resize', function() {
				clearTimeout(resizeTimer);
				resizeTimer = setTimeout(fixCartClosure, 200);
			});
		}
		this.setCartBodyClosure = this.closure('setCartBody');
		BX.addCustomEvent(window, 'OnBasketChange', this.closure('refreshCart', {}));
	},

	fixAfterRender: function ()
	{
		this.statusElement = BX(this.cartId + 'status');
		if (this.statusElement)
		{
			if (this.cartClosed)
				this.statusElement.innerHTML = this.openMessage;
			else
				this.statusElement.innerHTML = this.closeMessage;
		}
		this.productsElement = BX(this.cartId + 'products');
		this.fixCart();
	},

	closure: function (fname, data)
	{
		var obj = this;
		return data
			? function(){obj[fname](data)}
			: function(arg1){obj[fname](arg1)};
	},

	toggleOpenCloseCart: function ()
	{
		if (this.cartClosed)
		{
			BX.removeClass(this.cartElement, 'bx-closed');
			BX.addClass(this.cartElement, 'bx-opener');
			this.statusElement.innerHTML = this.closeMessage;
			this.cartClosed = false;
			this.fixCart();
		}
		else // Opened
		{
			BX.addClass(this.cartElement, 'bx-closed');
			BX.removeClass(this.cartElement, 'bx-opener');
			BX.removeClass(this.cartElement, 'bx-max-height');
			this.statusElement.innerHTML = this.openMessage;
			this.cartClosed = true;
			var itemList = this.cartElement.querySelector("[data-role='basket-item-list']");
			if (itemList)
				itemList.style.top = "auto";
		}
		setTimeout(this.fixCartClosure, 100);
	},

	setVerticalCenter: function(windowHeight)
	{
		var top = windowHeight/2 - (this.cartElement.offsetHeight/2);
		if (top < 5)
			top = 5;
		this.cartElement.style.top = top + 'px';
	},

	fixCart: function()
	{
		// set horizontal center
		if (this.horizontalPosition == 'hcenter')
		{
			var windowWidth = 'innerWidth' in window
				? window.innerWidth
				: document.documentElement.offsetWidth;
			var left = windowWidth/2 - (this.cartElement.offsetWidth/2);
			if (left < 5)
				left = 5;
			this.cartElement.style.left = left + 'px';
		}

		var windowHeight = 'innerHeight' in window
			? window.innerHeight
			: document.documentElement.offsetHeight;

		// set vertical position
		switch (this.verticalPosition) {
			case 'top':
				if (this.topPanelElement)
					this.cartElement.style.top = this.topPanelElement.offsetHeight + 5 + 'px';
				break;
			case 'vcenter':
				this.setVerticalCenter(windowHeight);
				break;
		}

		// toggle max height
		if (this.productsElement)
		{
			var itemList = this.cartElement.querySelector("[data-role='basket-item-list']");
			if (this.cartClosed)
			{
				if (this.maxHeight)
				{
					BX.removeClass(this.cartElement, 'bx-max-height');
					if (itemList)
						itemList.style.top = "auto";
					this.maxHeight = false;
				}
			}
			else // Opened
			{
				if (this.maxHeight)
				{
					if (this.productsElement.scrollHeight == this.productsElement.clientHeight)
					{
						BX.removeClass(this.cartElement, 'bx-max-height');
						if (itemList)
							itemList.style.top = "auto";
						this.maxHeight = false;
					}
				}
				else
				{
					if (this.verticalPosition == 'top' || this.verticalPosition == 'vcenter')
					{
						if (this.cartElement.offsetTop + this.cartElement.offsetHeight >= windowHeight)
						{
							BX.addClass(this.cartElement, 'bx-max-height');
							if (itemList)
								itemList.style.top = 82+"px";
							this.maxHeight = true;
						}
					}
					else
					{
						if (this.cartElement.offsetHeight >= windowHeight)
						{
							BX.addClass(this.cartElement, 'bx-max-height');
							if (itemList)
								itemList.style.top = 82+"px";
							this.maxHeight = true;
						}
					}
				}
			}

			if (this.verticalPosition == 'vcenter')
				this.setVerticalCenter(windowHeight);
		}
	},

	refreshCart: function (data)
	{
		if (this.itemRemoved)
		{
			this.itemRemoved = false;
			return;
		}
		data.sessid = BX.bitrix_sessid();
		data.siteId = this.siteId;
		data.templateName = this.templateName;
		data.arParams = this.arParams;
		BX.ajax({
			url: this.ajaxPath,
			method: 'POST',
			dataType: 'html',
			data: data,
			onsuccess: this.setCartBodyClosure
		});
	},

	setCartBody: function (result)
	{
		if (this.cartElement)
			this.cartElement.innerHTML = result;
		if (this.fixedPosition)
			setTimeout(this.fixAfterRenderClosure, 100);
	},

	removeItemFromCart: function (id)
	{
		this.refreshCart ({sbblRemoveItemFromCart: id});
		this.itemRemoved = true;
		BX.onCustomEvent('OnBasketChange');
	}
};

/* End */
;; /* /bitrix/components/bitrix/search.title/script.min.js?16382887666443*/
; /* /bitrix/templates/eshop_bootstrap_/components/bitrix/menu/mobile/script.min.js?1638297703409*/
; /* /bitrix/templates/eshop_bootstrap_/components/bitrix/menu/catalog_left/script.min.js?1638297703409*/
; /* /bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.element/index_one/script.min.js?163829770354375*/
; /* /bitrix/templates/eshop_bootstrap_/components/bitrix/catalog.section/catalog_all/script.js?163829770339809*/
; /* /bitrix/components/bitrix/catalog.product.subscribe/templates/.default/script.min.js?163828873611818*/
; /* /bitrix/templates/eshop_bootstrap_/components/bitrix/sale.basket.basket.line/cart/script.js?16382977035292*/

//# sourceMappingURL=template_83d993812562e6151d41e6c2eab92fb4.map.js