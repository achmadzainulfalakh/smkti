<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Recaptcha configuration settings
 *
 * recaptcha_sitekey: Recaptcha site key to use in the widget
 * recaptcha_secretkey: Recaptcha secret key which is used for communicating between your server to Google's
 * lang: Language code, if blank "en" will be used
 *
 * recaptcha_sitekey and recaptcha_secretkey can be obtained from https://www.google.com/recaptcha/admin/
 * Language code can be obtained from https://developers.google.com/recaptcha/docs/language
 *
 * @author Damar Riyadi <damar@tahutek.net>
 */
 $config['recaptcha_sitekey'] = (ENVIRONMENT === 'production') ? "6LcvhAwUAAAAAO_XTDfSU4Sk6PdFa_pTsWGTD4m1" : "6LfTagsUAAAAADXyz4ANBAxHzwbGbrQf0ucwPPc4";
 $config['recaptcha_secretkey'] = (ENVIRONMENT === 'production') ? "6LcvhAwUAAAAAOT54uOYMJoOPUHE21XWm6cHU4UJ" : "6LfTagsUAAAAAMH_iw0hEEaIyyW9n0UcwxLf5Tgp";
 $config['lang'] = "id";
