{"version":3,"sources":["script.js"],"names":["BX","namespace","Landing","Component","View","options","instance","getInstance","create","topInit","setNewOptions","init","loadEditor","component","editorWindow","PageObject","getEditorWindow","rootWindow","getRootWindow","buildTop","addEventListener","UI","Panel","StylePanel","Top","prototype","this","type","title","url","formEditor","specialType","active","draftMode","id","siteId","pagesCount","siteTitle","storeEnabled","fullPublication","urls","rights","sliderConditions","popupMenuIds","placements","i","c","length","menu","PopupMenu","getMenuById","destroy","viewInstance","rest","Marketplace","bindPageAnchors","addCustomEvent","window","installed","event","getEventId","setTimeout","location","reload","data","requiredUserActionIsShown","bind","button","onRequiredLinkClick","requiredLinks","slice","call","document","querySelectorAll","forEach","element","index","closeAllPopupsMenu","debounce","initSliders","hideEditorsPanelHandlers","SidePanel","conditions","push","sliderOptions","top","clone","rules","condition","stopParameters","allowChangeHistory","Instance","bindAnchors","loaderContainer","querySelector","userActionContainer","loader","Loader","offset","show","view","then","iframe","bindOnce","action","Main","requiredUserAction","Utils","isPlainObject","isEmpty","header","innerText","description","href","setAttribute","text","classList","add","item","Dom","addClass","remove","panel","contentWindow","Block","Node","Text","currentNode","disableEdit","Field","BaseField","currentField","EditorPanel","hide","getAttribute","substr","open","linkTpl","urlParams","linkTplAnchor","indexOf","split","toUpperCase","tpl","landingParams","util","add_url_param","publicationDialog","mode","Dialog","Publication","landingId","publication","PreventDefault","key","link","settingButtons","onSettingsClick","public","parentNode","removeClass","hasClass","onSubPublicationClick","close","MenuManager","bindElement","autoHide","zIndex","offsetLeft","angle","closeByEsc","items","message","target","dataset","sliderIgnoreAutobinding","onclick","menuItems","disabled","settings","__this","p","cp","placementItem","htmlspecialchars","TITLE","AppLayout","openApplication","APP_ID","SITE_ID","LID","PLACEMENT","PLACEMENT_ID","ID","changeTop","params","changeState","ajax","method","param","sessid","actionType","dataType","onsuccess","landingAlertMessage","errorText","payment","errorCode","landingSiteType","InfoHelper","PaymentAlertShow","msg","Tool","ActionDialog","content","confirm","contentColor"],"mappings":"CAIA,WAEC,aAEAA,GAAGC,UAAU,6BAMbD,GAAGE,QAAQC,UAAUC,KAAO,SAASC,KAGrCL,GAAGE,QAAQC,UAAUC,KAAKE,SAAW,KACrCN,GAAGE,QAAQC,UAAUC,KAAKG,YAAc,WAEvC,OAAOP,GAAGE,QAAQC,UAAUC,KAAKE,UAElCN,GAAGE,QAAQC,UAAUC,KAAKI,OAAS,SAASH,EAASI,GAEpDJ,EAAQI,QAAUA,IAAY,KAC9BT,GAAGE,QAAQC,UAAUC,KAAKE,SAAW,IAAIN,GAAGE,QAAQC,UAAUC,KAC7DC,GAEDL,GAAGE,QAAQC,UAAUC,KAAKE,SAASI,cAAcL,GACjDL,GAAGE,QAAQC,UAAUC,KAAKE,SAASK,OAEnC,OAAOX,GAAGE,QAAQC,UAAUC,KAAKE,UAElCN,GAAGE,QAAQC,UAAUC,KAAKQ,WAAa,WAEtC,IAAIC,EAAY,IAAIb,GAAGE,QAAQC,UAAUC,SACzC,IAAIU,EAAed,GAAGE,QAAQa,WAAWC,kBACzC,IAAIC,EAAajB,GAAGE,QAAQa,WAAWG,gBAEvCL,EAAUD,aACVC,EAAUM,WAEVL,EAAaM,iBAAiB,OAAQ,WACrCpB,GAAGE,QAAQmB,GAAGC,MAAMC,WAAWhB,cAC/BU,EAAWjB,GAAGE,QAAQmB,GAAGC,MAAME,IAAIlB,SAAW,KAC9CN,GAAGE,QAAQmB,GAAGC,MAAME,IAAIjB,iBAI1BP,GAAGE,QAAQC,UAAUC,KAAKqB,WAMzBf,cAAe,SAASL,GAEvBqB,KAAKC,KAAOtB,EAAQsB,MAAQ,GAC5BD,KAAKE,MAAQvB,EAAQuB,OAAS,GAC9BF,KAAKG,IAAMxB,EAAQwB,KAAO,GAC1BH,KAAKI,WAAazB,EAAQ0B,cAAgB,YAC1CL,KAAKjB,QAAUJ,EAAQI,SAAW,MAClCiB,KAAKM,OAAS3B,EAAQ2B,QAAU,MAChCN,KAAKO,UAAY5B,EAAQ4B,WAAa,MACtCP,KAAKQ,GAAK7B,EAAQ6B,IAAM,EACxBR,KAAKS,OAAS9B,EAAQ8B,QAAU,EAChCT,KAAKU,WAAa/B,EAAQ+B,YAAc,EACxCV,KAAKW,UAAYhC,EAAQgC,WAAa,GACtCX,KAAKY,aAAejC,EAAQiC,cAAgB,MAC5CZ,KAAKa,gBAAkBlC,EAAQkC,iBAAmB,MAClDb,KAAKc,KAAOnC,EAAQmC,SACpBd,KAAKe,OAASpC,EAAQoC,WACtBf,KAAKgB,iBAAmBrC,EAAQqC,qBAChC,IAAKhB,KAAKiB,aACV,CACCjB,KAAKiB,gBAEN,IAAKjB,KAAKkB,WACV,CACClB,KAAKkB,WAAavC,EAAQuC,eAG3B,IAAK,IAAIC,EAAI,EAAGC,EAAIpB,KAAKiB,aAAaI,OAAQF,EAAIC,EAAGD,IACrD,CACC,IAAIG,EAAOhD,GAAGiD,UAAUC,YACvBxB,KAAKiB,aAAaE,IAEnB,GAAIG,EACJ,CACCA,EAAKG,WAGPzB,KAAKiB,iBAMNhC,KAAM,WAEL,IAAIyC,EAAepD,GAAGE,QAAQC,UAAUC,KAAKG,cAG7C,UACQP,GAAGqD,OAAS,oBACZrD,GAAGqD,KAAKC,cAAgB,YAEhC,CACCtD,GAAGqD,KAAKC,YAAYC,oBAGrBvD,GAAGwD,eACFC,OACA,oCACA,SAASC,GAER,GAAIA,EAAW,KAIjB,GAAIhC,KAAKjB,QACT,CACCT,GAAGwD,eAAe,6BACjB,SAASG,GAER,GAAIA,EAAMC,eAAiB,mBAC3B,CACCC,WAAW,WAEVJ,OAAOK,SAASC,UACd,QAMP,IAAKrC,KAAKjB,QACV,CACCT,GAAGwD,eAAe,wBAAyB,SAASG,GAEnD,GAAIA,EAAMK,KAAKC,0BACf,CACCjE,GAAGkE,KAAKP,EAAMK,KAAKG,OAAQ,QAAS,WAEnCf,EAAagB,oBAAoB1C,WAIpC,IAAI2C,KAAmBC,MAAMC,KAC5BC,SAASC,iBAAiB,2BAE3BJ,EAAcK,QAAQ,SAASC,EAASC,GAEvC5E,GAAGkE,KAAKS,EAAS,QAAS,WAEzBvB,EAAagB,oBAAoB1C,UAKpC,GAAIA,KAAKjB,QACT,CACC,IAAIK,EAAed,GAAGE,QAAQa,WAAWC,kBACzC,IAAIC,EAAajB,GAAGE,QAAQa,WAAWG,gBAEvCJ,EAAaM,iBAAiB,OAAQ,WACrCpB,GAAGE,QAAQmB,GAAGC,MAAMC,WAAWhB,cAC/BU,EAAWjB,GAAGE,QAAQmB,GAAGC,MAAME,IAAIlB,SAAW,KAC9CN,GAAGE,QAAQmB,GAAGC,MAAME,IAAIjB,gBAGzBO,EAAaM,iBAAiB,QAAS,WACtCM,KAAKmD,sBACJX,KAAKxC,OAEPZ,EAAaM,iBAAiB,SAAUpB,GAAG8E,SAAS,WACnDpD,KAAKmD,sBACJX,KAAKxC,MAAO,MAGf,GAAIA,KAAKjB,QACT,CACCiB,KAAKP,WACLO,KAAKqD,cACLrD,KAAKd,aACLc,KAAKsD,6BAOPD,YAAa,WAEZ,UAAW/E,GAAGiF,YAAc,YAC5B,CACC,OAGD,IAAIC,KAEJ,IAAK,IAAIrC,EAAI,EAAGC,EAAIpB,KAAKgB,iBAAiBK,OAAQF,EAAIC,EAAGD,IACzD,CACCqC,EAAWC,KAAKzD,KAAKgB,iBAAiBG,IAGvC,GAAIqC,EAAWnC,QAAU,EACzB,CACC,OAGD,IAAIqC,EAAgBC,IAAIrF,GAAGsF,OAC1BC,QAEEC,UAAWN,EACXO,gBACC,SACA,qBACA,OAEDpF,SACCqF,mBAAoB,WAMxB1F,GAAGiF,UAAUU,SAASC,YAAYR,IAMnCxE,WAAY,WAEX,IAAIiF,EAAkBrB,SAASsB,cAAc,oCAC7C,IAAIC,EAAsBvB,SAASsB,cAAc,wCAEjD,GAAID,EACJ,CACC,IAAIG,EAAS,IAAIhG,GAAGiG,QAAQC,QAASb,IAAK,WAC1CW,EAAOG,KAAKN,GAEZ7F,GAAGE,QAAQa,WAAWR,cAAc6F,OAAOC,KAAK,SAASC,GACxDtG,GAAGuG,SAASD,EAAQ,OAAQ,WAC3B,IAAIE,EAASxG,GAAGE,QAAQuG,KAAKlG,cAAcF,QAAQqG,mBAEnD,GAAI1G,GAAGE,QAAQyG,MAAMC,cAAcJ,KAAYxG,GAAGE,QAAQyG,MAAME,QAAQL,GACxE,CACC,GAAIA,EAAOM,OACX,CACCf,EAAoBD,cAAc,MAAMiB,UAAYP,EAAOM,OAG5D,GAAIN,EAAOQ,YACX,CACCjB,EAAoBD,cAAc,KAAKiB,UAAYP,EAAOQ,YAG3D,GAAIR,EAAOS,KACX,CACClB,EAAoBD,cAAc,KAAKoB,aAAa,OAAQV,EAAOS,MAGpE,GAAIT,EAAOW,KACX,CACCpB,EAAoBD,cAAc,KAAKiB,UAAYP,EAAOW,KAG3DpB,EAAoBqB,UAAUC,IAAI,+BAElC7C,SAASsB,cAAc,iCAAiCsB,UAAUC,IAAI,uBACtE7C,SAASsB,cAAc,iCAAiCsB,UAAUC,IAAI,uBACtE7C,SAASsB,cAAc,4EAA4EsB,UAAUC,IAAI,0BAC9G/C,MAAMC,KAAKC,SAASC,iBAAiB,8EACtCC,QAAQ,SAAS4C,GACjBA,EAAKF,UAAUC,IAAI,6BAItB,CACCf,EAAOc,UAAUC,IAAI,wBAGtBxD,WAAW,WACV7D,GAAGuH,IAAIC,SAAS3B,EAAiB,mBACjChC,WAAW,WACV7D,GAAGyH,OAAO5B,GACV7F,GAAGyH,OAAO1B,IACR,MACD,WASPf,yBAA0B,WAEzBhF,GAAGE,QAAQa,WAAWR,cAAc8E,MAAMgB,KAAK,SAASqB,GACvDA,EAAMtG,iBAAiB,QAAS,WAC/BpB,GAAGE,QAAQa,WAAWR,cAAc6F,OAClCC,KAAK,SAASC,GACd,GAAIA,EAAOqB,cAAc3H,GACzB,CACC,GAAIsG,EAAOqB,cAAc3H,GAAGE,QAAQ0H,MAAMC,KAAKC,KAAKC,YACpD,CACCzB,EAAOqB,cAAc3H,GAAGE,QAAQ0H,MAAMC,KAAKC,KAAKC,YAAYC,cAG7D,GAAI1B,EAAOqB,cAAc3H,GAAGE,QAAQmB,GAAG4G,MAAMC,UAAUC,aACvD,CACC7B,EAAOqB,cAAc3H,GAAGE,QAAQmB,GAAG4G,MAAMC,UAAUC,aAAaH,cAGjE1B,EAAOqB,cAAc3H,GAAGE,QAAQmB,GAAGC,MAAM8G,YAAY7H,cAAc8H,eAYzEjE,oBAAqB,SAASO,GAE7B,IAAIsC,EAAOtC,EAAQ2D,aAAa,QAEhC,GAAIrB,EAAKsB,OAAO,EAAG,KAAO,IAC1B,CACC9E,OAAO+E,KAAKvB,EAAM,QAGnB,IAAIwB,EAAUxB,EAAKsB,OAAO,GAC1B,IAAIG,KACJ,IAAIC,EAAgB,GAEpB,GAAIF,EAAQG,QAAQ,KAAO,EAC3B,CACCD,EAAgBF,EAAQI,MAAM,KAAK,GACnCJ,EAAUA,EAAQI,MAAM,KAAK,GAE9BJ,EAAUA,EAAQK,cAElB,GAAIL,IAAY,wBAChB,CACCA,EAAU,qBACVC,EAAUK,IAAM,UAGjB,UACQC,cAAcP,KAAa,oBAC3BzI,GAAGiF,YAAc,YAEzB,CACCjF,GAAGiF,UAAUU,SAAS6C,KACrBxI,GAAGiJ,KAAKC,cACPF,cAAcP,GACdC,IAEAC,EAAgB,IAAMA,EAAgB,KAEtCjD,mBAAoB,UAUxByD,kBAAmB,SAASC,GAE3B,OACA,IAAI9I,EAAW,IAAIN,GAAGE,QAAQmJ,OAAOC,YAAY/I,aAChDgJ,UAAW7H,KAAKQ,GAChBC,OAAQT,KAAKS,OACbN,IAAKH,KAAKG,MAGXvB,EAASkJ,YACPJ,IAAS,UAAa,OAAS,WAGjCpJ,GAAGyJ,kBAOJtI,SAAU,SAASd,GAElBA,EAAUA,MACVqB,KAAKc,KAAOd,KAAKc,SAGjB,IAAK,IAAIkH,KAAOhI,KAAKc,KACrB,CACC,IAAImH,EAAO3J,GAAG,gBAAkB0J,GAChC,GAAIC,EACJ,CACCA,EAAKzC,aAAa,OAAQxF,KAAKc,KAAKkH,KAItC,IAAIE,KAAoBtF,MAAMC,KAC7BC,SAASC,iBAAiB,6CAE3BmF,EAAelF,QAAQ,SAASC,EAASC,GACxCD,EAAQvD,iBACP,QACA,WAECM,KAAKmI,gBAAgBjF,EAAOD,IAC3BT,KAAKxC,QAEPwC,KAAKxC,OAEP,GAAI1B,GAAG,uBACP,CACCA,GAAG,uBAAuBkH,aACzB,OACAxF,KAAKa,gBACFb,KAAKc,KAAK,kBACVd,KAAKc,KAAK,gBAEd,IAAKd,KAAKe,OAAOqH,OACjB,CACC9J,GAAGwH,SACFxH,GAAG,uBAAuB+J,WAC1B,uBAIF,CACC/J,GAAGgK,YACFhK,GAAG,uBAAuB+J,WAC1B,mBAGF,GAAI/J,GAAG,+BACP,CACCA,GAAG,+BAA+BoB,iBACjC,QACA,WAEC,IAAIuD,EAAU3E,GAAG,+BACjB,IAAKA,GAAGiK,SAAStF,EAAQoF,WAAY,mBACrC,CACCrI,KAAKwI,sBAAsBvF,KAE3BT,KAAKxC,OAGT1B,GAAG,uBAAuBoB,iBACzB,QACA,WAEC,GAAIpB,GAAGiK,SAASjK,GAAG,uBAAuB+J,WAAY,mBACtD,CACC/J,GAAGyJ,qBAGJ,CACC/H,KAAKyH,kBAAkB,aAEvBjF,KAAKxC,OAGT,GAAI1B,GAAG,wBACP,CACCA,GAAG,wBAAwBoB,iBAC1B,QACA,WAEC,GAAIpB,GAAG,wBAAwBsI,aAAa,YAAc,QAC1D,CACCtI,GAAGiF,UAAUU,SAAS6C,KACrBxI,GAAG,wBAAwBsI,aAAa,QAAU,aAEjD5C,mBAAoB,QAGtB1F,GAAGyJ,mBAEHvF,KAAKxC,OAGT,GAAI1B,GAAG,8BACP,CACCA,GAAG,8BAA8BoB,iBAChC,QACA,WAECpB,GAAGiF,UAAUU,SAASwE,YAqB1BD,sBAAuB,SAASvF,GAE/B,GAAI3E,GAAGiD,UAAUC,YAAY,4BAC7B,CACC,IAAIF,EAAOhD,GAAGiD,UAAUC,YAAY,gCAGrC,CACCxB,KAAKiB,aAAawC,KAAK,4BACvB,IAAInC,EAAOhD,GAAGyG,KAAK2D,YAAY5J,QAC9B0B,GAAI,2BACJmI,YAAa1F,EACb2F,SAAU,KACVC,OAAQ,KACRC,WAAY,GACZC,MAAO,KACPC,WAAY,KACZC,QAEE1D,KAAMvF,KAAKc,KAAK,eAChB2E,KAAMnH,GAAG4K,QAAQ,+BACjBC,OAAQ,SACRC,SACCC,wBAAyB,MAE1BC,QAAS,WAERtJ,KAAKyH,kBAAkB,YACtBjF,KAAKxC,QAGPuF,KAAMvF,KAAKc,KAAK,kBAChB2E,KAAMnH,GAAG4K,QAAQ,8BACjBC,OAAQ,SACRC,SACCC,wBAAyB,MAE1BC,QAAS,WAERtJ,KAAKyH,kBAAkB,SACtBjF,KAAKxC,UAKXsB,EAAKmD,QAQN0D,gBAAiB,SAASjF,EAAOD,GAEhC,GAAI3E,GAAGiD,UAAUC,YAAY,wBAA0B0B,GACvD,CACC,IAAI5B,EAAOhD,GAAGiD,UAAUC,YAAY,wBAA0B0B,OAG/D,CACClD,KAAKiB,aAAawC,KAAK,wBAA0BP,GACjD,IAAIqG,IAEFhE,KAAMvF,KAAKc,KAAK,eAChB2E,KAAMnH,GAAG4K,QAAQ,iCACjBM,UAAWxJ,KAAKe,OAAO0I,WAEvBzJ,KAAKI,YAELmF,KAAMvF,KAAKc,KAAK,mBAChB2E,KAAMnH,GAAG4K,QAAQ,iCACjBM,UAAWxJ,KAAKe,OAAO0I,UAEtB,MAEDlE,KAAMvF,KAAKc,KAAK,iBAChB2E,KAAMnH,GAAG4K,QAAQ,qCACjBM,UAAWxJ,KAAKe,OAAO0I,WAEvBzJ,KAAKI,YAEJmF,KAAMvF,KAAKc,KAAK,qBAChB2E,KAAMnH,GAAG4K,QAAQ,qCACjBM,UAAWxJ,KAAKe,OAAO0I,UAEtB,KACHzJ,KAAKY,cAEJ2E,KAAMvF,KAAKc,KAAK,sBAChB2E,KAAMnH,GAAG4K,QAAQ,oCACjBM,UAAWxJ,KAAKe,OAAO0I,UAEtB,MACDzJ,KAAKO,YAAcP,KAAKI,YAExBmF,KAAMvF,KAAKc,KAAK,YAChB2E,KAAMnH,GAAG4K,QAAQ,iCACjBM,UAAWxJ,KAAKe,OAAOqH,SAAWpI,KAAKM,QAEtC,MAEH,IAAIoJ,EAAS1J,KACb,IAAK,IAAI2J,EAAI,EAAGC,EAAK5J,KAAKkB,WAAWG,OAAQsI,EAAIC,EAAID,IACrD,CACC,IAAIE,EAAgB7J,KAAKkB,WAAWyI,GACpCJ,EAAU9F,MACTgC,KAAMnH,GAAGiJ,KAAKuC,iBAAiBD,EAAcE,OAC7CT,QAAS,WAERhL,GAAGqD,KAAKqI,UAAUC,gBACjBjK,KAAKkK,QAEJC,QAAST,EAAOjJ,OAChB2J,IAAKV,EAAOlJ,KAGZ6J,UAAWrK,KAAKqK,UAChBC,aAActK,KAAKuK,MAGpB/H,KAAKqH,EAAeH,KAGxB,IAAIpI,EAAOhD,GAAGyG,KAAK2D,YAAY5J,QAC7B0B,GAAI,wBAA0B0C,EAC9ByF,YAAarK,GAAG,0BAChBsK,SAAU,KACVC,OAAQ,KACRC,WAAY,GACZC,MAAO,KACPC,WAAY,KACZC,MAAOM,IAIVjI,EAAKmD,QAMNtB,mBAAoB,WAEnBnD,KAAKiB,aAAa+B,QAAQ,SAASxC,GAClC,IAAIc,EAAOhD,GAAGiD,UAAUC,YAAYhB,GAEpC,GAAIc,EACJ,CACCA,EAAKmH,aAWTnK,GAAGE,QAAQC,UAAUC,KAAK8L,UAAY,SAAShK,EAAIiK,GAElDA,EAASA,MAET,UAAWA,EAAOC,cAAgB,YAClC,CACCD,EAAOC,YAAc,KAGtBpM,GAAGqM,MACFxK,IAAK7B,GAAGiJ,KAAKC,cACZzF,OAAOK,SAASmD,MACfT,OAAQ,cAEV8F,OAAQ,OACRtI,MACCuI,MAAOrK,EACPsK,OAAQxM,GAAG4K,QAAQ,iBACnB6B,WAAY,QAEbC,SAAU,OACVC,UAAW,SAAS3I,GAEnBhE,GAAGE,QAAQC,UAAUC,KAAKE,SAASuE,qBACnC7E,GAAGE,QAAQC,UAAUC,KAAKE,SAASI,cAClCsD,GAEDhE,GAAGE,QAAQC,UAAUC,KAAKE,SAASa,UAClCiL,YAAaD,EAAOC,mBAlsBzB,GAysBA,IAAIQ,oBAAsB,SAASA,EAAoBC,EAAWC,EAASC,GAE1E,GAAID,IAAY,MAAQC,IAAc,sBACtC,EACC,WAEC,GAAIC,kBAAoB,QACxB,CACC3H,IAAIrF,GAAGqB,GAAG4L,WAAW9G,KAAK,yBAG3B,CACCd,IAAIrF,GAAGqB,GAAG4L,WAAW9G,KAAK,wBAR5B,QAYI,GAAI4G,IAAc,6BACvB,CACC1H,IAAIrF,GAAGqB,GAAG4L,WAAW9G,KAAK,yBAEtB,GAAI4G,IAAc,sBACvB,CACC1H,IAAIrF,GAAGqB,GAAG4L,WAAW9G,KAAK,kCAEtB,GAAI2G,IAAY,aAAe9M,GAAGE,QAAQgN,mBAAqB,YACpE,CACClN,GAAGE,QAAQgN,kBACVtC,QAASiC,QAIX,CACC,IAAIM,EAAMnN,GAAGE,QAAQmB,GAAG+L,KAAKC,aAAa9M,cAC1C4M,EAAIhH,MACHmH,QAAST,EACTU,QAAS,KACTC,aAAc,OACd7L,KAAM","file":"script.map.js"}