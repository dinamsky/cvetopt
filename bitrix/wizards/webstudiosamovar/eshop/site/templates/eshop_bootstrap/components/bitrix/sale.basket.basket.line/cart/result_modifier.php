<?
global $APPLICATION;
if (!CModule::IncludeModule("sale"))
{
    ShowError(GetMessage("SALE_MODULE_NOT_INSTALL"));
    return;
}
 
$cp = $this->__component; // объект компонента
 
if (is_object($cp)) {
    // Получаем товары в корзине
    $dbBasketItems = CSaleBasket::GetList(
        array(
            "NAME" => "ASC",
            "ID" => "ASC"
        ),
        array(
            "FUSER_ID" => CSaleBasket::GetBasketUserID(),
            "LID" => SITE_ID,
            "ORDER_ID" => "NULL"
        )
    );
         
    $totalAmount = $count = 0;
    while($arItem = $dbBasketItems->GetNext()) {
        $count += $arItem["QUANTITY"];
        // Цена уже пересчитана в валюту по умолчанию
        $totalAmount += $arItem["PRICE"] * $arItem["QUANTITY"];
        $cp->arResult["ITEMS"][] = $arItem;
    }
    /* Далее используется не документированная функция CSaleLang */
    $defaultCurr = CSaleLang::GetLangCurrency(SITE_ID);
    // Стоимость
    $cp->arResult['TOTAL_AMOUNT'] = SaleFormatCurrency($totalAmount, $defaultCurr, true);
    $cp->arResult['TOTAL_PRICE'] = SaleFormatCurrency($totalAmount, $defaultCurr, true);
    //Кол-во товаров
    $cp->arResult['PRODUCT_COUNT'] = $count;
}
?>