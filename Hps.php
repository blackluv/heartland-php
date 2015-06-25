<?php

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('PS')) {
    define('PS', PATH_SEPARATOR);
}

if (!defined('HPS_SDK_LOADED')) {
    // Setup
    define('HPS_SDK_LOADED', true);
    $baseDir = dirname(__FILE__).DS.'src/';
    $originalPath = get_include_path();
    ini_set('include_path', $originalPath . PATH_SEPARATOR . $baseDir);

    // Abstractions
    require_once 'Abstractions/HpsBuilderAbstract.php';
    require_once 'Abstractions/HpsGatewayServiceAbstract.php';
    require_once 'Abstractions/HpsPayPlanResourceInterface.php';
    require_once 'Abstractions/HpsPayPlanResourceAbstract.php';

    // Infrastructure
    require_once 'Infrastructure/HpsConfiguration.php';
    require_once 'Infrastructure/HpsException.php';
    require_once 'Infrastructure/HpsArgumentException.php';
    require_once 'Infrastructure/HpsAuthenticationException.php';
    require_once 'Infrastructure/HpsInvalidRequestException.php';
    require_once 'Infrastructure/HpsCheckException.php';
    require_once 'Infrastructure/HpsCreditException.php';
    require_once 'Infrastructure/HpsCreditExceptionDetails.php';
    require_once 'Infrastructure/HpsGatewayException.php';
    require_once 'Infrastructure/HpsGatewayExceptionDetails.php';
    require_once 'Infrastructure/Enums/HpsAccountType.php';
    require_once 'Infrastructure/Enums/HpsCheckType.php';
    require_once 'Infrastructure/Enums/HpsDataEntryMode.php';
    require_once 'Infrastructure/Enums/HpsExceptionCodes.php';
    require_once 'Infrastructure/Enums/HpsGiftCardAliasAction.php';
    require_once 'Infrastructure/Enums/HpsItemChoiceTypePosResponseVer10Transaction.php';
    require_once 'Infrastructure/Enums/HpsSECCode.php';
    require_once 'Infrastructure/Enums/HpsTaxType.php';
    require_once 'Infrastructure/Enums/HpsTrackDataMethod.php';
    require_once 'Infrastructure/Enums/HpsTransactionType.php';
    require_once 'Infrastructure/Enums/HpsACHType.php';
    require_once 'Infrastructure/Enums/HpsCardBrand.php';
    require_once 'Infrastructure/Enums/HpsPayPlanCustomerStatus.php';
    require_once 'Infrastructure/Enums/HpsPayPlanAccountType.php';
    require_once 'Infrastructure/Enums/HpsPayPlanPaymentMethodStatus.php';
    require_once 'Infrastructure/Enums/HpsPayPlanPaymentMethodType.php';
    require_once 'Infrastructure/Enums/HpsPayPlanScheduleDuration.php';
    require_once 'Infrastructure/Enums/HpsPayPlanScheduleFrequency.php';
    require_once 'Infrastructure/Enums/HpsPayPlanScheduleStatus.php';
    require_once 'Infrastructure/Validation/HpsGatewayResponseValidation.php';
    require_once 'Infrastructure/Validation/HpsInputValidation.php';
    require_once 'Infrastructure/Validation/HpsIssuerResponseValidation.php';

    // Entities
    require_once 'Entities/HpsAddress.php';
    require_once 'Entities/HpsConsumer.php';
    require_once 'Entities/HpsDirectMarketData.php';
    require_once 'Entities/HpsEncryptionData.php';
    require_once 'Entities/HpsTokenData.php';
    require_once 'Entities/HpsTrackData.php';
    require_once 'Entities/HpsTransaction.php';
    require_once 'Entities/HpsTransactionDetails.php';
    require_once 'Entities/HpsTransactionHeader.php';
    require_once 'Entities/Batch/HpsBatch.php';
    require_once 'Entities/Check/HpsCheck.php';
    require_once 'Entities/Check/HpsCheckHolder.php';
    require_once 'Entities/Check/HpsCheckResponse.php';
    require_once 'Entities/Check/HpsCheckResponseDetails.php';
    require_once 'Entities/Credit/HpsAuthorization.php';
    require_once 'Entities/Credit/HpsAccountVerify.php';
    require_once 'Entities/Credit/HpsCardHolder.php';
    require_once 'Entities/Credit/HpsCharge.php';
    require_once 'Entities/Credit/HpsChargeExceptions.php';
    require_once 'Entities/Credit/HpsCreditCard.php';
    require_once 'Entities/Credit/HpsOfflineAuthorization.php';
    require_once 'Entities/Credit/HpsRecurringBilling.php';
    require_once 'Entities/Credit/HpsRefund.php';
    require_once 'Entities/Credit/HpsReportTransactionDetails.php';
    require_once 'Entities/Credit/HpsReportTransactionSummary.php';
    require_once 'Entities/Credit/HpsReversal.php';
    require_once 'Entities/Credit/HpsCPCData.php';
    require_once 'Entities/Credit/HpsCPCEdit.php';
    require_once 'Entities/Credit/HpsVoid.php';
    require_once 'Entities/Debit/HpsDebitAddValue.php';
    require_once 'Entities/Debit/HpsDebitReturn.php';
    require_once 'Entities/Debit/HpsDebitReversal.php';
    require_once 'Entities/Debit/HpsDebitSale.php';
    require_once 'Entities/Fluent/HpsBuilderAction.php';
    require_once 'Entities/Fluent/HpsUnknownPropertyException.php';
    require_once 'Entities/Gift/HpsGiftCard.php';
    require_once 'Entities/Gift/HpsGiftCardActivate.php';
    require_once 'Entities/Gift/HpsGiftCardAddValue.php';
    require_once 'Entities/Gift/HpsGiftCardAlias.php';
    require_once 'Entities/Gift/HpsGiftCardBalance.php';
    require_once 'Entities/Gift/HpsGiftCardDeactivate.php';
    require_once 'Entities/Gift/HpsGiftCardReplace.php';
    require_once 'Entities/Gift/HpsGiftCardReversal.php';
    require_once 'Entities/Gift/HpsGiftCardReward.php';
    require_once 'Entities/Gift/HpsGiftCardSale.php';
    require_once 'Entities/Gift/HpsGiftCardVoid.php';
    require_once 'Entities/PayPlan/HpsPayPlanCustomer.php';
    require_once 'Entities/PayPlan/HpsPayPlanPaymentMethod.php';
    require_once 'Entities/PayPlan/HpsPayPlanSchedule.php';


    // Services
    require_once 'Services/HpsServicesConfig.php';
    require_once 'Services/Gateway/HpsRestGatewayService.php';
    require_once 'Services/Gateway/HpsSoapGatewayService.php';
    require_once 'Services/Gateway/HpsBatchService.php';
    require_once 'Services/Gateway/HpsCheckService.php';
    require_once 'Services/Gateway/HpsCreditService.php';
    require_once 'Services/Gateway/HpsDebitService.php';
    require_once 'Services/Gateway/HpsGiftCardService.php';
    require_once 'Services/Gateway/HpsTokenService.php';
    require_once 'Services/Gateway/PayPlan/HpsPayPlanCustomerService.php';
    require_once 'Services/Gateway/PayPlan/HpsPayPlanPaymentMethodService.php';
    require_once 'Services/Gateway/PayPlan/HpsPayPlanScheduleService.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceAuthorizeBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceCaptureBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceChargeBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceCpcEditBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceEditBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceGetBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceListTransactionsBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceOfflineAuthBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceOfflineChargeBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServicePrepaidAddValueBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServicePrepaidBalanceInquiryBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceRefundBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceReverseBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceVerifyBuilder.php';
    require_once 'Services/Fluent/Gateway/Credit/HpsCreditServiceVoidBuilder.php';
    require_once 'Services/Fluent/Gateway/Check/HpsCheckServiceOverrideBuilder.php';
    require_once 'Services/Fluent/Gateway/Check/HpsCheckServiceReturnBuilder.php';
    require_once 'Services/Fluent/Gateway/Check/HpsCheckServiceSaleBuilder.php';
    require_once 'Services/Fluent/Gateway/Check/HpsCheckServiceVoidBuilder.php';
    require_once 'Services/Fluent/Gateway/Debit/HpsDebitServiceAddValueBuilder.php';
    require_once 'Services/Fluent/Gateway/Debit/HpsDebitServiceChargeBuilder.php';
    require_once 'Services/Fluent/Gateway/Debit/HpsDebitServiceReturnBuilder.php';
    require_once 'Services/Fluent/Gateway/Debit/HpsDebitServiceReverseBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceActivateBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceAddValueBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceAliasBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceBalanceBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceDeactivateBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceReplaceBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceReverseBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceRewardBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceSaleBuilder.php';
    require_once 'Services/Fluent/Gateway/GiftCard/HpsGiftCardServiceVoidBuilder.php';
    require_once 'Services/Fluent/Gateway/HpsFluentCheckService.php';
    require_once 'Services/Fluent/Gateway/HpsFluentCreditService.php';
    require_once 'Services/Fluent/Gateway/HpsFluentDebitService.php';
    require_once 'Services/Fluent/Gateway/HpsFluentGiftCardService.php';

    // Cleanup
    ini_set('include_path', $originalPath);
}
